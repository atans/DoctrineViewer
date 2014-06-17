<?php

return array(
    'router' => array(
        'routes' => array(
            'dv' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/dv',
                    'defaults' => array(
                        'controller' => 'DoctrineViewer\Controller\Dv',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'entity' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/entity',
                            'defaults' => array(
                                'action' => 'entity'
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
 