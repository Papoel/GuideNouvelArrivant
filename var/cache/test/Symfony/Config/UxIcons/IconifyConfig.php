<?php

namespace Symfony\Config\UxIcons;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class IconifyConfig 
{
    private $enabled;
    private $onDemand;
    private $endpoint;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * Whether to download icons "on demand".
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function onDemand($value): static
    {
        $this->_usedProperties['onDemand'] = true;
        $this->onDemand = $value;

        return $this;
    }

    /**
     * The endpoint for the Iconify icons API.
     * @default 'https://api.iconify.design'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function endpoint($value): static
    {
        $this->_usedProperties['endpoint'] = true;
        $this->endpoint = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('on_demand', $config)) {
            $this->_usedProperties['onDemand'] = true;
            $this->onDemand = $config['on_demand'];
            unset($config['on_demand']);
        }

        if (array_key_exists('endpoint', $config)) {
            $this->_usedProperties['endpoint'] = true;
            $this->endpoint = $config['endpoint'];
            unset($config['endpoint']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['onDemand'])) {
            $output['on_demand'] = $this->onDemand;
        }
        if (isset($this->_usedProperties['endpoint'])) {
            $output['endpoint'] = $this->endpoint;
        }

        return $output;
    }

}
