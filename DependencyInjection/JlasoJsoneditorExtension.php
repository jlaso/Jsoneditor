<?php

namespace Jlaso\JsoneditorBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

/**
 * JlasoJsoneditorExtension
 */
class JlasoJsoneditorExtension extends Extension
{
    /**
     * Loads the Jsoneditor configuration.
     *
     * @param array            $configs   An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // Get default configuration of the bundle
        $config = $this->processConfiguration(new Configuration(), $configs);

        // Set target element (textarea) selector
        if (isset($config['textarea_class']) && $config['textarea_class']) {
            $config['textarea_class'] = ($config['jquery_adapter'] ? '.' : '') .
                                        trim($config['textarea_class'], '.');
        }

        $container->setParameter('jlaso_jsoneditor.config', $config);

        // load dependency injection config
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('service.xml');
    }

    /**
     * Returns the recommended alias to use in XML.
     *
     * This alias is also the mandatory prefix to use when using YAML.
     *
     * @return string The alias
     */
    public function getAlias()
    {
        return 'jlaso_jsoneditor';
    }
}
