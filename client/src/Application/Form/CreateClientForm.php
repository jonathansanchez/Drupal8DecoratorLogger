<?php

namespace Drupal\client\Application\Form;

use Drupal\client\Application\Commands\SaveCommand;
use Drupal\client\Application\Decorator\LoggerDecorator;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateClientForm extends FormBase
{
    private $saveClientService;

    /**
     * Class constructor.
     */
    public function __construct($saveClientService)
    {
        $this->saveClientService = $saveClientService;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('client.saveaclient_service')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'create_client_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Name'),
            '#required' => TRUE
        ];
        $form['email'] = [
            '#type'     => 'email',
            '#title'    => $this->t('Email'),
            '#required' => TRUE
        ];
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Save')
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        //Your client side validation here
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        try {

            $loggerDecorator = new LoggerDecorator(
                $this->saveClientService,
                \Drupal::logger('client')
            );

            $loggerDecorator->execute(
                new SaveCommand($form_state->getValue('name'), $form_state->getValue('email'))
            );

            drupal_set_message(
                $this->t('The client has been saved successfully.')
            );
        } catch(\Exception $e) {
            drupal_set_message(
                $this->t('The client has not been saved.'),
                'error'
            );
            $form_state->setRebuild();
        }
    }
}