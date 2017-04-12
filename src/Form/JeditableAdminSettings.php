<?php

/**
 * @file
 * Contains \Drupal\jeditable\Form\JeditableAdminSettings.
 */

namespace Drupal\jeditable\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

class JeditableAdminSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'jeditable_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('jeditable.settings');

    foreach (Element::children($form) as $variable) {
      $config->set($variable, $form_state->getValue($form[$variable]['#parents']));
    }
    $config->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['jeditable.settings'];
  }

  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form['jeditable_create_new_revisions'] = [
      '#type' => 'checkbox',
      '#title' => t('Create Node Revisions'),
      '#default_value' => \Drupal::config('jeditable.settings')->get('jeditable_create_new_revisions'),
      '#description' => t('If enabled, each time a field is changed a new node revision will be generated. This will generate a very full revision table if jeditable is used extensively, so use with caution'),
    ];
    $form['jeditable_empty_placeholder'] = [
      '#type' => 'textfield',
      '#title' => t('Empty field placeholder'),
      '#default_value' => \Drupal::config('jeditable.settings')->get('jeditable_empty_placeholder'),
      '#description' => t('Text, that will be shown if field is empty'),
    ];

    return parent::buildForm($form, $form_state);
  }

}
