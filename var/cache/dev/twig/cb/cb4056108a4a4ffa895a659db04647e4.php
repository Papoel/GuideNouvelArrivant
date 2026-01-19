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

/* pages/rgpd/mentions_legales.html.twig */
class __TwigTemplate_4a8d4756cb266b3973d4b9acc310856e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/mentions_legales.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/mentions_legales.html.twig"));

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

        yield "Mentions Légales
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<style>
\t\t.legal-container {
\t\t\tmax-width: 900px;
\t\t\tmargin: 0 auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.legal-header {
\t\t\tbackground: linear-gradient(135deg, #3d5f9e 0%, #2c384e 100%);
\t\t\tcolor: white;
\t\t\tpadding: 3rem 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.legal-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 2rem;
\t\t}
\t\t.legal-section {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem 2rem;
\t\t\tmargin-bottom: 1.5rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.legal-section h2 {
\t\t\tcolor: #3d5f9e;
\t\t\tfont-size: 1.25rem;
\t\t\tmargin-bottom: 1rem;
\t\t\tpadding-bottom: 0.5rem;
\t\t\tborder-bottom: 2px solid #e9ecef;
\t\t}
\t\t.legal-section p,
\t\t.legal-section li {
\t\t\tcolor: #2c384e;
\t\t\tline-height: 1.7;
\t\t}
\t\t.info-box {
\t\t\tbackground: #f8f9fa;
\t\t\tborder-left: 4px solid #3d5f9e;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
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
\t</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 65
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

        // line 66
        yield "\t<div class=\"legal-container\">
\t\t<a href=\"";
        // line 67
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home_index");
        yield "\" class=\"back-link\">
\t\t\t";
        // line 68
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:arrow-left"]);
        yield "
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"legal-header\">
\t\t\t<h1 class=\"d-flex algn-items-center\">
\t\t\t\t";
        // line 74
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mdi-light:file"]);
        yield "
\t\t\t\tMentions Légales
\t\t\t</h1>
\t\t</div>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t";
        // line 81
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:building-fill"]);
        yield "
\t\t\t\t1. Éditeur du site
\t\t\t</h2>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>EDF SA</strong><br>
\t\t\t\t";
        // line 87
        yield "\t\t\t\tSociété Anonyme au capital de 2 084 365 041,00 €<br>
\t\t\t\tSiège social : 22-30 Avenue de Wagram, 75008 Paris<br>
\t\t\t\tN° TVA Intracommunautaire : FR03 552 081 317<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t";
        // line 95
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fa-solid:user-tie"]);
        yield "
\t\t\t\t2. Directeur de la publication
\t\t\t</h2>
\t\t\t<div
\t\t\t\tclass=\"info-box\">
\t\t\t\t";
        // line 101
        yield "\t\t\t\t<strong>[Nom du directeur de publication]</strong><br>
\t\t\t\t[Fonction]
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 108
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mdi:server"]);
        yield "
\t\t\t\t3. Hébergement
\t\t\t</h2>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>Hostinger International Ltd</strong><br>
\t\t\t\t61 Lordou Vironos Street<br>
\t\t\t\t6023 Larnaca, Chypre<br>
\t\t\t\t<br>
\t\t\t\tSite web :
\t\t\t\t<a href=\"https://www.hostinger.fr\" target=\"_blank\">www.hostinger.fr</a>
\t\t\t</div>
\t\t\t<p class=\"mt-3\">
\t\t\t\t<small>
\t\t\t\t\t";
        // line 121
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "solar:info-circle-linear"]);
        yield "
\t\t\t\t\tHostinger est certifié ISO 27001 et respecte les exigences du RGPD. 
                    Un contrat de sous-traitance (DPA) encadre le traitement des données.
\t\t\t\t</small>
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 130
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mdi:code"]);
        yield "
\t\t\t\t4. Développement
\t\t\t</h2>
\t\t\t<p>Cette application a été développée en interne avec les technologies suivantes :</p>
\t\t\t<ul>
\t\t\t\t<li>Framework : Symfony 7</li>
\t\t\t\t<li>Base de données : MariaDB</li>
\t\t\t\t<li>Interface : Bootstrap 5, Twig</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 143
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "uiw:copyright"]);
        yield "
\t\t\t\t5. Propriété intellectuelle
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tCette application a été conçue et développée par <strong>Pascal BRIFFARD</strong>, 
                agent EDF du CNPE de Penly, dans le cadre d'une initiative personnelle visant à 
                améliorer le suivi de l'intégration des nouveaux arrivants.
\t\t\t</p>
\t\t\t<p>
\t\t\t\tL'application est mise à disposition du service MRC du CNPE Penly pour un usage 
                interne. Les éléments graphiques utilisés proviennent de bibliothèques open source 
                (Bootstrap, Font Awesome, Iconify) sous leurs licences respectives.
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<small>
\t\t\t\t\t";
        // line 158
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-1", "name" => "solar:info-circle-linear"]);
        yield "
\t\t\t\t\tPour toute question relative à l'utilisation de cette application en dehors 
                    du périmètre actuel, veuillez contacter le développeur.
\t\t\t\t</small>
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t";
        // line 167
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:shield-shaded"]);
        yield "
\t\t\t\t6. Protection des données personnelles
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tPour connaître les modalités de traitement de vos données personnelles, 
                veuillez consulter notre
\t\t\t\t<a href=\"";
        // line 173
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_privacy_policy");
        yield "\">Politique de Confidentialité</a>.
\t\t\t</p>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>Délégué à la Protection des Données (DPO)</strong><br>
                Nom : Eric Parent<br>
\t\t\t\tEmail : eric.parent@edf.fr<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 184
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fluent:gavel-16-regular"]);
        yield "
\t\t\t\t7. Droit applicable
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tCette application et ses mentions légales sont soumises au droit français. 
\t\t\t\tEn cas de litige, les tribunaux français seront seuls compétents.
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 195
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mynaui:mail"]);
        yield "
\t\t\t\t8. Contact
\t\t\t</h2>
\t\t\t<p>Pour toute question concernant cette application :</p>
\t\t\t<div
\t\t\t\tclass=\"info-box\">
\t\t\t\t<strong>Email :</strong>
\t\t\t\tpascal.briffard@edf.fr
\t\t\t</div>
\t\t</section>
\t</div>
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
        return "pages/rgpd/mentions_legales.html.twig";
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
        return array (  356 => 195,  342 => 184,  328 => 173,  319 => 167,  307 => 158,  289 => 143,  273 => 130,  261 => 121,  245 => 108,  236 => 101,  228 => 95,  218 => 87,  210 => 81,  200 => 74,  191 => 68,  187 => 67,  184 => 66,  171 => 65,  102 => 7,  89 => 6,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mentions Légales
{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<style>
\t\t.legal-container {
\t\t\tmax-width: 900px;
\t\t\tmargin: 0 auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.legal-header {
\t\t\tbackground: linear-gradient(135deg, #3d5f9e 0%, #2c384e 100%);
\t\t\tcolor: white;
\t\t\tpadding: 3rem 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.legal-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 2rem;
\t\t}
\t\t.legal-section {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem 2rem;
\t\t\tmargin-bottom: 1.5rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.legal-section h2 {
\t\t\tcolor: #3d5f9e;
\t\t\tfont-size: 1.25rem;
\t\t\tmargin-bottom: 1rem;
\t\t\tpadding-bottom: 0.5rem;
\t\t\tborder-bottom: 2px solid #e9ecef;
\t\t}
\t\t.legal-section p,
\t\t.legal-section li {
\t\t\tcolor: #2c384e;
\t\t\tline-height: 1.7;
\t\t}
\t\t.info-box {
\t\t\tbackground: #f8f9fa;
\t\t\tborder-left: 4px solid #3d5f9e;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
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
\t</style>
{% endblock %}

{% block body %}
\t<div class=\"legal-container\">
\t\t<a href=\"{{ path('home_index') }}\" class=\"back-link\">
\t\t\t{{ component('ux:icon', { name: 'bi:arrow-left' }) }}
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"legal-header\">
\t\t\t<h1 class=\"d-flex algn-items-center\">
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'mdi-light:file' }) }}
\t\t\t\tMentions Légales
\t\t\t</h1>
\t\t</div>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'bi:building-fill' }) }}
\t\t\t\t1. Éditeur du site
\t\t\t</h2>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>EDF SA</strong><br>
\t\t\t\t{# TODO: Compléter avec les informations exactes #}
\t\t\t\tSociété Anonyme au capital de 2 084 365 041,00 €<br>
\t\t\t\tSiège social : 22-30 Avenue de Wagram, 75008 Paris<br>
\t\t\t\tN° TVA Intracommunautaire : FR03 552 081 317<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'fa-solid:user-tie' }) }}
\t\t\t\t2. Directeur de la publication
\t\t\t</h2>
\t\t\t<div
\t\t\t\tclass=\"info-box\">
\t\t\t\t{# TODO: Compléter avec le nom du directeur de publication #}
\t\t\t\t<strong>[Nom du directeur de publication]</strong><br>
\t\t\t\t[Fonction]
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'mdi:server' }) }}
\t\t\t\t3. Hébergement
\t\t\t</h2>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>Hostinger International Ltd</strong><br>
\t\t\t\t61 Lordou Vironos Street<br>
\t\t\t\t6023 Larnaca, Chypre<br>
\t\t\t\t<br>
\t\t\t\tSite web :
\t\t\t\t<a href=\"https://www.hostinger.fr\" target=\"_blank\">www.hostinger.fr</a>
\t\t\t</div>
\t\t\t<p class=\"mt-3\">
\t\t\t\t<small>
\t\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'solar:info-circle-linear' }) }}
\t\t\t\t\tHostinger est certifié ISO 27001 et respecte les exigences du RGPD. 
                    Un contrat de sous-traitance (DPA) encadre le traitement des données.
\t\t\t\t</small>
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'mdi:code' }) }}
\t\t\t\t4. Développement
\t\t\t</h2>
\t\t\t<p>Cette application a été développée en interne avec les technologies suivantes :</p>
\t\t\t<ul>
\t\t\t\t<li>Framework : Symfony 7</li>
\t\t\t\t<li>Base de données : MariaDB</li>
\t\t\t\t<li>Interface : Bootstrap 5, Twig</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'uiw:copyright' }) }}
\t\t\t\t5. Propriété intellectuelle
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tCette application a été conçue et développée par <strong>Pascal BRIFFARD</strong>, 
                agent EDF du CNPE de Penly, dans le cadre d'une initiative personnelle visant à 
                améliorer le suivi de l'intégration des nouveaux arrivants.
\t\t\t</p>
\t\t\t<p>
\t\t\t\tL'application est mise à disposition du service MRC du CNPE Penly pour un usage 
                interne. Les éléments graphiques utilisés proviennent de bibliothèques open source 
                (Bootstrap, Font Awesome, Iconify) sous leurs licences respectives.
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<small>
\t\t\t\t\t{{ component('ux:icon', { class: 'me-1', name: 'solar:info-circle-linear' }) }}
\t\t\t\t\tPour toute question relative à l'utilisation de cette application en dehors 
                    du périmètre actuel, veuillez contacter le développeur.
\t\t\t\t</small>
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'bi:shield-shaded' }) }}
\t\t\t\t6. Protection des données personnelles
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tPour connaître les modalités de traitement de vos données personnelles, 
                veuillez consulter notre
\t\t\t\t<a href=\"{{ path('app_privacy_policy') }}\">Politique de Confidentialité</a>.
\t\t\t</p>
\t\t\t<div class=\"info-box\">
\t\t\t\t<strong>Délégué à la Protection des Données (DPO)</strong><br>
                Nom : Eric Parent<br>
\t\t\t\tEmail : eric.parent@edf.fr<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'fluent:gavel-16-regular' }) }}
\t\t\t\t7. Droit applicable
\t\t\t</h2>
\t\t\t<p>
\t\t\t\tCette application et ses mentions légales sont soumises au droit français. 
\t\t\t\tEn cas de litige, les tribunaux français seront seuls compétents.
\t\t\t</p>
\t\t</section>

\t\t<section class=\"legal-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'mynaui:mail' }) }}
\t\t\t\t8. Contact
\t\t\t</h2>
\t\t\t<p>Pour toute question concernant cette application :</p>
\t\t\t<div
\t\t\t\tclass=\"info-box\">
\t\t\t\t<strong>Email :</strong>
\t\t\t\tpascal.briffard@edf.fr
\t\t\t</div>
\t\t</section>
\t</div>
{% endblock %}
", "pages/rgpd/mentions_legales.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/rgpd/mentions_legales.html.twig");
    }
}
