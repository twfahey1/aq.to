<?php

namespace Drupal\fun_rpg_game\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'Space_shooter' block.
 *
 * @Block(
 *   id = "space_shooter",
 *   admin_label = @Translation("Space_shooter"),
 *   category = @Translation("fun_rpg_game"),
 * )
 */
class Space_shooter extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'ship' => '',
      'bullet' => '',
    ] + parent::defaultConfiguration();
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['ship'] = [
      '#type' => 'textfield',
      '#title' => t('Ship'),
      '#default_value' => isset($config['ship']) ? $config['ship'] : '',
    ];
    $form['bullet'] = [
      '#type' => 'textfield',
      '#title' => t('Bullet'),
      '#default_value' => isset($config['bullet']) ? $config['bullet'] : '',
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['ship'] = $form_state->getValue('ship');
    $this->configuration['bullet'] = $form_state->getValue('bullet');
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return [
      '#attached' => [
        'library' => [
          'fun_rpg_game/fun_rpg_game_space_shooter',
        ],
      ],
      '#theme' => 'fun_rpg_game_space_shooter',
      '#ship' => $config['ship'],
      '#bullet' => $config['bullet'],
    ];
  }
}
