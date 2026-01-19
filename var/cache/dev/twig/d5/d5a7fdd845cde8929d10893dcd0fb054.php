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

/* app/dashboard/mentor/logbook_details.html.twig */
class __TwigTemplate_c34dd44e56a28300104bdf34099d9466 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/logbook_details.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/logbook_details.html.twig"));

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

        yield "Carnet de ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 3, $this->source); })()), "owner", [], "method", false, false, false, 3), "html", null, true);
        yield " ";
        
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
        $context["user"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6);
        // line 7
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardHeader.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardAside.html.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "
    <main id=\"main\" class=\"main\">
        <!-- Message Flash -->
        <section id=\"flash_messages\" class=\"container-fluid mt-4\">
            ";
        // line 14
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", [], "any", false, false, false, 14));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 15
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 16
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
                        ";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        yield "        </section>

        <section class=\"container-fluid mt-4\">
            <div class=\"custom-table-container\">
                <!-- Carte du propriétaire -->
                <div class=\"card owner-card mb-5\">
                    <div class=\"card-body\">
                        <div class=\"owner-header\">
                            <h5 class=\"card-title\">Profil du Collaborateur</h5>
                            <div class=\"owner-avatar mt-2\">
                                ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 32, $this->source); })()), "owner", [], "any", false, false, false, 32), "firstname", [], "any", false, false, false, 32), 0, 1), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 32, $this->source); })()), "owner", [], "any", false, false, false, 32), "lastname", [], "any", false, false, false, 32), 0, 1), "html", null, true);
        yield "
                            </div>
                        </div>

                        <div class=\"owner-info\">
                            <div class=\"info-group\">
                                <div class=\"info-item\">
                                    <i class=\"bi bi-person-fill\"></i>
                                    <span>";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 40, $this->source); })()), "owner", [], "any", false, false, false, 40), "firstname", [], "any", false, false, false, 40)), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 40, $this->source); })()), "owner", [], "any", false, false, false, 40), "lastname", [], "any", false, false, false, 40)), "html", null, true);
        yield "</span>
                                </div>
                                <div class=\"info-item\">
                                    <i class=\"bi bi-fingerprint\"></i>
                                    <span>";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 44, $this->source); })()), "owner", [], "any", false, false, false, 44), "nni", [], "any", false, false, false, 44), "html", null, true);
        yield "</span>
                                </div>
                            </div>
                            <div class=\"info-group\">
                                <div class=\"info-item\">
                                    <i class=\"bi bi-envelope-fill\"></i>
                                    <span>";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 50, $this->source); })()), "owner", [], "any", false, false, false, 50), "email", [], "any", false, false, false, 50), "html", null, true);
        yield "</span>
                                </div>
                                <div class=\"info-item\">
                                    <i class=\"bi bi-calendar-event-fill\"></i>
                                    <span>Embauché le ";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 54, $this->source); })()), "owner", [], "any", false, false, false, 54), "hiringAt", [], "any", false, false, false, 54), "d/m/Y"), "html", null, true);
        yield "</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"owner-stats\">
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 60, $this->source); })()), "agent_progress", [], "any", false, false, false, 60), "html", null, true);
        yield "%</div>
                                <div class=\"stat-label\">Progression de l'agent</div>
                            </div>
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 64, $this->source); })()), "completed_by_agent", [], "any", false, false, false, 64) . " / ") . CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 64, $this->source); })()), "total_modules", [], "any", false, false, false, 64)), "html", null, true);
        yield "</div>
                                <div class=\"stat-label\">Module réalisé</div>
                            </div>
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 68, $this->source); })()), "modules_awaiting_validation", [], "any", false, false, false, 68), "html", null, true);
        yield "</div>
                                <div class=\"stat-label\">Validation en attente</div>
                            </div>
                        </div>

                        <!-- Nouvelle barre de progression -->
                        <div class=\"progress mt-3\">
                            <div class=\"progress-bar ";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 75, $this->source); })()), "progress_class_agent", [], "any", false, false, false, 75), "html", null, true);
        yield "\"
                                 role=\"progressbar\"
                                 style=\"width: ";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 77, $this->source); })()), "agent_progress", [], "any", false, false, false, 77), "html", null, true);
        yield "%;\"
                                 aria-valuenow=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 78, $this->source); })()), "agent_progress", [], "any", false, false, false, 78), "html", null, true);
        yield "\"
                                 aria-valuemin=\"0\"
                                 aria-valuemax=\"100\">
                                ";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbookProgress"]) || array_key_exists("logbookProgress", $context) ? $context["logbookProgress"] : (function () { throw new RuntimeError('Variable "logbookProgress" does not exist.', 81, $this->source); })()), "agent_progress", [], "any", false, false, false, 81), "html", null, true);
        yield "%
                            </div>
                        </div>
                    </div>
                </div>

                ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["actionsByTheme"]) || array_key_exists("actionsByTheme", $context) ? $context["actionsByTheme"] : (function () { throw new RuntimeError('Variable "actionsByTheme" does not exist.', 87, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["theme"] => $context["actions"]) {
            // line 88
            yield "                    <div class=\"theme-section mb-4\">
                        <div class=\"theme-header\" data-bs-toggle=\"collapse\" data-bs-target=\"#theme-";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 89), "html", null, true);
            yield "\" aria-expanded=\"true\" aria-controls=\"theme-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 89), "html", null, true);
            yield "\">
                            <h5 style=\"color: white;\">";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["theme"], "html", null, true);
            yield "</h5>
                            <i class=\"bi bi-chevron-down\"></i>
                        </div>
                        <div id=\"theme-";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 93), "html", null, true);
            yield "\" class=\"collapse show\">
                            <div class=\"table-responsive\" style=\"max-height: 500px; overflow-y: auto;\">
                                <table class=\"table custom-table\">
                                    <thead class=\"sticky-top bg-white\">
                                    <tr>
                                        <th>#</th>
                                        <th>Thème</th>
                                        <th>Description</th>
                                        <th>Commentaire Agent</th>
                                        <th>Commentaire Tuteur</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";
            // line 107
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["actions"]);
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 108
                yield "                                        <tr class=\"action-row\" data-action-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 108), "html", null, true);
                yield "\">
                                            <td>";
                // line 109
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 109), "html", null, true);
                yield "</td>
                                            <td>";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 110), "title", [], "any", false, false, false, 110), "html", null, true);
                yield "</td>
                                            <td>";
                // line 111
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 111), "description", [], "any", false, false, false, 111);
                yield "</td>
                                            <td>";
                // line 112
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 112)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 112), "html", null, true)) : ("Aucun commentaire"));
                yield "</td>
                                            <td>";
                // line 113
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 113)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 113), "html", null, true)) : ("Aucun commentaire"));
                yield "</td>
                                            <td>
                                                <div class=\"btn-group\" role=\"group\">
                                                    ";
                // line 116
                if (( !CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 116) && (null === CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorValidatedAt", [], "any", false, false, false, 116)))) {
                    // line 117
                    yield "                                                        <a class=\"btn btn-sm btn-outline-primary\" href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "user", [], "any", false, false, false, 117), "nni", [], "any", false, false, false, 117), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 117), "nni", [], "any", false, false, false, 117), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "logbook", [], "any", false, false, false, 117), "id", [], "any", false, false, false, 117), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 117), "id", [], "any", false, false, false, 117), "actionId" => CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 117)]), "html", null, true);
                    yield "\">
                                                            <i class=\"bi bi-chat-dots\"></i> Commenter
                                                        </a>
                                                    ";
                } elseif ((null === CoreExtension::getAttribute($this->env, $this->source,                 // line 120
$context["action"], "mentorValidatedAt", [], "any", false, false, false, 120))) {
                    // line 121
                    yield "                                                        <a class=\"btn btn-sm btn-outline-primary\" href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 121, $this->source); })()), "user", [], "any", false, false, false, 121), "nni", [], "any", false, false, false, 121), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 121), "nni", [], "any", false, false, false, 121), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "logbook", [], "any", false, false, false, 121), "id", [], "any", false, false, false, 121), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 121), "id", [], "any", false, false, false, 121), "actionId" => CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 121)]), "html", null, true);
                    yield "\">
                                                            <i class=\"bi bi-pencil\"></i> Modifier
                                                        </a>
                                                        <a class=\"btn btn-sm btn-outline-danger\" href=\"";
                    // line 124
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_delete_comment", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 124, $this->source); })()), "user", [], "any", false, false, false, 124), "nni", [], "any", false, false, false, 124), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 124), "nni", [], "any", false, false, false, 124), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "logbook", [], "any", false, false, false, 124), "id", [], "any", false, false, false, 124), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 124), "id", [], "any", false, false, false, 124), "actionId" => CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 124)]), "html", null, true);
                    yield "\">
                                                            <i class=\"bi bi-trash\"></i> Supprimer
                                                        </a>
                                                    ";
                }
                // line 128
                yield "
                                                    ";
                // line 129
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorVisa", [], "any", false, false, false, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 130
                    yield "                                                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_validate", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 130, $this->source); })()), "user", [], "any", false, false, false, 130), "nni", [], "any", false, false, false, 130), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 130), "nni", [], "any", false, false, false, 130), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "logbook", [], "any", false, false, false, 130), "id", [], "any", false, false, false, 130), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 130), "id", [], "any", false, false, false, 130), "actionId" => CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 130)]), "html", null, true);
                    yield "\"
                                                           class=\"btn btn-sm btn-outline-success action-btn ";
                    // line 131
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorVisa", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "d-none";
                    }
                    yield "\"
                                                           data-action=\"validate\">
                                                            <i class=\"bi bi-check-circle-fill\"></i> Valider
                                                        </a>
                                                    ";
                } else {
                    // line 136
                    yield "                                                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_invalidate", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "user", [], "any", false, false, false, 136), "nni", [], "any", false, false, false, 136), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 136), "nni", [], "any", false, false, false, 136), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "logbook", [], "any", false, false, false, 136), "id", [], "any", false, false, false, 136), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 136), "id", [], "any", false, false, false, 136), "actionId" => CoreExtension::getAttribute($this->env, $this->source, $context["action"], "id", [], "any", false, false, false, 136)]), "html", null, true);
                    yield "\"
                                                           class=\"btn btn-sm btn-outline-danger action-btn ";
                    // line 137
                    if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorVisa", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "d-none";
                    }
                    yield "\"
                                                           data-action=\"invalidate\">
                                                            <i class=\"bi bi-x-circle-fill\"></i> Dévalider
                                                        </a>
                                                    ";
                }
                // line 142
                yield "                                                </div>
                                            </td>
                                        </tr>
                                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            yield "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['theme'], $context['actions'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        yield "
                <a href=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 153, $this->source); })()), "nni", [], "any", false, false, false, 153)]), "html", null, true);
        yield "\" class=\"btn btn-md btn-outline-primary rounded-pill\">
                    <i class=\"bi bi-arrow-left\"></i>
                    Revenir au tableau de bord
                </a>
            </div>


        </section>

        <!-- Retour au Dashboard -->
        <div>
            <a id=\"back-to-dashboard\" href=\"";
        // line 164
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 164, $this->source); })()), "nni", [], "any", false, false, false, 164)]), "html", null, true);
        yield "\" aria-label=\"back-to-dashboard\" role=\"button\" class=\"\">
            </a>
        </div>
    </main>
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
        return "app/dashboard/mentor/logbook_details.html.twig";
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
        return array (  460 => 164,  446 => 153,  443 => 152,  424 => 146,  407 => 142,  397 => 137,  392 => 136,  382 => 131,  377 => 130,  375 => 129,  372 => 128,  365 => 124,  358 => 121,  356 => 120,  349 => 117,  347 => 116,  341 => 113,  337 => 112,  333 => 111,  329 => 110,  325 => 109,  320 => 108,  303 => 107,  286 => 93,  280 => 90,  274 => 89,  271 => 88,  254 => 87,  245 => 81,  239 => 78,  235 => 77,  230 => 75,  220 => 68,  213 => 64,  206 => 60,  197 => 54,  190 => 50,  181 => 44,  172 => 40,  160 => 32,  148 => 22,  142 => 21,  132 => 17,  127 => 16,  122 => 15,  117 => 14,  111 => 9,  108 => 8,  105 => 7,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Carnet de {{ logbook.owner() }} {% endblock %}

{% block body %}
    {% set user = app.user %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <!-- Message Flash -->
        <section id=\"flash_messages\" class=\"container-fluid mt-4\">
            {# Display messages Flash #}
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                {% endfor %}
            {% endfor %}
        </section>

        <section class=\"container-fluid mt-4\">
            <div class=\"custom-table-container\">
                <!-- Carte du propriétaire -->
                <div class=\"card owner-card mb-5\">
                    <div class=\"card-body\">
                        <div class=\"owner-header\">
                            <h5 class=\"card-title\">Profil du Collaborateur</h5>
                            <div class=\"owner-avatar mt-2\">
                                {{ logbook.owner.firstname|slice(0, 1) }}{{ logbook.owner.lastname|slice(0, 1) }}
                            </div>
                        </div>

                        <div class=\"owner-info\">
                            <div class=\"info-group\">
                                <div class=\"info-item\">
                                    <i class=\"bi bi-person-fill\"></i>
                                    <span>{{ logbook.owner.firstname|capitalize }} {{ logbook.owner.lastname|upper }}</span>
                                </div>
                                <div class=\"info-item\">
                                    <i class=\"bi bi-fingerprint\"></i>
                                    <span>{{ logbook.owner.nni }}</span>
                                </div>
                            </div>
                            <div class=\"info-group\">
                                <div class=\"info-item\">
                                    <i class=\"bi bi-envelope-fill\"></i>
                                    <span>{{ logbook.owner.email }}</span>
                                </div>
                                <div class=\"info-item\">
                                    <i class=\"bi bi-calendar-event-fill\"></i>
                                    <span>Embauché le {{ logbook.owner.hiringAt|date('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"owner-stats\">
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">{{ logbookProgress.agent_progress }}%</div>
                                <div class=\"stat-label\">Progression de l'agent</div>
                            </div>
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">{{ logbookProgress.completed_by_agent ~ \" / \" ~ logbookProgress.total_modules }}</div>
                                <div class=\"stat-label\">Module réalisé</div>
                            </div>
                            <div class=\"stat-item\">
                                <div class=\"stat-value\">{{ logbookProgress.modules_awaiting_validation }}</div>
                                <div class=\"stat-label\">Validation en attente</div>
                            </div>
                        </div>

                        <!-- Nouvelle barre de progression -->
                        <div class=\"progress mt-3\">
                            <div class=\"progress-bar {{ logbookProgress.progress_class_agent }}\"
                                 role=\"progressbar\"
                                 style=\"width: {{ logbookProgress.agent_progress }}%;\"
                                 aria-valuenow=\"{{ logbookProgress.agent_progress }}\"
                                 aria-valuemin=\"0\"
                                 aria-valuemax=\"100\">
                                {{ logbookProgress.agent_progress }}%
                            </div>
                        </div>
                    </div>
                </div>

                {% for theme, actions in actionsByTheme %}
                    <div class=\"theme-section mb-4\">
                        <div class=\"theme-header\" data-bs-toggle=\"collapse\" data-bs-target=\"#theme-{{ loop.index }}\" aria-expanded=\"true\" aria-controls=\"theme-{{ loop.index }}\">
                            <h5 style=\"color: white;\">{{ theme }}</h5>
                            <i class=\"bi bi-chevron-down\"></i>
                        </div>
                        <div id=\"theme-{{ loop.index }}\" class=\"collapse show\">
                            <div class=\"table-responsive\" style=\"max-height: 500px; overflow-y: auto;\">
                                <table class=\"table custom-table\">
                                    <thead class=\"sticky-top bg-white\">
                                    <tr>
                                        <th>#</th>
                                        <th>Thème</th>
                                        <th>Description</th>
                                        <th>Commentaire Agent</th>
                                        <th>Commentaire Tuteur</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {% for action in actions %}
                                        <tr class=\"action-row\" data-action-id=\"{{ action.id }}\">
                                            <td>{{ loop.index }}</td>
                                            <td>{{ action.module.title }}</td>
                                            <td>{{ action.module.description|raw }}</td>
                                            <td>{{ action.agentComment ?: 'Aucun commentaire' }}</td>
                                            <td>{{ action.mentorComment ?: 'Aucun commentaire' }}</td>
                                            <td>
                                                <div class=\"btn-group\" role=\"group\">
                                                    {% if not action.mentorComment and action.mentorValidatedAt is null %}
                                                        <a class=\"btn btn-sm btn-outline-primary\" href=\"{{ path('mentor_logbook_action_edit', {'nni': app.user.nni, 'padawanNni': action.user.nni, 'logbookId': action.logbook.id, 'moduleId': action.module.id, 'actionId': action.id}) }}\">
                                                            <i class=\"bi bi-chat-dots\"></i> Commenter
                                                        </a>
                                                    {% elseif action.mentorValidatedAt is null %}
                                                        <a class=\"btn btn-sm btn-outline-primary\" href=\"{{ path('mentor_logbook_action_edit', {'nni': app.user.nni, 'padawanNni': action.user.nni, 'logbookId': action.logbook.id, 'moduleId': action.module.id, 'actionId': action.id}) }}\">
                                                            <i class=\"bi bi-pencil\"></i> Modifier
                                                        </a>
                                                        <a class=\"btn btn-sm btn-outline-danger\" href=\"{{ path('mentor_logbook_action_delete_comment', {'nni': app.user.nni, 'padawanNni': action.user.nni, 'logbookId': action.logbook.id, 'moduleId': action.module.id, 'actionId': action.id}) }}\">
                                                            <i class=\"bi bi-trash\"></i> Supprimer
                                                        </a>
                                                    {% endif %}

                                                    {% if not action.mentorVisa %}
                                                        <a href=\"{{ path('mentor_logbook_action_validate', {'nni': app.user.nni, 'padawanNni': action.user.nni, 'logbookId': action.logbook.id, 'moduleId': action.module.id, 'actionId': action.id}) }}\"
                                                           class=\"btn btn-sm btn-outline-success action-btn {% if action.mentorVisa %}d-none{% endif %}\"
                                                           data-action=\"validate\">
                                                            <i class=\"bi bi-check-circle-fill\"></i> Valider
                                                        </a>
                                                    {% else %}
                                                        <a href=\"{{ path('mentor_logbook_action_invalidate', {'nni': app.user.nni, 'padawanNni': action.user.nni, 'logbookId': action.logbook.id, 'moduleId': action.module.id, 'actionId': action.id}) }}\"
                                                           class=\"btn btn-sm btn-outline-danger action-btn {% if not action.mentorVisa %}d-none{% endif %}\"
                                                           data-action=\"invalidate\">
                                                            <i class=\"bi bi-x-circle-fill\"></i> Dévalider
                                                        </a>
                                                    {% endif %}
                                                </div>
                                            </td>
                                        </tr>
                                    {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {% endfor %}

                <a href=\"{{ path('mentor_dashboard_index', {'nni': user.nni}) }}\" class=\"btn btn-md btn-outline-primary rounded-pill\">
                    <i class=\"bi bi-arrow-left\"></i>
                    Revenir au tableau de bord
                </a>
            </div>


        </section>

        <!-- Retour au Dashboard -->
        <div>
            <a id=\"back-to-dashboard\" href=\"{{ path('dashboard_index', {'nni': user.nni}) }}\" aria-label=\"back-to-dashboard\" role=\"button\" class=\"\">
            </a>
        </div>
    </main>
{% endblock %}
", "app/dashboard/mentor/logbook_details.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/mentor/logbook_details.html.twig");
    }
}
