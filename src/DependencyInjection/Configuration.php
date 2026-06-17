<?php

declare(strict_types=1);

namespace Heimseiten\ContaoLesbaresCssFrameworkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('heimseiten_contao_lesbares_css_framework');

        $treeBuilder->getRootNode()
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

        return $treeBuilder;
    }
}
