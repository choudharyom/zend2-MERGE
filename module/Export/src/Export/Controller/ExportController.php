<?php
namespace Export\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ExportController extends AbstractActionController
{

    public function indexAction()
    {
        $form = 123456;
        return array('form' => $form);
    }


}




















