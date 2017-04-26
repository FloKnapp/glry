<?php
/**
 * Class UserAddForm
 * @package Glry\Form
 */
namespace Glry\Form;

use Faulancer\Form\AbstractFormBuilder;
use Faulancer\Form\Validator\Base\Text;

/**
 * Class UserAddForm
 */
class UserAddForm extends AbstractFormBuilder
{

    /**
     * UserAddForm constructor.
     */
    public function __construct()
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
                'type' => 'select',
            ],
            'options'    => [
                ''     => 'Bitte wählen',
                'frau' => 'Frau',
                'herr' => 'Herr'
            ],
            'selected'   => 'herr',
            'validator'  => Text::class
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
           'label' => 'Absenden',
            'attributes' => [
                'name' => 'submit',
                'type' => 'submit'
            ]
        ]);

        $this->add([
            'label' => 'Hallo',
            'attributes' => [
                'name' => 'isAdmin',
                'type' => 'checkbox',
                'value' => 'yes'
            ],
            'default' => 'no',
            'checked' => true
        ]);

        $this->add([
            'label' => 'Hallo Radio',
            'attributes' => [
                'name' => 'radioButton',
                'type' => 'radio'
            ],
            'options' => [
                'option1' => 'Ja',
                'option2' => 'Nein'
            ],
            'selected' => 'option2'
        ]);

    }

}