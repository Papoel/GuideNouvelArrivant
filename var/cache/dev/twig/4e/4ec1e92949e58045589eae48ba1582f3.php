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

/* admin/user/batch_assign_templates.html.twig */
class __TwigTemplate_cee1e6fac03bb9740f917130506a5d8e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/batch_assign_templates.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/batch_assign_templates.html.twig"));

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

        yield "Assignation automatique de modèles de carnet";
        
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

        // line 146
        yield "
<div class=\"container-fluid py-3 py-md-4\">
    <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
        <div>
            <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-book me-2 me-md-3\" aria-hidden=\"true\"></i>Assignation automatique de modèles de carnet</h1>
            <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Attribuez des carnets aux utilisateurs en fonction de leur métier</p>
        </div>
        <div>
            <a
                href=\"";
        // line 155
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
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-person-workspace me-2\" aria-hidden=\"true\"></i>Utilisateurs sans carnet</h2>
        </div>
        <div class=\"card-body px-2\">
            ";
        // line 170
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 170, $this->source); })())) > 0)) {
            // line 171
            yield "                ";
            // line 172
            yield "                <div class=\"d-none d-lg-block table-responsive\">
                    <table class=\"table table-hover align-middle data-table\" aria-describedby=\"page-title\">
                        <caption class=\"sr-only\">Liste des utilisateurs sans carnet</caption>
                        <thead>
                            <tr>
                                <th scope=\"col\" class=\"py-3\">Nom</th>
                                <th scope=\"col\" class=\"py-3\">Email</th>
                                <th scope=\"col\" class=\"py-3\">Métier</th>
                                <th scope=\"col\" class=\"py-3\">Service</th>
                                <th scope=\"col\" class=\"py-3 text-end\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 185
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 185, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 186
                yield "                                <tr>
                                    <td class=\"py-3\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"rounded-circle bg-primary bg-opacity-10 p-2 me-2\" aria-hidden=\"true\">
                                                <i class=\"bi bi-person\" style=\"color: var(--primary-color);\"></i>
                                            </div>
                                            <span class=\"fw-medium\">";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "fullName", [], "any", false, false, false, 192), "html", null, true);
                yield "</span>
                                        </div>
                                    </td>
                                    <td class=\"py-3\">";
                // line 195
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 195), "html", null, true);
                yield "</td>
                                    <td class=\"py-3\">
                                        ";
                // line 197
                $context["metier"] = ["CHARGE_AFFAIRES_PROJET" => "Charge d'Affaires Projet", "CHARGE_AFFAIRES" => "Charge d'Affaires", "INGENIEUR" => "Ingénieur", "TECHNICIEN" => "Technicien", "CHARGE_SURVEILLANCE" => "CSI", "MANAGER_PREMIERE_LIGNE" => "MPL"];
                // line 205
                yield "                                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 205)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 206
                    yield "                                            <span class=\"badge rounded-pill bg-primary bg-opacity-75 fw-light ls-1\">
                                                ";
                    // line 207
                    yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metier"] ?? null), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 207), "name", [], "any", false, false, false, 207), [], "array", true, true, false, 207) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metier"]) || array_key_exists("metier", $context) ? $context["metier"] : (function () { throw new RuntimeError('Variable "metier" does not exist.', 207, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 207), "name", [], "any", false, false, false, 207), [], "array", false, false, false, 207)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metier"]) || array_key_exists("metier", $context) ? $context["metier"] : (function () { throw new RuntimeError('Variable "metier" does not exist.', 207, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 207), "name", [], "any", false, false, false, 207), [], "array", false, false, false, 207), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 207), "name", [], "any", false, false, false, 207), "html", null, true)));
                    yield "
                                            </span>
                                        ";
                } else {
                    // line 210
                    yield "                                            <span class=\"badge rounded-pill bg-secondary\">Non défini</span>
                                        ";
                }
                // line 212
                yield "                                    </td>
                                    <td class=\"py-3\">
                                        ";
                // line 214
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "service", [], "any", false, false, false, 214)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 215
                    yield "                                            <span class=\"badge rounded-pill bg-success bg-opacity-75 fw-light ls-1\">
                                                ";
                    // line 216
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "service", [], "any", false, false, false, 216), "name", [], "any", false, false, false, 216), "html", null, true);
                    yield "
                                            </span>
                                        ";
                } else {
                    // line 219
                    yield "                                            <span class=\"badge rounded-pill bg-secondary\">Non défini</span>
                                        ";
                }
                // line 221
                yield "                                    </td>
                                    <td class=\"py-3 text-end\">
                                        <a href=\"";
                // line 223
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_assign_template", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 223)]), "html", null, true);
                yield "\"
                                           class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                           style=\"padding: 0.4rem 1rem;\">
                                            <i class=\"bi bi-plus-circle me-1\"></i> Assigner
                                        </a>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 231
            yield "                        </tbody>
                    </table>
                </div>

                ";
            // line 236
            yield "                <div class=\"d-lg-none\">
                    <div class=\"row g-3 p-3\">
                        ";
            // line 238
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 238, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 239
                yield "                            <div class=\"col-12\">
                                <div class=\"card shadow-sm h-100 border-0\" style=\"border-radius: var(--card-radius);\">
                                    <div class=\"card-body p-3\">
                                        <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                            <h3 class=\"h6 fw-bold mb-0\">";
                // line 243
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "fullName", [], "any", false, false, false, 243), "html", null, true);
                yield "</h3>
                                            ";
                // line 244
                $context["metier"] = ["CHARGE_AFFAIRES_PROJET" => "Charge Affaires Projet", "CHARGE_AFFAIRES" => "Charge d'Affaires", "INGENIEUR" => "Ingénieur", "TECHNICIEN" => "Technicien", "CHARGE_SURVEILLANCE" => "CSI", "MANAGER_PREMIERE_LIGNE" => "MPL"];
                // line 252
                yield "                                            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 252)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 253
                    yield "                                                <span class=\"badge rounded-pill bg-primary bg-opacity-75 fw-light ls-1\">
                                                    ";
                    // line 254
                    yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["metier"] ?? null), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 254), "name", [], "any", false, false, false, 254), [], "array", true, true, false, 254) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["metier"]) || array_key_exists("metier", $context) ? $context["metier"] : (function () { throw new RuntimeError('Variable "metier" does not exist.', 254, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 254), "name", [], "any", false, false, false, 254), [], "array", false, false, false, 254)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["metier"]) || array_key_exists("metier", $context) ? $context["metier"] : (function () { throw new RuntimeError('Variable "metier" does not exist.', 254, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 254), "name", [], "any", false, false, false, 254), [], "array", false, false, false, 254), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "job", [], "any", false, false, false, 254), "name", [], "any", false, false, false, 254), "html", null, true)));
                    yield "
                                                </span>
                                            ";
                }
                // line 257
                yield "                                        </div>
                                        <p class=\"text-muted mb-2 small\">";
                // line 258
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 258), "html", null, true);
                yield "</p>
                                        ";
                // line 259
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "service", [], "any", false, false, false, 259)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 260
                    yield "                                            <p class=\"mb-3\">
                                                <span class=\"badge rounded-pill bg-success bg-opacity-75 fw-light ls-1\">
                                                    ";
                    // line 262
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "service", [], "any", false, false, false, 262), "name", [], "any", false, false, false, 262), "html", null, true);
                    yield "
                                                </span>
                                            </p>
                                        ";
                }
                // line 266
                yield "                                        <div class=\"d-flex justify-content-end mt-3\">
                                            <a href=\"";
                // line 267
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_assign_template", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 267)]), "html", null, true);
                yield "\"
                                               class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                               style=\"padding: 0.4rem 1rem;\">
                                                <i class=\"bi bi-plus-circle me-1\"></i> Assigner
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 277
            yield "                    </div>
                </div>

                <div class=\"border-top p-3 p-md-4\">
                    <form method=\"post\" action=\"";
            // line 281
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_batch_assign_templates");
            yield "\">
                        <div class=\"card shadow-sm mb-4\" style=\"border-radius: var(--card-radius); border-left: 4px solid var(--info-color); transition: all var(--transition-speed) ease-in-out;\">
                            <div class=\"card-body p-3 p-md-4\">
                                <div class=\"d-flex align-items-start\">
                                    <div class=\"rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3\" style=\"width: 48px; height: 48px; min-width: 48px; align-self: center;\" aria-hidden=\"true\">
                                        <i class=\"bi bi-info-circle\" style=\"color: var(--info-color); font-size: 1.25rem;\"></i>
                                    </div>
                                    <div>
                                        <h3 class=\"h6 fw-bold mb-2 text-uppercase text-decoration-underline\">Information importante</h3>
                                        <p class=\"mb-0\" style=\"color: var(--text-dark); line-height: 1.5;\">
                                            Cette action attribuera automatiquement un carnet modèle par défaut à tous les utilisateurs listés ci-dessus, en fonction de leur métier.. <br>
                                            👉  Si un carnet doit être <strong style=\"color: #DC134C; text-decoration: underline #DC134C\">assigné à un agent ayant plus d’un an d’ancienneté</strong>, il faudra effectuer l’opération manuellement via : Carnet > Liste des carnets > Créer un carnet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=\"d-flex flex-column flex-md-row justify-content-between gap-3\">
                            <a href=\"";
            // line 300
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                                <i class=\"bi bi-arrow-left me-2\"></i> Retour
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                                <i class=\"bi bi-magic me-2\"></i> Assigner automatiquement
                            </button>
                        </div>
                    </form>
                </div>
            ";
        } else {
            // line 310
            yield "                <div class=\"p-4 p-md-5 text-center\">
                    <div class=\"empty-state\">
                        <div class=\"rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                            <i class=\"bi bi-check-circle\" style=\"color: var(--success-color); font-size: 2.5rem;\"></i>
                        </div>
                        <h3 class=\"h4 mb-3 fw-bold\">Tous les utilisateurs ont déjà un carnet</h3>
                        <p class=\"text-muted mb-4\">Il n'y a actuellement aucun utilisateur sans carnet assigné.</p>
                        <a href=\"";
            // line 317
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            yield "\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-arrow-left me-2\"></i> Retour au tableau de bord
                        </a>
                    </div>
                </div>
            ";
        }
        // line 323
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
        return "admin/user/batch_assign_templates.html.twig";
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
        return array (  362 => 323,  353 => 317,  344 => 310,  331 => 300,  309 => 281,  303 => 277,  287 => 267,  284 => 266,  277 => 262,  273 => 260,  271 => 259,  267 => 258,  264 => 257,  258 => 254,  255 => 253,  252 => 252,  250 => 244,  246 => 243,  240 => 239,  236 => 238,  232 => 236,  226 => 231,  212 => 223,  208 => 221,  204 => 219,  198 => 216,  195 => 215,  193 => 214,  189 => 212,  185 => 210,  179 => 207,  176 => 206,  173 => 205,  171 => 197,  166 => 195,  160 => 192,  152 => 186,  148 => 185,  133 => 172,  131 => 171,  129 => 170,  111 => 155,  100 => 146,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Assignation automatique de modèles de carnet{% endblock %}

{% block body %}
{#<style>
    /* Variables pour l'accessibilité et la cohérence */
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

    /* Styles de base et accessibilité */
    .ls-1 {
        letter-spacing: 1px;
    }

    /* Focus styles pour l'accessibilité */
    a:focus, button:focus, input:focus, select:focus, textarea:focus {
        outline: 3px solid var(--focus-ring-color) !important;
        outline-offset: 2px !important;
        box-shadow: none !important;
    }

    /* Mobile-first approach */
    .dashboard-header {
        border-left: 5px solid var(--primary-color);
        padding-left: 0.75rem;
        margin-bottom: 1.25rem;
    }

    .dashboard-header h1 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    @media (min-width: 768px) {
        .dashboard-header {
            padding-left: 1rem;
            margin-bottom: 1.5rem;
        }

        .dashboard-header h1 {
            font-size: 2rem;
        }
    }

    /* Cartes de contenu */
    .content-card {
        border-radius: var(--card-radius);
        border: 1px solid var(--border-color);
        box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
        background-color: #fff;
        margin-bottom: 1.5rem;
        overflow: hidden;
        transition: all var(--transition-speed) ease-in-out;
    }

    .content-card .card-header {
        background-color: var(--bg-light);
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 1.5rem;
    }

    /* Tableau responsive et accessible */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .data-table th {
        font-weight: 600;
        background-color: var(--bg-light);
        color: var(--text-dark);
    }

    .data-table td {
        vertical-align: middle;
        color: var(--text-dark);
    }

    /* Badges */
    .badge {
        padding: 0.4em 0.8em;
        font-weight: 500;
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
</style>#}

<div class=\"container-fluid py-3 py-md-4\">
    <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4\">
        <div>
            <h1 class=\"text-dark\" id=\"page-title\"><i class=\"bi bi-book me-2 me-md-3\" aria-hidden=\"true\"></i>Assignation automatique de modèles de carnet</h1>
            <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">Attribuez des carnets aux utilisateurs en fonction de leur métier</p>
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
            <h2 class=\"h5 mb-0 fw-bold\"><i class=\"bi bi-person-workspace me-2\" aria-hidden=\"true\"></i>Utilisateurs sans carnet</h2>
        </div>
        <div class=\"card-body px-2\">
            {% if users|length > 0 %}
                {# Vue tableau pour desktop #}
                <div class=\"d-none d-lg-block table-responsive\">
                    <table class=\"table table-hover align-middle data-table\" aria-describedby=\"page-title\">
                        <caption class=\"sr-only\">Liste des utilisateurs sans carnet</caption>
                        <thead>
                            <tr>
                                <th scope=\"col\" class=\"py-3\">Nom</th>
                                <th scope=\"col\" class=\"py-3\">Email</th>
                                <th scope=\"col\" class=\"py-3\">Métier</th>
                                <th scope=\"col\" class=\"py-3\">Service</th>
                                <th scope=\"col\" class=\"py-3 text-end\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for user in users %}
                                <tr>
                                    <td class=\"py-3\">
                                        <div class=\"d-flex align-items-center\">
                                            <div class=\"rounded-circle bg-primary bg-opacity-10 p-2 me-2\" aria-hidden=\"true\">
                                                <i class=\"bi bi-person\" style=\"color: var(--primary-color);\"></i>
                                            </div>
                                            <span class=\"fw-medium\">{{ user.fullName }}</span>
                                        </div>
                                    </td>
                                    <td class=\"py-3\">{{ user.email }}</td>
                                    <td class=\"py-3\">
                                        {% set metier = {
                                            'CHARGE_AFFAIRES_PROJET': 'Charge d\\'Affaires Projet',
                                            'CHARGE_AFFAIRES': 'Charge d\\'Affaires',
                                            'INGENIEUR': 'Ingénieur',
                                            'TECHNICIEN': 'Technicien',
                                            'CHARGE_SURVEILLANCE': 'CSI',
                                            'MANAGER_PREMIERE_LIGNE': 'MPL',
                                        } %}
                                        {% if user.job %}
                                            <span class=\"badge rounded-pill bg-primary bg-opacity-75 fw-light ls-1\">
                                                {{ metier[user.job.name] ?? user.job.name }}
                                            </span>
                                        {% else %}
                                            <span class=\"badge rounded-pill bg-secondary\">Non défini</span>
                                        {% endif %}
                                    </td>
                                    <td class=\"py-3\">
                                        {% if user.service %}
                                            <span class=\"badge rounded-pill bg-success bg-opacity-75 fw-light ls-1\">
                                                {{ user.service.name }}
                                            </span>
                                        {% else %}
                                            <span class=\"badge rounded-pill bg-secondary\">Non défini</span>
                                        {% endif %}
                                    </td>
                                    <td class=\"py-3 text-end\">
                                        <a href=\"{{ path('admin_user_assign_template', {'id': user.id}) }}\"
                                           class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                           style=\"padding: 0.4rem 1rem;\">
                                            <i class=\"bi bi-plus-circle me-1\"></i> Assigner
                                        </a>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>

                {# Vue cartes pour mobile et tablette (cachée sur desktop) #}
                <div class=\"d-lg-none\">
                    <div class=\"row g-3 p-3\">
                        {% for user in users %}
                            <div class=\"col-12\">
                                <div class=\"card shadow-sm h-100 border-0\" style=\"border-radius: var(--card-radius);\">
                                    <div class=\"card-body p-3\">
                                        <div class=\"d-flex justify-content-between align-items-start mb-3\">
                                            <h3 class=\"h6 fw-bold mb-0\">{{ user.fullName }}</h3>
                                            {% set metier = {
                                                'CHARGE_AFFAIRES_PROJET': 'Charge Affaires Projet',
                                                'CHARGE_AFFAIRES': 'Charge d\\'Affaires',
                                                'INGENIEUR': 'Ingénieur',
                                                'TECHNICIEN': 'Technicien',
                                                'CHARGE_SURVEILLANCE': 'CSI',
                                                'MANAGER_PREMIERE_LIGNE': 'MPL',
                                            } %}
                                            {% if user.job %}
                                                <span class=\"badge rounded-pill bg-primary bg-opacity-75 fw-light ls-1\">
                                                    {{ metier[user.job.name] ?? user.job.name }}
                                                </span>
                                            {% endif %}
                                        </div>
                                        <p class=\"text-muted mb-2 small\">{{ user.email }}</p>
                                        {% if user.service %}
                                            <p class=\"mb-3\">
                                                <span class=\"badge rounded-pill bg-success bg-opacity-75 fw-light ls-1\">
                                                    {{ user.service.name }}
                                                </span>
                                            </p>
                                        {% endif %}
                                        <div class=\"d-flex justify-content-end mt-3\">
                                            <a href=\"{{ path('admin_user_assign_template', {'id': user.id}) }}\"
                                               class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                               style=\"padding: 0.4rem 1rem;\">
                                                <i class=\"bi bi-plus-circle me-1\"></i> Assigner
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>

                <div class=\"border-top p-3 p-md-4\">
                    <form method=\"post\" action=\"{{ path('admin_batch_assign_templates') }}\">
                        <div class=\"card shadow-sm mb-4\" style=\"border-radius: var(--card-radius); border-left: 4px solid var(--info-color); transition: all var(--transition-speed) ease-in-out;\">
                            <div class=\"card-body p-3 p-md-4\">
                                <div class=\"d-flex align-items-start\">
                                    <div class=\"rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3\" style=\"width: 48px; height: 48px; min-width: 48px; align-self: center;\" aria-hidden=\"true\">
                                        <i class=\"bi bi-info-circle\" style=\"color: var(--info-color); font-size: 1.25rem;\"></i>
                                    </div>
                                    <div>
                                        <h3 class=\"h6 fw-bold mb-2 text-uppercase text-decoration-underline\">Information importante</h3>
                                        <p class=\"mb-0\" style=\"color: var(--text-dark); line-height: 1.5;\">
                                            Cette action attribuera automatiquement un carnet modèle par défaut à tous les utilisateurs listés ci-dessus, en fonction de leur métier.. <br>
                                            👉  Si un carnet doit être <strong style=\"color: #DC134C; text-decoration: underline #DC134C\">assigné à un agent ayant plus d’un an d’ancienneté</strong>, il faudra effectuer l’opération manuellement via : Carnet > Liste des carnets > Créer un carnet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=\"d-flex flex-column flex-md-row justify-content-between gap-3\">
                            <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                                <i class=\"bi bi-arrow-left me-2\"></i> Retour
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                                <i class=\"bi bi-magic me-2\"></i> Assigner automatiquement
                            </button>
                        </div>
                    </form>
                </div>
            {% else %}
                <div class=\"p-4 p-md-5 text-center\">
                    <div class=\"empty-state\">
                        <div class=\"rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center p-4 mb-4\" style=\"width: 100px; height: 100px;\" aria-hidden=\"true\">
                            <i class=\"bi bi-check-circle\" style=\"color: var(--success-color); font-size: 2.5rem;\"></i>
                        </div>
                        <h3 class=\"h4 mb-3 fw-bold\">Tous les utilisateurs ont déjà un carnet</h3>
                        <p class=\"text-muted mb-4\">Il n'y a actuellement aucun utilisateur sans carnet assigné.</p>
                        <a href=\"{{ path('admin') }}\" class=\"btn btn-outline-secondary rounded-pill shadow-sm\" style=\"padding: 0.6rem 1.2rem;\">
                            <i class=\"bi bi-arrow-left me-2\"></i> Retour au tableau de bord
                        </a>
                    </div>
                </div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}
", "admin/user/batch_assign_templates.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/user/batch_assign_templates.html.twig");
    }
}
