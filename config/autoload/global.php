<?php
return array(
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=zf2tutorial;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Zend\Log' => function ($sm) {
                $log = new \Zend\Log\Logger();
                #$writer = new \Zend\Log\Writer\Stream('./data/log/logfile');
                $writer = new \Zend\Log\Writer\Stream('php://output');
                $formatter = new Zend\Log\Formatter\Simple('Date: %timestamp% %priorityName% (%priority%) IP: %message%' . PHP_EOL);
                $writer->setFormatter($formatter);
                $log->addWriter($writer);

                return $log;
            },
        ),
    ),
);