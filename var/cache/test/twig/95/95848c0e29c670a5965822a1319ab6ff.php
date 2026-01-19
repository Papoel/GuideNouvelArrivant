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

/* reset_password/check_email.html.twig */
class __TwigTemplate_d0ad853abf7f63464730f0fe6fbe23c4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/check_email.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/check_email.html.twig"));

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

        yield "Email de réinitialisation envoyé";
        
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
        .btn-primary {
            transition: all 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }
        .email-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
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

    // line 38
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

        // line 39
        yield "    <div class=\"container\">
        <div class=\"row justify-content-center min-vh-100 align-items-center py-5\">
            <div class=\"col-12 col-sm-10 col-md-8 col-lg-5\">
                <div class=\"text-center mb-4\">
                    <i class=\"bi bi-envelope-paper-heart display-1 text-primary mb-3 email-animation\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Email envoyé avec succès !</h1>
                    <p class=\"text-muted\">Vérifiez votre boîte de réception pour réinitialiser votre mot de passe</p>
                </div>

                <div class=\"card shadow border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        <div class=\"alert alert-success bg-light border-success border-start border-4 mb-4\">
                            <div class=\"d-flex\">
                                <i class=\"bi bi-check-circle-fill text-success me-2 fs-5\"></i>
                                <div>
                                    <h6 class=\"alert-heading fw-bold mb-1\">Instructions envoyées</h6>
                                    <p class=\"mb-0 text-muted\">
                                        Si un compte correspond à votre adresse email, vous recevrez un lien pour réinitialiser votre mot de passe.
                                        Ce lien expirera dans ";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 57, $this->source); })()), "expirationMessageKey", [], "any", false, false, false, 57), CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 57, $this->source); })()), "expirationMessageData", [], "any", false, false, false, 57), "ResetPasswordBundle"), "html", null, true);
        yield ".
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class=\"alert alert-info bg-light border-info border-start border-4 mb-4\">
                            <div class=\"d-flex\">
                                <i class=\"bi bi-info-circle-fill text-info me-2 fs-5\"></i>
                                <div>
                                    <h6 class=\"alert-heading fw-bold mb-1\">Vous n'avez pas reçu l'email ?</h6>
                                    <p class=\"mb-0 text-muted\">
                                        1. Vérifiez votre dossier spam<br>
                                        2. Attendez quelques minutes<br>
                                        3. Vérifiez que l'adresse email est correcte
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class=\"d-grid gap-2\">
                            <a href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password_request");
        yield "\" class=\"btn btn-primary btn-lg rounded-3\">
                                <i class=\"bi bi-envelope me-2\"></i>
                                Renvoyer les instructions
                            </a>
                        </div>

                        <div class=\"text-center mt-4\">
                            <a href=\"";
        // line 85
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
                        <i class=\"bi bi-clock me-1\"></i>
                        Le lien de réinitialisation expirera dans ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 96, $this->source); })()), "expirationMessageKey", [], "any", false, false, false, 96), CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 96, $this->source); })()), "expirationMessageData", [], "any", false, false, false, 96), "ResetPasswordBundle"), "html", null, true);
        yield "
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

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "reset_password/check_email.html.twig";
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
        return array (  225 => 96,  211 => 85,  201 => 78,  177 => 57,  157 => 39,  144 => 38,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Email de réinitialisation envoyé{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .card {
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-primary {
            transition: all 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }
        .email-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
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
                    <i class=\"bi bi-envelope-paper-heart display-1 text-primary mb-3 email-animation\"></i>
                    <h1 class=\"h3 mb-3 fw-normal text-secondary\">Email envoyé avec succès !</h1>
                    <p class=\"text-muted\">Vérifiez votre boîte de réception pour réinitialiser votre mot de passe</p>
                </div>

                <div class=\"card shadow border-0 rounded-4\">
                    <div class=\"card-body p-4 p-md-5\">
                        <div class=\"alert alert-success bg-light border-success border-start border-4 mb-4\">
                            <div class=\"d-flex\">
                                <i class=\"bi bi-check-circle-fill text-success me-2 fs-5\"></i>
                                <div>
                                    <h6 class=\"alert-heading fw-bold mb-1\">Instructions envoyées</h6>
                                    <p class=\"mb-0 text-muted\">
                                        Si un compte correspond à votre adresse email, vous recevrez un lien pour réinitialiser votre mot de passe.
                                        Ce lien expirera dans {{ resetToken.expirationMessageKey|trans(resetToken.expirationMessageData, 'ResetPasswordBundle') }}.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class=\"alert alert-info bg-light border-info border-start border-4 mb-4\">
                            <div class=\"d-flex\">
                                <i class=\"bi bi-info-circle-fill text-info me-2 fs-5\"></i>
                                <div>
                                    <h6 class=\"alert-heading fw-bold mb-1\">Vous n'avez pas reçu l'email ?</h6>
                                    <p class=\"mb-0 text-muted\">
                                        1. Vérifiez votre dossier spam<br>
                                        2. Attendez quelques minutes<br>
                                        3. Vérifiez que l'adresse email est correcte
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class=\"d-grid gap-2\">
                            <a href=\"{{ path('app_forgot_password_request') }}\" class=\"btn btn-primary btn-lg rounded-3\">
                                <i class=\"bi bi-envelope me-2\"></i>
                                Renvoyer les instructions
                            </a>
                        </div>

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
                        <i class=\"bi bi-clock me-1\"></i>
                        Le lien de réinitialisation expirera dans {{ resetToken.expirationMessageKey|trans(resetToken.expirationMessageData, 'ResetPasswordBundle') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "reset_password/check_email.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/reset_password/check_email.html.twig");
    }
}
