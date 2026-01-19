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

/* partials/_errors.html.twig */
class __TwigTemplate_6cca443c0796fa569fb0ed9d09c19608 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "./base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_errors.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_errors.html.twig"));

        $this->parent = $this->load("./base.html.twig", 1);
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

        yield "Erreur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 3, $this->source); })()), "statusCode", [], "any", false, false, false, 3), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 3, $this->source); })()), "statusText", [], "any", false, false, false, 3)), "html", null, true);
        yield " ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-light: rgba(61, 95, 158, 0.08);
            --accent-color: #6366f1;
            --text-dark: #2c384e;
            --text-muted: #6c757d;
            --bg-light: #f8f9fa;
            --bg-dark: #2c384e;
            --border-color: #e9ecef;
            --info-color: #0dcaf0;
            --success-color: #10b981;
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .error-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background-color: var(--bg-dark);
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .error-page::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(61, 95, 158, 0.03) 0%, rgba(248, 249, 250, 0) 60%);
            z-index: 0;
        }

        .error-container {
            max-width: 1000px;
            width: 100%;
            max-height: 100vh;
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            z-index: 5;
            display: grid;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            margin: 1rem;
        }

        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* .error-container:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        } */

        @media (min-width: 768px) {
            .error-container {
                grid-template-columns: 380px 1fr;
            }
        }

        .error-header {
            background-color: var(--primary-color);
            background-image: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            padding: 0;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            color: white;
            overflow: hidden;
        }

        .error-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(\"data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E\");
            opacity: 0.5;
        }

        .error-header-content {
            position: relative;
            z-index: 2;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .error-code {
            font-size: 7rem;
            font-weight: 700;
            color: white;
            margin: 0;
            line-height: 1;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: scaleIn 0.5s ease-out both;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 4px;
        }

        .pulse-animation {
            animation: pulseEffect 2s infinite;
        }

        @keyframes pulseEffect {
            0% { text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
            50% { text-shadow: 0 4px 25px rgba(255, 255, 255, 0.5); }
            100% { text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        }

        .error-title {
            font-size: 1.75rem;
            color: white;
            margin-top: 1.5rem;
            margin-bottom: 0;
            font-weight: 500;
            letter-spacing: 0.01em;
            opacity: 0.95;
            animation: fadeIn 0.7s 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes floatAnimation {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .error-illustration {
            width: 120px;
            height: 120px;
            margin-top: 2rem;
            opacity: 0.8;
            animation: scaleIn 0.5s ease-out 0.2s both, floatAnimation 6s ease-in-out infinite;
            filter: drop-shadow(0 10px 15px rgba(61, 95, 158, 0.3));
        }

        .error-body {
            padding: 2rem;
            position: relative;
            z-index: 2;
            overflow-y: auto;
            max-height: calc(100vh - 200px);
        }

        @media (max-width: 767px) {
            .error-body {
                padding: 1.5rem 1rem;
                max-height: calc(100vh - 180px);
            }
        }

        .error-message {
            background-color: #fff;
            padding: 0;
            margin-bottom: 2.5rem;
            animation: fadeIn 0.7s 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            display: flex;
            align-items: flex-start;
            border-radius: 0.75rem;
        }

        .error-message-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.25rem;
            color: white;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .error-message-content {
            flex: 1;
        }

        .error-message-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0 0 0.5rem 0;
        }

        .error-message-text {
            color: var(--text-muted);
            margin: 0;
            line-height: 1.6;
        }

        .error-details {
            margin-bottom: 2rem;
            animation: fadeIn 0.7s 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .error-section-title {
            font-size: 1.35rem;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .error-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 3rem;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }

        .error-section-title i {
            margin-right: 0.75rem;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .error-details-list {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .error-details-item {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem;
            transition: all 0.2s ease;
        }

        /* .error-details-item:hover {
            background-color: rgba(249, 250, 251, 0.8);
            transform: translateX(4px);
        } */

        .error-details-item:last-child {
            border-bottom: none;
        }

        .error-details-label {
            font-weight: 500;
            width: 40%;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .error-details-label i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            margin-right: 0.75rem;
            font-size: 0.8rem;
        }

        .error-details-value {
            width: 60%;
            color: var(--text-muted);
            word-break: break-word;
            font-weight: 400;
        }

        @media (max-width: 767px) {
            .error-details-item {
                flex-direction: column;
                padding: 1rem;
            }

            .error-details-label,
            .error-details-value {
                width: 100%;
            }

            .error-details-label {
                margin-bottom: 0.5rem;
            }
        }

        .error-help {
            margin-bottom: 2rem;
            animation: fadeIn 0.7s 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .error-help-content {
            background-color: #fff;
            border-radius: 1rem;
            padding: 0;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            position: relative;
        }

        .error-help-header {
            padding: 1.5rem;
            background: linear-gradient(to right, rgba(61, 95, 158, 0.03), rgba(99, 102, 241, 0.03));
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }

        .error-help-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background-color: var(--info-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.25rem;
            box-shadow: 0 4px 8px rgba(13, 202, 240, 0.2);
        }
        
        .error-help-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .error-help-body {
            padding: 1.5rem;
        }
        
        .error-help-text {
            margin-bottom: 1.25rem;
            color: var(--text-muted);
            line-height: 1.6;
        }
        
        .error-help-list {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        
        .error-help-item {
            margin-bottom: 0.75rem;
            color: var(--text-dark);
            position: relative;
            padding-left: 1.75rem;
            display: flex;
            align-items: center;
        }
        
        .error-help-item:last-child {
            margin-bottom: 0;
        }
        
        .error-help-item i {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: var(--success-color);
        }
        
        .contact-item {
            background-color: rgba(61, 95, 158, 0.03);
            border-radius: 0.5rem;
            padding: 0.75rem 0.75rem 0.75rem 2.25rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border-left: 3px solid var(--primary-color);
        }
        
        .contact-item i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        .contact-content {
            display: flex;
            flex-direction: column;
        }
        
        .contact-label {
            font-weight: 500;
            margin-bottom: 0.2rem;
        }
        
        .contact-email {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .contact-email:hover {
            color: var(--accent-color);
        }
        
        .contact-email::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .contact-email:hover::after {
            width: 100%;
        }
        
        .error-actions {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
            animation: fadeIn 0.7s 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem 1.75rem;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            font-size: 0.95rem;
            line-height: 1.5;
            border-radius: 0.5rem;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.1), rgba(255,255,255,0));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .btn:hover::before {
            opacity: 1;
        }
        
        .btn:active {
            transform: translateY(2px);
        }
        
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            box-shadow: 0 4px 12px rgba(61, 95, 158, 0.2);
        }
        
        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(61, 95, 158, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            color: var(--text-dark);
            background-color: transparent;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }
        
        .btn-outline:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background-color: rgba(61, 95, 158, 0.03);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                padding: 0.75rem 1.5rem;
            }
        }
    </style>

    ";
        // line 596
        $context["userConnected"] = false;
        // line 597
        yield "    ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 597, $this->source); })()), "user", [], "any", false, false, false, 597)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 598
            yield "        ";
            $context["userConnected"] = true;
            // line 599
            yield "    ";
        }
        // line 600
        yield "    
    <div class=\"error-page\">
        <div class=\"error-container\">
            <div class=\"error-header\">
                <div class=\"error-header-content\">
                    <h1 class=\"error-code\">";
        // line 605
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 605, $this->source); })()), "statusCode", [], "any", false, false, false, 605), "html", null, true);
        yield "</h1>
                    
                    ";
        // line 607
        $context["errorMessage"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 607, $this->source); })()), "statusText", [], "any", false, false, false, 607);
        // line 608
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 608, $this->source); })()), "statusText", [], "any", false, false, false, 608) === "Whoops, looks like something went wrong.")) {
            // line 609
            yield "                        ";
            $context["errorMessage"] = "Une erreur est survenue.";
            // line 610
            yield "                    ";
        }
        // line 611
        yield "
                    <h2 class=\"error-title p-2\">";
        // line 612
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["errorMessage"]) || array_key_exists("errorMessage", $context) ? $context["errorMessage"] : (function () { throw new RuntimeError('Variable "errorMessage" does not exist.', 612, $this->source); })())), "html", null, true);
        yield "</h2>

                    <img src=\"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xMiAyMkMxNy41MjI4IDIyIDIyIDE3LjUyMjggMjIgMTJDMjIgNi40NzcxNSAxNy41MjI4IDIgMTIgMkM2LjQ3NzE1IDIgMiA2LjQ3NzE1IDIgMTJDMiAxNy41MjI4IDYuNDc3MTUgMjIgMTIgMjJaIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMiA4VjEyIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMiAxNkgxMi4wMSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48L3N2Zz4=\" alt=\"Error Icon\" class=\"error-illustration\">
                </div>
            </div>
            
            <div class=\"error-body\">
                <div class=\"error-message\">
                    <div class=\"error-message-icon\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                    </div>
                    <div class=\"error-message-content\">
                        <h4 class=\"error-message-title\">Oups ! Une erreur est survenue</h4>
                        <p class=\"error-message-text\">Nous n'avons pas pu traiter votre demande. Veuillez consulter les détails ci-dessous.</p>
                    </div>
                </div>
                
                <div class=\"error-details\">
                    <h3 class=\"error-section-title\"><i class=\"bi bi-info-circle\"></i> Détails de l'erreur</h3>
                    <ul class=\"error-details-list\">
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-hash\"></i> Code d'erreur</div>
                            <div class=\"error-details-value\">";
        // line 634
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 634, $this->source); })()), "statusCode", [], "any", false, false, false, 634), "html", null, true);
        yield "</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-exclamation-triangle\"></i> Type d'erreur</div>
                            <div class=\"error-details-value\">";
        // line 638
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 638, $this->source); })()), "statusText", [], "any", false, false, false, 638)), "html", null, true);
        yield "</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-link\"></i> URL demandée</div>
                            <div class=\"error-details-value\">";
        // line 642
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 642, $this->source); })()), "request", [], "any", false, false, false, 642), "uri", [], "any", false, false, false, 642), "html", null, true);
        yield "</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-clock\"></i> Date et heure</div>
                            <div class=\"error-details-value\" style=\"first-letter: capitalize;\">";
        // line 646
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, "now", "full", "short", "", "Europe/Paris", "gregorian", "fr"), "html", null, true);
        yield "</div>
                        </li>
                        ";
        // line 648
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 648, $this->source); })()), "environment", [], "any", false, false, false, 648) == "dev")) {
            // line 649
            yield "                            <li class=\"error-details-item\">
                                <div class=\"error-details-label\"><i class=\"bi bi-code\"></i> Classe d'exception</div>
                                <div class=\"error-details-value\">";
            // line 651
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["exception"] ?? null), "class", [], "any", true, true, false, 651)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 651, $this->source); })()), "class", [], "any", false, false, false, 651), "N/A")) : ("N/A")), "html", null, true);
            yield "</div>
                            </li>
                        ";
        }
        // line 654
        yield "                    </ul>
                </div>
                
                <div class=\"error-help\">
                    <h3 class=\"error-section-title\"><i class=\"bi bi-lightbulb\"></i> Solutions possibles</h3>
                    <div class=\"error-help-content\">
                        <div class=\"error-help-header\">
                            <div class=\"error-help-icon\">
                                <i class=\"bi bi-question-circle\"></i>
                            </div>
                            <h4 class=\"error-help-title\">Que faire maintenant ?</h4>
                        </div>
                        <div class=\"error-help-body\">
                            <p class=\"error-help-text\">Voici quelques solutions que vous pouvez essayer :</p>
                            <ul class=\"error-help-list\">
                                <li class=\"error-help-item\"><i class=\"bi bi-check-circle\"></i> Vérifier l'URL saisie</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-arrow-clockwise\"></i> Rafraîchir la page</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-arrow-left\"></i> Revenir à la page précédente</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-house\"></i> Retourner à l'accueil</li>
                                <li class=\"error-help-item contact-item mt-3\">
                                    <i class=\"bi bi-envelope ms-2\"></i>
                                    <div class=\"contact-content ms-2\">
                                        <span class=\"contact-label\">Contacter le support</span>
                                        <a href=\"mailto:pascal.briffard@edf.fr\" class=\"contact-email\">pascal.briffard@edf.fr</a>
                                    </div>
                                </li>
                                ";
        // line 680
        if ((($tmp =  !(isset($context["userConnected"]) || array_key_exists("userConnected", $context) ? $context["userConnected"] : (function () { throw new RuntimeError('Variable "userConnected" does not exist.', 680, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 681
            yield "                                    <li class=\"error-help-item\"><i class=\"bi bi-box-arrow-right\"></i> Vous connecter si vous possédez un compte</li>
                                ";
        }
        // line 683
        yield "                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class=\"error-actions\">
                    <a href=\"";
        // line 689
        yield (((($tmp = (isset($context["userConnected"]) || array_key_exists("userConnected", $context) ? $context["userConnected"] : (function () { throw new RuntimeError('Variable "userConnected" does not exist.', 689, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 689, $this->source); })()), "user", [], "any", false, false, false, 689), "nni", [], "any", false, false, false, 689)]), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home_index")));
        yield "\" class=\"btn btn-primary\">
                        <span class=\"icon\"><i class=\"bi bi-house\"></i></span> Retour à l'accueil
                    </a>
                    <a href=\"javascript:history.back()\" class=\"btn btn-outline\">
                        <span class=\"icon\"><i class=\"bi bi-arrow-left\"></i></span> Page précédente
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <script>
        // Animation enhancement script
        document.addEventListener('DOMContentLoaded', function() {
            // Add subtle hover effects to interactive elements
            const detailItems = document.querySelectorAll('.error-details-item');
            detailItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transition = 'all 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
                });
            });
            
            // Add subtle pulse effect to error code
            const errorCode = document.querySelector('.error-code');
            if (errorCode) {
                setTimeout(() => {
                    errorCode.classList.add('pulse-animation');
                }, 1500);
            }
        });
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 722
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 723
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_errors.html.twig";
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
        return array (  920 => 723,  907 => 722,  863 => 689,  855 => 683,  851 => 681,  849 => 680,  821 => 654,  815 => 651,  811 => 649,  809 => 648,  804 => 646,  797 => 642,  790 => 638,  783 => 634,  758 => 612,  755 => 611,  752 => 610,  749 => 609,  746 => 608,  744 => 607,  739 => 605,  732 => 600,  729 => 599,  726 => 598,  723 => 597,  721 => 596,  134 => 11,  121 => 10,  106 => 6,  93 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends './base.html.twig' %}

{% block title %}Erreur {{ exception.statusCode }} - {{ exception.statusText|trans }} {% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\">
{% endblock %}

{% block body %}
    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-light: rgba(61, 95, 158, 0.08);
            --accent-color: #6366f1;
            --text-dark: #2c384e;
            --text-muted: #6c757d;
            --bg-light: #f8f9fa;
            --bg-dark: #2c384e;
            --border-color: #e9ecef;
            --info-color: #0dcaf0;
            --success-color: #10b981;
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .error-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background-color: var(--bg-dark);
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .error-page::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(61, 95, 158, 0.03) 0%, rgba(248, 249, 250, 0) 60%);
            z-index: 0;
        }

        .error-container {
            max-width: 1000px;
            width: 100%;
            max-height: 100vh;
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            z-index: 5;
            display: grid;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            margin: 1rem;
        }

        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* .error-container:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        } */

        @media (min-width: 768px) {
            .error-container {
                grid-template-columns: 380px 1fr;
            }
        }

        .error-header {
            background-color: var(--primary-color);
            background-image: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            padding: 0;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            color: white;
            overflow: hidden;
        }

        .error-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(\"data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E\");
            opacity: 0.5;
        }

        .error-header-content {
            position: relative;
            z-index: 2;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .error-code {
            font-size: 7rem;
            font-weight: 700;
            color: white;
            margin: 0;
            line-height: 1;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: scaleIn 0.5s ease-out both;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 4px;
        }

        .pulse-animation {
            animation: pulseEffect 2s infinite;
        }

        @keyframes pulseEffect {
            0% { text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
            50% { text-shadow: 0 4px 25px rgba(255, 255, 255, 0.5); }
            100% { text-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        }

        .error-title {
            font-size: 1.75rem;
            color: white;
            margin-top: 1.5rem;
            margin-bottom: 0;
            font-weight: 500;
            letter-spacing: 0.01em;
            opacity: 0.95;
            animation: fadeIn 0.7s 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes floatAnimation {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        .error-illustration {
            width: 120px;
            height: 120px;
            margin-top: 2rem;
            opacity: 0.8;
            animation: scaleIn 0.5s ease-out 0.2s both, floatAnimation 6s ease-in-out infinite;
            filter: drop-shadow(0 10px 15px rgba(61, 95, 158, 0.3));
        }

        .error-body {
            padding: 2rem;
            position: relative;
            z-index: 2;
            overflow-y: auto;
            max-height: calc(100vh - 200px);
        }

        @media (max-width: 767px) {
            .error-body {
                padding: 1.5rem 1rem;
                max-height: calc(100vh - 180px);
            }
        }

        .error-message {
            background-color: #fff;
            padding: 0;
            margin-bottom: 2.5rem;
            animation: fadeIn 0.7s 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            display: flex;
            align-items: flex-start;
            border-radius: 0.75rem;
        }

        .error-message-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.25rem;
            color: white;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .error-message-content {
            flex: 1;
        }

        .error-message-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0 0 0.5rem 0;
        }

        .error-message-text {
            color: var(--text-muted);
            margin: 0;
            line-height: 1.6;
        }

        .error-details {
            margin-bottom: 2rem;
            animation: fadeIn 0.7s 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .error-section-title {
            font-size: 1.35rem;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .error-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 3rem;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }

        .error-section-title i {
            margin-right: 0.75rem;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .error-details-list {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .error-details-item {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem;
            transition: all 0.2s ease;
        }

        /* .error-details-item:hover {
            background-color: rgba(249, 250, 251, 0.8);
            transform: translateX(4px);
        } */

        .error-details-item:last-child {
            border-bottom: none;
        }

        .error-details-label {
            font-weight: 500;
            width: 40%;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }

        .error-details-label i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            margin-right: 0.75rem;
            font-size: 0.8rem;
        }

        .error-details-value {
            width: 60%;
            color: var(--text-muted);
            word-break: break-word;
            font-weight: 400;
        }

        @media (max-width: 767px) {
            .error-details-item {
                flex-direction: column;
                padding: 1rem;
            }

            .error-details-label,
            .error-details-value {
                width: 100%;
            }

            .error-details-label {
                margin-bottom: 0.5rem;
            }
        }

        .error-help {
            margin-bottom: 2rem;
            animation: fadeIn 0.7s 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .error-help-content {
            background-color: #fff;
            border-radius: 1rem;
            padding: 0;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            position: relative;
        }

        .error-help-header {
            padding: 1.5rem;
            background: linear-gradient(to right, rgba(61, 95, 158, 0.03), rgba(99, 102, 241, 0.03));
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }

        .error-help-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background-color: var(--info-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.25rem;
            box-shadow: 0 4px 8px rgba(13, 202, 240, 0.2);
        }
        
        .error-help-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .error-help-body {
            padding: 1.5rem;
        }
        
        .error-help-text {
            margin-bottom: 1.25rem;
            color: var(--text-muted);
            line-height: 1.6;
        }
        
        .error-help-list {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        
        .error-help-item {
            margin-bottom: 0.75rem;
            color: var(--text-dark);
            position: relative;
            padding-left: 1.75rem;
            display: flex;
            align-items: center;
        }
        
        .error-help-item:last-child {
            margin-bottom: 0;
        }
        
        .error-help-item i {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: var(--success-color);
        }
        
        .contact-item {
            background-color: rgba(61, 95, 158, 0.03);
            border-radius: 0.5rem;
            padding: 0.75rem 0.75rem 0.75rem 2.25rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            border-left: 3px solid var(--primary-color);
        }
        
        .contact-item i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        .contact-content {
            display: flex;
            flex-direction: column;
        }
        
        .contact-label {
            font-weight: 500;
            margin-bottom: 0.2rem;
        }
        
        .contact-email {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            position: relative;
        }
        
        .contact-email:hover {
            color: var(--accent-color);
        }
        
        .contact-email::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .contact-email:hover::after {
            width: 100%;
        }
        
        .error-actions {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
            animation: fadeIn 0.7s 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.85rem 1.75rem;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            font-size: 0.95rem;
            line-height: 1.5;
            border-radius: 0.5rem;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.1), rgba(255,255,255,0));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .btn:hover::before {
            opacity: 1;
        }
        
        .btn:active {
            transform: translateY(2px);
        }
        
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            box-shadow: 0 4px 12px rgba(61, 95, 158, 0.2);
        }
        
        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(61, 95, 158, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            color: var(--text-dark);
            background-color: transparent;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }
        
        .btn-outline:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background-color: rgba(61, 95, 158, 0.03);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                padding: 0.75rem 1.5rem;
            }
        }
    </style>

    {% set userConnected = false %}
    {% if app.user %}
        {% set userConnected = true %}
    {% endif %}
    
    <div class=\"error-page\">
        <div class=\"error-container\">
            <div class=\"error-header\">
                <div class=\"error-header-content\">
                    <h1 class=\"error-code\">{{ exception.statusCode }}</h1>
                    
                    {% set errorMessage = exception.statusText %}
                    {% if exception.statusText is same as('Whoops, looks like something went wrong.') %}
                        {% set errorMessage = 'Une erreur est survenue.' %}
                    {% endif %}

                    <h2 class=\"error-title p-2\">{{ errorMessage|trans() }}</h2>

                    <img src=\"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xMiAyMkMxNy41MjI4IDIyIDIyIDE3LjUyMjggMjIgMTJDMjIgNi40NzcxNSAxNy41MjI4IDIgMTIgMkM2LjQ3NzE1IDIgMiA2LjQ3NzE1IDIgMTJDMiAxNy41MjI4IDYuNDc3MTUgMjIgMTIgMjJaIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMiA4VjEyIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPjxwYXRoIGQ9Ik0xMiAxNkgxMi4wMSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz48L3N2Zz4=\" alt=\"Error Icon\" class=\"error-illustration\">
                </div>
            </div>
            
            <div class=\"error-body\">
                <div class=\"error-message\">
                    <div class=\"error-message-icon\">
                        <i class=\"bi bi-exclamation-circle\"></i>
                    </div>
                    <div class=\"error-message-content\">
                        <h4 class=\"error-message-title\">Oups ! Une erreur est survenue</h4>
                        <p class=\"error-message-text\">Nous n'avons pas pu traiter votre demande. Veuillez consulter les détails ci-dessous.</p>
                    </div>
                </div>
                
                <div class=\"error-details\">
                    <h3 class=\"error-section-title\"><i class=\"bi bi-info-circle\"></i> Détails de l'erreur</h3>
                    <ul class=\"error-details-list\">
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-hash\"></i> Code d'erreur</div>
                            <div class=\"error-details-value\">{{ exception.statusCode }}</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-exclamation-triangle\"></i> Type d'erreur</div>
                            <div class=\"error-details-value\">{{ exception.statusText|trans }}</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-link\"></i> URL demandée</div>
                            <div class=\"error-details-value\">{{ app.request.uri }}</div>
                        </li>
                        <li class=\"error-details-item\">
                            <div class=\"error-details-label\"><i class=\"bi bi-clock\"></i> Date et heure</div>
                            <div class=\"error-details-value\" style=\"first-letter: capitalize;\">{{ 'now'|format_datetime('full', 'short', locale: 'fr', timezone: 'Europe/Paris') }}</div>
                        </li>
                        {% if app.environment == 'dev' %}
                            <li class=\"error-details-item\">
                                <div class=\"error-details-label\"><i class=\"bi bi-code\"></i> Classe d'exception</div>
                                <div class=\"error-details-value\">{{ exception.class|default('N/A') }}</div>
                            </li>
                        {% endif %}
                    </ul>
                </div>
                
                <div class=\"error-help\">
                    <h3 class=\"error-section-title\"><i class=\"bi bi-lightbulb\"></i> Solutions possibles</h3>
                    <div class=\"error-help-content\">
                        <div class=\"error-help-header\">
                            <div class=\"error-help-icon\">
                                <i class=\"bi bi-question-circle\"></i>
                            </div>
                            <h4 class=\"error-help-title\">Que faire maintenant ?</h4>
                        </div>
                        <div class=\"error-help-body\">
                            <p class=\"error-help-text\">Voici quelques solutions que vous pouvez essayer :</p>
                            <ul class=\"error-help-list\">
                                <li class=\"error-help-item\"><i class=\"bi bi-check-circle\"></i> Vérifier l'URL saisie</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-arrow-clockwise\"></i> Rafraîchir la page</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-arrow-left\"></i> Revenir à la page précédente</li>
                                <li class=\"error-help-item\"><i class=\"bi bi-house\"></i> Retourner à l'accueil</li>
                                <li class=\"error-help-item contact-item mt-3\">
                                    <i class=\"bi bi-envelope ms-2\"></i>
                                    <div class=\"contact-content ms-2\">
                                        <span class=\"contact-label\">Contacter le support</span>
                                        <a href=\"mailto:pascal.briffard@edf.fr\" class=\"contact-email\">pascal.briffard@edf.fr</a>
                                    </div>
                                </li>
                                {% if not userConnected %}
                                    <li class=\"error-help-item\"><i class=\"bi bi-box-arrow-right\"></i> Vous connecter si vous possédez un compte</li>
                                {% endif %}
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class=\"error-actions\">
                    <a href=\"{{ userConnected ? path('dashboard_index', {'nni': app.user.nni}) : path('home_index') }}\" class=\"btn btn-primary\">
                        <span class=\"icon\"><i class=\"bi bi-house\"></i></span> Retour à l'accueil
                    </a>
                    <a href=\"javascript:history.back()\" class=\"btn btn-outline\">
                        <span class=\"icon\"><i class=\"bi bi-arrow-left\"></i></span> Page précédente
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <script>
        // Animation enhancement script
        document.addEventListener('DOMContentLoaded', function() {
            // Add subtle hover effects to interactive elements
            const detailItems = document.querySelectorAll('.error-details-item');
            detailItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transition = 'all 0.3s cubic-bezier(0.16, 1, 0.3, 1)';
                });
            });
            
            // Add subtle pulse effect to error code
            const errorCode = document.querySelector('.error-code');
            if (errorCode) {
                setTimeout(() => {
                    errorCode.classList.add('pulse-animation');
                }, 1500);
            }
        });
    </script>
{% endblock %}
{% block footer %}
    {# Ne rien mettre ici pour exclure le footer #}
{% endblock %}
", "partials/_errors.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/partials/_errors.html.twig");
    }
}
