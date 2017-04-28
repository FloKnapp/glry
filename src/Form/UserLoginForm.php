<?php
/**
 * Class UserLoginForm | UserLoginForm.php
 * @package Glry\Form
 * @author  Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Form;

use Faulancer\Form\AbstractFormBuilder;

/**
 * Class UserLoginForm
 */
class UserLoginForm extends AbstractFormBuilder
{

    /**
     * UserLoginForm constructor.
     */
    public function create ()
    {
        $this->setFormAttributes([
            'action' => '/user/login',
            'method' => 'POST'
        ]);

        $this->add([
            'label' => 'Login',
            'attributes' => [
                'name' => 'login',
                'type' => 'text'
            ]
        ]);

        $this->add([
            'label' => 'Passwort',
            'attributes' => [
                'name' => 'password',
                'type' => 'password'
            ]
        ]);

        $this->add([
            'label' => 'Einloggen',
            'attributes' => [
                'name' => 'submit',
                'type' => 'submit'
            ]
        ]);
    }

}