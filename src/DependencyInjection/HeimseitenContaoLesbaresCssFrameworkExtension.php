<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class HeimseitenContaoLesbaresCssFrameworkExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $builtinCss = \dirname(__DIR__).'/Resources/public/contao-lesbares-css-framework-bundle.css';

        // The selector is fed from the (optional) built-in framework plus any project sources
        $sources = $config['builtin']
            ? array_merge([$builtinCss], $config['sources'])
            : $config['sources'];

        $container->setParameter('heimseiten_contao_lesbares_css_framework.sources', $sources);
        $container->setParameter('heimseiten_contao_lesbares_css_framework.exclude_categories', $config['exclude_categories']);
        $container->setParameter('heimseiten_contao_lesbares_css_framework.builtin', $config['builtin']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
