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

/* admin/progress/feedbacks.html.twig */
class __TwigTemplate_8894c22e038fddaa84bbf9682270040f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/feedbacks.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/feedbacks.html.twig"));

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

        yield "Retours d'expérience - Administration";
        
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
        yield "
<div class=\"container-fluid py-3 py-md-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
            <div>
                <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>Capitalisation des retours d'expérience</h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Consultez et traitez les retours d'expérience des utilisateurs</p>
            </div>
            <div>
                <a
                    href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard");
        yield "\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour au tableau de bord\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Tableau de bord
                </a>
            </div>
        </div>

        ";
        // line 26
        yield "        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-pie-chart me-2 text-primary\" aria-hidden=\"true\"></i>Statistiques des retours</h2>
            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3\">
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-primary bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-chat-dots\" style=\"color: var(--primary-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 39, $this->source); })()), "total", [], "any", false, false, false, 39), "html", null, true);
        yield "</div>
                                    <div class=\"stat-label\">Total des retours</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression totale des retours\">
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 100%; background-color: var(--primary-color);\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">100% des retours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-success bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-check-circle\" style=\"color: var(--success-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 57, $this->source); })()), "reviewed", [], "any", false, false, false, 57), "html", null, true);
        yield "</div>
                                    <div class=\"stat-label\">Retours traités</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression des retours traités\">
                                ";
        // line 62
        $context["reviewed_percent"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 62, $this->source); })()), "total", [], "any", false, false, false, 62) > 0)) ? (Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 62, $this->source); })()), "reviewed", [], "any", false, false, false, 62) / CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 62, $this->source); })()), "total", [], "any", false, false, false, 62)) * 100))) : (0));
        // line 63
        yield "                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["reviewed_percent"]) || array_key_exists("reviewed_percent", $context) ? $context["reviewed_percent"] : (function () { throw new RuntimeError('Variable "reviewed_percent" does not exist.', 63, $this->source); })()), "html", null, true);
        yield "%; background-color: var(--success-color);\" aria-valuenow=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["reviewed_percent"]) || array_key_exists("reviewed_percent", $context) ? $context["reviewed_percent"] : (function () { throw new RuntimeError('Variable "reviewed_percent" does not exist.', 63, $this->source); })()), "html", null, true);
        yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["reviewed_percent"]) || array_key_exists("reviewed_percent", $context) ? $context["reviewed_percent"] : (function () { throw new RuntimeError('Variable "reviewed_percent" does not exist.', 64, $this->source); })()), "html", null, true);
        yield "% des retours sont traités</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-warning bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-clock\" style=\"color: var(--warning-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 76, $this->source); })()), "pending", [], "any", false, false, false, 76), "html", null, true);
        yield "</div>
                                    <div class=\"stat-label\">En attente</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression des retours en attente\">
                                ";
        // line 81
        $context["pending_percent"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 81, $this->source); })()), "total", [], "any", false, false, false, 81) > 0)) ? (Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 81, $this->source); })()), "pending", [], "any", false, false, false, 81) / CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 81, $this->source); })()), "total", [], "any", false, false, false, 81)) * 100))) : (0));
        // line 82
        yield "                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pending_percent"]) || array_key_exists("pending_percent", $context) ? $context["pending_percent"] : (function () { throw new RuntimeError('Variable "pending_percent" does not exist.', 82, $this->source); })()), "html", null, true);
        yield "%; background-color: var(--warning-color);\" aria-valuenow=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pending_percent"]) || array_key_exists("pending_percent", $context) ? $context["pending_percent"] : (function () { throw new RuntimeError('Variable "pending_percent" does not exist.', 82, $this->source); })()), "html", null, true);
        yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pending_percent"]) || array_key_exists("pending_percent", $context) ? $context["pending_percent"] : (function () { throw new RuntimeError('Variable "pending_percent" does not exist.', 83, $this->source); })()), "html", null, true);
        yield "% des retours sont en attente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 93
        yield "        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\">
                    <i class=\"bi bi-search me-2 text-primary\" aria-hidden=\"true\"></i>
                    Filtres et recherche
                </h2>
            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3\">
                    <div class=\"col-12 col-md-6\">
                        <form action=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
        yield "\" method=\"get\" class=\"search-form\">
                            <label for=\"search-input\" class=\"sr-only\">Rechercher par titre ou auteur</label>
                            <div class=\"input-group shadow-sm\">
                                <input
                                    type=\"text\"
                                    id=\"search-input\"
                                    name=\"search\"
                                    class=\"form-control\"
                                    placeholder=\"Rechercher par titre ou auteur...\"
                                    value=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 112, $this->source); })()), "html", null, true);
        yield "\"
                                    aria-label=\"Rechercher par titre ou auteur\"
                                >
                                <button type=\"submit\" class=\"btn btn-outline-secondary\" aria-label=\"Lancer la recherche\">
                                    <i class=\"bi bi-search\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Rechercher</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class=\"col-12 col-md-6\">
                        <div class=\"d-flex flex-wrap gap-2\" role=\"group\" aria-label=\"Filtres par statut\">
                            <a
                                href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
        yield "\"
                                class=\"btn btn-sm ";
        // line 126
        yield (((null === (isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 126, $this->source); })()))) ? ("btn-primary") : ("btn-outline-primary"));
        yield " rounded-pill\"
                                aria-current=\"";
        // line 127
        yield (((null === (isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 127, $this->source); })()))) ? ("page") : ("false"));
        yield "\"
                            >
                                <i class=\"bi bi-list-ul me-1\" aria-hidden=\"true\"></i> Tous
                            </a>
                            <a
                                href=\"";
        // line 132
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks", ["status" => "pending"]);
        yield "\"
                                class=\"btn btn-sm rounded-pill ";
        // line 133
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 133, $this->source); })()) == "pending")) ? ("") : ("btn-outline-"));
        yield "warning\"
                                style=\"";
        // line 134
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 134, $this->source); })()) == "pending")) ? ("background-color: var(--warning-color); border-color: var(--warning-color);") : ("color: var(--warning-color); border-color: var(--warning-color);"));
        yield "\"
                                aria-current=\"";
        // line 135
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 135, $this->source); })()) == "pending")) ? ("page") : ("false"));
        yield "\"
                            >
                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                            </a>
                            <a
                                href=\"";
        // line 140
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks", ["status" => "reviewed"]);
        yield "\"
                                class=\"btn btn-sm rounded-pill ";
        // line 141
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 141, $this->source); })()) == "reviewed")) ? ("") : ("btn-outline-"));
        yield "success\"
                                style=\"";
        // line 142
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 142, $this->source); })()) == "reviewed")) ? ("background-color: var(--success-color); border-color: var(--success-color);") : ("color: var(--success-color); border-color: var(--success-color);"));
        yield "\"
                                aria-current=\"";
        // line 143
        yield ((((isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 143, $this->source); })()) == "reviewed")) ? ("page") : ("false"));
        yield "\"
                            >
                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traités
                            </a>
                            ";
        // line 147
        if ((($tmp = (isset($context["user_service"]) || array_key_exists("user_service", $context) ? $context["user_service"] : (function () { throw new RuntimeError('Variable "user_service" does not exist.', 147, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 148
            yield "                                <a
                                    href=\"";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user_service"]) || array_key_exists("user_service", $context) ? $context["user_service"] : (function () { throw new RuntimeError('Variable "user_service" does not exist.', 149, $this->source); })()), "name", [], "any", false, false, false, 149)]), "html", null, true);
            yield "\"
                                    class=\"btn btn-sm btn-outline-primary rounded-pill\"
                                    aria-label=\"Voir les retours d'expérience du service ";
            // line 151
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user_service"]) || array_key_exists("user_service", $context) ? $context["user_service"] : (function () { throw new RuntimeError('Variable "user_service" does not exist.', 151, $this->source); })()), "name", [], "any", false, false, false, 151), "html", null, true);
            yield "\"
                                >
                                    <i class=\"bi bi-filter me-1\" aria-hidden=\"true\"></i> REX ";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user_service"]) || array_key_exists("user_service", $context) ? $context["user_service"] : (function () { throw new RuntimeError('Variable "user_service" does not exist.', 153, $this->source); })()), "name", [], "any", false, false, false, 153), "html", null, true);
            yield "
                                </a>
                            ";
        }
        // line 156
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 163
        yield "        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-list me-2 text-primary\" aria-hidden=\"true\"></i>Liste des retours d'expérience</h2>
            </div>
            <div class=\"card-body p-0\">
                ";
        // line 168
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 168, $this->source); })()))) {
            // line 169
            yield "                    <div class=\"p-4 p-md-5 text-center\">
                        <div class=\"empty-state\">
                            <div class=\"rounded-circle bg-light d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                                <i class=\"bi bi-hourglass display-6\" style=\"color: var(--text-muted);\"></i>
                            </div>
                            <h3 class=\"h4 text-dark mb-3\">Aucun retour d'expérience trouvé</h3>
                            <p class=\"mb-4\" style=\"max-width: 500px; margin: 0 auto; color: var(--text-muted);\">
                                ";
            // line 176
            if ((($tmp = (isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 176, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 177
                yield "                                    Aucun résultat ne correspond à votre recherche \"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search_term"]) || array_key_exists("search_term", $context) ? $context["search_term"] : (function () { throw new RuntimeError('Variable "search_term" does not exist.', 177, $this->source); })()), "html", null, true);
                yield "\".
                                ";
            } elseif ((            // line 178
(isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 178, $this->source); })()) == "pending")) {
                // line 179
                yield "                                    Il n'y a pas de retours d'expérience en attente de traitement.
                                ";
            } elseif ((            // line 180
(isset($context["current_status"]) || array_key_exists("current_status", $context) ? $context["current_status"] : (function () { throw new RuntimeError('Variable "current_status" does not exist.', 180, $this->source); })()) == "reviewed")) {
                // line 181
                yield "                                    Il n'y a pas de retours d'expérience traités.
                                ";
            } else {
                // line 183
                yield "                                    Aucun retour d'expérience n'a été soumis pour le moment.
                                ";
            }
            // line 185
            yield "                            </p>
                            <a href=\"";
            // line 186
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
            yield "\" class=\"btn btn-outline-primary rounded-pill px-4\" aria-label=\"Rafraîchir la liste des retours\">
                                <i class=\"bi bi-arrow-clockwise me-2\" aria-hidden=\"true\"></i>Rafraîchir
                            </a>
                        </div>
                    </div>
                ";
        } else {
            // line 192
            yield "                    <div class=\"d-none d-lg-block table-responsive\">
                        <table class=\"table table-hover align-middle data-table\" aria-describedby=\"page-title\">
                            <caption class=\"sr-only\">Liste des retours d'expérience</caption>
                            <thead>
                                <tr>
                                    <th scope=\"col\" class=\"py-3\">Date</th>
                                    <th scope=\"col\" class=\"py-3\">Auteur</th>
                                    <th scope=\"col\" class=\"py-3\">Titre</th>
                                    <th scope=\"col\" class=\"py-3\">Catégorie</th>
                                    <th scope=\"col\" class=\"py-3\">Statut</th>
                                    <th scope=\"col\" class=\"text-end py-3\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 206
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 206, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 207
                yield "                                    <tr>
                                        <td>";
                // line 208
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 208), "d/m/Y"), "html", null, true);
                yield "</td>
                                        <td>";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 209), "firstname", [], "any", false, false, false, 209), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 209), "lastname", [], "any", false, false, false, 209), "html", null, true);
                yield "</td>
                                        <td>";
                // line 210
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 210), "html", null, true);
                yield "</td>
                                        <td>
                                            ";
                // line 212
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 220
                yield "
                                            ";
                // line 221
                $context["badge_class"] = ["integration_process" => "bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "training" => "bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "documentation" => "bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "tools" => "bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "communication" => "bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "other" => "bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"];
                // line 229
                yield "
                                            ";
                // line 230
                $context["badge_text_class"] = ["integration_process" => "text-primary", "training" => "text-success", "documentation" => "text-info", "tools" => "text-warning", "communication" => "text-secondary", "other" => "text-dark"];
                // line 238
                yield "
                                            <span class=\"badge ";
                // line 239
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 239, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 239), [], "array", false, false, false, 239), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 239, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 239), [], "array", false, false, false, 239), "html", null, true);
                yield "\" style=\"font-size: 0.75rem;\">
                                                ";
                // line 240
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 240, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 240), [], "array", false, false, false, 240), "html", null, true);
                yield "
                                            </span>
                                        </td>
                                        <td>
                                            ";
                // line 244
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 244)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 245
                    yield "                                                <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                                    <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                </span>
                                            ";
                } else {
                    // line 249
                    yield "                                                <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                                                    <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                </span>
                                            ";
                }
                // line 253
                yield "                                        </td>
                                        <td class=\"text-end\">
                                            <a
                                                href=\"";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 256)]), "html", null, true);
                yield "\"
                                                class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                style=\"padding: 0.4rem 1rem;\"
                                                aria-label=\"";
                // line 259
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 259)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Voir le retour d'expérience de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 259), "firstname", [], "any", false, false, false, 259), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 259), "lastname", [], "any", false, false, false, 259), "html", null, true);
                } else {
                    yield "Traiter le retour d'expérience de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 259), "firstname", [], "any", false, false, false, 259), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 259), "lastname", [], "any", false, false, false, 259), "html", null, true);
                }
                yield "\"
                                            >
                                                ";
                // line 261
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 261)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 262
                    yield "                                                    <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                ";
                } else {
                    // line 264
                    yield "                                                    <i class=\"bi bi-pencil me-1\" aria-hidden=\"true\"></i> Traiter
                                                ";
                }
                // line 266
                yield "                                            </a>
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 270
            yield "                            </tbody>
                        </table>
                    </div>

                    ";
            // line 275
            yield "                    <div class=\"d-lg-none\">
                        <div class=\"row g-3\">
                            ";
            // line 277
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 277, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 278
                yield "                                ";
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 286
                yield "
                                ";
                // line 287
                $context["badge_class"] = ["integration_process" => "bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "training" => "bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "documentation" => "bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "tools" => "bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "communication" => "bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "other" => "bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"];
                // line 295
                yield "
                                ";
                // line 296
                $context["badge_text_class"] = ["integration_process" => "text-primary", "training" => "text-success", "documentation" => "text-info", "tools" => "text-warning", "communication" => "text-secondary", "other" => "text-dark"];
                // line 304
                yield "
                                <div class=\"col-12\">
                                    <div class=\"card shadow-sm h-100 border-0\" style=\"border-radius: var(--card-radius);\">
                                        <div class=\"card-body p-3 p-md-4\">
                                            <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                                <h3 class=\"h6 fw-bold mb-0 text-truncate\" style=\"max-width: 80%;\">";
                // line 309
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 309), "html", null, true);
                yield "</h3>
                                                ";
                // line 310
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 310)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 311
                    yield "                                                    <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                                        <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                    </span>
                                                ";
                } else {
                    // line 315
                    yield "                                                    <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                                                        <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                    </span>
                                                ";
                }
                // line 319
                yield "                                            </div>

                                            <div class=\"mb-3\">
                                                <div class=\"d-flex flex-wrap gap-2 mb-2\">
                                                    <div class=\"text-muted small\">
                                                        <i class=\"bi bi-person me-1\" aria-hidden=\"true\"></i>
                                                        ";
                // line 325
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 325), "firstname", [], "any", false, false, false, 325), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 325), "lastname", [], "any", false, false, false, 325), "html", null, true);
                yield "
                                                    </div>
                                                    <div class=\"text-muted small\">
                                                        <i class=\"bi bi-calendar-check me-1\" aria-hidden=\"true\"></i>
                                                        ";
                // line 329
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 329), "d/m/Y"), "html", null, true);
                yield "
                                                    </div>
                                                </div>

                                                <span class=\"badge ";
                // line 333
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 333, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 333), [], "array", false, false, false, 333), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 333, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 333), [], "array", false, false, false, 333), "html", null, true);
                yield "\" style=\"font-size: 0.75rem;\">
                                                    ";
                // line 334
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 334, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 334), [], "array", false, false, false, 334), "html", null, true);
                yield "
                                                </span>
                                            </div>

                                            <div class=\"text-end mt-3\">
                                                <a
                                                    href=\"";
                // line 340
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 340)]), "html", null, true);
                yield "\"
                                                    class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                    style=\"padding: 0.4rem 1rem;\"
                                                    aria-label=\"";
                // line 343
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 343)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Voir le retour d'expérience de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 343), "firstname", [], "any", false, false, false, 343), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 343), "lastname", [], "any", false, false, false, 343), "html", null, true);
                } else {
                    yield "Traiter le retour d'expérience de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 343), "firstname", [], "any", false, false, false, 343), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 343), "lastname", [], "any", false, false, false, 343), "html", null, true);
                }
                yield "\"
                                                >
                                                    ";
                // line 345
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 345)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 346
                    yield "                                                        <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                    ";
                } else {
                    // line 348
                    yield "                                                        <i class=\"bi bi-pencil me-1\" aria-hidden=\"true\"></i> Traiter
                                                    ";
                }
                // line 350
                yield "                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 356
            yield "                        </div>
                    </div>

                    ";
            // line 360
            yield "                    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 360, $this->source); })()), "totalPages", [], "any", false, false, false, 360) > 1)) {
                // line 361
                yield "                        <div class=\"p-3 p-md-4 border-top\">
                            <nav aria-label=\"Pagination des retours d'expérience\">
                                <ul class=\"pagination pagination-sm flex-wrap justify-content-center mb-0 gap-1\">
                                    ";
                // line 364
                $context["queryParams"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 364, $this->source); })()), "request", [], "any", false, false, false, 364), "query", [], "any", false, false, false, 364), "all", [], "any", false, false, false, 364);
                // line 365
                yield "
                                    ";
                // line 367
                yield "                                    <li class=\"page-item ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 367, $this->source); })()), "currentPage", [], "any", false, false, false, 367) == 1)) ? ("disabled") : (""));
                yield "\">
                                        ";
                // line 368
                $context["queryParams"] = Twig\Extension\CoreExtension::merge((isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 368, $this->source); })()), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 368, $this->source); })()), "currentPage", [], "any", false, false, false, 368) - 1)]);
                // line 369
                yield "                                        <a class=\"page-link rounded shadow-sm\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks", (isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 369, $this->source); })())), "html", null, true);
                yield "\" aria-label=\"Page précédente\">
                                            <i class=\"bi bi-chevron-left small\" aria-hidden=\"true\"></i>
                                            <span class=\"sr-only\">Page précédente</span>
                                        </a>
                                    </li>

                                    ";
                // line 376
                yield "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 376, $this->source); })()), "totalPages", [], "any", false, false, false, 376)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 377
                    yield "                                        ";
                    $context["queryParams"] = Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 377, $this->source); })()), "request", [], "any", false, false, false, 377), "query", [], "any", false, false, false, 377), "all", [], "any", false, false, false, 377), ["page" => $context["i"]]);
                    // line 378
                    yield "                                        <li class=\"page-item ";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 378, $this->source); })()), "currentPage", [], "any", false, false, false, 378) == $context["i"])) ? ("active") : (""));
                    yield "\">
                                            <a
                                                class=\"page-link rounded shadow-sm\"
                                                href=\"";
                    // line 381
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks", (isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 381, $this->source); })())), "html", null, true);
                    yield "\"
                                                ";
                    // line 382
                    if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 382, $this->source); })()), "currentPage", [], "any", false, false, false, 382) == $context["i"])) {
                        // line 383
                        yield "                                                    aria-current=\"page\"
                                                    aria-label=\"Page actuelle, page ";
                        // line 384
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "\"
                                                ";
                    } else {
                        // line 386
                        yield "                                                    aria-label=\"Aller à la page ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "\"
                                                ";
                    }
                    // line 388
                    yield "                                            >";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
                                        </li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 391
                yield "
                                    ";
                // line 393
                yield "                                    <li class=\"page-item ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 393, $this->source); })()), "currentPage", [], "any", false, false, false, 393) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 393, $this->source); })()), "totalPages", [], "any", false, false, false, 393))) ? ("disabled") : (""));
                yield "\">
                                        ";
                // line 394
                $context["queryParams"] = Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 394, $this->source); })()), "request", [], "any", false, false, false, 394), "query", [], "any", false, false, false, 394), "all", [], "any", false, false, false, 394), ["page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 394, $this->source); })()), "currentPage", [], "any", false, false, false, 394) + 1)]);
                // line 395
                yield "                                        <a class=\"page-link rounded shadow-sm\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks", (isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 395, $this->source); })())), "html", null, true);
                yield "\" aria-label=\"Page suivante\">
                                            <i class=\"bi bi-chevron-right small\" aria-hidden=\"true\"></i>
                                            <span class=\"sr-only\">Page suivante</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    ";
            }
            // line 404
            yield "                ";
        }
        // line 405
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
        return "admin/progress/feedbacks.html.twig";
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
        return array (  761 => 405,  758 => 404,  745 => 395,  743 => 394,  738 => 393,  735 => 391,  725 => 388,  719 => 386,  714 => 384,  711 => 383,  709 => 382,  705 => 381,  698 => 378,  695 => 377,  690 => 376,  680 => 369,  678 => 368,  673 => 367,  670 => 365,  668 => 364,  663 => 361,  660 => 360,  655 => 356,  644 => 350,  640 => 348,  636 => 346,  634 => 345,  619 => 343,  613 => 340,  604 => 334,  598 => 333,  591 => 329,  582 => 325,  574 => 319,  568 => 315,  562 => 311,  560 => 310,  556 => 309,  549 => 304,  547 => 296,  544 => 295,  542 => 287,  539 => 286,  536 => 278,  532 => 277,  528 => 275,  522 => 270,  513 => 266,  509 => 264,  505 => 262,  503 => 261,  488 => 259,  482 => 256,  477 => 253,  471 => 249,  465 => 245,  463 => 244,  456 => 240,  450 => 239,  447 => 238,  445 => 230,  442 => 229,  440 => 221,  437 => 220,  435 => 212,  430 => 210,  424 => 209,  420 => 208,  417 => 207,  413 => 206,  397 => 192,  388 => 186,  385 => 185,  381 => 183,  377 => 181,  375 => 180,  372 => 179,  370 => 178,  365 => 177,  363 => 176,  354 => 169,  352 => 168,  345 => 163,  337 => 156,  331 => 153,  326 => 151,  321 => 149,  318 => 148,  316 => 147,  309 => 143,  305 => 142,  301 => 141,  297 => 140,  289 => 135,  285 => 134,  281 => 133,  277 => 132,  269 => 127,  265 => 126,  261 => 125,  245 => 112,  233 => 103,  221 => 93,  209 => 83,  202 => 82,  200 => 81,  192 => 76,  177 => 64,  170 => 63,  168 => 62,  160 => 57,  139 => 39,  124 => 26,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Retours d'expérience - Administration{% endblock %}

{% block body %}

<div class=\"container-fluid py-3 py-md-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
            <div>
                <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>Capitalisation des retours d'expérience</h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Consultez et traitez les retours d'expérience des utilisateurs</p>
            </div>
            <div>
                <a
                    href=\"{{ path('admin_progress_dashboard') }}\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour au tableau de bord\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Tableau de bord
                </a>
            </div>
        </div>

        {# Statistiques #}
        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-pie-chart me-2 text-primary\" aria-hidden=\"true\"></i>Statistiques des retours</h2>
            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3\">
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-primary bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-chat-dots\" style=\"color: var(--primary-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">{{ stats.total }}</div>
                                    <div class=\"stat-label\">Total des retours</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression totale des retours\">
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 100%; background-color: var(--primary-color);\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">100% des retours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-success bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-check-circle\" style=\"color: var(--success-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">{{ stats.reviewed }}</div>
                                    <div class=\"stat-label\">Retours traités</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression des retours traités\">
                                {% set reviewed_percent = stats.total > 0 ? (stats.reviewed / stats.total * 100)|round : 0 %}
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: {{ reviewed_percent }}%; background-color: var(--success-color);\" aria-valuenow=\"{{ reviewed_percent }}\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">{{ reviewed_percent }}% des retours sont traités</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12 col-md-4\">
                        <div class=\"stat-card p-3 p-md-4 shadow-sm\">
                            <div class=\"d-flex align-items-center mb-3\">
                                <div class=\"rounded-circle bg-warning bg-opacity-10 p-3 me-3\" aria-hidden=\"true\">
                                    <i class=\"bi bi-clock\" style=\"color: var(--warning-color); font-size: 1.5rem;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-value\">{{ stats.pending }}</div>
                                    <div class=\"stat-label\">En attente</div>
                                </div>
                            </div>
                            <div class=\"progress\" aria-label=\"Progression des retours en attente\">
                                {% set pending_percent = stats.total > 0 ? (stats.pending / stats.total * 100)|round : 0 %}
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: {{ pending_percent }}%; background-color: var(--warning-color);\" aria-valuenow=\"{{ pending_percent }}\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                    <span class=\"sr-only\">{{ pending_percent }}% des retours sont en attente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {# Filtres et recherche #}
        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\">
                    <i class=\"bi bi-search me-2 text-primary\" aria-hidden=\"true\"></i>
                    Filtres et recherche
                </h2>
            </div>
            <div class=\"card-body p-3 p-md-4\">
                <div class=\"row g-3\">
                    <div class=\"col-12 col-md-6\">
                        <form action=\"{{ path('admin_progress_feedbacks') }}\" method=\"get\" class=\"search-form\">
                            <label for=\"search-input\" class=\"sr-only\">Rechercher par titre ou auteur</label>
                            <div class=\"input-group shadow-sm\">
                                <input
                                    type=\"text\"
                                    id=\"search-input\"
                                    name=\"search\"
                                    class=\"form-control\"
                                    placeholder=\"Rechercher par titre ou auteur...\"
                                    value=\"{{ search_term }}\"
                                    aria-label=\"Rechercher par titre ou auteur\"
                                >
                                <button type=\"submit\" class=\"btn btn-outline-secondary\" aria-label=\"Lancer la recherche\">
                                    <i class=\"bi bi-search\" aria-hidden=\"true\"></i>
                                    <span class=\"sr-only\">Rechercher</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class=\"col-12 col-md-6\">
                        <div class=\"d-flex flex-wrap gap-2\" role=\"group\" aria-label=\"Filtres par statut\">
                            <a
                                href=\"{{ path('admin_progress_feedbacks') }}\"
                                class=\"btn btn-sm {{ current_status is null ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill\"
                                aria-current=\"{{ current_status is null ? 'page' : 'false' }}\"
                            >
                                <i class=\"bi bi-list-ul me-1\" aria-hidden=\"true\"></i> Tous
                            </a>
                            <a
                                href=\"{{ path('admin_progress_feedbacks', {'status': 'pending'}) }}\"
                                class=\"btn btn-sm rounded-pill {{ current_status == 'pending' ? '' : 'btn-outline-' }}warning\"
                                style=\"{{ current_status == 'pending' ? 'background-color: var(--warning-color); border-color: var(--warning-color);' : 'color: var(--warning-color); border-color: var(--warning-color);' }}\"
                                aria-current=\"{{ current_status == 'pending' ? 'page' : 'false' }}\"
                            >
                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                            </a>
                            <a
                                href=\"{{ path('admin_progress_feedbacks', {'status': 'reviewed'}) }}\"
                                class=\"btn btn-sm rounded-pill {{ current_status == 'reviewed' ? '' : 'btn-outline-' }}success\"
                                style=\"{{ current_status == 'reviewed' ? 'background-color: var(--success-color); border-color: var(--success-color);' : 'color: var(--success-color); border-color: var(--success-color);' }}\"
                                aria-current=\"{{ current_status == 'reviewed' ? 'page' : 'false' }}\"
                            >
                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traités
                            </a>
                            {% if user_service %}
                                <a
                                    href=\"{{ path('admin_progress_service_feedbacks', {'name': user_service.name}) }}\"
                                    class=\"btn btn-sm btn-outline-primary rounded-pill\"
                                    aria-label=\"Voir les retours d'expérience du service {{ user_service.name }}\"
                                >
                                    <i class=\"bi bi-filter me-1\" aria-hidden=\"true\"></i> REX {{ user_service.name }}
                                </a>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {# Liste des feedbacks #}
        <div class=\"content-card\">
            <div class=\"card-header\">
                <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-list me-2 text-primary\" aria-hidden=\"true\"></i>Liste des retours d'expérience</h2>
            </div>
            <div class=\"card-body p-0\">
                {% if feedbacks is empty %}
                    <div class=\"p-4 p-md-5 text-center\">
                        <div class=\"empty-state\">
                            <div class=\"rounded-circle bg-light d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                                <i class=\"bi bi-hourglass display-6\" style=\"color: var(--text-muted);\"></i>
                            </div>
                            <h3 class=\"h4 text-dark mb-3\">Aucun retour d'expérience trouvé</h3>
                            <p class=\"mb-4\" style=\"max-width: 500px; margin: 0 auto; color: var(--text-muted);\">
                                {% if search_term %}
                                    Aucun résultat ne correspond à votre recherche \"{{ search_term }}\".
                                {% elseif current_status == 'pending' %}
                                    Il n'y a pas de retours d'expérience en attente de traitement.
                                {% elseif current_status == 'reviewed' %}
                                    Il n'y a pas de retours d'expérience traités.
                                {% else %}
                                    Aucun retour d'expérience n'a été soumis pour le moment.
                                {% endif %}
                            </p>
                            <a href=\"{{ path('admin_progress_feedbacks') }}\" class=\"btn btn-outline-primary rounded-pill px-4\" aria-label=\"Rafraîchir la liste des retours\">
                                <i class=\"bi bi-arrow-clockwise me-2\" aria-hidden=\"true\"></i>Rafraîchir
                            </a>
                        </div>
                    </div>
                {% else %}
                    <div class=\"d-none d-lg-block table-responsive\">
                        <table class=\"table table-hover align-middle data-table\" aria-describedby=\"page-title\">
                            <caption class=\"sr-only\">Liste des retours d'expérience</caption>
                            <thead>
                                <tr>
                                    <th scope=\"col\" class=\"py-3\">Date</th>
                                    <th scope=\"col\" class=\"py-3\">Auteur</th>
                                    <th scope=\"col\" class=\"py-3\">Titre</th>
                                    <th scope=\"col\" class=\"py-3\">Catégorie</th>
                                    <th scope=\"col\" class=\"py-3\">Statut</th>
                                    <th scope=\"col\" class=\"text-end py-3\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for feedback in feedbacks %}
                                    <tr>
                                        <td>{{ feedback.createdAt|date('d/m/Y') }}</td>
                                        <td>{{ feedback.author.firstname }} {{ feedback.author.lastname }}</td>
                                        <td>{{ feedback.title }}</td>
                                        <td>
                                            {% set category_labels = {
                                                'integration_process': 'Processus d\\'intégration',
                                                'training': 'Formation',
                                                'documentation': 'Documentation',
                                                'tools': 'Outils',
                                                'communication': 'Communication',
                                                'other': 'Autre'
                                            } %}

                                            {% set badge_class = {
                                                'integration_process': 'bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                'training': 'bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                'documentation': 'bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                'tools': 'bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                'communication': 'bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                'other': 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill'
                                            } %}

                                            {% set badge_text_class = {
                                                'integration_process': 'text-primary',
                                                'training': 'text-success',
                                                'documentation': 'text-info',
                                                'tools': 'text-warning',
                                                'communication': 'text-secondary',
                                                'other': 'text-dark'
                                            } %}

                                            <span class=\"badge {{ badge_class[feedback.category] }} {{ badge_text_class[feedback.category] }}\" style=\"font-size: 0.75rem;\">
                                                {{ category_labels[feedback.category] }}
                                            </span>
                                        </td>
                                        <td>
                                            {% if feedback.isReviewed %}
                                                <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                                    <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                </span>
                                            {% else %}
                                                <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                                                    <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                </span>
                                            {% endif %}
                                        </td>
                                        <td class=\"text-end\">
                                            <a
                                                href=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\"
                                                class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                style=\"padding: 0.4rem 1rem;\"
                                                aria-label=\"{% if feedback.isReviewed %}Voir le retour d'expérience de {{ feedback.author.firstname }} {{ feedback.author.lastname }}{% else %}Traiter le retour d'expérience de {{ feedback.author.firstname }} {{ feedback.author.lastname }}{% endif %}\"
                                            >
                                                {% if feedback.isReviewed %}
                                                    <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                {% else %}
                                                    <i class=\"bi bi-pencil me-1\" aria-hidden=\"true\"></i> Traiter
                                                {% endif %}
                                            </a>
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>

                    {# Vue cartes pour mobile et tablette (cachée sur desktop) #}
                    <div class=\"d-lg-none\">
                        <div class=\"row g-3\">
                            {% for feedback in feedbacks %}
                                {% set category_labels = {
                                    'integration_process': 'Processus d\\'intégration',
                                    'training': 'Formation',
                                    'documentation': 'Documentation',
                                    'tools': 'Outils',
                                    'communication': 'Communication',
                                    'other': 'Autre'
                                } %}

                                {% set badge_class = {
                                    'integration_process': 'bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                    'training': 'bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                    'documentation': 'bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                    'tools': 'bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                    'communication': 'bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                    'other': 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill'
                                } %}

                                {% set badge_text_class = {
                                    'integration_process': 'text-primary',
                                    'training': 'text-success',
                                    'documentation': 'text-info',
                                    'tools': 'text-warning',
                                    'communication': 'text-secondary',
                                    'other': 'text-dark'
                                } %}

                                <div class=\"col-12\">
                                    <div class=\"card shadow-sm h-100 border-0\" style=\"border-radius: var(--card-radius);\">
                                        <div class=\"card-body p-3 p-md-4\">
                                            <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                                <h3 class=\"h6 fw-bold mb-0 text-truncate\" style=\"max-width: 80%;\">{{ feedback.title }}</h3>
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

                                            <div class=\"mb-3\">
                                                <div class=\"d-flex flex-wrap gap-2 mb-2\">
                                                    <div class=\"text-muted small\">
                                                        <i class=\"bi bi-person me-1\" aria-hidden=\"true\"></i>
                                                        {{ feedback.author.firstname }} {{ feedback.author.lastname }}
                                                    </div>
                                                    <div class=\"text-muted small\">
                                                        <i class=\"bi bi-calendar-check me-1\" aria-hidden=\"true\"></i>
                                                        {{ feedback.createdAt|date('d/m/Y') }}
                                                    </div>
                                                </div>

                                                <span class=\"badge {{ badge_class[feedback.category] }} {{ badge_text_class[feedback.category] }}\" style=\"font-size: 0.75rem;\">
                                                    {{ category_labels[feedback.category] }}
                                                </span>
                                            </div>

                                            <div class=\"text-end mt-3\">
                                                <a
                                                    href=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\"
                                                    class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                    style=\"padding: 0.4rem 1rem;\"
                                                    aria-label=\"{% if feedback.isReviewed %}Voir le retour d'expérience de {{ feedback.author.firstname }} {{ feedback.author.lastname }}{% else %}Traiter le retour d'expérience de {{ feedback.author.firstname }} {{ feedback.author.lastname }}{% endif %}\"
                                                >
                                                    {% if feedback.isReviewed %}
                                                        <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                    {% else %}
                                                        <i class=\"bi bi-pencil me-1\" aria-hidden=\"true\"></i> Traiter
                                                    {% endif %}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                    </div>

                    {# Pagination #}
                    {% if pagination.totalPages > 1 %}
                        <div class=\"p-3 p-md-4 border-top\">
                            <nav aria-label=\"Pagination des retours d'expérience\">
                                <ul class=\"pagination pagination-sm flex-wrap justify-content-center mb-0 gap-1\">
                                    {% set queryParams = app.request.query.all %}

                                    {# Bouton précédent #}
                                    <li class=\"page-item {{ pagination.currentPage == 1 ? 'disabled' : '' }}\">
                                        {% set queryParams = queryParams|merge({'page': pagination.currentPage - 1}) %}
                                        <a class=\"page-link rounded shadow-sm\" href=\"{{ path('admin_progress_feedbacks', queryParams) }}\" aria-label=\"Page précédente\">
                                            <i class=\"bi bi-chevron-left small\" aria-hidden=\"true\"></i>
                                            <span class=\"sr-only\">Page précédente</span>
                                        </a>
                                    </li>

                                    {# Pages #}
                                    {% for i in 1..pagination.totalPages %}
                                        {% set queryParams = app.request.query.all|merge({'page': i}) %}
                                        <li class=\"page-item {{ pagination.currentPage == i ? 'active' : '' }}\">
                                            <a
                                                class=\"page-link rounded shadow-sm\"
                                                href=\"{{ path('admin_progress_feedbacks', queryParams) }}\"
                                                {% if pagination.currentPage == i %}
                                                    aria-current=\"page\"
                                                    aria-label=\"Page actuelle, page {{ i }}\"
                                                {% else %}
                                                    aria-label=\"Aller à la page {{ i }}\"
                                                {% endif %}
                                            >{{ i }}</a>
                                        </li>
                                    {% endfor %}

                                    {# Bouton suivant #}
                                    <li class=\"page-item {{ pagination.currentPage == pagination.totalPages ? 'disabled' : '' }}\">
                                        {% set queryParams = app.request.query.all|merge({'page': pagination.currentPage + 1}) %}
                                        <a class=\"page-link rounded shadow-sm\" href=\"{{ path('admin_progress_feedbacks', queryParams) }}\" aria-label=\"Page suivante\">
                                            <i class=\"bi bi-chevron-right small\" aria-hidden=\"true\"></i>
                                            <span class=\"sr-only\">Page suivante</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    {% endif %}
                {% endif %}
            </div>
        </div>
</div>
{% endblock %}
", "admin/progress/feedbacks.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/progress/feedbacks.html.twig");
    }
}
