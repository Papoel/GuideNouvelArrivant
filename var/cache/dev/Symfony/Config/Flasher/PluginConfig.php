<?php

namespace Symfony\Config\Flasher;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PluginConfig 
{
    private $view;
    private $styles;
    private $scripts;
    private $options;
    private $_usedProperties = [];

    /**
     * Custom twig view template
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function view($value): static
    {
        $this->_usedProperties['view'] = true;
        $this->view = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function styles(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['styles'] = true;
        $this->styles = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function scripts(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['scripts'] = true;
        $this->scripts = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function options(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['options'] = true;
        $this->options = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('view', $config)) {
            $this->_usedProperties['view'] = true;
            $this->view = $config['view'];
            unset($config['view']);
        }

        if (array_key_exists('styles', $config)) {
            $this->_usedProperties['styles'] = true;
            $this->styles = $config['styles'];
            unset($config['styles']);
        }

        if (array_key_exists('scripts', $config)) {
            $this->_usedProperties['scripts'] = true;
            $this->scripts = $config['scripts'];
            unset($config['scripts']);
        }

        if (array_key_exists('options', $config)) {
            $this->_usedProperties['options'] = true;
            $this->options = $config['options'];
            unset($config['options']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['view'])) {
            $output['view'] = $this->view;
        }
        if (isset($this->_usedProperties['styles'])) {
            $output['styles'] = $this->styles;
        }
        if (isset($this->_usedProperties['scripts'])) {
            $output['scripts'] = $this->scripts;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }

        return $output;
    }

}
