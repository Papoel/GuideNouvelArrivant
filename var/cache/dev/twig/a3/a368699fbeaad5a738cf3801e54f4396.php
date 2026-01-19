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

/* pdf/workbook.html.twig */
class __TwigTemplate_aabaa358a3fa49eb4a79f01ce63c9fea extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/workbook.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/workbook.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Carnet de Compagnonnage - ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 6, $this->source); })()), "fullname", [], "any", false, false, false, 6), "html", null, true);
        yield "</title>
    <style>
        ";
        // line 8
        yield from $this->load("pdf/css_workbook.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "    </style>
</head>
<body style=\"padding: 20px;\">
    <!-- Page de couverture -->
    <div class=\"cover-page\">
        <div class=\"cover-header\">
            <div class=\"company-logo\">
                <div class=\"logo-placeholder\">
                    <img src=\"images/logos/edf.png\" alt=\"Logo EDF\" style=\"width: 80px; height: 80px; object-fit: contain;\">
                </div>
            </div>
            <div class=\"document-title\">
                <h1>CARNET DE COMPAGNONNAGE</h1>
                <div class=\"subtitle\">Certificat de fin de formation</div>
            </div>
        </div>

        <div class=\"cover-content\">
            <div class=\"apprentice-info-full\">
                <h2>Informations de l'apprenant</h2>
                <div class=\"info-grid\">
                    <div class=\"info-row\">
                        <span class=\"label\">Nom complet :</span>
                        <span class=\"value\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 32, $this->source); })()), "fullname", [], "any", false, false, false, 32), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">NNI :</span>
                        <span class=\"value\">";
        // line 36
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "nni", [], "any", true, true, false, 36) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "nni", [], "any", false, false, false, 36)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "nni", [], "any", false, false, false, 36), "html", null, true)) : ("Non renseigné"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Email :</span>
                        <span class=\"value\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "email", [], "any", false, false, false, 40), "html", null, true);
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Métier :</span>
                        <span class=\"value\">";
        // line 44
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "job", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "job", [], "any", false, false, false, 44), "name", [], "any", false, false, false, 44), "html", null, true)) : ("Non renseigné"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Spécialité :</span>
                        <span class=\"value\">";
        // line 48
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "speciality", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "speciality", [], "any", false, false, false, 48), "name", [], "any", false, false, false, 48), "html", null, true)) : ("Non renseigné"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Service :</span>
                        <span class=\"value\">";
        // line 52
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "service", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "service", [], "any", false, false, false, 52), "name", [], "any", false, false, false, 52), "html", null, true)) : ("Non renseigné"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Date d'embauche :</span>
                        <span class=\"value\">";
        // line 56
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "hiringAt", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "hiringAt", [], "any", false, false, false, 56), "d/m/Y"), "html", null, true)) : ("Non renseignée"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Tuteur :</span>
                        <span class=\"value\">";
        // line 60
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 60, $this->source); })()), "mentor", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 60, $this->source); })()), "mentor", [], "any", false, false, false, 60), "fullname", [], "any", false, false, false, 60), "html", null, true)) : ("Non assigné"));
        yield "</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Date de fin de formation :</span>
                        <span class=\"value\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate($this->extensions['Twig\Extension\CoreExtension']->modifyDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "hiringAt", [], "any", false, false, false, 64), "+364 days"), "d/m/Y"), "html", null, true);
        yield "</span>
                    </div>
                </div>
                
                <div class=\"completion-certificate\">
                    <div class=\"certificate-text\">
                        <p class=\"certificate-statement\">
                            Nous certifions que <strong>";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 71, $this->source); })()), "fullname", [], "any", false, false, false, 71), "html", null, true);
        yield "</strong> a terminé avec succès 
                            son parcours de professionalisation pour le métier de <strong>";
        // line 72
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "job", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "job", [], "any", false, false, false, 72), "name", [], "any", false, false, false, 72), "html", null, true)) : ("non spécifié"));
        yield "</strong>
                            ";
        // line 73
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 73, $this->source); })()), "speciality", [], "any", false, false, false, 73)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " avec spécialisation en <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 73, $this->source); })()), "speciality", [], "any", false, false, false, 73), "name", [], "any", false, false, false, 73), "html", null, true);
            yield "</strong>";
        }
        yield ".
                        </p>
                        <p class=\"certificate-validation\">
                            Toutes les compétences requises ont été acquises et validées par le tuteur référent.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"cover-footer\">
            <div class=\"generation-info\">
                <p>Document généré le ";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date_generation"]) || array_key_exists("date_generation", $context) ? $context["date_generation"] : (function () { throw new RuntimeError('Variable "date_generation" does not exist.', 85, $this->source); })()), "d/m/Y à H:i"), "html", null, true);
        yield "</p>
            </div>
        </div>
    </div>

    <!-- Pages de contenu -->
    <div class=\"content-page\">
        <div class=\"page-header\">
            <h1>Détail des compétences acquises</h1>
            <div class=\"header-info\">
                <span>";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 95, $this->source); })()), "fullname", [], "any", false, false, false, 95), "html", null, true);
        yield " - ";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 95, $this->source); })()), "job", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 95, $this->source); })()), "job", [], "any", false, false, false, 95), "name", [], "any", false, false, false, 95), "html", null, true)) : ("Métier non renseigné"));
        yield "</span>
            </div>
        </div>

        <div class=\"content-section\">
            <h2>Progression par domaine de compétences</h2>
            
            ";
        // line 102
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["logbook"] ?? null), "themes", [], "any", true, true, false, 102) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 102, $this->source); })()), "themes", [], "any", false, false, false, 102)) > 0))) {
            // line 103
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 103, $this->source); })()), "themes", [], "any", false, false, false, 103));
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 104
                yield "                    <div class=\"domain-section\">
                        <h3>";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 105), "html", null, true);
                yield "</h3>
                        <div class=\"skills-grid\">
                            ";
                // line 107
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 107));
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
                    // line 108
                    yield "                                ";
                    $context["action"] = null;
                    // line 109
                    yield "                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 109, $this->source); })()), "actions", [], "any", false, false, false, 109));
                    foreach ($context['_seq'] as $context["_key"] => $context["userAction"]) {
                        // line 110
                        yield "                                    ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["userAction"], "module", [], "any", false, false, false, 110), "id", [], "any", false, false, false, 110) == CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 110))) {
                            // line 111
                            yield "                                        ";
                            $context["action"] = $context["userAction"];
                            // line 112
                            yield "                                    ";
                        }
                        // line 113
                        yield "                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['userAction'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 114
                    yield "                                <div class=\"skill-item ";
                    yield ((((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 114, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 114, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 114))) ? ("completed") : ("pending"));
                    yield "\" style=\"";
                    yield (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("margin-bottom: 10px;") : (""));
                    yield "\">
                                    <div class=\"skill-header\">
                                        <span class=\"skill-name\">";
                    // line 116
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 116), "html", null, true);
                    yield "</span>
                                        <span class=\"skill-status\">
                                            ";
                    // line 118
                    if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 118, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 118, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 118))) {
                        // line 119
                        yield "                                                <span style=\"color: #28a745; font-weight: bold;\">[VALIDÉ]</span>
                                            ";
                    } elseif ((                    // line 120
(isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 120, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 120, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 120))) {
                        // line 121
                        yield "                                                <span style=\"color:rgb(212, 159, 1);\">[EN ATTENTE]</span>
                                            ";
                    } else {
                        // line 123
                        yield "                                                <span style=\"color: #6c757d;\">[EN COURS]</span>
                                            ";
                    }
                    // line 125
                    yield "                                        </span>
                                    </div>
                                    ";
                    // line 127
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, false, 127)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 128
                        yield "                                        <p class=\"skill-description\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, false, 128), "html", null, true);
                        yield "</p>
                                    ";
                    }
                    // line 130
                    yield "                                    ";
                    if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 130, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 130, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 130))) {
                        // line 131
                        yield "                                        <p class=\"completion-date\">Validée le ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 131, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 131), "d/m/Y"), "html", null, true);
                        yield "</p>
                                    ";
                    }
                    // line 133
                    yield "                                </div>
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
                // line 135
                yield "                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            yield "            ";
        } else {
            // line 139
            yield "                <div class=\"no-data\">
                    <p>Aucun thème disponible dans ce carnet.</p>
                </div>
            ";
        }
        // line 143
        yield "        </div>
    </div>

    <!-- Nouvelle page pour les actions -->
    <div class=\"page-break\"></div>
    
    <div class=\"content-page\">
        <div class=\"page-header\">
            <h1>Journal des actions réalisées</h1>
            <div class=\"header-info\">
                <span>";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 153, $this->source); })()), "fullname", [], "any", false, false, false, 153), "html", null, true);
        yield " - Période de formation</span>
            </div>
        </div>

        <div class=\"content-section\">
            ";
        // line 158
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["logbook"] ?? null), "actions", [], "any", true, true, false, 158) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 158, $this->source); })()), "actions", [], "any", false, false, false, 158)) > 0))) {
            // line 159
            yield "                <div class=\"actions-timeline\">
                    ";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 160, $this->source); })()), "actions", [], "any", false, false, false, 160));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 161
                yield "                        ";
                $context["actionStatus"] = "pending";
                // line 162
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorValidatedAt", [], "any", false, false, false, 162)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 163
                    yield "                            ";
                    $context["actionStatus"] = "completed";
                    // line 164
                    yield "                        ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 164)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 165
                    yield "                            ";
                    $context["actionStatus"] = "in_progress";
                    // line 166
                    yield "                        ";
                }
                // line 167
                yield "                        <div class=\"action-item ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["actionStatus"]) || array_key_exists("actionStatus", $context) ? $context["actionStatus"] : (function () { throw new RuntimeError('Variable "actionStatus" does not exist.', 167, $this->source); })()), "html", null, true);
                yield "\">
                            <div class=\"action-date\">
                                ";
                // line 169
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 169)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 170
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 170), "d/m/Y"), "html", null, true);
                    yield "
                                ";
                } else {
                    // line 172
                    yield "                                    Non datée
                                ";
                }
                // line 174
                yield "                            </div>
                            <div class=\"action-content\">
                                <h4>";
                // line 176
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 176)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 176), "title", [], "any", false, false, false, 176), "html", null, true)) : ("Action sans module"));
                yield "</h4>
                                ";
                // line 177
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "description", [], "any", false, false, false, 177)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 178
                    yield "                                    <p class=\"action-description\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "description", [], "any", false, false, false, 178), "html", null, true);
                    yield "</p>
                                ";
                }
                // line 180
                yield "                                <div class=\"action-meta\">
                                    <span class=\"action-status-badge status-";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["actionStatus"]) || array_key_exists("actionStatus", $context) ? $context["actionStatus"] : (function () { throw new RuntimeError('Variable "actionStatus" does not exist.', 181, $this->source); })()), "html", null, true);
                yield "\">
                                        ";
                // line 182
                if (((isset($context["actionStatus"]) || array_key_exists("actionStatus", $context) ? $context["actionStatus"] : (function () { throw new RuntimeError('Variable "actionStatus" does not exist.', 182, $this->source); })()) == "completed")) {
                    // line 183
                    yield "                                            Validée par le tuteur
                                        ";
                } elseif ((                // line 184
(isset($context["actionStatus"]) || array_key_exists("actionStatus", $context) ? $context["actionStatus"] : (function () { throw new RuntimeError('Variable "actionStatus" does not exist.', 184, $this->source); })()) == "in_progress")) {
                    // line 185
                    yield "                                            Auto-validée (en attente tuteur)
                                        ";
                } else {
                    // line 187
                    yield "                                            En attente
                                        ";
                }
                // line 189
                yield "                                    </span>
                                    ";
                // line 190
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 190)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 191
                    yield "                                        <span class=\"action-skill\">Module: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 191), "title", [], "any", false, false, false, 191), "html", null, true);
                    yield "</span>
                                    ";
                }
                // line 193
                yield "                                </div>
                                ";
                // line 194
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 194)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 195
                    yield "                                    <div class=\"mentor-comment\">
                                        <strong>Commentaire du tuteur:</strong>
                                        <p>";
                    // line 197
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 197), "html", null, true);
                    yield "</p>
                                    </div>
                                ";
                }
                // line 200
                yield "                                ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 200)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 201
                    yield "                                    <div class=\"mentor-comment\" style=\"background: #f8f9fa; border-left-color: #6c757d;\">
                                        <strong>Commentaire de l'apprenant:</strong>
                                        <p>";
                    // line 203
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 203), "html", null, true);
                    yield "</p>
                                    </div>
                                ";
                }
                // line 206
                yield "                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 209
            yield "                </div>
            ";
        } else {
            // line 211
            yield "                <div class=\"no-data\">
                    <p>Aucune action enregistrée dans ce carnet.</p>
                </div>
            ";
        }
        // line 215
        yield "        </div>
    </div>

    <!-- Page de signatures -->
    <div class=\"page-break\"></div>
    
    <div class=\"signature-page\">
        <div class=\"signature-header\">
            <h1>Validation du parcours de compagnonnage</h1>
            <div class=\"signature-subtitle\">
                <p>Certification de fin de formation pour <strong>";
        // line 225
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 225, $this->source); })()), "fullname", [], "any", false, false, false, 225), "html", null, true);
        yield "</strong></p>
                <p>Métier : ";
        // line 226
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 226, $this->source); })()), "job", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 226, $this->source); })()), "job", [], "any", false, false, false, 226), "name", [], "any", false, false, false, 226), "html", null, true)) : ("Non spécifié"));
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 226, $this->source); })()), "speciality", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 226, $this->source); })()), "speciality", [], "any", false, false, false, 226), "name", [], "any", false, false, false, 226), "html", null, true);
        }
        yield "</p>
            </div>
        </div>

        <div class=\"signature-content\">
            <div class=\"signature-text\">
                <p>Par la présente, nous certifions que l'apprenant mentionné ci-dessus a terminé avec succès son parcours de compagnonnage et a acquis toutes les compétences requises pour exercer son métier en autonomie.</p>
                <p>Cette certification atteste de la validation complète de tous les modules de formation par le tuteur référent.</p>
            </div>

            <div class=\"signatures-grid\">
                <div class=\"signature-block-large\">
                    <div class=\"signature-info\">
                        <h4>L'apprenant</h4>
                        <p>";
        // line 240
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 240, $this->source); })()), "fullname", [], "any", false, false, false, 240), "html", null, true);
        yield "</p>
                        <p class=\"signature-role\">Bénéficiaire de la formation</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>

                <div class=\"signature-block-large\" style=\"margin-top: 20px;\">
                    <div class=\"signature-info\">
                        <h4>Le tuteur</h4>
                        <p>";
        // line 252
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 252, $this->source); })()), "mentor", [], "any", false, false, false, 252)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 252, $this->source); })()), "mentor", [], "any", false, false, false, 252), "fullname", [], "any", false, false, false, 252), "html", null, true)) : ("Non assigné"));
        yield "</p>
                        <p class=\"signature-role\">Tuteur référent</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>

                <div class=\"signature-block-large\" style=\"margin-top: 20px;\">
                    <div class=\"signature-info\">
                        <h4>Le chef de service</h4>
                        <p>";
        // line 264
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 264, $this->source); })()), "service", [], "any", false, false, false, 264), "chef", [], "any", false, false, false, 264)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 264, $this->source); })()), "service", [], "any", false, false, false, 264), "chef", [], "any", false, false, false, 264), "html", null, true)) : (""));
        yield "</p>
                        <p class=\"signature-role\">Responsable de service</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"signature-footer\">
            <p>Document généré le ";
        // line 276
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date_generation"]) || array_key_exists("date_generation", $context) ? $context["date_generation"] : (function () { throw new RuntimeError('Variable "date_generation" does not exist.', 276, $this->source); })()), "d/m/Y à H:i"), "html", null, true);
        yield "</p>
        </div>
    </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pdf/workbook.html.twig";
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
        return array (  583 => 276,  568 => 264,  553 => 252,  538 => 240,  517 => 226,  513 => 225,  501 => 215,  495 => 211,  491 => 209,  483 => 206,  477 => 203,  473 => 201,  470 => 200,  464 => 197,  460 => 195,  458 => 194,  455 => 193,  449 => 191,  447 => 190,  444 => 189,  440 => 187,  436 => 185,  434 => 184,  431 => 183,  429 => 182,  425 => 181,  422 => 180,  416 => 178,  414 => 177,  410 => 176,  406 => 174,  402 => 172,  396 => 170,  394 => 169,  388 => 167,  385 => 166,  382 => 165,  379 => 164,  376 => 163,  373 => 162,  370 => 161,  366 => 160,  363 => 159,  361 => 158,  353 => 153,  341 => 143,  335 => 139,  332 => 138,  324 => 135,  309 => 133,  303 => 131,  300 => 130,  294 => 128,  292 => 127,  288 => 125,  284 => 123,  280 => 121,  278 => 120,  275 => 119,  273 => 118,  268 => 116,  260 => 114,  254 => 113,  251 => 112,  248 => 111,  245 => 110,  240 => 109,  237 => 108,  220 => 107,  215 => 105,  212 => 104,  207 => 103,  205 => 102,  193 => 95,  180 => 85,  161 => 73,  157 => 72,  153 => 71,  143 => 64,  136 => 60,  129 => 56,  122 => 52,  115 => 48,  108 => 44,  101 => 40,  94 => 36,  87 => 32,  62 => 9,  60 => 8,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Carnet de Compagnonnage - {{ user.fullname }}</title>
    <style>
        {% include 'pdf/css_workbook.twig' %}
    </style>
</head>
<body style=\"padding: 20px;\">
    <!-- Page de couverture -->
    <div class=\"cover-page\">
        <div class=\"cover-header\">
            <div class=\"company-logo\">
                <div class=\"logo-placeholder\">
                    <img src=\"images/logos/edf.png\" alt=\"Logo EDF\" style=\"width: 80px; height: 80px; object-fit: contain;\">
                </div>
            </div>
            <div class=\"document-title\">
                <h1>CARNET DE COMPAGNONNAGE</h1>
                <div class=\"subtitle\">Certificat de fin de formation</div>
            </div>
        </div>

        <div class=\"cover-content\">
            <div class=\"apprentice-info-full\">
                <h2>Informations de l'apprenant</h2>
                <div class=\"info-grid\">
                    <div class=\"info-row\">
                        <span class=\"label\">Nom complet :</span>
                        <span class=\"value\">{{ user.fullname }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">NNI :</span>
                        <span class=\"value\">{{ user.nni ?? 'Non renseigné' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Email :</span>
                        <span class=\"value\">{{ user.email }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Métier :</span>
                        <span class=\"value\">{{ user.job ? user.job.name : 'Non renseigné' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Spécialité :</span>
                        <span class=\"value\">{{ user.speciality ? user.speciality.name : 'Non renseigné' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Service :</span>
                        <span class=\"value\">{{ user.service ? user.service.name : 'Non renseigné' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Date d'embauche :</span>
                        <span class=\"value\">{{ user.hiringAt ? user.hiringAt|date('d/m/Y') : 'Non renseignée' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Tuteur :</span>
                        <span class=\"value\">{{ user.mentor ? user.mentor.fullname : 'Non assigné' }}</span>
                    </div>
                    <div class=\"info-row\">
                        <span class=\"label\">Date de fin de formation :</span>
                        <span class=\"value\">{{ user.hiringAt|date_modify(\"+364 days\")|date(\"d/m/Y\") }}</span>
                    </div>
                </div>
                
                <div class=\"completion-certificate\">
                    <div class=\"certificate-text\">
                        <p class=\"certificate-statement\">
                            Nous certifions que <strong>{{ user.fullname }}</strong> a terminé avec succès 
                            son parcours de professionalisation pour le métier de <strong>{{ user.job ? user.job.name : 'non spécifié' }}</strong>
                            {% if user.speciality %} avec spécialisation en <strong>{{ user.speciality.name }}</strong>{% endif %}.
                        </p>
                        <p class=\"certificate-validation\">
                            Toutes les compétences requises ont été acquises et validées par le tuteur référent.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"cover-footer\">
            <div class=\"generation-info\">
                <p>Document généré le {{ date_generation|date('d/m/Y à H:i') }}</p>
            </div>
        </div>
    </div>

    <!-- Pages de contenu -->
    <div class=\"content-page\">
        <div class=\"page-header\">
            <h1>Détail des compétences acquises</h1>
            <div class=\"header-info\">
                <span>{{ user.fullname }} - {{ user.job ? user.job.name : 'Métier non renseigné' }}</span>
            </div>
        </div>

        <div class=\"content-section\">
            <h2>Progression par domaine de compétences</h2>
            
            {% if logbook.themes is defined and logbook.themes|length > 0 %}
                {% for theme in logbook.themes %}
                    <div class=\"domain-section\">
                        <h3>{{ theme.title }}</h3>
                        <div class=\"skills-grid\">
                            {% for module in theme.modules %}
                                {% set action = null %}
                                {% for userAction in user.actions %}
                                    {% if userAction.module.id == module.id %}
                                        {% set action = userAction %}
                                    {% endif %}
                                {% endfor %}
                                <div class=\"skill-item {{ action and action.mentorValidatedAt ? 'completed' : 'pending' }}\" style=\"{{ not loop.last ? 'margin-bottom: 10px;' : '' }}\">
                                    <div class=\"skill-header\">
                                        <span class=\"skill-name\">{{ module.title }}</span>
                                        <span class=\"skill-status\">
                                            {% if action and action.mentorValidatedAt %}
                                                <span style=\"color: #28a745; font-weight: bold;\">[VALIDÉ]</span>
                                            {% elseif action and action.agentValidatedAt %}
                                                <span style=\"color:rgb(212, 159, 1);\">[EN ATTENTE]</span>
                                            {% else %}
                                                <span style=\"color: #6c757d;\">[EN COURS]</span>
                                            {% endif %}
                                        </span>
                                    </div>
                                    {% if module.description %}
                                        <p class=\"skill-description\">{{ module.description }}</p>
                                    {% endif %}
                                    {% if action and action.mentorValidatedAt %}
                                        <p class=\"completion-date\">Validée le {{ action.mentorValidatedAt|date('d/m/Y') }}</p>
                                    {% endif %}
                                </div>
                            {% endfor %}
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"no-data\">
                    <p>Aucun thème disponible dans ce carnet.</p>
                </div>
            {% endif %}
        </div>
    </div>

    <!-- Nouvelle page pour les actions -->
    <div class=\"page-break\"></div>
    
    <div class=\"content-page\">
        <div class=\"page-header\">
            <h1>Journal des actions réalisées</h1>
            <div class=\"header-info\">
                <span>{{ user.fullname }} - Période de formation</span>
            </div>
        </div>

        <div class=\"content-section\">
            {% if logbook.actions is defined and logbook.actions|length > 0 %}
                <div class=\"actions-timeline\">
                    {% for action in logbook.actions %}
                        {% set actionStatus = 'pending' %}
                        {% if action.mentorValidatedAt %}
                            {% set actionStatus = 'completed' %}
                        {% elseif action.agentValidatedAt %}
                            {% set actionStatus = 'in_progress' %}
                        {% endif %}
                        <div class=\"action-item {{ actionStatus }}\">
                            <div class=\"action-date\">
                                {% if action.agentValidatedAt %}
                                    {{ action.agentValidatedAt|date('d/m/Y') }}
                                {% else %}
                                    Non datée
                                {% endif %}
                            </div>
                            <div class=\"action-content\">
                                <h4>{{ action.module ? action.module.title : 'Action sans module' }}</h4>
                                {% if action.description %}
                                    <p class=\"action-description\">{{ action.description }}</p>
                                {% endif %}
                                <div class=\"action-meta\">
                                    <span class=\"action-status-badge status-{{ actionStatus }}\">
                                        {% if actionStatus == 'completed' %}
                                            Validée par le tuteur
                                        {% elseif actionStatus == 'in_progress' %}
                                            Auto-validée (en attente tuteur)
                                        {% else %}
                                            En attente
                                        {% endif %}
                                    </span>
                                    {% if action.module %}
                                        <span class=\"action-skill\">Module: {{ action.module.title }}</span>
                                    {% endif %}
                                </div>
                                {% if action.mentorComment %}
                                    <div class=\"mentor-comment\">
                                        <strong>Commentaire du tuteur:</strong>
                                        <p>{{ action.mentorComment }}</p>
                                    </div>
                                {% endif %}
                                {% if action.agentComment %}
                                    <div class=\"mentor-comment\" style=\"background: #f8f9fa; border-left-color: #6c757d;\">
                                        <strong>Commentaire de l'apprenant:</strong>
                                        <p>{{ action.agentComment }}</p>
                                    </div>
                                {% endif %}
                            </div>
                        </div>
                    {% endfor %}
                </div>
            {% else %}
                <div class=\"no-data\">
                    <p>Aucune action enregistrée dans ce carnet.</p>
                </div>
            {% endif %}
        </div>
    </div>

    <!-- Page de signatures -->
    <div class=\"page-break\"></div>
    
    <div class=\"signature-page\">
        <div class=\"signature-header\">
            <h1>Validation du parcours de compagnonnage</h1>
            <div class=\"signature-subtitle\">
                <p>Certification de fin de formation pour <strong>{{ user.fullname }}</strong></p>
                <p>Métier : {{ user.job ? user.job.name : 'Non spécifié' }}{% if user.speciality %} - {{ user.speciality.name }}{% endif %}</p>
            </div>
        </div>

        <div class=\"signature-content\">
            <div class=\"signature-text\">
                <p>Par la présente, nous certifions que l'apprenant mentionné ci-dessus a terminé avec succès son parcours de compagnonnage et a acquis toutes les compétences requises pour exercer son métier en autonomie.</p>
                <p>Cette certification atteste de la validation complète de tous les modules de formation par le tuteur référent.</p>
            </div>

            <div class=\"signatures-grid\">
                <div class=\"signature-block-large\">
                    <div class=\"signature-info\">
                        <h4>L'apprenant</h4>
                        <p>{{ user.fullname }}</p>
                        <p class=\"signature-role\">Bénéficiaire de la formation</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>

                <div class=\"signature-block-large\" style=\"margin-top: 20px;\">
                    <div class=\"signature-info\">
                        <h4>Le tuteur</h4>
                        <p>{{ user.mentor ? user.mentor.fullname : 'Non assigné' }}</p>
                        <p class=\"signature-role\">Tuteur référent</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>

                <div class=\"signature-block-large\" style=\"margin-top: 20px;\">
                    <div class=\"signature-info\">
                        <h4>Le chef de service</h4>
                        <p>{{ user.service.chef ?: '' }}</p>
                        <p class=\"signature-role\">Responsable de service</p>
                    </div>
                    <div class=\"signature-area\">
                        <div class=\"signature-line-large\"></div>
                        <p class=\"signature-label\">Signature et date</p>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"signature-footer\">
            <p>Document généré le {{ date_generation|date('d/m/Y à H:i') }}</p>
        </div>
    </div>
</body>
</html>", "pdf/workbook.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pdf/workbook.html.twig");
    }
}
