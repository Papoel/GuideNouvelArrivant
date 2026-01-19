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

/* app/dashboard/feedback/review.html.twig */
class __TwigTemplate_a47fe282a73a9ef0f3117166eaa947b0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/review.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/review.html.twig"));

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

        yield "Revue du retour d'expérience";
        
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
        <div class=\"pagetitle\">
            <h1>Revue du retour d'expérience</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "nni", [], "any", false, false, false, 14)]), "html", null, true);
        yield "\">Accueil</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_list", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "user", [], "any", false, false, false, 15), "nni", [], "any", false, false, false, 15)]), "html", null, true);
        yield "\">Liste des REX</a></li>
                    <li class=\"breadcrumb-item active\">Revue</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <div class=\"card\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title d-flex justify-content-between align-items-center\">
                                Détail du retour d'expérience
                                ";
        // line 28
        $context["badge_class"] = ["integration_process" => "bg-primary", "training" => "bg-success", "documentation" => "bg-info", "tools" => "bg-warning", "communication" => "bg-secondary", "other" => "bg-dark"];
        // line 36
        yield "
                                ";
        // line 37
        $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
        // line 45
        yield "
                                <span class=\"badge ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 46, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 46, $this->source); })()), "category", [], "any", false, false, false, 46), [], "array", false, false, false, 46), "html", null, true);
        yield "\">
                                    ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 47, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 47, $this->source); })()), "category", [], "any", false, false, false, 47), [], "array", false, false, false, 47), "html", null, true);
        yield "
                                </span>
                            </h5>

                            <div class=\"card shadow-sm mb-4\">
                                <div class=\"card-header bg-light\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <h6 class=\"mb-0\">";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 54, $this->source); })()), "title", [], "any", false, false, false, 54), "html", null, true);
        yield "</h6>
                                        <small class=\"text-muted\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 55, $this->source); })()), "createdAt", [], "any", false, false, false, 55), "d/m/Y H:i"), "html", null, true);
        yield "</small>
                                    </div>
                                </div>
                                <div class=\"card-body\">
                                    <p class=\"card-text\">";
        // line 59
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 59, $this->source); })()), "content", [], "any", false, false, false, 59), "html", null, true));
        yield "</p>
                                    <div class=\"d-flex justify-content-end\">
                                        <small class=\"text-muted\">Par ";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 61, $this->source); })()), "author", [], "any", false, false, false, 61), "fullname", [], "any", false, false, false, 61), "html", null, true);
        yield "</small>
                                    </div>
                                </div>
                            </div>

                            ";
        // line 66
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 66, $this->source); })()), "isReviewed", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "                                <div class=\"alert alert-success\">
                                    <h6 class=\"alert-heading\">Commentaire du manager</h6>
                                    <p>";
            // line 69
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 69, $this->source); })()), "managerComment", [], "any", false, false, false, 69), "html", null, true));
            yield "</p>
                                    <hr>
                                    <div class=\"d-flex justify-content-between\">
                                        <small>Traité par: ";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 72, $this->source); })()), "reviewedBy", [], "any", false, false, false, 72), "fullname", [], "any", false, false, false, 72), "html", null, true);
            yield "</small>
                                        <small>Le: ";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 73, $this->source); })()), "reviewAt", [], "any", false, false, false, 73), "d/m/Y H:i"), "html", null, true);
            yield "</small>
                                    </div>
                                </div>
                                <div class=\"d-flex justify-content-end\">
                                    <a href=\"";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_list", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "user", [], "any", false, false, false, 77), "nni", [], "any", false, false, false, 77)]), "html", null, true);
            yield "\" class=\"btn btn-secondary\">
                                        <i class=\"bi bi-arrow-left me-1\"></i> Retour à la liste
                                    </a>
                                </div>
                            ";
        } else {
            // line 82
            yield "                                <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_review", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82), "nni", [], "any", false, false, false, 82), "id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 82, $this->source); })()), "id", [], "any", false, false, false, 82)]), "html", null, true);
            yield "\">
                                    <div class=\"mb-3\">
                                        <label for=\"managerComment\" class=\"form-label\">Votre commentaire</label>
                                        <textarea class=\"form-control\" id=\"managerComment\" name=\"managerComment\" rows=\"5\" required></textarea>
                                        <div class=\"form-text\">Votre analyse et vos recommandations suite à ce retour d'expérience.</div>
                                    </div>
                                    <div class=\"d-flex justify-content-between\">
                                        <a href=\"";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_list", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "user", [], "any", false, false, false, 89), "nni", [], "any", false, false, false, 89)]), "html", null, true);
            yield "\" class=\"btn btn-secondary\">
                                            <i class=\"bi bi-arrow-left me-1\"></i> Annuler
                                        </a>
                                        <button type=\"submit\" class=\"btn btn-primary\">
                                            <i class=\"bi bi-check-circle me-1\"></i> Valider le traitement
                                        </button>
                                    </div>
                                </form>
                            ";
        }
        // line 98
        yield "                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    ";
        // line 105
        yield Twig\Extension\CoreExtension::include($this->env, $context, "app/dashboard/_dashboardFooter.html.twig");
        yield "
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
        return "app/dashboard/feedback/review.html.twig";
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
        return array (  245 => 105,  236 => 98,  224 => 89,  213 => 82,  205 => 77,  198 => 73,  194 => 72,  188 => 69,  184 => 67,  182 => 66,  174 => 61,  169 => 59,  162 => 55,  158 => 54,  148 => 47,  144 => 46,  141 => 45,  139 => 37,  136 => 36,  134 => 28,  118 => 15,  114 => 14,  106 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Revue du retour d'expérience{% endblock %}

{% block body %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <div class=\"pagetitle\">
            <h1>Revue du retour d'expérience</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\">Accueil</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"{{ path('my_feedbacks_list', {'nni': app.user.nni}) }}\">Liste des REX</a></li>
                    <li class=\"breadcrumb-item active\">Revue</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <div class=\"card\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title d-flex justify-content-between align-items-center\">
                                Détail du retour d'expérience
                                {% set badge_class = {
                                    'integration_process': 'bg-primary',
                                    'training': 'bg-success',
                                    'documentation': 'bg-info',
                                    'tools': 'bg-warning',
                                    'communication': 'bg-secondary',
                                    'other': 'bg-dark'
                                } %}

                                {% set category_labels = {
                                    'integration_process': 'Processus d\\'intégration',
                                    'training': 'Formation',
                                    'documentation': 'Documentation',
                                    'tools': 'Outils',
                                    'communication': 'Communication',
                                    'other': 'Autre'
                                } %}

                                <span class=\"badge {{ badge_class[feedback.category] }}\">
                                    {{ category_labels[feedback.category] }}
                                </span>
                            </h5>

                            <div class=\"card shadow-sm mb-4\">
                                <div class=\"card-header bg-light\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <h6 class=\"mb-0\">{{ feedback.title }}</h6>
                                        <small class=\"text-muted\">{{ feedback.createdAt|date('d/m/Y H:i') }}</small>
                                    </div>
                                </div>
                                <div class=\"card-body\">
                                    <p class=\"card-text\">{{ feedback.content|nl2br }}</p>
                                    <div class=\"d-flex justify-content-end\">
                                        <small class=\"text-muted\">Par {{ feedback.author.fullname }}</small>
                                    </div>
                                </div>
                            </div>

                            {% if feedback.isReviewed %}
                                <div class=\"alert alert-success\">
                                    <h6 class=\"alert-heading\">Commentaire du manager</h6>
                                    <p>{{ feedback.managerComment|nl2br }}</p>
                                    <hr>
                                    <div class=\"d-flex justify-content-between\">
                                        <small>Traité par: {{ feedback.reviewedBy.fullname }}</small>
                                        <small>Le: {{ feedback.reviewAt|date('d/m/Y H:i') }}</small>
                                    </div>
                                </div>
                                <div class=\"d-flex justify-content-end\">
                                    <a href=\"{{ path('my_feedbacks_list', {'nni': app.user.nni}) }}\" class=\"btn btn-secondary\">
                                        <i class=\"bi bi-arrow-left me-1\"></i> Retour à la liste
                                    </a>
                                </div>
                            {% else %}
                                <form method=\"post\" action=\"{{ path('my_feedbacks_review', {'nni': app.user.nni, 'id': feedback.id}) }}\">
                                    <div class=\"mb-3\">
                                        <label for=\"managerComment\" class=\"form-label\">Votre commentaire</label>
                                        <textarea class=\"form-control\" id=\"managerComment\" name=\"managerComment\" rows=\"5\" required></textarea>
                                        <div class=\"form-text\">Votre analyse et vos recommandations suite à ce retour d'expérience.</div>
                                    </div>
                                    <div class=\"d-flex justify-content-between\">
                                        <a href=\"{{ path('my_feedbacks_list', {'nni': app.user.nni}) }}\" class=\"btn btn-secondary\">
                                            <i class=\"bi bi-arrow-left me-1\"></i> Annuler
                                        </a>
                                        <button type=\"submit\" class=\"btn btn-primary\">
                                            <i class=\"bi bi-check-circle me-1\"></i> Valider le traitement
                                        </button>
                                    </div>
                                </form>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{ include('app/dashboard/_dashboardFooter.html.twig') }}
{% endblock %}
", "app/dashboard/feedback/review.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/feedback/review.html.twig");
    }
}
