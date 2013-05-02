<?php
namespace Register\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Register\Model\Register;
use Register\Model\AuthRegister;
use Register\Form\RegisterForm;
use Register\Form\AuthRegisterForm;
use Zend\Form\Element;
use Zend\Form\Form;


class RegisterController extends AbstractActionController
{

    public function indexAction()
    {
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
                $this->getRegisterTable()->saveRegister($register);
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

	public function authregisterAction()
    {
        $this->getServiceLocator()->get('Zend\Log')->INFO($_SERVER['HTTP_SHIB_ORGPERSON_EMAILADDRESS']);
        $form = new AuthRegisterForm();
        $form->get('Register')->setValue('Register');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $viewModel = new ViewModel();

            if($data['email'] != $data['confirmemail']){
                $viewModel->msg = "";
                return array('form' => $form,'msg' =>"Email and confirm email id should match." );
            }
            if($email = $this->getAuthRegisterTable()->getEmail($data['email'])){
                $viewModel->msg = "";
                return array('form' => $form,'msg' =>"Email has been registered already." );
            }
            $register = new AuthRegister();
            $form->setInputFilter($register->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $register->exchangeArray($form->getData());
                $this->getAuthRegisterTable()->saveRegister($register);
                // Redirect to list of users
                return $this->redirect()->toRoute('register');
            }
        }
        return array('form' => $form);
    }
    protected $authregisterTable;
    public function getAuthRegisterTable()
    {
        if (!$this->authregisterTable) {
            $sm = $this->getServiceLocator();
            $this->authregisterTable = $sm->get('Register\Model\AuthRegisterTable');
        }
        return $this->authregisterTable;
    }
	
}




















