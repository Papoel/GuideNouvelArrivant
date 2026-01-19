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

/* app/dashboard/feedback/my_feedback_detail.html.twig */
class __TwigTemplate_d3646deed2e49aa12a56dd83dcf79524 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/my_feedback_detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/my_feedback_detail.html.twig"));

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

        yield "Détail du retour d'expérience";
        
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
                <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Détail du retour d'expérience</h1>
                <p class=\"text-muted mb-0 mt-2 fw-light\">Consultez les détails de votre retour d'expérience</p>
            </div>
            <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_index", ["nni" => (isset($context["nni"]) || array_key_exists("nni", $context) ? $context["nni"] : (function () { throw new RuntimeError('Variable "nni" does not exist.', 13, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn btn-outline-primary rounded-pill px-4 shadow-sm transition-all\">
                <i class=\"fas fa-arrow-left me-2\"></i>Retour à la liste
            </a>
        </div>

        <!-- Carte principale avec ombre douce et coins arrondis -->
        <div class=\"card border-0 shadow-sm mb-4\" style=\"border-radius: 0.75rem;\">
            <!-- En-tête de carte élégant -->
            <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-0\">
                <h5 class=\"mb-0 fw-bold text-dark\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 22, $this->source); })()), "title", [], "any", false, false, false, 22), "html", null, true);
        yield "</h5>
                ";
        // line 23
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 23, $this->source); })()), "isReviewed", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "                    <span class=\"badge rounded-pill bg-success-subtle text-success px-3 py-2\">
                        <i class=\"fas fa-check-circle me-1\"></i> Traité
                    </span>
                ";
        } else {
            // line 28
            yield "                    <span class=\"badge rounded-pill bg-warning-subtle text-warning px-3 py-2\">
                        <i class=\"fas fa-clock me-1\"></i> En attente
                    </span>
                ";
        }
        // line 32
        yield "            </div>
            
            <div class=\"card-body p-4\">
                <!-- Informations de base -->
                <div class=\"row mb-4 g-4\">
                    <div class=\"col-md-6\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"text-primary me-3\">
                                <i class=\"fas fa-calendar-alt\"></i>
                            </div>
                            <div>
                                <label class=\"text-muted fw-medium mb-1 small\">Date de soumission</label>
                                <div class=\"fw-bold\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 44, $this->source); })()), "createdAt", [], "any", false, false, false, 44), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"text-primary me-3\">
                                <i class=\"fas fa-tag\"></i>
                            </div>
                            <div>
                                ";
        // line 54
        $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
        // line 62
        yield "                                
                                ";
        // line 63
        $context["category_icons"] = ["integration_process" => "fas fa-users", "training" => "fas fa-graduation-cap", "documentation" => "fas fa-file-alt", "tools" => "fas fa-tools", "communication" => "fas fa-comments", "other" => "fas fa-question-circle"];
        // line 71
        yield "
                                <label class=\"text-muted fw-medium mb-1 small\">Catégorie</label>
                                <div class=\"fw-bold\">
                                    <i class=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_icons"]) || array_key_exists("category_icons", $context) ? $context["category_icons"] : (function () { throw new RuntimeError('Variable "category_icons" does not exist.', 74, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 74, $this->source); })()), "category", [], "any", false, false, false, 74), [], "array", false, false, false, 74), "html", null, true);
        yield " me-1 small\"></i>
                                    ";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 75, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 75, $this->source); })()), "category", [], "any", false, false, false, 75), [], "array", false, false, false, 75), "html", null, true);
        yield "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu du retour d'expérience -->
                <div class=\"card bg-white border mb-4\" style=\"border-radius: 0.5rem;\">
                    <div class=\"card-header bg-light py-3 px-4 border-bottom\" style=\"border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;\">
                        <h6 class=\"mb-0 fw-bold\">
                            <i class=\"fas fa-quote-left text-primary me-2\"></i>
                            Votre retour d'expérience
                        </h6>
                    </div>
                    <div class=\"card-body p-4\">
                        <div class=\"feedback-text lh-lg\">
                            ";
        // line 92
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 92, $this->source); })()), "content", [], "any", false, false, false, 92), "html", null, true));
        yield "
                        </div>
                    </div>
                </div>

                <!-- Réponse du manager -->
                ";
        // line 98
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 98, $this->source); })()), "isReviewed", [], "any", false, false, false, 98)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 99
            yield "                    <div class=\"card bg-white border mb-0\" style=\"border-radius: 0.5rem;\">
                        <div class=\"card-header bg-light py-3 px-4 border-bottom\" style=\"border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <h6 class=\"mb-0 fw-bold\">
                                    <i class=\"fas fa-reply text-primary me-2\"></i>
                                    Réponse du manager
                                </h6>
                                <div class=\"text-muted small\">
                                    <i class=\"fas fa-user-tie me-1\"></i>
                                    ";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 108, $this->source); })()), "reviewedBy", [], "any", false, false, false, 108), "firstname", [], "any", false, false, false, 108), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 108, $this->source); })()), "reviewedBy", [], "any", false, false, false, 108), "lastname", [], "any", false, false, false, 108), "html", null, true);
            yield "
                                    <span class=\"ms-2 opacity-75\">|</span>
                                    <i class=\"fas fa-calendar-check ms-2 me-1\"></i>
                                    ";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 111, $this->source); })()), "reviewAt", [], "any", false, false, false, 111), "d/m/Y"), "html", null, true);
            yield "
                                </div>
                            </div>
                        </div>
                        <div class=\"card-body p-4\">
                            <div class=\"manager-comment lh-lg\">
                                ";
            // line 117
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 117, $this->source); })()), "managerComment", [], "any", false, false, false, 117), "html", null, true));
            yield "
                            </div>
                        </div>
                    </div>
                ";
        } else {
            // line 122
            yield "                    <div class=\"alert alert-info d-flex align-items-center\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                        <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                        <div>
                            Votre retour d'expérience est en cours d'analyse et sera traité prochainement par un manager.
                        </div>
                    </div>
                ";
        }
        // line 129
        yield "            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 134
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

        // line 135
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<style>
    .transition-all {
        transition: all 0.2s ease;
    }
    
    .btn-outline-primary:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08) !important;
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
        return "app/dashboard/feedback/my_feedback_detail.html.twig";
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
        return array (  286 => 135,  273 => 134,  259 => 129,  250 => 122,  242 => 117,  233 => 111,  225 => 108,  214 => 99,  212 => 98,  203 => 92,  183 => 75,  179 => 74,  174 => 71,  172 => 63,  169 => 62,  167 => 54,  154 => 44,  140 => 32,  134 => 28,  128 => 24,  126 => 23,  122 => 22,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détail du retour d'expérience{% endblock %}

{% block body %}
    <div class=\"container-fluid py-4\">
        <!-- En-tête avec bordure latérale élégante -->
        <div class=\"dashboard-header d-flex justify-content-between align-items-center mb-4 border-start border-primary ps-3\" style=\"border-left-width: 5px !important; border-left-color: #3d5f9e !important;\">
            <div>
                <h1 class=\"text-dark fw-bold\"><i class=\"fas fa-comment-dots me-3 text-primary\"></i>Détail du retour d'expérience</h1>
                <p class=\"text-muted mb-0 mt-2 fw-light\">Consultez les détails de votre retour d'expérience</p>
            </div>
            <a href=\"{{ path('my_feedbacks_index', {'nni': nni}) }}\" class=\"btn btn-outline-primary rounded-pill px-4 shadow-sm transition-all\">
                <i class=\"fas fa-arrow-left me-2\"></i>Retour à la liste
            </a>
        </div>

        <!-- Carte principale avec ombre douce et coins arrondis -->
        <div class=\"card border-0 shadow-sm mb-4\" style=\"border-radius: 0.75rem;\">
            <!-- En-tête de carte élégant -->
            <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-0\">
                <h5 class=\"mb-0 fw-bold text-dark\">{{ feedback.title }}</h5>
                {% if feedback.isReviewed %}
                    <span class=\"badge rounded-pill bg-success-subtle text-success px-3 py-2\">
                        <i class=\"fas fa-check-circle me-1\"></i> Traité
                    </span>
                {% else %}
                    <span class=\"badge rounded-pill bg-warning-subtle text-warning px-3 py-2\">
                        <i class=\"fas fa-clock me-1\"></i> En attente
                    </span>
                {% endif %}
            </div>
            
            <div class=\"card-body p-4\">
                <!-- Informations de base -->
                <div class=\"row mb-4 g-4\">
                    <div class=\"col-md-6\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"text-primary me-3\">
                                <i class=\"fas fa-calendar-alt\"></i>
                            </div>
                            <div>
                                <label class=\"text-muted fw-medium mb-1 small\">Date de soumission</label>
                                <div class=\"fw-bold\">{{ feedback.createdAt|date('d/m/Y à H:i') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"d-flex align-items-center mb-2\">
                            <div class=\"text-primary me-3\">
                                <i class=\"fas fa-tag\"></i>
                            </div>
                            <div>
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

                                <label class=\"text-muted fw-medium mb-1 small\">Catégorie</label>
                                <div class=\"fw-bold\">
                                    <i class=\"{{ category_icons[feedback.category] }} me-1 small\"></i>
                                    {{ category_labels[feedback.category] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu du retour d'expérience -->
                <div class=\"card bg-white border mb-4\" style=\"border-radius: 0.5rem;\">
                    <div class=\"card-header bg-light py-3 px-4 border-bottom\" style=\"border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;\">
                        <h6 class=\"mb-0 fw-bold\">
                            <i class=\"fas fa-quote-left text-primary me-2\"></i>
                            Votre retour d'expérience
                        </h6>
                    </div>
                    <div class=\"card-body p-4\">
                        <div class=\"feedback-text lh-lg\">
                            {{ feedback.content|nl2br }}
                        </div>
                    </div>
                </div>

                <!-- Réponse du manager -->
                {% if feedback.isReviewed %}
                    <div class=\"card bg-white border mb-0\" style=\"border-radius: 0.5rem;\">
                        <div class=\"card-header bg-light py-3 px-4 border-bottom\" style=\"border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <h6 class=\"mb-0 fw-bold\">
                                    <i class=\"fas fa-reply text-primary me-2\"></i>
                                    Réponse du manager
                                </h6>
                                <div class=\"text-muted small\">
                                    <i class=\"fas fa-user-tie me-1\"></i>
                                    {{ feedback.reviewedBy.firstname }} {{ feedback.reviewedBy.lastname }}
                                    <span class=\"ms-2 opacity-75\">|</span>
                                    <i class=\"fas fa-calendar-check ms-2 me-1\"></i>
                                    {{ feedback.reviewAt|date('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                        <div class=\"card-body p-4\">
                            <div class=\"manager-comment lh-lg\">
                                {{ feedback.managerComment|nl2br }}
                            </div>
                        </div>
                    </div>
                {% else %}
                    <div class=\"alert alert-info d-flex align-items-center\" style=\"border-radius: 0.5rem; background-color: rgba(61, 95, 158, 0.08); border-color: rgba(61, 95, 158, 0.2); color: #3d5f9e;\">
                        <i class=\"fas fa-info-circle me-3 fa-lg\"></i>
                        <div>
                            Votre retour d'expérience est en cours d'analyse et sera traité prochainement par un manager.
                        </div>
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
    
    .btn-outline-primary:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08) !important;
    }
</style>
{% endblock %}
", "app/dashboard/feedback/my_feedback_detail.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/feedback/my_feedback_detail.html.twig");
    }
}
