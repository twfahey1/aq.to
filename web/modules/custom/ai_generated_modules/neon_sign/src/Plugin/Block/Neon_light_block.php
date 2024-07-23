<?php

namespace Drupal\neon_sign\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'Neon_light_block' block.
 *
 * @Block(
 *   id = "neon_light_block",
 *   admin_label = @Translation("Neon_light_block"),
 *   category = @Translation("neon_sign"),
 * )
 */
class Neon_light_block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'text' => '',
    ] + parent::defaultConfiguration();
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['text'] = [
      '#type' => 'textfield',
      '#title' => t('Text'),
      '#default_value' => isset($config['text']) ? $config['text'] : '',
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['text'] = $form_state->getValue('text');
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return [
      '#attached' => [
        'library' => [
          'neon_sign/neon_sign_neon_light_block',
        ],
      ],
      '#theme' => 'neon_sign_neon_light',
      '#text' => $config['text'],
    ];
  }
}
