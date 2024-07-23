<?php

namespace Drupal\pong_game\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'Pong_game_block' block.
 *
 * @Block(
 *   id = "pong_game_block",
 *   admin_label = @Translation("Pong_game_block"),
 *   category = @Translation("pong_game"),
 * )
 */
class Pong_game_block extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'game_canvas' => '',
    ] + parent::defaultConfiguration();
  }
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['game_canvas'] = [
      '#type' => 'textfield',
      '#title' => t('Game_canvas'),
      '#default_value' => isset($config['game_canvas']) ? $config['game_canvas'] : '',
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['game_canvas'] = $form_state->getValue('game_canvas');
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    return [
      '#attached' => [
        'library' => [
          'pong_game/pong_game_pong_game_block',
        ],
      ],
      '#theme' => 'pong_game_pong_game_block',
      '#game_canvas' => $config['game_canvas'],
    ];
  }
}
