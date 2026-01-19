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

/* @FlasherSymfony/tailwindcss_r.html.twig */
class __TwigTemplate_9dac329f38b873e616e4a67f3320f186 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/tailwindcss_r.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/tailwindcss_r.html.twig"));

        // line 1
        if (("success" == CoreExtension::getAttribute($this->env, $this->source, (isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 1, $this->source); })()), "type", [], "any", false, false, false, 1))) {
            // line 2
            yield "    ";
            $context["title"] = "Success";
            // line 3
            yield "    ";
            $context["text_color"] = "text-green-600";
            // line 4
            yield "    ";
            $context["ring_color"] = "ring-green-300";
            // line 5
            yield "    ";
            $context["background_color"] = "bg-green-600";
            // line 6
            yield "    ";
            $context["progress_background_color"] = "bg-green-100";
            // line 7
            yield "    ";
            $context["border_color"] = "border-green-600";
            // line 8
            yield "    ";
            $context["icon"] = "<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"check w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"/></svg>";
        } elseif (("error" == CoreExtension::getAttribute($this->env, $this->source,         // line 9
(isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 9, $this->source); })()), "type", [], "any", false, false, false, 9))) {
            // line 10
            yield "    ";
            $context["title"] = "Error";
            // line 11
            yield "    ";
            $context["text_color"] = "text-red-600";
            // line 12
            yield "    ";
            $context["ring_color"] = "ring-red-300";
            // line 13
            yield "    ";
            $context["background_color"] = "bg-red-600";
            // line 14
            yield "    ";
            $context["progress_background_color"] = "bg-red-100";
            // line 15
            yield "    ";
            $context["border_color"] = "border-red-600";
            // line 16
            yield "    ";
            $context["icon"] = "<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"x w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M6 18L18 6M6 6l12 12\"/></svg>";
        } elseif (("warning" == CoreExtension::getAttribute($this->env, $this->source,         // line 17
(isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 17, $this->source); })()), "type", [], "any", false, false, false, 17))) {
            // line 18
            yield "    ";
            $context["title"] = "Warning";
            // line 19
            yield "    ";
            $context["text_color"] = "text-yellow-600";
            // line 20
            yield "    ";
            $context["ring_color"] = "ring-yellow-300";
            // line 21
            yield "    ";
            $context["background_color"] = "bg-yellow-600";
            // line 22
            yield "    ";
            $context["progress_background_color"] = "bg-yellow-100";
            // line 23
            yield "    ";
            $context["border_color"] = "border-yellow-600";
            // line 24
            yield "    ";
            $context["icon"] = "<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"exclamation w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\"/></svg>";
        } else {
            // line 26
            yield "    ";
            $context["title"] = "Info";
            // line 27
            yield "    ";
            $context["text_color"] = "text-blue-600";
            // line 28
            yield "    ";
            $context["ring_color"] = "ring-blue-300";
            // line 29
            yield "    ";
            $context["background_color"] = "bg-blue-600";
            // line 30
            yield "    ";
            $context["progress_background_color"] = "bg-blue-100";
            // line 31
            yield "    ";
            $context["border_color"] = "border-blue-600";
            // line 32
            yield "    ";
            $context["icon"] = "<svg class=\"w-8 h-8\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>";
        }
        // line 34
        yield "

<div class=\"bg-white shadow-inner border-l-4 mt-2 cursor-pointer ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["border_color"]) || array_key_exists("border_color", $context) ? $context["border_color"] : (function () { throw new RuntimeError('Variable "border_color" does not exist.', 36, $this->source); })()), "html", null, true);
        yield "\">
    <div class=\"flex items-center px-2 py-3 rounded-lg shadow-lg overflow-hidden\">
        <div class=\"inline-flex items-center ";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["text_color"]) || array_key_exists("text_color", $context) ? $context["text_color"] : (function () { throw new RuntimeError('Variable "text_color" does not exist.', 38, $this->source); })()), "html", null, true);
        yield " p-1 text-xl rounded-full flex-shrink-0\">
            ";
        // line 39
        yield (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 39, $this->source); })());
        yield "
        </div>
        <div class=\"ml-4 w-0 flex-1\">
            <p class=\"text-base leading-5 font-medium capitalize ";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["text_color"]) || array_key_exists("text_color", $context) ? $context["text_color"] : (function () { throw new RuntimeError('Variable "text_color" does not exist.', 42, $this->source); })()), "html", null, true);
        yield "\">
                ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 43, $this->source); })())), "html", null, true);
        yield "
            </p>
            <p class=\"mt-1 text-sm leading-5 text-gray-500\">
                ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 46, $this->source); })()), "message", [], "any", false, false, false, 46), "html", null, true);
        yield "
            </p>
        </div>
    </div>
    <div class=\"h-0.5 flex ";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress_background_color"]) || array_key_exists("progress_background_color", $context) ? $context["progress_background_color"] : (function () { throw new RuntimeError('Variable "progress_background_color" does not exist.', 50, $this->source); })()), "html", null, true);
        yield "\">
        <span class=\"flasher-progress ";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["background_color"]) || array_key_exists("background_color", $context) ? $context["background_color"] : (function () { throw new RuntimeError('Variable "background_color" does not exist.', 51, $this->source); })()), "html", null, true);
        yield "\"></span>
    </div>
</div>
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
        return "@FlasherSymfony/tailwindcss_r.html.twig";
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
        return array (  180 => 51,  176 => 50,  169 => 46,  163 => 43,  159 => 42,  153 => 39,  149 => 38,  144 => 36,  140 => 34,  136 => 32,  133 => 31,  130 => 30,  127 => 29,  124 => 28,  121 => 27,  118 => 26,  114 => 24,  111 => 23,  108 => 22,  105 => 21,  102 => 20,  99 => 19,  96 => 18,  94 => 17,  91 => 16,  88 => 15,  85 => 14,  82 => 13,  79 => 12,  76 => 11,  73 => 10,  71 => 9,  68 => 8,  65 => 7,  62 => 6,  59 => 5,  56 => 4,  53 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if 'success' == envelope.type %}
    {% set title = 'Success' %}
    {% set text_color = 'text-green-600' %}
    {% set ring_color = 'ring-green-300' %}
    {% set background_color = 'bg-green-600' %}
    {% set progress_background_color = 'bg-green-100' %}
    {% set border_color = 'border-green-600' %}
    {% set icon = '<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"check w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"/></svg>' %}
{% elseif 'error' == envelope.type %}
    {% set title = 'Error' %}
    {% set text_color = 'text-red-600' %}
    {% set ring_color = 'ring-red-300' %}
    {% set background_color = 'bg-red-600' %}
    {% set progress_background_color = 'bg-red-100' %}
    {% set border_color = 'border-red-600' %}
    {% set icon = '<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"x w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M6 18L18 6M6 6l12 12\"/></svg>' %}
{% elseif 'warning' == envelope.type %}
    {% set title = 'Warning' %}
    {% set text_color = 'text-yellow-600' %}
    {% set ring_color = 'ring-yellow-300' %}
    {% set background_color = 'bg-yellow-600' %}
    {% set progress_background_color = 'bg-yellow-100' %}
    {% set border_color = 'border-yellow-600' %}
    {% set icon = '<svg fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" class=\"exclamation w-8 h-8\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\"/></svg>' %}
{% else %}
    {% set title = 'Info' %}
    {% set text_color = 'text-blue-600' %}
    {% set ring_color = 'ring-blue-300' %}
    {% set background_color = 'bg-blue-600' %}
    {% set progress_background_color = 'bg-blue-100' %}
    {% set border_color = 'border-blue-600' %}
    {% set icon = '<svg class=\"w-8 h-8\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>' %}
{% endif %}


<div class=\"bg-white shadow-inner border-l-4 mt-2 cursor-pointer {{ border_color }}\">
    <div class=\"flex items-center px-2 py-3 rounded-lg shadow-lg overflow-hidden\">
        <div class=\"inline-flex items-center {{ text_color }} p-1 text-xl rounded-full flex-shrink-0\">
            {{ icon | raw }}
        </div>
        <div class=\"ml-4 w-0 flex-1\">
            <p class=\"text-base leading-5 font-medium capitalize {{ text_color }}\">
                {{ title | trans }}
            </p>
            <p class=\"mt-1 text-sm leading-5 text-gray-500\">
                {{ envelope.message }}
            </p>
        </div>
    </div>
    <div class=\"h-0.5 flex {{ progress_background_color }}\">
        <span class=\"flasher-progress {{ background_color }}\"></span>
    </div>
</div>
", "@FlasherSymfony/tailwindcss_r.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/php-flasher/flasher-symfony/Resources/views/tailwindcss_r.html.twig");
    }
}
