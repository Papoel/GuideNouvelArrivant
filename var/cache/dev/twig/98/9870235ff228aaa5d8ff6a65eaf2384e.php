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

/* pages/rgpd/account_deletion_request.html.twig */
class __TwigTemplate_efeeef9633b660f8dd20869b15b067b0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/account_deletion_request.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/account_deletion_request.html.twig"));

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

        yield "Suppression de compte";
        
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
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<style>
\t\t.deletion-container {
\t\t\tmax-width: 700px;
\t\t\tmargin: 2rem auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.deletion-header {
\t\t\tbackground: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
\t\t\tcolor: white;
\t\t\tpadding: 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t\ttext-align: center;
\t\t}
\t\t.deletion-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 1.75rem;
\t\t}
\t\t.deletion-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.warning-box {
\t\t\tbackground: #fff3cd;
\t\t\tborder-left: 4px solid #ffc107;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1.5rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.info-box {
\t\t\tbackground: #d1ecf1;
\t\t\tborder-left: 4px solid #17a2b8;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1.5rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.pending-request {
\t\t\tbackground: #f8d7da;
\t\t\tborder: 1px solid #f5c6cb;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem;
\t\t}
\t\t.countdown {
\t\t\tfont-size: 1.25rem;
\t\t\tfont-weight: 600;
\t\t\tcolor: #dc3545;
\t\t}
\t\t.back-link {
\t\t\tdisplay: inline-flex;
\t\t\talign-items: center;
\t\t\tgap: 0.5rem;
\t\t\tcolor: #3d5f9e;
\t\t\ttext-decoration: none;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.back-link:hover {
\t\t\ttext-decoration: underline;
\t\t}
\t\t.btn-danger-custom {
\t\t\tbackground: #dc3545;
\t\t\tborder: none;
\t\t\tcolor: white;
\t\t\tpadding: 0.75rem 1.5rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tfont-weight: 500;
\t\t\tcursor: pointer;
\t\t\ttransition: background 0.2s;
\t\t}
\t\t.btn-danger-custom:hover {
\t\t\tbackground: #c82333;
\t\t}
\t\t.btn-success-custom {
\t\t\tbackground: #28a745;
\t\t\tborder: none;
\t\t\tcolor: white;
\t\t\tpadding: 0.75rem 1.5rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tfont-weight: 500;
\t\t\tcursor: pointer;
\t\t\ttransition: background 0.2s;
\t\t}
\t\t.btn-success-custom:hover {
\t\t\tbackground: #218838;
\t\t}
\t</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 97
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

        // line 98
        yield "\t<div class=\"deletion-container\">
\t\t<a href=\"";
        // line 99
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home_index");
        yield "\" class=\"back-link\">
\t\t\t";
        // line 100
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:arrow-left"]);
        yield "
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"deletion-header\">
\t\t\t<h1>
\t\t\t\t";
        // line 106
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:trash"]);
        yield "
\t\t\t\tSuppression de compte
\t\t\t</h1>
\t\t</div>

\t\t";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 111, $this->source); })()), "flashes", [], "any", false, false, false, 111));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 112
            yield "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 113
                yield "\t\t\t\t<div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
\t\t\t\t</div>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 118
            yield "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        yield "
\t\t";
        // line 120
        if ((($tmp = (isset($context["pendingRequest"]) || array_key_exists("pendingRequest", $context) ? $context["pendingRequest"] : (function () { throw new RuntimeError('Variable "pendingRequest" does not exist.', 120, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 121
            yield "\t\t\t<div class=\"deletion-card\">
\t\t\t\t<div class=\"pending-request\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t";
            // line 124
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:hourglass-split"]);
            yield "
\t\t\t\t\t\tDemande de suppression en cours
\t\t\t\t\t</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\tVous avez demandé la suppression de votre compte le 
\t\t\t\t\t\t<strong>";
            // line 129
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pendingRequest"]) || array_key_exists("pendingRequest", $context) ? $context["pendingRequest"] : (function () { throw new RuntimeError('Variable "pendingRequest" does not exist.', 129, $this->source); })()), "requestedAt", [], "any", false, false, false, 129), "d/m/Y à H:i"), "html", null, true);
            yield "</strong>.
\t\t\t\t\t</p>
\t\t\t\t\t
\t\t\t\t\t";
            // line 132
            $context["remaining"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["pendingRequest"]) || array_key_exists("pendingRequest", $context) ? $context["pendingRequest"] : (function () { throw new RuntimeError('Variable "pendingRequest" does not exist.', 132, $this->source); })()), "remainingTime", [], "any", false, false, false, 132);
            // line 133
            yield "\t\t\t\t\t";
            if ((($tmp = (isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 133, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 134
                yield "\t\t\t\t\t\t<p class=\"countdown\">
\t\t\t\t\t\t\t";
                // line 135
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-1", "name" => "bi:clock"]);
                yield "
\t\t\t\t\t\t\tTemps restant pour annuler : 
\t\t\t\t\t\t\t";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 137, $this->source); })()), "h", [], "any", false, false, false, 137), "html", null, true);
                yield "h ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["remaining"]) || array_key_exists("remaining", $context) ? $context["remaining"] : (function () { throw new RuntimeError('Variable "remaining" does not exist.', 137, $this->source); })()), "i", [], "any", false, false, false, 137), "html", null, true);
                yield "min
\t\t\t\t\t\t</p>
\t\t\t\t\t";
            } else {
                // line 140
                yield "\t\t\t\t\t\t<p class=\"countdown\">
\t\t\t\t\t\t\tLa suppression sera effectuée lors du prochain passage du robot (2h00 du matin).
\t\t\t\t\t\t</p>
\t\t\t\t\t";
            }
            // line 144
            yield "
\t\t\t\t\t<div class=\"warning-box\">
\t\t\t\t\t\t<strong>Attention :</strong> Si vous n'annulez pas cette demande, votre compte 
\t\t\t\t\t\tet toutes vos données (carnet de compagnonnage, retours d'expérience) seront 
\t\t\t\t\t\tdéfinitivement supprimés.
\t\t\t\t\t</div>

\t\t\t\t\t<form method=\"post\" action=\"";
            // line 151
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_deletion_cancel");
            yield "\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("cancel-deletion"), "html", null, true);
            yield "\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn-success-custom\">
\t\t\t\t\t\t\t";
            // line 154
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-1", "name" => "bi:x-circle"]);
            yield "
\t\t\t\t\t\t\tAnnuler ma demande de suppression
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        } else {
            // line 161
            yield "\t\t\t<div class=\"deletion-card\">
\t\t\t\t<h3>Demander la suppression de mon compte</h3>
\t\t\t\t
\t\t\t\t<div class=\"warning-box\">
\t\t\t\t\t<strong>Attention :</strong> Cette action est irréversible après 48 heures.
\t\t\t\t</div>

\t\t\t\t<p>En demandant la suppression de votre compte :</p>
\t\t\t\t<ul>
\t\t\t\t\t<li>Votre compte utilisateur sera supprimé</li>
\t\t\t\t\t<li>Votre carnet de compagnonnage sera supprimé</li>
\t\t\t\t\t<li>Vos retours d'expérience (REX) seront supprimés</li>
\t\t\t\t\t<li>Toutes vos actions et validations seront supprimées</li>
\t\t\t\t</ul>

\t\t\t\t<div class=\"info-box\">
\t\t\t\t\t<strong>Délai de rétractation :</strong> Vous disposez de 48 heures pour annuler 
\t\t\t\t\tvotre demande. Un email de confirmation avec un lien d'annulation vous sera envoyé.
\t\t\t\t</div>

\t\t\t\t<form method=\"post\" action=\"";
            // line 181
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_deletion_request");
            yield "\" 
\t\t\t\t\t  onsubmit=\"return confirm('Êtes-vous sûr de vouloir demander la suppression de votre compte ?');\">
\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-account"), "html", null, true);
            yield "\">
\t\t\t\t\t<button type=\"submit\" class=\"btn-danger-custom\">
\t\t\t\t\t\t";
            // line 185
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-1", "name" => "bi:trash"]);
            yield "
\t\t\t\t\t\tDemander la suppression de mon compte
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t";
        }
        // line 191
        yield "\t</div>
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
        return "pages/rgpd/account_deletion_request.html.twig";
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
        return array (  390 => 191,  381 => 185,  376 => 183,  371 => 181,  349 => 161,  339 => 154,  334 => 152,  330 => 151,  321 => 144,  315 => 140,  307 => 137,  302 => 135,  299 => 134,  296 => 133,  294 => 132,  288 => 129,  280 => 124,  275 => 121,  273 => 120,  270 => 119,  264 => 118,  254 => 114,  249 => 113,  244 => 112,  240 => 111,  232 => 106,  223 => 100,  219 => 99,  216 => 98,  203 => 97,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Suppression de compte{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<style>
\t\t.deletion-container {
\t\t\tmax-width: 700px;
\t\t\tmargin: 2rem auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.deletion-header {
\t\t\tbackground: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
\t\t\tcolor: white;
\t\t\tpadding: 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t\ttext-align: center;
\t\t}
\t\t.deletion-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 1.75rem;
\t\t}
\t\t.deletion-card {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 2rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t\tmargin-bottom: 1.5rem;
\t\t}
\t\t.warning-box {
\t\t\tbackground: #fff3cd;
\t\t\tborder-left: 4px solid #ffc107;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1.5rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.info-box {
\t\t\tbackground: #d1ecf1;
\t\t\tborder-left: 4px solid #17a2b8;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1.5rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.pending-request {
\t\t\tbackground: #f8d7da;
\t\t\tborder: 1px solid #f5c6cb;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem;
\t\t}
\t\t.countdown {
\t\t\tfont-size: 1.25rem;
\t\t\tfont-weight: 600;
\t\t\tcolor: #dc3545;
\t\t}
\t\t.back-link {
\t\t\tdisplay: inline-flex;
\t\t\talign-items: center;
\t\t\tgap: 0.5rem;
\t\t\tcolor: #3d5f9e;
\t\t\ttext-decoration: none;
\t\t\tmargin-bottom: 1rem;
\t\t}
\t\t.back-link:hover {
\t\t\ttext-decoration: underline;
\t\t}
\t\t.btn-danger-custom {
\t\t\tbackground: #dc3545;
\t\t\tborder: none;
\t\t\tcolor: white;
\t\t\tpadding: 0.75rem 1.5rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tfont-weight: 500;
\t\t\tcursor: pointer;
\t\t\ttransition: background 0.2s;
\t\t}
\t\t.btn-danger-custom:hover {
\t\t\tbackground: #c82333;
\t\t}
\t\t.btn-success-custom {
\t\t\tbackground: #28a745;
\t\t\tborder: none;
\t\t\tcolor: white;
\t\t\tpadding: 0.75rem 1.5rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tfont-weight: 500;
\t\t\tcursor: pointer;
\t\t\ttransition: background 0.2s;
\t\t}
\t\t.btn-success-custom:hover {
\t\t\tbackground: #218838;
\t\t}
\t</style>
{% endblock %}

{% block body %}
\t<div class=\"deletion-container\">
\t\t<a href=\"{{ path('home_index') }}\" class=\"back-link\">
\t\t\t{{ component('ux:icon', { name: 'bi:arrow-left' }) }}
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"deletion-header\">
\t\t\t<h1>
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'bi:trash' }) }}
\t\t\t\tSuppression de compte
\t\t\t</h1>
\t\t</div>

\t\t{% for label, messages in app.flashes %}
\t\t\t{% for message in messages %}
\t\t\t\t<div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
\t\t\t\t\t{{ message }}
\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
\t\t\t\t</div>
\t\t\t{% endfor %}
\t\t{% endfor %}

\t\t{% if pendingRequest %}
\t\t\t<div class=\"deletion-card\">
\t\t\t\t<div class=\"pending-request\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'bi:hourglass-split' }) }}
\t\t\t\t\t\tDemande de suppression en cours
\t\t\t\t\t</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\tVous avez demandé la suppression de votre compte le 
\t\t\t\t\t\t<strong>{{ pendingRequest.requestedAt|date('d/m/Y à H:i') }}</strong>.
\t\t\t\t\t</p>
\t\t\t\t\t
\t\t\t\t\t{% set remaining = pendingRequest.remainingTime %}
\t\t\t\t\t{% if remaining %}
\t\t\t\t\t\t<p class=\"countdown\">
\t\t\t\t\t\t\t{{ component('ux:icon', { class: 'me-1', name: 'bi:clock' }) }}
\t\t\t\t\t\t\tTemps restant pour annuler : 
\t\t\t\t\t\t\t{{ remaining.h }}h {{ remaining.i }}min
\t\t\t\t\t\t</p>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<p class=\"countdown\">
\t\t\t\t\t\t\tLa suppression sera effectuée lors du prochain passage du robot (2h00 du matin).
\t\t\t\t\t\t</p>
\t\t\t\t\t{% endif %}

\t\t\t\t\t<div class=\"warning-box\">
\t\t\t\t\t\t<strong>Attention :</strong> Si vous n'annulez pas cette demande, votre compte 
\t\t\t\t\t\tet toutes vos données (carnet de compagnonnage, retours d'expérience) seront 
\t\t\t\t\t\tdéfinitivement supprimés.
\t\t\t\t\t</div>

\t\t\t\t\t<form method=\"post\" action=\"{{ path('app_account_deletion_cancel') }}\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('cancel-deletion') }}\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn-success-custom\">
\t\t\t\t\t\t\t{{ component('ux:icon', { class: 'me-1', name: 'bi:x-circle' }) }}
\t\t\t\t\t\t\tAnnuler ma demande de suppression
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t{% else %}
\t\t\t<div class=\"deletion-card\">
\t\t\t\t<h3>Demander la suppression de mon compte</h3>
\t\t\t\t
\t\t\t\t<div class=\"warning-box\">
\t\t\t\t\t<strong>Attention :</strong> Cette action est irréversible après 48 heures.
\t\t\t\t</div>

\t\t\t\t<p>En demandant la suppression de votre compte :</p>
\t\t\t\t<ul>
\t\t\t\t\t<li>Votre compte utilisateur sera supprimé</li>
\t\t\t\t\t<li>Votre carnet de compagnonnage sera supprimé</li>
\t\t\t\t\t<li>Vos retours d'expérience (REX) seront supprimés</li>
\t\t\t\t\t<li>Toutes vos actions et validations seront supprimées</li>
\t\t\t\t</ul>

\t\t\t\t<div class=\"info-box\">
\t\t\t\t\t<strong>Délai de rétractation :</strong> Vous disposez de 48 heures pour annuler 
\t\t\t\t\tvotre demande. Un email de confirmation avec un lien d'annulation vous sera envoyé.
\t\t\t\t</div>

\t\t\t\t<form method=\"post\" action=\"{{ path('app_account_deletion_request') }}\" 
\t\t\t\t\t  onsubmit=\"return confirm('Êtes-vous sûr de vouloir demander la suppression de votre compte ?');\">
\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete-account') }}\">
\t\t\t\t\t<button type=\"submit\" class=\"btn-danger-custom\">
\t\t\t\t\t\t{{ component('ux:icon', { class: 'me-1', name: 'bi:trash' }) }}
\t\t\t\t\t\tDemander la suppression de mon compte
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t{% endif %}
\t</div>
{% endblock %}
", "pages/rgpd/account_deletion_request.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/rgpd/account_deletion_request.html.twig");
    }
}
