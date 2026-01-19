<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Flasher'.\DIRECTORY_SEPARATOR.'PresetConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Flasher'.\DIRECTORY_SEPARATOR.'PluginConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Flasher'.\DIRECTORY_SEPARATOR.'ThemeConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FlasherConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $default;
    private $mainScript;
    private $injectAssets;
    private $translate;
    private $excludedPaths;
    private $filter;
    private $scripts;
    private $styles;
    private $options;
    private $flashBag;
    private $presets;
    private $plugins;
    private $themes;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * Default notification library (e.g., "flasher", "toastr", "noty", "notyf", "sweetalert")
     * @default 'flasher'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function default($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['default'] = true;
        $this->default = $value;

        return $this;
    }

    /**
     * Path to the main PHPFlasher JavaScript file
     * @default '/vendor/flasher/flasher.min.js'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function mainScript($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['mainScript'] = true;
        $this->mainScript = $value;

        return $this;
    }

    /**
     * Automatically inject assets into HTML pages
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function injectAssets($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['injectAssets'] = true;
        $this->injectAssets = $value;

        return $this;
    }

    /**
     * Enable message translation
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function translate($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['translate'] = true;
        $this->translate = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function excludedPaths(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['excludedPaths'] = true;
        $this->excludedPaths = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function filter(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['filter'] = true;
        $this->filter = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function scripts(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['scripts'] = true;
        $this->scripts = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function styles(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['styles'] = true;
        $this->styles = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function options(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['options'] = true;
        $this->options = $value;

        return $this;
    }

    /**
     * Map Symfony flash messages to notification types
     * @default true
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function flashBag(mixed $value = true): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['flashBag'] = true;
        $this->flashBag = $value;

        return $this;
    }

    /**
     * Notification presets (optional)
     * @deprecated since Symfony 7.4
     */
    public function preset(string $name, array $value = []): \Symfony\Config\Flasher\PresetConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->presets[$name])) {
            $this->_usedProperties['presets'] = true;
            $this->presets[$name] = new \Symfony\Config\Flasher\PresetConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "preset()" has already been initialized. You cannot pass values the second time you call preset().');
        }

        return $this->presets[$name];
    }

    /**
     * Additional plugins
     * @deprecated since Symfony 7.4
     */
    public function plugin(string $name, array $value = []): \Symfony\Config\Flasher\PluginConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->plugins[$name])) {
            $this->_usedProperties['plugins'] = true;
            $this->plugins[$name] = new \Symfony\Config\Flasher\PluginConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "plugin()" has already been initialized. You cannot pass values the second time you call plugin().');
        }

        return $this->plugins[$name];
    }

    /**
     * Additional themes
     * @deprecated since Symfony 7.4
     */
    public function theme(string $name, array $value = []): \Symfony\Config\Flasher\ThemeConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->themes[$name])) {
            $this->_usedProperties['themes'] = true;
            $this->themes[$name] = new \Symfony\Config\Flasher\ThemeConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "theme()" has already been initialized. You cannot pass values the second time you call theme().');
        }

        return $this->themes[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'flasher';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('default', $config)) {
            $this->_usedProperties['default'] = true;
            $this->default = $config['default'];
            unset($config['default']);
        }

        if (array_key_exists('main_script', $config)) {
            $this->_usedProperties['mainScript'] = true;
            $this->mainScript = $config['main_script'];
            unset($config['main_script']);
        }

        if (array_key_exists('inject_assets', $config)) {
            $this->_usedProperties['injectAssets'] = true;
            $this->injectAssets = $config['inject_assets'];
            unset($config['inject_assets']);
        }

        if (array_key_exists('translate', $config)) {
            $this->_usedProperties['translate'] = true;
            $this->translate = $config['translate'];
            unset($config['translate']);
        }

        if (array_key_exists('excluded_paths', $config)) {
            $this->_usedProperties['excludedPaths'] = true;
            $this->excludedPaths = $config['excluded_paths'];
            unset($config['excluded_paths']);
        }

        if (array_key_exists('filter', $config)) {
            $this->_usedProperties['filter'] = true;
            $this->filter = $config['filter'];
            unset($config['filter']);
        }

        if (array_key_exists('scripts', $config)) {
            $this->_usedProperties['scripts'] = true;
            $this->scripts = $config['scripts'];
            unset($config['scripts']);
        }

        if (array_key_exists('styles', $config)) {
            $this->_usedProperties['styles'] = true;
            $this->styles = $config['styles'];
            unset($config['styles']);
        }

        if (array_key_exists('options', $config)) {
            $this->_usedProperties['options'] = true;
            $this->options = $config['options'];
            unset($config['options']);
        }

        if (array_key_exists('flash_bag', $config)) {
            $this->_usedProperties['flashBag'] = true;
            $this->flashBag = $config['flash_bag'];
            unset($config['flash_bag']);
        }

        if (array_key_exists('presets', $config)) {
            $this->_usedProperties['presets'] = true;
            $this->presets = array_map(fn ($v) => new \Symfony\Config\Flasher\PresetConfig($v), $config['presets']);
            unset($config['presets']);
        }

        if (array_key_exists('plugins', $config)) {
            $this->_usedProperties['plugins'] = true;
            $this->plugins = array_map(fn ($v) => new \Symfony\Config\Flasher\PluginConfig($v), $config['plugins']);
            unset($config['plugins']);
        }

        if (array_key_exists('themes', $config)) {
            $this->_usedProperties['themes'] = true;
            $this->themes = array_map(fn ($v) => new \Symfony\Config\Flasher\ThemeConfig($v), $config['themes']);
            unset($config['themes']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default;
        }
        if (isset($this->_usedProperties['mainScript'])) {
            $output['main_script'] = $this->mainScript;
        }
        if (isset($this->_usedProperties['injectAssets'])) {
            $output['inject_assets'] = $this->injectAssets;
        }
        if (isset($this->_usedProperties['translate'])) {
            $output['translate'] = $this->translate;
        }
        if (isset($this->_usedProperties['excludedPaths'])) {
            $output['excluded_paths'] = $this->excludedPaths;
        }
        if (isset($this->_usedProperties['filter'])) {
            $output['filter'] = $this->filter;
        }
        if (isset($this->_usedProperties['scripts'])) {
            $output['scripts'] = $this->scripts;
        }
        if (isset($this->_usedProperties['styles'])) {
            $output['styles'] = $this->styles;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
        if (isset($this->_usedProperties['flashBag'])) {
            $output['flash_bag'] = $this->flashBag;
        }
        if (isset($this->_usedProperties['presets'])) {
            $output['presets'] = array_map(fn ($v) => $v->toArray(), $this->presets);
        }
        if (isset($this->_usedProperties['plugins'])) {
            $output['plugins'] = array_map(fn ($v) => $v->toArray(), $this->plugins);
        }
        if (isset($this->_usedProperties['themes'])) {
            $output['themes'] = array_map(fn ($v) => $v->toArray(), $this->themes);
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
