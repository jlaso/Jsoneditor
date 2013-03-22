<?php
namespace Jlaso\JsoneditorBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Twig Extension for Jsoneditor support.
 *
 * @author naydav <web@naydav.com>
 */
class JlasoJsoneditorExtension extends \Twig_Extension
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Initialize jsoneditor helper
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Gets a service.
     *
     * @param string $id The service identifier
     *
     * @return object The associated service
     */
    public function getService($id)
    {
        return $this->container->get($id);
    }

    /**
     * Get parameters from the service container
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'jsoneditor_init' => new \Twig_Function_Method($this, 'jsoneditor_init', array('is_safe' => array('html')))
        );
    }

    /**
     * Jsoneditor initializations
     *
     * @return string
     */
    public function jsoneditor_init()
    {

        $config = $this->getParameter('jlaso_jsoneditor.config');
        $baseURL = (!isset($config['base_url']) ? null : $config['base_url']);

        /** @var $assets \Symfony\Component\Templating\Helper\CoreAssetsHelper */
        $assets = $this->getService('templating.helper.assets');

        // Get path to jsoneditor script for the jQuery version of the editor
        $config['jquery_script_url'] = $assets->getUrl($baseURL.'bundles/jlasojsoneditor/js/jquery.js');

        // If the language is not set in the config...
        if (!isset($config['language']) || empty($config['language'])) {
            // get it from the request
            $config['language'] = $this->getService('request')->getLocale();
        }

        // Check the language code and trim it to 2 symbols (en_US to en, ru_RU to ru, ...)
        if (strlen($config['language']) > 2) {
            $config['language'] = substr($config['language'], 0, 2);
        }

        return $this->getService('templating')
                    ->render('JlasoJsoneditorBundle:Script:init.html.twig',
            array(
                'jsoneditor_config' => json_encode($config),
                'jquery_adapter'    => $config['jquery_adapter'],
                'jquery_cdn'        => $config['jquery_cdn'],
                'base_url'          => $baseURL,
            ));
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'jlaso_jsoneditor';
    }
}