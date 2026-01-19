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

/* pages/rgpd/deletion_cancel_error.html.twig */
class __TwigTemplate_513666f21e7bbbcf4af97f11914d1bba extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/deletion_cancel_error.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/deletion_cancel_error.html.twig"));

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

        yield "Lien invalide";
        
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
\t\t.result-container {
\t\t\tmax-width: 600px;
\t\t\tmargin: 4rem auto;
\t\t\tpadding: 2rem;
\t\t\ttext-align: center;
\t\t}
\t\t.result-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 3rem 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.error-icon {
\t\t\tfont-size: 4rem;
\t\t\tcolor: #dc3545;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.result-card h1 {
\t\t\tcolor: #dc3545;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.result-card p {
\t\t\tcolor: #6c757d;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 36
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

        // line 37
        yield "\t<div class=\"result-container\">
\t\t<div class=\"result-card\">
\t\t\t<div class=\"error-icon\">
\t\t\t\t";
        // line 40
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:x-circle-fill"]);
        yield "
\t\t\t</div>
\t\t\t<h1>Lien invalide ou expiré</h1>
\t\t\t<p>
\t\t\t\tCe lien d'annulation n'est plus valide.<br>
\t\t\t\tIl a peut-être déjà été utilisé ou le délai de 48 heures est dépassé.
\t\t\t</p>
\t\t\t<a href=\"";
        // line 47
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home_index");
        yield "\" class=\"btn btn-primary\">
\t\t\t\t";
        // line 48
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-1", "name" => "bi:house"]);
        yield "
\t\t\t\tRetour à l'accueil
\t\t\t</a>
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
        return "pages/rgpd/deletion_cancel_error.html.twig";
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
        return array (  174 => 48,  170 => 47,  160 => 40,  155 => 37,  142 => 36,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Lien invalide{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<style>
\t\t.result-container {
\t\t\tmax-width: 600px;
\t\t\tmargin: 4rem auto;
\t\t\tpadding: 2rem;
\t\t\ttext-align: center;
\t\t}
\t\t.result-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 3rem 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.error-icon {
\t\t\tfont-size: 4rem;
\t\t\tcolor: #dc3545;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.result-card h1 {
\t\t\tcolor: #dc3545;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.result-card p {
\t\t\tcolor: #6c757d;
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t</style>
{% endblock %}

{% block body %}
\t<div class=\"result-container\">
\t\t<div class=\"result-card\">
\t\t\t<div class=\"error-icon\">
\t\t\t\t{{ component('ux:icon', { name: 'bi:x-circle-fill' }) }}
\t\t\t</div>
\t\t\t<h1>Lien invalide ou expiré</h1>
\t\t\t<p>
\t\t\t\tCe lien d'annulation n'est plus valide.<br>
\t\t\t\tIl a peut-être déjà été utilisé ou le délai de 48 heures est dépassé.
\t\t\t</p>
\t\t\t<a href=\"{{ path('home_index') }}\" class=\"btn btn-primary\">
\t\t\t\t{{ component('ux:icon', { class: 'me-1', name: 'bi:house' }) }}
\t\t\t\tRetour à l'accueil
\t\t\t</a>
\t\t</div>
\t</div>
{% endblock %}
", "pages/rgpd/deletion_cancel_error.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/rgpd/deletion_cancel_error.html.twig");
    }
}
