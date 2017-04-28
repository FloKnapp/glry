<?php
/**
 * Class userDeleteForm | UserDeleteForm.php
 * @package Glry\Form
 * @author  Florian Knapp <office@florianknapp.de>
 */
namespace Glry\Form;

use Faulancer\Form\AbstractFormBuilder;

/**
 * Class userDeleteForm
 */
class UserDeleteForm extends AbstractFormBuilder
{

    public function create()
    {

        $this->setFormAttributes([
            'action' => '/admin/user/delete',
            'method' => 'POST'
        ]);

        $this->add([
            'attributes' => [
                'type' => 'hidden',
                'name' => 'id'
            ]
        ]);

        $this->add([
            'attributes' => [
                'type' => 'hidden',
                'name' => 'confirm',
                'value' => 'confirmed'
            ]
        ]);

        $this->add([
            'label' => 'Bestätigen',
            'attributes' => [
                'type' => 'submit',
                'name' => 'submit'
            ]
        ]);

    }

}