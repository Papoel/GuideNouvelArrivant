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

/* reset_password/reset.html.twig */
class __TwigTemplate_394c6a8371e60eb4bde6cc1b780988aa extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/reset.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/reset.html.twig"));

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

        yield "Définir un nouveau mot de passe";
        
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
    <style>
        .card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        }
        .form-control {
            transition: all 0.2s ease;
            border: 2px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            transform: translateY(-1px);
        }
        .btn-primary {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s;
        }
        .btn-primary:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        .strength-weak { width: 25%; background: #dc3545; }
        .strength-medium { width: 50%; background: #ffc107; }
        .strength-good { width: 75%; background: #0dcaf0; }
        .strength-strong { width: 100%; background: #198754; }
        .password-requirements li {
            transition: all 0.2s ease;
            opacity: 0.5;
        }
        .password-requirements li.valid {
            opacity: 1;
            color: #198754;
        }
        .password-requirements li i {
            transition: all 0.2s ease;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .invalid-shake {
            animation: shake 0.4s ease-in-out;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 90
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

        // line 91
        yield "    <div class=\"container\">
        <div class=\"row justify-content-center min-vh-100 align-items-center py-5\">
            <div class=\"col-12 col-sm-11 col-md-9 col-lg-7\">
                <div class=\"text-center mb-4\">
                    <i class=\"bi bi-shield-lock-fill display-1 text-primary mb-3\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Créez votre nouveau mot de passe</h1>
                    <p class=\"text-muted\">Choisissez un mot de passe fort pour sécuriser votre compte</p>
                </div>

                <div class=\"card shadow-lg border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        ";
        // line 102
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 102, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
                            <div class=\"form-floating mb-3\">
                                ";
        // line 104
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 104, $this->source); })()), "plainPassword", [], "any", false, false, false, 104), "first", [], "any", false, false, false, 104), 'widget', ["attr" => ["class" => "form-control form-control-lg rounded-3", "placeholder" => "Nouveau mot de passe", "data-password-input" => "true"]]);
        // line 110
        yield "
                                ";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 111, $this->source); })()), "plainPassword", [], "any", false, false, false, 111), "first", [], "any", false, false, false, 111), 'label', ["label" => "Nouveau mot de passe"]);
        yield "
                                <div class=\"invalid-feedback\">
                                    ";
        // line 113
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 113, $this->source); })()), "plainPassword", [], "any", false, false, false, 113), "first", [], "any", false, false, false, 113), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"password-strength mb-3\">
                                <div class=\"password-strength-bar\"></div>
                            </div>

                            <ul class=\"list-unstyled password-requirements small mb-4\">
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins 6 caractères</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins une lettre majuscule</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins une lettre minuscule</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins un chiffre</li>
                                <li><i class=\"bi bi-circle me-2\"></i>Au moins un caractère spécial</li>
                            </ul>

                            <div class=\"form-floating mb-4\">
                                ";
        // line 130
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 130, $this->source); })()), "plainPassword", [], "any", false, false, false, 130), "second", [], "any", false, false, false, 130), 'widget', ["attr" => ["class" => "form-control form-control-lg rounded-3", "placeholder" => "Confirmez le mot de passe"]]);
        // line 135
        yield "
                                ";
        // line 136
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 136, $this->source); })()), "plainPassword", [], "any", false, false, false, 136), "second", [], "any", false, false, false, 136), 'label', ["label" => "Confirmez le mot de passe"]);
        yield "
                                <div class=\"invalid-feedback\">
                                    ";
        // line 138
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 138, $this->source); })()), "plainPassword", [], "any", false, false, false, 138), "second", [], "any", false, false, false, 138), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"alert alert-info bg-light border-info border-start border-4 mb-4\">
                                <div class=\"d-flex\">
                                    <i class=\"bi bi-lightbulb-fill text-info me-2 fs-5\"></i>
                                    <div class=\"flex-grow-1\">
                                        <h6 class=\"alert-heading fw-bold mb-1\">Astuce de sécurité</h6>
                                        <p class=\"mb-0 text-muted small\">
                                            Créez une phrase secrète facile à retenir mais difficile à deviner.<br>
                                            <span class=\"text-break\">Exemple : \"J'aime_manger_3_pizzas_le_vendredi!\"</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class=\"d-grid gap-2\">
                                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3 position-relative overflow-hidden\">
                                    <i class=\"bi bi-check-circle-fill me-2\"></i>
                                    Valider mon nouveau mot de passe
                                </button>
                            </div>
                        ";
        // line 161
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["resetForm"]) || array_key_exists("resetForm", $context) ? $context["resetForm"] : (function () { throw new RuntimeError('Variable "resetForm" does not exist.', 161, $this->source); })()), 'form_end');
        yield "
                    </div>
                </div>

                <div class=\"text-center mt-4\">
                    <p class=\"text-muted small\">
                        <i class=\"bi bi-shield-check me-1\"></i>
                        Votre mot de passe est chiffré avec les derniers standards de sécurité
                    </p>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 176
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

        // line 177
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.querySelector('[data-password-input]');
            const strengthBar = document.querySelector('.password-strength-bar');
            const requirements = document.querySelectorAll('.password-requirements li');
            const form = document.querySelector('form');

            const updatePasswordStrength = (password) => {
                let strength = 0;
                const checks = {
                    length: password.length >= 6,
                    uppercase: /[A-Z]/.test(password),
                    lowercase: /[a-z]/.test(password),
                    numbers: /[0-9]/.test(password),
                    special: /[^A-Za-z0-9]/.test(password)
                };

                // Mettre à jour les indicateurs visuels
                requirements.forEach((req, index) => {
                    const isValid = Object.values(checks)[index];
                    req.classList.toggle('valid', isValid);
                    req.querySelector('i').className = isValid ? 'bi bi-check-circle-fill me-2' : 'bi bi-circle me-2';
                    if (isValid) strength++;
                });

                // Mettre à jour la barre de progression
                strengthBar.className = 'password-strength-bar';
                if (strength > 4) strengthBar.classList.add('strength-strong');
                else if (strength > 3) strengthBar.classList.add('strength-good');
                else if (strength > 2) strengthBar.classList.add('strength-medium');
                else if (strength > 0) strengthBar.classList.add('strength-weak');
            };

            if (passwordInput) {
                passwordInput.addEventListener('input', (e) => {
                    updatePasswordStrength(e.target.value);
                });
            }

            // Validation du formulaire avec animation
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Ajouter l'animation de secousse aux champs invalides
                    form.querySelectorAll(':invalid').forEach(input => {
                        input.closest('.form-floating').classList.add('invalid-shake');
                        setTimeout(() => {
                            input.closest('.form-floating').classList.remove('invalid-shake');
                        }, 400);
                    });
                }
                form.classList.add('was-validated');
            });
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
        return "reset_password/reset.html.twig";
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
        return array (  332 => 177,  319 => 176,  294 => 161,  268 => 138,  263 => 136,  260 => 135,  258 => 130,  238 => 113,  233 => 111,  230 => 110,  228 => 104,  223 => 102,  210 => 91,  197 => 90,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Définir un nouveau mot de passe{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        }
        .form-control {
            transition: all 0.2s ease;
            border: 2px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            transform: translateY(-1px);
        }
        .btn-primary {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120%;
            height: 120%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s;
        }
        .btn-primary:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        .strength-weak { width: 25%; background: #dc3545; }
        .strength-medium { width: 50%; background: #ffc107; }
        .strength-good { width: 75%; background: #0dcaf0; }
        .strength-strong { width: 100%; background: #198754; }
        .password-requirements li {
            transition: all 0.2s ease;
            opacity: 0.5;
        }
        .password-requirements li.valid {
            opacity: 1;
            color: #198754;
        }
        .password-requirements li i {
            transition: all 0.2s ease;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .invalid-shake {
            animation: shake 0.4s ease-in-out;
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <div class=\"row justify-content-center min-vh-100 align-items-center py-5\">
            <div class=\"col-12 col-sm-11 col-md-9 col-lg-7\">
                <div class=\"text-center mb-4\">
                    <i class=\"bi bi-shield-lock-fill display-1 text-primary mb-3\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Créez votre nouveau mot de passe</h1>
                    <p class=\"text-muted\">Choisissez un mot de passe fort pour sécuriser votre compte</p>
                </div>

                <div class=\"card shadow-lg border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        {{ form_start(resetForm, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
                            <div class=\"form-floating mb-3\">
                                {{ form_widget(resetForm.plainPassword.first, {
                                    'attr': {
                                        'class': 'form-control form-control-lg rounded-3',
                                        'placeholder': 'Nouveau mot de passe',
                                        'data-password-input': 'true'
                                    }
                                }) }}
                                {{ form_label(resetForm.plainPassword.first, 'Nouveau mot de passe') }}
                                <div class=\"invalid-feedback\">
                                    {{ form_errors(resetForm.plainPassword.first) }}
                                </div>
                            </div>

                            <div class=\"password-strength mb-3\">
                                <div class=\"password-strength-bar\"></div>
                            </div>

                            <ul class=\"list-unstyled password-requirements small mb-4\">
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins 6 caractères</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins une lettre majuscule</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins une lettre minuscule</li>
                                <li class=\"mb-1\"><i class=\"bi bi-circle me-2\"></i>Au moins un chiffre</li>
                                <li><i class=\"bi bi-circle me-2\"></i>Au moins un caractère spécial</li>
                            </ul>

                            <div class=\"form-floating mb-4\">
                                {{ form_widget(resetForm.plainPassword.second, {
                                    'attr': {
                                        'class': 'form-control form-control-lg rounded-3',
                                        'placeholder': 'Confirmez le mot de passe'
                                    }
                                }) }}
                                {{ form_label(resetForm.plainPassword.second, 'Confirmez le mot de passe') }}
                                <div class=\"invalid-feedback\">
                                    {{ form_errors(resetForm.plainPassword.second) }}
                                </div>
                            </div>

                            <div class=\"alert alert-info bg-light border-info border-start border-4 mb-4\">
                                <div class=\"d-flex\">
                                    <i class=\"bi bi-lightbulb-fill text-info me-2 fs-5\"></i>
                                    <div class=\"flex-grow-1\">
                                        <h6 class=\"alert-heading fw-bold mb-1\">Astuce de sécurité</h6>
                                        <p class=\"mb-0 text-muted small\">
                                            Créez une phrase secrète facile à retenir mais difficile à deviner.<br>
                                            <span class=\"text-break\">Exemple : \"J'aime_manger_3_pizzas_le_vendredi!\"</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class=\"d-grid gap-2\">
                                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3 position-relative overflow-hidden\">
                                    <i class=\"bi bi-check-circle-fill me-2\"></i>
                                    Valider mon nouveau mot de passe
                                </button>
                            </div>
                        {{ form_end(resetForm) }}
                    </div>
                </div>

                <div class=\"text-center mt-4\">
                    <p class=\"text-muted small\">
                        <i class=\"bi bi-shield-check me-1\"></i>
                        Votre mot de passe est chiffré avec les derniers standards de sécurité
                    </p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.querySelector('[data-password-input]');
            const strengthBar = document.querySelector('.password-strength-bar');
            const requirements = document.querySelectorAll('.password-requirements li');
            const form = document.querySelector('form');

            const updatePasswordStrength = (password) => {
                let strength = 0;
                const checks = {
                    length: password.length >= 6,
                    uppercase: /[A-Z]/.test(password),
                    lowercase: /[a-z]/.test(password),
                    numbers: /[0-9]/.test(password),
                    special: /[^A-Za-z0-9]/.test(password)
                };

                // Mettre à jour les indicateurs visuels
                requirements.forEach((req, index) => {
                    const isValid = Object.values(checks)[index];
                    req.classList.toggle('valid', isValid);
                    req.querySelector('i').className = isValid ? 'bi bi-check-circle-fill me-2' : 'bi bi-circle me-2';
                    if (isValid) strength++;
                });

                // Mettre à jour la barre de progression
                strengthBar.className = 'password-strength-bar';
                if (strength > 4) strengthBar.classList.add('strength-strong');
                else if (strength > 3) strengthBar.classList.add('strength-good');
                else if (strength > 2) strengthBar.classList.add('strength-medium');
                else if (strength > 0) strengthBar.classList.add('strength-weak');
            };

            if (passwordInput) {
                passwordInput.addEventListener('input', (e) => {
                    updatePasswordStrength(e.target.value);
                });
            }

            // Validation du formulaire avec animation
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Ajouter l'animation de secousse aux champs invalides
                    form.querySelectorAll(':invalid').forEach(input => {
                        input.closest('.form-floating').classList.add('invalid-shake');
                        setTimeout(() => {
                            input.closest('.form-floating').classList.remove('invalid-shake');
                        }, 400);
                    });
                }
                form.classList.add('was-validated');
            });
        });
    </script>
{% endblock %}
", "reset_password/reset.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/reset_password/reset.html.twig");
    }
}
