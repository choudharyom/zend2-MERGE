<?php
namespace Register\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AuthRegister implements InputFilterAwareInterface
{
    public $id;
    public $firstname;
    public $lastname;
	public $email;
	public $confirmemail;
    public $companyname;
	public $streetaddress;
    public $citystate;
	public $businessphone;
    public $inovoiceaddress;
	protected $inputFilter;
	
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->firstname = (isset($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname  = (isset($data['lastname'])) ? $data['lastname'] : null;
		$this->email  = (isset($data['email'])) ? $data['email'] : null;
		$this->companyname  = (isset($data['companyname'])) ? $data['companyname'] : null;
		$this->streetaddress  = (isset($data['streetaddress'])) ? $data['streetaddress'] : null;
		$this->citystate  = (isset($data['citystate'])) ? $data['citystate'] : null;
		$this->businessphone  = (isset($data['businessphone'])) ? $data['businessphone'] : null;
		$this->inovoiceaddress  = (isset($data['inovoiceaddress'])) ? $data['inovoiceaddress'] : null;
    }
	public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'firstname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 2,
                            'max'      => 100,
                        ),
                    ),
					array ( 
						'name' => 'NotEmpty', 
						'options' => array( 
							'messages' => array( 
								'isEmpty' => 'First name is required', 
							) 
						), 
					),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'lastname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 4,
                            'max'      => 100,
                        ),
                    ),
					array ( 
						'name' => 'NotEmpty', 
						'options' => array( 
							'messages' => array( 
								'isEmpty' => 'Last name is required', 
							) 
						), 
					),
                ),
            )));
			$inputFilter->add($factory->createInput(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'EmailAddress',
                        'options' => array(
							'messages' => array( 
								'emailAddressInvalidFormat' => 'Email address format is not invalid', 
							)
                        ),
                    ),
				    array ( 
						'name' => 'NotEmpty', 
						'options' => array( 
							'messages' => array( 
								'isEmpty' => 'Email address is required', 
							) 
						), 
					),	
                ),
            )));			

			$inputFilter->add($factory->createInput(array(
                'name'     => 'companyname',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
			$inputFilter->add($factory->createInput(array(
                'name'     => 'streetaddress',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
			$inputFilter->add($factory->createInput(array(
                'name'     => 'citystate',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
			$inputFilter->add($factory->createInput(array(
                'name'     => 'businessphone',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                        ),
                    ),
					array ( 
						'name' => 'NotEmpty', 
						'options' => array( 
							'messages' => array( 
								'isEmpty' => 'Phone number is required', 
							) 
						), 
					),
                ),
            )));
			$inputFilter->add($factory->createInput(array(
                'name'     => 'inovoiceaddress',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                        ),
                    ),
					array ( 
						'name' => 'NotEmpty', 
						'options' => array( 
							'messages' => array( 
								'isEmpty' => 'Invoice address is required', 
							) 
						), 
					),
                ),
            )));
			
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}