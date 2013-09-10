<?php

return array(
    'router' => array(
        'dv' => array(
            'type' => 'segment',
            'options' => array(
                'route' => '/dv[/]',
                'defaults' => array(
                    'controller' => 'Application\Controller\Dv',
                    'action'     => 'index',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'metadata' => array(
                    'type' => 'segment',
                    'options' => array(
                        'route' => 'metadata[/]',
                        'defaults' => array(
                            'action' => 'metadata'
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Doctrine\Controller\Dv' => 'Doctrine\Controller\DvController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
 