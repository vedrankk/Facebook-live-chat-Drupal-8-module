<?php
/**
 * @file
 * Contains Drupal\facebook_live_chat\Form\AdminForm.
 */
namespace Drupal\facebook_live_chat\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class AdminForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'facebook_live_chat.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'facebook_chat_admin_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state){
    $config = $this->config('facebook_live_chat.adminsettings');

    $form['page_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Page ID'),
      '#description' => $this->t('You get get the Page ID from the About part of the page when you scroll to the bottom.'),
      '#default_value' => $config->get('page_id'),
    ];

    $form['app_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('App ID of your Facebook page'),
      '#description' => $this->t('You get get the App ID from the developer dashboard when you create the app for your page.'),
      '#default_value' => $config->get('app_id')
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save')
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state);

    $this->config('facebook_live_chat.adminsettings')
      ->set('page_id', $form_state->getValue('page_id'))
      ->set('app_id', $form_state->getValue('app_id'))
      ->save();
  }
}
