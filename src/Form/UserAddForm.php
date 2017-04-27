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
                'type' => 'radio',
            ],
            'options'    => [
                'w' => [
                    'title' => 'Frau',
                    'value' => 'frau'
                ],
                'm' => [
                    'title' => 'Herr',
                    'value' => 'herr'
                ]
            ],
            'default'   => 'herr',
            'validator' => Text::class
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

    }

}