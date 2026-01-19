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

/* admin/progress/feedback_detail.html.twig */
class __TwigTemplate_26243e176505219e2dbb729cfdda6432 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/feedback_detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/feedback_detail.html.twig"));

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

        yield "Détail du retour d'expérience - Administration";
        
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
        yield "<style>
    /* Variables pour l'accessibilité et la cohérence */
    :root {
        --primary-color: #3d5f9e;
        --primary-dark: #2d4a7d; /* Version plus foncée pour meilleur contraste */
        --primary-light: rgba(61, 95, 158, 0.15); /* Fond plus opaque pour meilleur contraste */
        --text-dark: #2c384e;
        --text-muted: #5d6778; /* Plus foncé que #6c757d pour meilleur contraste */
        --bg-light: #f8f9fa;
        --border-color: #d1d7e0; /* Plus foncé que #e9ecef pour meilleur contraste */
        --success-color: #2e7d32; /* Vert plus foncé pour meilleur contraste */
        --warning-color: #e65100; /* Orange plus foncé pour meilleur contraste */
        --info-color: #0277bd; /* Bleu info plus foncé */
        --danger-color: #c62828; /* Rouge plus foncé */
        --card-radius: 0.75rem;
        --transition-speed: 0.2s;
        --focus-ring-color: rgba(61, 95, 158, 0.5);
    }
    
    /* Focus styles pour l'accessibilité */
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
        outline: 3px solid var(--focus-ring-color) !important;
        outline-offset: 2px !important;
        box-shadow: none !important;
    }
    
    /* Classe pour les éléments visibles uniquement par les lecteurs d'écran */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }
    
    /* Styles pour les cartes */
    .content-card {
        border-radius: var(--card-radius);
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        background-color: #fff;
        border: 1px solid var(--border-color);
        transition: transform var(--transition-speed), box-shadow var(--transition-speed);
        margin-bottom: 1.5rem;
    }
    
    .content-card .card-header {
        background-color: #fff;
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 1.25rem;
        border-top-left-radius: var(--card-radius);
        border-top-right-radius: var(--card-radius);
    }
    
    .avatar-placeholder {
        background-color: var(--primary-color);
        transition: transform var(--transition-speed);
    }
    
    .feedback-content {
        background-color: var(--bg-light);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        line-height: 1.6;
    }
    
    .manager-response {
        border: 1px solid var(--border-color) !important;
        border-radius: 0.5rem;
    }
    
    /* Styles pour les boutons */
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-primary:hover, .btn-primary:focus {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }
    
    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover, .btn-outline-primary:focus {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
    }
    
    .btn-outline-warning {
        color: var(--warning-color);
        border-color: var(--warning-color);
    }
    
    .btn-outline-warning:hover, .btn-outline-warning:focus {
        background-color: var(--warning-color);
        border-color: var(--warning-color);
        color: #fff;
    }
</style>

<div class=\"container-fluid py-3 py-md-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
            <div>
                <h1 class=\"text-dark\" id=\"page-title\">
                    <i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Détail du retour d'expérience
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Consultez et traitez ce retour d'expérience</p>
            </div>
            <div>
                <a 
                    href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
        yield "\" 
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\" 
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à la liste des retours d'expérience\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à la liste
                </a>
            </div>
        </div>

        <div class=\"content-card mb-4\">
            <div class=\"card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center\">
                <h2 class=\"h5 mb-2 mb-md-0 fw-bold\">";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 137, $this->source); })()), "title", [], "any", false, false, false, 137), "html", null, true);
        yield "</h2>
                ";
        // line 138
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 138, $this->source); })()), "isReviewed", [], "any", false, false, false, 138)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 139
            yield "                    <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                        <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                    </span>
                ";
        } else {
            // line 143
            yield "                    <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                        <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                    </span>
                ";
        }
        // line 147
        yield "            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-12 col-md-6\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"avatar me-3\">
                                <div class=\"avatar-placeholder rounded-circle text-white d-flex align-items-center justify-content-center\" style=\"width: 50px; height: 50px;\" aria-hidden=\"true\">
                                    ";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 154, $this->source); })()), "author", [], "any", false, false, false, 154), "firstname", [], "any", false, false, false, 154)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 154, $this->source); })()), "author", [], "any", false, false, false, 154), "lastname", [], "any", false, false, false, 154)), "html", null, true);
        yield "
                                </div>
                            </div>
                            <div>
                                <h3 class=\"h6 mb-1 fw-bold\">";
        // line 158
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 158, $this->source); })()), "author", [], "any", false, false, false, 158), "firstname", [], "any", false, false, false, 158), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 158, $this->source); })()), "author", [], "any", false, false, false, 158), "lastname", [], "any", false, false, false, 158), "html", null, true);
        yield "</h3>
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\">
                                    <i class=\"bi bi-envelope me-1 small\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Email:</span>
                                    ";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 162, $this->source); })()), "author", [], "any", false, false, false, 162), "email", [], "any", false, false, false, 162), "html", null, true);
        yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-6 mt-3 mt-md-0\">
                        <div class=\"d-flex flex-column flex-md-row justify-content-md-end\">
                            <div class=\"mb-2 me-md-4\">
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\" class=\"mb-1\">
                                    <i class=\"bi bi-calendar me-1\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Date de soumission:</span>
                                    Soumis le
                                </div>
                                <div class=\"fw-medium\">";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 175, $this->source); })()), "createdAt", [], "any", false, false, false, 175), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
                            </div>
                            
                            ";
        // line 178
        $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
        // line 186
        yield "                            
                            ";
        // line 187
        $context["badge_class"] = ["integration_process" => "bg-primary bg-opacity-10 text-primary", "training" => "bg-success bg-opacity-10 text-success", "documentation" => "bg-info bg-opacity-10 text-info", "tools" => "bg-warning bg-opacity-10 text-warning", "communication" => "bg-secondary bg-opacity-10 text-secondary", "other" => "bg-dark bg-opacity-10 text-dark"];
        // line 195
        yield "                            
                            <div>
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\" class=\"mb-1\">
                                    <i class=\"bi bi-tag me-1\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Catégorie:</span>
                                    Catégorie
                                </div>
                                <span class=\"badge ";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 202, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 202, $this->source); })()), "category", [], "any", false, false, false, 202), [], "array", false, false, false, 202), "html", null, true);
        yield " fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                    ";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 203, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 203, $this->source); })()), "category", [], "any", false, false, false, 203), [], "array", false, false, false, 203), "html", null, true);
        yield "
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"feedback-content p-3 p-md-4 mb-4\">
                    <h3 class=\"h6 mb-3 fw-bold\"><i class=\"bi bi-chat-quote me-2 text-primary\" aria-hidden=\"true\"></i>Contenu du retour</h3>
                    <div class=\"ps-md-3\" style=\"line-height: 1.6;\">
                        ";
        // line 213
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 213, $this->source); })()), "content", [], "any", false, false, false, 213), "html", null, true));
        yield "
                    </div>
                </div>

                ";
        // line 217
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 217, $this->source); })()), "isReviewed", [], "any", false, false, false, 217)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 218
            yield "                    <div class=\"manager-response p-3 p-md-4 mb-4\">
                        <div class=\"d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3\">
                            <h3 class=\"h6 mb-2 mb-md-0 fw-bold\">
                                <i class=\"bi bi-reply me-2 text-primary\" aria-hidden=\"true\"></i>Réponse du manager
                            </h3>
                            <div style=\"color: var(--text-muted); font-size: 0.875rem;\">
                                <i class=\"bi bi-person-check me-1\" aria-hidden=\"true\"></i>
                                <span class=\"sr-only\">Traité par:</span>
                                Traité le ";
            // line 226
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 226, $this->source); })()), "reviewAt", [], "any", false, false, false, 226), "d/m/Y"), "html", null, true);
            yield " par ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 226, $this->source); })()), "reviewedBy", [], "any", false, false, false, 226), "firstname", [], "any", false, false, false, 226), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 226, $this->source); })()), "reviewedBy", [], "any", false, false, false, 226), "lastname", [], "any", false, false, false, 226), "html", null, true);
            yield "
                            </div>
                        </div>
                        <div class=\"manager-comment mb-4 ps-md-3\" style=\"line-height: 1.6;\">
                            ";
            // line 230
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 230, $this->source); })()), "managerComment", [], "any", false, false, false, 230), "html", null, true));
            yield "
                        </div>
                        <form method=\"post\" action=\"";
            // line 232
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 232, $this->source); })()), "id", [], "any", false, false, false, 232)]), "html", null, true);
            yield "\" class=\"text-end\">
                            <input type=\"hidden\" name=\"action\" value=\"mark_pending\">
                            <button 
                                type=\"submit\" 
                                class=\"btn btn-outline-warning rounded-pill shadow-sm\" 
                                style=\"padding: 0.6rem 1.2rem;\"
                                aria-label=\"Remettre ce retour d'expérience en attente de traitement\"
                            >
                                <i class=\"bi bi-arrow-clockwise me-2\" aria-hidden=\"true\"></i>Remettre en attente
                            </button>
                        </form>
                    </div>
                ";
        } else {
            // line 245
            yield "                    <div class=\"manager-response p-3 p-md-4 mb-4\">
                        <h3 class=\"h6 mb-3 fw-bold\">
                            <i class=\"bi bi-reply me-2 text-primary\" aria-hidden=\"true\"></i>Traiter ce retour d'expérience
                        </h3>
                        
                        <form method=\"post\" action=\"";
            // line 250
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 250, $this->source); })()), "id", [], "any", false, false, false, 250)]), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"action\" value=\"mark_reviewed\">
                            <div class=\"mb-4\">
                                <label for=\"managerComment\" class=\"form-label fw-medium mb-2\">Votre commentaire</label>
                                <textarea 
                                    class=\"form-control\" 
                                    id=\"managerComment\" 
                                    name=\"managerComment\" 
                                    rows=\"5\"
                                    style=\"padding: 0.6rem 0.75rem; border-color: var(--border-color);\"
                                    aria-describedby=\"commentHelp\"
                                ></textarea>
                                <div id=\"commentHelp\" class=\"form-text mt-2\" style=\"color: var(--text-muted);\">
                                    <i class=\"bi bi-info-circle me-1\" aria-hidden=\"true\"></i>
                                    Votre commentaire sera visible par l'auteur du retour d'expérience.
                                </div>
                            </div>
                            <div class=\"d-flex justify-content-end\">
                                <button 
                                    type=\"submit\" 
                                    class=\"btn btn-primary rounded-pill shadow-sm\" 
                                    style=\"padding: 0.6rem 1.2rem;\"
                                    aria-label=\"Marquer ce retour d'expérience comme traité\"
                                >
                                    <i class=\"bi bi-check-circle me-2\" aria-hidden=\"true\"></i>Marquer comme traité
                                </button>
                            </div>
                        </form>
                    </div>
                ";
        }
        // line 280
        yield "            </div>
        </div>
</div>
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
        return "admin/progress/feedback_detail.html.twig";
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
        return array (  426 => 280,  393 => 250,  386 => 245,  370 => 232,  365 => 230,  354 => 226,  344 => 218,  342 => 217,  335 => 213,  322 => 203,  318 => 202,  309 => 195,  307 => 187,  304 => 186,  302 => 178,  296 => 175,  280 => 162,  271 => 158,  263 => 154,  254 => 147,  248 => 143,  242 => 139,  240 => 138,  236 => 137,  221 => 125,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détail du retour d'expérience - Administration{% endblock %}

{% block body %}
<style>
    /* Variables pour l'accessibilité et la cohérence */
    :root {
        --primary-color: #3d5f9e;
        --primary-dark: #2d4a7d; /* Version plus foncée pour meilleur contraste */
        --primary-light: rgba(61, 95, 158, 0.15); /* Fond plus opaque pour meilleur contraste */
        --text-dark: #2c384e;
        --text-muted: #5d6778; /* Plus foncé que #6c757d pour meilleur contraste */
        --bg-light: #f8f9fa;
        --border-color: #d1d7e0; /* Plus foncé que #e9ecef pour meilleur contraste */
        --success-color: #2e7d32; /* Vert plus foncé pour meilleur contraste */
        --warning-color: #e65100; /* Orange plus foncé pour meilleur contraste */
        --info-color: #0277bd; /* Bleu info plus foncé */
        --danger-color: #c62828; /* Rouge plus foncé */
        --card-radius: 0.75rem;
        --transition-speed: 0.2s;
        --focus-ring-color: rgba(61, 95, 158, 0.5);
    }
    
    /* Focus styles pour l'accessibilité */
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
        outline: 3px solid var(--focus-ring-color) !important;
        outline-offset: 2px !important;
        box-shadow: none !important;
    }
    
    /* Classe pour les éléments visibles uniquement par les lecteurs d'écran */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }
    
    /* Styles pour les cartes */
    .content-card {
        border-radius: var(--card-radius);
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        background-color: #fff;
        border: 1px solid var(--border-color);
        transition: transform var(--transition-speed), box-shadow var(--transition-speed);
        margin-bottom: 1.5rem;
    }
    
    .content-card .card-header {
        background-color: #fff;
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 1.25rem;
        border-top-left-radius: var(--card-radius);
        border-top-right-radius: var(--card-radius);
    }
    
    .avatar-placeholder {
        background-color: var(--primary-color);
        transition: transform var(--transition-speed);
    }
    
    .feedback-content {
        background-color: var(--bg-light);
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        line-height: 1.6;
    }
    
    .manager-response {
        border: 1px solid var(--border-color) !important;
        border-radius: 0.5rem;
    }
    
    /* Styles pour les boutons */
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-primary:hover, .btn-primary:focus {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }
    
    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover, .btn-outline-primary:focus {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
    }
    
    .btn-outline-warning {
        color: var(--warning-color);
        border-color: var(--warning-color);
    }
    
    .btn-outline-warning:hover, .btn-outline-warning:focus {
        background-color: var(--warning-color);
        border-color: var(--warning-color);
        color: #fff;
    }
</style>

<div class=\"container-fluid py-3 py-md-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
            <div>
                <h1 class=\"text-dark\" id=\"page-title\">
                    <i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Détail du retour d'expérience
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Consultez et traitez ce retour d'expérience</p>
            </div>
            <div>
                <a 
                    href=\"{{ path('admin_progress_feedbacks') }}\" 
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\" 
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à la liste des retours d'expérience\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à la liste
                </a>
            </div>
        </div>

        <div class=\"content-card mb-4\">
            <div class=\"card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center\">
                <h2 class=\"h5 mb-2 mb-md-0 fw-bold\">{{ feedback.title }}</h2>
                {% if feedback.isReviewed %}
                    <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                        <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                    </span>
                {% else %}
                    <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                        <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                    </span>
                {% endif %}
            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-12 col-md-6\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"avatar me-3\">
                                <div class=\"avatar-placeholder rounded-circle text-white d-flex align-items-center justify-content-center\" style=\"width: 50px; height: 50px;\" aria-hidden=\"true\">
                                    {{ feedback.author.firstname|first }}{{ feedback.author.lastname|first }}
                                </div>
                            </div>
                            <div>
                                <h3 class=\"h6 mb-1 fw-bold\">{{ feedback.author.firstname }} {{ feedback.author.lastname }}</h3>
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\">
                                    <i class=\"bi bi-envelope me-1 small\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Email:</span>
                                    {{ feedback.author.email }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-6 mt-3 mt-md-0\">
                        <div class=\"d-flex flex-column flex-md-row justify-content-md-end\">
                            <div class=\"mb-2 me-md-4\">
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\" class=\"mb-1\">
                                    <i class=\"bi bi-calendar me-1\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Date de soumission:</span>
                                    Soumis le
                                </div>
                                <div class=\"fw-medium\">{{ feedback.createdAt|date('d/m/Y à H:i') }}</div>
                            </div>
                            
                            {% set category_labels = {
                                'integration_process': 'Processus d\\'intégration',
                                'training': 'Formation',
                                'documentation': 'Documentation',
                                'tools': 'Outils',
                                'communication': 'Communication',
                                'other': 'Autre'
                            } %}
                            
                            {% set badge_class = {
                                'integration_process': 'bg-primary bg-opacity-10 text-primary',
                                'training': 'bg-success bg-opacity-10 text-success',
                                'documentation': 'bg-info bg-opacity-10 text-info',
                                'tools': 'bg-warning bg-opacity-10 text-warning',
                                'communication': 'bg-secondary bg-opacity-10 text-secondary',
                                'other': 'bg-dark bg-opacity-10 text-dark'
                            } %}
                            
                            <div>
                                <div style=\"color: var(--text-muted); font-size: 0.875rem;\" class=\"mb-1\">
                                    <i class=\"bi bi-tag me-1\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Catégorie:</span>
                                    Catégorie
                                </div>
                                <span class=\"badge {{ badge_class[feedback.category] }} fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                    {{ category_labels[feedback.category] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"feedback-content p-3 p-md-4 mb-4\">
                    <h3 class=\"h6 mb-3 fw-bold\"><i class=\"bi bi-chat-quote me-2 text-primary\" aria-hidden=\"true\"></i>Contenu du retour</h3>
                    <div class=\"ps-md-3\" style=\"line-height: 1.6;\">
                        {{ feedback.content|nl2br }}
                    </div>
                </div>

                {% if feedback.isReviewed %}
                    <div class=\"manager-response p-3 p-md-4 mb-4\">
                        <div class=\"d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3\">
                            <h3 class=\"h6 mb-2 mb-md-0 fw-bold\">
                                <i class=\"bi bi-reply me-2 text-primary\" aria-hidden=\"true\"></i>Réponse du manager
                            </h3>
                            <div style=\"color: var(--text-muted); font-size: 0.875rem;\">
                                <i class=\"bi bi-person-check me-1\" aria-hidden=\"true\"></i>
                                <span class=\"sr-only\">Traité par:</span>
                                Traité le {{ feedback.reviewAt|date('d/m/Y') }} par {{ feedback.reviewedBy.firstname }} {{ feedback.reviewedBy.lastname }}
                            </div>
                        </div>
                        <div class=\"manager-comment mb-4 ps-md-3\" style=\"line-height: 1.6;\">
                            {{ feedback.managerComment|nl2br }}
                        </div>
                        <form method=\"post\" action=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\" class=\"text-end\">
                            <input type=\"hidden\" name=\"action\" value=\"mark_pending\">
                            <button 
                                type=\"submit\" 
                                class=\"btn btn-outline-warning rounded-pill shadow-sm\" 
                                style=\"padding: 0.6rem 1.2rem;\"
                                aria-label=\"Remettre ce retour d'expérience en attente de traitement\"
                            >
                                <i class=\"bi bi-arrow-clockwise me-2\" aria-hidden=\"true\"></i>Remettre en attente
                            </button>
                        </form>
                    </div>
                {% else %}
                    <div class=\"manager-response p-3 p-md-4 mb-4\">
                        <h3 class=\"h6 mb-3 fw-bold\">
                            <i class=\"bi bi-reply me-2 text-primary\" aria-hidden=\"true\"></i>Traiter ce retour d'expérience
                        </h3>
                        
                        <form method=\"post\" action=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\">
                            <input type=\"hidden\" name=\"action\" value=\"mark_reviewed\">
                            <div class=\"mb-4\">
                                <label for=\"managerComment\" class=\"form-label fw-medium mb-2\">Votre commentaire</label>
                                <textarea 
                                    class=\"form-control\" 
                                    id=\"managerComment\" 
                                    name=\"managerComment\" 
                                    rows=\"5\"
                                    style=\"padding: 0.6rem 0.75rem; border-color: var(--border-color);\"
                                    aria-describedby=\"commentHelp\"
                                ></textarea>
                                <div id=\"commentHelp\" class=\"form-text mt-2\" style=\"color: var(--text-muted);\">
                                    <i class=\"bi bi-info-circle me-1\" aria-hidden=\"true\"></i>
                                    Votre commentaire sera visible par l'auteur du retour d'expérience.
                                </div>
                            </div>
                            <div class=\"d-flex justify-content-end\">
                                <button 
                                    type=\"submit\" 
                                    class=\"btn btn-primary rounded-pill shadow-sm\" 
                                    style=\"padding: 0.6rem 1.2rem;\"
                                    aria-label=\"Marquer ce retour d'expérience comme traité\"
                                >
                                    <i class=\"bi bi-check-circle me-2\" aria-hidden=\"true\"></i>Marquer comme traité
                                </button>
                            </div>
                        </form>
                    </div>
                {% endif %}
            </div>
        </div>
</div>
{% endblock %}
", "admin/progress/feedback_detail.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/progress/feedback_detail.html.twig");
    }
}
