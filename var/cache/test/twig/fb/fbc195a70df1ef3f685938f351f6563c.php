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

/* app/dashboard/_dashboardUserIndex.html.twig */
class __TwigTemplate_fefc1c0eaac917ec524b8e0cd2f5a135 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardUserIndex.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardUserIndex.html.twig"));

        // line 1
        yield "<div class=\"pageTitle\">
    <h1>Tableau de bord</h1>
    <nav>
        <ol class=\"breadcrumb\">
            <li class=\"breadcrumb-item\"><a href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 5, $this->source); })()), "user", [], "any", false, false, false, 5), "nni", [], "any", false, false, false, 5)]), "html", null, true);
        yield "\">
                    Accueil
                </a>
            </li>
            <li class=\"breadcrumb-item active\">Tableau de bord</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<div class=\"col-lg-12\">
    <div class=\"row\">
        <!-- Agent Card -->
        ";
        // line 17
        yield Twig\Extension\CoreExtension::include($this->env, $context, "app/dashboard/cards/userCard.html.twig");
        yield "
        <!-- End Agent Card -->

        <!-- Mentor Card -->
        ";
        // line 21
        yield Twig\Extension\CoreExtension::include($this->env, $context, "app/dashboard/cards/mentorCard.html.twig");
        yield "
        <!-- End Mentor Card -->
    </div>
</div>
<!-- End Left side columns -->

<!-- Modal Bootstrap pour les commentaires -->
<section id=\"card-logbook\">
    <div class=\"row mt-4\">
        <div class=\"col-12\">
            ";
        // line 31
        if ((($tmp = (isset($context["logbooks"]) || array_key_exists("logbooks", $context) ? $context["logbooks"] : (function () { throw new RuntimeError('Variable "logbooks" does not exist.', 31, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["logbooks"]) || array_key_exists("logbooks", $context) ? $context["logbooks"] : (function () { throw new RuntimeError('Variable "logbooks" does not exist.', 32, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["logbook"]) {
                // line 33
                yield "                <div class=\"card info-card mentor-card shadow-sm rounded-4 mb-4\">
                    <div class=\"card-header bg-white text-uppercase fw-bold border-bottom border-secondary border-opacity-25 ps-3\">
                        <h5 class=\"mb-0\">";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "name", [], "any", false, false, false, 35), "html", null, true);
                yield "</h5>
                    </div>
                    <div class=\"card-body\">
                        ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themes", [], "any", false, false, false, 38));
                foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                    // line 39
                    yield "                            <div class=\"accordion mt-3\" id=\"theme-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 39), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 39), "html", null, true);
                    yield "\">
                                <div class=\"accordion-item border-0\">
                                    <h2 class=\"accordion-header\" id=\"heading-";
                    // line 41
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 41), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 41), "html", null, true);
                    yield "\">
                                        <button class=\"accordion-button collapsed shadow-sm rounded-3 bg-primary-subtle text-dark\"
                                                type=\"button\"
                                                data-bs-toggle=\"collapse\"
                                                data-bs-target=\"#collapse-theme-";
                    // line 45
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 45), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 45), "html", null, true);
                    yield "\"
                                                aria-expanded=\"false\"
                                                aria-controls=\"collapse-theme-";
                    // line 47
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 47), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 47), "html", null, true);
                    yield "\">
                                            ";
                    // line 48
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 48), "html", null, true);
                    yield "
                                            ";
                    // line 49
                    $context["completedModules"] = 0;
                    // line 50
                    yield "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 50));
                    foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                        // line 51
                        yield "                                                ";
                        $context["actionByCurrentUser"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 51), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 51, $this->source); })()), "agentComment", [], "any", false, false, false, 51)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 51, $this->source); })()), "user", [], "any", false, false, false, 51) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 51, $this->source); })()), "user", [], "any", false, false, false, 51))); });
                        // line 52
                        yield "                                                ";
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["actionByCurrentUser"]) || array_key_exists("actionByCurrentUser", $context) ? $context["actionByCurrentUser"] : (function () { throw new RuntimeError('Variable "actionByCurrentUser" does not exist.', 52, $this->source); })())) > 0)) {
                            // line 53
                            yield "                                                    ";
                            $context["completedModules"] = ((isset($context["completedModules"]) || array_key_exists("completedModules", $context) ? $context["completedModules"] : (function () { throw new RuntimeError('Variable "completedModules" does not exist.', 53, $this->source); })()) + 1);
                            // line 54
                            yield "                                                ";
                        }
                        // line 55
                        yield "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 56
                    yield "                                            <span class=\"badge ";
                    if (((isset($context["completedModules"]) || array_key_exists("completedModules", $context) ? $context["completedModules"] : (function () { throw new RuntimeError('Variable "completedModules" does not exist.', 56, $this->source); })()) == Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 56)))) {
                        yield "bg-success";
                    } else {
                        yield "bg-primary";
                    }
                    yield " rounded-pill ms-3\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["completedModules"]) || array_key_exists("completedModules", $context) ? $context["completedModules"] : (function () { throw new RuntimeError('Variable "completedModules" does not exist.', 56, $this->source); })()), "html", null, true);
                    yield " / ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 56)), "html", null, true);
                    yield "</span>
                                        </button>
                                    </h2>

                                    <div id=\"collapse-theme-";
                    // line 60
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 60), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 60), "html", null, true);
                    yield "\"
                                         class=\"accordion-collapse collapse\"
                                         aria-labelledby=\"heading-";
                    // line 62
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 62), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 62), "html", null, true);
                    yield "\"
                                         data-bs-parent=\"#theme-";
                    // line 63
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 63), "html", null, true);
                    yield "-logbook-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 63), "html", null, true);
                    yield "\">
                                        <div class=\"accordion-body\">
                                            <!-- Ajout du conteneur scrollable -->
                                            <div class=\"scrollable-modules\">
                                                <ul class=\"list-group list-group-flush\">
                                                    ";
                    // line 68
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 68));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                        // line 69
                        yield "                                                        ";
                        $context["actionByCurrentUser"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 69), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 69, $this->source); })()), "agentComment", [], "any", false, false, false, 69)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "user", [], "any", false, false, false, 69))); });
                        // line 70
                        yield "                                                        ";
                        $context["hasFilledActions"] = (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["actionByCurrentUser"]) || array_key_exists("actionByCurrentUser", $context) ? $context["actionByCurrentUser"] : (function () { throw new RuntimeError('Variable "actionByCurrentUser" does not exist.', 70, $this->source); })())) > 0);
                        // line 71
                        yield "                                                        ";
                        $context["moduleValidatedByMentor"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 71), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 71, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 71) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71))); });
                        // line 72
                        yield "                                                        ";
                        $context["moduleCommentedByMentor"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 72), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 72, $this->source); })()), "mentorComment", [], "any", false, false, false, 72)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "user", [], "any", false, false, false, 72))); });
                        // line 73
                        yield "                                                        <li id=\"module-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 73), "html", null, true);
                        yield "\"
                                                            class=\"list-group-item d-flex justify-content-between align-items-center py-2
                                                                ";
                        // line 75
                        yield (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["moduleCommentedByMentor"]) || array_key_exists("moduleCommentedByMentor", $context) ? $context["moduleCommentedByMentor"] : (function () { throw new RuntimeError('Variable "moduleCommentedByMentor" does not exist.', 75, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-primary-subtle border border-primary rounded-1") : (""));
                        yield "
                                                                ";
                        // line 76
                        yield (((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["moduleValidatedByMentor"]) || array_key_exists("moduleValidatedByMentor", $context) ? $context["moduleValidatedByMentor"] : (function () { throw new RuntimeError('Variable "moduleValidatedByMentor" does not exist.', 76, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-success-subtle border-0") : (""));
                        yield "\">
                                                            <span>";
                        // line 77
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 77), "html", null, true);
                        yield " - ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 77), "html", null, true);
                        yield "</span>
                                                            <div class=\"d-flex gap-2\">
                                                                ";
                        // line 79
                        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["moduleValidatedByMentor"]) || array_key_exists("moduleValidatedByMentor", $context) ? $context["moduleValidatedByMentor"] : (function () { throw new RuntimeError('Variable "moduleValidatedByMentor" does not exist.', 79, $this->source); })())) > 0)) {
                            // line 80
                            yield "                                                                    <span class=\"badge bg-success rounded-pill\"
                                                                          data-bs-toggle=\"modal\"
                                                                          data-bs-target=\"#userActionModal";
                            // line 82
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 82), "html", null, true);
                            yield "\"
                                                                          style=\"cursor: pointer\">
                                                                            <i class=\"bi bi-check-circle\"></i> Validé
                                                                        </span>
                                                                ";
                        } else {
                            // line 87
                            yield "                                                                    ";
                            if ((($tmp = (isset($context["hasFilledActions"]) || array_key_exists("hasFilledActions", $context) ? $context["hasFilledActions"] : (function () { throw new RuntimeError('Variable "hasFilledActions" does not exist.', 87, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                // line 88
                                yield "                                                                        <a class=\"btn btn-sm btn-outline-primary\"
                                                                           href=\"";
                                // line 89
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "user", [], "any", false, false, false, 89), "nni", [], "any", false, false, false, 89), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 89), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 89)]), "html", null, true);
                                yield "\">
                                                                            <i class=\"bi bi-pencil-square\"></i>
                                                                            Modifier
                                                                        </a>
                                                                    ";
                            } else {
                                // line 94
                                yield "                                                                        <a class=\"btn btn-sm btn-primary\"
                                                                           href=\"";
                                // line 95
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 95, $this->source); })()), "user", [], "any", false, false, false, 95), "nni", [], "any", false, false, false, 95), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 95), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "id", [], "any", false, false, false, 95)]), "html", null, true);
                                yield "\">
                                                                            <i class=\"bi bi-pencil-square\"></i>
                                                                            Renseigner le module
                                                                        </a>
                                                                    ";
                            }
                            // line 100
                            yield "                                                                    ";
                            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 100), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return (( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 100, $this->source); })()), "agentComment", [], "any", false, false, false, 100)) && (null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 100, $this->source); })()), "mentorComment", [], "any", false, false, false, 100))) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 100, $this->source); })()), "user", [], "any", false, false, false, 100) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 100, $this->source); })()), "user", [], "any", false, false, false, 100))); })) > 0)) {
                                // line 101
                                yield "                                                                        <button class=\"btn btn-sm btn-outline-secondary\"
                                                                                data-bs-toggle=\"modal\"
                                                                                data-bs-target=\"#userActionModal";
                                // line 103
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 103), "html", null, true);
                                yield "\">
                                                                            <i class=\"bi bi-info-circle\"></i>
                                                                            Commentaire agent
                                                                        </button>
                                                                    ";
                            } elseif ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source,                             // line 107
$context["module"], "actions", [], "any", false, false, false, 107), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 107, $this->source); })()), "mentorComment", [], "any", false, false, false, 107)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 107, $this->source); })()), "user", [], "any", false, false, false, 107) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 107, $this->source); })()), "user", [], "any", false, false, false, 107))); })) > 0)) {
                                // line 108
                                yield "                                                                        <button class=\"btn btn-sm btn-outline-success\"
                                                                                data-bs-toggle=\"modal\"
                                                                                data-bs-target=\"#userActionModal";
                                // line 110
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 110), "html", null, true);
                                yield "\">
                                                                            <i class=\"bi bi-info-circle\"></i>
                                                                            Commentaire tuteur
                                                                        </button>
                                                                    ";
                            }
                            // line 115
                            yield "                                                                ";
                        }
                        // line 116
                        yield "                                                            </div>
                                                        </li>
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
                    unset($context['_seq'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 119
                    yield "                                                </ul>
                                            </div>
                                            <!-- Fin du conteneur scrollable -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 127
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['logbook'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 130
            yield "            ";
        } else {
            // line 131
            yield "                <div class=\"card border-0 rounded-xl shadow-lg overflow-hidden position-relative card-logbook\">
                    <div class=\"card-body p-0\">
                        <div class=\"row g-0\">
                            <div class=\"col-md-6 p-5 d-flex flex-column justify-content-center\">
                                <h3 class=\"fw-bold mb-3 glitch-text\" data-text=\"Aucun carnet disponible\" style=\"color: #012970\">Aucun carnet disponible</h3>
                                <p id=\"typewriter-text\" class=\"lead text-muted mb-4\" data-firstname=\"";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "user", [], "any", false, false, false, 136), "firstname", [], "any", false, false, false, 136)), "html", null, true);
            yield "\"></p>
                            </div>
                            <div class=\"col-md-6 dark-gradient-background d-none d-md-flex align-items-center justify-content-center position-relative overflow-hidden\">
                                <div class=\"hologram-effect\"></div>
                                <div class=\"particle-system\"></div>
                                <div class=\"floating-icon\">
                                    <i class=\"bi bi-book fs-1\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 149
        yield "        </div>
    </div>
</section>
<!-- Modals pour afficher les commentaires des utilisateurs et tuteurs -->
";
        // line 153
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["logbooks"]) || array_key_exists("logbooks", $context) ? $context["logbooks"] : (function () { throw new RuntimeError('Variable "logbooks" does not exist.', 153, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["logbook"]) {
            // line 154
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themes", [], "any", false, false, false, 154));
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 155
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 155));
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    // line 156
                    yield "            ";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 156), function ($__action__) use ($context, $macros) { $context["action"] = $__action__; return ((( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 156, $this->source); })()), "agentComment", [], "any", false, false, false, 156)) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 156, $this->source); })()), "agentComment", [], "any", false, false, false, 156)) > 0)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 156, $this->source); })()), "user", [], "any", false, false, false, 156) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 156, $this->source); })()), "user", [], "any", false, false, false, 156))) ||  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 156, $this->source); })()), "mentorComment", [], "any", false, false, false, 156))); })) > 0)) {
                        // line 157
                        yield "                <div class=\"modal fade\" id=\"userActionModal";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 157), "html", null, true);
                        yield "\" tabindex=\"-1\"
                     aria-labelledby=\"userActionModalLabel";
                        // line 158
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 158), "html", null, true);
                        yield "\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered modal-lg\">
                        <div class=\"modal-content shadow-lg\">
                            <div class=\"modal-header bg-light border-0\">
                                <h3 class=\"modal-title text-dark\" id=\"userActionModalLabel";
                        // line 162
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 162), "html", null, true);
                        yield "\">
                                    <i class=\"bi bi-chat-dots me-2\"></i> Commentaires
                                </h3>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"
                                        aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                                ";
                        // line 169
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "actions", [], "any", false, false, false, 169));
                        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                            // line 170
                            yield "                                    ";
                            if ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 170) && (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 170) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 170, $this->source); })()), "user", [], "any", false, false, false, 170)))) {
                                // line 171
                                yield "                                        <div class=\"mb-4\">
                                            <h5 class=\"text-primary\">Commentaire de l'Agent</h5>
                                            <div class=\"bg-light p-3 border rounded\">
                                                <p>";
                                // line 174
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 174), "html", null, true);
                                yield "</p>
                                            </div>
                                        </div>
                                    ";
                            }
                            // line 178
                            yield "                                    ";
                            if ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 178) && (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 178) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 178, $this->source); })()), "user", [], "any", false, false, false, 178)))) {
                                // line 179
                                yield "                                        <div class=\"mt-4\">
                                            <h5 class=\"text-success\">Commentaire du Tuteur</h5>
                                            <div class=\"bg-light p-3 border rounded\">
                                                <p>";
                                // line 182
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 182), "html", null, true);
                                yield "</p>
                                            </div>
                                        </div>
                                    ";
                            }
                            // line 186
                            yield "                                    ";
                            if ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorValidatedAt", [], "any", false, false, false, 186) && (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "user", [], "any", false, false, false, 186) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 186, $this->source); })()), "user", [], "any", false, false, false, 186)))) {
                                // line 187
                                yield "                                        <div class=\"mt-4\">
                                            <hr>
                                            <h5 class=\"text-success\">Validation du Tuteur</h5>
                                            <div class=\"bg-secondary-light p-3 border rounded\">
                                                <p>";
                                // line 191
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorVisa", [], "any", false, false, false, 191), "html", null, true);
                                yield "</p>
                                            </div>
                                        </div>
                                    ";
                            }
                            // line 195
                            yield "                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 196
                        yield "                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                    <i class=\"bi bi-x-circle\"></i> Fermer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
                    }
                    // line 206
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 207
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['logbook'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "app/dashboard/_dashboardUserIndex.html.twig";
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
        return array (  510 => 207,  504 => 206,  492 => 196,  486 => 195,  479 => 191,  473 => 187,  470 => 186,  463 => 182,  458 => 179,  455 => 178,  448 => 174,  443 => 171,  440 => 170,  436 => 169,  426 => 162,  419 => 158,  414 => 157,  411 => 156,  406 => 155,  401 => 154,  397 => 153,  391 => 149,  375 => 136,  368 => 131,  365 => 130,  357 => 127,  344 => 119,  328 => 116,  325 => 115,  317 => 110,  313 => 108,  311 => 107,  304 => 103,  300 => 101,  297 => 100,  289 => 95,  286 => 94,  278 => 89,  275 => 88,  272 => 87,  264 => 82,  260 => 80,  258 => 79,  251 => 77,  247 => 76,  243 => 75,  237 => 73,  234 => 72,  231 => 71,  228 => 70,  225 => 69,  208 => 68,  198 => 63,  192 => 62,  185 => 60,  169 => 56,  163 => 55,  160 => 54,  157 => 53,  154 => 52,  151 => 51,  146 => 50,  144 => 49,  140 => 48,  134 => 47,  127 => 45,  118 => 41,  110 => 39,  106 => 38,  100 => 35,  96 => 33,  91 => 32,  89 => 31,  76 => 21,  69 => 17,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"pageTitle\">
    <h1>Tableau de bord</h1>
    <nav>
        <ol class=\"breadcrumb\">
            <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\">
                    Accueil
                </a>
            </li>
            <li class=\"breadcrumb-item active\">Tableau de bord</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<div class=\"col-lg-12\">
    <div class=\"row\">
        <!-- Agent Card -->
        {{ include('app/dashboard/cards/userCard.html.twig') }}
        <!-- End Agent Card -->

        <!-- Mentor Card -->
        {{ include('app/dashboard/cards/mentorCard.html.twig') }}
        <!-- End Mentor Card -->
    </div>
</div>
<!-- End Left side columns -->

<!-- Modal Bootstrap pour les commentaires -->
<section id=\"card-logbook\">
    <div class=\"row mt-4\">
        <div class=\"col-12\">
            {% if logbooks %}
            {% for logbook in logbooks %}
                <div class=\"card info-card mentor-card shadow-sm rounded-4 mb-4\">
                    <div class=\"card-header bg-white text-uppercase fw-bold border-bottom border-secondary border-opacity-25 ps-3\">
                        <h5 class=\"mb-0\">{{ logbook.name }}</h5>
                    </div>
                    <div class=\"card-body\">
                        {% for theme in logbook.themes %}
                            <div class=\"accordion mt-3\" id=\"theme-{{ theme.id }}-logbook-{{ logbook.id }}\">
                                <div class=\"accordion-item border-0\">
                                    <h2 class=\"accordion-header\" id=\"heading-{{ theme.id }}-logbook-{{ logbook.id }}\">
                                        <button class=\"accordion-button collapsed shadow-sm rounded-3 bg-primary-subtle text-dark\"
                                                type=\"button\"
                                                data-bs-toggle=\"collapse\"
                                                data-bs-target=\"#collapse-theme-{{ theme.id }}-logbook-{{ logbook.id }}\"
                                                aria-expanded=\"false\"
                                                aria-controls=\"collapse-theme-{{ theme.id }}-logbook-{{ logbook.id }}\">
                                            {{ theme.title }}
                                            {% set completedModules = 0 %}
                                            {% for module in theme.modules %}
                                                {% set actionByCurrentUser = module.actions|filter(action => action.agentComment is not null and action.user == app.user) %}
                                                {% if actionByCurrentUser|length > 0 %}
                                                    {% set completedModules = completedModules + 1 %}
                                                {% endif %}
                                            {% endfor %}
                                            <span class=\"badge {% if completedModules == theme.modules|length %}bg-success{% else %}bg-primary{% endif %} rounded-pill ms-3\">{{ completedModules }} / {{ theme.modules|length }}</span>
                                        </button>
                                    </h2>

                                    <div id=\"collapse-theme-{{ theme.id }}-logbook-{{ logbook.id }}\"
                                         class=\"accordion-collapse collapse\"
                                         aria-labelledby=\"heading-{{ theme.id }}-logbook-{{ logbook.id }}\"
                                         data-bs-parent=\"#theme-{{ theme.id }}-logbook-{{ logbook.id }}\">
                                        <div class=\"accordion-body\">
                                            <!-- Ajout du conteneur scrollable -->
                                            <div class=\"scrollable-modules\">
                                                <ul class=\"list-group list-group-flush\">
                                                    {% for module in theme.modules %}
                                                        {% set actionByCurrentUser = module.actions|filter(action => action.agentComment is not null and action.user == app.user) %}
                                                        {% set hasFilledActions = actionByCurrentUser|length > 0 %}
                                                        {% set moduleValidatedByMentor = module.actions|filter(action => action.mentorValidatedAt and action.user == app.user) %}
                                                        {% set moduleCommentedByMentor = module.actions|filter(action => action.mentorComment is not null and action.user == app.user) %}
                                                        <li id=\"module-{{ module.id }}\"
                                                            class=\"list-group-item d-flex justify-content-between align-items-center py-2
                                                                {{ moduleCommentedByMentor is not empty ? 'bg-primary-subtle border border-primary rounded-1' : '' }}
                                                                {{ moduleValidatedByMentor is not empty ? 'bg-success-subtle border-0' : '' }}\">
                                                            <span>{{ loop.index }} - {{ module.title }}</span>
                                                            <div class=\"d-flex gap-2\">
                                                                {% if  moduleValidatedByMentor|length > 0 %}
                                                                    <span class=\"badge bg-success rounded-pill\"
                                                                          data-bs-toggle=\"modal\"
                                                                          data-bs-target=\"#userActionModal{{ module.id }}\"
                                                                          style=\"cursor: pointer\">
                                                                            <i class=\"bi bi-check-circle\"></i> Validé
                                                                        </span>
                                                                {% else %}
                                                                    {% if hasFilledActions %}
                                                                        <a class=\"btn btn-sm btn-outline-primary\"
                                                                           href=\"{{ path('action_edit', { 'nni': app.user.nni, 'moduleId': module.id, 'logbookId': logbook.id }) }}\">
                                                                            <i class=\"bi bi-pencil-square\"></i>
                                                                            Modifier
                                                                        </a>
                                                                    {% else %}
                                                                        <a class=\"btn btn-sm btn-primary\"
                                                                           href=\"{{ path('action_edit', { 'nni': app.user.nni, 'moduleId': module.id, 'logbookId': logbook.id }) }}\">
                                                                            <i class=\"bi bi-pencil-square\"></i>
                                                                            Renseigner le module
                                                                        </a>
                                                                    {% endif %}
                                                                    {% if module.actions|filter(action => action.agentComment is not null and action.mentorComment is null and action.user == app.user)|length > 0 %}
                                                                        <button class=\"btn btn-sm btn-outline-secondary\"
                                                                                data-bs-toggle=\"modal\"
                                                                                data-bs-target=\"#userActionModal{{ module.id }}\">
                                                                            <i class=\"bi bi-info-circle\"></i>
                                                                            Commentaire agent
                                                                        </button>
                                                                    {% elseif module.actions|filter(action => action.mentorComment is not null and action.user == app.user)|length > 0 %}
                                                                        <button class=\"btn btn-sm btn-outline-success\"
                                                                                data-bs-toggle=\"modal\"
                                                                                data-bs-target=\"#userActionModal{{ module.id }}\">
                                                                            <i class=\"bi bi-info-circle\"></i>
                                                                            Commentaire tuteur
                                                                        </button>
                                                                    {% endif %}
                                                                {% endif %}
                                                            </div>
                                                        </li>
                                                    {% endfor %}
                                                </ul>
                                            </div>
                                            <!-- Fin du conteneur scrollable -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            {% endfor %}
            {% else %}
                <div class=\"card border-0 rounded-xl shadow-lg overflow-hidden position-relative card-logbook\">
                    <div class=\"card-body p-0\">
                        <div class=\"row g-0\">
                            <div class=\"col-md-6 p-5 d-flex flex-column justify-content-center\">
                                <h3 class=\"fw-bold mb-3 glitch-text\" data-text=\"Aucun carnet disponible\" style=\"color: #012970\">Aucun carnet disponible</h3>
                                <p id=\"typewriter-text\" class=\"lead text-muted mb-4\" data-firstname=\"{{ app.user.firstname|capitalize }}\"></p>
                            </div>
                            <div class=\"col-md-6 dark-gradient-background d-none d-md-flex align-items-center justify-content-center position-relative overflow-hidden\">
                                <div class=\"hologram-effect\"></div>
                                <div class=\"particle-system\"></div>
                                <div class=\"floating-icon\">
                                    <i class=\"bi bi-book fs-1\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {% endif %}
        </div>
    </div>
</section>
<!-- Modals pour afficher les commentaires des utilisateurs et tuteurs -->
{% for logbook in logbooks %}
    {% for theme in logbook.themes %}
        {% for module in theme.modules %}
            {% if module.actions|filter(action => action.agentComment is not null and action.agentComment|length > 0 and action.user == app.user or action.mentorComment is not null)|length > 0 %}
                <div class=\"modal fade\" id=\"userActionModal{{ module.id }}\" tabindex=\"-1\"
                     aria-labelledby=\"userActionModalLabel{{ module.id }}\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-dialog-centered modal-lg\">
                        <div class=\"modal-content shadow-lg\">
                            <div class=\"modal-header bg-light border-0\">
                                <h3 class=\"modal-title text-dark\" id=\"userActionModalLabel{{ module.id }}\">
                                    <i class=\"bi bi-chat-dots me-2\"></i> Commentaires
                                </h3>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"
                                        aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                                {% for action in module.actions %}
                                    {% if action.agentComment and action.user == app.user %}
                                        <div class=\"mb-4\">
                                            <h5 class=\"text-primary\">Commentaire de l'Agent</h5>
                                            <div class=\"bg-light p-3 border rounded\">
                                                <p>{{ action.agentComment }}</p>
                                            </div>
                                        </div>
                                    {% endif %}
                                    {% if action.mentorComment and action.user == app.user %}
                                        <div class=\"mt-4\">
                                            <h5 class=\"text-success\">Commentaire du Tuteur</h5>
                                            <div class=\"bg-light p-3 border rounded\">
                                                <p>{{ action.mentorComment }}</p>
                                            </div>
                                        </div>
                                    {% endif %}
                                    {% if action.mentorValidatedAt and action.user == app.user %}
                                        <div class=\"mt-4\">
                                            <hr>
                                            <h5 class=\"text-success\">Validation du Tuteur</h5>
                                            <div class=\"bg-secondary-light p-3 border rounded\">
                                                <p>{{ action.mentorVisa }}</p>
                                            </div>
                                        </div>
                                    {% endif %}
                                {% endfor %}
                            </div>
                            <div class=\"modal-footer border-0\">
                                <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                    <i class=\"bi bi-x-circle\"></i> Fermer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {% endif %}
        {% endfor %}
    {% endfor %}
{% endfor %}
", "app/dashboard/_dashboardUserIndex.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/_dashboardUserIndex.html.twig");
    }
}
