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

/* admin/user/assign_template.html.twig */
class __TwigTemplate_d2d540033d22cff0f618ef5612eb1d79 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/assign_template.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/assign_template.html.twig"));

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

        yield "Assigner un modèle de carnet à ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 3, $this->source); })()), "fullName", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-dark: #2d4a7d; /* Version plus foncée pour meilleur contraste */
            --primary-light: rgba(61, 95, 158, 0.15); /* Fond plus opaque pour meilleur contraste */
            --text-dark: #2c384e;
            --text-muted: #5d6778; /* Plus foncé que #6c757d pour meilleur contraste */
            --bg-light: #f8f9fa;
            --border-color: #d1d7e0; /* Plus foncé que #e9ecef pour meilleur contraste */
            --success-color: #2e7d32; /* Vert plus foncé pour meilleur contraste */
            --warning-color: #e65100; /* Orange plus foncé pour meilleur contraste */
            --info-color: #0277bd; /* Bleu info plus foncé */
            --danger-color: #c62828; /* Rouge plus foncé */
            --card-radius: 0.75rem;
            --transition-speed: 0.2s;
            --focus-ring-color: rgba(61, 95, 158, 0.5);
        }

        /* Boutons */
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover, .btn-outline-primary:focus {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Adaptations mobiles */
        @media (max-width: 767.98px) {
            .content-card .card-header {
                padding: 0.75rem 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .badge {
                font-size: 0.7rem;
            }
        }
    </style>

<div class=\"container-fluid py-3 py-md-4\">
    <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
        <div>
            <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-book me-2 me-md-3\" aria-hidden=\"true\"></i>Assigner un modèle de carnet</h1>
            <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Attribuez un carnet à ";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 75, $this->source); })()), "fullName", [], "any", false, false, false, 75), "html", null, true);
        yield " en fonction de son métier</p>
        </div>
        <div>
            <a
                href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        yield "\"
                class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                style=\"padding: 0.6rem 1.2rem;\"
                aria-label=\"Retour au tableau de bord\"
            >
                <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Tableau de bord
            </a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"card-header\">
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-person-vcard me-2\" aria-hidden=\"true\"></i>Informations utilisateur</h2>
        </div>
        <div class=\"card-body p-4\">
            <div class=\"row g-4\">
                <div class=\"col-md-6\">
                    <div class=\"user-info-card p-3 border rounded bg-light\">
                        <div class=\"d-flex align-items-center mb-3\">
                            <div class=\"rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center p-3 me-3\" style=\"width: 50px; height: 50px;\">
                                <i class=\"bi bi-person\" style=\"color: var(--primary-color); font-size: 1.5rem;\"></i>
                            </div>
                            <div>
                                <h3 class=\"h5 mb-0 fw-bold\">";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 102, $this->source); })()), "fullName", [], "any", false, false, false, 102), "html", null, true);
        yield "</h3>
                                <p class=\"mb-0 text-muted\">";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 103, $this->source); })()), "email", [], "any", false, false, false, 103), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                        <div class=\"row g-2\">
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-briefcase me-2 text-muted\"></i>
                                    <span><strong>Métier:</strong> ";
        // line 110
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 110, $this->source); })()), "job", [], "any", false, false, false, 110), "name", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 110, $this->source); })()), "job", [], "any", false, false, false, 110), "name", [], "any", false, false, false, 110), "html", null, true)) : ("Non défini"));
        yield "</span>
                                </div>
                            </div>
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-building me-2 text-muted\"></i>
                                    <span><strong>Service:</strong> ";
        // line 116
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 116, $this->source); })()), "service", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 116, $this->source); })()), "service", [], "any", false, false, false, 116), "name", [], "any", false, false, false, 116), "html", null, true)) : ("Non défini"));
        yield "</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"content-card mt-4\">
        <div class=\"card-header\">
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-journal-bookmark me-2\" aria-hidden=\"true\"></i>Modèles de carnet compatibles</h2>
        </div>
        <div class=\"card-body p-4\">
            ";
        // line 131
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["templates"]) || array_key_exists("templates", $context) ? $context["templates"] : (function () { throw new RuntimeError('Variable "templates" does not exist.', 131, $this->source); })())) > 0)) {
            // line 132
            yield "                <form method=\"post\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_assign_template", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 132, $this->source); })()), "id", [], "any", false, false, false, 132)]), "html", null, true);
            yield "\">
                    <div class=\"form-group mb-4\">
                        <label for=\"template\" class=\"form-label fw-bold\">Sélectionnez un modèle :</label>
                        <select name=\"template\" id=\"template\" class=\"form-select form-select shadow-sm\" required>
                            <option value=\"\">-- Choisir un modèle --</option>
                            ";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["templates"]) || array_key_exists("templates", $context) ? $context["templates"] : (function () { throw new RuntimeError('Variable "templates" does not exist.', 137, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["template"]) {
                // line 138
                yield "                                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["template"], "id", [], "any", false, false, false, 138), "html", null, true);
                yield "\" ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["template"], "isDefault", [], "any", false, false, false, 138)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "class=\"fw-bold\"";
                }
                yield ">
                                    ";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["template"], "name", [], "any", false, false, false, 139), "html", null, true);
                yield " ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["template"], "isDefault", [], "any", false, false, false, 139)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"text-success\">(Par défaut)</span>";
                }
                // line 140
                yield "                                </option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['template'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            yield "                        </select>
                    </div>

                    <div class=\"d-flex justify-content-end gap-3\">
                        <a href=\"";
            // line 146
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-x-circle me-2\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-check-circle me-2\"></i> Assigner ce modèle
                        </button>
                    </div>
                </form>
            ";
        } else {
            // line 155
            yield "                <div class=\"empty-state text-center p-4\">
                    <div class=\"rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                        <i class=\"bi bi-exclamation-triangle\" style=\"color: var(--warning-color); font-size: 2.5rem;\"></i>
                    </div>
                    <h3 class=\"h4 mb-3 fw-bold\">Aucun modèle compatible</h3>
                    <p class=\"text-muted mb-4\">Aucun modèle compatible avec le métier de cet utilisateur n'a été trouvé.</p>
                    <a href=\"";
            // line 161
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                        <i class=\"bi bi-arrow-left me-2\"></i> Retour au tableau de bord
                    </a>
                </div>
            ";
        }
        // line 166
        yield "        </div>
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
        return "admin/user/assign_template.html.twig";
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
        return array (  317 => 166,  309 => 161,  301 => 155,  289 => 146,  283 => 142,  276 => 140,  270 => 139,  261 => 138,  257 => 137,  248 => 132,  246 => 131,  228 => 116,  219 => 110,  209 => 103,  205 => 102,  179 => 79,  172 => 75,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Assigner un modèle de carnet à {{ user.fullName }}{% endblock %}

{% block body %}
    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-dark: #2d4a7d; /* Version plus foncée pour meilleur contraste */
            --primary-light: rgba(61, 95, 158, 0.15); /* Fond plus opaque pour meilleur contraste */
            --text-dark: #2c384e;
            --text-muted: #5d6778; /* Plus foncé que #6c757d pour meilleur contraste */
            --bg-light: #f8f9fa;
            --border-color: #d1d7e0; /* Plus foncé que #e9ecef pour meilleur contraste */
            --success-color: #2e7d32; /* Vert plus foncé pour meilleur contraste */
            --warning-color: #e65100; /* Orange plus foncé pour meilleur contraste */
            --info-color: #0277bd; /* Bleu info plus foncé */
            --danger-color: #c62828; /* Rouge plus foncé */
            --card-radius: 0.75rem;
            --transition-speed: 0.2s;
            --focus-ring-color: rgba(61, 95, 158, 0.5);
        }

        /* Boutons */
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover, .btn-outline-primary:focus {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Adaptations mobiles */
        @media (max-width: 767.98px) {
            .content-card .card-header {
                padding: 0.75rem 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .badge {
                font-size: 0.7rem;
            }
        }
    </style>

<div class=\"container-fluid py-3 py-md-4\">
    <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
        <div>
            <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-book me-2 me-md-3\" aria-hidden=\"true\"></i>Assigner un modèle de carnet</h1>
            <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Attribuez un carnet à {{ user.fullName }} en fonction de son métier</p>
        </div>
        <div>
            <a
                href=\"{{ path('admin') }}\"
                class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                style=\"padding: 0.6rem 1.2rem;\"
                aria-label=\"Retour au tableau de bord\"
            >
                <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Tableau de bord
            </a>
        </div>
    </div>

    <div class=\"content-card\">
        <div class=\"card-header\">
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-person-vcard me-2\" aria-hidden=\"true\"></i>Informations utilisateur</h2>
        </div>
        <div class=\"card-body p-4\">
            <div class=\"row g-4\">
                <div class=\"col-md-6\">
                    <div class=\"user-info-card p-3 border rounded bg-light\">
                        <div class=\"d-flex align-items-center mb-3\">
                            <div class=\"rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center p-3 me-3\" style=\"width: 50px; height: 50px;\">
                                <i class=\"bi bi-person\" style=\"color: var(--primary-color); font-size: 1.5rem;\"></i>
                            </div>
                            <div>
                                <h3 class=\"h5 mb-0 fw-bold\">{{ user.fullName }}</h3>
                                <p class=\"mb-0 text-muted\">{{ user.email }}</p>
                            </div>
                        </div>
                        <div class=\"row g-2\">
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-briefcase me-2 text-muted\"></i>
                                    <span><strong>Métier:</strong> {{ user.job.name ? user.job.name : 'Non défini' }}</span>
                                </div>
                            </div>
                            <div class=\"col-sm-6\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"bi bi-building me-2 text-muted\"></i>
                                    <span><strong>Service:</strong> {{ user.service ? user.service.name : 'Non défini' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"content-card mt-4\">
        <div class=\"card-header\">
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-journal-bookmark me-2\" aria-hidden=\"true\"></i>Modèles de carnet compatibles</h2>
        </div>
        <div class=\"card-body p-4\">
            {% if templates|length > 0 %}
                <form method=\"post\" action=\"{{ path('admin_user_assign_template', {'id': user.id}) }}\">
                    <div class=\"form-group mb-4\">
                        <label for=\"template\" class=\"form-label fw-bold\">Sélectionnez un modèle :</label>
                        <select name=\"template\" id=\"template\" class=\"form-select form-select shadow-sm\" required>
                            <option value=\"\">-- Choisir un modèle --</option>
                            {% for template in templates %}
                                <option value=\"{{ template.id }}\" {% if template.isDefault %}class=\"fw-bold\"{% endif %}>
                                    {{ template.name }} {% if template.isDefault %}<span class=\"text-success\">(Par défaut)</span>{% endif %}
                                </option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class=\"d-flex justify-content-end gap-3\">
                        <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-x-circle me-2\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-check-circle me-2\"></i> Assigner ce modèle
                        </button>
                    </div>
                </form>
            {% else %}
                <div class=\"empty-state text-center p-4\">
                    <div class=\"rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                        <i class=\"bi bi-exclamation-triangle\" style=\"color: var(--warning-color); font-size: 2.5rem;\"></i>
                    </div>
                    <h3 class=\"h4 mb-3 fw-bold\">Aucun modèle compatible</h3>
                    <p class=\"text-muted mb-4\">Aucun modèle compatible avec le métier de cet utilisateur n'a été trouvé.</p>
                    <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                        <i class=\"bi bi-arrow-left me-2\"></i> Retour au tableau de bord
                    </a>
                </div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}
", "admin/user/assign_template.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/user/assign_template.html.twig");
    }
}
