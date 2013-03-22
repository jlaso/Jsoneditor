<?php

namespace Jlaso\JsoneditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * JlasoJsoneditorBundle configuration structure.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $defaults = $this->getJsoneditorDefaults();

        $treeBuilder = new TreeBuilder();

        return $treeBuilder
            ->root('jlaso_jsoneditor', 'array')
                ->children()
                    // Include jQuery library and/or jquery adapter
                    ->booleanNode('jquery_cdn')->defaultFalse()->end()
                    ->booleanNode('jquery_adapter')->defaultFalse()->end()
                    // Textarea class
                    ->scalarNode('textarea_class')->end()
                    // base url for content
                    ->scalarNode('base_url')->end()
                    // Default language for all instances of the editor
                    ->scalarNode('language')->defaultNull()->end()
                ->end()
            ->end();

    }

}