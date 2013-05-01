<?php
namespace Register\Form;

use Zend\Form\Form;

class AuthRegisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('register');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'firstname',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
        $this->add(array(
            'name' => 'lastname',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
		$this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'attributes' => array(
                'placeholder' => 'TU-Chemnitz Email id',
            ),
            'options' => array(
                
            ),
        ));
		$this->add(array(
            'name' => 'confirmemail',
            'type' => 'Text',
            'options' => array(
            'attributes' => array(
                'placeholder' => 'TU-Chemnitz Email id',
                ),
            ),
        ));
		$this->add(array(
            'name' => 'companyname',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
        $this->add(array(
            'name' => 'streetaddress',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
		$this->add(array(
            'name' => 'citystate',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
		$this->add(array(
            'name' => 'businessphone',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
		$this->add(array(
            'name' => 'inovoiceaddress',
            'type' => 'Text',
            'options' => array(
                
            ),
        ));
        $this->add(array(
            'name' => 'Register',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}