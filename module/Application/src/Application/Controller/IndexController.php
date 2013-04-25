<?php


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
	$writer = new Zend\Log\Writer\Stream('php://output');
	$logger = new Zend\Log\Logger();
	$logger->addWriter($writer);

	$logger->info('Informational message');

    }
}
