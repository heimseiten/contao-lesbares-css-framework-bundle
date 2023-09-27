<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class HeimseitenContaoLesbaresCssFrameworkExtension extends Extension
{
    /**
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );

        $loader->load('services.yaml');

        // Friendly configuration
        $rootKey = $this->getAlias();

        $container->setParameter($rootKey.'.space_classes', $config['space_classes']);
        $container->setParameter($rootKey.'.text_classes', $config['text_classes']);
        $container->setParameter($rootKey.'.color_classes', $config['color_classes']);
        $container->setParameter($rootKey.'.size_classes', $config['size_classes']);
        $container->setParameter($rootKey.'.column_classes', $config['column_classes']);
        $container->setParameter($rootKey.'.miscellaneous_classes', $config['miscellaneous_classes']);
    }

    public function getAlias(): string
    {
        return Configuration::ROOT_KEY;
    }
}
