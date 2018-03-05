<?php 
namespace Market;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'market' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/market',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'index' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/main[/:action]',
                        ],
                    ],
                    'post' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/post',
                            'defaults' => [
                                'controller' => Controller\PostController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'view' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/view[/]',
                            'defaults' => [
                                'controller' => Controller\ViewController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\PostController::class => Controller\Factory\PostControllerFactory::class,
            Controller\ViewController::class => Controller\Factory\ViewControllerFactory::class,
        ],
    ],
    'controller_plugins' => [
        'aliases' => [
            'somePlugin' => Controller\Plugin\SomePlugin::class,
        ],
        'factories' => [
            Controller\Plugin\SomePlugin::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];