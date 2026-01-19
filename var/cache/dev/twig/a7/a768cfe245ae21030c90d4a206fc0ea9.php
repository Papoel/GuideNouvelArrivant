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

/* @EasyAdmin/components/ActionMenu/ActionList/Item.html.twig */
class __TwigTemplate_9e1738e24705eefb819f6495ced66e86 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig"));

        // line 1
        $propsNames = [];        if (isset($context['__props']['label'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "label" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'label';        
        $context['attributes'] = $context['attributes']->remove('label');        
        if (!isset($context['label'])) {            $context['label'] = null;
        }        
        if (isset($context['__context']['label'])) {
            $context['label'] = null;
        }
        if (isset($context['__props']['renderLabelRaw'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "renderLabelRaw" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'renderLabelRaw';        
        $context['attributes'] = $context['attributes']->remove('renderLabelRaw');        
        if (!isset($context['renderLabelRaw'])) {            $context['renderLabelRaw'] = false;
        }        
        if (isset($context['__context']['renderLabelRaw'])) {
            $context['renderLabelRaw'] = false;
        }
        if (isset($context['__props']['icon'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "icon" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'icon';        
        $context['attributes'] = $context['attributes']->remove('icon');        
        if (!isset($context['icon'])) {            $context['icon'] = null;
        }        
        if (isset($context['__context']['icon'])) {
            $context['icon'] = null;
        }
        if (isset($context['__props']['url'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "url" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'url';        
        $context['attributes'] = $context['attributes']->remove('url');        
        if (!isset($context['url'])) {            $context['url'] = null;
        }        
        if (isset($context['__context']['url'])) {
            $context['url'] = null;
        }
        if (isset($context['__props']['htmlAttributes'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "htmlAttributes" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'htmlAttributes';        
        $context['attributes'] = $context['attributes']->remove('htmlAttributes');        
        if (!isset($context['htmlAttributes'])) {            $context['htmlAttributes'] = [];
        }        
        if (isset($context['__context']['htmlAttributes'])) {
            $context['htmlAttributes'] = [];
        }
        if (isset($context['__props']['renderAsForm'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "renderAsForm" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'renderAsForm';        
        $context['attributes'] = $context['attributes']->remove('renderAsForm');        
        if (!isset($context['renderAsForm'])) {            $context['renderAsForm'] = false;
        }        
        if (isset($context['__context']['renderAsForm'])) {
            $context['renderAsForm'] = false;
        }
        if (isset($context['__props']['showBlankIcons'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "showBlankIcons" in template "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'showBlankIcons';        
        $context['attributes'] = $context['attributes']->remove('showBlankIcons');        
        if (!isset($context['showBlankIcons'])) {            $context['showBlankIcons'] = true;
        }        
        if (isset($context['__context']['showBlankIcons'])) {
            $context['showBlankIcons'] = true;
        }
        $attributesKeys = array_keys($context['attributes']->all());
        foreach ($context as $key => $value) {
            if (in_array($key, $attributesKeys) && !in_array($key, $propsNames)) {
unset($context[$key]);
            }
        }
        // line 10
        yield "
<li>
    ";
        // line 12
        $context["formId"] = (((($tmp = (isset($context["renderAsForm"]) || array_key_exists("renderAsForm", $context) ? $context["renderAsForm"] : (function () { throw new RuntimeError('Variable "renderAsForm" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((("ea-form-" . Twig\Extension\CoreExtension::random($this->env->getCharset())) . Twig\Extension\CoreExtension::random($this->env->getCharset()))) : (""));
        // line 13
        yield "    ";
        if ((($tmp = (isset($context["renderAsForm"]) || array_key_exists("renderAsForm", $context) ? $context["renderAsForm"] : (function () { throw new RuntimeError('Variable "renderAsForm" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "        <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 14, $this->source); })()), "html", null, true);
            yield "\" method=\"POST\" ";
            if ((($tmp = (isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 14, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 14, $this->source); })()), "html", null, true);
                yield "\"";
            }
            yield "></form>
    ";
        }
        // line 16
        yield "
    <a ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 17, $this->source); })()), "defaults", [Twig\Extension\CoreExtension::merge(["class" => "dropdown-item"], (isset($context["htmlAttributes"]) || array_key_exists("htmlAttributes", $context) ? $context["htmlAttributes"] : (function () { throw new RuntimeError('Variable "htmlAttributes" does not exist.', 17, $this->source); })()))], "method", false, false, false, 17), "html", null, true);
        yield "
        ";
        // line 18
        if ((($tmp = (isset($context["renderAsForm"]) || array_key_exists("renderAsForm", $context) ? $context["renderAsForm"] : (function () { throw new RuntimeError('Variable "renderAsForm" does not exist.', 18, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "            href=\"#\"
            onclick=\"event.preventDefault(); document.getElementById('";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["formId"]) || array_key_exists("formId", $context) ? $context["formId"] : (function () { throw new RuntimeError('Variable "formId" does not exist.', 20, $this->source); })()), "html", null, true);
            yield "').submit();\"
        ";
        } else {
            // line 22
            yield "            href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 22, $this->source); })()), "html", null, true);
            yield "\"
        ";
        }
        // line 24
        yield "    >
        ";
        // line 25
        if ((($tmp = (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 25, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "            ";
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", [ ...CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 26, $this->source); })()), "nested", ["icon"], "method", false, false, false, 26), "defaults", [["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 26, $this->source); })())]], "method", false, false, false, 26)]);
            yield "
        ";
        } elseif ((($tmp =         // line 27
(isset($context["showBlankIcons"]) || array_key_exists("showBlankIcons", $context) ? $context["showBlankIcons"] : (function () { throw new RuntimeError('Variable "showBlankIcons" does not exist.', 27, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "            ";
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:blank"]);
            yield "
        ";
        }
        // line 30
        yield "        ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 30, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<span ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 30, $this->source); })()), "nested", ["label"], "method", false, false, false, 30), "html", null, true);
            yield ">";
            yield (((($tmp = (isset($context["renderLabelRaw"]) || array_key_exists("renderLabelRaw", $context) ? $context["renderLabelRaw"] : (function () { throw new RuntimeError('Variable "renderLabelRaw" does not exist.', 30, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 30, $this->source); })())) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 30, $this->source); })()), "html", null, true)));
            yield "</span>";
        }
        // line 31
        yield "    </a>
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
        return "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig";
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
        return array (  203 => 31,  194 => 30,  188 => 28,  186 => 27,  181 => 26,  179 => 25,  176 => 24,  170 => 22,  165 => 20,  162 => 19,  160 => 18,  156 => 17,  153 => 16,  141 => 14,  138 => 13,  136 => 12,  132 => 10,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% props
    label = null,
    renderLabelRaw = false,
    icon = null,
    url = null,
    htmlAttributes = {},
    renderAsForm = false, # if true, the item will be rendered as a <form> element (and POST method) instead of an <a> (and GET method)
    showBlankIcons = true, # (this is mostly an internal option) if false, the blank icon will not be rendered when action icon is null
%}

<li>
    {% set formId = renderAsForm ? 'ea-form-' ~ random() ~ random() %}
    {% if renderAsForm %}
        <form action=\"{{ url }}\" method=\"POST\" {% if formId %}id=\"{{ formId }}\"{% endif %}></form>
    {% endif %}

    <a {{ attributes.defaults({class: 'dropdown-item'}|merge(htmlAttributes)) }}
        {% if renderAsForm %}
            href=\"#\"
            onclick=\"event.preventDefault(); document.getElementById('{{ formId }}').submit();\"
        {% else %}
            href=\"{{ url }}\"
        {% endif %}
    >
        {% if icon %}
            {{ component('ea:Icon', { ...attributes.nested('icon').defaults({name: icon}) }) }}
        {% elseif showBlankIcons %}
            {{ component('ea:Icon', { name: 'internal:blank' }) }}
        {% endif %}
        {% if label is not empty %}<span {{ attributes.nested('label') }}>{{ renderLabelRaw ? label|raw : label }}</span>{% endif %}
    </a>
</li>
", "@EasyAdmin/components/ActionMenu/ActionList/Item.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/easycorp/easyadmin-bundle/templates/components/ActionMenu/ActionList/Item.html.twig");
    }
}
