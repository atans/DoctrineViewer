<?php

return array(
    'router' => array(
        'routes' => array(
            'dv' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/dv[/]',
                    'defaults' => array(
                        'controller' => 'DoctrineViewer\Controller\Dv',
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
    ),
    'controllers' => array(
        'invokables' => array(
            'DoctrineViewer\Controller\Dv' => 'DoctrineViewer\Controller\DvController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
 