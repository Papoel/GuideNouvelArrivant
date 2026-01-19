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

/* app/dashboard/feedback/new.html.twig */
class __TwigTemplate_75dbba57cdffdbbb8b1a851afcc2a7f4 extends Template
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
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/new.html.twig"));

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

        yield "Nouveau retour d'expérience";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardHeader.html.twig", 6)->unwrap()->yield($context);
        // line 7
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardAside.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
    <main id=\"main\" class=\"main\">
        <!-- En-tête avec bordure latérale élégante -->
        <div class=\"dashboard-header mb-4 border-start border-primary ps-3\" style=\"border-left-width: 5px !important; border-left-color: #3d5f9e !important;\">
            <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Nouveau retour d'expérience</h1>
            <nav class=\"mt-2\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "nni", [], "any", false, false, false, 15)]), "html", null, true);
        yield "\" class=\"text-decoration-none\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Nouveau REX</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <!-- Carte principale avec ombre douce et coins arrondis -->
                    <div class=\"card border-0 shadow-sm\" style=\"border-radius: 0.75rem;\">
                        <div class=\"card-header bg-white py-3 px-4 border-0\" style=\"border-top-left-radius: 0.75rem; border-top-right-radius: 0.75rem;\">
                            <h5 class=\"mb-0 fw-bold text-dark\">
                                <i class=\"fas fa-pen-fancy text-primary me-2\"></i>Partagez votre retour d'expérience
                            </h5>
                            <p class=\"text-muted mb-0 mt-2 fw-light\">Votre retour d'expérience nous aide à améliorer continuellement nos processus</p>
                        </div>
                        
                        <div class=\"card-body p-4\">
                            <div class=\"alert d-flex align-items-center mb-4\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                                <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                                <div>
                                    Tous les champs marqués d'un astérisque (*) sont obligatoires. Votre retour sera examiné par un manager qui pourra vous apporter une réponse.
                                </div>
                            </div>

                            ";
        // line 41
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
                            
                            <div class=\"mb-4\">
                                ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "title", [], "any", false, false, false, 44), 'label', ["label_attr" => ["class" => "form-label fw-medium"], "label" => "Titre de votre retour d'expérience *"]);
        yield "
                                ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "title", [], "any", false, false, false, 45), 'widget', ["attr" => ["class" => "form-control form-control-lg", "placeholder" => "Donnez un titre explicite à votre retour"]]);
        yield "
                                <div class=\"form-text\">Un titre clair permettra une meilleure prise en compte de votre retour.</div>
                                ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "title", [], "any", false, false, false, 47), 'errors', ["attr" => ["class" => "invalid-feedback"]]);
        yield "
                            </div>
                            
                            <div class=\"mb-4\">
                                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "category", [], "any", false, false, false, 51), 'label', ["label_attr" => ["class" => "form-label fw-medium"], "label" => "Catégorie *"]);
        yield "
                                ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "category", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "form-select form-select-lg"]]);
        yield "
                                <div class=\"form-text\">Sélectionnez la catégorie qui correspond le mieux à votre retour.</div>
                                ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "category", [], "any", false, false, false, 54), 'errors', ["attr" => ["class" => "invalid-feedback"]]);
        yield "
                            </div>
                            
                            <div class=\"mb-4\">
                                ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "content", [], "any", false, false, false, 58), 'label', ["label_attr" => ["class" => "form-label fw-medium"], "label" => "Détail de votre retour d'expérience *"]);
        yield "
                                ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "content", [], "any", false, false, false, 59), 'widget', ["attr" => ["class" => "form-control", "rows" => "6", "placeholder" => "Décrivez votre expérience, les points positifs, les difficultés rencontrées et vos suggestions d'amélioration..."]]);
        yield "
                                <div class=\"form-text\">Soyez aussi précis que possible pour nous permettre de mieux comprendre votre retour.</div>
                                ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "content", [], "any", false, false, false, 61), 'errors', ["attr" => ["class" => "invalid-feedback"]]);
        yield "
                            </div>
                            
                            <div class=\"d-flex justify-content-between align-items-center mt-5\">
                                <a href=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 65, $this->source); })()), "user", [], "any", false, false, false, 65), "nni", [], "any", false, false, false, 65)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm transition-all\">
                                    <i class=\"fas fa-times me-2\"></i>Annuler
                                </a>
                                <button type=\"submit\" class=\"btn btn-primary rounded-pill px-4 py-2 shadow-sm transition-all\">
                                    <i class=\"fas fa-paper-plane me-2\"></i>Envoyer mon retour
                                </button>
                            </div>
                            ";
        // line 72
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), 'form_end');
        yield "
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    ";
        // line 80
        yield Twig\Extension\CoreExtension::include($this->env, $context, "app/dashboard/_dashboardFooter.html.twig");
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 83
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

        // line 84
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<style>
    .transition-all {
        transition: all 0.2s ease;
    }
    
    .btn-outline-secondary:hover,
    .btn-primary:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08) !important;
    }
    
    /* Style pour les champs de formulaire */
    .form-control, .form-select {
        padding: 0.6rem 0.75rem;
        border-color: #e9ecef;
        transition: all 0.2s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #3d5f9e;
        box-shadow: 0 0 0 0.25rem rgba(61, 95, 158, 0.25);
    }
    
    .form-label {
        font-size: 0.95rem;
        color: #2c384e;
    }
    
    .form-text {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 0.25rem;
    }
</style>
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
        return "app/dashboard/feedback/new.html.twig";
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
        return array (  246 => 84,  233 => 83,  220 => 80,  209 => 72,  199 => 65,  192 => 61,  187 => 59,  183 => 58,  176 => 54,  171 => 52,  167 => 51,  160 => 47,  155 => 45,  151 => 44,  145 => 41,  116 => 15,  107 => 8,  104 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Nouveau retour d'expérience{% endblock %}

{% block body %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <!-- En-tête avec bordure latérale élégante -->
        <div class=\"dashboard-header mb-4 border-start border-primary ps-3\" style=\"border-left-width: 5px !important; border-left-color: #3d5f9e !important;\">
            <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Nouveau retour d'expérience</h1>
            <nav class=\"mt-2\">
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"text-decoration-none\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Nouveau REX</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <!-- Carte principale avec ombre douce et coins arrondis -->
                    <div class=\"card border-0 shadow-sm\" style=\"border-radius: 0.75rem;\">
                        <div class=\"card-header bg-white py-3 px-4 border-0\" style=\"border-top-left-radius: 0.75rem; border-top-right-radius: 0.75rem;\">
                            <h5 class=\"mb-0 fw-bold text-dark\">
                                <i class=\"fas fa-pen-fancy text-primary me-2\"></i>Partagez votre retour d'expérience
                            </h5>
                            <p class=\"text-muted mb-0 mt-2 fw-light\">Votre retour d'expérience nous aide à améliorer continuellement nos processus</p>
                        </div>
                        
                        <div class=\"card-body p-4\">
                            <div class=\"alert d-flex align-items-center mb-4\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                                <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                                <div>
                                    Tous les champs marqués d'un astérisque (*) sont obligatoires. Votre retour sera examiné par un manager qui pourra vous apporter une réponse.
                                </div>
                            </div>

                            {{ form_start(form, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
                            
                            <div class=\"mb-4\">
                                {{ form_label(form.title, 'Titre de votre retour d\\'expérience *', {'label_attr': {'class': 'form-label fw-medium'}}) }}
                                {{ form_widget(form.title, {'attr': {'class': 'form-control form-control-lg', 'placeholder': 'Donnez un titre explicite à votre retour'}}) }}
                                <div class=\"form-text\">Un titre clair permettra une meilleure prise en compte de votre retour.</div>
                                {{ form_errors(form.title, {'attr': {'class': 'invalid-feedback'}}) }}
                            </div>
                            
                            <div class=\"mb-4\">
                                {{ form_label(form.category, 'Catégorie *', {'label_attr': {'class': 'form-label fw-medium'}}) }}
                                {{ form_widget(form.category, {'attr': {'class': 'form-select form-select-lg'}}) }}
                                <div class=\"form-text\">Sélectionnez la catégorie qui correspond le mieux à votre retour.</div>
                                {{ form_errors(form.category, {'attr': {'class': 'invalid-feedback'}}) }}
                            </div>
                            
                            <div class=\"mb-4\">
                                {{ form_label(form.content, 'Détail de votre retour d\\'expérience *', {'label_attr': {'class': 'form-label fw-medium'}}) }}
                                {{ form_widget(form.content, {'attr': {'class': 'form-control', 'rows': '6', 'placeholder': 'Décrivez votre expérience, les points positifs, les difficultés rencontrées et vos suggestions d\\'amélioration...'}}) }}
                                <div class=\"form-text\">Soyez aussi précis que possible pour nous permettre de mieux comprendre votre retour.</div>
                                {{ form_errors(form.content, {'attr': {'class': 'invalid-feedback'}}) }}
                            </div>
                            
                            <div class=\"d-flex justify-content-between align-items-center mt-5\">
                                <a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm transition-all\">
                                    <i class=\"fas fa-times me-2\"></i>Annuler
                                </a>
                                <button type=\"submit\" class=\"btn btn-primary rounded-pill px-4 py-2 shadow-sm transition-all\">
                                    <i class=\"fas fa-paper-plane me-2\"></i>Envoyer mon retour
                                </button>
                            </div>
                            {{ form_end(form) }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{ include('app/dashboard/_dashboardFooter.html.twig') }}
{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .transition-all {
        transition: all 0.2s ease;
    }
    
    .btn-outline-secondary:hover,
    .btn-primary:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08) !important;
    }
    
    /* Style pour les champs de formulaire */
    .form-control, .form-select {
        padding: 0.6rem 0.75rem;
        border-color: #e9ecef;
        transition: all 0.2s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #3d5f9e;
        box-shadow: 0 0 0 0.25rem rgba(61, 95, 158, 0.25);
    }
    
    .form-label {
        font-size: 0.95rem;
        color: #2c384e;
    }
    
    .form-text {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 0.25rem;
    }
</style>
{% endblock %}
", "app/dashboard/feedback/new.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/feedback/new.html.twig");
    }
}
