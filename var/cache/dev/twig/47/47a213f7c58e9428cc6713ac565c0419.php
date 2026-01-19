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

/* admin/progress/dashboard.html.twig */
class __TwigTemplate_2dae3f5fecd6044f4bc606d43b7631ff extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/dashboard.html.twig"));

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

        yield "Tableau de bord de progression des apprenants";
        
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
        yield "<div class=\"container-fluid py-4\">
    <div class=\"dashboard-header\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h1 class=\"d-flex align-items-center\">
                    <span class=\"d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3\" style=\"width: 48px; height: 48px\">
                        <i class=\"bi bi-bar-chart-line fs-4\"></i>
                    </span>
                    Tableau de bord de progression
                </h1>
                <p class=\"text-muted mt-2 mb-3 fs-sm\">Suivez en temps réel l'avancement des apprenants et la validation des tuteurs</p>

                <!-- Bouton de retour vers l'administration - s'affiche sous le paragraphe sur mobile/tablette et à droite sur desktop -->
                <div class=\"d-flex d-lg-none mb-2\">
                    <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        yield "\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center w-100 justify-content-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                        <i class=\"bi bi-arrow-left me-2\"></i>Administration
                    </a>
                </div>
            </div>
            <div class=\"col-12 d-none d-lg-flex justify-content-end\">
                <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        yield "\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                    <i class=\"bi bi-arrow-left me-2\"></i>Administration
                </a>
            </div>
        </div>
    </div>

    ";
        // line 33
        if ((array_key_exists("user_has_no_service", $context) && (isset($context["user_has_no_service"]) || array_key_exists("user_has_no_service", $context) ? $context["user_has_no_service"] : (function () { throw new RuntimeError('Variable "user_has_no_service" does not exist.', 33, $this->source); })()))) {
            // line 34
            yield "        <div class=\"alert alert-warning mb-4\" role=\"alert\">
            <div class=\"d-flex align-items-center\">
                <i class=\"bi bi-exclamation-triangle fs-4 me-3\"></i>
                <div>
                    <h5 class=\"alert-heading mb-1\">Service non assigné</h5>
                    <p class=\"mb-0\">Bonjour <strong>";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "user", [], "any", false, false, false, 39), "fullname", [], "any", false, false, false, 39), "html", null, true);
            yield "</strong>, Pour consulter les carnets de bord et les retours d'expérience spécifiques à votre service, veuillez vous assigner un service dans la <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_index");
            yield "\" class=\"alert-link\">gestion des utilisateurs</a>.</p>
                </div>
            </div>
        </div>
    ";
        }
        // line 44
        yield "
    ";
        // line 46
        yield "    <div id=\"global-stats\" class=\"content-card mb-4\">
        <div class=\"card-header\">
            <h5 class=\"mb-0 d-flex align-items-center\">
                <i class=\"bi bi-bar-chart-line-fill me-2 text-warning\"></i>Statistiques globales
            </h5>
            <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                <i class=\"bi bi-lightning-charge-fill me-1\"></i>Temps réel
            </span>
        </div>
        <div class=\"card-body p-4\">
            <div class=\"row g-4 align-items-stretch justify-content-around\">
                <div id=\"total-users\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-primary bg-opacity-10 p-3\">
                                    <i class=\"bi bi-people text-primary\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 65, $this->source); })()), "total_users", [], "any", false, false, false, 65), "html", null, true);
        yield "</div>
                            <div class=\"stat-label\">Apprenants inscrits</div>
                        </div>
                    </div>
                </div>
                <div id=\"total-logbooks\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-success bg-opacity-10 p-3\">
                                    <i class=\"bi bi-book text-success\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 78, $this->source); })()), "users_with_logbook", [], "any", false, false, false, 78), "html", null, true);
        yield "</div>
                            <div class=\"stat-label\">Carnets créés</div>
                        </div>
                    </div>
                </div>
                <div id=\"total-feedbacks\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-info bg-opacity-10 p-3\">
                                    <i class=\"bi bi-chat-dots text-info\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 91, $this->source); })()), "total_feedbacks", [], "any", false, false, false, 91), "html", null, true);
        yield "</div>
                            <div class=\"stat-label\">Retours d'expérience</div>
                            ";
        // line 93
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 93, $this->source); })()), "pending_feedbacks", [], "any", false, false, false, 93) > 0)) {
            // line 94
            yield "                                <div class=\"mt-2\">
                                    <span class=\"badge bg-warning text-dark fw-light\">";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 95, $this->source); })()), "pending_feedbacks", [], "any", false, false, false, 95), "html", null, true);
            yield " en attente</span>
                                </div>
                            ";
        }
        // line 98
        yield "                        </div>
                    </div>
                </div>
                <div id=\"average-validated-users\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-info bg-opacity-10 p-3\">
                                    <i class=\"bi bi-person-check text-info\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 109, $this->source); })()), "average_agent_progress", [], "any", false, false, false, 109), "html", null, true);
        yield "<small>%</small></div>
                            <div class=\"stat-label\">Auto-validation (moy.)</div>
                        </div>
                    </div>
                </div>
                <div id=\"average-validated-mentors\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-warning bg-opacity-10 p-3\">
                                    <i class=\"bi bi-award text-warning-emphasis\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 122, $this->source); })()), "average_mentor_progress", [], "any", false, false, false, 122), "html", null, true);
        yield "<small>%</small></div>
                            <div class=\"stat-label\">Validation tuteur (moy.)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
        // line 130
        yield "        <div class=\"card-footer text-end\">
            <a href=\"";
        // line 131
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
        yield "\" class=\"btn btn-outline-primary btn-sm\">
                <i class=\"bi bi-chat-dots me-2\"></i>Gérer les retours d'expérience
                ";
        // line 133
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 133, $this->source); })()), "pending_feedbacks", [], "any", false, false, false, 133) > 0)) {
            // line 134
            yield "                    <span class=\"badge bg-warning text-dark ms-2 fw-light\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["global_stats"]) || array_key_exists("global_stats", $context) ? $context["global_stats"] : (function () { throw new RuntimeError('Variable "global_stats" does not exist.', 134, $this->source); })()), "pending_feedbacks", [], "any", false, false, false, 134), "html", null, true);
            yield "</span>
                ";
        }
        // line 136
        yield "            </a>
        </div>
    </div>

    ";
        // line 141
        yield "    <div class=\"content-card\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <h5 class=\"mb-0\"><i class=\"bi bi-person-workspace me-2 text-warning\"></i>Progression des apprenants</h5>
            <span class=\"badge bg-light text-primary rounded-pill\">";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 144, $this->source); })()), "totalItems", [], "any", false, false, false, 144), "html", null, true);
        yield " apprenants</span>
        </div>

        ";
        // line 148
        yield "        <div class=\"px-4 pt-4\">
            <form action=\"";
        // line 149
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard");
        yield "\" method=\"get\" class=\"mb-4\">
                <div class=\"row g-3 align-items-center\">
                    <div class=\"col-md-6 col-lg-4\">
                        <div class=\"search-box position-relative\">
                            <div class=\"input-group input-group-merge shadow-sm rounded-pill overflow-hidden\" style=\"border-radius: var(--btn-radius)\">
                                <span class=\"input-group-text bg-white border-0 ps-3\">
                                    <i class=\"bi bi-search text-primary\"></i>
                                </span>
                                <input type=\"text\" name=\"search\" value=\"";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 157, $this->source); })()), "html", null, true);
        yield "\"
                                    class=\"form-control border-0 ps-1 pe-3\"
                                    placeholder=\"Rechercher un apprenant...\"
                                    style=\"padding: 0.65rem 0.75rem; box-shadow: none;\">
                            </div>
                        </div>
                    </div>
                    ";
        // line 164
        if ((($tmp = (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 164, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 165
            yield "                        <div class=\"col-auto\">
                            <a href=\"";
            // line 166
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard");
            yield "\"
                                class=\"btn btn-outline-secondary rounded-pill d-flex align-items-center\"
                                style=\"padding: 0.6rem 1.2rem; transition: all 0.2s ease;\">
                                <i class=\"bi bi-x-circle me-2\"></i>Effacer la recherche
                            </a>
                        </div>
                    ";
        }
        // line 173
        yield "
                    <div class=\"col-auto ms-auto\">
                        <div class=\"badge bg-light text-primary rounded-pill py-2 px-3 fs-sm\">
                            <i class=\"bi bi-info-circle me-1\"></i>
                            ";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 177, $this->source); })()), "totalItems", [], "any", false, false, false, 177), "html", null, true);
        yield " apprenants au total
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class=\"card-body\">
            <!-- Vue mobile/tablette (cartes) - Visible uniquement sur les petits écrans -->
            <div id=\"apprenants-cards\" class=\"d-block d-lg-none\">
                ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users_data"]) || array_key_exists("users_data", $context) ? $context["users_data"] : (function () { throw new RuntimeError('Variable "users_data" does not exist.', 187, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user_data"]) {
            // line 188
            yield "                <div class=\"content-card\">
                    <!-- En-tête de la carte avec informations principales -->
                    <div class=\"card-header-custom\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"avatar-container\">
                                <div class=\"avatar-placeholder bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 42px; height: 42px; font-weight: 600;\">
                                    ";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 194), "firstname", [], "any", false, false, false, 194)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 194), "lastname", [], "any", false, false, false, 194)), "html", null, true);
            yield "
                                </div>
                            </div>
                            <div>
                                <h5 class=\"mb-0 fw-semibold text-dark\">";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 198), "fullName", [], "any", false, false, false, 198), "html", null, true);
            yield "</h5>
                                <small class=\"text-muted\">";
            // line 199
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 199), "email", [], "any", false, false, false, 199), "html", null, true);
            yield "</small>
                            </div>
                        </div>

                        <div class=\"row g-3 mt-2\">
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-person-check text-primary me-2\"></i>
                                    <div>
                                        <small class=\"text-muted d-block\">Tuteur</small>
                                        ";
            // line 209
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 209)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 210
                yield "                                            <span class=\"fw-medium\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 210), "fullName", [], "any", false, false, false, 210), "html", null, true);
                yield "</span>
                                        ";
            } else {
                // line 212
                yield "                                            <span class=\"badge bg-warning text-dark fw-light ls-1\">Non assigné</span>
                                        ";
            }
            // line 214
            yield "                                    </div>
                                </div>
                            </div>
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-calendar-event text-primary me-2\"></i>
                                    <div>
                                        <small class=\"text-muted d-block\">Date d'embauche</small>
                                        ";
            // line 222
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "hiring_date", [], "any", false, false, false, 222)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 223
                yield "                                            <span class=\"fw-medium\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "hiring_date", [], "any", false, false, false, 223), "d/m/Y"), "html", null, true);
                yield "</span>
                                        ";
            } else {
                // line 225
                yield "                                            <span class=\"text-muted\">Non renseigné</span>
                                        ";
            }
            // line 227
            yield "                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la carte avec progression -->
                    <div class=\"card-body-custom\">
                        <div class=\"progress-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <label class=\"form-label mb-0 text-dark fw-medium d-flex align-items-center\">
                                    <i class=\"bi bi-person text-primary me-2\"></i>Auto-validation
                                </label>
                                <span class=\"badge ";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 240), "progress_class_agent", [], "any", false, false, false, 240), "html", null, true);
            yield " rounded-pill\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 240), "agent_progress", [], "any", false, false, false, 240), "html", null, true);
            yield "%</span>
                            </div>
                            <div class=\"progress\">
                                <div class=\"progress-bar ";
            // line 243
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 243), "progress_class_agent", [], "any", false, false, false, 243), "html", null, true);
            yield "\" role=\"progressbar\" style=\"width: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 243), "agent_progress", [], "any", false, false, false, 243), "html", null, true);
            yield "%; opacity: 0.9;\" aria-valuenow=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 243), "agent_progress", [], "any", false, false, false, 243), "html", null, true);
            yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                            </div>
                            <small class=\"text-muted mt-1 d-block text-center\">";
            // line 245
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 245), "completed_by_agent", [], "any", false, false, false, 245), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 245), "total_modules", [], "any", false, false, false, 245), "html", null, true);
            yield " modules</small>
                        </div>

                        <div class=\"progress-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <label class=\"form-label mb-0 text-dark fw-medium d-flex align-items-center\">
                                    <i class=\"bi bi-award text-warning me-2\"></i>Validation tuteur
                                </label>
                                <span class=\"badge ";
            // line 253
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 253), "progress_class_mentor", [], "any", false, false, false, 253), "html", null, true);
            yield " rounded-pill\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 253), "mentor_progress", [], "any", false, false, false, 253), "html", null, true);
            yield "%</span>
                            </div>
                            <div class=\"progress\">
                                <div class=\"progress-bar ";
            // line 256
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 256), "progress_class_mentor", [], "any", false, false, false, 256), "html", null, true);
            yield "\" role=\"progressbar\" style=\"width: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 256), "mentor_progress", [], "any", false, false, false, 256), "html", null, true);
            yield "%; opacity: 0.9;\" aria-valuenow=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 256), "mentor_progress", [], "any", false, false, false, 256), "html", null, true);
            yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                            </div>
                            <small class=\"text-muted mt-1 d-block text-center\">";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 258), "validated_by_mentor", [], "any", false, false, false, 258), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 258), "total_modules", [], "any", false, false, false, 258), "html", null, true);
            yield " modules</small>
                        </div>

                        <!-- Actions -->
                        <div class=\"action-buttons\">
                            <div class=\"d-flex flex-wrap gap-2 justify-content-center\">
                                ";
            // line 264
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "logbook", [], "any", false, false, false, 264)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 265
                yield "                                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_user_details", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 265), "id", [], "any", false, false, false, 265)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-primary rounded-pill action-btn\" style=\"font-weight: 500;\">
                                        <i class=\"bi bi-eye me-1\"></i> Détails
                                    </a>
                                    <a href=\"";
                // line 268
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_generate_workbook", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 268), "id", [], "any", false, false, false, 268)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-secondary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\" target=\"_blank\">
                                        <i class=\"bi bi-file-pdf me-1\"></i> PDF
                                    </a>
                                ";
            } else {
                // line 272
                yield "                                    <span class=\"badge bg-light text-danger border border-danger\" style=\"font-weight: 500; padding: 0.5rem 1rem;\">
                                        <i class=\"bi bi-exclamation-triangle-fill me-1\"></i> Pas de carnet
                                    </span>
                                ";
            }
            // line 276
            yield "                            </div>
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user_data'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 281
        yield "            </div>

            <!-- Vue desktop (tableau) - Visible uniquement sur grands écrans -->
            <div id=\"apprenants-table\" class=\"table-responsive d-none d-lg-block\">
                <table class=\"table table-hover data-table mb-0\">
                    <thead>
                        <tr>
                            <th class=\"ps-4\">Apprenant</th>
                            <th>Tuteur</th>
                            <th>Date d'embauche</th>
                            <th>Auto-validation</th>
                            <th>Validation tuteur</th>
                            <th class=\"text-center\">Actions</th>
                            <th class=\"text-center\">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 298
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users_data"]) || array_key_exists("users_data", $context) ? $context["users_data"] : (function () { throw new RuntimeError('Variable "users_data" does not exist.', 298, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user_data"]) {
            // line 299
            yield "                            <tr class=\"align-middle\">
                                <td class=\"ps-4\">
                                    <div class=\"d-flex align-items-center\">
                                        <div class=\"avatar-placeholder bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3\" style=\"width: 40px; height: 40px;\">
                                            ";
            // line 303
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 303), "firstname", [], "any", false, false, false, 303)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 303), "lastname", [], "any", false, false, false, 303)), "html", null, true);
            yield "
                                        </div>
                                        <div>
                                            <h6 class=\"mb-0\">";
            // line 306
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 306), "fullName", [], "any", false, false, false, 306), "html", null, true);
            yield "</h6>
                                            <small class=\"text-muted\">";
            // line 307
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 307), "email", [], "any", false, false, false, 307), "html", null, true);
            yield "</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ";
            // line 312
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 312)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 313
                yield "                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"avatar-placeholder bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 32px; height: 32px;\">
                                                ";
                // line 315
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 315), "firstname", [], "any", false, false, false, 315)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 315), "lastname", [], "any", false, false, false, 315)), "html", null, true);
                yield "
                                            </div>
                                            <span>";
                // line 317
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "mentor", [], "any", false, false, false, 317), "fullName", [], "any", false, false, false, 317), "html", null, true);
                yield "</span>
                                        </div>
                                    ";
            } else {
                // line 320
                yield "                                        <span class=\"badge bg-warning text-dark fw-light ls-1\">Non assigné</span>
                                    ";
            }
            // line 322
            yield "                                </td>
                                <td>
                                    ";
            // line 324
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "hiring_date", [], "any", false, false, false, 324)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 325
                yield "                                        <span class=\"text-dark\" style=\"font-size: .9rem\">
                                            <i class=\"bi bi-calendar me-1\"></i> ";
                // line 326
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "hiring_date", [], "any", false, false, false, 326), "d/m/Y"), "html", null, true);
                yield "
                                        </span>
                                    ";
            } else {
                // line 329
                yield "                                        <span class=\"text-muted\">Non renseigné</span>
                                    ";
            }
            // line 331
            yield "                                </td>
                                <td>
                                    <div class=\"d-flex flex-column gap-1\">
                                        <div class=\"progress\">
                                            <div class=\"progress-bar ";
            // line 335
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 335), "progress_class_agent", [], "any", false, false, false, 335), "html", null, true);
            yield "\" role=\"progressbar\" style=\"width: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 335), "agent_progress", [], "any", false, false, false, 335), "html", null, true);
            yield "%; opacity: 0.85;\" aria-valuenow=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 335), "agent_progress", [], "any", false, false, false, 335), "html", null, true);
            yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                                        </div>
                                        <div class=\"d-flex justify-content-between align-items-center\">
                                            <small class=\"text-muted\">";
            // line 338
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 338), "completed_by_agent", [], "any", false, false, false, 338), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 338), "total_modules", [], "any", false, false, false, 338), "html", null, true);
            yield "</small>
                                            <span class=\"badge ";
            // line 339
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 339), "progress_class_agent", [], "any", false, false, false, 339), "html", null, true);
            yield " rounded-pill\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 339), "agent_progress", [], "any", false, false, false, 339), "html", null, true);
            yield "%</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"d-flex flex-column gap-1\">
                                        <div class=\"progress\">
                                            <div class=\"progress-bar ";
            // line 346
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 346), "progress_class_mentor", [], "any", false, false, false, 346), "html", null, true);
            yield "\"
                                                role=\"progressbar\" style=\"width: ";
            // line 347
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 347), "mentor_progress", [], "any", false, false, false, 347), "html", null, true);
            yield "%; opacity: 0.85;\"
                                                aria-valuenow=\"";
            // line 348
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 348), "mentor_progress", [], "any", false, false, false, 348), "html", null, true);
            yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                            </div>
                                        </div>
                                        <div class=\"d-flex justify-content-between align-items-center\">
                                            <small class=\"text-muted\">";
            // line 352
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 352), "validated_by_mentor", [], "any", false, false, false, 352), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 352), "total_modules", [], "any", false, false, false, 352), "html", null, true);
            yield "</small>
                                            <span class=\"badge ";
            // line 353
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 353), "progress_class_mentor", [], "any", false, false, false, 353), "html", null, true);
            yield " rounded-pill\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "progress", [], "any", false, false, false, 353), "mentor_progress", [], "any", false, false, false, 353), "html", null, true);
            yield "%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class=\"text-center\">
                                    ";
            // line 358
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "logbook", [], "any", false, false, false, 358)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 359
                yield "                                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_user_details", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 359), "id", [], "any", false, false, false, 359)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\">
                                            <i class=\"bi bi-eye me-1\"></i> Détails
                                        </a>
                                    ";
            } else {
                // line 363
                yield "                                        <span class=\"badge bg-light text-danger border border-danger\" style=\"font-weight: 500;\">Pas de carnet</span>
                                    ";
            }
            // line 365
            yield "                                </td>
                                ";
            // line 367
            yield "                                <td class=\"text-center\">
                                    ";
            // line 368
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "logbook", [], "any", false, false, false, 368)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 369
                yield "                                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_generate_workbook", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user_data"], "user", [], "any", false, false, false, 369), "id", [], "any", false, false, false, 369)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-secondary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\" target=\"_blank\" title=\"Générer le carnet de compagnonnage en PDF\">
                                            <i class=\"bi bi-file-pdf me-1\"></i> PDF
                                        </a>
                                    ";
            } else {
                // line 373
                yield "                                        <span class=\"badge bg-light text-muted border\" style=\"font-weight: 500;\">Non disponible</span>
                                    ";
            }
            // line 375
            yield "                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user_data'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 378
        yield "                    </tbody>
                </table>
            </div>

            ";
        // line 383
        yield "            ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 383, $this->source); })()), "totalPages", [], "any", false, false, false, 383) > 1)) {
            // line 384
            yield "            <div class=\"px-4 py-3 bg-light border-top d-flex justify-content-between align-items-center\">
                <div class=\"small text-muted\">
                    Affichage de ";
            // line 386
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 386, $this->source); })()), "currentPage", [], "any", false, false, false, 386) - 1) * CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 386, $this->source); })()), "itemsPerPage", [], "any", false, false, false, 386)) + 1), "html", null, true);
            yield " à
                    ";
            // line 387
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(min(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 387, $this->source); })()), "totalItems", [], "any", false, false, false, 387), (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 387, $this->source); })()), "currentPage", [], "any", false, false, false, 387) * CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 387, $this->source); })()), "itemsPerPage", [], "any", false, false, false, 387))), "html", null, true);
            yield "
                    sur ";
            // line 388
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 388, $this->source); })()), "totalItems", [], "any", false, false, false, 388), "html", null, true);
            yield " apprenants
                </div>
                <nav aria-label=\"Navigation des pages\">
                    <ul class=\"pagination pagination-sm mb-0\">
                        ";
            // line 393
            yield "                        <li class=\"page-item ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 393, $this->source); })()), "currentPage", [], "any", false, false, false, 393) <= 1)) ? ("disabled") : (""));
            yield "\">
                            <a class=\"page-link\" href=\"";
            // line 394
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard", ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 394, $this->source); })()), "currentPage", [], "any", false, false, false, 394) - 1), "search" => (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 394, $this->source); })())]), "html", null, true);
            yield "\" aria-label=\"Précédent\">
                                <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                        </li>

                        ";
            // line 400
            yield "                        ";
            $context["startPage"] = max(1, (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 400, $this->source); })()), "currentPage", [], "any", false, false, false, 400) - 2));
            // line 401
            yield "                        ";
            $context["endPage"] = min(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 401, $this->source); })()), "totalPages", [], "any", false, false, false, 401), (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 401, $this->source); })()), "currentPage", [], "any", false, false, false, 401) + 2));
            // line 402
            yield "
                        ";
            // line 403
            if (((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 403, $this->source); })()) > 1)) {
                // line 404
                yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
                // line 405
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard", ["page" => 1, "search" => (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 405, $this->source); })())]), "html", null, true);
                yield "\">1</a>
                            </li>
                            ";
                // line 407
                if (((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 407, $this->source); })()) > 2)) {
                    // line 408
                    yield "                                <li class=\"page-item disabled\"><span class=\"page-link\">...</span></li>
                            ";
                }
                // line 410
                yield "                        ";
            }
            // line 411
            yield "
                        ";
            // line 412
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 412, $this->source); })()), (isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 412, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 413
                yield "                            <li class=\"page-item ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 413, $this->source); })()), "currentPage", [], "any", false, false, false, 413) == $context["i"])) ? ("active") : (""));
                yield "\">
                                <a class=\"page-link\" href=\"";
                // line 414
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard", ["page" => $context["i"], "search" => (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 414, $this->source); })())]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                yield "</a>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 417
            yield "
                        ";
            // line 418
            if (((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 418, $this->source); })()) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 418, $this->source); })()), "totalPages", [], "any", false, false, false, 418))) {
                // line 419
                yield "                            ";
                if (((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 419, $this->source); })()) < (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 419, $this->source); })()), "totalPages", [], "any", false, false, false, 419) - 1))) {
                    // line 420
                    yield "                                <li class=\"page-item disabled\"><span class=\"page-link\">...</span></li>
                            ";
                }
                // line 422
                yield "                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"";
                // line 423
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard", ["page" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 423, $this->source); })()), "totalPages", [], "any", false, false, false, 423), "search" => (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 423, $this->source); })())]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 423, $this->source); })()), "totalPages", [], "any", false, false, false, 423), "html", null, true);
                yield "</a>
                            </li>
                        ";
            }
            // line 426
            yield "
                        ";
            // line 428
            yield "                        <li class=\"page-item ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 428, $this->source); })()), "currentPage", [], "any", false, false, false, 428) >= CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 428, $this->source); })()), "totalPages", [], "any", false, false, false, 428))) ? ("disabled") : (""));
            yield "\">
                            <a class=\"page-link\" href=\"";
            // line 429
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard", ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 429, $this->source); })()), "currentPage", [], "any", false, false, false, 429) + 1), "search" => (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 429, $this->source); })())]), "html", null, true);
            yield "\" aria-label=\"Suivant\">
                                <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            ";
        }
        // line 437
        yield "        </div>
    </div>
</div>
    ";
        // line 440
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 441
        yield "        ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialisation de DataTables pour le tableau des utilisateurs
                if (typeof \$.fn !== 'undefined' && \$.fn.DataTable) {
                    \$('.table').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
                        },
                        order: [[4, 'desc']], // Tri par défaut sur la colonne de progression (auto-validation)
                        responsive: true
                    });
                }
            });
        </script>
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
        return "admin/progress/dashboard.html.twig";
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
        return array (  891 => 441,  868 => 440,  863 => 437,  852 => 429,  847 => 428,  844 => 426,  836 => 423,  833 => 422,  829 => 420,  826 => 419,  824 => 418,  821 => 417,  810 => 414,  805 => 413,  801 => 412,  798 => 411,  795 => 410,  791 => 408,  789 => 407,  784 => 405,  781 => 404,  779 => 403,  776 => 402,  773 => 401,  770 => 400,  762 => 394,  757 => 393,  750 => 388,  746 => 387,  742 => 386,  738 => 384,  735 => 383,  729 => 378,  721 => 375,  717 => 373,  709 => 369,  707 => 368,  704 => 367,  701 => 365,  697 => 363,  689 => 359,  687 => 358,  677 => 353,  671 => 352,  664 => 348,  660 => 347,  656 => 346,  644 => 339,  638 => 338,  628 => 335,  622 => 331,  618 => 329,  612 => 326,  609 => 325,  607 => 324,  603 => 322,  599 => 320,  593 => 317,  587 => 315,  583 => 313,  581 => 312,  573 => 307,  569 => 306,  562 => 303,  556 => 299,  552 => 298,  533 => 281,  523 => 276,  517 => 272,  510 => 268,  503 => 265,  501 => 264,  490 => 258,  481 => 256,  473 => 253,  460 => 245,  451 => 243,  443 => 240,  428 => 227,  424 => 225,  418 => 223,  416 => 222,  406 => 214,  402 => 212,  396 => 210,  394 => 209,  381 => 199,  377 => 198,  369 => 194,  361 => 188,  357 => 187,  344 => 177,  338 => 173,  328 => 166,  325 => 165,  323 => 164,  313 => 157,  302 => 149,  299 => 148,  293 => 144,  288 => 141,  282 => 136,  276 => 134,  274 => 133,  269 => 131,  266 => 130,  256 => 122,  240 => 109,  227 => 98,  221 => 95,  218 => 94,  216 => 93,  211 => 91,  195 => 78,  179 => 65,  158 => 46,  155 => 44,  145 => 39,  138 => 34,  136 => 33,  126 => 26,  117 => 20,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Tableau de bord de progression des apprenants{% endblock %}

{% block body %}
<div class=\"container-fluid py-4\">
    <div class=\"dashboard-header\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h1 class=\"d-flex align-items-center\">
                    <span class=\"d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3\" style=\"width: 48px; height: 48px\">
                        <i class=\"bi bi-bar-chart-line fs-4\"></i>
                    </span>
                    Tableau de bord de progression
                </h1>
                <p class=\"text-muted mt-2 mb-3 fs-sm\">Suivez en temps réel l'avancement des apprenants et la validation des tuteurs</p>

                <!-- Bouton de retour vers l'administration - s'affiche sous le paragraphe sur mobile/tablette et à droite sur desktop -->
                <div class=\"d-flex d-lg-none mb-2\">
                    <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center w-100 justify-content-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                        <i class=\"bi bi-arrow-left me-2\"></i>Administration
                    </a>
                </div>
            </div>
            <div class=\"col-12 d-none d-lg-flex justify-content-end\">
                <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                    <i class=\"bi bi-arrow-left me-2\"></i>Administration
                </a>
            </div>
        </div>
    </div>

    {% if user_has_no_service is defined and user_has_no_service %}
        <div class=\"alert alert-warning mb-4\" role=\"alert\">
            <div class=\"d-flex align-items-center\">
                <i class=\"bi bi-exclamation-triangle fs-4 me-3\"></i>
                <div>
                    <h5 class=\"alert-heading mb-1\">Service non assigné</h5>
                    <p class=\"mb-0\">Bonjour <strong>{{ app.user.fullname }}</strong>, Pour consulter les carnets de bord et les retours d'expérience spécifiques à votre service, veuillez vous assigner un service dans la <a href=\"{{ path('admin_user_index') }}\" class=\"alert-link\">gestion des utilisateurs</a>.</p>
                </div>
            </div>
        </div>
    {% endif %}

    {# Statistiques globales #}
    <div id=\"global-stats\" class=\"content-card mb-4\">
        <div class=\"card-header\">
            <h5 class=\"mb-0 d-flex align-items-center\">
                <i class=\"bi bi-bar-chart-line-fill me-2 text-warning\"></i>Statistiques globales
            </h5>
            <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                <i class=\"bi bi-lightning-charge-fill me-1\"></i>Temps réel
            </span>
        </div>
        <div class=\"card-body p-4\">
            <div class=\"row g-4 align-items-stretch justify-content-around\">
                <div id=\"total-users\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-primary bg-opacity-10 p-3\">
                                    <i class=\"bi bi-people text-primary\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">{{ global_stats.total_users }}</div>
                            <div class=\"stat-label\">Apprenants inscrits</div>
                        </div>
                    </div>
                </div>
                <div id=\"total-logbooks\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-success bg-opacity-10 p-3\">
                                    <i class=\"bi bi-book text-success\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">{{ global_stats.users_with_logbook }}</div>
                            <div class=\"stat-label\">Carnets créés</div>
                        </div>
                    </div>
                </div>
                <div id=\"total-feedbacks\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-info bg-opacity-10 p-3\">
                                    <i class=\"bi bi-chat-dots text-info\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">{{ global_stats.total_feedbacks }}</div>
                            <div class=\"stat-label\">Retours d'expérience</div>
                            {% if global_stats.pending_feedbacks > 0 %}
                                <div class=\"mt-2\">
                                    <span class=\"badge bg-warning text-dark fw-light\">{{ global_stats.pending_feedbacks }} en attente</span>
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
                <div id=\"average-validated-users\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-info bg-opacity-10 p-3\">
                                    <i class=\"bi bi-person-check text-info\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">{{ global_stats.average_agent_progress }}<small>%</small></div>
                            <div class=\"stat-label\">Auto-validation (moy.)</div>
                        </div>
                    </div>
                </div>
                <div id=\"average-validated-mentors\" class=\"col-md-2\">
                    <div class=\"stat-card shadow-sm\">
                        <div class=\"card-body text-center\">
                            <div class=\"d-flex align-items-center justify-content-center mb-3\">
                                <div class=\"rounded-circle bg-warning bg-opacity-10 p-3\">
                                    <i class=\"bi bi-award text-warning-emphasis\" style=\"font-size: x-large\"></i>
                                </div>
                            </div>
                            <div class=\"stat-value\">{{ global_stats.average_mentor_progress }}<small>%</small></div>
                            <div class=\"stat-label\">Validation tuteur (moy.)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {# Gestion des retours d'expérience #}
        <div class=\"card-footer text-end\">
            <a href=\"{{ path('admin_progress_feedbacks') }}\" class=\"btn btn-outline-primary btn-sm\">
                <i class=\"bi bi-chat-dots me-2\"></i>Gérer les retours d'expérience
                {% if global_stats.pending_feedbacks > 0 %}
                    <span class=\"badge bg-warning text-dark ms-2 fw-light\">{{ global_stats.pending_feedbacks }}</span>
                {% endif %}
            </a>
        </div>
    </div>

    {# Tableau des apprenants #}
    <div class=\"content-card\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <h5 class=\"mb-0\"><i class=\"bi bi-person-workspace me-2 text-warning\"></i>Progression des apprenants</h5>
            <span class=\"badge bg-light text-primary rounded-pill\">{{ pagination.totalItems }} apprenants</span>
        </div>

        {# Barre de recherche #}
        <div class=\"px-4 pt-4\">
            <form action=\"{{ path('admin_progress_dashboard') }}\" method=\"get\" class=\"mb-4\">
                <div class=\"row g-3 align-items-center\">
                    <div class=\"col-md-6 col-lg-4\">
                        <div class=\"search-box position-relative\">
                            <div class=\"input-group input-group-merge shadow-sm rounded-pill overflow-hidden\" style=\"border-radius: var(--btn-radius)\">
                                <span class=\"input-group-text bg-white border-0 ps-3\">
                                    <i class=\"bi bi-search text-primary\"></i>
                                </span>
                                <input type=\"text\" name=\"search\" value=\"{{ search_term }}\"
                                    class=\"form-control border-0 ps-1 pe-3\"
                                    placeholder=\"Rechercher un apprenant...\"
                                    style=\"padding: 0.65rem 0.75rem; box-shadow: none;\">
                            </div>
                        </div>
                    </div>
                    {% if search_term %}
                        <div class=\"col-auto\">
                            <a href=\"{{ path('admin_progress_dashboard') }}\"
                                class=\"btn btn-outline-secondary rounded-pill d-flex align-items-center\"
                                style=\"padding: 0.6rem 1.2rem; transition: all 0.2s ease;\">
                                <i class=\"bi bi-x-circle me-2\"></i>Effacer la recherche
                            </a>
                        </div>
                    {% endif %}

                    <div class=\"col-auto ms-auto\">
                        <div class=\"badge bg-light text-primary rounded-pill py-2 px-3 fs-sm\">
                            <i class=\"bi bi-info-circle me-1\"></i>
                            {{ pagination.totalItems }} apprenants au total
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class=\"card-body\">
            <!-- Vue mobile/tablette (cartes) - Visible uniquement sur les petits écrans -->
            <div id=\"apprenants-cards\" class=\"d-block d-lg-none\">
                {% for user_data in users_data %}
                <div class=\"content-card\">
                    <!-- En-tête de la carte avec informations principales -->
                    <div class=\"card-header-custom\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"avatar-container\">
                                <div class=\"avatar-placeholder bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center\" style=\"width: 42px; height: 42px; font-weight: 600;\">
                                    {{ user_data.user.firstname|first }}{{ user_data.user.lastname|first }}
                                </div>
                            </div>
                            <div>
                                <h5 class=\"mb-0 fw-semibold text-dark\">{{ user_data.user.fullName }}</h5>
                                <small class=\"text-muted\">{{ user_data.user.email }}</small>
                            </div>
                        </div>

                        <div class=\"row g-3 mt-2\">
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-person-check text-primary me-2\"></i>
                                    <div>
                                        <small class=\"text-muted d-block\">Tuteur</small>
                                        {% if user_data.mentor %}
                                            <span class=\"fw-medium\">{{ user_data.mentor.fullName }}</span>
                                        {% else %}
                                            <span class=\"badge bg-warning text-dark fw-light ls-1\">Non assigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-calendar-event text-primary me-2\"></i>
                                    <div>
                                        <small class=\"text-muted d-block\">Date d'embauche</small>
                                        {% if user_data.hiring_date %}
                                            <span class=\"fw-medium\">{{ user_data.hiring_date|date('d/m/Y') }}</span>
                                        {% else %}
                                            <span class=\"text-muted\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la carte avec progression -->
                    <div class=\"card-body-custom\">
                        <div class=\"progress-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <label class=\"form-label mb-0 text-dark fw-medium d-flex align-items-center\">
                                    <i class=\"bi bi-person text-primary me-2\"></i>Auto-validation
                                </label>
                                <span class=\"badge {{ user_data.progress.progress_class_agent }} rounded-pill\">{{ user_data.progress.agent_progress }}%</span>
                            </div>
                            <div class=\"progress\">
                                <div class=\"progress-bar {{ user_data.progress.progress_class_agent }}\" role=\"progressbar\" style=\"width: {{ user_data.progress.agent_progress }}%; opacity: 0.9;\" aria-valuenow=\"{{ user_data.progress.agent_progress }}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                            </div>
                            <small class=\"text-muted mt-1 d-block text-center\">{{ user_data.progress.completed_by_agent }}/{{ user_data.progress.total_modules }} modules</small>
                        </div>

                        <div class=\"progress-section\">
                            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                                <label class=\"form-label mb-0 text-dark fw-medium d-flex align-items-center\">
                                    <i class=\"bi bi-award text-warning me-2\"></i>Validation tuteur
                                </label>
                                <span class=\"badge {{ user_data.progress.progress_class_mentor }} rounded-pill\">{{ user_data.progress.mentor_progress }}%</span>
                            </div>
                            <div class=\"progress\">
                                <div class=\"progress-bar {{ user_data.progress.progress_class_mentor }}\" role=\"progressbar\" style=\"width: {{ user_data.progress.mentor_progress }}%; opacity: 0.9;\" aria-valuenow=\"{{ user_data.progress.mentor_progress }}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                            </div>
                            <small class=\"text-muted mt-1 d-block text-center\">{{ user_data.progress.validated_by_mentor }}/{{ user_data.progress.total_modules }} modules</small>
                        </div>

                        <!-- Actions -->
                        <div class=\"action-buttons\">
                            <div class=\"d-flex flex-wrap gap-2 justify-content-center\">
                                {% if user_data.logbook %}
                                    <a href=\"{{ path('admin_progress_user_details', {'id': user_data.user.id}) }}\" class=\"btn btn-sm btn-primary rounded-pill action-btn\" style=\"font-weight: 500;\">
                                        <i class=\"bi bi-eye me-1\"></i> Détails
                                    </a>
                                    <a href=\"{{ path('admin_progress_generate_workbook', {'id': user_data.user.id}) }}\" class=\"btn btn-sm btn-outline-secondary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\" target=\"_blank\">
                                        <i class=\"bi bi-file-pdf me-1\"></i> PDF
                                    </a>
                                {% else %}
                                    <span class=\"badge bg-light text-danger border border-danger\" style=\"font-weight: 500; padding: 0.5rem 1rem;\">
                                        <i class=\"bi bi-exclamation-triangle-fill me-1\"></i> Pas de carnet
                                    </span>
                                {% endif %}
                            </div>
                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>

            <!-- Vue desktop (tableau) - Visible uniquement sur grands écrans -->
            <div id=\"apprenants-table\" class=\"table-responsive d-none d-lg-block\">
                <table class=\"table table-hover data-table mb-0\">
                    <thead>
                        <tr>
                            <th class=\"ps-4\">Apprenant</th>
                            <th>Tuteur</th>
                            <th>Date d'embauche</th>
                            <th>Auto-validation</th>
                            <th>Validation tuteur</th>
                            <th class=\"text-center\">Actions</th>
                            <th class=\"text-center\">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for user_data in users_data %}
                            <tr class=\"align-middle\">
                                <td class=\"ps-4\">
                                    <div class=\"d-flex align-items-center\">
                                        <div class=\"avatar-placeholder bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3\" style=\"width: 40px; height: 40px;\">
                                            {{ user_data.user.firstname|first }}{{ user_data.user.lastname|first }}
                                        </div>
                                        <div>
                                            <h6 class=\"mb-0\">{{ user_data.user.fullName }}</h6>
                                            <small class=\"text-muted\">{{ user_data.user.email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {% if user_data.mentor %}
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"avatar-placeholder bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 32px; height: 32px;\">
                                                {{ user_data.mentor.firstname|first }}{{ user_data.mentor.lastname|first }}
                                            </div>
                                            <span>{{ user_data.mentor.fullName }}</span>
                                        </div>
                                    {% else %}
                                        <span class=\"badge bg-warning text-dark fw-light ls-1\">Non assigné</span>
                                    {% endif %}
                                </td>
                                <td>
                                    {% if user_data.hiring_date %}
                                        <span class=\"text-dark\" style=\"font-size: .9rem\">
                                            <i class=\"bi bi-calendar me-1\"></i> {{ user_data.hiring_date|date('d/m/Y') }}
                                        </span>
                                    {% else %}
                                        <span class=\"text-muted\">Non renseigné</span>
                                    {% endif %}
                                </td>
                                <td>
                                    <div class=\"d-flex flex-column gap-1\">
                                        <div class=\"progress\">
                                            <div class=\"progress-bar {{ user_data.progress.progress_class_agent }}\" role=\"progressbar\" style=\"width: {{ user_data.progress.agent_progress }}%; opacity: 0.85;\" aria-valuenow=\"{{ user_data.progress.agent_progress }}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                                        </div>
                                        <div class=\"d-flex justify-content-between align-items-center\">
                                            <small class=\"text-muted\">{{ user_data.progress.completed_by_agent }}/{{ user_data.progress.total_modules }}</small>
                                            <span class=\"badge {{ user_data.progress.progress_class_agent }} rounded-pill\">{{ user_data.progress.agent_progress }}%</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class=\"d-flex flex-column gap-1\">
                                        <div class=\"progress\">
                                            <div class=\"progress-bar {{ user_data.progress.progress_class_mentor }}\"
                                                role=\"progressbar\" style=\"width: {{ user_data.progress.mentor_progress }}%; opacity: 0.85;\"
                                                aria-valuenow=\"{{ user_data.progress.mentor_progress }}\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                            </div>
                                        </div>
                                        <div class=\"d-flex justify-content-between align-items-center\">
                                            <small class=\"text-muted\">{{ user_data.progress.validated_by_mentor }}/{{ user_data.progress.total_modules }}</small>
                                            <span class=\"badge {{ user_data.progress.progress_class_mentor }} rounded-pill\">{{ user_data.progress.mentor_progress }}%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class=\"text-center\">
                                    {% if user_data.logbook %}
                                        <a href=\"{{ path('admin_progress_user_details', {'id': user_data.user.id}) }}\" class=\"btn btn-sm btn-outline-primary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\">
                                            <i class=\"bi bi-eye me-1\"></i> Détails
                                        </a>
                                    {% else %}
                                        <span class=\"badge bg-light text-danger border border-danger\" style=\"font-weight: 500;\">Pas de carnet</span>
                                    {% endif %}
                                </td>
                                {# Bouton pour générer le carnet de compagnonnage en PDF #}
                                <td class=\"text-center\">
                                    {% if user_data.logbook %}
                                        <a href=\"{{ path('admin_progress_generate_workbook', {'id': user_data.user.id}) }}\" class=\"btn btn-sm btn-outline-secondary rounded-pill action-btn\" style=\"border-width: 1px; font-weight: 500;\" target=\"_blank\" title=\"Générer le carnet de compagnonnage en PDF\">
                                            <i class=\"bi bi-file-pdf me-1\"></i> PDF
                                        </a>
                                    {% else %}
                                        <span class=\"badge bg-light text-muted border\" style=\"font-weight: 500;\">Non disponible</span>
                                    {% endif %}
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>

            {# Pagination #}
            {% if pagination.totalPages > 1 %}
            <div class=\"px-4 py-3 bg-light border-top d-flex justify-content-between align-items-center\">
                <div class=\"small text-muted\">
                    Affichage de {{ ((pagination.currentPage - 1) * pagination.itemsPerPage) + 1 }} à
                    {{ min(pagination.totalItems, pagination.currentPage * pagination.itemsPerPage) }}
                    sur {{ pagination.totalItems }} apprenants
                </div>
                <nav aria-label=\"Navigation des pages\">
                    <ul class=\"pagination pagination-sm mb-0\">
                        {# Lien précédent #}
                        <li class=\"page-item {{ pagination.currentPage <= 1 ? 'disabled' : '' }}\">
                            <a class=\"page-link\" href=\"{{ path('admin_progress_dashboard', {page: pagination.currentPage - 1, search: search_term}) }}\" aria-label=\"Précédent\">
                                <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                        </li>

                        {# Pages numérotées #}
                        {% set startPage = max(1, pagination.currentPage - 2) %}
                        {% set endPage = min(pagination.totalPages, pagination.currentPage + 2) %}

                        {% if startPage > 1 %}
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"{{ path('admin_progress_dashboard', {page: 1, search: search_term}) }}\">1</a>
                            </li>
                            {% if startPage > 2 %}
                                <li class=\"page-item disabled\"><span class=\"page-link\">...</span></li>
                            {% endif %}
                        {% endif %}

                        {% for i in startPage..endPage %}
                            <li class=\"page-item {{ pagination.currentPage == i ? 'active' : '' }}\">
                                <a class=\"page-link\" href=\"{{ path('admin_progress_dashboard', {page: i, search: search_term}) }}\">{{ i }}</a>
                            </li>
                        {% endfor %}

                        {% if endPage < pagination.totalPages %}
                            {% if endPage < pagination.totalPages - 1 %}
                                <li class=\"page-item disabled\"><span class=\"page-link\">...</span></li>
                            {% endif %}
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"{{ path('admin_progress_dashboard', {page: pagination.totalPages, search: search_term}) }}\">{{ pagination.totalPages }}</a>
                            </li>
                        {% endif %}

                        {# Lien suivant #}
                        <li class=\"page-item {{ pagination.currentPage >= pagination.totalPages ? 'disabled' : '' }}\">
                            <a class=\"page-link\" href=\"{{ path('admin_progress_dashboard', {page: pagination.currentPage + 1, search: search_term}) }}\" aria-label=\"Suivant\">
                                <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            {% endif %}
        </div>
    </div>
</div>
    {% block javascripts %}
        {{ parent() }}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialisation de DataTables pour le tableau des utilisateurs
                if (typeof \$.fn !== 'undefined' && \$.fn.DataTable) {
                    \$('.table').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
                        },
                        order: [[4, 'desc']], // Tri par défaut sur la colonne de progression (auto-validation)
                        responsive: true
                    });
                }
            });
        </script>
    {% endblock %}
{% endblock %}
", "admin/progress/dashboard.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/progress/dashboard.html.twig");
    }
}
