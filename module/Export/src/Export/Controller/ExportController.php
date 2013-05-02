<?php
namespace Export\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class ExportController extends AbstractActionController
{

    public function indexAction()
    {
        $this->getServiceLocator()->get('Zend\Log')->INFO($_SERVER['REMOTE_ADDR']);
        if($_SERVER['REMOTE_USER']){
            $form = $_SERVER['REMOTE_ADDR'];
            return array('form' => $form);
        }
        else{
            $form = 'Restricted';
            return array('form' => $form);
        }
    }

    public function downloadAction()
    {
        return new ViewModel(array(
            'datas' => $this->getRegisterTable()->fetchAll(),
        ));
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
    public function getExcel()
    {}
}




















