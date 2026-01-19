<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig */
class __TwigTemplate_fa61be6e79c087b1484f4dca320619dd extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig"));

        // line 1
        $propsNames = [];        if (isset($context['__props']['group'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "group" in template "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'group';        
        $context['attributes'] = $context['attributes']->remove('group');        
        if (!isset($context['group'])) {            $context['group'] = null;
        }        
        if (isset($context['__context']['group'])) {
            $context['group'] = null;
        }
        if (isset($context['__props']['showBlankIcons'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "showBlankIcons" in template "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'showBlankIcons';        
        $context['attributes'] = $context['attributes']->remove('showBlankIcons');        
        if (!isset($context['showBlankIcons'])) {            $context['showBlankIcons'] = true;
        }        
        if (isset($context['__context']['showBlankIcons'])) {
            $context['showBlankIcons'] = true;
        }
        if (isset($context['__props']['entity'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "entity" in template "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'entity';        
        $context['attributes'] = $context['attributes']->remove('entity');        
        if (!isset($context['entity'])) {            $context['entity'] = null;
        }        
        if (isset($context['__context']['entity'])) {
            $context['entity'] = null;
        }
        $attributesKeys = array_keys($context['attributes']->all());
        foreach ($context as $key => $value) {
            if (in_array($key, $attributesKeys) && !in_array($key, $propsNames)) {
unset($context[$key]);
            }
        }
        // line 6
        yield "
<li class=\"dropstart dropdown-submenu\">
    ";
        // line 8
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 8, $this->source); })()), "hasMainAction", [], "any", false, false, false, 8) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 8, $this->source); })()), "mainAction", [], "any", false, false, false, 8))) {
            // line 9
            yield "        ";
            // line 10
            yield "        <div class=\"d-flex flex-row-reverse position-relative\">
            ";
            // line 11
            $context["formId"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 11, $this->source); })()), "mainAction", [], "any", false, false, false, 11), "isRenderedAsForm", [], "any", false, false, false, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((("ea-form-" . Twig\Extension\CoreExtension::random($this->env->getCharset())) . Twig\Extension\CoreExtension::random($this->env->getCharset()))) : (null));
            // line 12
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 12, $this->source); })()), "mainAction", [], "any", false, false, false, 12), "isRenderedAsForm", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 13
                yield "                <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 13, $this->source); })()), "mainAction", [], "any", false, false, false, 13), "linkUrl", [], "any", false, false, false, 13), "html", null, true);
                yield "\" method=\"POST\" ";
                if ((($tmp = (isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "id=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 13, $this->source); })()), "html", null, true);
                    yield "\"";
                }
                yield "></form>
            ";
            }
            // line 15
            yield "
            <a class=\"dropdown-item flex-grow-1 border-end-0 ";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 16, $this->source); })()), "mainAction", [], "any", false, false, false, 16), "cssClass", [], "any", false, false, false, 16), "html", null, true);
            yield "\"
                ";
            // line 17
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 17, $this->source); })()), "mainAction", [], "any", false, false, false, 17), "isRenderedAsForm", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 18
                yield "                    href=\"#\"
                    onclick=\"event.preventDefault(); document.getElementById('";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 19, $this->source); })()), "html", null, true);
                yield "').submit();\"
                ";
            } else {
                // line 21
                yield "                    href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 21, $this->source); })()), "mainAction", [], "any", false, false, false, 21), "linkUrl", [], "any", false, false, false, 21), "html", null, true);
                yield "\"
                ";
            }
            // line 23
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 23, $this->source); })()), "mainAction", [], "any", false, false, false, 23), "htmlAttributes", [], "any", false, false, false, 23));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attr"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield ">
                ";
            // line 24
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 24, $this->source); })()), "icon", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 25
                yield "                    ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 25, $this->source); })()), "icon", [], "any", false, false, false, 25)]);
                yield "
                ";
            } elseif ((            // line 26
(isset($context["showBlankIcons"]) || array_key_exists("showBlankIcons", $context) ? $context["showBlankIcons"] : (function () { throw new RuntimeError('Variable "showBlankIcons" does not exist.', 26, $this->source); })()) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 26, $this->source); })()), "hasAnyActionWithIcon", [], "any", false, false, false, 26))) {
                // line 27
                yield "                    ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:blank"]);
                yield "
                ";
            }
            // line 29
            yield "                ";
            if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 29, $this->source); })()), "mainAction", [], "any", false, false, false, 29), "label", [], "any", false, false, false, 29)) &&  !(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 29, $this->source); })()), "mainAction", [], "any", false, false, false, 29), "label", [], "any", false, false, false, 29) === false))) {
                // line 30
                yield "                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 30, $this->source); })()), "mainAction", [], "any", false, false, false, 30), "label", [], "any", false, false, false, 30)), "html", null, true);
                yield "</span>
                ";
            }
            // line 32
            yield "            </a>
            <a class=\"dropdown-toggle dropdown-toggle-split dropdown-item border-start-0\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
                <span class=\"dropdown-toggle-marker\"></span>
            </a>
        </div>
    ";
        } else {
            // line 38
            yield "        ";
            // line 39
            yield "        <a class=\"dropdown-item dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
            ";
            // line 40
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 40, $this->source); })()), "icon", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 41
                yield "                ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 41, $this->source); })()), "icon", [], "any", false, false, false, 41)]);
                yield "
            ";
            } elseif ((            // line 42
(isset($context["showBlankIcons"]) || array_key_exists("showBlankIcons", $context) ? $context["showBlankIcons"] : (function () { throw new RuntimeError('Variable "showBlankIcons" does not exist.', 42, $this->source); })()) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 42, $this->source); })()), "hasAnyActionWithIcon", [], "any", false, false, false, 42))) {
                // line 43
                yield "                ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:blank"]);
                yield "
            ";
            }
            // line 45
            yield "            ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 45, $this->source); })()), "label", [], "any", false, false, false, 45))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 45, $this->source); })()), "label", [], "any", false, false, false, 45)), "html", null, true);
                yield "</span>";
            }
            // line 46
            yield "        </a>
    ";
        }
        // line 48
        yield "
    ";
        // line 50
        yield "    <ul class=\"dropdown-menu\">
        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 51, $this->source); })()), "items", [], "any", false, false, false, 51));
        foreach ($context['_seq'] as $context["_key"] => $context["subItem"]) {
            // line 52
            yield "            ";
            if ((is_iterable($context["subItem"]) && CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "type", [], "any", true, true, false, 52))) {
                // line 53
                yield "                ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "type", [], "any", false, false, false, 53) == "divider")) {
                    // line 54
                    yield "                    ";
                    yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:ActionMenu:ActionList:Divider");
                    yield "
                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 55
$context["subItem"], "type", [], "any", false, false, false, 55) == "header")) {
                    // line 56
                    yield "                    ";
                    yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:ActionMenu:ActionList:Header", ["label" => CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "content", [], "any", false, false, false, 56), "renderLabelRaw" => "true"]);
                    yield "
                ";
                }
                // line 58
                yield "            ";
            } else {
                // line 59
                yield "                ";
                // line 60
                yield "                ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:ActionMenu:ActionList:Item", ["class" => ((CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "cssClass", [], "any", false, false, false, 60) . " dropdown-item-variant-") . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "variant", [], "any", false, false, false, 60), "value", [], "any", false, false, false, 60)), "label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "label", [], "any", false, false, false, 60)), "icon" => CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "icon", [], "any", false, false, false, 60), "htmlAttributes" => CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "htmlAttributes", [], "any", false, false, false, 60), "url" => CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "linkUrl", [], "any", false, false, false, 60), "renderLabelRaw" => "true", "renderAsForm" => CoreExtension::getAttribute($this->env, $this->source, $context["subItem"], "isRenderedAsForm", [], "any", false, false, false, 60), "showBlankIcons" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 60, $this->source); })()), "hasAnyActionWithIcon", [], "any", false, false, false, 60)]);
                yield "
            ";
            }
            // line 62
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['subItem'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        yield "    </ul>
</li>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  263 => 63,  257 => 62,  251 => 60,  249 => 59,  246 => 58,  240 => 56,  238 => 55,  233 => 54,  230 => 53,  227 => 52,  223 => 51,  220 => 50,  217 => 48,  213 => 46,  206 => 45,  200 => 43,  198 => 42,  193 => 41,  191 => 40,  188 => 39,  186 => 38,  178 => 32,  172 => 30,  169 => 29,  163 => 27,  161 => 26,  156 => 25,  154 => 24,  139 => 23,  133 => 21,  128 => 19,  125 => 18,  123 => 17,  119 => 16,  116 => 15,  104 => 13,  101 => 12,  99 => 11,  96 => 10,  94 => 9,  92 => 8,  88 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% props
    group = null,
    showBlankIcons = true,
    entity = null,
%}

<li class=\"dropstart dropdown-submenu\">
    {% if group.hasMainAction and group.mainAction %}
        {# split dropdown: main action + submenu toggle #}
        <div class=\"d-flex flex-row-reverse position-relative\">
            {% set formId = group.mainAction.isRenderedAsForm ? 'ea-form-' ~ random() ~ random() : null %}
            {% if group.mainAction.isRenderedAsForm %}
                <form action=\"{{ group.mainAction.linkUrl }}\" method=\"POST\" {% if formId %}id=\"{{ formId }}\"{% endif %}></form>
            {% endif %}

            <a class=\"dropdown-item flex-grow-1 border-end-0 {{ group.mainAction.cssClass }}\"
                {% if group.mainAction.isRenderedAsForm %}
                    href=\"#\"
                    onclick=\"event.preventDefault(); document.getElementById('{{ formId }}').submit();\"
                {% else %}
                    href=\"{{ group.mainAction.linkUrl }}\"
                {% endif %}
                {% for attr, value in group.mainAction.htmlAttributes %}{{ attr }}=\"{{ value }}\" {% endfor %}>
                {% if group.icon %}
                    {{ component('ea:Icon', { name: (group.icon) }) }}
                {% elseif showBlankIcons or group.hasAnyActionWithIcon %}
                    {{ component('ea:Icon', { name: 'internal:blank' }) }}
                {% endif %}
                {% if group.mainAction.label is not empty and group.mainAction.label is not same as(false) %}
                    <span>{{ group.mainAction.label|trans }}</span>
                {% endif %}
            </a>
            <a class=\"dropdown-toggle dropdown-toggle-split dropdown-item border-start-0\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
                <span class=\"dropdown-toggle-marker\"></span>
            </a>
        </div>
    {% else %}
        {# regular submenu toggle #}
        <a class=\"dropdown-item dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
            {% if group.icon %}
                {{ component('ea:Icon', { name: (group.icon) }) }}
            {% elseif showBlankIcons or group.hasAnyActionWithIcon %}
                {{ component('ea:Icon', { name: 'internal:blank' }) }}
            {% endif %}
            {% if group.label is not empty %}<span>{{ group.label|trans }}</span>{% endif %}
        </a>
    {% endif %}

    {# nested ActionList for submenu items #}
    <ul class=\"dropdown-menu\">
        {% for subItem in group.items %}
            {% if subItem is iterable and subItem.type is defined %}
                {% if subItem.type == 'divider' %}
                    {{ component('ea:ActionMenu:ActionList:Divider') }}
                {% elseif subItem.type == 'header' %}
                    {{ component('ea:ActionMenu:ActionList:Header', { label: (subItem.content), renderLabelRaw: 'true' }) }}
                {% endif %}
            {% else %}
                {# subItem is an ActionDto #}
                {{ component('ea:ActionMenu:ActionList:Item', { class: (subItem.cssClass)~' dropdown-item-variant-'~(subItem.variant.value), label: (subItem.label|trans), icon: (subItem.icon), htmlAttributes: (subItem.htmlAttributes), url: (subItem.linkUrl), renderLabelRaw: 'true', renderAsForm: (subItem.isRenderedAsForm), showBlankIcons: (group.hasAnyActionWithIcon) }) }}
            {% endif %}
        {% endfor %}
    </ul>
</li>
", "@EasyAdmin/components/ActionMenu/ActionList/ItemGroup.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/easycorp/easyadmin-bundle/templates/components/ActionMenu/ActionList/ItemGroup.html.twig");
    }
}
