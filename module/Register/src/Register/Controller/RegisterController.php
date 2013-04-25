<?php
namespace Register\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Register\Model\Register; 
use Register\Form\RegisterForm;
use Zend\Form\Element;
use Zend\Form\Form;

class RegisterController extends AbstractActionController
{
    public function indexAction()
    {
	        return new ViewModel(array(
            'registers' => $this->getRegisterTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new RegisterForm();
        $form->get('Register')->setValue('Register');

        $request = $this->getRequest();
        if ($request->isPost()) {
			$data = $request->getPost();
			$viewModel = new ViewModel();
			
				if($data['email'] != $data['confirmemail']){
					$viewModel->msg = "";
                    return array('form' => $form,'msg' =>"Email and confirm email id should match." );
                }
				if($email = $this->getRegisterTable()->getEmail($data['email'])){
					$viewModel->msg = "";
                    return array('form' => $form,'msg' =>"Email has been registered already." );
				}
            $register = new Register();
            $form->setInputFilter($register->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $register->exchangeArray($form->getData());
				#unset($register['confirmemail']);
                $this->getRegisterTable()->saveRegister($register);
                // Redirect to list of users
                return $this->redirect()->toRoute('register');
            }
        }
        return array('form' => $form);
    }
    public function conferencefeesAction()
    {
    }
	public function hotelAction()
    {
    }
	protected $registerTable;
	public function getRegisterTable()
    {
        if (!$this->registerTable) {
            $sm = $this->getServiceLocator();
            $this->registerTable = $sm->get('Register\Model\RegisterTable');
        }
        return $this->registerTable;
    }
}