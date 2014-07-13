<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Form\FormBase;

class HiForm extends FormBase // implements \Drupal\Core\Form\FormInterface
{

    public function buildForm(array $form, array &$form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => 'Name',
            '#default_value' => 'John English',
            '#required' => true,
            '#description' => 'Please tell us your name.',
        ];

        $form['mail'] = [
            '#type' => 'email',
            '#title' => 'Your email address',
            '#default_value' => 'john.english@gmail.com',
        ];

        $form['actions']['submit'] = ['#type' => 'submit', '#value' => 'Submit'];

        return $form;
    }

    public function getFormId()
    {
        return 'hello.hi_form';
    }

    public function submitForm(array &$form, array &$form_state)
    {
        $msg = l("Hello {$form_state['values']['name']}", 'mailto:' . $form_state['values']['mail']);
        drupal_set_message($msg);
    }

    public function validateForm(array &$form, array &$form_state)
    {
        if (strpos($form_state['values']['mail'], '@gmail.com')) {
            $this->setFormError('mail', $form_state, 'Please do not use Google Mail');
        }
    }

}
