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

/* app/dashboard/_dashboardHeader.html.twig */
class __TwigTemplate_f692e338ea3ce8937b388dde7c48dade extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardHeader.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardHeader.html.twig"));

        // line 1
        yield "    <!-- ======= Header ======= -->
    <header id=\"header\" class=\"header fixed-top d-flex align-items-center\">

        <!-- Logo -->
        <div class=\"d-flex align-items-center justify-content-between\">
            <a href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6), "nni", [], "any", false, false, false, 6)]), "html", null, true);
        yield "\" class=\"logo d-flex align-items-center\">
                <img src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/edf.png"), "html", null, true);
        yield "\" alt=\"Logo EDF\">
                <span class=\"d-none d-lg-block\" style=\"font-size: 14px;\">Carnet de Compagnonnage</span>
            </a>
            <button id=\"sidebar-toggle\"
                class=\"sidebar-toggle-btn\"
                aria-label=\"Toggle sidebar\"
                role=\"button\">
                <i class=\"bi bi-list toggle-sidebar-btn\"></i>
            </button>
            ";
        // line 18
        yield "        </div>
        <!-- End Logo -->

        <nav class=\"header-nav ms-auto\">
            <ul class=\"d-flex align-items-center\">

                <!-- Profile Nav -->
                <li class=\"nav-item dropdown pe-3\">
                    <!-- Profile Image Icon -->
                    <span class=\"dropdown-toggle nav-link nav-profile d-flex align-items-center pe-0\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-person-circle\"></i>
                        <span class=\"d-none d-md-block ps-2\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 29, $this->source); })()), "user", [], "any", false, false, false, 29), "fullname", [], "any", false, false, false, 29), "html", null, true);
        yield "</span>
                    </span>
                    <!-- End Profile Image Icon -->

                    <!-- Profile Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow profile\">
                        <li class=\"dropdown-header text-center\">
                            <h6 class=\"fw-bold\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "fullname", [], "any", false, false, false, 36), "html", null, true);
        yield "</h6>
                            <span class=\"d-block text-muted\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "job", [], "any", false, false, false, 37), "name", [], "any", false, false, false, 37), "html", null, true);
        yield "</span>
                            <small class=\"d-block fst-italic text-muted\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "speciality", [], "any", false, false, false, 38), "name", [], "any", false, false, false, 38), "html", null, true);
        yield "</small>
                            <div class=\"mt-2\">
                                <small class=\"badge bg-success text-white\" style=\"letter-spacing: 1px;\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "user", [], "any", false, false, false, 40), "nni", [], "any", false, false, false, 40), "html", null, true);
        yield "</small>
                            </div>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        ";
        // line 47
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 48
            yield "                            <li>
                                <a class=\"dropdown-item d-flex align-items-center\" href=\"";
            // line 49
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\">
                                    <i class=\"bi bi-person\"></i>
                                    <span>Administration</span>
                                </a>
                            </li>
                            <li>
                                <hr class=\"dropdown-divider\">
                            </li>
                        ";
        }
        // line 58
        yield "
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_profile_settings");
        yield "\">
                                <i class=\"bi bi-gear\"></i>
                                <span>Paramètres du compte</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("my_feedbacks_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70), "nni", [], "any", false, false, false, 70)]), "html", null, true);
        yield "\">
                                <i class=\"bi bi-chat-quote\"></i>
                                <span>Mes retours d'expérience</span>
                                ";
        // line 73
        $context["feedbackCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 73), "feedbacks", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "user", [], "any", false, false, false, 73), "feedbacks", [], "any", false, false, false, 73), [])) : ([])));
        // line 74
        yield "                                ";
        if (((isset($context["feedbackCount"]) || array_key_exists("feedbackCount", $context) ? $context["feedbackCount"] : (function () { throw new RuntimeError('Variable "feedbackCount" does not exist.', 74, $this->source); })()) > 0)) {
            // line 75
            yield "                                    <span class=\"badge rounded-pill bg-success ms-auto\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["feedbackCount"]) || array_key_exists("feedbackCount", $context) ? $context["feedbackCount"] : (function () { throw new RuntimeError('Variable "feedbackCount" does not exist.', 75, $this->source); })()), "html", null, true);
            yield "</span>
                                ";
        }
        // line 77
        yield "                            </a>
                        </li>

                         <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"";
        // line 85
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_export_data");
        yield "\">
                                <i class=\"bi bi-file-earmark-pdf\"></i>
                                <span>Exporter mes données personnelles</span>
                            </a>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            ";
        // line 96
        if ((($tmp = $this->extensions['App\Twig\AccountDeletionExtension']->hasPendingDeletionRequest()) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 97
            yield "                                <a class=\"dropdown-item d-flex align-items-center\" style=\"color: rgb(149, 117, 19);\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_deletion_cancel");
            yield "\">
                                    <i class=\"bi bi-x-circle\"></i>
                                    <span>Annuler la suppression du compte</span>
                                </a>
                            ";
        } else {
            // line 102
            yield "                                <a class=\"dropdown-item d-flex align-items-center text-danger\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_deletion_request");
            yield "\">
                                    <i class=\"bi bi-trash\"></i>
                                    <span>Supprimer mon compte</span>
                                </a>
                            ";
        }
        // line 107
        yield "                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"";
        // line 114
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
                                <i class=\"bi bi-box-arrow-right\"></i>
                                <span>Déconnexion</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->
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
        return "app/dashboard/_dashboardHeader.html.twig";
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
        return array (  221 => 114,  212 => 107,  203 => 102,  194 => 97,  192 => 96,  178 => 85,  168 => 77,  162 => 75,  159 => 74,  157 => 73,  151 => 70,  138 => 60,  134 => 58,  122 => 49,  119 => 48,  117 => 47,  107 => 40,  102 => 38,  98 => 37,  94 => 36,  84 => 29,  71 => 18,  59 => 7,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("    <!-- ======= Header ======= -->
    <header id=\"header\" class=\"header fixed-top d-flex align-items-center\">

        <!-- Logo -->
        <div class=\"d-flex align-items-center justify-content-between\">
            <a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"logo d-flex align-items-center\">
                <img src=\"{{ asset('images/logos/edf.png') }}\" alt=\"Logo EDF\">
                <span class=\"d-none d-lg-block\" style=\"font-size: 14px;\">Carnet de Compagnonnage</span>
            </a>
            <button id=\"sidebar-toggle\"
                class=\"sidebar-toggle-btn\"
                aria-label=\"Toggle sidebar\"
                role=\"button\">
                <i class=\"bi bi-list toggle-sidebar-btn\"></i>
            </button>
            {# <i id=\"sidebar-toggle\" class=\"bi bi-list toggle-sidebar-btn\" 
                aria-label=\"Toggle sidebar\" role=\"button\"></i> #}
        </div>
        <!-- End Logo -->

        <nav class=\"header-nav ms-auto\">
            <ul class=\"d-flex align-items-center\">

                <!-- Profile Nav -->
                <li class=\"nav-item dropdown pe-3\">
                    <!-- Profile Image Icon -->
                    <span class=\"dropdown-toggle nav-link nav-profile d-flex align-items-center pe-0\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-person-circle\"></i>
                        <span class=\"d-none d-md-block ps-2\">{{ app.user.fullname }}</span>
                    </span>
                    <!-- End Profile Image Icon -->

                    <!-- Profile Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow profile\">
                        <li class=\"dropdown-header text-center\">
                            <h6 class=\"fw-bold\">{{ app.user.fullname }}</h6>
                            <span class=\"d-block text-muted\">{{ app.user.job.name }}</span>
                            <small class=\"d-block fst-italic text-muted\">{{ app.user.speciality.name }}</small>
                            <div class=\"mt-2\">
                                <small class=\"badge bg-success text-white\" style=\"letter-spacing: 1px;\">{{ app.user.nni }}</small>
                            </div>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        {% if is_granted('ROLE_ADMIN') %}
                            <li>
                                <a class=\"dropdown-item d-flex align-items-center\" href=\"{{ path('admin') }}\">
                                    <i class=\"bi bi-person\"></i>
                                    <span>Administration</span>
                                </a>
                            </li>
                            <li>
                                <hr class=\"dropdown-divider\">
                            </li>
                        {% endif %}

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"{{ path('app_user_profile_settings') }}\">
                                <i class=\"bi bi-gear\"></i>
                                <span>Paramètres du compte</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"{{ path('my_feedbacks_index', {'nni': app.user.nni}) }}\">
                                <i class=\"bi bi-chat-quote\"></i>
                                <span>Mes retours d'expérience</span>
                                {% set feedbackCount = app.user.feedbacks|default([])|length %}
                                {% if feedbackCount > 0 %}
                                    <span class=\"badge rounded-pill bg-success ms-auto\">{{ feedbackCount }}</span>
                                {% endif %}
                            </a>
                        </li>

                         <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"{{ path('app_user_export_data') }}\">
                                <i class=\"bi bi-file-earmark-pdf\"></i>
                                <span>Exporter mes données personnelles</span>
                            </a>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            {% if has_pending_deletion_request() %}
                                <a class=\"dropdown-item d-flex align-items-center\" style=\"color: rgb(149, 117, 19);\" href=\"{{ path('app_account_deletion_cancel') }}\">
                                    <i class=\"bi bi-x-circle\"></i>
                                    <span>Annuler la suppression du compte</span>
                                </a>
                            {% else %}
                                <a class=\"dropdown-item d-flex align-items-center text-danger\" href=\"{{ path('app_account_deletion_request') }}\">
                                    <i class=\"bi bi-trash\"></i>
                                    <span>Supprimer mon compte</span>
                                </a>
                            {% endif %}
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"{{ path('app_logout') }}\">
                                <i class=\"bi bi-box-arrow-right\"></i>
                                <span>Déconnexion</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->
", "app/dashboard/_dashboardHeader.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/_dashboardHeader.html.twig");
    }
}
