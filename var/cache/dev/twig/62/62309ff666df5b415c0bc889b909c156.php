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

/* admin/logbook/edit.html.twig */
class __TwigTemplate_183a6b004c41051d933eea14cf90de40 extends Template
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
            'head_stylesheets' => [$this, 'block_head_stylesheets'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@!EasyAdmin/page/content.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/logbook/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/logbook/edit.html.twig"));

        $this->parent = $this->load("@!EasyAdmin/page/content.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_stylesheets"));

        // line 4
        yield "    ";
        yield from $this->yieldParentBlock("head_stylesheets", $context, $blocks);
        yield "
    <style>
        /* Variables de couleur */
        :root {
            --primary-color: #3d5f9e;
            --primary-light: rgba(61, 95, 158, 0.1);
            --primary-dark: #2c4878;
            --gray-200: #eaecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --body-bg: #f8f9fa;
        }

        .ls-1 {
            letter-spacing: 1px;
        }
        
        /* Card styles */
        .content-card {
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        /* Styles des modals de confirmation */
        .modal-confirm {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }
        
        .modal-confirm .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 1.2rem 1.5rem;
            position: relative;
        }
        
        .modal-confirm .modal-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .modal-confirm .modal-header .close {
            color: white;
            opacity: 0.8;
        }
        
        .modal-confirm .modal-title {
            font-weight: 600;
            letter-spacing: 0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .modal-confirm .modal-body {
            padding: 1.75rem;
            font-size: 0.95rem;
            color: var(--gray-800);
            background-color: #fff;
        }
        
        .modal-confirm .warning-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(231, 76, 60, 0.1);
            font-size: 2.5rem;
            color: #e74c3c;
            margin-bottom: 1.25rem;
            transition: all 0.3s ease;
        }
        
        .modal-confirm .warning-icon i {
            transform: scale(1);
            animation: pulseWarning 1s infinite alternate;
        }
        
        @keyframes pulseWarning {
            from { transform: scale(1); }
            to { transform: scale(1.05); }
        }
        
        .modal-confirm .warning-text {
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1.2rem;
            color: #e74c3c;
        }
        
        .modal-confirm .theme-title {
            display: inline-block;
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-weight: 500;
            padding: 0.3rem 0.8rem;
            border-radius: 30px;
            margin: 0.5rem 0 1rem;
            font-size: 0.95rem;
        }
        
        .modal-confirm .theme-stats {
            display: inline-block;
            background-color: rgba(52, 152, 219, 0.1);
            color: #3498db;
            font-weight: 500;
            padding: 0.2rem 0.7rem;
            border-radius: 4px;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .modal-confirm .danger-box {
            background-color: rgba(231, 76, 60, 0.07);
            border-left: 3px solid #e74c3c;
            padding: 0.75rem 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        .modal-confirm .modal-footer {
            border-top: none;
            padding: 0.5rem 1.5rem 1.5rem;
            justify-content: center;
            gap: 1rem;
            background-color: #f8f9fa;
        }
        
        .modal-confirm .btn-outline-secondary {
            border-color: var(--gray-400);
            color: var(--gray-700);
            padding: 0.5rem 1.25rem;
            transition: all 0.2s ease;
        }
        
        .modal-confirm .btn-outline-secondary:hover {
            background-color: var(--gray-200);
        }
        
        .modal-confirm .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 2px 5px rgba(231, 76, 60, 0.2);
            transition: all 0.2s ease;
        }
        
        .modal-confirm .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }
        
        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
        
        .header-bordered {
            position: relative;
            border-bottom: 1px solid var(--gray-300);
        }
        
        .header-bordered::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary-color);
            border-radius: 0 2px 2px 0;
        }
        
        /* Badge styles */
        .badge {
            font-weight: 500;
            padding: 0.4em 0.8em;
            border-radius: 30px;
            font-size: 0.8rem;
        }
        
        .stat-badge {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 0.6rem 1rem;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Table styles */
        .data-table {
            margin-bottom: 0;
        }
        
        .data-table thead th {
            font-weight: 600;
            color: var(--gray-700);
            border-bottom-width: 1px;
        }
        
        .data-table tbody tr {
            transition: background-color 0.15s;
        }
        
        .data-table tbody tr:hover {
            background-color: var(--primary-light);
        }
        
        /* Form styles */
        .select-container {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            border: 1px solid var(--gray-300);
        }
        
        .select-container::after {
            content: '\\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            pointer-events: none;
            font-size: 0.8rem;
            transition: transform 0.2s;
        }
        
        .select-container:focus-within::after {
            transform: translateY(-50%) rotate(180deg);
        }
        
        .form-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 12px 40px 12px 15px;
            background-color: #fff;
            border: none;
            width: 100%;
            font-size: 1rem;
            color: var(--gray-700);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .form-select:focus {
            box-shadow: none;
            border: none;
            outline: none;
        }
        
        .form-select option {
            padding: 10px;
            font-size: 0.95rem;
        }
        
        /* Button styles */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(61, 95, 158, 0.25);
        }
        
        .btn-outline-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.25);
            color: var(--gray-200) !important;
        }
        
        /* Form label styles */
        .form-label {
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }
        
        .form-label::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .form-text {
            font-size: 0.85rem;
            color: var(--gray-600) !important;
        .stat-badge i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 333
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_content"));

        // line 334
        yield "
    <div class=\"content-header mb-4\">
        <div class=\"d-flex flex-column flex-md-row align-items-md-center mb-3\">
            <div class=\"flex-grow-1\">
            <h1 class=\"fs-2 text-dark mb-0\" style=\"position: relative; padding-left: 15px;\">
                <span style=\"position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: var(--primary-color); border-radius: 3px;\"></span>
                <i class=\"fas fa-book-open me-2\" style=\"color: var(--primary-color);\"></i>
                Édition du carnet de ";
        // line 341
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 341, $this->source); })()), "owner", [], "any", false, false, false, 341)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 341, $this->source); })()), "owner", [], "any", false, false, false, 341), "fullName", [], "any", false, false, false, 341), "html", null, true)) : ("Sans propriétaire"));
        yield "
            </h1>
            </div>
        </div>
        <div class=\"d-flex justify-content-end mb-3\">
            <a class=\"btn btn-outline-secondary px-3 py-2\" href=\"";
        // line 346
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logbook_index", ["crudControllerFqcn" => "App\\Controller\\Admin\\Logbook\\LogbookCrudController"]);
        yield "\">
                <i class=\"fas fa-arrow-left me-2\"></i> 
                Retour à la liste
            </a>
        </div>
    </div>

    ";
        // line 354
        yield "    <div class=\"content-card card shadow-sm border-0 mb-4\">
        <div class=\"card-header bg-light py-3 header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-info-circle me-2\" style=\"color: var(--primary-color);\"></i>
                Informations générales
            </h5>
        </div>
        <div class=\"card-body py-4\">
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"d-flex flex-column\">
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Propriétaire :</span>
                            <span class=\"ms-1\">";
        // line 367
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 367, $this->source); })()), "owner", [], "any", false, false, false, 367)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 367, $this->source); })()), "owner", [], "any", false, false, false, 367), "fullName", [], "any", false, false, false, 367), "html", null, true)) : ("Non assigné"));
        yield "</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">NNI :</span>
                            <span class=\"ms-1\">";
        // line 371
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 371, $this->source); })()), "owner", [], "any", false, false, false, 371)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 371, $this->source); })()), "owner", [], "any", false, false, false, 371), "nni", [], "any", false, false, false, 371), "html", null, true)) : ("N/A"));
        yield "</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Métier :</span>
                            <span class=\"ms-1\">";
        // line 375
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 375, $this->source); })()), "owner", [], "any", false, false, false, 375), "job", [], "any", false, false, false, 375), "name", [], "any", false, false, false, 375), "html", null, true);
        yield "</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Service :</span>
                            <span class=\"ms-1\">";
        // line 379
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 379, $this->source); })()), "owner", [], "any", false, false, false, 379), "service", [], "any", false, false, false, 379), "name", [], "any", false, false, false, 379), "html", null, true);
        yield "</span>
                        </div>
                        <div>
                            <span class=\"text-muted fw-medium\">Date d'entrée :</span>
                            <span class=\"ms-1\">";
        // line 383
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 383, $this->source); })()), "owner", [], "any", false, false, false, 383), "hiringAt", [], "any", false, false, false, 383), "d/m/Y"), "html", null, true);
        yield "</span>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"d-flex align-items-center h-100\">
                        <div class=\"stat-badge\">
                            <i class=\"fas fa-layer-group\"></i>
                            ";
        // line 391
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 391, $this->source); })()), "themes", [], "any", false, false, false, 391)) < 2)) {
            // line 392
            yield "                                <span class=\"fw-medium\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 392, $this->source); })()), "themes", [], "any", false, false, false, 392)), "html", null, true);
            yield "</span> thème associé au carnet.
                            ";
        } else {
            // line 394
            yield "                                <span class=\"fw-medium\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 394, $this->source); })()), "themes", [], "any", false, false, false, 394)), "html", null, true);
            yield "</span> thèmes associés au carnet.
                            ";
        }
        // line 396
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 404
        yield "    <div class=\"content-card card shadow-sm border-0 mb-4\">
        <div class=\"card-header bg-light py-3 d-flex justify-content-between align-items-center header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-list-ul me-2\" style=\"color: var(--primary-color);\"></i>
                Thèmes associés
            </h5>
            ";
        // line 410
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 410, $this->source); })()), "themes", [], "any", false, false, false, 410)) < 2)) {
            // line 411
            yield "                <span class=\"badge fw-light text-white ls-1\" style=\"background-color: var(--primary-color);\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 411, $this->source); })()), "themes", [], "any", false, false, false, 411)), "html", null, true);
            yield " thème</span>
            ";
        } else {
            // line 413
            yield "                <span class=\"badge fw-light text-white ls-1\" style=\"background-color: var(--primary-color);\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 413, $this->source); })()), "themes", [], "any", false, false, false, 413)), "html", null, true);
            yield " thèmes</span>
            ";
        }
        // line 415
        yield "        </div>
        <div class=\"card-body py-4\">
            ";
        // line 417
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 417, $this->source); })()), "themes", [], "any", false, false, false, 417)) > 0)) {
            // line 418
            yield "                ";
            // line 419
            yield "                <div class=\"d-block d-lg-none\">
                    <div class=\"row row-cols-1 g-4\">
                        ";
            // line 421
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 421, $this->source); })()), "themes", [], "any", false, false, false, 421));
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
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 422
                yield "                            <div class=\"col\">
                                <div class=\"card h-100 border-0 shadow-sm theme-card\">
                                    <div class=\"card-body p-4\">
                                        <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                            <h5 class=\"card-title text-dark mb-0\">";
                // line 426
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 426), "html", null, true);
                yield "</h5>
                                            <span class=\"badge text-white ls-1 fw-light\" style=\"background-color: #17a2b8;\">
                                                <i class=\"fas fa-th-large me-1\"></i>
                                                ";
                // line 429
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 429)) > 2)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 429)) . " modules"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 429)) . " module"), "html", null, true)));
                yield "
                                            </span>
                                        </div>
                                        
                                        <p class=\"card-text mb-3\" style=\"font-size: 0.95rem; color: #2c384e;\">
                                            ";
                // line 434
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 434))) > 100)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 434)), 0, 100) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 434)), "html", null, true)));
                yield "
                                        </p>
                                        
                                        ";
                // line 437
                $context["hasActions"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["analyses"] ?? null), "analyse_actions", [], "any", false, true, false, 437), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 437), "toString", [], "any", false, false, false, 437), [], "array", false, true, false, 437), "has_actions", [], "any", true, true, false, 437)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["analyses"]) || array_key_exists("analyses", $context) ? $context["analyses"] : (function () { throw new RuntimeError('Variable "analyses" does not exist.', 437, $this->source); })()), "analyse_actions", [], "any", false, false, false, 437), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 437), "toString", [], "any", false, false, false, 437), [], "array", false, false, false, 437), "has_actions", [], "any", false, false, false, 437), false)) : (false));
                // line 438
                yield "                                        
                                        <div class=\"mb-4\">
                                            <span class=\"badge ";
                // line 440
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 440, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-warning-subtle text-warning-emphasis") : ("bg-danger-subtle text-danger-emphasis"));
                yield "\">
                                                <i class=\"fas ";
                // line 441
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 441, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("fa-exclamation-triangle") : ("fa-times-circle"));
                yield " me-1 opacity-75\"></i>
                                                ";
                // line 442
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 442, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Actions utilisateur présentes") : ("Aucune action utilisateur"));
                yield "
                                            </span>
                                        </div>
                                        
                                        <div class=\"d-flex justify-content-end\">
                                             <form method=\"post\" id=\"deleteTheme_";
                // line 447
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 447), ["-" => "_"]), "html", null, true);
                yield "\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logbook_remove_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 447, $this->source); })()), "id", [], "any", false, false, false, 447), "themeId" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 447)]), "html", null, true);
                yield "\">
                                                 <input type=\"hidden\" name=\"_token\" value=\"";
                // line 448
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken((("remove_theme" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 448, $this->source); })()), "id", [], "any", false, false, false, 448)) . CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 448))), "html", null, true);
                yield "\">
                                                 <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#confirmModal";
                // line 449
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 449), "html", null, true);
                yield "\">
                                                     <i class=\"fas fa-trash-alt me-1\"></i> Supprimer
                                                 </button>
                                             </form>
                                             
                                             <!-- Modal de confirmation -->
                                             <div class=\"modal fade\" id=\"confirmModal";
                // line 455
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 455), "html", null, true);
                yield "\" tabindex=\"-1\" aria-labelledby=\"confirmModalLabel";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 455), "html", null, true);
                yield "\" aria-hidden=\"true\">
                                                 <div class=\"modal-dialog modal-dialog-centered\">
                                                     <div class=\"modal-content modal-confirm\">
                                                         <div class=\"modal-header\">
                                                             <h5 class=\"modal-title text-white\" id=\"confirmModalLabel";
                // line 459
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 459), "html", null, true);
                yield "\">
                                                                 <i class=\"fas fa-exclamation-triangle me-2 text-warning\"></i>
                                                                 Confirmation de suppression
                                                             </h5>
                                                             <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                                                         </div>
                                                         <div class=\"modal-body text-center\">
                                                             <div class=\"warning-icon\">
                                                                 <i class=\"fas fa-trash-alt\"></i>
                                                             </div>
                                                             ";
                // line 469
                if ((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 469, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 470
                    yield "                                                             <div class=\"warning-text\">Suppression définitive</div>
                                                             <div class=\"theme-title\">
                                                                 <i class=\"fas fa-bookmark me-1\"></i> ";
                    // line 472
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 472), "html", null, true);
                    yield "
                                                             </div>
                                                             
                                                             <div class=\"row mb-3\">
                                                                 <div class=\"col-6\">
                                                                     <div class=\"theme-stats\">
                                                                         <i class=\"fas fa-layer-group me-1\"></i> ";
                    // line 478
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 478)), "html", null, true);
                    yield " modules
                                                                     </div>
                                                                 </div>
                                                                 <div class=\"col-6\">
                                                                     <div class=\"theme-stats\">
                                                                         <i class=\"fas fa-tasks me-1\"></i> Complété par ";
                    // line 483
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 483, $this->source); })()), "owner", [], "any", false, false, false, 483), "fullname", [], "any", false, false, false, 483), " ")), "html", null, true);
                    yield "
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             
                                                             <div class=\"danger-box\">
                                                                 <p class=\"mb-0\"><i class=\"fas fa-exclamation-circle me-1\"></i> La suppression entraînera la <strong>perte définitive</strong> des données suivantes :</p>
                                                                 <ul class=\"text-start mt-2 mb-1\">
                                                                     <li>Tous les modules associés (";
                    // line 491
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 491)), "html", null, true);
                    yield ")</li>
                                                                     <li>Toutes les actions complétées par l'utilisateur</li>
                                                                     <li>L'historique des modifications</li>
                                                                 </ul>
                                                             </div>
                                                             
                                                             <p class=\"mt-3 mb-0 fw-bold\">Cette opération ne peut pas être annulée.</p>
                                                             <p>Êtes-vous absolument certain de vouloir continuer ?</p>
                                                             ";
                } else {
                    // line 500
                    yield "                                                             <div class=\"warning-text\">Suppression de thème</div>
                                                             <div class=\"theme-title\">
                                                                 <i class=\"fas fa-bookmark me-1\"></i> ";
                    // line 502
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 502), "html", null, true);
                    yield "
                                                             </div>
                                                             
                                                             <p class=\"mb-3\">Ce thème ne contient aucune donnée utilisateur.</p>
                                                             
                                                             <div class=\"theme-stats mb-3\">
                                                                 <i class=\"fas fa-layer-group me-1\"></i> ";
                    // line 508
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 508)), "html", null, true);
                    yield " modules vides
                                                             </div>
                                                             
                                                             <p class=\"text-muted\"><small>Cette action est irréversible mais n'affectera pas les données utilisateur.</small></p>
                                                             ";
                }
                // line 513
                yield "                                                         </div>
                                                         <div class=\"modal-footer\">
                                                             <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                                                 <i class=\"fas fa-times me-1\"></i> Annuler
                                                             </button>
                                                             <button type=\"button\" class=\"btn btn-danger\" onclick=\"document.getElementById('deleteTheme_";
                // line 518
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 518), ["-" => "_"]), "html", null, true);
                yield "').submit();\">
                                                                 <i class=\"fas fa-trash-alt me-1\"></i> Confirmer la suppression
                                                             </button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                        </div>
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
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 530
            yield "                    </div>
                </div>
                
                ";
            // line 534
            yield "                <div class=\"d-none d-lg-block\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover align-middle data-table\" style=\"border-collapse: separate; border-spacing: 0;\">
                            <thead class=\"bg-light\">
                                <tr>
                                    <th class=\"py-3\">Titre</th>
                                    <th class=\"py-3\">Description</th>
                                    <th class=\"py-3 text-center\">Modules</th>
                                    <th class=\"py-3\">État des actions</th>
                                    <th class=\"py-3 text-end\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 547
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 547, $this->source); })()), "themes", [], "any", false, false, false, 547));
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
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 548
                yield "                                    <tr>
                                        <td class=\"fw-medium\">";
                // line 549
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 549), "html", null, true);
                yield "</td>
                                        <td style=\"max-width: 300px;\">
                                            <div class=\"text-truncate\" title=\"";
                // line 551
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 551)), "html", null, true);
                yield "\">
                                                ";
                // line 552
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 552))) > 100)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 552)), 0, 100) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 552)), "html", null, true)));
                yield "
                                            </div>
                                        </td>
                                        <td class=\"text-center\">
                                            <span class=\"badge text-white\" style=\"background-color: #17a2b8;\">
                                                ";
                // line 557
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 557)), "html", null, true);
                yield "
                                            </span>
                                        </td>
                                        <td>
                                            ";
                // line 561
                $context["hasActions"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["analyses"] ?? null), "analyse_actions", [], "any", false, true, false, 561), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 561), "toString", [], "any", false, false, false, 561), [], "array", false, true, false, 561), "has_actions", [], "any", true, true, false, 561)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["analyses"]) || array_key_exists("analyses", $context) ? $context["analyses"] : (function () { throw new RuntimeError('Variable "analyses" does not exist.', 561, $this->source); })()), "analyse_actions", [], "any", false, false, false, 561), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 561), "toString", [], "any", false, false, false, 561), [], "array", false, false, false, 561), "has_actions", [], "any", false, false, false, 561), false)) : (false));
                // line 562
                yield "                                            
                                            <span class=\"badge ";
                // line 563
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 563, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-warning-subtle text-warning-emphasis") : ("bg-danger-subtle text-danger-emphasis"));
                yield "\">
                                                <i class=\"fas ";
                // line 564
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 564, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("fa-exclamation-triangle") : ("fa-times-circle"));
                yield " me-1 opacity-75\"></i>
                                                ";
                // line 565
                yield (((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 565, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Actions utilisateur présentes") : ("Aucune action utilisateur"));
                yield "
                                            </span>
                                        </td>
                                         <td class=\"text-end\">
                                            <form method=\"post\" id=\"deleteThemeTable_";
                // line 569
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 569), ["-" => "_"]), "html", null, true);
                yield "\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logbook_remove_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 569, $this->source); })()), "id", [], "any", false, false, false, 569), "themeId" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 569)]), "html", null, true);
                yield "\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 570
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken((("remove_theme" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 570, $this->source); })()), "id", [], "any", false, false, false, 570)) . CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 570))), "html", null, true);
                yield "\">
                                                <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#confirmModalTable";
                // line 571
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 571), "html", null, true);
                yield "\">
                                                    <i class=\"fas fa-trash-alt me-1\"></i> Supprimer
                                                </button>
                                            </form>
                                            
                                            <!-- Modal de confirmation -->
                                            <div class=\"modal fade\" id=\"confirmModalTable";
                // line 577
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 577), "html", null, true);
                yield "\" tabindex=\"-1\" aria-labelledby=\"confirmModalTableLabel";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 577), "html", null, true);
                yield "\" aria-hidden=\"true\">
                                                <div class=\"modal-dialog modal-dialog-centered\">
                                                    <div class=\"modal-content modal-confirm\">
                                                        <div class=\"modal-header\">
                                                            <h5 class=\"modal-title text-white\" id=\"confirmModalTableLabel";
                // line 581
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 581), "html", null, true);
                yield "\">
                                                                <i class=\"fas fa-exclamation-triangle me-2 text-warning\"></i>
                                                                Confirmation de suppression
                                                            </h5>
                                                            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                                                        </div>
                                                        <div class=\"modal-body text-center\">
                                                             <div class=\"warning-icon\">
                                                                 <i class=\"fas fa-trash-alt\"></i>
                                                             </div>
                                                             ";
                // line 591
                if ((($tmp = (isset($context["hasActions"]) || array_key_exists("hasActions", $context) ? $context["hasActions"] : (function () { throw new RuntimeError('Variable "hasActions" does not exist.', 591, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 592
                    yield "                                                             <div class=\"warning-text\">Suppression définitive</div>
                                                             <div class=\"theme-title\">
                                                                <i class=\"fas fa-bookmark me-1\"></i> ";
                    // line 594
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 594), "html", null, true);
                    yield "
                                                             </div>
                                                             
                                                             <div class=\"row mb-3\">
                                                                <div class=\"col-6\">
                                                                    <div class=\"theme-stats\">
                                                                        <i class=\"fas fa-layer-group me-1\"></i> ";
                    // line 600
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 600)), "html", null, true);
                    yield " modules
                                                                    </div>
                                                                </div>
                                                                <div class=\"col-6\">
                                                                    <div class=\"theme-stats\">
                                                                        <i class=\"fas fa-tasks me-1\"></i> Complété par ";
                    // line 605
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 605, $this->source); })()), "owner", [], "any", false, false, false, 605), "fullname", [], "any", false, false, false, 605), " ")), "html", null, true);
                    yield "
                                                                    </div>
                                                                </div>
                                                             </div>
                                                             
                                                             <div class=\"danger-box\">
                                                                <p class=\"mb-0\"><i class=\"fas fa-exclamation-circle me-1\"></i> La suppression entraînera la <strong>perte définitive</strong> des données suivantes :</p>
                                                                <ul class=\"text-start mt-2 mb-1\">
                                                                    <li>Tous les modules associés (";
                    // line 613
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 613)), "html", null, true);
                    yield ")</li>
                                                                    <li>Toutes les actions complétées par l'utilisateur</li>
                                                                    <li>L'historique des modifications</li>
                                                                </ul>
                                                             </div>
                                                             
                                                             <p class=\"mt-3 mb-0 fw-bold\">Cette opération ne peut pas être annulée.</p>
                                                             <p>Êtes-vous absolument certain de vouloir continuer ?</p>
                                                             ";
                } else {
                    // line 622
                    yield "                                                             <div class=\"warning-text\">Suppression de thème</div>
                                                             <div class=\"theme-title\">
                                                                <i class=\"fas fa-bookmark me-1\"></i> ";
                    // line 624
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 624), "html", null, true);
                    yield "
                                                             </div>
                                                             
                                                             <p class=\"mb-3\">Ce thème ne contient aucune donnée utilisateur.</p>
                                                             
                                                             <div class=\"theme-stats mb-3\">
                                                                <i class=\"fas fa-layer-group me-1\"></i> ";
                    // line 630
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 630)), "html", null, true);
                    yield " modules vides
                                                             </div>
                                                             
                                                             <p class=\"text-muted\"><small>Cette action est irréversible mais n'affectera pas les données utilisateur.</small></p>
                                                             ";
                }
                // line 635
                yield "                                                         </div>
                                                        <div class=\"modal-footer\">
                                                            <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                                                <i class=\"fas fa-times me-1\"></i> Annuler
                                                            </button>
                                                            <button type=\"button\" class=\"btn btn-danger\" onclick=\"document.getElementById('deleteThemeTable_";
                // line 640
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "id", [], "any", false, false, false, 640), ["-" => "_"]), "html", null, true);
                yield "').submit();\">
                                                                <i class=\"fas fa-trash-alt me-1\"></i> Confirmer la suppression
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 650
            yield "                            </tbody>
                        </table>
                    </div>
                </div>

            ";
        } else {
            // line 656
            yield "                <div class=\"alert alert-info d-flex align-items-center p-4\" role=\"alert\" style=\"background-color: var(--primary-light); color: var(--primary-color); border: none; border-left: 4px solid var(--primary-color);\">
                    <i class=\"fas fa-info-circle fs-5 me-3\"></i>
                    <div>
                        Aucun thème n'est associé à ce carnet. Utilisez le formulaire ci-dessous pour ajouter des thèmes.
                    </div>
                </div>
            ";
        }
        // line 663
        yield "        </div>
    </div>

    ";
        // line 667
        yield "    <div class=\"content-card card shadow-sm border-0 mt-4\">
        <div class=\"card-header bg-light py-3 header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-plus-circle me-2\" style=\"color: var(--primary-color);\"></i>
                Ajouter des thèmes
            </h5>
        </div>
        <div class=\"card-body p-4\">
            ";
        // line 675
        if ((($tmp = (isset($context["hasAvailableThemes"]) || array_key_exists("hasAvailableThemes", $context) ? $context["hasAvailableThemes"] : (function () { throw new RuntimeError('Variable "hasAvailableThemes" does not exist.', 675, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 676
            yield "                ";
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 676, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation"]]);
            yield "
                    ";
            // line 677
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 677, $this->source); })()), 'errors')) > 0)) {
                // line 678
                yield "                        <div class=\"alert alert-danger mb-4\">
                            <i class=\"fas fa-exclamation-triangle me-2\"></i>
                            ";
                // line 680
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 680, $this->source); })()), 'errors');
                yield "
                        </div>
                    ";
            }
            // line 683
            yield "                    
                    <div class=\"row g-4\">
                        <div class=\"col-12\">
                            <div class=\"form-group\">
                                <label class=\"form-label fw-semibold mb-3 ps-1\">";
            // line 687
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 687, $this->source); })()), "themes", [], "any", false, false, false, 687), 'label');
            yield "</label>
                                <div class=\"select-container\">
                                    ";
            // line 689
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 689, $this->source); })()), "themes", [], "any", false, false, false, 689), 'widget', ["attr" => ["class" => "form-select", "data-placeholder" => "Sélectionnez les thèmes à ajouter"]]);
            // line 694
            yield "
                                </div>
                                <div class=\"form-text mt-2 ps-1\">
                                    <i class=\"fas fa-lightbulb me-1\"></i>
                                    Seuls les thèmes qui ne sont pas encore associés au carnet sont disponibles.
                                </div>
                            </div>
                            ";
            // line 701
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 701, $this->source); })()), "_token", [], "any", false, false, false, 701), 'row');
            yield "
                        </div>
                    </div>
                    
                    <div class=\"d-flex justify-content-end mt-4\">
                        <button type=\"submit\" class=\"btn btn-primary px-4 py-2 d-flex align-items-center\">
                            <i class=\"fas fa-plus-circle me-2\"></i> Ajouter au carnet
                        </button>
                    </div>
                ";
            // line 710
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 710, $this->source); })()), 'form_end', ["render_rest" => false]);
            yield "
            ";
        } else {
            // line 712
            yield "                <div class=\"alert d-flex align-items-center p-4\" role=\"alert\" 
                     style=\"background-color: rgba(25, 135, 84, 0.1); color: #198754; border: none; border-left: 4px solid #198754;\">
                    <i class=\"fas fa-check-circle fs-4 me-3\"></i>
                    <div>
                        <h6 class=\"alert-heading mb-1 fw-bold\">Plus aucun thème n'est disponible pour ce carnet</h6>
                        <p class=\"mb-0\">Tous les thèmes sont déjà associés.</p>
                    </div>
                </div>
            ";
        }
        // line 721
        yield "        </div>
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
        return "admin/logbook/edit.html.twig";
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
        return array (  1098 => 721,  1087 => 712,  1082 => 710,  1070 => 701,  1061 => 694,  1059 => 689,  1054 => 687,  1048 => 683,  1042 => 680,  1038 => 678,  1036 => 677,  1031 => 676,  1029 => 675,  1019 => 667,  1014 => 663,  1005 => 656,  997 => 650,  973 => 640,  966 => 635,  958 => 630,  949 => 624,  945 => 622,  933 => 613,  922 => 605,  914 => 600,  905 => 594,  901 => 592,  899 => 591,  886 => 581,  877 => 577,  868 => 571,  864 => 570,  858 => 569,  851 => 565,  847 => 564,  843 => 563,  840 => 562,  838 => 561,  831 => 557,  823 => 552,  819 => 551,  814 => 549,  811 => 548,  794 => 547,  779 => 534,  774 => 530,  748 => 518,  741 => 513,  733 => 508,  724 => 502,  720 => 500,  708 => 491,  697 => 483,  689 => 478,  680 => 472,  676 => 470,  674 => 469,  661 => 459,  652 => 455,  643 => 449,  639 => 448,  633 => 447,  625 => 442,  621 => 441,  617 => 440,  613 => 438,  611 => 437,  605 => 434,  597 => 429,  591 => 426,  585 => 422,  568 => 421,  564 => 419,  562 => 418,  560 => 417,  556 => 415,  550 => 413,  544 => 411,  542 => 410,  534 => 404,  525 => 396,  519 => 394,  513 => 392,  511 => 391,  500 => 383,  493 => 379,  486 => 375,  479 => 371,  472 => 367,  457 => 354,  447 => 346,  439 => 341,  430 => 334,  417 => 333,  77 => 4,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@!EasyAdmin/page/content.html.twig' %}

{% block head_stylesheets %}
    {{ parent() }}
    <style>
        /* Variables de couleur */
        :root {
            --primary-color: #3d5f9e;
            --primary-light: rgba(61, 95, 158, 0.1);
            --primary-dark: #2c4878;
            --gray-200: #eaecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --body-bg: #f8f9fa;
        }

        .ls-1 {
            letter-spacing: 1px;
        }
        
        /* Card styles */
        .content-card {
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        /* Styles des modals de confirmation */
        .modal-confirm {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }
        
        .modal-confirm .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 1.2rem 1.5rem;
            position: relative;
        }
        
        .modal-confirm .modal-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .modal-confirm .modal-header .close {
            color: white;
            opacity: 0.8;
        }
        
        .modal-confirm .modal-title {
            font-weight: 600;
            letter-spacing: 0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .modal-confirm .modal-body {
            padding: 1.75rem;
            font-size: 0.95rem;
            color: var(--gray-800);
            background-color: #fff;
        }
        
        .modal-confirm .warning-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(231, 76, 60, 0.1);
            font-size: 2.5rem;
            color: #e74c3c;
            margin-bottom: 1.25rem;
            transition: all 0.3s ease;
        }
        
        .modal-confirm .warning-icon i {
            transform: scale(1);
            animation: pulseWarning 1s infinite alternate;
        }
        
        @keyframes pulseWarning {
            from { transform: scale(1); }
            to { transform: scale(1.05); }
        }
        
        .modal-confirm .warning-text {
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1.2rem;
            color: #e74c3c;
        }
        
        .modal-confirm .theme-title {
            display: inline-block;
            background-color: var(--primary-light);
            color: var(--primary-color);
            font-weight: 500;
            padding: 0.3rem 0.8rem;
            border-radius: 30px;
            margin: 0.5rem 0 1rem;
            font-size: 0.95rem;
        }
        
        .modal-confirm .theme-stats {
            display: inline-block;
            background-color: rgba(52, 152, 219, 0.1);
            color: #3498db;
            font-weight: 500;
            padding: 0.2rem 0.7rem;
            border-radius: 4px;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .modal-confirm .danger-box {
            background-color: rgba(231, 76, 60, 0.07);
            border-left: 3px solid #e74c3c;
            padding: 0.75rem 1rem;
            margin: 1rem 0;
            border-radius: 0 4px 4px 0;
        }
        
        .modal-confirm .modal-footer {
            border-top: none;
            padding: 0.5rem 1.5rem 1.5rem;
            justify-content: center;
            gap: 1rem;
            background-color: #f8f9fa;
        }
        
        .modal-confirm .btn-outline-secondary {
            border-color: var(--gray-400);
            color: var(--gray-700);
            padding: 0.5rem 1.25rem;
            transition: all 0.2s ease;
        }
        
        .modal-confirm .btn-outline-secondary:hover {
            background-color: var(--gray-200);
        }
        
        .modal-confirm .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 2px 5px rgba(231, 76, 60, 0.2);
            transition: all 0.2s ease;
        }
        
        .modal-confirm .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }
        
        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
        
        .header-bordered {
            position: relative;
            border-bottom: 1px solid var(--gray-300);
        }
        
        .header-bordered::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary-color);
            border-radius: 0 2px 2px 0;
        }
        
        /* Badge styles */
        .badge {
            font-weight: 500;
            padding: 0.4em 0.8em;
            border-radius: 30px;
            font-size: 0.8rem;
        }
        
        .stat-badge {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 0.6rem 1rem;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Table styles */
        .data-table {
            margin-bottom: 0;
        }
        
        .data-table thead th {
            font-weight: 600;
            color: var(--gray-700);
            border-bottom-width: 1px;
        }
        
        .data-table tbody tr {
            transition: background-color 0.15s;
        }
        
        .data-table tbody tr:hover {
            background-color: var(--primary-light);
        }
        
        /* Form styles */
        .select-container {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            border: 1px solid var(--gray-300);
        }
        
        .select-container::after {
            content: '\\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            pointer-events: none;
            font-size: 0.8rem;
            transition: transform 0.2s;
        }
        
        .select-container:focus-within::after {
            transform: translateY(-50%) rotate(180deg);
        }
        
        .form-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 12px 40px 12px 15px;
            background-color: #fff;
            border: none;
            width: 100%;
            font-size: 1rem;
            color: var(--gray-700);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .form-select:focus {
            box-shadow: none;
            border: none;
            outline: none;
        }
        
        .form-select option {
            padding: 10px;
            font-size: 0.95rem;
        }
        
        /* Button styles */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(61, 95, 158, 0.25);
        }
        
        .btn-outline-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.25);
            color: var(--gray-200) !important;
        }
        
        /* Form label styles */
        .form-label {
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }
        
        .form-label::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .form-text {
            font-size: 0.85rem;
            color: var(--gray-600) !important;
        .stat-badge i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }
    </style>
{% endblock %}

{% block page_content %}

    <div class=\"content-header mb-4\">
        <div class=\"d-flex flex-column flex-md-row align-items-md-center mb-3\">
            <div class=\"flex-grow-1\">
            <h1 class=\"fs-2 text-dark mb-0\" style=\"position: relative; padding-left: 15px;\">
                <span style=\"position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background-color: var(--primary-color); border-radius: 3px;\"></span>
                <i class=\"fas fa-book-open me-2\" style=\"color: var(--primary-color);\"></i>
                Édition du carnet de {{ logbook.owner ? logbook.owner.fullName : 'Sans propriétaire' }}
            </h1>
            </div>
        </div>
        <div class=\"d-flex justify-content-end mb-3\">
            <a class=\"btn btn-outline-secondary px-3 py-2\" href=\"{{ path('admin_logbook_index', {'crudControllerFqcn': 'App\\\\Controller\\\\Admin\\\\Logbook\\\\LogbookCrudController'}) }}\">
                <i class=\"fas fa-arrow-left me-2\"></i> 
                Retour à la liste
            </a>
        </div>
    </div>

    {# Informations propriétaire du carnet #}
    <div class=\"content-card card shadow-sm border-0 mb-4\">
        <div class=\"card-header bg-light py-3 header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-info-circle me-2\" style=\"color: var(--primary-color);\"></i>
                Informations générales
            </h5>
        </div>
        <div class=\"card-body py-4\">
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"d-flex flex-column\">
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Propriétaire :</span>
                            <span class=\"ms-1\">{{ logbook.owner ? logbook.owner.fullName : 'Non assigné' }}</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">NNI :</span>
                            <span class=\"ms-1\">{{ logbook.owner ? logbook.owner.nni : 'N/A' }}</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Métier :</span>
                            <span class=\"ms-1\">{{ logbook.owner.job.name }}</span>
                        </div>
                        <div class=\"mb-2\">
                            <span class=\"text-muted fw-medium\">Service :</span>
                            <span class=\"ms-1\">{{ logbook.owner.service.name }}</span>
                        </div>
                        <div>
                            <span class=\"text-muted fw-medium\">Date d'entrée :</span>
                            <span class=\"ms-1\">{{ logbook.owner.hiringAt|date('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"d-flex align-items-center h-100\">
                        <div class=\"stat-badge\">
                            <i class=\"fas fa-layer-group\"></i>
                            {% if logbook.themes|length < 2 %}
                                <span class=\"fw-medium\">{{ logbook.themes|length }}</span> thème associé au carnet.
                            {% else %}
                                <span class=\"fw-medium\">{{ logbook.themes|length }}</span> thèmes associés au carnet.
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {# Thèmes associés au carnet #}
    <div class=\"content-card card shadow-sm border-0 mb-4\">
        <div class=\"card-header bg-light py-3 d-flex justify-content-between align-items-center header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-list-ul me-2\" style=\"color: var(--primary-color);\"></i>
                Thèmes associés
            </h5>
            {% if logbook.themes|length < 2 %}
                <span class=\"badge fw-light text-white ls-1\" style=\"background-color: var(--primary-color);\">{{ logbook.themes|length }} thème</span>
            {% else %}
                <span class=\"badge fw-light text-white ls-1\" style=\"background-color: var(--primary-color);\">{{ logbook.themes|length }} thèmes</span>
            {% endif %}
        </div>
        <div class=\"card-body py-4\">
            {% if logbook.themes|length > 0 %}
                {# Vue mobile (cartes) #}
                <div class=\"d-block d-lg-none\">
                    <div class=\"row row-cols-1 g-4\">
                        {% for theme in logbook.themes %}
                            <div class=\"col\">
                                <div class=\"card h-100 border-0 shadow-sm theme-card\">
                                    <div class=\"card-body p-4\">
                                        <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                            <h5 class=\"card-title text-dark mb-0\">{{ theme.title }}</h5>
                                            <span class=\"badge text-white ls-1 fw-light\" style=\"background-color: #17a2b8;\">
                                                <i class=\"fas fa-th-large me-1\"></i>
                                                {{ theme.modules|length > 2 ? theme.modules|length ~ ' modules' : theme.modules|length ~ ' module' }}
                                            </span>
                                        </div>
                                        
                                        <p class=\"card-text mb-3\" style=\"font-size: 0.95rem; color: #2c384e;\">
                                            {{ theme.description|striptags|length > 100 ? theme.description|striptags|slice(0, 100) ~ '...' : theme.description|striptags }}
                                        </p>
                                        
                                        {% set hasActions = analyses.analyse_actions[theme.id.toString].has_actions|default(false) %}
                                        
                                        <div class=\"mb-4\">
                                            <span class=\"badge {{ hasActions ? 'bg-warning-subtle text-warning-emphasis' : 'bg-danger-subtle text-danger-emphasis' }}\">
                                                <i class=\"fas {{ hasActions ? 'fa-exclamation-triangle' : 'fa-times-circle' }} me-1 opacity-75\"></i>
                                                {{ hasActions ? 'Actions utilisateur présentes' : 'Aucune action utilisateur' }}
                                            </span>
                                        </div>
                                        
                                        <div class=\"d-flex justify-content-end\">
                                             <form method=\"post\" id=\"deleteTheme_{{ theme.id | replace({'-': '_'}) }}\" action=\"{{ path('admin_logbook_remove_theme', {'id': logbook.id, 'themeId': theme.id}) }}\">
                                                 <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('remove_theme' ~ logbook.id ~ theme.id) }}\">
                                                 <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#confirmModal{{ loop.index }}\">
                                                     <i class=\"fas fa-trash-alt me-1\"></i> Supprimer
                                                 </button>
                                             </form>
                                             
                                             <!-- Modal de confirmation -->
                                             <div class=\"modal fade\" id=\"confirmModal{{ loop.index }}\" tabindex=\"-1\" aria-labelledby=\"confirmModalLabel{{ loop.index }}\" aria-hidden=\"true\">
                                                 <div class=\"modal-dialog modal-dialog-centered\">
                                                     <div class=\"modal-content modal-confirm\">
                                                         <div class=\"modal-header\">
                                                             <h5 class=\"modal-title text-white\" id=\"confirmModalLabel{{ loop.index }}\">
                                                                 <i class=\"fas fa-exclamation-triangle me-2 text-warning\"></i>
                                                                 Confirmation de suppression
                                                             </h5>
                                                             <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                                                         </div>
                                                         <div class=\"modal-body text-center\">
                                                             <div class=\"warning-icon\">
                                                                 <i class=\"fas fa-trash-alt\"></i>
                                                             </div>
                                                             {% if hasActions %}
                                                             <div class=\"warning-text\">Suppression définitive</div>
                                                             <div class=\"theme-title\">
                                                                 <i class=\"fas fa-bookmark me-1\"></i> {{ theme.title }}
                                                             </div>
                                                             
                                                             <div class=\"row mb-3\">
                                                                 <div class=\"col-6\">
                                                                     <div class=\"theme-stats\">
                                                                         <i class=\"fas fa-layer-group me-1\"></i> {{ theme.modules|length }} modules
                                                                     </div>
                                                                 </div>
                                                                 <div class=\"col-6\">
                                                                     <div class=\"theme-stats\">
                                                                         <i class=\"fas fa-tasks me-1\"></i> Complété par {{ logbook.owner.fullname|split(' ')|first }}
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             
                                                             <div class=\"danger-box\">
                                                                 <p class=\"mb-0\"><i class=\"fas fa-exclamation-circle me-1\"></i> La suppression entraînera la <strong>perte définitive</strong> des données suivantes :</p>
                                                                 <ul class=\"text-start mt-2 mb-1\">
                                                                     <li>Tous les modules associés ({{ theme.modules|length }})</li>
                                                                     <li>Toutes les actions complétées par l'utilisateur</li>
                                                                     <li>L'historique des modifications</li>
                                                                 </ul>
                                                             </div>
                                                             
                                                             <p class=\"mt-3 mb-0 fw-bold\">Cette opération ne peut pas être annulée.</p>
                                                             <p>Êtes-vous absolument certain de vouloir continuer ?</p>
                                                             {% else %}
                                                             <div class=\"warning-text\">Suppression de thème</div>
                                                             <div class=\"theme-title\">
                                                                 <i class=\"fas fa-bookmark me-1\"></i> {{ theme.title }}
                                                             </div>
                                                             
                                                             <p class=\"mb-3\">Ce thème ne contient aucune donnée utilisateur.</p>
                                                             
                                                             <div class=\"theme-stats mb-3\">
                                                                 <i class=\"fas fa-layer-group me-1\"></i> {{ theme.modules|length }} modules vides
                                                             </div>
                                                             
                                                             <p class=\"text-muted\"><small>Cette action est irréversible mais n'affectera pas les données utilisateur.</small></p>
                                                             {% endif %}
                                                         </div>
                                                         <div class=\"modal-footer\">
                                                             <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                                                 <i class=\"fas fa-times me-1\"></i> Annuler
                                                             </button>
                                                             <button type=\"button\" class=\"btn btn-danger\" onclick=\"document.getElementById('deleteTheme_{{ theme.id | replace({'-': '_'}) }}').submit();\">
                                                                 <i class=\"fas fa-trash-alt me-1\"></i> Confirmer la suppression
                                                             </button>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
                
                {# Vue desktop (tableau) #}
                <div class=\"d-none d-lg-block\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover align-middle data-table\" style=\"border-collapse: separate; border-spacing: 0;\">
                            <thead class=\"bg-light\">
                                <tr>
                                    <th class=\"py-3\">Titre</th>
                                    <th class=\"py-3\">Description</th>
                                    <th class=\"py-3 text-center\">Modules</th>
                                    <th class=\"py-3\">État des actions</th>
                                    <th class=\"py-3 text-end\">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for theme in logbook.themes %}
                                    <tr>
                                        <td class=\"fw-medium\">{{ theme.title }}</td>
                                        <td style=\"max-width: 300px;\">
                                            <div class=\"text-truncate\" title=\"{{ theme.description|striptags }}\">
                                                {{ theme.description|striptags|length > 100 ? theme.description|striptags|slice(0, 100) ~ '...' : theme.description|striptags }}
                                            </div>
                                        </td>
                                        <td class=\"text-center\">
                                            <span class=\"badge text-white\" style=\"background-color: #17a2b8;\">
                                                {{ theme.modules|length }}
                                            </span>
                                        </td>
                                        <td>
                                            {% set hasActions = analyses.analyse_actions[theme.id.toString].has_actions|default(false) %}
                                            
                                            <span class=\"badge {{ hasActions ? 'bg-warning-subtle text-warning-emphasis' : 'bg-danger-subtle text-danger-emphasis' }}\">
                                                <i class=\"fas {{ hasActions ? 'fa-exclamation-triangle' : 'fa-times-circle' }} me-1 opacity-75\"></i>
                                                {{ hasActions ? 'Actions utilisateur présentes' : 'Aucune action utilisateur' }}
                                            </span>
                                        </td>
                                         <td class=\"text-end\">
                                            <form method=\"post\" id=\"deleteThemeTable_{{ theme.id | replace({'-': '_'}) }}\" action=\"{{ path('admin_logbook_remove_theme', {'id': logbook.id, 'themeId': theme.id}) }}\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('remove_theme' ~ logbook.id ~ theme.id) }}\">
                                                <button type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-bs-toggle=\"modal\" data-bs-target=\"#confirmModalTable{{ loop.index }}\">
                                                    <i class=\"fas fa-trash-alt me-1\"></i> Supprimer
                                                </button>
                                            </form>
                                            
                                            <!-- Modal de confirmation -->
                                            <div class=\"modal fade\" id=\"confirmModalTable{{ loop.index }}\" tabindex=\"-1\" aria-labelledby=\"confirmModalTableLabel{{ loop.index }}\" aria-hidden=\"true\">
                                                <div class=\"modal-dialog modal-dialog-centered\">
                                                    <div class=\"modal-content modal-confirm\">
                                                        <div class=\"modal-header\">
                                                            <h5 class=\"modal-title text-white\" id=\"confirmModalTableLabel{{ loop.index }}\">
                                                                <i class=\"fas fa-exclamation-triangle me-2 text-warning\"></i>
                                                                Confirmation de suppression
                                                            </h5>
                                                            <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>
                                                        </div>
                                                        <div class=\"modal-body text-center\">
                                                             <div class=\"warning-icon\">
                                                                 <i class=\"fas fa-trash-alt\"></i>
                                                             </div>
                                                             {% if hasActions %}
                                                             <div class=\"warning-text\">Suppression définitive</div>
                                                             <div class=\"theme-title\">
                                                                <i class=\"fas fa-bookmark me-1\"></i> {{ theme.title }}
                                                             </div>
                                                             
                                                             <div class=\"row mb-3\">
                                                                <div class=\"col-6\">
                                                                    <div class=\"theme-stats\">
                                                                        <i class=\"fas fa-layer-group me-1\"></i> {{ theme.modules|length }} modules
                                                                    </div>
                                                                </div>
                                                                <div class=\"col-6\">
                                                                    <div class=\"theme-stats\">
                                                                        <i class=\"fas fa-tasks me-1\"></i> Complété par {{ logbook.owner.fullname|split(' ')|first }}
                                                                    </div>
                                                                </div>
                                                             </div>
                                                             
                                                             <div class=\"danger-box\">
                                                                <p class=\"mb-0\"><i class=\"fas fa-exclamation-circle me-1\"></i> La suppression entraînera la <strong>perte définitive</strong> des données suivantes :</p>
                                                                <ul class=\"text-start mt-2 mb-1\">
                                                                    <li>Tous les modules associés ({{ theme.modules|length }})</li>
                                                                    <li>Toutes les actions complétées par l'utilisateur</li>
                                                                    <li>L'historique des modifications</li>
                                                                </ul>
                                                             </div>
                                                             
                                                             <p class=\"mt-3 mb-0 fw-bold\">Cette opération ne peut pas être annulée.</p>
                                                             <p>Êtes-vous absolument certain de vouloir continuer ?</p>
                                                             {% else %}
                                                             <div class=\"warning-text\">Suppression de thème</div>
                                                             <div class=\"theme-title\">
                                                                <i class=\"fas fa-bookmark me-1\"></i> {{ theme.title }}
                                                             </div>
                                                             
                                                             <p class=\"mb-3\">Ce thème ne contient aucune donnée utilisateur.</p>
                                                             
                                                             <div class=\"theme-stats mb-3\">
                                                                <i class=\"fas fa-layer-group me-1\"></i> {{ theme.modules|length }} modules vides
                                                             </div>
                                                             
                                                             <p class=\"text-muted\"><small>Cette action est irréversible mais n'affectera pas les données utilisateur.</small></p>
                                                             {% endif %}
                                                         </div>
                                                        <div class=\"modal-footer\">
                                                            <button type=\"button\" class=\"btn btn-outline-secondary\" data-bs-dismiss=\"modal\">
                                                                <i class=\"fas fa-times me-1\"></i> Annuler
                                                            </button>
                                                            <button type=\"button\" class=\"btn btn-danger\" onclick=\"document.getElementById('deleteThemeTable_{{ theme.id | replace({'-': '_'}) }}').submit();\">
                                                                <i class=\"fas fa-trash-alt me-1\"></i> Confirmer la suppression
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>

            {% else %}
                <div class=\"alert alert-info d-flex align-items-center p-4\" role=\"alert\" style=\"background-color: var(--primary-light); color: var(--primary-color); border: none; border-left: 4px solid var(--primary-color);\">
                    <i class=\"fas fa-info-circle fs-5 me-3\"></i>
                    <div>
                        Aucun thème n'est associé à ce carnet. Utilisez le formulaire ci-dessous pour ajouter des thèmes.
                    </div>
                </div>
            {% endif %}
        </div>
    </div>

    {# Ajouter un Thème #}
    <div class=\"content-card card shadow-sm border-0 mt-4\">
        <div class=\"card-header bg-light py-3 header-bordered\">
            <h5 class=\"mb-0\">
                <i class=\"fas fa-plus-circle me-2\" style=\"color: var(--primary-color);\"></i>
                Ajouter des thèmes
            </h5>
        </div>
        <div class=\"card-body p-4\">
            {% if hasAvailableThemes %}
                {{ form_start(form, {'attr': {'class': 'needs-validation'}}) }}
                    {% if form_errors(form)|length > 0 %}
                        <div class=\"alert alert-danger mb-4\">
                            <i class=\"fas fa-exclamation-triangle me-2\"></i>
                            {{ form_errors(form) }}
                        </div>
                    {% endif %}
                    
                    <div class=\"row g-4\">
                        <div class=\"col-12\">
                            <div class=\"form-group\">
                                <label class=\"form-label fw-semibold mb-3 ps-1\">{{ form_label(form.themes) }}</label>
                                <div class=\"select-container\">
                                    {{ form_widget(form.themes, {
                                        'attr': {
                                            'class': 'form-select',
                                            'data-placeholder': 'Sélectionnez les thèmes à ajouter'
                                        }
                                    }) }}
                                </div>
                                <div class=\"form-text mt-2 ps-1\">
                                    <i class=\"fas fa-lightbulb me-1\"></i>
                                    Seuls les thèmes qui ne sont pas encore associés au carnet sont disponibles.
                                </div>
                            </div>
                            {{ form_row(form._token) }}
                        </div>
                    </div>
                    
                    <div class=\"d-flex justify-content-end mt-4\">
                        <button type=\"submit\" class=\"btn btn-primary px-4 py-2 d-flex align-items-center\">
                            <i class=\"fas fa-plus-circle me-2\"></i> Ajouter au carnet
                        </button>
                    </div>
                {{ form_end(form, {render_rest: false}) }}
            {% else %}
                <div class=\"alert d-flex align-items-center p-4\" role=\"alert\" 
                     style=\"background-color: rgba(25, 135, 84, 0.1); color: #198754; border: none; border-left: 4px solid #198754;\">
                    <i class=\"fas fa-check-circle fs-4 me-3\"></i>
                    <div>
                        <h6 class=\"alert-heading mb-1 fw-bold\">Plus aucun thème n'est disponible pour ce carnet</h6>
                        <p class=\"mb-0\">Tous les thèmes sont déjà associés.</p>
                    </div>
                </div>
            {% endif %}
        </div>
    </div>

{% endblock %}
", "admin/logbook/edit.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/logbook/edit.html.twig");
    }
}
