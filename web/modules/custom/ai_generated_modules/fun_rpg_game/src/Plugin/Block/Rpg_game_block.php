<?php

namespace Drupal\fun_rpg_game\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'Rpg_game_block' block.
 *
 * @Block(
 *   id = "rpg_game_block",
 *   admin_label = @Translation("Rpg_game_block"),
 *   category = @Translation("fun_rpg_game"),
 * )
 */
class Rpg_game_block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'character' => '',
      'bullet' => '',
      'target' => '',
    ] + parent::defaultConfiguration();
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['character'] = [
      '#type' => 'textfield',
      '#title' => t('Character'),
      '#default_value' => isset($config['character']) ? $config['character'] : '',
    ];
    $form['bullet'] = [
      '#type' => 'textfield',
      '#title' => t('Bullet'),
      '#default_value' => isset($config['bullet']) ? $config['bullet'] : '',
    ];
    $form['target'] = [
      '#type' => 'textfield',
      '#title' => t('Target'),
      '#default_value' => isset($config['target']) ? $config['target'] : '',
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['character'] = $form_state->getValue('character');
    $this->configuration['bullet'] = $form_state->getValue('bullet');
    $this->configuration['target'] = $form_state->getValue('target');
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return [
      '#attached' => [
        'library' => [
          'fun_rpg_game/fun_rpg_game_rpg_game_block',
        ],
      ],
      '#theme' => 'fun_rpg_game_rpg_block',
      '#character' => $config['character'],
      '#bullet' => $config['bullet'],
      '#target' => $config['target'],
    ];
  }
}
