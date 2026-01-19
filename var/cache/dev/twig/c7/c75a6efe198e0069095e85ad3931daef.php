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

/* app/dashboard/_dashboardAside.html.twig */
class __TwigTemplate_56744ff4579bb55e8254f3b3a715ce39 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardAside.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardAside.html.twig"));

        // line 1
        yield "<!-- ======= Sidebar ======= -->
<aside id=\"sidebar\" class=\"sidebar bg-white shadow-sm\">
    <div class=\"sidebar-header p-4 border-bottom\">
        <a href=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "user", [], "any", false, false, false, 4), "nni", [], "any", false, false, false, 4)]), "html", null, true);
        yield "\"
           class=\"d-flex align-items-center text-decoration-none\">
            <i class=\"bi bi-speedometer2 fs-4 me-3 text-primary\"></i>
            <span class=\"fs-5 fw-bold text-dark\">Tableau de bord</span>
        </a>
    </div>

    <div class=\"sidebar-content p-4\">
        <nav class=\"nav flex-column mb-4\">
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pages_guide_technique");
        yield "\"
               class=\"nav-link text-dark d-flex align-items-center py-2 px-3 rounded hover-bg-light\">
                <i class=\"bi bi-bookmark-check me-3 text-primary\"></i>
                <span class=\"fw-medium\">Guide Technique</span>
            </a>
        </nav>


        ";
        // line 21
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 21), "logbooks", [], "any", true, true, false, 21) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21), "logbooks", [], "any", false, false, false, 21)))) {
            // line 22
            yield "            ";
            $context["logbooksProgress"] = $this->extensions['App\Twig\LogbooksProgressExtension']->getLogbooksProgress(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "user", [], "any", false, false, false, 22), "logbooks", [], "any", false, false, false, 22));
            // line 23
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["logbooksProgress"]) || array_key_exists("logbooksProgress", $context) ? $context["logbooksProgress"] : (function () { throw new RuntimeError('Variable "logbooksProgress" does not exist.', 23, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["logbookProgress"]) {
                // line 24
                yield "                <div class=\"card border-0 shadow-sm mb-4\">
                    <div class=\"card-body p-4\">

                        <div class=\"mb-4\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <span class=\"text-muted fw-medium\">Progression de l'agent</span>
                                <span class=\"badge ";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "progress_class_agent", [], "any", false, false, false, 30), "html", null, true);
                yield " rounded-pill\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "agent_progress", [], "any", false, false, false, 30), "html", null, true);
                yield "%</span>
                            </div>
                            <div class=\"d-flex justify-content-between mt-2\">
                                <small class=\"text-muted\">Complété: ";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "completed_by_agent", [], "any", false, false, false, 33), "html", null, true);
                yield "
                                    / ";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "total_modules", [], "any", false, false, false, 34), "html", null, true);
                yield "</small>
                            </div>
                        </div>

                        <div class=\"mb-4\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <span class=\"text-muted fw-medium\">Validation du mentor</span>
                            </div>
                            <div class=\"d-flex justify-content-between mt-2\">
                                <small class=\"text-muted\">Validé: ";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "validated_by_mentor", [], "any", false, false, false, 43), "html", null, true);
                yield "
                                    / ";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "total_modules", [], "any", false, false, false, 44), "html", null, true);
                yield "</small>
                            </div>
                        </div>

                        ";
                // line 48
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "modules_awaiting_validation", [], "any", false, false, false, 48) > 0)) {
                    // line 49
                    yield "                            <div class=\"d-flex justify-content-between align-items-center\">
                                <span class=\"badge bg-warning text-dark rounded-pill\">
                                    ";
                    // line 51
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbookProgress"], "modules_awaiting_validation", [], "any", false, false, false, 51), "html", null, true);
                    yield " en attente de validation
                                </span>
                            </div>
                        ";
                } else {
                    // line 55
                    yield "                            <div class=\"d-flex justify-content-between align-items-center\">
                                <span class=\"badge bg-success rounded-pill text-light\" style=\"letter-spacing: .5px\">Aucun module en attente de validation</span>
                            </div>
                        ";
                }
                // line 59
                yield "
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['logbookProgress'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "        ";
        } else {
            // line 64
            yield "            <div class=\"alert alert-info rounded-3\" role=\"alert\">
                <i class=\"bi bi-info-circle me-2\"></i>
                Aucun carnet de progression disponible.
            </div>
        ";
        }
        // line 69
        yield "    </div>
    ";
        // line 71
        yield "    ";
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_MENTOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 72
            yield "        <ul class=\"sidebar-nav\">
            <li class=\"nav-heading py-3\">Actions tuteur</li>
        </ul>
        <div>
            <section id=\"section-crud\">
                <p class=\"d-inline-flex gap-1\">
                    <a class=\"custom-link\" data-bs-toggle=\"collapse\" href=\"#aside-crud\" role=\"button\"
                       aria-expanded=\"false\" aria-controls=\"crud\">
                        <i class=\"bi bi-file-ruled me-2\"></i>
                        <span class=\"custom-title\">Mentorat</span>
                        <i class=\"bi bi-chevron-down chevron-icon ms-2\"></i>
                    </a>
                </p>
                <div class=\"collapse\" id=\"aside-crud\">
                    <ul class=\"sidebar-nav\" id=\"sidebar-nav-formalisation\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "nni", [], "any", false, false, false, 88)]), "html", null, true);
            yield "\">
                                <i class=\"bi bi-caret-right\"></i>
                                Carnets des Collaborateurs
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    ";
        }
        // line 98
        yield "</aside>
<!-- End Sidebar-->

<!-- Modal Feedback -->
<div class=\"modal fade\" id=\"feedbackModal\" tabindex=\"-1\" aria-labelledby=\"feedbackModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-light\">
                <h5 class=\"modal-title\" id=\"feedbackModalLabel\">Partagez votre retour d'expérience</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                ";
        // line 110
        if (array_key_exists("feedback_form", $context)) {
            // line 111
            yield "                    ";
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 111, $this->source); })()), 'form_start');
            yield "
                    <div class=\"mb-3\">
                        ";
            // line 113
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 113, $this->source); })()), "title", [], "any", false, false, false, 113), 'label');
            yield "
                        ";
            // line 114
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 114, $this->source); })()), "title", [], "any", false, false, false, 114), 'widget');
            yield "
                        ";
            // line 115
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 115, $this->source); })()), "title", [], "any", false, false, false, 115), 'errors');
            yield "
                    </div>
                    <div class=\"mb-3\">
                        ";
            // line 118
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 118, $this->source); })()), "category", [], "any", false, false, false, 118), 'label');
            yield "
                        ";
            // line 119
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 119, $this->source); })()), "category", [], "any", false, false, false, 119), 'widget');
            yield "
                        ";
            // line 120
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 120, $this->source); })()), "category", [], "any", false, false, false, 120), 'errors');
            yield "
                    </div>
                    <div class=\"mb-3\">
                        ";
            // line 123
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 123, $this->source); })()), "content", [], "any", false, false, false, 123), 'label');
            yield "
                        ";
            // line 124
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 124, $this->source); })()), "content", [], "any", false, false, false, 124), 'widget');
            yield "
                        ";
            // line 125
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 125, $this->source); })()), "content", [], "any", false, false, false, 125), 'errors');
            yield "
                    </div>
                    <div class=\"d-flex justify-content-end\">
                        <button type=\"button\" class=\"btn btn-secondary me-2\" data-bs-dismiss=\"modal\">Annuler</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
                    </div>
                    ";
            // line 131
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["feedback_form"]) || array_key_exists("feedback_form", $context) ? $context["feedback_form"] : (function () { throw new RuntimeError('Variable "feedback_form" does not exist.', 131, $this->source); })()), 'form_end');
            yield "
                ";
        } else {
            // line 133
            yield "                    <div class=\"alert alert-warning\">Le formulaire n'est pas disponible.</div>
                ";
        }
        // line 135
        yield "            </div>
        </div>
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
        return "app/dashboard/_dashboardAside.html.twig";
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
        return array (  280 => 135,  276 => 133,  271 => 131,  262 => 125,  258 => 124,  254 => 123,  248 => 120,  244 => 119,  240 => 118,  234 => 115,  230 => 114,  226 => 113,  220 => 111,  218 => 110,  204 => 98,  191 => 88,  173 => 72,  170 => 71,  167 => 69,  160 => 64,  157 => 63,  148 => 59,  142 => 55,  135 => 51,  131 => 49,  129 => 48,  122 => 44,  118 => 43,  106 => 34,  102 => 33,  94 => 30,  86 => 24,  81 => 23,  78 => 22,  76 => 21,  65 => 13,  53 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- ======= Sidebar ======= -->
<aside id=\"sidebar\" class=\"sidebar bg-white shadow-sm\">
    <div class=\"sidebar-header p-4 border-bottom\">
        <a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\"
           class=\"d-flex align-items-center text-decoration-none\">
            <i class=\"bi bi-speedometer2 fs-4 me-3 text-primary\"></i>
            <span class=\"fs-5 fw-bold text-dark\">Tableau de bord</span>
        </a>
    </div>

    <div class=\"sidebar-content p-4\">
        <nav class=\"nav flex-column mb-4\">
            <a href=\"{{ path('pages_guide_technique') }}\"
               class=\"nav-link text-dark d-flex align-items-center py-2 px-3 rounded hover-bg-light\">
                <i class=\"bi bi-bookmark-check me-3 text-primary\"></i>
                <span class=\"fw-medium\">Guide Technique</span>
            </a>
        </nav>


        {% if app.user.logbooks is defined and app.user.logbooks is not empty %}
            {% set logbooksProgress = get_logbooks_progress(app.user.logbooks) %}
            {% for logbookProgress in logbooksProgress %}
                <div class=\"card border-0 shadow-sm mb-4\">
                    <div class=\"card-body p-4\">

                        <div class=\"mb-4\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <span class=\"text-muted fw-medium\">Progression de l'agent</span>
                                <span class=\"badge {{ logbookProgress.progress_class_agent }} rounded-pill\">{{ logbookProgress.agent_progress }}%</span>
                            </div>
                            <div class=\"d-flex justify-content-between mt-2\">
                                <small class=\"text-muted\">Complété: {{ logbookProgress.completed_by_agent }}
                                    / {{ logbookProgress.total_modules }}</small>
                            </div>
                        </div>

                        <div class=\"mb-4\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <span class=\"text-muted fw-medium\">Validation du mentor</span>
                            </div>
                            <div class=\"d-flex justify-content-between mt-2\">
                                <small class=\"text-muted\">Validé: {{ logbookProgress.validated_by_mentor }}
                                    / {{ logbookProgress.total_modules }}</small>
                            </div>
                        </div>

                        {% if logbookProgress.modules_awaiting_validation  > 0 %}
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <span class=\"badge bg-warning text-dark rounded-pill\">
                                    {{ logbookProgress.modules_awaiting_validation }} en attente de validation
                                </span>
                            </div>
                        {% else %}
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <span class=\"badge bg-success rounded-pill text-light\" style=\"letter-spacing: .5px\">Aucun module en attente de validation</span>
                            </div>
                        {% endif %}

                    </div>
                </div>
            {% endfor %}
        {% else %}
            <div class=\"alert alert-info rounded-3\" role=\"alert\">
                <i class=\"bi bi-info-circle me-2\"></i>
                Aucun carnet de progression disponible.
            </div>
        {% endif %}
    </div>
    {# TODO: P1: Lorsque je désigne un tuteur je dois lui affecter le ROLE_MENTOR avec un listener #}
    {% if is_granted('ROLE_MENTOR') %}
        <ul class=\"sidebar-nav\">
            <li class=\"nav-heading py-3\">Actions tuteur</li>
        </ul>
        <div>
            <section id=\"section-crud\">
                <p class=\"d-inline-flex gap-1\">
                    <a class=\"custom-link\" data-bs-toggle=\"collapse\" href=\"#aside-crud\" role=\"button\"
                       aria-expanded=\"false\" aria-controls=\"crud\">
                        <i class=\"bi bi-file-ruled me-2\"></i>
                        <span class=\"custom-title\">Mentorat</span>
                        <i class=\"bi bi-chevron-down chevron-icon ms-2\"></i>
                    </a>
                </p>
                <div class=\"collapse\" id=\"aside-crud\">
                    <ul class=\"sidebar-nav\" id=\"sidebar-nav-formalisation\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"{{ path('mentor_dashboard_index', {'nni': app.user.nni}) }}\">
                                <i class=\"bi bi-caret-right\"></i>
                                Carnets des Collaborateurs
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    {% endif %}
</aside>
<!-- End Sidebar-->

<!-- Modal Feedback -->
<div class=\"modal fade\" id=\"feedbackModal\" tabindex=\"-1\" aria-labelledby=\"feedbackModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-light\">
                <h5 class=\"modal-title\" id=\"feedbackModalLabel\">Partagez votre retour d'expérience</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                {% if feedback_form is defined %}
                    {{ form_start(feedback_form) }}
                    <div class=\"mb-3\">
                        {{ form_label(feedback_form.title) }}
                        {{ form_widget(feedback_form.title) }}
                        {{ form_errors(feedback_form.title) }}
                    </div>
                    <div class=\"mb-3\">
                        {{ form_label(feedback_form.category) }}
                        {{ form_widget(feedback_form.category) }}
                        {{ form_errors(feedback_form.category) }}
                    </div>
                    <div class=\"mb-3\">
                        {{ form_label(feedback_form.content) }}
                        {{ form_widget(feedback_form.content) }}
                        {{ form_errors(feedback_form.content) }}
                    </div>
                    <div class=\"d-flex justify-content-end\">
                        <button type=\"button\" class=\"btn btn-secondary me-2\" data-bs-dismiss=\"modal\">Annuler</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Envoyer</button>
                    </div>
                    {{ form_end(feedback_form) }}
                {% else %}
                    <div class=\"alert alert-warning\">Le formulaire n'est pas disponible.</div>
                {% endif %}
            </div>
        </div>
    </div>
</div>
", "app/dashboard/_dashboardAside.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/_dashboardAside.html.twig");
    }
}
