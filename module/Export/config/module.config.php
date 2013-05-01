<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Export\Controller\Export' => 'Export\Controller\ExportController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'export' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/export[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Export\Controller\Export',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'Export' => __DIR__ . '/../view',
        ),
    ),
);