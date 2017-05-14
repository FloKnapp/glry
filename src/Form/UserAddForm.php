<?php
/**
 * Class UserAddForm
 * @package Glry\Form
 */
namespace Glry\Form;

use Faulancer\Form\AbstractFormBuilder;
use Faulancer\Form\Validator\Base\Confirm;
use Faulancer\Form\Validator\Base\Text;
use Faulancer\Form\Validator\Base\NotEmpty;

/**
 * Class UserAddForm
 */
class UserAddForm extends AbstractFormBuilder
{

    /**
     * UserAddForm constructor.
     */
    protected function create()
    {

        // Define form attributes
        $this->setFormAttributes([
            'action' => '/admin/user/add',
            'method' => 'POST'
        ]);

        // Build form
        $this->add([
            'label'      => 'Anrede',
            'attributes' => [
                'name' => 'gender',
                'type' => 'radio',
            ],
            'options'    => [
                'w' => [
                    'label' => 'Frau',
                    'value' => 'frau'
                ],
                'm' => [
                    'label' => 'Herr',
                    'value' => 'herr'
                ]
            ],
            'default'   => 'herr',
            'validator' => [NotEmpty::class]
        ]);

        $this->add([
            'label' => 'Vorname',
            'attributes' => [
                'name'  => 'firstname',
                'type'  => 'text'
            ]
        ]);

        $this->add([
            'label' => 'Nachname',
            'attributes' => [
                'name'  => 'lastname',
                'type'  => 'text'
            ]
        ]);

        $this->add([
            'label' => 'E-Mail',
            'attributes' => [
                'name'  => 'email',
                'type'  => 'email'
            ]
        ]);

        $this->add([
            'label' => 'Login',
            'attributes' => [
                'name'  => 'login',
                'type'  => 'text'
            ]
        ]);

        $this->add([
            'label' => 'Passwort',
            'attributes' => [
                'name'  => 'password',
                'type'  => 'password'
            ],
            'validator' => [
                Confirm::class,
                NotEmpty::class
            ]
        ]);

        $this->add([
            'label' => 'Passwort wiederholen',
            'attributes' => [
                'name'  => 'password_repeat',
                'type'  => 'password'
            ],
            'validator' => [
                Confirm::class,
                NotEmpty::class
            ]
        ]);

        $this->add([
           'label' => 'Absenden',
            'attributes' => [
                'name' => 'submit',
                'type' => 'submit'
            ]
        ]);

        $this->add([
            'attributes' => [
                'type' => 'hidden',
                'name' => 'id'
            ]
        ]);

    }

}