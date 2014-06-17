<?php
namespace DoctrineViewer;

use Zend\ServiceManager\ServiceLocatorInterface;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
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
                'doctrineviewer_module_options' => function (ServiceLocatorInterface $sl) {
                    $config = $sl->get('Config');
                    return new Options\ModuleOptions(isset($config['doctrineviewer']) ? $config['doctrineviewer']:array());
                },
            ),
        );
    }
}