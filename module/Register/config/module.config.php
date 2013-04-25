<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Register\Controller\Register' => 'Register\Controller\RegisterController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'register' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/register[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Register\Controller\Register',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'Register' => __DIR__ . '/../view',
        ),
    ),
);