<?php
namespace Register;

use Register\Model\Register;
use Register\Model\AuthRegister;
use Register\Model\RegisterTable;
use Register\Model\AuthRegisterTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	
	public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Register\Model\RegisterTable' =>  function($sm) {
                    $tableGateway = $sm->get('RegisterTableGateway');
                    $table = new RegisterTable($tableGateway);
                    return $table;
                },
                'RegisterTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Register());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);

                },
                'Register\Model\AuthRegisterTable'=> function($sm){
                    $tableGateway1 = $sm->get('AuthRegisterTableGateway');
                    $table = new AuthRegisterTable($tableGateway1);
                    return $table;
                },
                'AuthRegisterTableGateway' =>function($sm){
                    $dbAdapter1 = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new AuthRegister());
                    return new TableGateway('AuthUser', $dbAdapter1, null, $resultSetPrototype);
                },
            ),
        );
    }
}