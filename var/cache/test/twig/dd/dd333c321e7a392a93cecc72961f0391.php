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

/* reset_password/request.html.twig */
class __TwigTemplate_ab5e8e9d5bac7f393387e0dc09ce639d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/request.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/request.html.twig"));

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

        yield "Réinitialisez votre mot de passe";
        
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
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .btn-primary {
            transition: all 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }
        .back-to-login {
            transition: all 0.2s ease;
        }
        .back-to-login:hover {
            color: var(--bs-primary) !important;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 34
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

        // line 35
        yield "    <div class=\"container\">
        <div class=\"row justify-content-center min-vh-100 align-items-center py-5\">
            <div class=\"col-12 col-sm-10 col-md-8 col-lg-5\">
                <div class=\"text-center mb-4\">
                    <i class=\"bi bi-shield-lock display-1 text-primary mb-3\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Réinitialisation du mot de passe</h1>
                    <p class=\"text-muted\">Nous vous aiderons à récupérer votre compte en toute sécurité</p>
                </div>

                <div class=\"card shadow border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "flashes", ["reset_password_error"], "method", false, false, false, 46));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 47
            yield "                            <div class=\"alert alert-danger d-flex align-items-center fade show\" role=\"alert\">
                                <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
                                <div>";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "</div>
                                <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        yield "
                        ";
        // line 54
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 54, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
                            <div class=\"form-floating mb-4\">
                                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 56, $this->source); })()), "email", [], "any", false, false, false, 56), 'widget', ["attr" => ["class" => "form-control form-control-lg rounded-3", "placeholder" => "nom@exemple.com", "autocomplete" => "email"]]);
        // line 62
        yield "
                                ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 63, $this->source); })()), "email", [], "any", false, false, false, 63), 'label', ["label" => "Adresse email"]);
        yield "
                                <div class=\"invalid-feedback\">
                                    ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 65, $this->source); })()), "email", [], "any", false, false, false, 65), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"alert alert-info bg-light border-info border-start border-4 rounded-3 mb-4\">
                                <div class=\"d-flex\">
                                    <i class=\"bi bi-info-circle-fill text-info me-2 fs-5\"></i>
                                    <div>
                                        <h6 class=\"alert-heading fw-bold mb-1\">Comment ça marche ?</h6>
                                        <p class=\"mb-0 text-muted small\">
                                            1. Entrez votre adresse email<br>
                                            2. Vérifiez votre boîte de réception<br>
                                            3. Cliquez sur le lien reçu<br>
                                            4. Créez votre nouveau mot de passe
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class=\"d-grid gap-2\">
                                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3\">
                                    <i class=\"bi bi-envelope-paper me-2\"></i>
                                    Envoyer les instructions
                                </button>
                            </div>
                        ";
        // line 90
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["requestForm"]) || array_key_exists("requestForm", $context) ? $context["requestForm"] : (function () { throw new RuntimeError('Variable "requestForm" does not exist.', 90, $this->source); })()), 'form_end');
        yield "

                        <div class=\"text-center mt-4\">
                            <a href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-decoration-none text-muted back-to-login\">
                                <i class=\"bi bi-arrow-left me-1\"></i>
                                Retour à la connexion
                            </a>
                        </div>
                    </div>
                </div>

                <div class=\"text-center mt-4\">
                    <p class=\"text-muted small\">
                        <i class=\"bi bi-shield-check me-1\"></i>
                        Vos données sont protégées et sécurisées
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

    // line 112
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

        // line 113
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Animation des alertes
        document.addEventListener('DOMContentLoaded', function() {
            // Activer tous les tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Validation du formulaire
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
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
        return "reset_password/request.html.twig";
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
        return array (  279 => 113,  266 => 112,  237 => 93,  231 => 90,  203 => 65,  198 => 63,  195 => 62,  193 => 56,  188 => 54,  185 => 53,  175 => 49,  171 => 47,  167 => 46,  154 => 35,  141 => 34,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Réinitialisez votre mot de passe{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .card {
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .btn-primary {
            transition: all 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }
        .back-to-login {
            transition: all 0.2s ease;
        }
        .back-to-login:hover {
            color: var(--bs-primary) !important;
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <div class=\"row justify-content-center min-vh-100 align-items-center py-5\">
            <div class=\"col-12 col-sm-10 col-md-8 col-lg-5\">
                <div class=\"text-center mb-4\">
                    <i class=\"bi bi-shield-lock display-1 text-primary mb-3\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Réinitialisation du mot de passe</h1>
                    <p class=\"text-muted\">Nous vous aiderons à récupérer votre compte en toute sécurité</p>
                </div>

                <div class=\"card shadow border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        {% for flash_error in app.flashes('reset_password_error') %}
                            <div class=\"alert alert-danger d-flex align-items-center fade show\" role=\"alert\">
                                <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
                                <div>{{ flash_error }}</div>
                                <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                        {% endfor %}

                        {{ form_start(requestForm, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
                            <div class=\"form-floating mb-4\">
                                {{ form_widget(requestForm.email, {
                                    'attr': {
                                        'class': 'form-control form-control-lg rounded-3',
                                        'placeholder': 'nom@exemple.com',
                                        'autocomplete': 'email'
                                    }
                                }) }}
                                {{ form_label(requestForm.email, 'Adresse email') }}
                                <div class=\"invalid-feedback\">
                                    {{ form_errors(requestForm.email) }}
                                </div>
                            </div>

                            <div class=\"alert alert-info bg-light border-info border-start border-4 rounded-3 mb-4\">
                                <div class=\"d-flex\">
                                    <i class=\"bi bi-info-circle-fill text-info me-2 fs-5\"></i>
                                    <div>
                                        <h6 class=\"alert-heading fw-bold mb-1\">Comment ça marche ?</h6>
                                        <p class=\"mb-0 text-muted small\">
                                            1. Entrez votre adresse email<br>
                                            2. Vérifiez votre boîte de réception<br>
                                            3. Cliquez sur le lien reçu<br>
                                            4. Créez votre nouveau mot de passe
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class=\"d-grid gap-2\">
                                <button type=\"submit\" class=\"btn btn-primary btn-lg rounded-3\">
                                    <i class=\"bi bi-envelope-paper me-2\"></i>
                                    Envoyer les instructions
                                </button>
                            </div>
                        {{ form_end(requestForm) }}

                        <div class=\"text-center mt-4\">
                            <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none text-muted back-to-login\">
                                <i class=\"bi bi-arrow-left me-1\"></i>
                                Retour à la connexion
                            </a>
                        </div>
                    </div>
                </div>

                <div class=\"text-center mt-4\">
                    <p class=\"text-muted small\">
                        <i class=\"bi bi-shield-check me-1\"></i>
                        Vos données sont protégées et sécurisées
                    </p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Animation des alertes
        document.addEventListener('DOMContentLoaded', function() {
            // Activer tous les tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Validation du formulaire
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
{% endblock %}
", "reset_password/request.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/reset_password/request.html.twig");
    }
}
