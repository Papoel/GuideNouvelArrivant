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

/* app/dashboard/mentor/index.html.twig */
class __TwigTemplate_bd6eec51910930813466c686647b3a22 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/index.html.twig"));

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

        yield "Dashboard Tuteur";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "
    ";
        // line 6
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
        yield "
        </section>

        <div class=\"pageTitle\">
            <h1>Tableau de bord du Tuteur</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a
                                href=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "user", [], "any", false, false, false, 30), "nni", [], "any", false, false, false, 30)]), "html", null, true);
        yield "\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Tableau de bord du tuteur</li>
                </ol>
            </nav>
        </div>
        <section class=\"section dashboard\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des Apprenants</h5>
                            <table class=\"table table-hover align-middle mb-0\">
                                <thead>
                                <tr>
                                    <th scope=\"col\">Apprenant</th>
                                    <th scope=\"col\">Poste</th>
                                    <th scope=\"col\">Spécialité</th>
                                    <th scope=\"col\">Ancienneté</th>
                                    <th scope=\"col\" class=\"text-center\">Avancement</th>
                                    <th scope=\"col\" class=\"text-center\">Modules en attente de validation</th>
                                    <th scope=\"col\">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["apprenants"]) || array_key_exists("apprenants", $context) ? $context["apprenants"] : (function () { throw new RuntimeError('Variable "apprenants" does not exist.', 54, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["apprenant"]) {
            // line 55
            yield "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "logbooks", [], "any", false, false, false, 55));
            foreach ($context['_seq'] as $context["_key"] => $context["logbook"]) {
                // line 56
                yield "                                        ";
                $context["specialityColor"] = (((CoreExtension::getAttribute($this->env, $this->source, ["Chaudronnerie" => "success", "Levage" => "warning", "Mécanique" => "danger", "Robinetterie" => "info"], CoreExtension::getAttribute($this->env, $this->source,                 // line 61
$context["apprenant"], "specialityLabel", [], "any", false, false, false, 61), [], "array", true, true, false, 57) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ["Chaudronnerie" => "success", "Levage" => "warning", "Mécanique" => "danger", "Robinetterie" => "info"], CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "specialityLabel", [], "any", false, false, false, 61), [], "array", false, false, false, 57)))) ? (CoreExtension::getAttribute($this->env, $this->source, ["Chaudronnerie" => "success", "Levage" => "warning", "Mécanique" => "danger", "Robinetterie" => "info"], CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "specialityLabel", [], "any", false, false, false, 61), [], "array", false, false, false, 57)) : ("secondary"));
                // line 62
                yield "                                        ";
                $context["progression"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["apprenantsProgress"]) || array_key_exists("apprenantsProgress", $context) ? $context["apprenantsProgress"] : (function () { throw new RuntimeError('Variable "apprenantsProgress" does not exist.', 62, $this->source); })()), $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->representAsString(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "id", [], "any", false, false, false, 62)), [], "array", false, false, false, 62);
                // line 63
                yield "

                                        ";
                // line 65
                $context["progressColorMap"] = ["bg-danger" => "#dc3545", "bg-warning" => "#ffc107", "bg-success" => "#28a745", "bg-info" => "#17a2b8", "bg-primary" => "#007bff"];
                // line 72
                yield "
                                        ";
                // line 73
                $context["bgClass"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 73, $this->source); })()), "progress_class_agent", [], "any", false, false, false, 73), " "), function ($__class__) use ($context, $macros) { $context["class"] = $__class__; return (is_string($_v0 = (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 73, $this->source); })())) && is_string($_v1 = "bg-") && str_starts_with($_v0, $_v1)); }));
                // line 74
                yield "                                        ";
                $context["progressColor"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["progressColorMap"] ?? null), (isset($context["bgClass"]) || array_key_exists("bgClass", $context) ? $context["bgClass"] : (function () { throw new RuntimeError('Variable "bgClass" does not exist.', 74, $this->source); })()), [], "array", true, true, false, 74) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["progressColorMap"]) || array_key_exists("progressColorMap", $context) ? $context["progressColorMap"] : (function () { throw new RuntimeError('Variable "progressColorMap" does not exist.', 74, $this->source); })()), (isset($context["bgClass"]) || array_key_exists("bgClass", $context) ? $context["bgClass"] : (function () { throw new RuntimeError('Variable "bgClass" does not exist.', 74, $this->source); })()), [], "array", false, false, false, 74)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["progressColorMap"]) || array_key_exists("progressColorMap", $context) ? $context["progressColorMap"] : (function () { throw new RuntimeError('Variable "progressColorMap" does not exist.', 74, $this->source); })()), (isset($context["bgClass"]) || array_key_exists("bgClass", $context) ? $context["bgClass"] : (function () { throw new RuntimeError('Variable "bgClass" does not exist.', 74, $this->source); })()), [], "array", false, false, false, 74)) : ("#6c757d"));
                // line 75
                yield "                                        <tr>
                                            <td>
                                                <div class=\"d-flex align-items-center\">
                                                    <div class=\"avatar-wrapper me-3\">
                                                        <div class=\"avatar-circle\">
                                                            <div class=\"avatar-progress\" style=\"--progress: ";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 80, $this->source); })()), "agent_progress", [], "any", false, false, false, 80), "html", null, true);
                yield "%; --color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progressColor"]) || array_key_exists("progressColor", $context) ? $context["progressColor"] : (function () { throw new RuntimeError('Variable "progressColor" does not exist.', 80, $this->source); })()), "html", null, true);
                yield ";\">
                                                                <span class=\"avatar-initials\">
                                                                    ";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::join(Twig\Extension\CoreExtension::map($this->env, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "fullname", [], "any", false, false, false, 82), " "), function ($__name__) use ($context, $macros) { $context["name"] = $__name__; return Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 82, $this->source); })())); }))), 0, 2), "html", null, true);
                yield "
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class=\"mb-0\">";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "fullname", [], "any", false, false, false, 88), "html", null, true);
                yield "</h6>
                                                        <small class=\"text-muted\">";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "email", [], "any", false, false, false, 89), "html", null, true);
                yield "</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "jobLabel", [], "any", false, false, false, 93), "html", null, true);
                yield "</td>
                                            <td>
                                                <span class=\"badge bg-";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["specialityColor"]) || array_key_exists("specialityColor", $context) ? $context["specialityColor"] : (function () { throw new RuntimeError('Variable "specialityColor" does not exist.', 95, $this->source); })()), "html", null, true);
                yield " rounded-pill\">
                                                    ";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "specialityLabel", [], "any", false, false, false, 96), "html", null, true);
                yield "
                                                </span>
                                            </td>
                                            <td>";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "seniority", [], "any", false, false, false, 99), "html", null, true);
                yield "</td>
                                            <td class=\"text-center\">
                                                <div class=\"progress\" style=\"height: 20px;\">
                                                    <div class=\"progress-bar ";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 102, $this->source); })()), "progress_class_agent", [], "any", false, false, false, 102), "html", null, true);
                yield "\"
                                                         role=\"progressbar\"
                                                         style=\"width: ";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 104, $this->source); })()), "agent_progress", [], "any", false, false, false, 104), "html", null, true);
                yield "%;\"
                                                         aria-valuenow=\"";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 105, $this->source); })()), "agent_progress", [], "any", false, false, false, 105), "html", null, true);
                yield "\"
                                                         aria-valuemin=\"0\"
                                                         aria-valuemax=\"100\">
                                                    </div>
                                                </div>
                                                <small class=\"mt-1 d-block\">";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 110, $this->source); })()), "agent_progress", [], "any", false, false, false, 110), "html", null, true);
                yield "%</small>
                                            </td>
                                            <td class=\"text-center\">
                                                ";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 113, $this->source); })()), "modules_awaiting_validation", [], "any", false, false, false, 113), "html", null, true);
                yield "
                                            </td>
                                            <td>
                                                <div class=\"d-flex gap-2\">
                                                    <a href=\"";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_details", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 117), "nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "user", [], "any", false, false, false, 117), "nni", [], "any", false, false, false, 117), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "nni", [], "any", false, false, false, 117)]), "html", null, true);
                yield "\"
                                                       class=\"btn btn-sm btn-outline-primary\"
                                                       title=\"Voir les détails du carnet\">
                                                        <i class=\"bi bi-journal-text me-1\"></i>
                                                    </a>
                                                    <button type=\"button\"
                                                       popovertarget=\"logbook-popover-";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["apprenant"], "id", [], "any", false, false, false, 123), "html", null, true);
                yield "\"
                                                       class=\"btn btn-sm btn-outline-primary\"
                                                       title=\"Voir tous les modules\">
                                                        <i class=\"bi bi-list-check me-1\"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['logbook'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            yield "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['apprenant'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        yield "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id=\"padawanLogbooks\">
            ";
        // line 142
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["padawanLogbooks"]) || array_key_exists("padawanLogbooks", $context) ? $context["padawanLogbooks"] : (function () { throw new RuntimeError('Variable "padawanLogbooks" does not exist.', 142, $this->source); })()));
        foreach ($context['_seq'] as $context["apprenantId"] => $context["logbook"]) {
            // line 143
            yield "                ";
            $context["apprenant"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["apprenants"]) || array_key_exists("apprenants", $context) ? $context["apprenants"] : (function () { throw new RuntimeError('Variable "apprenants" does not exist.', 143, $this->source); })()), function ($__a__) use ($context, $macros) { $context["a"] = $__a__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 143, $this->source); })()), "id", [], "any", false, false, false, 143) == $this->extensions['Twig\Extension\CoreExtension']->formatNumber($context["apprenantId"], 0, "", "")); }));
            // line 144
            yield "                ";
            $context["progression"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["apprenantsProgress"]) || array_key_exists("apprenantsProgress", $context) ? $context["apprenantsProgress"] : (function () { throw new RuntimeError('Variable "apprenantsProgress" does not exist.', 144, $this->source); })()), $context["apprenantId"], [], "array", false, false, false, 144);
            // line 145
            yield "                
                <div id=\"logbook-popover-";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["apprenantId"], "html", null, true);
            yield "\" popover style=\"width: min(800px, 90vw); max-height: 85vh; overflow-y: auto; border: 2px solid #3d5f9e; border-radius: 12px; padding: 0; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); background-color: #ffffff;\">
                    ";
            // line 148
            yield "                    <div style=\"background: linear-gradient(135deg, #3d5f9e 0%, #2c4a7c 100%); color: white; padding: 20px; border-radius: 10px 10px 0 0; margin: 0;\">
                        <h3 style=\"margin: 0 0 12px 0; font-size: 1.25rem; font-weight: 600;\">";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "name", [], "any", false, false, false, 149), "html", null, true);
            yield "</h3>
                        <div style=\"display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;\">
                            <p style=\"margin: 0; opacity: 0.9; font-size: 0.95rem; display: flex; align-items: center;\">
                                <i class=\"bi bi-person-circle\" style=\"margin-right: 8px; font-size: 1.1rem;\"></i>
                                <span style=\"font-weight: 500;\">";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "owner", [], "any", false, false, false, 153), "fullname", [], "any", false, false, false, 153), "html", null, true);
            yield "</span>
                            </p>
                            <div style=\"background-color: rgba(255, 255, 255, 0.2); border-radius: 8px; padding: 10px 16px; display: flex; align-items: center; gap: 12px;\">
                                <div>
                                    <div style=\"font-size: 0.75rem; opacity: 0.9; margin-bottom: 2px;\">Progression</div>
                                    <div style=\"font-size: 1.5rem; font-weight: bold; line-height: 1;\">";
            // line 158
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 158, $this->source); })()), "agent_progress", [], "any", false, false, false, 158), "html", null, true);
            yield "%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    ";
            // line 165
            yield "                    <div style=\"padding: 20px;\">
                        ";
            // line 167
            yield "                        <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;\">
                            <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border-left: 4px solid #3d5f9e;\">
                                <div style=\"font-size: 0.75rem; color: #6c757d; margin-bottom: 4px;\">Thèmes</div>
                                <div style=\"font-size: 1.25rem; font-weight: 600; color: #2c384e;\">";
            // line 170
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themes", [], "any", false, false, false, 170)), "html", null, true);
            yield "</div>
                            </div>
                            <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border-left: 4px solid #28a745;\">
                                <div style=\"font-size: 0.75rem; color: #6c757d; margin-bottom: 4px;\">En attente</div>
                                <div style=\"font-size: 1.25rem; font-weight: 600; color: #2c384e;\">";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progression"]) || array_key_exists("progression", $context) ? $context["progression"] : (function () { throw new RuntimeError('Variable "progression" does not exist.', 174, $this->source); })()), "modules_awaiting_validation", [], "any", false, false, false, 174), "html", null, true);
            yield "</div>
                            </div>
                        </div>

                        ";
            // line 179
            yield "                        <div style=\"margin-bottom: 20px;\">
                            <h4 style=\"font-size: 1rem; font-weight: 600; color: #2c384e; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e9ecef;\">
                                <i class=\"bi bi-folder2-open\" style=\"margin-right: 8px; color: #3d5f9e;\"></i>
                                Thèmes et modules
                            </h4>
                            ";
            // line 184
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themes", [], "any", false, false, false, 184)) > 0)) {
                // line 185
                yield "                                <div style=\"display: flex; flex-direction: column; gap: 12px;\">
                                    ";
                // line 186
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themes", [], "any", false, false, false, 186));
                foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                    // line 187
                    yield "                                        <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border: 1px solid #e9ecef;\">
                                            <div style=\"font-weight: 600; color: #2c384e; margin-bottom: 8px; font-size: 0.95rem;\">
                                                <i class=\"bi bi-folder\" style=\"margin-right: 6px; color: #3d5f9e;\"></i>
                                                ";
                    // line 190
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 190), "html", null, true);
                    yield "
                                            </div>
                                            ";
                    // line 192
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 192)) > 0)) {
                        // line 193
                        yield "                                                <div style=\"margin-left: 20px; display: flex; flex-direction: column; gap: 6px;\">
                                                    ";
                        // line 194
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 194));
                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                            // line 195
                            yield "                                                        <div style=\"padding: 6px 10px; background-color: white; border-radius: 4px; font-size: 0.85rem; border-left: 3px solid #3d5f9e; color: #2c384e;\">
                                                            <i class=\"bi bi-check-circle\" style=\"margin-right: 6px; color: #28a745; font-size: 0.75rem;\"></i>
                                                            ";
                            // line 197
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 197), "html", null, true);
                            yield "
                                                        </div>
                                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 200
                        yield "                                                </div>
                                            ";
                    } else {
                        // line 202
                        yield "                                                <div style=\"margin-left: 20px; padding: 8px; color: #6c757d; font-size: 0.85rem; font-style: italic;\">
                                                    <i class=\"bi bi-info-circle\" style=\"margin-right: 6px;\"></i>
                                                    Aucun module
                                                </div>
                                            ";
                    }
                    // line 207
                    yield "                                        </div>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 209
                yield "                                </div>
                            ";
            } else {
                // line 211
                yield "                                <div style=\"padding: 20px; text-align: center; color: #6c757d; font-style: italic;\">
                                    <i class=\"bi bi-inbox\" style=\"font-size: 2rem; display: block; margin-bottom: 8px; opacity: 0.5;\"></i>
                                    Aucun thème disponible
                                </div>
                            ";
            }
            // line 216
            yield "                        </div>

                        ";
            // line 219
            yield "                        ";
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "actions", [], "any", false, false, false, 219)) > 0)) {
                // line 220
                yield "                            <div>
                                <h4 style=\"font-size: 1rem; font-weight: 600; color: #2c384e; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e9ecef;\">
                                    <i class=\"bi bi-check-circle-fill\" style=\"margin-right: 8px; color: #28a745;\"></i>
                                    Modules renseignés (";
                // line 223
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "actions", [], "any", false, false, false, 223)), "html", null, true);
                yield ")
                                </h4>
                                <div style=\"display: flex; flex-direction: column; gap: 8px; max-height: 200px; overflow-y: auto;\">
                                    ";
                // line 226
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "actions", [], "any", false, false, false, 226));
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 227
                    yield "                                        <div style=\"padding: 10px; background-color: #f8f9fa; border-radius: 6px; border-left: 3px solid #28a745; font-size: 0.85rem;\">
                                            <div style=\"color: #2c384e; font-weight: 500; margin-bottom: 2px;\">";
                    // line 228
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 228), "title", [], "any", false, false, false, 228), "html", null, true);
                    yield "</div>
                                            <div style=\"color: #6c757d; font-size: 0.75rem;\">
                                                <i class=\"bi bi-calendar-check\" style=\"margin-right: 4px;\"></i>
                                                ";
                    // line 231
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 231), "d/m/Y à H:i"), "html", null, true);
                    yield "
                                            </div>
                                        </div>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 235
                yield "                                </div>
                            </div>
                        ";
            }
            // line 238
            yield "                    </div>

                    ";
            // line 241
            yield "                    <div style=\"background-color: #f8f9fa; padding: 12px 20px; border-radius: 0 0 10px 10px; border-top: 1px solid #e9ecef; text-align: right;\">
                        <button type=\"button\" popovertarget=\"logbook-popover-";
            // line 242
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["apprenantId"], "html", null, true);
            yield "\" popovertargetaction=\"hide\" style=\"background-color: #3d5f9e; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 0.85rem; cursor: pointer; transition: background-color 0.2s;\" onmouseover=\"this.style.backgroundColor='#2c4a7c'\" onmouseout=\"this.style.backgroundColor='#3d5f9e'\">
                            <i class=\"bi bi-x-lg\" style=\"margin-right: 6px;\"></i>
                            Fermer
                        </button>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['apprenantId'], $context['logbook'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 249
        yield "        </section>

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
        return "app/dashboard/mentor/index.html.twig";
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
        return array (  550 => 249,  537 => 242,  534 => 241,  530 => 238,  525 => 235,  515 => 231,  509 => 228,  506 => 227,  502 => 226,  496 => 223,  491 => 220,  488 => 219,  484 => 216,  477 => 211,  473 => 209,  466 => 207,  459 => 202,  455 => 200,  446 => 197,  442 => 195,  438 => 194,  435 => 193,  433 => 192,  428 => 190,  423 => 187,  419 => 186,  416 => 185,  414 => 184,  407 => 179,  400 => 174,  393 => 170,  388 => 167,  385 => 165,  376 => 158,  368 => 153,  361 => 149,  358 => 148,  354 => 146,  351 => 145,  348 => 144,  345 => 143,  341 => 142,  330 => 133,  324 => 132,  309 => 123,  300 => 117,  293 => 113,  287 => 110,  279 => 105,  275 => 104,  270 => 102,  264 => 99,  258 => 96,  254 => 95,  249 => 93,  242 => 89,  238 => 88,  229 => 82,  222 => 80,  215 => 75,  212 => 74,  210 => 73,  207 => 72,  205 => 65,  201 => 63,  198 => 62,  196 => 61,  194 => 56,  189 => 55,  185 => 54,  158 => 30,  148 => 22,  142 => 21,  132 => 17,  127 => 16,  122 => 15,  117 => 14,  111 => 9,  108 => 8,  105 => 7,  103 => 6,  100 => 5,  87 => 4,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Dashboard Tuteur{% endblock %}
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

        <div class=\"pageTitle\">
            <h1>Tableau de bord du Tuteur</h1>
            <nav>
                <ol class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a
                                href=\"{{ path('dashboard_index', { 'nni': app.user.nni }) }}\">Accueil</a></li>
                    <li class=\"breadcrumb-item active\">Tableau de bord du tuteur</li>
                </ol>
            </nav>
        </div>
        <section class=\"section dashboard\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des Apprenants</h5>
                            <table class=\"table table-hover align-middle mb-0\">
                                <thead>
                                <tr>
                                    <th scope=\"col\">Apprenant</th>
                                    <th scope=\"col\">Poste</th>
                                    <th scope=\"col\">Spécialité</th>
                                    <th scope=\"col\">Ancienneté</th>
                                    <th scope=\"col\" class=\"text-center\">Avancement</th>
                                    <th scope=\"col\" class=\"text-center\">Modules en attente de validation</th>
                                    <th scope=\"col\">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                {% for apprenant in apprenants %}
                                    {% for logbook in apprenant.logbooks %}
                                        {% set specialityColor = {
                                            'Chaudronnerie': 'success',
                                            'Levage': 'warning',
                                            'Mécanique': 'danger',
                                            'Robinetterie': 'info'
                                        }[apprenant.specialityLabel] ?? 'secondary' %}
                                        {% set progression = apprenantsProgress[apprenant.id|ea_as_string] %}


                                        {% set progressColorMap = {
                                            'bg-danger': '#dc3545',
                                            'bg-warning': '#ffc107',
                                            'bg-success': '#28a745',
                                            'bg-info': '#17a2b8',
                                            'bg-primary': '#007bff'
                                        } %}

                                        {% set bgClass = progression.progress_class_agent|split(' ')|filter(class => class starts with 'bg-')|first %}
                                        {% set progressColor = progressColorMap[bgClass] ?? '#6c757d' %}
                                        <tr>
                                            <td>
                                                <div class=\"d-flex align-items-center\">
                                                    <div class=\"avatar-wrapper me-3\">
                                                        <div class=\"avatar-circle\">
                                                            <div class=\"avatar-progress\" style=\"--progress: {{ progression.agent_progress }}%; --color: {{ progressColor }};\">
                                                                <span class=\"avatar-initials\">
                                                                    {{ apprenant.fullname|split(' ')|map(name => name|first)|join|upper|slice(0, 2) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class=\"mb-0\">{{ apprenant.fullname }}</h6>
                                                        <small class=\"text-muted\">{{ apprenant.email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ apprenant.jobLabel }}</td>
                                            <td>
                                                <span class=\"badge bg-{{ specialityColor }} rounded-pill\">
                                                    {{ apprenant.specialityLabel }}
                                                </span>
                                            </td>
                                            <td>{{ apprenant.seniority }}</td>
                                            <td class=\"text-center\">
                                                <div class=\"progress\" style=\"height: 20px;\">
                                                    <div class=\"progress-bar {{ progression.progress_class_agent }}\"
                                                         role=\"progressbar\"
                                                         style=\"width: {{ progression.agent_progress }}%;\"
                                                         aria-valuenow=\"{{ progression.agent_progress }}\"
                                                         aria-valuemin=\"0\"
                                                         aria-valuemax=\"100\">
                                                    </div>
                                                </div>
                                                <small class=\"mt-1 d-block\">{{ progression.agent_progress }}%</small>
                                            </td>
                                            <td class=\"text-center\">
                                                {{ progression.modules_awaiting_validation }}
                                            </td>
                                            <td>
                                                <div class=\"d-flex gap-2\">
                                                    <a href=\"{{ path('mentor_logbook_details', { 'id': logbook.id, 'nni': app.user.nni,'padawanNni': apprenant.nni }) }}\"
                                                       class=\"btn btn-sm btn-outline-primary\"
                                                       title=\"Voir les détails du carnet\">
                                                        <i class=\"bi bi-journal-text me-1\"></i>
                                                    </a>
                                                    <button type=\"button\"
                                                       popovertarget=\"logbook-popover-{{ apprenant.id }}\"
                                                       class=\"btn btn-sm btn-outline-primary\"
                                                       title=\"Voir tous les modules\">
                                                        <i class=\"bi bi-list-check me-1\"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id=\"padawanLogbooks\">
            {% for apprenantId, logbook in padawanLogbooks %}
                {% set apprenant = apprenants|filter(a => a.id == apprenantId|number_format(0, '', ''))|first %}
                {% set progression = apprenantsProgress[apprenantId] %}
                
                <div id=\"logbook-popover-{{ apprenantId }}\" popover style=\"width: min(800px, 90vw); max-height: 85vh; overflow-y: auto; border: 2px solid #3d5f9e; border-radius: 12px; padding: 0; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15); background-color: #ffffff;\">
                    {# En-tête du popover #}
                    <div style=\"background: linear-gradient(135deg, #3d5f9e 0%, #2c4a7c 100%); color: white; padding: 20px; border-radius: 10px 10px 0 0; margin: 0;\">
                        <h3 style=\"margin: 0 0 12px 0; font-size: 1.25rem; font-weight: 600;\">{{ logbook.name }}</h3>
                        <div style=\"display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap;\">
                            <p style=\"margin: 0; opacity: 0.9; font-size: 0.95rem; display: flex; align-items: center;\">
                                <i class=\"bi bi-person-circle\" style=\"margin-right: 8px; font-size: 1.1rem;\"></i>
                                <span style=\"font-weight: 500;\">{{ logbook.owner.fullname }}</span>
                            </p>
                            <div style=\"background-color: rgba(255, 255, 255, 0.2); border-radius: 8px; padding: 10px 16px; display: flex; align-items: center; gap: 12px;\">
                                <div>
                                    <div style=\"font-size: 0.75rem; opacity: 0.9; margin-bottom: 2px;\">Progression</div>
                                    <div style=\"font-size: 1.5rem; font-weight: bold; line-height: 1;\">{{ progression.agent_progress }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {# Corps du popover #}
                    <div style=\"padding: 20px;\">
                        {# Statistiques rapides #}
                        <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;\">
                            <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border-left: 4px solid #3d5f9e;\">
                                <div style=\"font-size: 0.75rem; color: #6c757d; margin-bottom: 4px;\">Thèmes</div>
                                <div style=\"font-size: 1.25rem; font-weight: 600; color: #2c384e;\">{{ logbook.themes|length }}</div>
                            </div>
                            <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border-left: 4px solid #28a745;\">
                                <div style=\"font-size: 0.75rem; color: #6c757d; margin-bottom: 4px;\">En attente</div>
                                <div style=\"font-size: 1.25rem; font-weight: 600; color: #2c384e;\">{{ progression.modules_awaiting_validation }}</div>
                            </div>
                        </div>

                        {# Affichage des thèmes et modules #}
                        <div style=\"margin-bottom: 20px;\">
                            <h4 style=\"font-size: 1rem; font-weight: 600; color: #2c384e; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e9ecef;\">
                                <i class=\"bi bi-folder2-open\" style=\"margin-right: 8px; color: #3d5f9e;\"></i>
                                Thèmes et modules
                            </h4>
                            {% if logbook.themes|length > 0 %}
                                <div style=\"display: flex; flex-direction: column; gap: 12px;\">
                                    {% for theme in logbook.themes %}
                                        <div style=\"background-color: #f8f9fa; border-radius: 8px; padding: 12px; border: 1px solid #e9ecef;\">
                                            <div style=\"font-weight: 600; color: #2c384e; margin-bottom: 8px; font-size: 0.95rem;\">
                                                <i class=\"bi bi-folder\" style=\"margin-right: 6px; color: #3d5f9e;\"></i>
                                                {{ theme.title }}
                                            </div>
                                            {% if theme.modules|length > 0 %}
                                                <div style=\"margin-left: 20px; display: flex; flex-direction: column; gap: 6px;\">
                                                    {% for module in theme.modules %}
                                                        <div style=\"padding: 6px 10px; background-color: white; border-radius: 4px; font-size: 0.85rem; border-left: 3px solid #3d5f9e; color: #2c384e;\">
                                                            <i class=\"bi bi-check-circle\" style=\"margin-right: 6px; color: #28a745; font-size: 0.75rem;\"></i>
                                                            {{ module.title }}
                                                        </div>
                                                    {% endfor %}
                                                </div>
                                            {% else %}
                                                <div style=\"margin-left: 20px; padding: 8px; color: #6c757d; font-size: 0.85rem; font-style: italic;\">
                                                    <i class=\"bi bi-info-circle\" style=\"margin-right: 6px;\"></i>
                                                    Aucun module
                                                </div>
                                            {% endif %}
                                        </div>
                                    {% endfor %}
                                </div>
                            {% else %}
                                <div style=\"padding: 20px; text-align: center; color: #6c757d; font-style: italic;\">
                                    <i class=\"bi bi-inbox\" style=\"font-size: 2rem; display: block; margin-bottom: 8px; opacity: 0.5;\"></i>
                                    Aucun thème disponible
                                </div>
                            {% endif %}
                        </div>

                        {# Affichage des modules renseignés #}
                        {% if logbook.actions|length > 0 %}
                            <div>
                                <h4 style=\"font-size: 1rem; font-weight: 600; color: #2c384e; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e9ecef;\">
                                    <i class=\"bi bi-check-circle-fill\" style=\"margin-right: 8px; color: #28a745;\"></i>
                                    Modules renseignés ({{ logbook.actions|length }})
                                </h4>
                                <div style=\"display: flex; flex-direction: column; gap: 8px; max-height: 200px; overflow-y: auto;\">
                                    {% for action in logbook.actions %}
                                        <div style=\"padding: 10px; background-color: #f8f9fa; border-radius: 6px; border-left: 3px solid #28a745; font-size: 0.85rem;\">
                                            <div style=\"color: #2c384e; font-weight: 500; margin-bottom: 2px;\">{{ action.module.title }}</div>
                                            <div style=\"color: #6c757d; font-size: 0.75rem;\">
                                                <i class=\"bi bi-calendar-check\" style=\"margin-right: 4px;\"></i>
                                                {{ action.agentValidatedAt|date('d/m/Y à H:i') }}
                                            </div>
                                        </div>
                                    {% endfor %}
                                </div>
                            </div>
                        {% endif %}
                    </div>

                    {# Pied du popover #}
                    <div style=\"background-color: #f8f9fa; padding: 12px 20px; border-radius: 0 0 10px 10px; border-top: 1px solid #e9ecef; text-align: right;\">
                        <button type=\"button\" popovertarget=\"logbook-popover-{{ apprenantId }}\" popovertargetaction=\"hide\" style=\"background-color: #3d5f9e; color: white; border: none; padding: 8px 16px; border-radius: 6px; font-size: 0.85rem; cursor: pointer; transition: background-color 0.2s;\" onmouseover=\"this.style.backgroundColor='#2c4a7c'\" onmouseout=\"this.style.backgroundColor='#3d5f9e'\">
                            <i class=\"bi bi-x-lg\" style=\"margin-right: 6px;\"></i>
                            Fermer
                        </button>
                    </div>
                </div>
            {% endfor %}
        </section>

    </main>
{% endblock %}
", "app/dashboard/mentor/index.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/mentor/index.html.twig");
    }
}
