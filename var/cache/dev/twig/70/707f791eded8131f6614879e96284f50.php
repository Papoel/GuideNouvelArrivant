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

/* app/dashboard/feedback/my_feedbacks.html.twig */
class __TwigTemplate_b0b12f95a2215692996ea56f4a093216 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/my_feedbacks.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/my_feedbacks.html.twig"));

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

        yield "Mes retours d'expérience";
        
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
        yield "    <div class=\"container-fluid py-4\">
        <!-- En-tête avec bordure latérale élégante -->
        <div class=\"dashboard-header d-flex justify-content-between align-items-center mb-4 border-start border-primary ps-3\" style=\"border-left-width: 5px !important; border-left-color: #3d5f9e !important;\">
            <div>
                <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Mes retours d'expérience</h1>
                <p class=\"text-muted mb-0 mt-2 fw-light\">Consultez l'historique de vos retours d'expérience et leur traitement</p>
            </div>
            <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => (isset($context["nni"]) || array_key_exists("nni", $context) ? $context["nni"] : (function () { throw new RuntimeError('Variable "nni" does not exist.', 13, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-outline-primary rounded-pill px-4 shadow-sm transition-all\">
                <i class=\"fas fa-arrow-left me-2\"></i>Retour au tableau de bord
            </a>
        </div>

        <!-- Carte principale avec ombre douce et coins arrondis -->
        <div class=\"card border-0 shadow-sm mb-4\" style=\"border-radius: 0.75rem;\">
            <!-- En-tête de carte élégant -->
            <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-0\">
                <h5 class=\"mb-0 fw-bold text-dark\">
                    <i class=\"fas fa-list text-primary me-2\"></i>Liste de vos retours d'expérience
                </h5>
                <a href=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_new", ["nni" => (isset($context["nni"]) || array_key_exists("nni", $context) ? $context["nni"] : (function () { throw new RuntimeError('Variable "nni" does not exist.', 25, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-primary rounded-pill px-3 py-2 shadow-sm transition-all\">
                    <i class=\"fas fa-plus me-2\"></i>Nouveau retour
                </a>
            </div>
            
            <div class=\"card-body p-4\">
                ";
        // line 31
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 31, $this->source); })()))) {
            // line 32
            yield "                    <div class=\"alert d-flex align-items-center\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                        <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                        <div>
                            Vous n'avez pas encore soumis de retour d'expérience. Utilisez le bouton \"Nouveau retour\" pour partager votre expérience.
                        </div>
                    </div>
                ";
        } else {
            // line 39
            yield "                    <div class=\"table-responsive\">
                        <table class=\"table table-hover align-middle data-table\">
                            <thead class=\"bg-light\">
                                <tr>
                                    <th class=\"py-3\">Date</th>
                                    <th class=\"py-3\">Titre</th>
                                    <th class=\"py-3\">Catégorie</th>
                                    <th class=\"py-3\">Statut</th>
                                    <th class=\"py-3 text-center\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 51, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 52
                yield "                                    <tr class=\"feedback-row transition-all\">
                                        <td>
                                            <div class=\"d-flex align-items-center\">
                                                <i class=\"fas fa-calendar-alt text-primary me-2\"></i>
                                                ";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 56), "d/m/Y"), "html", null, true);
                yield "
                                            </div>
                                        </td>
                                        <td class=\"fw-medium text-dark\">";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 59), "html", null, true);
                yield "</td>
                                        <td>
                                            ";
                // line 61
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 69
                yield "
                                            ";
                // line 70
                $context["category_icons"] = ["integration_process" => "fas fa-users", "training" => "fas fa-graduation-cap", "documentation" => "fas fa-file-alt", "tools" => "fas fa-tools", "communication" => "fas fa-comments", "other" => "fas fa-question-circle"];
                // line 78
                yield "                                            
                                            ";
                // line 79
                $context["badge_colors"] = ["integration_process" => "#3d5f9e", "training" => "#2e7d32", "documentation" => "#0288d1", "tools" => "#ed6c02", "communication" => "#d32f2f", "other" => "#546e7a"];
                // line 87
                yield "
                                            <span class=\"badge rounded-pill px-3 py-2\" style=\"background-color: ";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_colors"]) || array_key_exists("badge_colors", $context) ? $context["badge_colors"] : (function () { throw new RuntimeError('Variable "badge_colors" does not exist.', 88, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 88), [], "array", false, false, false, 88), "html", null, true);
                yield "10; color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_colors"]) || array_key_exists("badge_colors", $context) ? $context["badge_colors"] : (function () { throw new RuntimeError('Variable "badge_colors" does not exist.', 88, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 88), [], "array", false, false, false, 88), "html", null, true);
                yield "; border: 1px solid ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_colors"]) || array_key_exists("badge_colors", $context) ? $context["badge_colors"] : (function () { throw new RuntimeError('Variable "badge_colors" does not exist.', 88, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 88), [], "array", false, false, false, 88), "html", null, true);
                yield "30;\">
                                                <i class=\"";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_icons"]) || array_key_exists("category_icons", $context) ? $context["category_icons"] : (function () { throw new RuntimeError('Variable "category_icons" does not exist.', 89, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 89), [], "array", false, false, false, 89), "html", null, true);
                yield " me-1\"></i>
                                                ";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 90, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 90), [], "array", false, false, false, 90), "html", null, true);
                yield "
                                            </span>
                                        </td>
                                        <td>
                                            ";
                // line 94
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 95
                    yield "                                                <span class=\"badge rounded-pill bg-success-subtle text-success px-3 py-2\">
                                                    <i class=\"fas fa-check-circle me-1\"></i> Traité
                                                </span>
                                            ";
                } else {
                    // line 99
                    yield "                                                <span class=\"badge rounded-pill bg-warning-subtle text-warning px-3 py-2\">
                                                    <i class=\"fas fa-clock me-1\"></i> En attente
                                                </span>
                                            ";
                }
                // line 103
                yield "                                        </td>
                                        <td class=\"text-center\">
                                            <a href=\"";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_detail", ["nni" => (isset($context["nni"]) || array_key_exists("nni", $context) ? $context["nni"] : (function () { throw new RuntimeError('Variable "nni" does not exist.', 105, $this->source); })()), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 105)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3 py-2 shadow-sm transition-all\">
                                                <i class=\"fas fa-eye me-1\"></i>Détails
                                            </a>
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            yield "                            </tbody>
                        </table>
                    </div>
                ";
        }
        // line 115
        yield "            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 120
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

        // line 121
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<style>
    .transition-all {
        transition: all 0.2s ease;
    }
    
    .btn-outline-primary:hover,
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
    
    .feedback-row:hover {
        background-color: rgba(61, 95, 158, 0.04);
    }
    
    .data-table th {
        font-weight: 600;
        color: #2c384e;
        border-top: none;
        border-bottom-width: 1px;
    }
    
    .data-table td {
        padding-top: 1rem;
        padding-bottom: 1rem;
        vertical-align: middle;
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
        return "app/dashboard/feedback/my_feedbacks.html.twig";
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
        return array (  277 => 121,  264 => 120,  250 => 115,  244 => 111,  232 => 105,  228 => 103,  222 => 99,  216 => 95,  214 => 94,  207 => 90,  203 => 89,  195 => 88,  192 => 87,  190 => 79,  187 => 78,  185 => 70,  182 => 69,  180 => 61,  175 => 59,  169 => 56,  163 => 52,  159 => 51,  145 => 39,  136 => 32,  134 => 31,  125 => 25,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mes retours d'expérience{% endblock %}

{% block body %}
    <div class=\"container-fluid py-4\">
        <!-- En-tête avec bordure latérale élégante -->
        <div class=\"dashboard-header d-flex justify-content-between align-items-center mb-4 border-start border-primary ps-3\" style=\"border-left-width: 5px !important; border-left-color: #3d5f9e !important;\">
            <div>
                <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Mes retours d'expérience</h1>
                <p class=\"text-muted mb-0 mt-2 fw-light\">Consultez l'historique de vos retours d'expérience et leur traitement</p>
            </div>
            <a href=\"{{ path('dashboard_index', {'nni': nni}) }}\" class=\"btn btn-outline-primary rounded-pill px-4 shadow-sm transition-all\">
                <i class=\"fas fa-arrow-left me-2\"></i>Retour au tableau de bord
            </a>
        </div>

        <!-- Carte principale avec ombre douce et coins arrondis -->
        <div class=\"card border-0 shadow-sm mb-4\" style=\"border-radius: 0.75rem;\">
            <!-- En-tête de carte élégant -->
            <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-0\">
                <h5 class=\"mb-0 fw-bold text-dark\">
                    <i class=\"fas fa-list text-primary me-2\"></i>Liste de vos retours d'expérience
                </h5>
                <a href=\"{{ path('my_feedbacks_new', {'nni': nni}) }}\" class=\"btn btn-primary rounded-pill px-3 py-2 shadow-sm transition-all\">
                    <i class=\"fas fa-plus me-2\"></i>Nouveau retour
                </a>
            </div>
            
            <div class=\"card-body p-4\">
                {% if feedbacks is empty %}
                    <div class=\"alert d-flex align-items-center\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                        <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                        <div>
                            Vous n'avez pas encore soumis de retour d'expérience. Utilisez le bouton \"Nouveau retour\" pour partager votre expérience.
                        </div>
                    </div>
                {% else %}
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover align-middle data-table\">
                            <thead class=\"bg-light\">
                                <tr>
                                    <th class=\"py-3\">Date</th>
                                    <th class=\"py-3\">Titre</th>
                                    <th class=\"py-3\">Catégorie</th>
                                    <th class=\"py-3\">Statut</th>
                                    <th class=\"py-3 text-center\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for feedback in feedbacks %}
                                    <tr class=\"feedback-row transition-all\">
                                        <td>
                                            <div class=\"d-flex align-items-center\">
                                                <i class=\"fas fa-calendar-alt text-primary me-2\"></i>
                                                {{ feedback.createdAt|date('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td class=\"fw-medium text-dark\">{{ feedback.title }}</td>
                                        <td>
                                            {% set category_labels = {
                                                'integration_process': 'Processus d\\'intégration',
                                                'training': 'Formation',
                                                'documentation': 'Documentation',
                                                'tools': 'Outils',
                                                'communication': 'Communication',
                                                'other': 'Autre'
                                            } %}

                                            {% set category_icons = {
                                                'integration_process': 'fas fa-users',
                                                'training': 'fas fa-graduation-cap',
                                                'documentation': 'fas fa-file-alt',
                                                'tools': 'fas fa-tools',
                                                'communication': 'fas fa-comments',
                                                'other': 'fas fa-question-circle'
                                            } %}
                                            
                                            {% set badge_colors = {
                                                'integration_process': '#3d5f9e',
                                                'training': '#2e7d32',
                                                'documentation': '#0288d1',
                                                'tools': '#ed6c02',
                                                'communication': '#d32f2f',
                                                'other': '#546e7a'
                                            } %}

                                            <span class=\"badge rounded-pill px-3 py-2\" style=\"background-color: {{ badge_colors[feedback.category] }}10; color: {{ badge_colors[feedback.category] }}; border: 1px solid {{ badge_colors[feedback.category] }}30;\">
                                                <i class=\"{{ category_icons[feedback.category] }} me-1\"></i>
                                                {{ category_labels[feedback.category] }}
                                            </span>
                                        </td>
                                        <td>
                                            {% if feedback.isReviewed %}
                                                <span class=\"badge rounded-pill bg-success-subtle text-success px-3 py-2\">
                                                    <i class=\"fas fa-check-circle me-1\"></i> Traité
                                                </span>
                                            {% else %}
                                                <span class=\"badge rounded-pill bg-warning-subtle text-warning px-3 py-2\">
                                                    <i class=\"fas fa-clock me-1\"></i> En attente
                                                </span>
                                            {% endif %}
                                        </td>
                                        <td class=\"text-center\">
                                            <a href=\"{{ path('my_feedbacks_detail', {'nni': nni, 'id': feedback.id}) }}\" class=\"btn btn-sm btn-outline-primary rounded-pill px-3 py-2 shadow-sm transition-all\">
                                                <i class=\"fas fa-eye me-1\"></i>Détails
                                            </a>
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                {% endif %}
            </div>
        </div>
    </div>
{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    .transition-all {
        transition: all 0.2s ease;
    }
    
    .btn-outline-primary:hover,
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
    
    .feedback-row:hover {
        background-color: rgba(61, 95, 158, 0.04);
    }
    
    .data-table th {
        font-weight: 600;
        color: #2c384e;
        border-top: none;
        border-bottom-width: 1px;
    }
    
    .data-table td {
        padding-top: 1rem;
        padding-bottom: 1rem;
        vertical-align: middle;
    }
</style>
{% endblock %}
", "app/dashboard/feedback/my_feedbacks.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/feedback/my_feedbacks.html.twig");
    }
}
