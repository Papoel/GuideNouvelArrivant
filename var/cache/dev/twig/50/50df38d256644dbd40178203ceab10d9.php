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

/* @FlasherSymfony/bootstrap.html.twig */
class __TwigTemplate_80d93a2279bb20cfa2b6621573b92e6f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/bootstrap.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/bootstrap.html.twig"));

        // line 1
        if (("success" == CoreExtension::getAttribute($this->env, $this->source, (isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 1, $this->source); })()), "type", [], "any", false, false, false, 1))) {
            // line 2
            yield "    ";
            $context["title"] = "Success";
            // line 3
            yield "    ";
            $context["alert_class"] = "alert-success";
            // line 4
            yield "    ";
            $context["progress_bg_color"] = "#155724";
        } elseif (("error" == CoreExtension::getAttribute($this->env, $this->source,         // line 5
(isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 5, $this->source); })()), "type", [], "any", false, false, false, 5))) {
            // line 6
            yield "    ";
            $context["title"] = "Error";
            // line 7
            yield "    ";
            $context["alert_class"] = "alert-danger";
            // line 8
            yield "    ";
            $context["progress_bg_color"] = "#721c24";
        } elseif (("warning" == CoreExtension::getAttribute($this->env, $this->source,         // line 9
(isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 9, $this->source); })()), "type", [], "any", false, false, false, 9))) {
            // line 10
            yield "    ";
            $context["title"] = "Warning";
            // line 11
            yield "    ";
            $context["alert_class"] = "alert-warning";
            // line 12
            yield "    ";
            $context["progress_bg_color"] = "#856404";
        } else {
            // line 14
            yield "    ";
            $context["title"] = "Info";
            // line 15
            yield "    ";
            $context["alert_class"] = "alert-info";
            // line 16
            yield "    ";
            $context["progress_bg_color"] = "#0c5460";
        }
        // line 18
        yield "
<div style=\"margin-top: 0.5rem;cursor: pointer;\">
    <div class=\"alert ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["alert_class"]) || array_key_exists("alert_class", $context) ? $context["alert_class"] : (function () { throw new RuntimeError('Variable "alert_class" does not exist.', 20, $this->source); })()), "html", null, true);
        yield " alert-dismissible fade in show\" role=\"alert\" style=\"border-top-left-radius: 0;border-bottom-left-radius: 0;border: unset;border-left: 6px solid ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress_bg_color"]) || array_key_exists("progress_bg_color", $context) ? $context["progress_bg_color"] : (function () { throw new RuntimeError('Variable "progress_bg_color" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "\">
        ";
        // line 22
        yield "        ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["envelope"]) || array_key_exists("envelope", $context) ? $context["envelope"] : (function () { throw new RuntimeError('Variable "envelope" does not exist.', 22, $this->source); })()), "message", [], "any", false, false, false, 22), "html", null, true);
        yield "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" onclick=\"this.parentElement.remove()\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>
    <div class=\"d-flex\" style=\"height: .125rem;margin-top: -1rem;\">
        <span class=\"flasher-progress\" style=\"background-color: ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress_bg_color"]) || array_key_exists("progress_bg_color", $context) ? $context["progress_bg_color"] : (function () { throw new RuntimeError('Variable "progress_bg_color" does not exist.', 28, $this->source); })()), "html", null, true);
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
        return "@FlasherSymfony/bootstrap.html.twig";
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
        return array (  112 => 28,  102 => 22,  96 => 20,  92 => 18,  88 => 16,  85 => 15,  82 => 14,  78 => 12,  75 => 11,  72 => 10,  70 => 9,  67 => 8,  64 => 7,  61 => 6,  59 => 5,  56 => 4,  53 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if 'success' == envelope.type %}
    {% set title = 'Success' %}
    {% set alert_class = 'alert-success' %}
    {% set progress_bg_color = '#155724' %}
{% elseif 'error' == envelope.type %}
    {% set title = 'Error' %}
    {% set alert_class = 'alert-danger' %}
    {% set progress_bg_color = '#721c24' %}
{% elseif 'warning' == envelope.type %}
    {% set title = 'Warning' %}
    {% set alert_class = 'alert-warning' %}
    {% set progress_bg_color = '#856404' %}
{% else %}
    {% set title = 'Info' %}
    {% set alert_class = 'alert-info' %}
    {% set progress_bg_color = '#0c5460' %}
{% endif %}

<div style=\"margin-top: 0.5rem;cursor: pointer;\">
    <div class=\"alert {{ alert_class }} alert-dismissible fade in show\" role=\"alert\" style=\"border-top-left-radius: 0;border-bottom-left-radius: 0;border: unset;border-left: 6px solid {{ progress_bg_color }}\">
        {#        <strong>{{ title | trans }} !</strong> #}
        {{ envelope.message }}
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" onclick=\"this.parentElement.remove()\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>
    <div class=\"d-flex\" style=\"height: .125rem;margin-top: -1rem;\">
        <span class=\"flasher-progress\" style=\"background-color: {{ progress_bg_color }}\"></span>
    </div>
</div>
", "@FlasherSymfony/bootstrap.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/php-flasher/flasher-symfony/Resources/views/bootstrap.html.twig");
    }
}
