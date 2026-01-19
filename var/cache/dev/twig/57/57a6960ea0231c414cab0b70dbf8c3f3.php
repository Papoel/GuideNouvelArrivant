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

/* admin/field/user_role_badge.html.twig */
class __TwigTemplate_e17a15167030558678c2efcac468bcab extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/user_role_badge.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/user_role_badge.html.twig"));

        // line 1
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 1, $this->source); })()), "value", [], "any", false, false, false, 1))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "    ";
            $context["highestRole"] = $this->extensions['App\Twig\RoleExtension']->getHighestRole(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 2, $this->source); })()), "value", [], "any", false, false, false, 2));
            // line 3
            yield "    ";
            $context["roleStyle"] = $this->extensions['App\Twig\RoleExtension']->getRoleStyle((isset($context["highestRole"]) || array_key_exists("highestRole", $context) ? $context["highestRole"] : (function () { throw new RuntimeError('Variable "highestRole" does not exist.', 3, $this->source); })()));
            // line 4
            yield "    
    <span class=\"badge rounded-pill px-2\" style=\"background-color: ";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 5, $this->source); })()), "color", [], "any", false, false, false, 5), "html", null, true);
            yield "; color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 5, $this->source); })()), "text", [], "any", false, false, false, 5), "html", null, true);
            yield "; font-weight: 500; font-size: 0.85rem;\">
        ";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 6, $this->source); })()), "label", [], "any", false, false, false, 6), "html", null, true);
            yield "
    </span>
";
        } else {
            // line 9
            yield "    ";
            $context["roleStyle"] = $this->extensions['App\Twig\RoleExtension']->getRoleStyle("ROLE_USER");
            // line 10
            yield "    <span class=\"badge rounded-pill px-2\" style=\"background-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 10, $this->source); })()), "color", [], "any", false, false, false, 10), "html", null, true);
            yield "; color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 10, $this->source); })()), "text", [], "any", false, false, false, 10), "html", null, true);
            yield "; font-weight: 500; font-size: 0.85rem;\">
        ";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleStyle"]) || array_key_exists("roleStyle", $context) ? $context["roleStyle"] : (function () { throw new RuntimeError('Variable "roleStyle" does not exist.', 11, $this->source); })()), "label", [], "any", false, false, false, 11), "html", null, true);
            yield "
    </span>
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
        return "admin/field/user_role_badge.html.twig";
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
        return array (  81 => 11,  74 => 10,  71 => 9,  65 => 6,  59 => 5,  56 => 4,  53 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if field.value is not empty %}
    {% set highestRole = get_highest_role(field.value) %}
    {% set roleStyle = get_role_style(highestRole) %}
    
    <span class=\"badge rounded-pill px-2\" style=\"background-color: {{ roleStyle.color }}; color: {{ roleStyle.text }}; font-weight: 500; font-size: 0.85rem;\">
        {{ roleStyle.label }}
    </span>
{% else %}
    {% set roleStyle = get_role_style('ROLE_USER') %}
    <span class=\"badge rounded-pill px-2\" style=\"background-color: {{ roleStyle.color }}; color: {{ roleStyle.text }}; font-weight: 500; font-size: 0.85rem;\">
        {{ roleStyle.label }}
    </span>
{% endif %}
", "admin/field/user_role_badge.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/field/user_role_badge.html.twig");
    }
}
