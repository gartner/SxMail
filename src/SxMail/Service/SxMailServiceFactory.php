<?php

namespace SxMail\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class SxMailServiceFactory implements FactoryInterface
{

    /**
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return SxMailService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config       = $container->get('config');
        $sxmailConfig = !empty($config['sxmail']) ? $config['sxmail'] : [];

        $renderer = $container->get(\Zend\View\Renderer\PhpRenderer::class);

        return new SxMailService($renderer, $sxmailConfig);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, SxMailService::class);
    }

}
