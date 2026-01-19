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

/* @EasyAdmin/components/Button.html.twig */
class __TwigTemplate_6888f5bb5549c9412323dcb3f2647208 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/Button.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/Button.html.twig"));

        // line 1
        $propsNames = [];        if (isset($context['__props']['variant'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "variant" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'variant';        
        $context['attributes'] = $context['attributes']->remove('variant');        
        if (!isset($context['variant'])) {            $context['variant'] = "default";
        }        
        if (isset($context['__context']['variant'])) {
            $context['variant'] = "default";
        }
        if (isset($context['__props']['isInvisible'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "isInvisible" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'isInvisible';        
        $context['attributes'] = $context['attributes']->remove('isInvisible');        
        if (!isset($context['isInvisible'])) {            $context['isInvisible'] = false;
        }        
        if (isset($context['__context']['isInvisible'])) {
            $context['isInvisible'] = false;
        }
        if (isset($context['__props']['isBlock'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "isBlock" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'isBlock';        
        $context['attributes'] = $context['attributes']->remove('isBlock');        
        if (!isset($context['isBlock'])) {            $context['isBlock'] = false;
        }        
        if (isset($context['__context']['isBlock'])) {
            $context['isBlock'] = false;
        }
        if (isset($context['__props']['size'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "size" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'size';        
        $context['attributes'] = $context['attributes']->remove('size');        
        if (!isset($context['size'])) {            $context['size'] = "md";
        }        
        if (isset($context['__context']['size'])) {
            $context['size'] = "md";
        }
        if (isset($context['__props']['icon'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "icon" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'icon';        
        $context['attributes'] = $context['attributes']->remove('icon');        
        if (!isset($context['icon'])) {            $context['icon'] = null;
        }        
        if (isset($context['__context']['icon'])) {
            $context['icon'] = null;
        }
        if (isset($context['__props']['withTrailingIcon'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "withTrailingIcon" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'withTrailingIcon';        
        $context['attributes'] = $context['attributes']->remove('withTrailingIcon');        
        if (!isset($context['withTrailingIcon'])) {            $context['withTrailingIcon'] = false;
        }        
        if (isset($context['__context']['withTrailingIcon'])) {
            $context['withTrailingIcon'] = false;
        }
        if (isset($context['__props']['inactive'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "inactive" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'inactive';        
        $context['attributes'] = $context['attributes']->remove('inactive');        
        if (!isset($context['inactive'])) {            $context['inactive'] = false;
        }        
        if (isset($context['__context']['inactive'])) {
            $context['inactive'] = false;
        }
        if (isset($context['__props']['htmlElement'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "htmlElement" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'htmlElement';        
        $context['attributes'] = $context['attributes']->remove('htmlElement');        
        if (!isset($context['htmlElement'])) {            $context['htmlElement'] = "button";
        }        
        if (isset($context['__context']['htmlElement'])) {
            $context['htmlElement'] = "button";
        }
        if (isset($context['__props']['htmlAttributes'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "htmlAttributes" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'htmlAttributes';        
        $context['attributes'] = $context['attributes']->remove('htmlAttributes');        
        if (!isset($context['htmlAttributes'])) {            $context['htmlAttributes'] = [];
        }        
        if (isset($context['__context']['htmlAttributes'])) {
            $context['htmlAttributes'] = [];
        }
        if (isset($context['__props']['href'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "href" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'href';        
        $context['attributes'] = $context['attributes']->remove('href');        
        if (!isset($context['href'])) {            $context['href'] = "#";
        }        
        if (isset($context['__context']['href'])) {
            $context['href'] = "#";
        }
        if (isset($context['__props']['action'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "action" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'action';        
        $context['attributes'] = $context['attributes']->remove('action');        
        if (!isset($context['action'])) {            $context['action'] = null;
        }        
        if (isset($context['__context']['action'])) {
            $context['action'] = null;
        }
        if (isset($context['__props']['method'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "method" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'method';        
        $context['attributes'] = $context['attributes']->remove('method');        
        if (!isset($context['method'])) {            $context['method'] = "POST";
        }        
        if (isset($context['__context']['method'])) {
            $context['method'] = "POST";
        }
        if (isset($context['__props']['type'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "type" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'type';        
        $context['attributes'] = $context['attributes']->remove('type');        
        if (!isset($context['type'])) {            $context['type'] = null;
        }        
        if (isset($context['__context']['type'])) {
            $context['type'] = null;
        }
        if (isset($context['__props']['name'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "name" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'name';        
        $context['attributes'] = $context['attributes']->remove('name');        
        if (!isset($context['name'])) {            $context['name'] = null;
        }        
        if (isset($context['__context']['name'])) {
            $context['name'] = null;
        }
        if (isset($context['__props']['value'])) {
        $componentClass = isset($context['this']) ? get_debug_type($context['this']) : "";
        throw new \Twig\Error\RuntimeError('Cannot define prop "value" in template "@EasyAdmin/components/Button.html.twig". Property already defined in component class "'.$componentClass.'".');
        }
        $propsNames[] = 'value';        
        $context['attributes'] = $context['attributes']->remove('value');        
        if (!isset($context['value'])) {            $context['value'] = null;
        }        
        if (isset($context['__context']['value'])) {
            $context['value'] = null;
        }
        $attributesKeys = array_keys($context['attributes']->all());
        foreach ($context as $key => $value) {
            if (in_array($key, $attributesKeys) && !in_array($key, $propsNames)) {
unset($context[$key]);
            }
        }
        // line 18
        yield "
";
        // line 20
        $context["html_element_value"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["htmlElement"] ?? null), "value", [], "any", true, true, false, 20)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["htmlElement"]) || array_key_exists("htmlElement", $context) ? $context["htmlElement"] : (function () { throw new RuntimeError('Variable "htmlElement" does not exist.', 20, $this->source); })()), "value", [], "any", false, false, false, 20)) : ((isset($context["htmlElement"]) || array_key_exists("htmlElement", $context) ? $context["htmlElement"] : (function () { throw new RuntimeError('Variable "htmlElement" does not exist.', 20, $this->source); })())));
        // line 21
        $context["variant_value"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["variant"] ?? null), "value", [], "any", true, true, false, 21)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 21, $this->source); })()), "value", [], "any", false, false, false, 21)) : ((isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 21, $this->source); })())));
        // line 22
        yield "
";
        // line 23
        $context["variant_class"] = ((((isset($context["variant_value"]) || array_key_exists("variant_value", $context) ? $context["variant_value"] : (function () { throw new RuntimeError('Variable "variant_value" does not exist.', 23, $this->source); })()) == "default")) ? ("btn-secondary") : (("btn-" . (isset($context["variant_value"]) || array_key_exists("variant_value", $context) ? $context["variant_value"] : (function () { throw new RuntimeError('Variable "variant_value" does not exist.', 23, $this->source); })()))));
        // line 24
        $context["size_class"] = ((((isset($context["size"]) || array_key_exists("size", $context) ? $context["size"] : (function () { throw new RuntimeError('Variable "size" does not exist.', 24, $this->source); })()) == "md")) ? ("") : (("btn-" . (isset($context["size"]) || array_key_exists("size", $context) ? $context["size"] : (function () { throw new RuntimeError('Variable "size" does not exist.', 24, $this->source); })()))));
        // line 25
        $context["css_class"] = Twig\Extra\Html\HtmlExtension::htmlClasses("btn", (isset($context["variant_class"]) || array_key_exists("variant_class", $context) ? $context["variant_class"] : (function () { throw new RuntimeError('Variable "variant_class" does not exist.', 25, $this->source); })()), (isset($context["size_class"]) || array_key_exists("size_class", $context) ? $context["size_class"] : (function () { throw new RuntimeError('Variable "size_class" does not exist.', 25, $this->source); })()), ["btn-invisible" =>         // line 26
(isset($context["isInvisible"]) || array_key_exists("isInvisible", $context) ? $context["isInvisible"] : (function () { throw new RuntimeError('Variable "isInvisible" does not exist.', 26, $this->source); })()), "btn-block" =>         // line 27
(isset($context["isBlock"]) || array_key_exists("isBlock", $context) ? $context["isBlock"] : (function () { throw new RuntimeError('Variable "isBlock" does not exist.', 27, $this->source); })()), "disabled" =>         // line 28
(isset($context["inactive"]) || array_key_exists("inactive", $context) ? $context["inactive"] : (function () { throw new RuntimeError('Variable "inactive" does not exist.', 28, $this->source); })())]);
        // line 30
        yield "
";
        // line 31
        if (((isset($context["html_element_value"]) || array_key_exists("html_element_value", $context) ? $context["html_element_value"] : (function () { throw new RuntimeError('Variable "html_element_value" does not exist.', 31, $this->source); })()) == "a")) {
            // line 32
            yield "    <a ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 32, $this->source); })()), "only", ["class"], "method", false, false, false, 32), "defaults", [["class" => (isset($context["css_class"]) || array_key_exists("css_class", $context) ? $context["css_class"] : (function () { throw new RuntimeError('Variable "css_class" does not exist.', 32, $this->source); })())]], "method", false, false, false, 32), "html", null, true);
            yield "
       href=\"";
            // line 33
            yield (((($tmp = (isset($context["inactive"]) || array_key_exists("inactive", $context) ? $context["inactive"] : (function () { throw new RuntimeError('Variable "inactive" does not exist.', 33, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("#") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["href"]) || array_key_exists("href", $context) ? $context["href"] : (function () { throw new RuntimeError('Variable "href" does not exist.', 33, $this->source); })()), "html", null, true)));
            yield "\"
       role=\"button\"
       ";
            // line 35
            if ((($tmp = (isset($context["inactive"]) || array_key_exists("inactive", $context) ? $context["inactive"] : (function () { throw new RuntimeError('Variable "inactive" does not exist.', 35, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "aria-disabled=\"true\" tabindex=\"-1\"";
            }
            // line 36
            yield "       ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["htmlAttributes"]) || array_key_exists("htmlAttributes", $context) ? $context["htmlAttributes"] : (function () { throw new RuntimeError('Variable "htmlAttributes" does not exist.', 36, $this->source); })()));
            foreach ($context['_seq'] as $context["attrName"] => $context["attrValue"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attrName"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["attrValue"], "trans", [], "any", true, true, false, 36)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["attrValue"])) : ($context["attrValue"])), "html");
                yield "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attrName'], $context['attrValue'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "       ";
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 37, $this->source); })()), "without", ["class", "href", "role", "aria-disabled", "tabindex"], "method", false, false, false, 37);
            yield ">
        ";
            // line 38
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 38, $this->source); })()) &&  !(isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 38, $this->source); })()))) {
                // line 39
                yield "            ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 39, $this->source); })()), "class" => "btn-icon"]);
                yield "
        ";
            }
            // line 41
            yield "        ";
            if ((            $this->unwrap()->hasBlock("content", $context, $blocks) &&  !Twig\Extension\CoreExtension::testEmpty(            $this->unwrap()->renderBlock("content", $context, $blocks)))) {
                // line 42
                yield "            <span ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 42, $this->source); })()), "nested", ["label"], "method", false, false, false, 42), "defaults", [["class" => "btn-label"]], "method", false, false, false, 42), "html", null, true);
                yield ">";
                yield from                 $this->unwrap()->yieldBlock("content", $context, $blocks);
                yield "</span>
        ";
            }
            // line 44
            yield "        ";
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 44, $this->source); })()) && (isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 44, $this->source); })()))) {
                // line 45
                yield "            ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 45, $this->source); })()), "class" => "btn-icon btn-icon-trailing"]);
                yield "
        ";
            }
            // line 47
            yield "    </a>
";
        } elseif ((        // line 48
(isset($context["html_element_value"]) || array_key_exists("html_element_value", $context) ? $context["html_element_value"] : (function () { throw new RuntimeError('Variable "html_element_value" does not exist.', 48, $this->source); })()) == "form")) {
            // line 49
            yield "    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 49, $this->source); })()), "html", null, true);
            yield "\" method=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 49, $this->source); })()), "html", null, true);
            yield "\" ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 49, $this->source); })()), "only", ["id", "class", "data-*"], "method", false, false, false, 49), "html", null, true);
            yield ">
        ";
            // line 50
            if (!CoreExtension::inFilter(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 50, $this->source); })())), ["GET", "POST"])) {
                // line 51
                yield "            <input type=\"hidden\" name=\"_method\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 51, $this->source); })())), "html", null, true);
                yield "\">
        ";
            }
            // line 53
            yield "
        <button ";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 54, $this->source); })()), "only", ["class"], "method", false, false, false, 54), "defaults", [["class" => (isset($context["css_class"]) || array_key_exists("css_class", $context) ? $context["css_class"] : (function () { throw new RuntimeError('Variable "css_class" does not exist.', 54, $this->source); })())]], "method", false, false, false, 54), "html", null, true);
            yield "
            type=\"";
            // line 55
            yield (((array_key_exists("type", $context) &&  !(null === $context["type"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true)) : ("submit"));
            yield "\"
            ";
            // line 56
            if ((($tmp = (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 56, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 56, $this->source); })()), "html", null, true);
                yield "\"";
            }
            // line 57
            yield "            ";
            if ((($tmp = (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 57, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 57, $this->source); })()), "html", null, true);
                yield "\"";
            }
            // line 58
            yield "            ";
            if ((($tmp = (isset($context["inactive"]) || array_key_exists("inactive", $context) ? $context["inactive"] : (function () { throw new RuntimeError('Variable "inactive" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "disabled=\"disabled\"";
            }
            // line 59
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["htmlAttributes"]) || array_key_exists("htmlAttributes", $context) ? $context["htmlAttributes"] : (function () { throw new RuntimeError('Variable "htmlAttributes" does not exist.', 59, $this->source); })()));
            foreach ($context['_seq'] as $context["attrName"] => $context["attrValue"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attrName"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["attrValue"], "trans", [], "any", true, true, false, 59)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["attrValue"])) : ($context["attrValue"])), "html");
                yield "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attrName'], $context['attrValue'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            yield "            ";
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 60, $this->source); })()), "without", ["class", "form", "type", "name", "value", "disabled"], "method", false, false, false, 60);
            yield "
        >
            ";
            // line 62
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 62, $this->source); })()) &&  !(isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 62, $this->source); })()))) {
                // line 63
                yield "                ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 63, $this->source); })()), "class" => "btn-icon"]);
                yield "
            ";
            }
            // line 65
            yield "            ";
            if ((            $this->unwrap()->hasBlock("content", $context, $blocks) &&  !Twig\Extension\CoreExtension::testEmpty(            $this->unwrap()->renderBlock("content", $context, $blocks)))) {
                // line 66
                yield "                <span ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 66, $this->source); })()), "nested", ["label"], "method", false, false, false, 66), "defaults", [["class" => "btn-label"]], "method", false, false, false, 66), "html", null, true);
                yield ">";
                yield from                 $this->unwrap()->yieldBlock("content", $context, $blocks);
                yield "</span>
            ";
            }
            // line 68
            yield "            ";
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 68, $this->source); })()) && (isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 68, $this->source); })()))) {
                // line 69
                yield "                ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 69, $this->source); })()), "class" => "btn-icon btn-icon-trailing"]);
                yield "
            ";
            }
            // line 71
            yield "        </button>
    </form>
";
        } else {
            // line 74
            yield "    <button ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 74, $this->source); })()), "only", ["class"], "method", false, false, false, 74), "defaults", [["class" => (isset($context["css_class"]) || array_key_exists("css_class", $context) ? $context["css_class"] : (function () { throw new RuntimeError('Variable "css_class" does not exist.', 74, $this->source); })())]], "method", false, false, false, 74), "html", null, true);
            yield "
        type=\"";
            // line 75
            yield (((array_key_exists("type", $context) &&  !(null === $context["type"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true)) : ("submit"));
            yield "\"
        ";
            // line 76
            if ((($tmp = (isset($context["inactive"]) || array_key_exists("inactive", $context) ? $context["inactive"] : (function () { throw new RuntimeError('Variable "inactive" does not exist.', 76, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "disabled=\"disabled\"";
            }
            // line 77
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["htmlAttributes"]) || array_key_exists("htmlAttributes", $context) ? $context["htmlAttributes"] : (function () { throw new RuntimeError('Variable "htmlAttributes" does not exist.', 77, $this->source); })()));
            foreach ($context['_seq'] as $context["attrName"] => $context["attrValue"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attrName"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["attrValue"], "trans", [], "any", true, true, false, 77)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["attrValue"])) : ($context["attrValue"])), "html");
                yield "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attrName'], $context['attrValue'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            yield "        ";
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 78, $this->source); })()), "without", ["class", "type", "disabled"], "method", false, false, false, 78);
            yield ">
        ";
            // line 79
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 79, $this->source); })()) &&  !(isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 79, $this->source); })()))) {
                // line 80
                yield "            ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 80, $this->source); })()), "class" => "btn-icon"]);
                yield "
        ";
            }
            // line 82
            yield "        ";
            if ((            $this->unwrap()->hasBlock("content", $context, $blocks) &&  !Twig\Extension\CoreExtension::testEmpty(            $this->unwrap()->renderBlock("content", $context, $blocks)))) {
                // line 83
                yield "            <span ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 83, $this->source); })()), "nested", ["label"], "method", false, false, false, 83), "defaults", [["class" => "btn-label"]], "method", false, false, false, 83), "html", null, true);
                yield ">";
                yield from                 $this->unwrap()->yieldBlock("content", $context, $blocks);
                yield "</span>
        ";
            }
            // line 85
            yield "        ";
            if (((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 85, $this->source); })()) && (isset($context["withTrailingIcon"]) || array_key_exists("withTrailingIcon", $context) ? $context["withTrailingIcon"] : (function () { throw new RuntimeError('Variable "withTrailingIcon" does not exist.', 85, $this->source); })()))) {
                // line 86
                yield "            ";
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 86, $this->source); })()), "class" => "btn-icon btn-icon-trailing"]);
                yield "
        ";
            }
            // line 88
            yield "    </button>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@EasyAdmin/components/Button.html.twig";
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
        return array (  466 => 88,  460 => 86,  457 => 85,  449 => 83,  446 => 82,  440 => 80,  438 => 79,  433 => 78,  420 => 77,  416 => 76,  412 => 75,  407 => 74,  402 => 71,  396 => 69,  393 => 68,  385 => 66,  382 => 65,  376 => 63,  374 => 62,  368 => 60,  355 => 59,  350 => 58,  343 => 57,  337 => 56,  333 => 55,  329 => 54,  326 => 53,  320 => 51,  318 => 50,  309 => 49,  307 => 48,  304 => 47,  298 => 45,  295 => 44,  287 => 42,  284 => 41,  278 => 39,  276 => 38,  271 => 37,  258 => 36,  254 => 35,  249 => 33,  244 => 32,  242 => 31,  239 => 30,  237 => 28,  236 => 27,  235 => 26,  234 => 25,  232 => 24,  230 => 23,  227 => 22,  225 => 21,  223 => 20,  220 => 18,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% props
    variant = 'default', # primary|default|danger|success|warning (default: 'default')
    isInvisible = false, # true|false (default: false) if true, button has transparent background and no border
    isBlock = false, # true|false (default: false) if true, button takes full width of container
    size = 'md', # sm|md|lg (default: 'md')
    icon = null, # icon name string (e.g., 'tabler:user' or 'fa fas fa-user')
    withTrailingIcon = false, # boolean to show icon after label (default: false)
    inactive = false, # boolean to disable the button (default: false)
    htmlElement = 'button', # button|a|form (default: 'button')
    htmlAttributes = {}, # additional HTML attributes as key-value pairs
    href = '#', # URL for link buttons (default: '#')
    action = null, # form action URL (for htmlElement='form')
    method = 'POST', # HTTP method for forms (default: 'POST')
    type = null, # button|submit (default: 'submit') button type attribute
    name = null, # form button name attribute
    value = null, # form button value attribute
%}

{# handle both string and enum values #}
{% set html_element_value = htmlElement.value is defined ? htmlElement.value : htmlElement %}
{% set variant_value = variant.value is defined ? variant.value : variant %}

{% set variant_class = variant_value == 'default' ? 'btn-secondary' : 'btn-' ~ variant_value %}
{% set size_class = size == 'md' ? '' : 'btn-' ~ size %}
{% set css_class = html_classes('btn', variant_class, size_class, {
    'btn-invisible': isInvisible,
    'btn-block': isBlock,
    disabled: inactive,
}) %}

{% if html_element_value == 'a' %}
    <a {{ attributes.only('class').defaults({class: css_class}) }}
       href=\"{{ inactive ? '#' : href }}\"
       role=\"button\"
       {% if inactive %}aria-disabled=\"true\" tabindex=\"-1\"{% endif %}
       {% for attrName, attrValue in htmlAttributes %}{{ attrName }}=\"{{ (attrValue.trans is defined ? attrValue|trans : attrValue)|e('html') }}\" {% endfor %}
       {{ attributes.without('class', 'href', 'role', 'aria-disabled', 'tabindex')|raw }}>
        {% if icon and not withTrailingIcon %}
            {{ component('ea:Icon', { name: (icon), class: 'btn-icon' }) }}
        {% endif %}
        {% if block('content') is defined and block('content') is not empty %}
            <span {{ attributes.nested('label').defaults({class: 'btn-label'}) }}>{{ block('content') }}</span>
        {% endif %}
        {% if icon and withTrailingIcon %}
            {{ component('ea:Icon', { name: (icon), class: 'btn-icon btn-icon-trailing' }) }}
        {% endif %}
    </a>
{% elseif html_element_value == 'form' %}
    <form action=\"{{ action }}\" method=\"{{ method }}\" {{ attributes.only('id', 'class', 'data-*') }}>
        {% if method|upper not in ['GET', 'POST'] %}
            <input type=\"hidden\" name=\"_method\" value=\"{{ method|upper }}\">
        {% endif %}

        <button {{ attributes.only('class').defaults({class: css_class}) }}
            type=\"{{ type ?? 'submit' }}\"
            {% if name %}name=\"{{ name }}\"{% endif %}
            {% if value %}value=\"{{ value }}\"{% endif %}
            {% if inactive %}disabled=\"disabled\"{% endif %}
            {% for attrName, attrValue in htmlAttributes %}{{ attrName }}=\"{{ (attrValue.trans is defined ? attrValue|trans : attrValue)|e('html') }}\" {% endfor %}
            {{ attributes.without('class', 'form', 'type', 'name', 'value', 'disabled')|raw }}
        >
            {% if icon and not withTrailingIcon %}
                {{ component('ea:Icon', { name: (icon), class: 'btn-icon' }) }}
            {% endif %}
            {% if block('content') is defined and block('content') is not empty %}
                <span {{ attributes.nested('label').defaults({class: 'btn-label'}) }}>{{ block('content') }}</span>
            {% endif %}
            {% if icon and withTrailingIcon %}
                {{ component('ea:Icon', { name: (icon), class: 'btn-icon btn-icon-trailing' }) }}
            {% endif %}
        </button>
    </form>
{% else %}
    <button {{ attributes.only('class').defaults({class: css_class}) }}
        type=\"{{ type ?? 'submit' }}\"
        {% if inactive %}disabled=\"disabled\"{% endif %}
        {% for attrName, attrValue in htmlAttributes %}{{ attrName }}=\"{{ (attrValue.trans is defined ? attrValue|trans : attrValue)|e('html') }}\" {% endfor %}
        {{ attributes.without('class', 'type', 'disabled')|raw }}>
        {% if icon and not withTrailingIcon %}
            {{ component('ea:Icon', { name: (icon), class: 'btn-icon' }) }}
        {% endif %}
        {% if block('content') is defined and block('content') is not empty %}
            <span {{ attributes.nested('label').defaults({class: 'btn-label'}) }}>{{ block('content') }}</span>
        {% endif %}
        {% if icon and withTrailingIcon %}
            {{ component('ea:Icon', { name: (icon), class: 'btn-icon btn-icon-trailing' }) }}
        {% endif %}
    </button>
{% endif %}
", "@EasyAdmin/components/Button.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/easycorp/easyadmin-bundle/templates/components/Button.html.twig");
    }
}
