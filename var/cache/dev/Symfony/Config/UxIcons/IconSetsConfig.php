<?php

namespace Symfony\Config\UxIcons;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class IconSetsConfig 
{
    private $path;
    private $alias;
    private $iconAttributes;
    private $_usedProperties = [];

    /**
     * The local icon set directory path.
     * (cannot be used with 'alias')
     * @example %kernel.project_dir%/assets/svg/acme
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): static
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * The remote icon set identifier.
     * (cannot be used with 'path')
     * @example simple-icons
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function alias($value): static
    {
        $this->_usedProperties['alias'] = true;
        $this->alias = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function iconAttributes(string $key, mixed $value): static
    {
        $this->_usedProperties['iconAttributes'] = true;
        $this->iconAttributes[$key] = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('path', $config)) {
            $this->_usedProperties['path'] = true;
            $this->path = $config['path'];
            unset($config['path']);
        }

        if (array_key_exists('alias', $config)) {
            $this->_usedProperties['alias'] = true;
            $this->alias = $config['alias'];
            unset($config['alias']);
        }

        if (array_key_exists('icon_attributes', $config)) {
            $this->_usedProperties['iconAttributes'] = true;
            $this->iconAttributes = $config['icon_attributes'];
            unset($config['icon_attributes']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['alias'])) {
            $output['alias'] = $this->alias;
        }
        if (isset($this->_usedProperties['iconAttributes'])) {
            $output['icon_attributes'] = $this->iconAttributes;
        }

        return $output;
    }

}
