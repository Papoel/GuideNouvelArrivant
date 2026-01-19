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

/* security/login.html.twig */
class __TwigTemplate_f7480563005ec8a69220295902e6fb5b extends Template
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
            'body_class' => [$this, 'block_body_class'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

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

        yield "Connexion - Guide du Nouvel Arrivant";
        
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
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/login.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_class(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        yield "login-page";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        // line 12
        yield "    <div class=\"login-container\">
        <!-- Fond animé -->
        <div class=\"background\">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Carte de connexion -->
        <div class=\"login-card\" data-aos=\"zoom-in\" data-aos-duration=\"800\">
            <div class=\"brand-logo\" data-aos=\"fade-down\" data-aos-delay=\"400\">
                <img src=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/edf.svg"), "html", null, true);
        yield "\" alt=\"EDF Logo\" class=\"edf-logo\">
                <div class=\"logo-shine\"></div>
            </div>

            <h1 class=\"title\" data-aos=\"fade-up\" data-aos-delay=\"600\">
                <span class=\"gradient-text\">Bienvenue</span>
            </h1>

            <p class=\"subtitle\" data-aos=\"fade-up\" data-aos-delay=\"700\">
                Accédez à votre espace personnel
            </p>

            <!-- Messages d'erreur/info -->
            ";
        // line 40
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 40, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "                <div class=\"alert error\" data-aos=\"fade-in\" data-aos-delay=\"100\">
                    <i class=\"bi bi-exclamation-triangle\"></i>
                    ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 43, $this->source); })()), "messageKey", [], "any", false, false, false, 43), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 43, $this->source); })()), "messageData", [], "any", false, false, false, 43), "security"), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 46
        yield "
            ";
        // line 47
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 47, $this->source); })()), "user", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 48
            yield "                <div class=\"alert info\" data-aos=\"fade-in\" data-aos-delay=\"100\">
                    <i class=\"bi bi-info-circle\"></i>
                    Vous êtes connecté en tant que ";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "userIdentifier", [], "any", false, false, false, 50), "html", null, true);
            yield "
                    <a href=\"";
            // line 51
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"alert-link\">Se déconnecter</a>
                </div>
            ";
        }
        // line 54
        yield "
            <!-- Formulaire -->
            <form id=\"loginForm\" method=\"post\" class=\"login-form\" data-aos=\"fade-up\" data-aos-delay=\"800\">
                <div class=\"form-group\">
                    <div class=\"input-wrapper\">
                        <input type=\"text\"
                               id=\"inputEmail\"
                               name=\"identifier\"
                               value=\"";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 62, $this->source); })()), "html", null, true);
        yield "\"
                               required
                               autofocus>
                        <label for=\"inputEmail\">Email ou NNI</label>
                        <i class=\"bi bi-envelope input-icon\"></i>
                        <div class=\"input-underline\"></div>
                    </div>
                </div>

                <div class=\"form-group\">
                    <div class=\"input-wrapper\">
                        <input type=\"password\"
                               id=\"inputPassword\"
                               name=\"password\"
                               required>
                        <label for=\"inputPassword\">Mot de passe</label>
                        <i class=\"bi bi-lock input-icon\"></i>
                        <button type=\"button\" class=\"toggle-password\" onclick=\"togglePassword()\" aria-label=\"Toggle password visibility\">
                            <i class=\"bi bi-eye-slash\"></i>
                        </button>
                        <div class=\"input-underline\"></div>
                    </div>
                </div>

                <div class=\"form-options\">
                    <label class=\"custom-checkbox\">
                        <input type=\"checkbox\" name=\"_remember_me\">
                        <span class=\"checkmark\"></span>
                        <span>Se souvenir de moi</span>
                    </label>

                    <a href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password_request");
        yield "\" class=\"forgot-password\">
                        Mot de passe oublié ?
                    </a>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

                <button type=\"submit\" class=\"submit-btn\">
                    <span class=\"btn-content\">Se connecter</span>
                    <i class=\"bi bi-arrow-right\"></i>
                    <div class=\"btn-glow\"></div>
                </button>

                <div class=\"register-link\">
                    <span>Pas encore de compte ?</span>
                    <em>Demandez à P.BRIFFARD</em>
                </div>
            </form>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 115
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

        // line 116
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Toggle password visibility
        function togglePassword() {
            const input = document.getElementById('inputPassword');
            const icon = document.querySelector('.toggle-password i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Input animations
        document.querySelectorAll('.input-wrapper input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });

            if (input.value) {
                input.parentElement.classList.add('focused');
            }
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
        return "security/login.html.twig";
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
        return array (  313 => 116,  300 => 115,  273 => 98,  265 => 93,  231 => 62,  221 => 54,  215 => 51,  211 => 50,  207 => 48,  205 => 47,  202 => 46,  196 => 43,  192 => 41,  190 => 40,  174 => 27,  157 => 12,  144 => 11,  121 => 10,  108 => 7,  103 => 6,  90 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Connexion - Guide du Nouvel Arrivant{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('styles/login.css') }}\">
{% endblock %}

{% block body_class %}login-page{% endblock %}
{% block body %}
    <div class=\"login-container\">
        <!-- Fond animé -->
        <div class=\"background\">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Carte de connexion -->
        <div class=\"login-card\" data-aos=\"zoom-in\" data-aos-duration=\"800\">
            <div class=\"brand-logo\" data-aos=\"fade-down\" data-aos-delay=\"400\">
                <img src=\"{{ asset('images/logos/edf.svg') }}\" alt=\"EDF Logo\" class=\"edf-logo\">
                <div class=\"logo-shine\"></div>
            </div>

            <h1 class=\"title\" data-aos=\"fade-up\" data-aos-delay=\"600\">
                <span class=\"gradient-text\">Bienvenue</span>
            </h1>

            <p class=\"subtitle\" data-aos=\"fade-up\" data-aos-delay=\"700\">
                Accédez à votre espace personnel
            </p>

            <!-- Messages d'erreur/info -->
            {% if error %}
                <div class=\"alert error\" data-aos=\"fade-in\" data-aos-delay=\"100\">
                    <i class=\"bi bi-exclamation-triangle\"></i>
                    {{ error.messageKey|trans(error.messageData, 'security') }}
                </div>
            {% endif %}

            {% if app.user %}
                <div class=\"alert info\" data-aos=\"fade-in\" data-aos-delay=\"100\">
                    <i class=\"bi bi-info-circle\"></i>
                    Vous êtes connecté en tant que {{ app.user.userIdentifier }}
                    <a href=\"{{ path('app_logout') }}\" class=\"alert-link\">Se déconnecter</a>
                </div>
            {% endif %}

            <!-- Formulaire -->
            <form id=\"loginForm\" method=\"post\" class=\"login-form\" data-aos=\"fade-up\" data-aos-delay=\"800\">
                <div class=\"form-group\">
                    <div class=\"input-wrapper\">
                        <input type=\"text\"
                               id=\"inputEmail\"
                               name=\"identifier\"
                               value=\"{{ last_username }}\"
                               required
                               autofocus>
                        <label for=\"inputEmail\">Email ou NNI</label>
                        <i class=\"bi bi-envelope input-icon\"></i>
                        <div class=\"input-underline\"></div>
                    </div>
                </div>

                <div class=\"form-group\">
                    <div class=\"input-wrapper\">
                        <input type=\"password\"
                               id=\"inputPassword\"
                               name=\"password\"
                               required>
                        <label for=\"inputPassword\">Mot de passe</label>
                        <i class=\"bi bi-lock input-icon\"></i>
                        <button type=\"button\" class=\"toggle-password\" onclick=\"togglePassword()\" aria-label=\"Toggle password visibility\">
                            <i class=\"bi bi-eye-slash\"></i>
                        </button>
                        <div class=\"input-underline\"></div>
                    </div>
                </div>

                <div class=\"form-options\">
                    <label class=\"custom-checkbox\">
                        <input type=\"checkbox\" name=\"_remember_me\">
                        <span class=\"checkmark\"></span>
                        <span>Se souvenir de moi</span>
                    </label>

                    <a href=\"{{ path('app_forgot_password_request') }}\" class=\"forgot-password\">
                        Mot de passe oublié ?
                    </a>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

                <button type=\"submit\" class=\"submit-btn\">
                    <span class=\"btn-content\">Se connecter</span>
                    <i class=\"bi bi-arrow-right\"></i>
                    <div class=\"btn-glow\"></div>
                </button>

                <div class=\"register-link\">
                    <span>Pas encore de compte ?</span>
                    <em>Demandez à P.BRIFFARD</em>
                </div>
            </form>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Toggle password visibility
        function togglePassword() {
            const input = document.getElementById('inputPassword');
            const icon = document.querySelector('.toggle-password i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Input animations
        document.querySelectorAll('.input-wrapper input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });

            if (input.value) {
                input.parentElement.classList.add('focused');
            }
        });
    </script>
{% endblock %}
", "security/login.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/security/login.html.twig");
    }
}
