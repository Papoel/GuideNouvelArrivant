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

/* pages/rgpd/politique_confidentialite.html.twig */
class __TwigTemplate_8986f8e2577534fd738ad2476e6a752e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/politique_confidentialite.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/rgpd/politique_confidentialite.html.twig"));

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

        yield "Politique de Confidentialité
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
\t\t.privacy-container {
\t\t\tmax-width: 900px;
\t\t\tmargin: 0 auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.privacy-header {
\t\t\tbackground: linear-gradient(135deg, #3d5f9e 0%, #2c384e 100%);
\t\t\tcolor: white;
\t\t\tpadding: 3rem 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.privacy-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 2rem;
\t\t}
\t\t.privacy-header .update-date {
\t\t\topacity: 0.8;
\t\t\tmargin-top: 0.5rem;
\t\t}
\t\t.privacy-section {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem 2rem;
\t\t\tmargin-bottom: 1.5rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.privacy-section h2 {
\t\t\tcolor: #3d5f9e;
\t\t\tfont-size: 1.25rem;
\t\t\tmargin-bottom: 1rem;
\t\t\tpadding-bottom: 0.5rem;
\t\t\tborder-bottom: 2px solid #e9ecef;
\t\t}
\t\t.privacy-section h3 {
\t\t\tcolor: #2c384e;
\t\t\tfont-size: 1.1rem;
\t\t\tmargin-top: 1.25rem;
\t\t\tmargin-bottom: 0.75rem;
\t\t}
\t\t.privacy-section p,
\t\t.privacy-section li {
\t\t\tcolor: #2c384e;
\t\t\tline-height: 1.7;
\t\t}
\t\t.privacy-section ul {
\t\t\tpadding-left: 1.5rem;
\t\t}
\t\t.privacy-section li {
\t\t\tmargin-bottom: 0.5rem;
\t\t}
\t\t.data-table {
\t\t\twidth: 100%;
\t\t\tborder-collapse: collapse;
\t\t\tmargin: 1rem 0;
\t\t}
\t\t.data-table th,
\t\t.data-table td {
\t\t\tpadding: 0.75rem;
\t\t\ttext-align: left;
\t\t\tborder-bottom: 1px solid #e9ecef;
\t\t}
\t\t.data-table th {
\t\t\tbackground: #f8f9fa;
\t\t\tfont-weight: 600;
\t\t\tcolor: #2c384e;
\t\t}
\t\t.contact-box {
\t\t\tbackground: #f8f9fa;
\t\t\tborder-left: 4px solid #3d5f9e;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.rights-grid {
\t\t\tdisplay: grid;
\t\t\tgrid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
\t\t\tgap: 1rem;
\t\t\tmargin: 1rem 0;
\t\t}
\t\t.right-card {
\t\t\tbackground: #f8f9fa;
\t\t\tpadding: 1rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tborder-left: 3px solid #3d5f9e;
\t\t}
\t\t.right-card h4 {
\t\t\tcolor: #3d5f9e;
\t\t\tmargin: 0 0 0.5rem;
\t\t\tfont-size: 1rem;
\t\t}
\t\t.right-card p {
\t\t\tmargin: 0;
\t\t\tfont-size: 0.9rem;
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

    // line 118
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

        // line 119
        yield "\t<div class=\"privacy-container\">
\t\t<a href=\"";
        // line 120
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home_index");
        yield "\" class=\"back-link\">
            ";
        // line 121
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["name" => "bi:arrow-left"]);
        yield "
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"privacy-header\">
\t\t\t<h1 class=\"d-flex align-items-center\">
\t\t\t\t";
        // line 127
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:shield-shaded"]);
        yield "
                Politique de Confidentialité
            </h1>
\t\t\t<p class=\"update-date\">
\t\t\t\tDernière mise à jour :
\t\t\t\t18/01/2026
\t\t\t</p>
\t\t</div>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 138
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:building-fill"]);
        yield "
                1. Responsable du traitement
            </h2>
\t\t\t<p>L'application
\t\t\t\t<strong>GuideNouvelArrivant</strong>
\t\t\t\test éditée par :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>EDF SA</strong><br>
\t\t\t\t";
        // line 147
        yield "\t\t\t\tCNPE Penly / service MRC<br>
\t\t\t\tRoute de la centrale,<br>
                76630 Petit-Caux<br>
\t\t\t\t<strong>Contact :</strong>
\t\t\t\tpascal.briffard@edf.fr
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 157
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mdi:bullseye"]);
        yield "
                2. Finalités du traitement
            </h2>
\t\t\t<p>Vos données personnelles sont collectées et traitées pour les finalités suivantes :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Gestion de votre compte utilisateur</strong>
\t\t\t\t\t: authentification, accès à l'application</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Suivi de votre parcours d'intégration</strong>
\t\t\t\t\t: gestion de votre carnet de compagnonnage, suivi de la progression</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Relation tuteur/nouvel arrivant</strong>
\t\t\t\t\t: faciliter l'accompagnement et les validations</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Capitalisation des retours d'expérience</strong>
\t\t\t\t\t: amélioration continue du processus d'intégration</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Statistiques internes</strong>
\t\t\t\t\t: pilotage et amélioration de l'outil</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 182
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "cil:balance-scale"]);
        yield "
                3. Base légale du traitement
            </h2>
\t\t\t<p>Le traitement de vos données repose sur :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>L'exécution du contrat de travail</strong>
\t\t\t\t\t(Article 6.1.b du RGPD) : le suivi de votre intégration fait partie de votre parcours professionnel
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>L'intérêt légitime de l'employeur</strong>
\t\t\t\t\t(Article 6.1.f du RGPD) : amélioration des processus d'intégration et capitalisation des bonnes pratiques
                </li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 200
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "streamline-freehand:database-hand"]);
        yield "
                4. Données collectées
            </h2>
\t\t\t<p>Les catégories de données personnelles traitées sont :</p>

\t\t\t<table class=\"data-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Catégorie</th>
\t\t\t\t\t\t<th>Données</th>
\t\t\t\t\t\t<th>Finalité</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Identité</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Nom, prénom, email professionnel, NNI</td>
\t\t\t\t\t\t<td>Identification et authentification</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Vie professionnelle</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Métier, spécialité, service, prise de poste</td>
\t\t\t\t\t\t<td>Personnalisation du parcours</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Suivi d'intégration</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Progression, validations, commentaires</td>
\t\t\t\t\t\t<td>Accompagnement et suivi</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Connexion</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Date de dernière connexion</td>
\t\t\t\t\t\t<td>Sécurité et statistiques</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 248
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fa6-solid:users"]);
        yield "
                5. Destinataires des données
            </h2>
\t\t\t<p>Vos données sont accessibles aux personnes suivantes, dans le strict cadre de leurs missions :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Votre tuteur</strong>
\t\t\t\t\t: suivi de votre progression
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Votre responsable hiérarchique</strong>
\t\t\t\t\t: pilotage de l'intégration
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Les administrateurs de l'application</strong>
\t\t\t\t\t: gestion technique et support
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Le service RH</strong>
\t\t\t\t\t: suivi global des intégrations
                </li>
\t\t\t</ul>
\t\t\t<p>Aucune donnée n'est transmise à des tiers extérieurs à l'entreprise, sauf obligation légale.</p>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 275
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "svg-spinners:clock"]);
        yield "
                6. Durée de conservation
            </h2>
\t\t\t<p>
\t\t\t\tL'ensemble de vos données personnelles (compte utilisateur, carnet de compagnonnage, actions, 
\t\t\t\tretours d'expérience, logs de connexion) est conservé <strong>jusqu'à l'archivage 
\t\t\t\tphysique de votre carnet de compagnonnage signé</strong>.
\t\t\t</p>
\t\t\t<p>
\t\t\t\tUne fois le carnet de compagnonnage archivé physiquement et signé par les parties 
\t\t\t\tconcernées, vos données numériques seront supprimées de l'application.
\t\t\t</p>
\t\t\t<div class=\"contact-box\">
                ";
        // line 288
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "solar:info-circle-linear"]);
        yield "
\t\t\t\t<strong>Note :</strong> La suppression de vos données intervient après confirmation 
\t\t\t\tde l'archivage physique par votre responsable ou le service RH.
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 296
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fa-solid:user-shield"]);
        yield "
                7. Vos droits
            </h2>
\t\t\t<p>Conformément au Règlement Général sur la Protection des Données (RGPD), vous disposez des droits suivants :</p>

\t\t\t<div class=\"rights-grid\">
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 304
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:eye"]);
        yield "
                        Droit d'accès
                    </h4>
\t\t\t\t\t<p>Obtenir la confirmation que vos données sont traitées et en recevoir une copie</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 311
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "ep:edit"]);
        yield "
                        Droit de rectification
                    </h4>
\t\t\t\t\t<p>Faire corriger vos données inexactes ou incomplètes</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 318
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "ph:trash-light"]);
        yield "
                        Droit à l'effacement
                    </h4>
\t\t\t\t\t<p>Demander la suppression de vos données (sous conditions)</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 325
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:download"]);
        yield "
                        Droit à la portabilité
                    </h4>
\t\t\t\t\t<p>Recevoir vos données dans un format structuré</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 332
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "bi:ban"]);
        yield "
                        Droit à la limitation
                    </h4>
\t\t\t\t\t<p>Limiter temporairement le traitement de vos données</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        ";
        // line 339
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "la:hand-paper"]);
        yield "
                        Droit d'opposition
                    </h4>
\t\t\t\t\t<p>Vous opposer au traitement pour motif légitime</p>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<h3>Comment exercer vos droits ?</h3>
\t\t\t<p>Pour exercer vos droits, vous pouvez :</p>
\t\t\t<ul>
\t\t\t\t<li>Utiliser la fonction
\t\t\t\t\t<strong>\"Exporter mes données\"</strong>
\t\t\t\t\tdans votre profil (droit d'accès et portabilité)</li>
\t\t\t\t<li>Contacter le Délégué à la Protection des Données (DPO) :</li>
\t\t\t</ul>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>DPO EDF</strong><br>
\t\t\t\tNom : Eric Parent<br>
\t\t\t\tEmail : eric.parent@edf.fr<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 363
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "material-symbols-light:lock"]);
        yield "
\t\t\t\t8. Sécurité des données
            </h2>
\t\t\t<p>Nous mettons en œuvre les mesures techniques et organisationnelles appropriées pour protéger vos données :</p>
\t\t\t<ul>
\t\t\t\t<li>Chiffrement des mots de passe (algorithme bcrypt/argon2)</li>
\t\t\t\t<li>Connexion sécurisée (HTTPS)</li>
\t\t\t\t<li>Contrôle d'accès basé sur les rôles</li>
\t\t\t\t<li>Sessions sécurisées avec protection contre le vol de session</li>
\t\t\t\t<li>Protection contre les attaques CSRF</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 378
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "mdi:server"]);
        yield "
\t\t\t\t9. Hébergement
            </h2>
\t\t\t<p>L'application est hébergée par :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>Hostinger International Ltd</strong><br>
\t\t\t\tLocalisation des serveurs : Europe (France)<br>
\t\t\t\t<br>
\t\t\t\t<small>
                    L'hébergeur est soumis au DPA Hostinger 
                    (<a href=\"https://www.hostinger.com/legal/dpa\" target=\"_blank\">consulter le DPA</a>) 
                    conforme au RGPD.
                </small>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 396
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "material-symbols-light:cookie-outline"]);
        yield "
                10. Cookies
            </h2>
\t\t\t<p>L'application utilise uniquement des cookies techniques strictement nécessaires à son fonctionnement :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Cookie de session</strong>
\t\t\t\t\t: maintien de votre connexion</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Cookie \"Remember Me\"</strong>
\t\t\t\t\t: connexion persistante (si activée)</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Token CSRF</strong>
\t\t\t\t\t: protection contre les attaques</li>
\t\t\t</ul>
\t\t\t<p>Ces cookies sont exemptés de consentement car indispensables au fonctionnement du service.</p>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 416
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fluent:gavel-16-regular"]);
        yield "
                11. Réclamation
            </h2>
\t\t\t<p>Si vous estimez que le traitement de vos données ne respecte pas la réglementation, vous pouvez introduire une réclamation auprès de la CNIL :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>Commission Nationale de l'Informatique et des Libertés (CNIL)</strong><br>
\t\t\t\t3 Place de Fontenoy - TSA 80715<br>
\t\t\t\t75334 Paris Cedex 07<br>
\t\t\t\t<a href=\"https://www.cnil.fr/fr/plaintes\" target=\"_blank\">www.cnil.fr/fr/plaintes</a>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                ";
        // line 430
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ux:icon", ["class" => "me-2", "name" => "fa7-solid:sync-alt"]);
        yield "
                12. Mise à jour
            </h2>
\t\t\t<p>Cette politique de confidentialité peut être mise à jour. Vous serez informé(e) de toute modification substantielle.</p>
\t\t\t<p>
\t\t\t\t<strong>Version actuelle :</strong>
\t\t\t\t1.0 - 18/01/2026</p>
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
        return "pages/rgpd/politique_confidentialite.html.twig";
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
        return array (  614 => 430,  597 => 416,  574 => 396,  553 => 378,  535 => 363,  508 => 339,  498 => 332,  488 => 325,  478 => 318,  468 => 311,  458 => 304,  447 => 296,  436 => 288,  420 => 275,  390 => 248,  339 => 200,  318 => 182,  290 => 157,  278 => 147,  267 => 138,  253 => 127,  244 => 121,  240 => 120,  237 => 119,  224 => 118,  102 => 7,  89 => 6,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Politique de Confidentialité
{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<style>
\t\t.privacy-container {
\t\t\tmax-width: 900px;
\t\t\tmargin: 0 auto;
\t\t\tpadding: 2rem;
\t\t}
\t\t.privacy-header {
\t\t\tbackground: linear-gradient(135deg, #3d5f9e 0%, #2c384e 100%);
\t\t\tcolor: white;
\t\t\tpadding: 3rem 2rem;
\t\t\tborder-radius: 0.75rem;
\t\t\tmargin-bottom: 2rem;
\t\t}
\t\t.privacy-header h1 {
\t\t\tmargin: 0;
\t\t\tfont-size: 2rem;
\t\t}
\t\t.privacy-header .update-date {
\t\t\topacity: 0.8;
\t\t\tmargin-top: 0.5rem;
\t\t}
\t\t.privacy-section {
\t\t\tbackground: white;
\t\t\tborder-radius: 0.75rem;
\t\t\tpadding: 1.5rem 2rem;
\t\t\tmargin-bottom: 1.5rem;
\t\t\tbox-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
\t\t}
\t\t.privacy-section h2 {
\t\t\tcolor: #3d5f9e;
\t\t\tfont-size: 1.25rem;
\t\t\tmargin-bottom: 1rem;
\t\t\tpadding-bottom: 0.5rem;
\t\t\tborder-bottom: 2px solid #e9ecef;
\t\t}
\t\t.privacy-section h3 {
\t\t\tcolor: #2c384e;
\t\t\tfont-size: 1.1rem;
\t\t\tmargin-top: 1.25rem;
\t\t\tmargin-bottom: 0.75rem;
\t\t}
\t\t.privacy-section p,
\t\t.privacy-section li {
\t\t\tcolor: #2c384e;
\t\t\tline-height: 1.7;
\t\t}
\t\t.privacy-section ul {
\t\t\tpadding-left: 1.5rem;
\t\t}
\t\t.privacy-section li {
\t\t\tmargin-bottom: 0.5rem;
\t\t}
\t\t.data-table {
\t\t\twidth: 100%;
\t\t\tborder-collapse: collapse;
\t\t\tmargin: 1rem 0;
\t\t}
\t\t.data-table th,
\t\t.data-table td {
\t\t\tpadding: 0.75rem;
\t\t\ttext-align: left;
\t\t\tborder-bottom: 1px solid #e9ecef;
\t\t}
\t\t.data-table th {
\t\t\tbackground: #f8f9fa;
\t\t\tfont-weight: 600;
\t\t\tcolor: #2c384e;
\t\t}
\t\t.contact-box {
\t\t\tbackground: #f8f9fa;
\t\t\tborder-left: 4px solid #3d5f9e;
\t\t\tpadding: 1rem 1.5rem;
\t\t\tmargin: 1rem 0;
\t\t\tborder-radius: 0 0.5rem 0.5rem 0;
\t\t}
\t\t.rights-grid {
\t\t\tdisplay: grid;
\t\t\tgrid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
\t\t\tgap: 1rem;
\t\t\tmargin: 1rem 0;
\t\t}
\t\t.right-card {
\t\t\tbackground: #f8f9fa;
\t\t\tpadding: 1rem;
\t\t\tborder-radius: 0.5rem;
\t\t\tborder-left: 3px solid #3d5f9e;
\t\t}
\t\t.right-card h4 {
\t\t\tcolor: #3d5f9e;
\t\t\tmargin: 0 0 0.5rem;
\t\t\tfont-size: 1rem;
\t\t}
\t\t.right-card p {
\t\t\tmargin: 0;
\t\t\tfont-size: 0.9rem;
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
\t<div class=\"privacy-container\">
\t\t<a href=\"{{ path('home_index') }}\" class=\"back-link\">
            {{ component('ux:icon', { name: 'bi:arrow-left' }) }}
\t\t\tRetour à l'accueil
\t\t</a>

\t\t<div class=\"privacy-header\">
\t\t\t<h1 class=\"d-flex align-items-center\">
\t\t\t\t{{ component('ux:icon', { class: 'me-2', name: 'bi:shield-shaded' }) }}
                Politique de Confidentialité
            </h1>
\t\t\t<p class=\"update-date\">
\t\t\t\tDernière mise à jour :
\t\t\t\t18/01/2026
\t\t\t</p>
\t\t</div>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'bi:building-fill' }) }}
                1. Responsable du traitement
            </h2>
\t\t\t<p>L'application
\t\t\t\t<strong>GuideNouvelArrivant</strong>
\t\t\t\test éditée par :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>EDF SA</strong><br>
\t\t\t\t{# TODO: Compléter avec l'entité exacte #}
\t\t\t\tCNPE Penly / service MRC<br>
\t\t\t\tRoute de la centrale,<br>
                76630 Petit-Caux<br>
\t\t\t\t<strong>Contact :</strong>
\t\t\t\tpascal.briffard@edf.fr
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'mdi:bullseye' }) }}
                2. Finalités du traitement
            </h2>
\t\t\t<p>Vos données personnelles sont collectées et traitées pour les finalités suivantes :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Gestion de votre compte utilisateur</strong>
\t\t\t\t\t: authentification, accès à l'application</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Suivi de votre parcours d'intégration</strong>
\t\t\t\t\t: gestion de votre carnet de compagnonnage, suivi de la progression</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Relation tuteur/nouvel arrivant</strong>
\t\t\t\t\t: faciliter l'accompagnement et les validations</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Capitalisation des retours d'expérience</strong>
\t\t\t\t\t: amélioration continue du processus d'intégration</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Statistiques internes</strong>
\t\t\t\t\t: pilotage et amélioration de l'outil</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'cil:balance-scale' }) }}
                3. Base légale du traitement
            </h2>
\t\t\t<p>Le traitement de vos données repose sur :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>L'exécution du contrat de travail</strong>
\t\t\t\t\t(Article 6.1.b du RGPD) : le suivi de votre intégration fait partie de votre parcours professionnel
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>L'intérêt légitime de l'employeur</strong>
\t\t\t\t\t(Article 6.1.f du RGPD) : amélioration des processus d'intégration et capitalisation des bonnes pratiques
                </li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'streamline-freehand:database-hand' }) }}
                4. Données collectées
            </h2>
\t\t\t<p>Les catégories de données personnelles traitées sont :</p>

\t\t\t<table class=\"data-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Catégorie</th>
\t\t\t\t\t\t<th>Données</th>
\t\t\t\t\t\t<th>Finalité</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Identité</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Nom, prénom, email professionnel, NNI</td>
\t\t\t\t\t\t<td>Identification et authentification</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Vie professionnelle</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Métier, spécialité, service, prise de poste</td>
\t\t\t\t\t\t<td>Personnalisation du parcours</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Suivi d'intégration</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Progression, validations, commentaires</td>
\t\t\t\t\t\t<td>Accompagnement et suivi</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>Connexion</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>Date de dernière connexion</td>
\t\t\t\t\t\t<td>Sécurité et statistiques</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'fa6-solid:users' }) }}
                5. Destinataires des données
            </h2>
\t\t\t<p>Vos données sont accessibles aux personnes suivantes, dans le strict cadre de leurs missions :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Votre tuteur</strong>
\t\t\t\t\t: suivi de votre progression
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Votre responsable hiérarchique</strong>
\t\t\t\t\t: pilotage de l'intégration
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Les administrateurs de l'application</strong>
\t\t\t\t\t: gestion technique et support
                </li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Le service RH</strong>
\t\t\t\t\t: suivi global des intégrations
                </li>
\t\t\t</ul>
\t\t\t<p>Aucune donnée n'est transmise à des tiers extérieurs à l'entreprise, sauf obligation légale.</p>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'svg-spinners:clock' }) }}
                6. Durée de conservation
            </h2>
\t\t\t<p>
\t\t\t\tL'ensemble de vos données personnelles (compte utilisateur, carnet de compagnonnage, actions, 
\t\t\t\tretours d'expérience, logs de connexion) est conservé <strong>jusqu'à l'archivage 
\t\t\t\tphysique de votre carnet de compagnonnage signé</strong>.
\t\t\t</p>
\t\t\t<p>
\t\t\t\tUne fois le carnet de compagnonnage archivé physiquement et signé par les parties 
\t\t\t\tconcernées, vos données numériques seront supprimées de l'application.
\t\t\t</p>
\t\t\t<div class=\"contact-box\">
                {{ component('ux:icon', { class: 'me-2', name: 'solar:info-circle-linear' }) }}
\t\t\t\t<strong>Note :</strong> La suppression de vos données intervient après confirmation 
\t\t\t\tde l'archivage physique par votre responsable ou le service RH.
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'fa-solid:user-shield' }) }}
                7. Vos droits
            </h2>
\t\t\t<p>Conformément au Règlement Général sur la Protection des Données (RGPD), vous disposez des droits suivants :</p>

\t\t\t<div class=\"rights-grid\">
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'bi:eye' }) }}
                        Droit d'accès
                    </h4>
\t\t\t\t\t<p>Obtenir la confirmation que vos données sont traitées et en recevoir une copie</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'ep:edit' }) }}
                        Droit de rectification
                    </h4>
\t\t\t\t\t<p>Faire corriger vos données inexactes ou incomplètes</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'ph:trash-light' }) }}
                        Droit à l'effacement
                    </h4>
\t\t\t\t\t<p>Demander la suppression de vos données (sous conditions)</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'bi:download' }) }}
                        Droit à la portabilité
                    </h4>
\t\t\t\t\t<p>Recevoir vos données dans un format structuré</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'bi:ban' }) }}
                        Droit à la limitation
                    </h4>
\t\t\t\t\t<p>Limiter temporairement le traitement de vos données</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"right-card\">
\t\t\t\t\t<h4 class=\"d-flex align-items-center\">
                        {{ component('ux:icon', { class: 'me-2', name: 'la:hand-paper' }) }}
                        Droit d'opposition
                    </h4>
\t\t\t\t\t<p>Vous opposer au traitement pour motif légitime</p>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<h3>Comment exercer vos droits ?</h3>
\t\t\t<p>Pour exercer vos droits, vous pouvez :</p>
\t\t\t<ul>
\t\t\t\t<li>Utiliser la fonction
\t\t\t\t\t<strong>\"Exporter mes données\"</strong>
\t\t\t\t\tdans votre profil (droit d'accès et portabilité)</li>
\t\t\t\t<li>Contacter le Délégué à la Protection des Données (DPO) :</li>
\t\t\t</ul>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>DPO EDF</strong><br>
\t\t\t\tNom : Eric Parent<br>
\t\t\t\tEmail : eric.parent@edf.fr<br>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'material-symbols-light:lock' }) }}
\t\t\t\t8. Sécurité des données
            </h2>
\t\t\t<p>Nous mettons en œuvre les mesures techniques et organisationnelles appropriées pour protéger vos données :</p>
\t\t\t<ul>
\t\t\t\t<li>Chiffrement des mots de passe (algorithme bcrypt/argon2)</li>
\t\t\t\t<li>Connexion sécurisée (HTTPS)</li>
\t\t\t\t<li>Contrôle d'accès basé sur les rôles</li>
\t\t\t\t<li>Sessions sécurisées avec protection contre le vol de session</li>
\t\t\t\t<li>Protection contre les attaques CSRF</li>
\t\t\t</ul>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'mdi:server' }) }}
\t\t\t\t9. Hébergement
            </h2>
\t\t\t<p>L'application est hébergée par :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>Hostinger International Ltd</strong><br>
\t\t\t\tLocalisation des serveurs : Europe (France)<br>
\t\t\t\t<br>
\t\t\t\t<small>
                    L'hébergeur est soumis au DPA Hostinger 
                    (<a href=\"https://www.hostinger.com/legal/dpa\" target=\"_blank\">consulter le DPA</a>) 
                    conforme au RGPD.
                </small>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'material-symbols-light:cookie-outline' }) }}
                10. Cookies
            </h2>
\t\t\t<p>L'application utilise uniquement des cookies techniques strictement nécessaires à son fonctionnement :</p>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<strong>Cookie de session</strong>
\t\t\t\t\t: maintien de votre connexion</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Cookie \"Remember Me\"</strong>
\t\t\t\t\t: connexion persistante (si activée)</li>
\t\t\t\t<li>
\t\t\t\t\t<strong>Token CSRF</strong>
\t\t\t\t\t: protection contre les attaques</li>
\t\t\t</ul>
\t\t\t<p>Ces cookies sont exemptés de consentement car indispensables au fonctionnement du service.</p>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'fluent:gavel-16-regular' }) }}
                11. Réclamation
            </h2>
\t\t\t<p>Si vous estimez que le traitement de vos données ne respecte pas la réglementation, vous pouvez introduire une réclamation auprès de la CNIL :</p>
\t\t\t<div class=\"contact-box\">
\t\t\t\t<strong>Commission Nationale de l'Informatique et des Libertés (CNIL)</strong><br>
\t\t\t\t3 Place de Fontenoy - TSA 80715<br>
\t\t\t\t75334 Paris Cedex 07<br>
\t\t\t\t<a href=\"https://www.cnil.fr/fr/plaintes\" target=\"_blank\">www.cnil.fr/fr/plaintes</a>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"privacy-section\">
\t\t\t<h2 class=\"d-flex align-items-center\">
                {{ component('ux:icon', { class: 'me-2', name: 'fa7-solid:sync-alt' }) }}
                12. Mise à jour
            </h2>
\t\t\t<p>Cette politique de confidentialité peut être mise à jour. Vous serez informé(e) de toute modification substantielle.</p>
\t\t\t<p>
\t\t\t\t<strong>Version actuelle :</strong>
\t\t\t\t1.0 - 18/01/2026</p>
\t\t</section>
\t</div>
{% endblock %}

", "pages/rgpd/politique_confidentialite.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/rgpd/politique_confidentialite.html.twig");
    }
}
