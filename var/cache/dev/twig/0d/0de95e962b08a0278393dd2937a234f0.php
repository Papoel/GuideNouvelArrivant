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

/* pages/rgpd/account_deletion_cancel_confirm.html.twig */
class __TwigTemplate_839bf47aceb4716139e37995d28103ce extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/account_deletion_cancel_confirm.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/account_deletion_cancel_confirm.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Annuler la demande de suppression";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<style>
\t\t.cancel-container {
\t\t\tmax-width: 600px;
\t\t\tmargin: 3rem auto;
\t\t\tpadding: 0 1rem;
\t\t}
\t\t.cancel-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t\ttext-align: center;
\t\t}
\t\t.cancel-icon {
\t\t\tfont-size: 4rem;
\t\t\tcolor: #ffc107;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.cancel-card h1 {
\t\t\tcolor: #2c384e;
\t\t\tfont-size: 1.5rem;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.cancel-card p {
\t\t\tcolor: #6c757d;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.info-box {
\t\t\tbackground: #d1ecf1;
\t\t\tborder-left: 4px solid #17a2b8;
\t\t\tpadding: 1rem;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t\ttext-align: left;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.info-box strong {
\t\t\tcolor: #0c5460;
\t\t}
\t\t.info-box p {
\t\t\tcolor: #0c5460;
\t\t\tmargin: 0.5rem 0 0 0;
\t\t\tfont-size: 0.9rem;
\t\t}
\t\t.btn-group-actions {
\t\t\tdisplay: flex;
\t\t\tgap: 1rem;
\t\t\tjustify-content: center;
\t\t\tflex-wrap: wrap;
\t\t}
\t</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 59
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 60
        yield "\t<div class=\"cancel-container\">
\t\t<div class=\"cancel-card\">
\t\t\t<div class=\"cancel-icon\">
\t\t\t\t";
        // line 63
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:question-circle-fill"]);
        yield "
\t\t\t</div>
\t\t\t
\t\t\t<h1>Annuler la demande de suppression ?</h1>
\t\t\t
\t\t\t<p>
\t\t\t\tVous avez demandé la suppression de votre compte le 
\t\t\t\t<strong>";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pendingRequest"]) || array_key_exists("pendingRequest", $context) ? $context["pendingRequest"] : (function () { throw new RuntimeError('Variable "pendingRequest" does not exist.', 70, $this->source); })()), "requestedAt", [], "any", false, false, false, 70), "d/m/Y à H:i", "Europe/Paris"), "html", null, true);
        yield "</strong>.
\t\t\t</p>
\t\t\t
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>";
        // line 74
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:info-circle", "class" => "me-1"]);
        yield " Si vous annulez :</strong>
\t\t\t\t<p>
\t\t\t\t\tVotre compte et toutes vos données seront conservés.<br>
\t\t\t\t\tVous pourrez continuer à utiliser l'application normalement.
\t\t\t\t</p>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"btn-group-actions\">
\t\t\t\t<a href=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82), "nni", [], "any", false, false, false, 82)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
\t\t\t\t\t";
        // line 83
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:arrow-left", "class" => "me-1"]);
        yield "
\t\t\t\t\tRetour au tableau de bord
\t\t\t\t</a>
\t\t\t\t
\t\t\t\t<form action=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_deletion_cancel");
        yield "\" method=\"post\" style=\"display: inline;\">
\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("cancel-deletion"), "html", null, true);
        yield "\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-success\">
\t\t\t\t\t\t";
        // line 90
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:check-lg", "class" => "me-1"]);
        yield "
\t\t\t\t\t\tOui, annuler ma demande
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/rgpd/account_deletion_cancel_confirm.html.twig";
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
        return array (  231 => 90,  226 => 88,  222 => 87,  215 => 83,  211 => 82,  200 => 74,  193 => 70,  183 => 63,  178 => 60,  165 => 59,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Annuler la demande de suppression{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<style>
\t\t.cancel-container {
\t\t\tmax-width: 600px;
\t\t\tmargin: 3rem auto;
\t\t\tpadding: 0 1rem;
\t\t}
\t\t.cancel-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t\ttext-align: center;
\t\t}
\t\t.cancel-icon {
\t\t\tfont-size: 4rem;
\t\t\tcolor: #ffc107;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.cancel-card h1 {
\t\t\tcolor: #2c384e;
\t\t\tfont-size: 1.5rem;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.cancel-card p {
\t\t\tcolor: #6c757d;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.info-box {
\t\t\tbackground: #d1ecf1;
\t\t\tborder-left: 4px solid #17a2b8;
\t\t\tpadding: 1rem;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t\ttext-align: left;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.info-box strong {
\t\t\tcolor: #0c5460;
\t\t}
\t\t.info-box p {
\t\t\tcolor: #0c5460;
\t\t\tmargin: 0.5rem 0 0 0;
\t\t\tfont-size: 0.9rem;
\t\t}
\t\t.btn-group-actions {
\t\t\tdisplay: flex;
\t\t\tgap: 1rem;
\t\t\tjustify-content: center;
\t\t\tflex-wrap: wrap;
\t\t}
\t</style>
{% endblock %}

{% block body %}
\t<div class=\"cancel-container\">
\t\t<div class=\"cancel-card\">
\t\t\t<div class=\"cancel-icon\">
\t\t\t\t{{ component('ux:icon', { name: 'bi:question-circle-fill' }) }}
\t\t\t</div>
\t\t\t
\t\t\t<h1>Annuler la demande de suppression ?</h1>
\t\t\t
\t\t\t<p>
\t\t\t\tVous avez demandé la suppression de votre compte le 
\t\t\t\t<strong>{{ pendingRequest.requestedAt|date('d/m/Y à H:i', 'Europe/Paris') }}</strong>.
\t\t\t</p>
\t\t\t
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>{{ component('ux:icon', { name: 'bi:info-circle', class: 'me-1' }) }} Si vous annulez :</strong>
\t\t\t\t<p>
\t\t\t\t\tVotre compte et toutes vos données seront conservés.<br>
\t\t\t\t\tVous pourrez continuer à utiliser l'application normalement.
\t\t\t\t</p>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"btn-group-actions\">
\t\t\t\t<a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"btn btn-outline-secondary\">
\t\t\t\t\t{{ component('ux:icon', { name: 'bi:arrow-left', class: 'me-1' }) }}
\t\t\t\t\tRetour au tableau de bord
\t\t\t\t</a>
\t\t\t\t
\t\t\t\t<form action=\"{{ path('app_account_deletion_cancel') }}\" method=\"post\" style=\"display: inline;\">
\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('cancel-deletion') }}\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-success\">
\t\t\t\t\t\t{{ component('ux:icon', { name: 'bi:check-lg', class: 'me-1' }) }}
\t\t\t\t\t\tOui, annuler ma demande
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}
", "pages/rgpd/account_deletion_cancel_confirm.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/rgpd/account_deletion_cancel_confirm.html.twig");
    }
}
