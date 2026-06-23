<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class HeimseitenContaoLesbaresCssFrameworkBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->booleanNode('builtin')
                    ->info('Parse and load the bundled "readable" framework. Set to false to use only your own sources.')
                    ->defaultTrue()
                ->end()
                ->arrayNode('exclude_categories')
                    ->info('Category names (e.g. "FARBEN", "ABSTÄNDE") to hide from the selector.')
                    ->scalarPrototype()->end()
                    ->defaultValue([])
                ->end()
                ->arrayNode('sources')
                    ->info('Additional CSS files to parse for selectable classes (your own classes).')
                    ->scalarPrototype()->end()
                    ->defaultValue([])
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $builtinCss = $this->getPath().'/public/contao-lesbares-css-framework-bundle.css';

        $sources = $config['builtin']
            ? array_merge([$builtinCss], $config['sources'])
            : $config['sources'];

        $container->parameters()->set('heimseiten_contao_lesbares_css_framework.sources', $sources);
        $container->parameters()->set('heimseiten_contao_lesbares_css_framework.exclude_categories', $config['exclude_categories']);
        $container->parameters()->set('heimseiten_contao_lesbares_css_framework.builtin', $config['builtin']);

        $container->import('../config/services.yml');
    }
}
