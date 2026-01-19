<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'UxIcons'.\DIRECTORY_SEPARATOR.'IconSetsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'UxIcons'.\DIRECTORY_SEPARATOR.'IconifyConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UxIconsConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $iconDir;
    private $defaultIconAttributes;
    private $iconSets;
    private $aliases;
    private $iconify;
    private $ignoreNotFound;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * The local directory where icons are stored.
     * @default '%kernel.project_dir%/assets/icons'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function iconDir($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['iconDir'] = true;
        $this->iconDir = $value;

        return $this;
    }

    /**
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function defaultIconAttributes(string $key, mixed $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['defaultIconAttributes'] = true;
        $this->defaultIconAttributes[$key] = $value;

        return $this;
    }

    /**
     * Icon sets configuration.
     * @deprecated since Symfony 7.4
     */
    public function iconSets(string $prefix, array $value = []): \Symfony\Config\UxIcons\IconSetsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->iconSets[$prefix])) {
            $this->_usedProperties['iconSets'] = true;
            $this->iconSets[$prefix] = new \Symfony\Config\UxIcons\IconSetsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "iconSets()" has already been initialized. You cannot pass values the second time you call iconSets().');
        }

        return $this->iconSets[$prefix];
    }

    /**
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function aliases(string $key, mixed $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['aliases'] = true;
        $this->aliases[$key] = $value;

        return $this;
    }

    /**
     * @template TValue of array|bool
     * @param TValue $value
     * Configuration for the remote icon service.
     * @default {"enabled":true,"on_demand":true,"endpoint":"https:\/\/api.iconify.design"}
     * @return \Symfony\Config\UxIcons\IconifyConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\UxIcons\IconifyConfig : static)
     * @deprecated since Symfony 7.4
     */
    public function iconify(array|bool $value = []): \Symfony\Config\UxIcons\IconifyConfig|static
    {
        $this->_hasDeprecatedCalls = true;
        if (!\is_array($value)) {
            $this->_usedProperties['iconify'] = true;
            $this->iconify = $value;

            return $this;
        }

        if (!$this->iconify instanceof \Symfony\Config\UxIcons\IconifyConfig) {
            $this->_usedProperties['iconify'] = true;
            $this->iconify = new \Symfony\Config\UxIcons\IconifyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "iconify()" has already been initialized. You cannot pass values the second time you call iconify().');
        }

        return $this->iconify;
    }

    /**
     * Ignore error when an icon is not found.
     * Set to 'true' to fail silently.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function ignoreNotFound($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['ignoreNotFound'] = true;
        $this->ignoreNotFound = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'ux_icons';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('icon_dir', $config)) {
            $this->_usedProperties['iconDir'] = true;
            $this->iconDir = $config['icon_dir'];
            unset($config['icon_dir']);
        }

        if (array_key_exists('default_icon_attributes', $config)) {
            $this->_usedProperties['defaultIconAttributes'] = true;
            $this->defaultIconAttributes = $config['default_icon_attributes'];
            unset($config['default_icon_attributes']);
        }

        if (array_key_exists('icon_sets', $config)) {
            $this->_usedProperties['iconSets'] = true;
            $this->iconSets = array_map(fn ($v) => new \Symfony\Config\UxIcons\IconSetsConfig($v), $config['icon_sets']);
            unset($config['icon_sets']);
        }

        if (array_key_exists('aliases', $config)) {
            $this->_usedProperties['aliases'] = true;
            $this->aliases = $config['aliases'];
            unset($config['aliases']);
        }

        if (array_key_exists('iconify', $config)) {
            $this->_usedProperties['iconify'] = true;
            $this->iconify = \is_array($config['iconify']) ? new \Symfony\Config\UxIcons\IconifyConfig($config['iconify']) : $config['iconify'];
            unset($config['iconify']);
        }

        if (array_key_exists('ignore_not_found', $config)) {
            $this->_usedProperties['ignoreNotFound'] = true;
            $this->ignoreNotFound = $config['ignore_not_found'];
            unset($config['ignore_not_found']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['iconDir'])) {
            $output['icon_dir'] = $this->iconDir;
        }
        if (isset($this->_usedProperties['defaultIconAttributes'])) {
            $output['default_icon_attributes'] = $this->defaultIconAttributes;
        }
        if (isset($this->_usedProperties['iconSets'])) {
            $output['icon_sets'] = array_map(fn ($v) => $v->toArray(), $this->iconSets);
        }
        if (isset($this->_usedProperties['aliases'])) {
            $output['aliases'] = $this->aliases;
        }
        if (isset($this->_usedProperties['iconify'])) {
            $output['iconify'] = $this->iconify instanceof \Symfony\Config\UxIcons\IconifyConfig ? $this->iconify->toArray() : $this->iconify;
        }
        if (isset($this->_usedProperties['ignoreNotFound'])) {
            $output['ignore_not_found'] = $this->ignoreNotFound;
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
