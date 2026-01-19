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

/* app/dashboard/feedback/list.html.twig */
class __TwigTemplate_a61251c032f2e5913172073df283a703 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/feedback/list.html.twig"));

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

        yield "Liste des retours d'expérience";
        
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
            <h1>Capitalisation des retours d'expérience</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "nni", [], "any", false, false, false, 14)]), "html", null, true);
        yield "\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Liste des REX</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title\">Retours d'expérience</h5>

                            ";
        // line 27
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 27, $this->source); })()))) {
            // line 28
            yield "                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle me-2\"></i>
                                    Aucun retour d'expérience n'a été soumis pour le moment.
                                </div>
                            ";
        } else {
            // line 33
            yield "                                <div class=\"table-responsive\">
                                    <table class=\"table table-hover data-table\">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Auteur</th>
                                                <th>Titre</th>
                                                <th>Catégorie</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 46, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 47
                yield "                                                <tr>
                                                    <td>";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 48), "d/m/Y"), "html", null, true);
                yield "</td>
                                                    <td>";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 49), "fullname", [], "any", false, false, false, 49), "html", null, true);
                yield "</td>
                                                    <td>";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 50), "html", null, true);
                yield "</td>
                                                    <td>
                                                        ";
                // line 52
                $context["badge_class"] = ["integration_process" => "bg-primary", "training" => "bg-success", "documentation" => "bg-info", "tools" => "bg-warning", "communication" => "bg-secondary", "other" => "bg-dark"];
                // line 60
                yield "
                                                        ";
                // line 61
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 69
                yield "
                                                        <span class=\"badge ";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 70, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 70), [], "array", false, false, false, 70), "html", null, true);
                yield "\">
                                                            ";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 71, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 71), [], "array", false, false, false, 71), "html", null, true);
                yield "
                                                        </span>
                                                    </td>
                                                    <td>
                                                        ";
                // line 75
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 76
                    yield "                                                            <span class=\"badge bg-success\">Traité</span>
                                                        ";
                } else {
                    // line 78
                    yield "                                                            <span class=\"badge bg-warning text-dark\">En attente</span>
                                                        ";
                }
                // line 80
                yield "                                                    </td>
                                                    <td>
                                                        <a href=\"";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_review", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "user", [], "any", false, false, false, 82), "nni", [], "any", false, false, false, 82), "id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 82)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                                                            ";
                // line 83
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 84
                    yield "                                                                <i class=\"bi bi-eye\"></i> Voir
                                                            ";
                } else {
                    // line 86
                    yield "                                                                <i class=\"bi bi-check-circle\"></i> Traiter
                                                            ";
                }
                // line 88
                yield "                                                        </a>
                                                    </td>
                                                </tr>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            yield "                                        </tbody>
                                    </table>
                                </div>
                            ";
        }
        // line 96
        yield "                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    ";
        // line 103
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
        return "app/dashboard/feedback/list.html.twig";
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
        return array (  247 => 103,  238 => 96,  232 => 92,  223 => 88,  219 => 86,  215 => 84,  213 => 83,  209 => 82,  205 => 80,  201 => 78,  197 => 76,  195 => 75,  188 => 71,  184 => 70,  181 => 69,  179 => 61,  176 => 60,  174 => 52,  169 => 50,  165 => 49,  161 => 48,  158 => 47,  154 => 46,  139 => 33,  132 => 28,  130 => 27,  114 => 14,  106 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Liste des retours d'expérience{% endblock %}

{% block body %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <div class=\"pagetitle\">
            <h1>Capitalisation des retours d'expérience</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Liste des REX</li>
                </ol>
            </nav>
        </div>

        <section class=\"section\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title\">Retours d'expérience</h5>

                            {% if feedbacks is empty %}
                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle me-2\"></i>
                                    Aucun retour d'expérience n'a été soumis pour le moment.
                                </div>
                            {% else %}
                                <div class=\"table-responsive\">
                                    <table class=\"table table-hover data-table\">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Auteur</th>
                                                <th>Titre</th>
                                                <th>Catégorie</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {% for feedback in feedbacks %}
                                                <tr>
                                                    <td>{{ feedback.createdAt|date('d/m/Y') }}</td>
                                                    <td>{{ feedback.author.fullname }}</td>
                                                    <td>{{ feedback.title }}</td>
                                                    <td>
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
                                                    </td>
                                                    <td>
                                                        {% if feedback.isReviewed %}
                                                            <span class=\"badge bg-success\">Traité</span>
                                                        {% else %}
                                                            <span class=\"badge bg-warning text-dark\">En attente</span>
                                                        {% endif %}
                                                    </td>
                                                    <td>
                                                        <a href=\"{{ path('my_feedbacks_review', {'nni': app.user.nni, 'id': feedback.id}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                                            {% if feedback.isReviewed %}
                                                                <i class=\"bi bi-eye\"></i> Voir
                                                            {% else %}
                                                                <i class=\"bi bi-check-circle\"></i> Traiter
                                                            {% endif %}
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
            </div>
        </section>
    </main>

    {{ include('app/dashboard/_dashboardFooter.html.twig') }}
{% endblock %}
", "app/dashboard/feedback/list.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/feedback/list.html.twig");
    }
}
