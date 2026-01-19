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

/* pdf/rgpd_export.html.twig */
class __TwigTemplate_fcf07f856f9bd6b8bfef58579a5693bc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/rgpd_export.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/rgpd_export.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Export de mes données personnelles</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #2c384e;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #3d5f9e;
        }
        .header h1 {
            color: #3d5f9e;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .header .subtitle {
            color: #6c757d;
            font-size: 12px;
        }
        .header .export-date {
            margin-top: 10px;
            font-size: 10px;
            color: #6c757d;
        }
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .section-title {
            background: #3d5f9e;
            color: white;
            padding: 8px 15px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-content {
            padding: 10px 15px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        .data-row {
            display: table;
            width: 100%;
            margin-bottom: 5px;
        }
        .data-label {
            display: table-cell;
            width: 40%;
            font-weight: bold;
            color: #3d5f9e;
            padding: 3px 0;
        }
        .data-value {
            display: table-cell;
            width: 60%;
            padding: 3px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th {
            background: #3d5f9e;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }
        table td {
            padding: 6px 8px;
            border-bottom: 1px solid #e9ecef;
            font-size: 10px;
        }
        table tr:nth-child(even) {
            background: #f8f9fa;
        }
        .no-data {
            color: #6c757d;
            font-style: italic;
            padding: 10px;
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            font-size: 9px;
            color: #6c757d;
        }
        .legal-notice {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 10px;
            margin-top: 20px;
            font-size: 9px;
        }
        .legal-notice strong {
            color: #856404;
        }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            background: #e9ecef;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Export de mes données personnelles</h1>
        <div class=\"subtitle\">Application GuideNouvelArrivant - EDF</div>
        <div class=\"export-date\">
            Document généré le ";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["exportDate"]) || array_key_exists("exportDate", $context) ? $context["exportDate"] : (function () { throw new RuntimeError('Variable "exportDate" does not exist.', 139, $this->source); })()), "d/m/Y à H:i", "Europe/Paris"), "html", null, true);
        yield "<br>
            Conformément au RGPD - Article 15 (Droit d'accès) et Article 20 (Droit à la portabilité)
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">1. Informations personnelles</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Nom :</span>
                <span class=\"data-value\">";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 149, $this->source); })()), "personal", [], "any", false, false, false, 149), "lastname", [], "any", false, false, false, 149)), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Prénom :</span>
                <span class=\"data-value\">";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 153, $this->source); })()), "personal", [], "any", false, false, false, 153), "firstname", [], "any", false, false, false, 153)), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Email professionnel :</span>
                <span class=\"data-value\">";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 157, $this->source); })()), "personal", [], "any", false, false, false, 157), "email", [], "any", false, false, false, 157), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">NNI :</span>
                <span class=\"data-value\">";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 161, $this->source); })()), "personal", [], "any", false, false, false, 161), "nni", [], "any", false, false, false, 161), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">2. Informations professionnelles</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Métier :</span>
                <span class=\"data-value\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 171, $this->source); })()), "professional", [], "any", false, false, false, 171), "job", [], "any", false, false, false, 171), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Spécialité :</span>
                <span class=\"data-value\">";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 175, $this->source); })()), "professional", [], "any", false, false, false, 175), "speciality", [], "any", false, false, false, 175), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Service :</span>
                <span class=\"data-value\">";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 179, $this->source); })()), "professional", [], "any", false, false, false, 179), "service", [], "any", false, false, false, 179), "html", null, true);
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Date d'embauche :</span>
                <span class=\"data-value\">";
        // line 183
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 183, $this->source); })()), "professional", [], "any", false, false, false, 183), "hiringAt", [], "any", false, false, false, 183)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 183, $this->source); })()), "professional", [], "any", false, false, false, 183), "hiringAt", [], "any", false, false, false, 183), "d/m/Y"), "html", null, true)) : ("Non renseignée"));
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Tuteur assigné :</span>
                <span class=\"data-value\">";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 187, $this->source); })()), "professional", [], "any", false, false, false, 187), "mentor", [], "any", false, false, false, 187), "html", null, true);
        yield "</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">3. Informations du compte</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Rôles :</span>
                <span class=\"data-value\">
                    ";
        // line 198
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 198, $this->source); })()), "account", [], "any", false, false, false, 198), "roles", [], "any", false, false, false, 198));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 199
            yield "                        <span class=\"badge\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["role"], "html", null, true);
            yield "</span>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 201
        yield "                </span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Date de création :</span>
                <span class=\"data-value\">";
        // line 205
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 205, $this->source); })()), "account", [], "any", false, false, false, 205), "createdAt", [], "any", false, false, false, 205)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 205, $this->source); })()), "account", [], "any", false, false, false, 205), "createdAt", [], "any", false, false, false, 205), "d/m/Y à H:i"), "html", null, true)) : ("Non disponible"));
        yield "</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Dernière connexion :</span>
                <span class=\"data-value\">";
        // line 209
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 209, $this->source); })()), "account", [], "any", false, false, false, 209), "lastLoginAt", [], "any", false, false, false, 209)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 209, $this->source); })()), "account", [], "any", false, false, false, 209), "lastLoginAt", [], "any", false, false, false, 209), "d/m/Y à H:i"), "html", null, true)) : ("Jamais connecté"));
        yield "</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">4. Carnets de bord (";
        // line 215
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 215, $this->source); })()), "logbooks", [], "any", false, false, false, 215)), "html", null, true);
        yield ")</div>
        <div class=\"section-content\">
            ";
        // line 217
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 217, $this->source); })()), "logbooks", [], "any", false, false, false, 217)) > 0)) {
            // line 218
            yield "                <table>
                    <thead>
                        <tr>
                            <th style=\"width: 70%\">Nom du carnet</th>
                            <th style=\"width: 30%\">Nombre de thèmes</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 226
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 226, $this->source); })()), "logbooks", [], "any", false, false, false, 226));
            foreach ($context['_seq'] as $context["_key"] => $context["logbook"]) {
                // line 227
                yield "                            <tr>
                                <td>";
                // line 228
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "name", [], "any", false, false, false, 228), "html", null, true);
                yield "</td>
                                <td>";
                // line 229
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["logbook"], "themesCount", [], "any", false, false, false, 229), "html", null, true);
                yield " thème(s)</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['logbook'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 232
            yield "                    </tbody>
                </table>
            ";
        } else {
            // line 235
            yield "                <div class=\"no-data\">Aucun carnet de bord associé</div>
            ";
        }
        // line 237
        yield "        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">5. Actions et validations (";
        // line 241
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 241, $this->source); })()), "actions", [], "any", false, false, false, 241)), "html", null, true);
        yield ")</div>
        <div class=\"section-content\">
            ";
        // line 243
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 243, $this->source); })()), "actions", [], "any", false, false, false, 243)) > 0)) {
            // line 244
            yield "                <table>
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Mon commentaire</th>
                            <th>Validé le</th>
                            <th>Commentaire mentor</th>
                            <th>Validé mentor</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 255
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 255, $this->source); })()), "actions", [], "any", false, false, false, 255));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 256
                yield "                            <tr>
                                <td>";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "module", [], "any", false, false, false, 257), "html", null, true);
                yield "</td>
                                <td>";
                // line 258
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", true, true, false, 258)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 258), "-")) : ("-")), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentComment", [], "any", false, false, false, 258)) > 50)) {
                    yield "...";
                }
                yield "</td>
                                <td>";
                // line 259
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 259)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "agentValidatedAt", [], "any", false, false, false, 259), "d/m/Y"), "html", null, true)) : ("-"));
                yield "</td>
                                <td>";
                // line 260
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", true, true, false, 260)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 260), "-")) : ("-")), 0, 50), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorComment", [], "any", false, false, false, 260)) > 50)) {
                    yield "...";
                }
                yield "</td>
                                <td>";
                // line 261
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorValidatedAt", [], "any", false, false, false, 261)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "mentorValidatedAt", [], "any", false, false, false, 261), "d/m/Y"), "html", null, true)) : ("-"));
                yield "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 264
            yield "                    </tbody>
                </table>
            ";
        } else {
            // line 267
            yield "                <div class=\"no-data\">Aucune action enregistrée</div>
            ";
        }
        // line 269
        yield "        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">6. Retours d'expérience (";
        // line 273
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 273, $this->source); })()), "feedbacks", [], "any", false, false, false, 273)), "html", null, true);
        yield ")</div>
        <div class=\"section-content\">
            ";
        // line 275
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 275, $this->source); })()), "feedbacks", [], "any", false, false, false, 275)) > 0)) {
            // line 276
            yield "                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 286
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 286, $this->source); })()), "feedbacks", [], "any", false, false, false, 286));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 287
                yield "                            <tr>
                                <td>";
                // line 288
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 288), "html", null, true);
                yield "</td>
                                <td>";
                // line 289
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 289), "html", null, true);
                yield "</td>
                                <td>";
                // line 290
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 290)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 290), "d/m/Y"), "html", null, true)) : ("-"));
                yield "</td>
                                <td>
                                    ";
                // line 292
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 292)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 293
                    yield "                                        <span class=\"badge badge-success\">Traité</span>
                                    ";
                } else {
                    // line 295
                    yield "                                        <span class=\"badge badge-warning\">En attente</span>
                                    ";
                }
                // line 297
                yield "                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 300
            yield "                    </tbody>
                </table>
            ";
        } else {
            // line 303
            yield "                <div class=\"no-data\">Aucun retour d'expérience soumis</div>
            ";
        }
        // line 305
        yield "        </div>
    </div>

    <div class=\"legal-notice\">
        <strong>Informations importantes :</strong><br>
        Ce document contient l'ensemble des données personnelles vous concernant stockées dans l'application GuideNouvelArrivant.
        Conformément au RGPD, vous disposez d'un droit de rectification, d'effacement et de limitation du traitement de ces données.
        Pour exercer ces droits, contactez le Délégué à la Protection des Données (DPO) de votre entité. Par défaut, vous avez la
        possibilité de contacter M. <span style=\"padding: 0 2px\">Pascal BRIFFARD.</span>    
    </div>

    <div class=\"footer\">
        <p>Document généré automatiquement par l'application GuideNouvelArrivant</p>
        <p>© EDF - Tous droits réservés - ";
        // line 318
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield "</p>
        <p style=\"margin-top: 5px;\">Ce document est confidentiel et destiné uniquement à la personne concernée.</p>
    </div>
</body>
</html>
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
        return "pdf/rgpd_export.html.twig";
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
        return array (  518 => 318,  503 => 305,  499 => 303,  494 => 300,  486 => 297,  482 => 295,  478 => 293,  476 => 292,  471 => 290,  467 => 289,  463 => 288,  460 => 287,  456 => 286,  444 => 276,  442 => 275,  437 => 273,  431 => 269,  427 => 267,  422 => 264,  413 => 261,  406 => 260,  402 => 259,  395 => 258,  391 => 257,  388 => 256,  384 => 255,  371 => 244,  369 => 243,  364 => 241,  358 => 237,  354 => 235,  349 => 232,  340 => 229,  336 => 228,  333 => 227,  329 => 226,  319 => 218,  317 => 217,  312 => 215,  303 => 209,  296 => 205,  290 => 201,  281 => 199,  277 => 198,  263 => 187,  256 => 183,  249 => 179,  242 => 175,  235 => 171,  222 => 161,  215 => 157,  208 => 153,  201 => 149,  188 => 139,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Export de mes données personnelles</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #2c384e;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #3d5f9e;
        }
        .header h1 {
            color: #3d5f9e;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .header .subtitle {
            color: #6c757d;
            font-size: 12px;
        }
        .header .export-date {
            margin-top: 10px;
            font-size: 10px;
            color: #6c757d;
        }
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        .section-title {
            background: #3d5f9e;
            color: white;
            padding: 8px 15px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-content {
            padding: 10px 15px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        .data-row {
            display: table;
            width: 100%;
            margin-bottom: 5px;
        }
        .data-label {
            display: table-cell;
            width: 40%;
            font-weight: bold;
            color: #3d5f9e;
            padding: 3px 0;
        }
        .data-value {
            display: table-cell;
            width: 60%;
            padding: 3px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th {
            background: #3d5f9e;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }
        table td {
            padding: 6px 8px;
            border-bottom: 1px solid #e9ecef;
            font-size: 10px;
        }
        table tr:nth-child(even) {
            background: #f8f9fa;
        }
        .no-data {
            color: #6c757d;
            font-style: italic;
            padding: 10px;
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            font-size: 9px;
            color: #6c757d;
        }
        .legal-notice {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 10px;
            margin-top: 20px;
            font-size: 9px;
        }
        .legal-notice strong {
            color: #856404;
        }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            background: #e9ecef;
        }
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Export de mes données personnelles</h1>
        <div class=\"subtitle\">Application GuideNouvelArrivant - EDF</div>
        <div class=\"export-date\">
            Document généré le {{ exportDate|date('d/m/Y à H:i', 'Europe/Paris') }}<br>
            Conformément au RGPD - Article 15 (Droit d'accès) et Article 20 (Droit à la portabilité)
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">1. Informations personnelles</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Nom :</span>
                <span class=\"data-value\">{{ data.personal.lastname|upper }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Prénom :</span>
                <span class=\"data-value\">{{ data.personal.firstname|capitalize }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Email professionnel :</span>
                <span class=\"data-value\">{{ data.personal.email }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">NNI :</span>
                <span class=\"data-value\">{{ data.personal.nni }}</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">2. Informations professionnelles</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Métier :</span>
                <span class=\"data-value\">{{ data.professional.job }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Spécialité :</span>
                <span class=\"data-value\">{{ data.professional.speciality }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Service :</span>
                <span class=\"data-value\">{{ data.professional.service }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Date d'embauche :</span>
                <span class=\"data-value\">{{ data.professional.hiringAt ? data.professional.hiringAt|date('d/m/Y') : 'Non renseignée' }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Tuteur assigné :</span>
                <span class=\"data-value\">{{ data.professional.mentor }}</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">3. Informations du compte</div>
        <div class=\"section-content\">
            <div class=\"data-row\">
                <span class=\"data-label\">Rôles :</span>
                <span class=\"data-value\">
                    {% for role in data.account.roles %}
                        <span class=\"badge\">{{ role }}</span>
                    {% endfor %}
                </span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Date de création :</span>
                <span class=\"data-value\">{{ data.account.createdAt ? data.account.createdAt|date('d/m/Y à H:i') : 'Non disponible' }}</span>
            </div>
            <div class=\"data-row\">
                <span class=\"data-label\">Dernière connexion :</span>
                <span class=\"data-value\">{{ data.account.lastLoginAt ? data.account.lastLoginAt|date('d/m/Y à H:i') : 'Jamais connecté' }}</span>
            </div>
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">4. Carnets de bord ({{ data.logbooks|length }})</div>
        <div class=\"section-content\">
            {% if data.logbooks|length > 0 %}
                <table>
                    <thead>
                        <tr>
                            <th style=\"width: 70%\">Nom du carnet</th>
                            <th style=\"width: 30%\">Nombre de thèmes</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for logbook in data.logbooks %}
                            <tr>
                                <td>{{ logbook.name }}</td>
                                <td>{{ logbook.themesCount }} thème(s)</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            {% else %}
                <div class=\"no-data\">Aucun carnet de bord associé</div>
            {% endif %}
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">5. Actions et validations ({{ data.actions|length }})</div>
        <div class=\"section-content\">
            {% if data.actions|length > 0 %}
                <table>
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Mon commentaire</th>
                            <th>Validé le</th>
                            <th>Commentaire mentor</th>
                            <th>Validé mentor</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for action in data.actions %}
                            <tr>
                                <td>{{ action.module }}</td>
                                <td>{{ action.agentComment|default('-')|slice(0, 50) }}{% if action.agentComment|length > 50 %}...{% endif %}</td>
                                <td>{{ action.agentValidatedAt ? action.agentValidatedAt|date('d/m/Y') : '-' }}</td>
                                <td>{{ action.mentorComment|default('-')|slice(0, 50) }}{% if action.mentorComment|length > 50 %}...{% endif %}</td>
                                <td>{{ action.mentorValidatedAt ? action.mentorValidatedAt|date('d/m/Y') : '-' }}</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            {% else %}
                <div class=\"no-data\">Aucune action enregistrée</div>
            {% endif %}
        </div>
    </div>

    <div class=\"section\">
        <div class=\"section-title\">6. Retours d'expérience ({{ data.feedbacks|length }})</div>
        <div class=\"section-content\">
            {% if data.feedbacks|length > 0 %}
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Date</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for feedback in data.feedbacks %}
                            <tr>
                                <td>{{ feedback.title }}</td>
                                <td>{{ feedback.category }}</td>
                                <td>{{ feedback.createdAt ? feedback.createdAt|date('d/m/Y') : '-' }}</td>
                                <td>
                                    {% if feedback.isReviewed %}
                                        <span class=\"badge badge-success\">Traité</span>
                                    {% else %}
                                        <span class=\"badge badge-warning\">En attente</span>
                                    {% endif %}
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            {% else %}
                <div class=\"no-data\">Aucun retour d'expérience soumis</div>
            {% endif %}
        </div>
    </div>

    <div class=\"legal-notice\">
        <strong>Informations importantes :</strong><br>
        Ce document contient l'ensemble des données personnelles vous concernant stockées dans l'application GuideNouvelArrivant.
        Conformément au RGPD, vous disposez d'un droit de rectification, d'effacement et de limitation du traitement de ces données.
        Pour exercer ces droits, contactez le Délégué à la Protection des Données (DPO) de votre entité. Par défaut, vous avez la
        possibilité de contacter M. <span style=\"padding: 0 2px\">Pascal BRIFFARD.</span>    
    </div>

    <div class=\"footer\">
        <p>Document généré automatiquement par l'application GuideNouvelArrivant</p>
        <p>© EDF - Tous droits réservés - {{ \"now\"|date('Y') }}</p>
        <p style=\"margin-top: 5px;\">Ce document est confidentiel et destiné uniquement à la personne concernée.</p>
    </div>
</body>
</html>
", "pdf/rgpd_export.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pdf/rgpd_export.html.twig");
    }
}
