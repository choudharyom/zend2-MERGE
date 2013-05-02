<?php


namespace Logger\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->getServiceLocator()->get('Zend\Log')->INFO($_SERVER['REMOTE_USER']);
        #$this->getServiceLocator()->get('Zend\Log1')->INFO($_SERVER['REMOTE_ADDR']);
        echo "<br />";
    }
}
