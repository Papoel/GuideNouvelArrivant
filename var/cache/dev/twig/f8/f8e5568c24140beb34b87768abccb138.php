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

/* admin/progress/service_feedbacks.html.twig */
class __TwigTemplate_6c9be2eda7832d77d3f42f68e560a27b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/service_feedbacks.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/service_feedbacks.html.twig"));

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

        yield "Retours d'expérience du service ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 3, $this->source); })()), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 196
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

        // line 197
        yield "    <div class=\"container-fluid py-4 py-md-5\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5\">
            <div>
                <h1 class=\"text-dark\" id=\"main-heading\">
                    <i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Retours d'expérience du service <strong>";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 202, $this->source); })()), "html", null, true);
        yield "</strong>
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">
                    Liste des retours d'expérience soumis par les agents du service ";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 205, $this->source); })()), "html", null, true);
        yield ".
                </p>
            </div>
            <div>
                <a
                    href=\"";
        // line 210
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedbacks");
        yield "\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à la liste des retours d'expérience\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à la liste
                </a>
            </div>
        </div>

        <div class=\"row mb-4\">
            <div class=\"col\">
                <div class=\"content-card\">
                    <div class=\"card-header\">
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <h2 class=\"h5 mb-0\" id=\"feedback-count\">";
        // line 225
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 225, $this->source); })()), "totalItems", [], "any", false, false, false, 225), "html", null, true);
        yield " retour(s) d'expérience</h2>
                        </div>
                    </div>
                    <div class=\"card-body\">
                        ";
        // line 229
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 229, $this->source); })())) > 0)) {
            // line 230
            yield "                            ";
            // line 231
            yield "                            <div class=\"mobile-view\">
                                <div class=\"feedback-list\" role=\"list\" aria-labelledby=\"feedback-count\">
                                    ";
            // line 233
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 233, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 234
                yield "                                        <article class=\"feedback-card\" role=\"listitem\">
                                            <div class=\"card-body p-4\">
                                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                                    <div class=\"feedback-header\">
                                                        <h3 class=\"h5 card-title mb-1\">";
                // line 238
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 238), "html", null, true);
                yield "</h3>
                                                    </div>
                                                    <div class=\"d-flex gap-2\">
                                                        ";
                // line 241
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 241)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 242
                    yield "                                                            <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\" aria-label=\"Statut: Traité\">
                                                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                            </span>
                                                        ";
                } else {
                    // line 246
                    yield "                                                            <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\" aria-label=\"Statut: En attente\">
                                                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                            </span>
                                                        ";
                }
                // line 250
                yield "                                                    </div>
                                                </div>

                                                <div class=\"feedback-meta mb-3\">
                                                    <div class=\"d-flex align-items-center mb-2\">
                                                        <i class=\"bi bi-person me-2\" aria-hidden=\"true\"></i>
                                                        <span>";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 256), "firstname", [], "any", false, false, false, 256), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 256), "lastname", [], "any", false, false, false, 256), "html", null, true);
                yield "</span>
                                                    </div>
                                                    <div class=\"d-flex align-items-center mb-2\">
                                                        <i class=\"bi bi-calendar3 me-2\" aria-hidden=\"true\"></i>
                                                        <time datetime=\"";
                // line 260
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 260), "Y-m-dTH:i:s"), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 260), "d/m/Y H:i"), "html", null, true);
                yield "</time>
                                                    </div>
                                                    <div class=\"d-flex align-items-center\">
                                                        <i class=\"bi bi-tag me-2\" aria-hidden=\"true\"></i>
                                                        ";
                // line 264
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 272
                yield "
                                                        ";
                // line 273
                $context["badge_class"] = ["integration_process" => "bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "training" => "bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "documentation" => "bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "tools" => "bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "communication" => "bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "other" => "bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"];
                // line 281
                yield "
                                                        ";
                // line 282
                $context["badge_text_class"] = ["integration_process" => "text-primary", "training" => "text-success", "documentation" => "text-info", "tools" => "text-warning", "communication" => "text-secondary", "other" => "text-dark"];
                // line 290
                yield "
                                                        <span class=\"badge ";
                // line 291
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["badge_class"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", true, true, false, 291) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 291, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", false, false, false, 291)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 291, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", false, false, false, 291), "html", null, true)) : ("bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"));
                yield " ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["badge_text_class"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", true, true, false, 291) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 291, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", false, false, false, 291)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 291, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 291), [], "array", false, false, false, 291), "html", null, true)) : ("text-dark"));
                yield "\" style=\"font-size: 0.75rem;\">
                                                            ";
                // line 292
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category_labels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 292), [], "array", true, true, false, 292) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 292, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 292), [], "array", false, false, false, 292)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 292, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 292), [], "array", false, false, false, 292), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 292), "html", null, true)));
                yield "
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class=\"feedback-content text-truncate-2 my-3\" aria-label=\"Contenu du retour d'expérience\">
                                                    ";
                // line 298
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "content", [], "any", false, false, false, 298)), 0, 150), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "content", [], "any", false, false, false, 298)) > 150)) {
                    yield "...";
                }
                // line 299
                yield "                                                </div>

                                                <div class=\"d-flex justify-content-end mt-4\">
                                                    <a href=\"";
                // line 302
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 302)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\" style=\"padding: 0.4rem 1rem;\" aria-label=\"Voir les détails du retour d'expérience\">
                                                        <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir détails
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 309
            yield "                                </div>
                            </div>

                            ";
            // line 313
            yield "                            <div class=\"desktop-view\">
                                <div class=\"table-responsive\">
                                    <table class=\"feedback-table\" aria-labelledby=\"feedback-count\">
                                        <thead>
                                            <tr>
                                                <th scope=\"col\">Titre</th>
                                                <th scope=\"col\">Auteur</th>
                                                <th scope=\"col\">Catégorie</th>
                                                <th scope=\"col\">Date</th>
                                                <th scope=\"col\">Statut</th>
                                                <th scope=\"col\" class=\"text-end\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ";
            // line 327
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 327, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 328
                yield "                                                <tr>
                                                    <td>
                                                        <div class=\"feedback-header\">
                                                            <span class=\"fw-medium\">";
                // line 331
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "title", [], "any", false, false, false, 331), "html", null, true);
                yield "</span>
                                                        </div>
                                                    </td>
                                                    <td>";
                // line 334
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 334), "firstname", [], "any", false, false, false, 334), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 334), "lastname", [], "any", false, false, false, 334), "html", null, true);
                yield "</td>
                                                    <td>
                                                        ";
                // line 336
                $context["category_labels"] = ["integration_process" => "Processus d'intégration", "training" => "Formation", "documentation" => "Documentation", "tools" => "Outils", "communication" => "Communication", "other" => "Autre"];
                // line 344
                yield "
                                                        ";
                // line 345
                $context["badge_class"] = ["integration_process" => "bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "training" => "bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "documentation" => "bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "tools" => "bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "communication" => "bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill", "other" => "bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"];
                // line 353
                yield "
                                                        ";
                // line 354
                $context["badge_text_class"] = ["integration_process" => "text-primary", "training" => "text-success", "documentation" => "text-info", "tools" => "text-warning", "communication" => "text-secondary", "other" => "text-dark"];
                // line 362
                yield "
                                                        <span class=\"badge ";
                // line 363
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["badge_class"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", true, true, false, 363) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 363, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", false, false, false, 363)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_class"]) || array_key_exists("badge_class", $context) ? $context["badge_class"] : (function () { throw new RuntimeError('Variable "badge_class" does not exist.', 363, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", false, false, false, 363), "html", null, true)) : ("bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill"));
                yield " ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["badge_text_class"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", true, true, false, 363) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 363, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", false, false, false, 363)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge_text_class"]) || array_key_exists("badge_text_class", $context) ? $context["badge_text_class"] : (function () { throw new RuntimeError('Variable "badge_text_class" does not exist.', 363, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 363), [], "array", false, false, false, 363), "html", null, true)) : ("text-dark"));
                yield "\" style=\"font-size: 0.75rem;\">
                                                            ";
                // line 364
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["category_labels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 364), [], "array", true, true, false, 364) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 364, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 364), [], "array", false, false, false, 364)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["category_labels"]) || array_key_exists("category_labels", $context) ? $context["category_labels"] : (function () { throw new RuntimeError('Variable "category_labels" does not exist.', 364, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 364), [], "array", false, false, false, 364), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "category", [], "any", false, false, false, 364), "html", null, true)));
                yield "
                                                        </span>
                                                    </td>
                                                    <td><time datetime=\"";
                // line 367
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 367), "Y-m-dTH:i:s"), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "createdAt", [], "any", false, false, false, 367), "d/m/Y"), "html", null, true);
                yield "</time></td>
                                                    <td>
                                                        ";
                // line 369
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "isReviewed", [], "any", false, false, false, 369)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 370
                    yield "                                                            <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                            </span>
                                                        ";
                } else {
                    // line 374
                    yield "                                                            <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                                                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                            </span>
                                                        ";
                }
                // line 378
                yield "                                                    </td>
                                                    <td class=\"text-end\">
                                                        <a
                                                            href=\"";
                // line 381
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_feedback_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 381)]), "html", null, true);
                yield "\"
                                                            class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                            style=\"padding: 0.4rem 1rem;\"
                                                            aria-label=\"Voir les détails du retour d'expérience\"
                                                        >
                                                            <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                        </a>
                                                    </td>

                                                </tr>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 392
            yield "                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            ";
            // line 398
            yield "                            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 398, $this->source); })()), "totalPages", [], "any", false, false, false, 398) > 1)) {
                // line 399
                yield "                                <div class=\"mt-5\">
                                    <nav aria-label=\"Pagination des retours d'expérience\">
                                        <ul class=\"pagination justify-content-center\">
                                            ";
                // line 403
                yield "                                            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 403, $this->source); })()), "currentPage", [], "any", false, false, false, 403) > 1)) {
                    // line 404
                    yield "                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"";
                    // line 405
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => (isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 405, $this->source); })()), "page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 405, $this->source); })()), "currentPage", [], "any", false, false, false, 405) - 1)]), "html", null, true);
                    yield "\" aria-label=\"Page précédente\">
                                                        <i class=\"bi bi-chevron-left\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Page précédente</span>
                                                    </a>
                                                </li>
                                            ";
                } else {
                    // line 411
                    yield "                                                <li class=\"page-item disabled\">
                                                    <span class=\"page-link\" aria-hidden=\"true\">
                                                        <i class=\"bi bi-chevron-left\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Pas de page précédente disponible</span>
                                                    </span>
                                                </li>
                                            ";
                }
                // line 418
                yield "
                                            ";
                // line 420
                yield "                                            ";
                $context["visiblePages"] = 3;
                // line 421
                yield "                                            ";
                $context["halfVisible"] = Twig\Extension\CoreExtension::round(((isset($context["visiblePages"]) || array_key_exists("visiblePages", $context) ? $context["visiblePages"] : (function () { throw new RuntimeError('Variable "visiblePages" does not exist.', 421, $this->source); })()) / 2), 0, "floor");
                // line 422
                yield "                                            ";
                $context["startPage"] = max(1, (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 422, $this->source); })()), "currentPage", [], "any", false, false, false, 422) - (isset($context["halfVisible"]) || array_key_exists("halfVisible", $context) ? $context["halfVisible"] : (function () { throw new RuntimeError('Variable "halfVisible" does not exist.', 422, $this->source); })())));
                // line 423
                yield "                                            ";
                $context["endPage"] = min(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 423, $this->source); })()), "totalPages", [], "any", false, false, false, 423), (((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 423, $this->source); })()) + (isset($context["visiblePages"]) || array_key_exists("visiblePages", $context) ? $context["visiblePages"] : (function () { throw new RuntimeError('Variable "visiblePages" does not exist.', 423, $this->source); })())) - 1));
                // line 424
                yield "                                            ";
                $context["startPage"] = max(1, (((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 424, $this->source); })()) - (isset($context["visiblePages"]) || array_key_exists("visiblePages", $context) ? $context["visiblePages"] : (function () { throw new RuntimeError('Variable "visiblePages" does not exist.', 424, $this->source); })())) + 1));
                // line 425
                yield "
                                            ";
                // line 427
                yield "                                            ";
                if (((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 427, $this->source); })()) > 1)) {
                    // line 428
                    yield "                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"";
                    // line 429
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => (isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 429, $this->source); })()), "page" => 1]), "html", null, true);
                    yield "\" aria-label=\"Première page\">1</a>
                                                </li>
                                                ";
                    // line 431
                    if (((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 431, $this->source); })()) > 2)) {
                        // line 432
                        yield "                                                    <li class=\"page-item disabled\">
                                                        <span class=\"page-link\" aria-hidden=\"true\">...</span>
                                                    </li>
                                                ";
                    }
                    // line 436
                    yield "                                            ";
                }
                // line 437
                yield "
                                            ";
                // line 439
                yield "                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 439, $this->source); })()), (isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 439, $this->source); })())));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 440
                    yield "                                                <li class=\"page-item ";
                    yield ((($context["i"] == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 440, $this->source); })()), "currentPage", [], "any", false, false, false, 440))) ? ("active") : (""));
                    yield "\">
                                                    <a class=\"page-link\" href=\"";
                    // line 441
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => (isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 441, $this->source); })()), "page" => $context["i"]]), "html", null, true);
                    yield "\"
                                                       aria-label=\"Page ";
                    // line 442
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "\"
                                                       ";
                    // line 443
                    yield ((($context["i"] == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 443, $this->source); })()), "currentPage", [], "any", false, false, false, 443))) ? ("aria-current=\"page\"") : (""));
                    yield ">
                                                        ";
                    // line 444
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "
                                                        ";
                    // line 445
                    if (($context["i"] == CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 445, $this->source); })()), "currentPage", [], "any", false, false, false, 445))) {
                        // line 446
                        yield "                                                            <span class=\"sr-only\">(page actuelle)</span>
                                                        ";
                    }
                    // line 448
                    yield "                                                    </a>
                                                </li>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 451
                yield "
                                            ";
                // line 453
                yield "                                            ";
                if (((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 453, $this->source); })()) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 453, $this->source); })()), "totalPages", [], "any", false, false, false, 453))) {
                    // line 454
                    yield "                                                ";
                    if (((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 454, $this->source); })()) < (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 454, $this->source); })()), "totalPages", [], "any", false, false, false, 454) - 1))) {
                        // line 455
                        yield "                                                    <li class=\"page-item disabled\">
                                                        <span class=\"page-link\" aria-hidden=\"true\">...</span>
                                                    </li>
                                                ";
                    }
                    // line 459
                    yield "                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"";
                    // line 460
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => (isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 460, $this->source); })()), "page" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 460, $this->source); })()), "totalPages", [], "any", false, false, false, 460)]), "html", null, true);
                    yield "\" aria-label=\"Dernière page\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 460, $this->source); })()), "totalPages", [], "any", false, false, false, 460), "html", null, true);
                    yield "</a>
                                                </li>
                                            ";
                }
                // line 463
                yield "
                                            ";
                // line 465
                yield "                                            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 465, $this->source); })()), "currentPage", [], "any", false, false, false, 465) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 465, $this->source); })()), "totalPages", [], "any", false, false, false, 465))) {
                    // line 466
                    yield "                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"";
                    // line 467
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_service_feedbacks", ["name" => (isset($context["service_name"]) || array_key_exists("service_name", $context) ? $context["service_name"] : (function () { throw new RuntimeError('Variable "service_name" does not exist.', 467, $this->source); })()), "page" => (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 467, $this->source); })()), "currentPage", [], "any", false, false, false, 467) + 1)]), "html", null, true);
                    yield "\" aria-label=\"Page suivante\">
                                                        <i class=\"bi bi-chevron-right\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Page suivante</span>
                                                    </a>
                                                </li>
                                            ";
                } else {
                    // line 473
                    yield "                                                <li class=\"page-item disabled\">
                                                    <span class=\"page-link\" aria-hidden=\"true\">
                                                        <i class=\"bi bi-chevron-right\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Pas de page suivante disponible</span>
                                                    </span>
                                                </li>
                                            ";
                }
                // line 480
                yield "                                        </ul>
                                    </nav>
                                </div>
                            ";
            }
            // line 484
            yield "                        ";
        } else {
            // line 485
            yield "                            <div class=\"alert alert-info d-flex align-items-center\" role=\"alert\" aria-live=\"polite\">
                                <i class=\"bi bi-info-circle me-2 flex-shrink-0\" aria-hidden=\"true\"></i>
                                <div>
                                    Aucun retour d'expérience trouvé pour ce service.
                                </div>
                            </div>
                        ";
        }
        // line 492
        yield "                    </div>
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
        return "admin/progress/service_feedbacks.html.twig";
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
        return array (  573 => 492,  564 => 485,  561 => 484,  555 => 480,  546 => 473,  537 => 467,  534 => 466,  531 => 465,  528 => 463,  520 => 460,  517 => 459,  511 => 455,  508 => 454,  505 => 453,  502 => 451,  494 => 448,  490 => 446,  488 => 445,  484 => 444,  480 => 443,  476 => 442,  472 => 441,  467 => 440,  462 => 439,  459 => 437,  456 => 436,  450 => 432,  448 => 431,  443 => 429,  440 => 428,  437 => 427,  434 => 425,  431 => 424,  428 => 423,  425 => 422,  422 => 421,  419 => 420,  416 => 418,  407 => 411,  398 => 405,  395 => 404,  392 => 403,  387 => 399,  384 => 398,  377 => 392,  360 => 381,  355 => 378,  349 => 374,  343 => 370,  341 => 369,  334 => 367,  328 => 364,  322 => 363,  319 => 362,  317 => 354,  314 => 353,  312 => 345,  309 => 344,  307 => 336,  300 => 334,  294 => 331,  289 => 328,  285 => 327,  269 => 313,  264 => 309,  251 => 302,  246 => 299,  241 => 298,  232 => 292,  226 => 291,  223 => 290,  221 => 282,  218 => 281,  216 => 273,  213 => 272,  211 => 264,  202 => 260,  193 => 256,  185 => 250,  179 => 246,  173 => 242,  171 => 241,  165 => 238,  159 => 234,  155 => 233,  151 => 231,  149 => 230,  147 => 229,  140 => 225,  122 => 210,  114 => 205,  108 => 202,  101 => 197,  88 => 196,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Retours d'expérience du service {{ service_name }}{% endblock %}

{#{% block stylesheets %}
    {{ parent() }}
    <style>
        /* Variables pour l'accessibilité et la cohérence */
        :root {
            --primary-color: #3d5f9e;
            --primary-dark: #2d4a7d;
            --primary-hover: #34508a;
            --primary-light: rgba(61, 145, 158, 0.15);
            --text-dark: #2c384e;
            --text-muted: #5d6778;
            --bg-light: #f8f9fa;
            --border-color: #d1d7e0;
            --success-color: #2e7d32;
            --warning-color: #e65100;
            --info-color: #0277bd;
            --danger-color: #c62828;
            --card-radius: 0.75rem;
            --transition-speed: 0.2s;
            --focus-ring-color: rgba(61, 95, 158, 0.5);
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        /* Focus styles pour l'accessibilité */
        a:focus, button:focus, input:focus, select:focus, textarea:focus {
            outline: 3px solid var(--focus-ring-color) !important;
            outline-offset: 2px !important;
            box-shadow: none !important;
        }

        /* Classe pour les éléments visibles uniquement par les lecteurs d'écran */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        /* Styles généraux */
        .content-card {
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-sm);
            background-color: #fff;
            border: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
        }

        .content-card .card-header {
            background-color: #fff;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        .dashboard-header {
            border-left: 5px solid var(--primary-color);
            padding-left: 1rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        /* Styles des cartes pour mobile */
        .feedback-card {
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            background-color: #fff;
            /* Pas de transition pour éviter l'effet hover */
        }

        .feedback-badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }

        .feedback-meta {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .feedback-content {
            color: var(--text-dark);
            font-size: 0.95rem;
            margin: 0.75rem 0;
        }

        /* Troncature du texte sur 2 lignes */
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Styles du tableau */
        .feedback-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .feedback-table th {
            background-color: var(--bg-light);
            color: var(--text-dark);
            font-weight: 600;
            padding: 1rem 1.25rem;
            border-bottom: 2px solid var(--border-color);
        }

        .feedback-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .feedback-table tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .feedback-table tr:hover {
            background-color: var(--primary-light);
        }

        /* Pagination */
        .page-link {
            color: var(--primary-color);
            border-radius: 0.25rem;
            margin: 0 0.15rem;
            transition: all var(--transition-speed) ease;
        }

        .page-link:hover {
            color: var(--primary-dark);
            background-color: var(--primary-light);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Boutons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all var(--transition-speed) ease;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-secondary {
            color: var(--text-muted);
            border-color: var(--border-color);
        }

        .btn-outline-secondary:hover, .btn-outline-secondary:focus {
            background-color: var(--bg-light);
            color: var(--text-dark);
            border-color: var(--text-muted);
        }

        /* Responsive design */
        .mobile-view {
            display: block;
        }

        .desktop-view {
            display: none;
        }

        @media (min-width: 992px) {
            .mobile-view {
                display: none;
            }

            .desktop-view {
                display: block;
            }
        }
    </style>
{% endblock %}#}

{% block body %}
    <div class=\"container-fluid py-4 py-md-5\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5\">
            <div>
                <h1 class=\"text-dark\" id=\"main-heading\">
                    <i class=\"bi bi-chat-dots me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Retours d'expérience du service <strong>{{ service_name }}</strong>
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">
                    Liste des retours d'expérience soumis par les agents du service {{ service_name }}.
                </p>
            </div>
            <div>
                <a
                    href=\"{{ path('admin_progress_feedbacks') }}\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à la liste des retours d'expérience\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à la liste
                </a>
            </div>
        </div>

        <div class=\"row mb-4\">
            <div class=\"col\">
                <div class=\"content-card\">
                    <div class=\"card-header\">
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <h2 class=\"h5 mb-0\" id=\"feedback-count\">{{ pagination.totalItems }} retour(s) d'expérience</h2>
                        </div>
                    </div>
                    <div class=\"card-body\">
                        {% if feedbacks|length > 0 %}
                            {# Vue mobile (cartes) #}
                            <div class=\"mobile-view\">
                                <div class=\"feedback-list\" role=\"list\" aria-labelledby=\"feedback-count\">
                                    {% for feedback in feedbacks %}
                                        <article class=\"feedback-card\" role=\"listitem\">
                                            <div class=\"card-body p-4\">
                                                <div class=\"d-flex justify-content-between align-items-start mb-2\">
                                                    <div class=\"feedback-header\">
                                                        <h3 class=\"h5 card-title mb-1\">{{ feedback.title }}</h3>
                                                    </div>
                                                    <div class=\"d-flex gap-2\">
                                                        {% if feedback.isReviewed %}
                                                            <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\" aria-label=\"Statut: Traité\">
                                                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                            </span>
                                                        {% else %}
                                                            <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\" aria-label=\"Statut: En attente\">
                                                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                            </span>
                                                        {% endif %}
                                                    </div>
                                                </div>

                                                <div class=\"feedback-meta mb-3\">
                                                    <div class=\"d-flex align-items-center mb-2\">
                                                        <i class=\"bi bi-person me-2\" aria-hidden=\"true\"></i>
                                                        <span>{{ feedback.author.firstname }} {{ feedback.author.lastname }}</span>
                                                    </div>
                                                    <div class=\"d-flex align-items-center mb-2\">
                                                        <i class=\"bi bi-calendar3 me-2\" aria-hidden=\"true\"></i>
                                                        <time datetime=\"{{ feedback.createdAt|date('Y-m-d\\TH:i:s') }}\">{{ feedback.createdAt|date('d/m/Y H:i') }}</time>
                                                    </div>
                                                    <div class=\"d-flex align-items-center\">
                                                        <i class=\"bi bi-tag me-2\" aria-hidden=\"true\"></i>
                                                        {% set category_labels = {
                                                            'integration_process': 'Processus d\\'intégration',
                                                            'training': 'Formation',
                                                            'documentation': 'Documentation',
                                                            'tools': 'Outils',
                                                            'communication': 'Communication',
                                                            'other': 'Autre'
                                                        } %}

                                                        {% set badge_class = {
                                                            'integration_process': 'bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'training': 'bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'documentation': 'bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'tools': 'bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'communication': 'bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'other': 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill'
                                                        } %}

                                                        {% set badge_text_class = {
                                                            'integration_process': 'text-primary',
                                                            'training': 'text-success',
                                                            'documentation': 'text-info',
                                                            'tools': 'text-warning',
                                                            'communication': 'text-secondary',
                                                            'other': 'text-dark'
                                                        } %}

                                                        <span class=\"badge {{ badge_class[feedback.category] ?? 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill' }} {{ badge_text_class[feedback.category] ?? 'text-dark' }}\" style=\"font-size: 0.75rem;\">
                                                            {{ category_labels[feedback.category] ?? feedback.category }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class=\"feedback-content text-truncate-2 my-3\" aria-label=\"Contenu du retour d'expérience\">
                                                    {{ feedback.content|striptags|slice(0, 150) }}{% if feedback.content|length > 150 %}...{% endif %}
                                                </div>

                                                <div class=\"d-flex justify-content-end mt-4\">
                                                    <a href=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\" class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\" style=\"padding: 0.4rem 1rem;\" aria-label=\"Voir les détails du retour d'expérience\">
                                                        <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir détails
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    {% endfor %}
                                </div>
                            </div>

                            {# Vue desktop (tableau) #}
                            <div class=\"desktop-view\">
                                <div class=\"table-responsive\">
                                    <table class=\"feedback-table\" aria-labelledby=\"feedback-count\">
                                        <thead>
                                            <tr>
                                                <th scope=\"col\">Titre</th>
                                                <th scope=\"col\">Auteur</th>
                                                <th scope=\"col\">Catégorie</th>
                                                <th scope=\"col\">Date</th>
                                                <th scope=\"col\">Statut</th>
                                                <th scope=\"col\" class=\"text-end\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {% for feedback in feedbacks %}
                                                <tr>
                                                    <td>
                                                        <div class=\"feedback-header\">
                                                            <span class=\"fw-medium\">{{ feedback.title }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ feedback.author.firstname }} {{ feedback.author.lastname }}</td>
                                                    <td>
                                                        {% set category_labels = {
                                                            'integration_process': 'Processus d\\'intégration',
                                                            'training': 'Formation',
                                                            'documentation': 'Documentation',
                                                            'tools': 'Outils',
                                                            'communication': 'Communication',
                                                            'other': 'Autre'
                                                        } %}

                                                        {% set badge_class = {
                                                            'integration_process': 'bg-primary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'training': 'bg-success bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'documentation': 'bg-info bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'tools': 'bg-warning bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'communication': 'bg-secondary bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill',
                                                            'other': 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill'
                                                        } %}

                                                        {% set badge_text_class = {
                                                            'integration_process': 'text-primary',
                                                            'training': 'text-success',
                                                            'documentation': 'text-info',
                                                            'tools': 'text-warning',
                                                            'communication': 'text-secondary',
                                                            'other': 'text-dark'
                                                        } %}

                                                        <span class=\"badge {{ badge_class[feedback.category] ?? 'bg-dark bg-opacity-10 fw-medium text-uppercase ls-1 rounded-pill' }} {{ badge_text_class[feedback.category] ?? 'text-dark' }}\" style=\"font-size: 0.75rem;\">
                                                            {{ category_labels[feedback.category] ?? feedback.category }}
                                                        </span>
                                                    </td>
                                                    <td><time datetime=\"{{ feedback.createdAt|date('Y-m-d\\TH:i:s') }}\">{{ feedback.createdAt|date('d/m/Y') }}</time></td>
                                                    <td>
                                                        {% if feedback.isReviewed %}
                                                            <span class=\"badge bg-success bg-opacity-10 text-success fw-medium rounded-pill px-3 py-2\" style=\"font-size: 0.75rem;\">
                                                                <i class=\"bi bi-check-circle me-1\" aria-hidden=\"true\"></i> Traité
                                                            </span>
                                                        {% else %}
                                                            <span class=\"badge bg-warning bg-opacity-10 fw-medium rounded-pill px-3 py-2\" style=\"color: var(--warning-color); font-size: 0.75rem;\">
                                                                <i class=\"bi bi-clock me-1\" aria-hidden=\"true\"></i> En attente
                                                            </span>
                                                        {% endif %}
                                                    </td>
                                                    <td class=\"text-end\">
                                                        <a
                                                            href=\"{{ path('admin_progress_feedback_detail', {'id': feedback.id}) }}\"
                                                            class=\"btn btn-sm btn-outline-primary rounded-pill shadow-sm\"
                                                            style=\"padding: 0.4rem 1rem;\"
                                                            aria-label=\"Voir les détails du retour d'expérience\"
                                                        >
                                                            <i class=\"bi bi-eye me-1\" aria-hidden=\"true\"></i> Voir
                                                        </a>
                                                    </td>

                                                </tr>
                                            {% endfor %}
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {# Pagination #}
                            {% if pagination.totalPages > 1 %}
                                <div class=\"mt-5\">
                                    <nav aria-label=\"Pagination des retours d'expérience\">
                                        <ul class=\"pagination justify-content-center\">
                                            {# Bouton précédent #}
                                            {% if pagination.currentPage > 1 %}
                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"{{ path('admin_progress_service_feedbacks', {'name': service_name, 'page': pagination.currentPage - 1}) }}\" aria-label=\"Page précédente\">
                                                        <i class=\"bi bi-chevron-left\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Page précédente</span>
                                                    </a>
                                                </li>
                                            {% else %}
                                                <li class=\"page-item disabled\">
                                                    <span class=\"page-link\" aria-hidden=\"true\">
                                                        <i class=\"bi bi-chevron-left\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Pas de page précédente disponible</span>
                                                    </span>
                                                </li>
                                            {% endif %}

                                            {# Logique pour afficher un nombre limité de pages avec ellipses #}
                                            {% set visiblePages = 3 %}
                                            {% set halfVisible = (visiblePages / 2)|round(0, 'floor') %}
                                            {% set startPage = max(1, pagination.currentPage - halfVisible) %}
                                            {% set endPage = min(pagination.totalPages, startPage + visiblePages - 1) %}
                                            {% set startPage = max(1, endPage - visiblePages + 1) %}

                                            {# Première page et ellipse si nécessaire #}
                                            {% if startPage > 1 %}
                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"{{ path('admin_progress_service_feedbacks', {'name': service_name, 'page': 1}) }}\" aria-label=\"Première page\">1</a>
                                                </li>
                                                {% if startPage > 2 %}
                                                    <li class=\"page-item disabled\">
                                                        <span class=\"page-link\" aria-hidden=\"true\">...</span>
                                                    </li>
                                                {% endif %}
                                            {% endif %}

                                            {# Pages visibles #}
                                            {% for i in startPage..endPage %}
                                                <li class=\"page-item {{ i == pagination.currentPage ? 'active' : '' }}\">
                                                    <a class=\"page-link\" href=\"{{ path('admin_progress_service_feedbacks', {'name': service_name, 'page': i}) }}\"
                                                       aria-label=\"Page {{ i }}\"
                                                       {{ i == pagination.currentPage ? 'aria-current=\"page\"' : '' }}>
                                                        {{ i }}
                                                        {% if i == pagination.currentPage %}
                                                            <span class=\"sr-only\">(page actuelle)</span>
                                                        {% endif %}
                                                    </a>
                                                </li>
                                            {% endfor %}

                                            {# Dernière page et ellipse si nécessaire #}
                                            {% if endPage < pagination.totalPages %}
                                                {% if endPage < pagination.totalPages - 1 %}
                                                    <li class=\"page-item disabled\">
                                                        <span class=\"page-link\" aria-hidden=\"true\">...</span>
                                                    </li>
                                                {% endif %}
                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"{{ path('admin_progress_service_feedbacks', {'name': service_name, 'page': pagination.totalPages}) }}\" aria-label=\"Dernière page\">{{ pagination.totalPages }}</a>
                                                </li>
                                            {% endif %}

                                            {# Bouton suivant #}
                                            {% if pagination.currentPage < pagination.totalPages %}
                                                <li class=\"page-item\">
                                                    <a class=\"page-link\" href=\"{{ path('admin_progress_service_feedbacks', {'name': service_name, 'page': pagination.currentPage + 1}) }}\" aria-label=\"Page suivante\">
                                                        <i class=\"bi bi-chevron-right\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Page suivante</span>
                                                    </a>
                                                </li>
                                            {% else %}
                                                <li class=\"page-item disabled\">
                                                    <span class=\"page-link\" aria-hidden=\"true\">
                                                        <i class=\"bi bi-chevron-right\" aria-hidden=\"true\"></i>
                                                        <span class=\"sr-only\">Pas de page suivante disponible</span>
                                                    </span>
                                                </li>
                                            {% endif %}
                                        </ul>
                                    </nav>
                                </div>
                            {% endif %}
                        {% else %}
                            <div class=\"alert alert-info d-flex align-items-center\" role=\"alert\" aria-live=\"polite\">
                                <i class=\"bi bi-info-circle me-2 flex-shrink-0\" aria-hidden=\"true\"></i>
                                <div>
                                    Aucun retour d'expérience trouvé pour ce service.
                                </div>
                            </div>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "admin/progress/service_feedbacks.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/progress/service_feedbacks.html.twig");
    }
}
