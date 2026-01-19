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

/* admin/progress/user_details.html.twig */
class __TwigTemplate_4890c975071913cefdd2d314afe89b3d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/user_details.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/progress/user_details.html.twig"));

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

        yield "Détails de progression - ";
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
        /* Style pour tous les modals */
        [popover] {
            /* Taille et positionnement */
            max-width: min(500px, 90vw);
            width: 100%;
            padding: 0;
            border: none;
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(0, 0, 0, 0.05);

            /* Couleurs et fond */
            background: #ffffff;
            color: #1f2937;

            /* Empêche l'ancrage automatique */
            anchor: none;

            /* Position centrée */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.98);

            /* Animation d'apparition */
            opacity: 0;
            transition: opacity 0.2s ease-out, transform 0.2s ease-out;

            /* Supprime les styles par défaut */
            outline: none;
            margin: 0;

        }

        /* Animation d'ouverture */
        [popover]:popover-open {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        /* Fond sombre (backdrop) */
        [popover]::backdrop {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.2s ease-out;
        }

        [popover]:popover-open::backdrop {
            opacity: 1;
        }

        /* Header du modal */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px 0 24px;
            margin-bottom: 16px;
        }

        .modal-title {
            position: relative;
            font-size: 1.25rem;       /* ≈ 20px */
            font-weight: 600;
            color: #1f2937;           /* texte gris foncé */
            margin: .5rem 0;
            padding-left: 12px;       /* espace pour la barre */
            line-height: 1.4;
            letter-spacing: -0.01em;
        }

        .modal-title::before {
            content: \"\";
            position: absolute;
            left: 0;
            top: 0.2em;
            bottom: 0.2em;
            width: 3px;
            border-radius: 2px;
        background: linear-gradient(45deg, #3d5f9e, #526fa8)
            /* gris bleuté → vert pétrole */
        }



        /* Bouton de fermeture élégant */
        .btn-close {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;                  /* cercle pour plus de modernité */
            background: transparent;
            color: #475569;                      /* gris neutre */
            font-size: 20px;                     /* croix un peu plus visible */
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0;
            margin: 0;
            line-height: 1;
        }

        /* Hover = contraste neutre, pro */
        .btn-close:hover {
            background: #f1f5f9;                 /* gris clair élégant */
            color: #dc2626;                      /* rouge subtil pour alerter */
            transform: scale(1.08);
        }

        /* Active = retour doux */
        .btn-close:active {
            transform: scale(0.95);
            background: #e5e7eb;
            color: #b91c1c;
        }

        /* Accessibilité : focus visible */
        .btn-close:focus {
            outline: 2px solid #94a3b8;          /* halo gris bleuté sobre */
            outline-offset: 2px;
        }

        /* Contenu du modal */
        .modal-content {
            padding: 0 24px 24px 24px;
            line-height: 1.6;
            color: #4b5563;
        }

        .modal-content p {
            margin: 0 0 12px 0;
            font-size: 0.95rem;
        }

        .modal-content p:last-child {
            margin-bottom: 0;
        }

        /* Bouton d'ouverture élégant */
        .btn-open-modal {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .btn-open-modal:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-open-modal:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Icône dans le bouton */
        .btn-open-modal i {
            font-size: 0.875rem;
            opacity: 0.7;
        }

        /* Version désactivée */
        .btn-disabled {
            color: #9ca3af;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn-disabled:hover {
            background: #f8fafc;
            border-color: #e2e8f0;
            transform: none;
            box-shadow: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            [popover] {
                max-width: 95vw;
                margin: 20px auto;
            }

            .modal-header,
            .modal-content {
                padding-left: 16px;
                padding-right: 16px;
            }

            .modal-header {
                padding-top: 16px;
            }

            .modal-content {
                padding-bottom: 16px;
            }
        }
    </style>
    <div class=\"container-fluid py-4\">
        <div class=\"dashboard-header\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <h1 class=\"d-flex align-items-center\">
                        <span class=\"d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3\" style=\"width: 48px; height: 48px\">
                            <i class=\"bi bi-person-bounding-box fs-4\"></i>
                        </span>
                        Progression de ";
        // line 229
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 229, $this->source); })()), "fullName", [], "any", false, false, false, 229), "html", null, true);
        yield "
                    </h1>
                    <p class=\"text-muted mt-2 mb-3 fs-sm\">Détails de progression et validation des modules</p>

                    <!-- Bouton de retour vers le tableau de bord - s'affiche sous le paragraphe sur mobile/tablette et à droite sur desktop -->
                    <div class=\"d-flex d-lg-none mb-2\">
                        <a href=\"";
        // line 235
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard");
        yield "\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center w-100 justify-content-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                            <i class=\"bi bi-arrow-left me-2\"></i>Tableau de bord
                        </a>
                    </div>
                </div>
                <div class=\"col-12 d-none d-lg-flex justify-content-end\">
                    <a href=\"";
        // line 241
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_progress_dashboard");
        yield "\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                        <i class=\"bi bi-arrow-left me-2\"></i>Tableau de bord
                    </a>
                </div>
            </div>
        </div>


        ";
        // line 250
        yield "        <div class=\"row g-4 mb-4\">
            <div class=\"col-md-6\">
                <div class=\"content-card h-100\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0 d-flex align-items-center\">
                            <i class=\"bi bi-person-fill me-2 text-warning\"></i>Informations de l'apprenant
                        </h5>
                        <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                            <i class=\"bi bi-info-circle me-1\"></i>Profil
                        </span>
                    </div>
                    <div class=\"card-body p-4 p-sm-3\">
                        <!-- Version mobile optimisée avec disposition en liste verticale -->
                        <div class=\"d-block d-md-none\">
                            <ul class=\"list-group list-group-flush user-info-mobile\">
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-person me-2\"></i>Nom complet</div>
                                    <div class=\"user-info-mobile-value fw-medium\">";
        // line 267
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 267, $this->source); })()), "fullName", [], "any", false, false, false, 267), "html", null, true);
        yield "</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-envelope me-2\"></i>Email</div>
                                    <div class=\"user-info-mobile-value\">";
        // line 271
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 271, $this->source); })()), "email", [], "any", false, false, false, 271), "html", null, true);
        yield "</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-credit-card me-2\"></i>NNI</div>
                                    <div class=\"user-info-mobile-value\">";
        // line 275
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 275, $this->source); })()), "nni", [], "any", false, false, false, 275), "html", null, true);
        yield "</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-calendar-event me-2\"></i>Date d'embauche</div>
                                    <div class=\"user-info-mobile-value\">
                                        ";
        // line 280
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 280, $this->source); })()), "hiringAt", [], "any", false, false, false, 280)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 281
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 281, $this->source); })()), "hiringAt", [], "any", false, false, false, 281), "d/m/Y"), "html", null, true);
            yield "
                                        ";
        } else {
            // line 283
            yield "                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        ";
        }
        // line 285
        yield "                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-person-check me-2\"></i>Tuteur</div>
                                    <div class=\"user-info-mobile-value\">
                                        ";
        // line 290
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 290, $this->source); })()), "mentor", [], "any", false, false, false, 290)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 291
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 291, $this->source); })()), "mentor", [], "any", false, false, false, 291), "fullName", [], "any", false, false, false, 291), "html", null, true);
            yield "
                                        ";
        } else {
            // line 293
            yield "                                            <span class=\"badge bg-warning text-dark rounded-pill fw-light ls-1\">Non assigné</span>
                                        ";
        }
        // line 295
        yield "                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-briefcase me-2\"></i>Poste</div>
                                    <div class=\"user-info-mobile-value\">
                                        ";
        // line 300
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 300, $this->source); })()), "job", [], "any", false, false, false, 300)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 301
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 301, $this->source); })()), "job", [], "any", false, false, false, 301), "name", [], "any", false, false, false, 301), "html", null, true);
            yield "
                                        ";
        } else {
            // line 303
            yield "                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        ";
        }
        // line 305
        yield "                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-award me-2\"></i>Spécialité</div>
                                    <div class=\"user-info-mobile-value\">
                                        ";
        // line 310
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 310, $this->source); })()), "speciality", [], "any", false, false, false, 310)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 311
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 311, $this->source); })()), "speciality", [], "any", false, false, false, 311), "name", [], "any", false, false, false, 311), "html", null, true);
            yield "
                                        ";
        } else {
            // line 313
            yield "                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        ";
        }
        // line 315
        yield "                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Version desktop avec disposition en grille -->
                        <div class=\"d-none d-md-block\">
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-person\"></i>Nom complet:</div>
                                    <div class=\"col-md-8 user-info-value\">";
        // line 325
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 325, $this->source); })()), "fullName", [], "any", false, false, false, 325), "html", null, true);
        yield "</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-envelope\"></i>Email:</div>
                                    <div class=\"col-md-8 user-info-value\">";
        // line 331
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 331, $this->source); })()), "email", [], "any", false, false, false, 331), "html", null, true);
        yield "</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-credit-card\"></i>NNI:</div>
                                    <div class=\"col-md-8 user-info-value\">";
        // line 337
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 337, $this->source); })()), "nni", [], "any", false, false, false, 337), "html", null, true);
        yield "</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-calendar-event\"></i>Date d'embauche:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        ";
        // line 344
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 344, $this->source); })()), "hiringAt", [], "any", false, false, false, 344)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 345
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 345, $this->source); })()), "hiringAt", [], "any", false, false, false, 345), "d/m/Y"), "html", null, true);
            yield "
                                        ";
        } else {
            // line 347
            yield "                                            <span class=\"text-muted\">Non renseigné</span>
                                        ";
        }
        // line 349
        yield "                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-person-check\"></i>Tuteur:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        ";
        // line 356
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 356, $this->source); })()), "mentor", [], "any", false, false, false, 356)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 357
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 357, $this->source); })()), "mentor", [], "any", false, false, false, 357), "fullName", [], "any", false, false, false, 357), "html", null, true);
            yield "
                                        ";
        } else {
            // line 359
            yield "                                            <span class=\"badge bg-warning text-dark rounded-pill fw-light ls-1\">Non assigné</span>
                                        ";
        }
        // line 361
        yield "                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-briefcase\"></i>Poste:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        ";
        // line 368
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 368, $this->source); })()), "job", [], "any", false, false, false, 368)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 369
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 369, $this->source); })()), "job", [], "any", false, false, false, 369), "name", [], "any", false, false, false, 369), "html", null, true);
            yield "
                                        ";
        } else {
            // line 371
            yield "                                            <span class=\"text-muted\">Non renseigné</span>
                                        ";
        }
        // line 373
        yield "                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-award\"></i>Spécialité:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        ";
        // line 380
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 380, $this->source); })()), "speciality", [], "any", false, false, false, 380)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 381
            yield "                                            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 381, $this->source); })()), "speciality", [], "any", false, false, false, 381), "name", [], "any", false, false, false, 381), "html", null, true);
            yield "
                                        ";
        } else {
            // line 383
            yield "                                            <span class=\"text-muted\">Non renseigné</span>
                                        ";
        }
        // line 385
        yield "                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"content-card h-100\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0 d-flex align-items-center\">
                            <i class=\"bi bi-graph-up-arrow me-2 text-warning\"></i>Résumé de progression
                        </h5>
                        <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                            <i class=\"bi bi-lightning-charge-fill me-1\"></i>Temps réel
                        </span>
                    </div>
                    <div class=\"card-body p-4\">
                        <div class=\"text-center mb-3\">
                            <div class=\"row g-3\">
                                <div class=\"col-6\">
                                    <div class=\"progress-circle-container\">
                                        <h6 class=\"text-muted mb-2 fs-sm\">Auto-validation</h6>
                                        <div class=\"progress-circle mx-auto\" data-value=\"";
        // line 408
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 408, $this->source); })()), "agent_progress", [], "any", false, false, false, 408), "html", null, true);
        yield "\">
                                            <span class=\"progress-circle-left\">
                                                <span class=\"progress-circle-bar border-primary\"></span>
                                            </span>
                                            <span class=\"progress-circle-right\">
                                                <span class=\"progress-circle-bar border-primary\"></span>
                                            </span>
                                            <div class=\"progress-circle-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center\">
                                                <div class=\"h2 font-weight-bold\">";
        // line 416
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 416, $this->source); })()), "agent_progress", [], "any", false, false, false, 416), "html", null, true);
        yield "<sup class=\"small\">%</sup></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-6\">
                                    <div class=\"progress-circle-container\">
                                        <h6 class=\"text-muted mb-2 fs-sm\">Validation tuteur</h6>
                                        <div class=\"progress-circle mx-auto\" data-value=\"";
        // line 424
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 424, $this->source); })()), "mentor_progress", [], "any", false, false, false, 424), "html", null, true);
        yield "\">
                                            <span class=\"progress-circle-left\">
                                                <span class=\"progress-circle-bar border-success\"></span>
                                            </span>
                                            <span class=\"progress-circle-right\">
                                                <span class=\"progress-circle-bar border-success\"></span>
                                            </span>
                                            <div class=\"progress-circle-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center\">
                                                <div class=\"h2 font-weight-bold\">";
        // line 432
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 432, $this->source); })()), "mentor_progress", [], "any", false, false, false, 432), "html", null, true);
        yield "<sup class=\"small\">%</sup></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cartes statistiques avec disposition adaptative -->
                        <div class=\"row g-2 g-md-3 text-center mt-2\">
                            <!-- Sur mobile: 3 colonnes plus compactes, sur tablette/desktop: disposition normale -->
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-primary bg-opacity-10 p-2\">
                                                <i class=\"bi bi-list-ol text-primary\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">";
        // line 451
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 451, $this->source); })()), "total_modules", [], "any", false, false, false, 451), "html", null, true);
        yield "</div>
                                        <div class=\"stat-label\">Modules</div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-success bg-opacity-10 p-2\">
                                                <i class=\"bi bi-person-check text-success\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">";
        // line 464
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 464, $this->source); })()), "completed_by_agent", [], "any", false, false, false, 464), "html", null, true);
        yield "</div>
                                        <div class=\"stat-label\">Auto-validés</div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-warning bg-opacity-10 p-2\">
                                                <i class=\"bi bi-award text-warning-emphasis\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">";
        // line 477
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 477, $this->source); })()), "validated_by_mentor", [], "any", false, false, false, 477), "html", null, true);
        yield "</div>
                                        <div class=\"stat-label\">Validés</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 489
        yield "        <div class=\"content-card mb-4\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0 d-flex align-items-center\">
                    <i class=\"bi bi-book-fill me-2 text-warning\"></i>Détail du carnet: ";
        // line 492
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 492, $this->source); })()), "name", [], "any", false, false, false, 492), "html", null, true);
        yield "
                </h5>
                <div>
                    <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1 me-2\">
                        <i class=\"bi bi-bookmark-fill me-1\"></i>";
        // line 496
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 496, $this->source); })()), "themes", [], "any", false, false, false, 496)), "html", null, true);
        yield " thèmes
                    </span>
                    <span class=\"badge bg-light text-primary rounded-pill fw-medium ls-1\">
                        <i class=\"bi bi-list-check me-1\"></i>";
        // line 499
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 499, $this->source); })()), "total_modules", [], "any", false, false, false, 499), "html", null, true);
        yield " modules
                    </span>
                </div>
            </div>
            <div class=\"card-body p-0\">
                ";
        // line 505
        yield "                <div class=\"d-none d-lg-block\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover data-table mb-0\">
                            <thead>
                                <tr>
                                    <th class=\"ps-4\">Thème</th>
                                    <th>Module</th>
                                    <th>Auto-validation</th>
                                    <th>Validation tuteur</th>
                                    <th>Commentaire agent</th>
                                    <th>Commentaire tuteur</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 519
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 519, $this->source); })()), "themes", [], "any", false, false, false, 519));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 520
            yield "                                    ";
            $context["first_theme_row"] = true;
            // line 521
            yield "                                    ";
            $context["theme_rowspan"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 521));
            // line 522
            yield "
                                    ";
            // line 523
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 523));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 524
                yield "                                        ";
                $context["action"] = null;
                // line 525
                yield "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 525, $this->source); })()), "actions", [], "any", false, false, false, 525));
                foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                    // line 526
                    yield "                                            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["a"], "module", [], "any", false, false, false, 526), "id", [], "any", false, false, false, 526) == CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 526))) {
                        // line 527
                        yield "                                                ";
                        $context["action"] = $context["a"];
                        // line 528
                        yield "                                            ";
                    }
                    // line 529
                    yield "                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['a'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 530
                yield "
                                        <tr>
                                            ";
                // line 532
                if ((($tmp = (isset($context["first_theme_row"]) || array_key_exists("first_theme_row", $context) ? $context["first_theme_row"] : (function () { throw new RuntimeError('Variable "first_theme_row" does not exist.', 532, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 533
                    yield "                                                <td rowspan=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["theme_rowspan"]) || array_key_exists("theme_rowspan", $context) ? $context["theme_rowspan"] : (function () { throw new RuntimeError('Variable "theme_rowspan" does not exist.', 533, $this->source); })()), "html", null, true);
                    yield "\" class=\"align-middle ps-4\">
                                                    <strong class=\"text-dark\">";
                    // line 534
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 534), "html", null, true);
                    yield "</strong>
                                                </td>
                                                ";
                    // line 536
                    $context["first_theme_row"] = false;
                    // line 537
                    yield "                                            ";
                }
                // line 538
                yield "
                                            <td>
                                                <span class=\"fw-medium\">";
                // line 540
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 540), "html", null, true);
                yield "</span>
                                            </td>

                                            <td>
                                                ";
                // line 544
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 544, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 544, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 544))) {
                    // line 545
                    yield "                                                    <span class=\"badge bg-success rounded-pill px-2 py-2 fw-light ls-1\">
                                                        <i class=\"bi bi-check-circle me-1\"></i>
                                                        ";
                    // line 547
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 547, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 547), "d/m/Y"), "html", null, true);
                    yield "
                                                    </span>
                                                ";
                } else {
                    // line 550
                    yield "                                                    <span class=\"badge bg-secondary rounded-pill px-3 py-2 fw-light ls-1\">Non validé</span>
                                                ";
                }
                // line 552
                yield "                                            </td>

                                            <td>
                                                ";
                // line 555
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 555, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 555, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 555))) {
                    // line 556
                    yield "                                                    <span class=\"badge bg-success rounded-pill px-3 py-2 fw-light ls-1\">
                                                        <i class=\"bi bi-check-circle me-1\"></i>
                                                        ";
                    // line 558
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 558, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 558), "d/m/Y"), "html", null, true);
                    yield "
                                                    </span>
                                                ";
                } else {
                    // line 561
                    yield "                                                    <span class=\"badge bg-secondary rounded-pill px-3 py-2 fw-light ls-1\">Non validé</span>
                                                ";
                }
                // line 563
                yield "                                            </td>

                                            <td>
                                                ";
                // line 566
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 566, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 566, $this->source); })()), "agentComment", [], "any", false, false, false, 566))) {
                    // line 567
                    yield "                                                    <!-- Modal -->
                                                    <div popover id=\"modal-agent-";
                    // line 568
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 568), "html", null, true);
                    yield "\">
                                                        <div class=\"modal-header\">
                                                            <h3 class=\"modal-title\">Commentaire de l'agent:</h3>
                                                            <button class=\"btn-close\" popovertarget=\"modal-agent-";
                    // line 571
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 571), "html", null, true);
                    yield "\" title=\"Fermer\">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class=\"modal-content\">
                                                            <p>";
                    // line 576
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 576, $this->source); })()), "agentComment", [], "any", false, false, false, 576), "html", null, true);
                    yield "</p>
                                                        </div>
                                                    </div>

                                                    <!-- Bouton d'ouverture -->
                                                    <button class=\"btn-open-modal\" popovertarget=\"modal-agent-";
                    // line 581
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 581), "html", null, true);
                    yield "\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Voir commentaire
                                                    </button>
                                                ";
                } else {
                    // line 586
                    yield "                                                    <!-- Version désactivée -->
                                                    <span class=\"btn-open-modal btn-disabled\">
                                                       <i class=\"bi bi-chat-dots\"></i>
                                                       Voir commentaire
                                                   </span>
                                                ";
                }
                // line 592
                yield "                                            </td>

                                            <td>
                                                ";
                // line 595
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 595, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 595, $this->source); })()), "mentorComment", [], "any", false, false, false, 595))) {
                    // line 596
                    yield "                                                    <!-- Modal -->
                                                    <div popover id=\"modal-mentor-";
                    // line 597
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 597), "html", null, true);
                    yield "\">
                                                        <div class=\"modal-header\">
                                                            <h3 class=\"modal-title\">Commentaire du tuteur :</h3>
                                                            <button class=\"btn-close\" popovertarget=\"modal-mentor-";
                    // line 600
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 600), "html", null, true);
                    yield "\" title=\"Fermer\">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class=\"modal-content\">
                                                            <p>";
                    // line 605
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 605, $this->source); })()), "mentorComment", [], "any", false, false, false, 605), "html", null, true);
                    yield "</p>
                                                        </div>
                                                    </div>

                                                    <!-- Bouton d'ouverture -->
                                                    <button class=\"btn-open-modal\" popovertarget=\"modal-mentor-";
                    // line 610
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 610), "html", null, true);
                    yield "\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Voir commentaire
                                                    </button>
                                                ";
                } else {
                    // line 615
                    yield "                                                    <!-- Version désactivée -->
                                                    <span class=\"btn-open-modal btn-disabled\">
                                                       <i class=\"bi bi-chat-dots\"></i>
                                                       Aucun commentaire
                                                   </span>
                                                ";
                }
                // line 621
                yield "                                            </td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 624
            yield "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 625
        yield "                            </tbody>
                        </table>
                    </div>
                </div>

                ";
        // line 631
        yield "                <div class=\"d-block d-lg-none p-3\">
                    <div class=\"theme-cards\">
                        ";
        // line 633
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["logbook"]) || array_key_exists("logbook", $context) ? $context["logbook"] : (function () { throw new RuntimeError('Variable "logbook" does not exist.', 633, $this->source); })()), "themes", [], "any", false, false, false, 633));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 634
            yield "                            <div class=\"theme-card mb-4\">
                                <div class=\"theme-header p-3 rounded-top\" style=\"background: linear-gradient(to right, var(--primary-light), rgba(248, 249, 250, 0.7)); border-left: 4px solid var(--primary-color);\">
                                    <h6 class=\"mb-0 fw-bold\">
                                        <i class=\"bi bi-bookmark-fill me-2 text-primary\"></i>";
            // line 637
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 637), "html", null, true);
            yield "
                                    </h6>
                                </div>

                                <div class=\"theme-modules\">
                                    ";
            // line 642
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 642));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 643
                yield "                                        ";
                $context["action"] = null;
                // line 644
                yield "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 644, $this->source); })()), "actions", [], "any", false, false, false, 644));
                foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                    // line 645
                    yield "                                            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["a"], "module", [], "any", false, false, false, 645), "id", [], "any", false, false, false, 645) == CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 645))) {
                        // line 646
                        yield "                                                ";
                        $context["action"] = $context["a"];
                        // line 647
                        yield "                                            ";
                    }
                    // line 648
                    yield "                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['a'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 649
                yield "
                                        <div class=\"module-card p-3 border-bottom\" style=\"background-color: #fff;\">
                                            <h6 class=\"module-title fs-6 mb-2\">
                                                <i class=\"bi bi-list-check me-2 text-primary\"></i>";
                // line 652
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 652), "html", null, true);
                yield "
                                            </h6>

                                            <div class=\"row g-2 fs-sm\">
                                                <div class=\"col-6\">
                                                    <div class=\"validation-item\">
                                                        <span class=\"text-muted fw-medium\">Auto-validation:</span><br>
                                                        ";
                // line 659
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 659, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 659, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 659))) {
                    // line 660
                    yield "                                                            <span class=\"badge bg-success rounded-pill px-2 py-1 fw-light ls-1\">
                                                                <i class=\"bi bi-check-circle me-1\"></i>
                                                                ";
                    // line 662
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 662, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 662), "d/m/Y"), "html", null, true);
                    yield "
                                                            </span>
                                                        ";
                } else {
                    // line 665
                    yield "                                                            <span class=\"badge bg-secondary rounded-pill px-2 py-1 fw-light ls-1\">Non validé</span>
                                                        ";
                }
                // line 667
                yield "                                                    </div>
                                                </div>
                                                <div class=\"col-6\">
                                                    <div class=\"validation-item\">
                                                        <span class=\"text-muted fw-medium\">Validation tuteur:</span><br>
                                                        ";
                // line 672
                if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 672, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 672, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 672))) {
                    // line 673
                    yield "                                                            <span class=\"badge bg-success rounded-pill px-2 py-1 fw-light ls-1\">
                                                                <i class=\"bi bi-check-circle me-1\"></i>
                                                                ";
                    // line 675
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 675, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 675), "d/m/Y"), "html", null, true);
                    yield "
                                                            </span>
                                                        ";
                } else {
                    // line 678
                    yield "                                                            <span class=\"badge bg-secondary rounded-pill px-2 py-1 fw-light ls-1\">Non validé</span>
                                                        ";
                }
                // line 680
                yield "                                                    </div>
                                                </div>

                                                <div class=\"col-12 mt-2\">
                                                    <div class=\"comments-section\">
                                                        <div class=\"accordion accordion-flush\" id=\"comments-";
                // line 685
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 685), "html", null, true);
                yield "\">
                                                            ";
                // line 686
                if ((((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 686, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 686, $this->source); })()), "agentComment", [], "any", false, false, false, 686)) || ((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 686, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 686, $this->source); })()), "mentorComment", [], "any", false, false, false, 686)))) {
                    // line 687
                    yield "                                                                <div class=\"accordion-item border-0\">
                                                                    <h2 class=\"accordion-header\" id=\"heading-";
                    // line 688
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 688), "html", null, true);
                    yield "\">
                                                                        <button class=\"accordion-button collapsed p-2 fs-sm\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-";
                    // line 689
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 689), "html", null, true);
                    yield "\" aria-expanded=\"false\" aria-controls=\"collapse-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 689), "html", null, true);
                    yield "\" style=\"background-color: rgba(248, 249, 250, 0.7);\">
                                                                            <i class=\"bi bi-chat-dots me-2\"></i>Voir les commentaires
                                                                        </button>
                                                                    </h2>
                                                                    <div id=\"collapse-";
                    // line 693
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 693), "html", null, true);
                    yield "\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 693), "html", null, true);
                    yield "\" data-bs-parent=\"#comments-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 693), "html", null, true);
                    yield "\">
                                                                        <div class=\"accordion-body p-2 fs-sm\">
                                                                            ";
                    // line 695
                    if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 695, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 695, $this->source); })()), "agentComment", [], "any", false, false, false, 695))) {
                        // line 696
                        yield "                                                                                <div class=\"comment-item mb-2\">
                                                                                    <div class=\"comment-header fw-medium text-primary\">
                                                                                        <i class=\"bi bi-person me-1\"></i>Commentaire agent:
                                                                                    </div>
                                                                                    <div class=\"comment-content ps-3 pt-1\">
                                                                                        ";
                        // line 701
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 701, $this->source); })()), "agentComment", [], "any", false, false, false, 701), "html", null, true);
                        yield "
                                                                                    </div>
                                                                                </div>
                                                                            ";
                    }
                    // line 705
                    yield "
                                                                            ";
                    // line 706
                    if (((isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 706, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 706, $this->source); })()), "mentorComment", [], "any", false, false, false, 706))) {
                        // line 707
                        yield "                                                                                <div class=\"comment-item\">
                                                                                    <div class=\"comment-header fw-medium text-primary\">
                                                                                        <i class=\"bi bi-person-check me-1\"></i>Commentaire tuteur:
                                                                                    </div>
                                                                                    <div class=\"comment-content ps-3 pt-1\">
                                                                                        ";
                        // line 712
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 712, $this->source); })()), "mentorComment", [], "any", false, false, false, 712), "html", null, true);
                        yield "
                                                                                    </div>
                                                                                </div>
                                                                            ";
                    }
                    // line 716
                    yield "                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ";
                } else {
                    // line 720
                    yield "                                                                <div class=\"text-muted fst-italic fs-sm\"><i class=\"bi bi-chat-dots me-1\"></i>Aucun commentaire</div>
                                                            ";
                }
                // line 722
                yield "                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 728
            yield "                                </div>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 731
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
        return "admin/progress/user_details.html.twig";
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
        return array (  1178 => 731,  1170 => 728,  1159 => 722,  1155 => 720,  1149 => 716,  1142 => 712,  1135 => 707,  1133 => 706,  1130 => 705,  1123 => 701,  1116 => 696,  1114 => 695,  1105 => 693,  1096 => 689,  1092 => 688,  1089 => 687,  1087 => 686,  1083 => 685,  1076 => 680,  1072 => 678,  1066 => 675,  1062 => 673,  1060 => 672,  1053 => 667,  1049 => 665,  1043 => 662,  1039 => 660,  1037 => 659,  1027 => 652,  1022 => 649,  1016 => 648,  1013 => 647,  1010 => 646,  1007 => 645,  1002 => 644,  999 => 643,  995 => 642,  987 => 637,  982 => 634,  978 => 633,  974 => 631,  967 => 625,  961 => 624,  953 => 621,  945 => 615,  937 => 610,  929 => 605,  921 => 600,  915 => 597,  912 => 596,  910 => 595,  905 => 592,  897 => 586,  889 => 581,  881 => 576,  873 => 571,  867 => 568,  864 => 567,  862 => 566,  857 => 563,  853 => 561,  847 => 558,  843 => 556,  841 => 555,  836 => 552,  832 => 550,  826 => 547,  822 => 545,  820 => 544,  813 => 540,  809 => 538,  806 => 537,  804 => 536,  799 => 534,  794 => 533,  792 => 532,  788 => 530,  782 => 529,  779 => 528,  776 => 527,  773 => 526,  768 => 525,  765 => 524,  761 => 523,  758 => 522,  755 => 521,  752 => 520,  748 => 519,  732 => 505,  724 => 499,  718 => 496,  711 => 492,  706 => 489,  692 => 477,  676 => 464,  660 => 451,  638 => 432,  627 => 424,  616 => 416,  605 => 408,  580 => 385,  576 => 383,  570 => 381,  568 => 380,  559 => 373,  555 => 371,  549 => 369,  547 => 368,  538 => 361,  534 => 359,  528 => 357,  526 => 356,  517 => 349,  513 => 347,  507 => 345,  505 => 344,  495 => 337,  486 => 331,  477 => 325,  465 => 315,  461 => 313,  455 => 311,  453 => 310,  446 => 305,  442 => 303,  436 => 301,  434 => 300,  427 => 295,  423 => 293,  417 => 291,  415 => 290,  408 => 285,  404 => 283,  398 => 281,  396 => 280,  388 => 275,  381 => 271,  374 => 267,  355 => 250,  344 => 241,  335 => 235,  326 => 229,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails de progression - {{ user.fullName }}{% endblock %}

{% block body %}
    <style>
        /* Style pour tous les modals */
        [popover] {
            /* Taille et positionnement */
            max-width: min(500px, 90vw);
            width: 100%;
            padding: 0;
            border: none;
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04),
            0 0 0 1px rgba(0, 0, 0, 0.05);

            /* Couleurs et fond */
            background: #ffffff;
            color: #1f2937;

            /* Empêche l'ancrage automatique */
            anchor: none;

            /* Position centrée */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.98);

            /* Animation d'apparition */
            opacity: 0;
            transition: opacity 0.2s ease-out, transform 0.2s ease-out;

            /* Supprime les styles par défaut */
            outline: none;
            margin: 0;

        }

        /* Animation d'ouverture */
        [popover]:popover-open {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        /* Fond sombre (backdrop) */
        [popover]::backdrop {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.2s ease-out;
        }

        [popover]:popover-open::backdrop {
            opacity: 1;
        }

        /* Header du modal */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px 0 24px;
            margin-bottom: 16px;
        }

        .modal-title {
            position: relative;
            font-size: 1.25rem;       /* ≈ 20px */
            font-weight: 600;
            color: #1f2937;           /* texte gris foncé */
            margin: .5rem 0;
            padding-left: 12px;       /* espace pour la barre */
            line-height: 1.4;
            letter-spacing: -0.01em;
        }

        .modal-title::before {
            content: \"\";
            position: absolute;
            left: 0;
            top: 0.2em;
            bottom: 0.2em;
            width: 3px;
            border-radius: 2px;
        background: linear-gradient(45deg, #3d5f9e, #526fa8)
            /* gris bleuté → vert pétrole */
        }



        /* Bouton de fermeture élégant */
        .btn-close {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;                  /* cercle pour plus de modernité */
            background: transparent;
            color: #475569;                      /* gris neutre */
            font-size: 20px;                     /* croix un peu plus visible */
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0;
            margin: 0;
            line-height: 1;
        }

        /* Hover = contraste neutre, pro */
        .btn-close:hover {
            background: #f1f5f9;                 /* gris clair élégant */
            color: #dc2626;                      /* rouge subtil pour alerter */
            transform: scale(1.08);
        }

        /* Active = retour doux */
        .btn-close:active {
            transform: scale(0.95);
            background: #e5e7eb;
            color: #b91c1c;
        }

        /* Accessibilité : focus visible */
        .btn-close:focus {
            outline: 2px solid #94a3b8;          /* halo gris bleuté sobre */
            outline-offset: 2px;
        }

        /* Contenu du modal */
        .modal-content {
            padding: 0 24px 24px 24px;
            line-height: 1.6;
            color: #4b5563;
        }

        .modal-content p {
            margin: 0 0 12px 0;
            font-size: 0.95rem;
        }

        .modal-content p:last-child {
            margin-bottom: 0;
        }

        /* Bouton d'ouverture élégant */
        .btn-open-modal {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .btn-open-modal:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #334155;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-open-modal:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Icône dans le bouton */
        .btn-open-modal i {
            font-size: 0.875rem;
            opacity: 0.7;
        }

        /* Version désactivée */
        .btn-disabled {
            color: #9ca3af;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn-disabled:hover {
            background: #f8fafc;
            border-color: #e2e8f0;
            transform: none;
            box-shadow: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            [popover] {
                max-width: 95vw;
                margin: 20px auto;
            }

            .modal-header,
            .modal-content {
                padding-left: 16px;
                padding-right: 16px;
            }

            .modal-header {
                padding-top: 16px;
            }

            .modal-content {
                padding-bottom: 16px;
            }
        }
    </style>
    <div class=\"container-fluid py-4\">
        <div class=\"dashboard-header\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <h1 class=\"d-flex align-items-center\">
                        <span class=\"d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3\" style=\"width: 48px; height: 48px\">
                            <i class=\"bi bi-person-bounding-box fs-4\"></i>
                        </span>
                        Progression de {{ user.fullName }}
                    </h1>
                    <p class=\"text-muted mt-2 mb-3 fs-sm\">Détails de progression et validation des modules</p>

                    <!-- Bouton de retour vers le tableau de bord - s'affiche sous le paragraphe sur mobile/tablette et à droite sur desktop -->
                    <div class=\"d-flex d-lg-none mb-2\">
                        <a href=\"{{ path('admin_progress_dashboard') }}\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center w-100 justify-content-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                            <i class=\"bi bi-arrow-left me-2\"></i>Tableau de bord
                        </a>
                    </div>
                </div>
                <div class=\"col-12 d-none d-lg-flex justify-content-end\">
                    <a href=\"{{ path('admin_progress_dashboard') }}\" class=\"btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center\" style=\"box-shadow: 0 2px 4px rgba(0,0,0,0.04); transition: all 0.2s ease;\">
                        <i class=\"bi bi-arrow-left me-2\"></i>Tableau de bord
                    </a>
                </div>
            </div>
        </div>


        {# Informations sur l'utilisateur #}
        <div class=\"row g-4 mb-4\">
            <div class=\"col-md-6\">
                <div class=\"content-card h-100\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0 d-flex align-items-center\">
                            <i class=\"bi bi-person-fill me-2 text-warning\"></i>Informations de l'apprenant
                        </h5>
                        <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                            <i class=\"bi bi-info-circle me-1\"></i>Profil
                        </span>
                    </div>
                    <div class=\"card-body p-4 p-sm-3\">
                        <!-- Version mobile optimisée avec disposition en liste verticale -->
                        <div class=\"d-block d-md-none\">
                            <ul class=\"list-group list-group-flush user-info-mobile\">
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-person me-2\"></i>Nom complet</div>
                                    <div class=\"user-info-mobile-value fw-medium\">{{ user.fullName }}</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-envelope me-2\"></i>Email</div>
                                    <div class=\"user-info-mobile-value\">{{ user.email }}</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-credit-card me-2\"></i>NNI</div>
                                    <div class=\"user-info-mobile-value\">{{ user.nni }}</div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-calendar-event me-2\"></i>Date d'embauche</div>
                                    <div class=\"user-info-mobile-value\">
                                        {% if user.hiringAt %}
                                            {{ user.hiringAt|date('d/m/Y') }}
                                        {% else %}
                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-person-check me-2\"></i>Tuteur</div>
                                    <div class=\"user-info-mobile-value\">
                                        {% if user.mentor %}
                                            {{ user.mentor.fullName }}
                                        {% else %}
                                            <span class=\"badge bg-warning text-dark rounded-pill fw-light ls-1\">Non assigné</span>
                                        {% endif %}
                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2 border-bottom\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-briefcase me-2\"></i>Poste</div>
                                    <div class=\"user-info-mobile-value\">
                                        {% if user.job %}
                                            {{ user.job.name }}
                                        {% else %}
                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </li>
                                <li class=\"list-group-item px-0 py-2\">
                                    <div class=\"user-info-mobile-label\"><i class=\"bi bi-award me-2\"></i>Spécialité</div>
                                    <div class=\"user-info-mobile-value\">
                                        {% if user.speciality %}
                                            {{ user.speciality.name }}
                                        {% else %}
                                            <span class=\"text-muted fst-italic\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Version desktop avec disposition en grille -->
                        <div class=\"d-none d-md-block\">
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-person\"></i>Nom complet:</div>
                                    <div class=\"col-md-8 user-info-value\">{{ user.fullName }}</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-envelope\"></i>Email:</div>
                                    <div class=\"col-md-8 user-info-value\">{{ user.email }}</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-credit-card\"></i>NNI:</div>
                                    <div class=\"col-md-8 user-info-value\">{{ user.nni }}</div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-calendar-event\"></i>Date d'embauche:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        {% if user.hiringAt %}
                                            {{ user.hiringAt|date('d/m/Y') }}
                                        {% else %}
                                            <span class=\"text-muted\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-person-check\"></i>Tuteur:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        {% if user.mentor %}
                                            {{ user.mentor.fullName }}
                                        {% else %}
                                            <span class=\"badge bg-warning text-dark rounded-pill fw-light ls-1\">Non assigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-briefcase\"></i>Poste:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        {% if user.job %}
                                            {{ user.job.name }}
                                        {% else %}
                                            <span class=\"text-muted\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                            <div class=\"user-info-row\">
                                <div class=\"row\">
                                    <div class=\"col-md-4 user-info-label\"><i class=\"bi bi-award\"></i>Spécialité:</div>
                                    <div class=\"col-md-8 user-info-value\">
                                        {% if user.speciality %}
                                            {{ user.speciality.name }}
                                        {% else %}
                                            <span class=\"text-muted\">Non renseigné</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"content-card h-100\">
                    <div class=\"card-header\">
                        <h5 class=\"mb-0 d-flex align-items-center\">
                            <i class=\"bi bi-graph-up-arrow me-2 text-warning\"></i>Résumé de progression
                        </h5>
                        <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1\">
                            <i class=\"bi bi-lightning-charge-fill me-1\"></i>Temps réel
                        </span>
                    </div>
                    <div class=\"card-body p-4\">
                        <div class=\"text-center mb-3\">
                            <div class=\"row g-3\">
                                <div class=\"col-6\">
                                    <div class=\"progress-circle-container\">
                                        <h6 class=\"text-muted mb-2 fs-sm\">Auto-validation</h6>
                                        <div class=\"progress-circle mx-auto\" data-value=\"{{ progress.agent_progress }}\">
                                            <span class=\"progress-circle-left\">
                                                <span class=\"progress-circle-bar border-primary\"></span>
                                            </span>
                                            <span class=\"progress-circle-right\">
                                                <span class=\"progress-circle-bar border-primary\"></span>
                                            </span>
                                            <div class=\"progress-circle-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center\">
                                                <div class=\"h2 font-weight-bold\">{{ progress.agent_progress }}<sup class=\"small\">%</sup></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-6\">
                                    <div class=\"progress-circle-container\">
                                        <h6 class=\"text-muted mb-2 fs-sm\">Validation tuteur</h6>
                                        <div class=\"progress-circle mx-auto\" data-value=\"{{ progress.mentor_progress }}\">
                                            <span class=\"progress-circle-left\">
                                                <span class=\"progress-circle-bar border-success\"></span>
                                            </span>
                                            <span class=\"progress-circle-right\">
                                                <span class=\"progress-circle-bar border-success\"></span>
                                            </span>
                                            <div class=\"progress-circle-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center\">
                                                <div class=\"h2 font-weight-bold\">{{ progress.mentor_progress }}<sup class=\"small\">%</sup></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cartes statistiques avec disposition adaptative -->
                        <div class=\"row g-2 g-md-3 text-center mt-2\">
                            <!-- Sur mobile: 3 colonnes plus compactes, sur tablette/desktop: disposition normale -->
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-primary bg-opacity-10 p-2\">
                                                <i class=\"bi bi-list-ol text-primary\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">{{ progress.total_modules }}</div>
                                        <div class=\"stat-label\">Modules</div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-success bg-opacity-10 p-2\">
                                                <i class=\"bi bi-person-check text-success\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">{{ progress.completed_by_agent }}</div>
                                        <div class=\"stat-label\">Auto-validés</div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-4 col-md-4\">
                                <div class=\"stat-card\">
                                    <div class=\"card-body\">
                                        <div class=\"d-flex align-items-center justify-content-center mb-2\">
                                            <div class=\"rounded-circle bg-warning bg-opacity-10 p-2\">
                                                <i class=\"bi bi-award text-warning-emphasis\" style=\"font-size: x-large\"></i>
                                            </div>
                                        </div>
                                        <div class=\"stat-value\">{{ progress.validated_by_mentor }}</div>
                                        <div class=\"stat-label\">Validés</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {# Détail du carnet #}
        <div class=\"content-card mb-4\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0 d-flex align-items-center\">
                    <i class=\"bi bi-book-fill me-2 text-warning\"></i>Détail du carnet: {{ logbook.name }}
                </h5>
                <div>
                    <span class=\"badge bg-primary bg-opacity-10 text-white rounded-pill fw-normal ls-1 me-2\">
                        <i class=\"bi bi-bookmark-fill me-1\"></i>{{ logbook.themes|length }} thèmes
                    </span>
                    <span class=\"badge bg-light text-primary rounded-pill fw-medium ls-1\">
                        <i class=\"bi bi-list-check me-1\"></i>{{ progress.total_modules }} modules
                    </span>
                </div>
            </div>
            <div class=\"card-body p-0\">
                {# Vue desktop - tableau traditionnel #}
                <div class=\"d-none d-lg-block\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover data-table mb-0\">
                            <thead>
                                <tr>
                                    <th class=\"ps-4\">Thème</th>
                                    <th>Module</th>
                                    <th>Auto-validation</th>
                                    <th>Validation tuteur</th>
                                    <th>Commentaire agent</th>
                                    <th>Commentaire tuteur</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for theme in logbook.themes %}
                                    {% set first_theme_row = true %}
                                    {% set theme_rowspan = theme.modules|length %}

                                    {% for module in theme.modules %}
                                        {% set action = null %}
                                        {% for a in user.actions %}
                                            {% if a.module.id == module.id %}
                                                {% set action = a %}
                                            {% endif %}
                                        {% endfor %}

                                        <tr>
                                            {% if first_theme_row %}
                                                <td rowspan=\"{{ theme_rowspan }}\" class=\"align-middle ps-4\">
                                                    <strong class=\"text-dark\">{{ theme.title }}</strong>
                                                </td>
                                                {% set first_theme_row = false %}
                                            {% endif %}

                                            <td>
                                                <span class=\"fw-medium\">{{ module.title }}</span>
                                            </td>

                                            <td>
                                                {% if action and action.agentValidatedAt %}
                                                    <span class=\"badge bg-success rounded-pill px-2 py-2 fw-light ls-1\">
                                                        <i class=\"bi bi-check-circle me-1\"></i>
                                                        {{ action.agentValidatedAt|date('d/m/Y') }}
                                                    </span>
                                                {% else %}
                                                    <span class=\"badge bg-secondary rounded-pill px-3 py-2 fw-light ls-1\">Non validé</span>
                                                {% endif %}
                                            </td>

                                            <td>
                                                {% if action and action.mentorValidatedAt %}
                                                    <span class=\"badge bg-success rounded-pill px-3 py-2 fw-light ls-1\">
                                                        <i class=\"bi bi-check-circle me-1\"></i>
                                                        {{ action.mentorValidatedAt|date('d/m/Y') }}
                                                    </span>
                                                {% else %}
                                                    <span class=\"badge bg-secondary rounded-pill px-3 py-2 fw-light ls-1\">Non validé</span>
                                                {% endif %}
                                            </td>

                                            <td>
                                                {% if action and action.agentComment %}
                                                    <!-- Modal -->
                                                    <div popover id=\"modal-agent-{{ module.id }}\">
                                                        <div class=\"modal-header\">
                                                            <h3 class=\"modal-title\">Commentaire de l'agent:</h3>
                                                            <button class=\"btn-close\" popovertarget=\"modal-agent-{{ module.id }}\" title=\"Fermer\">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class=\"modal-content\">
                                                            <p>{{ action.agentComment }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- Bouton d'ouverture -->
                                                    <button class=\"btn-open-modal\" popovertarget=\"modal-agent-{{ module.id }}\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Voir commentaire
                                                    </button>
                                                {% else %}
                                                    <!-- Version désactivée -->
                                                    <span class=\"btn-open-modal btn-disabled\">
                                                       <i class=\"bi bi-chat-dots\"></i>
                                                       Voir commentaire
                                                   </span>
                                                {% endif %}
                                            </td>

                                            <td>
                                                {% if action and action.mentorComment %}
                                                    <!-- Modal -->
                                                    <div popover id=\"modal-mentor-{{ module.id }}\">
                                                        <div class=\"modal-header\">
                                                            <h3 class=\"modal-title\">Commentaire du tuteur :</h3>
                                                            <button class=\"btn-close\" popovertarget=\"modal-mentor-{{ module.id }}\" title=\"Fermer\">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class=\"modal-content\">
                                                            <p>{{ action.mentorComment }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- Bouton d'ouverture -->
                                                    <button class=\"btn-open-modal\" popovertarget=\"modal-mentor-{{ module.id }}\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Voir commentaire
                                                    </button>
                                                {% else %}
                                                    <!-- Version désactivée -->
                                                    <span class=\"btn-open-modal btn-disabled\">
                                                       <i class=\"bi bi-chat-dots\"></i>
                                                       Aucun commentaire
                                                   </span>
                                                {% endif %}
                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>

                {# Vue mobile/tablette - cartes par thème #}
                <div class=\"d-block d-lg-none p-3\">
                    <div class=\"theme-cards\">
                        {% for theme in logbook.themes %}
                            <div class=\"theme-card mb-4\">
                                <div class=\"theme-header p-3 rounded-top\" style=\"background: linear-gradient(to right, var(--primary-light), rgba(248, 249, 250, 0.7)); border-left: 4px solid var(--primary-color);\">
                                    <h6 class=\"mb-0 fw-bold\">
                                        <i class=\"bi bi-bookmark-fill me-2 text-primary\"></i>{{ theme.title }}
                                    </h6>
                                </div>

                                <div class=\"theme-modules\">
                                    {% for module in theme.modules %}
                                        {% set action = null %}
                                        {% for a in user.actions %}
                                            {% if a.module.id == module.id %}
                                                {% set action = a %}
                                            {% endif %}
                                        {% endfor %}

                                        <div class=\"module-card p-3 border-bottom\" style=\"background-color: #fff;\">
                                            <h6 class=\"module-title fs-6 mb-2\">
                                                <i class=\"bi bi-list-check me-2 text-primary\"></i>{{ module.title }}
                                            </h6>

                                            <div class=\"row g-2 fs-sm\">
                                                <div class=\"col-6\">
                                                    <div class=\"validation-item\">
                                                        <span class=\"text-muted fw-medium\">Auto-validation:</span><br>
                                                        {% if action and action.agentValidatedAt %}
                                                            <span class=\"badge bg-success rounded-pill px-2 py-1 fw-light ls-1\">
                                                                <i class=\"bi bi-check-circle me-1\"></i>
                                                                {{ action.agentValidatedAt|date('d/m/Y') }}
                                                            </span>
                                                        {% else %}
                                                            <span class=\"badge bg-secondary rounded-pill px-2 py-1 fw-light ls-1\">Non validé</span>
                                                        {% endif %}
                                                    </div>
                                                </div>
                                                <div class=\"col-6\">
                                                    <div class=\"validation-item\">
                                                        <span class=\"text-muted fw-medium\">Validation tuteur:</span><br>
                                                        {% if action and action.mentorValidatedAt %}
                                                            <span class=\"badge bg-success rounded-pill px-2 py-1 fw-light ls-1\">
                                                                <i class=\"bi bi-check-circle me-1\"></i>
                                                                {{ action.mentorValidatedAt|date('d/m/Y') }}
                                                            </span>
                                                        {% else %}
                                                            <span class=\"badge bg-secondary rounded-pill px-2 py-1 fw-light ls-1\">Non validé</span>
                                                        {% endif %}
                                                    </div>
                                                </div>

                                                <div class=\"col-12 mt-2\">
                                                    <div class=\"comments-section\">
                                                        <div class=\"accordion accordion-flush\" id=\"comments-{{ module.id }}\">
                                                            {% if (action and action.agentComment) or (action and action.mentorComment) %}
                                                                <div class=\"accordion-item border-0\">
                                                                    <h2 class=\"accordion-header\" id=\"heading-{{ module.id }}\">
                                                                        <button class=\"accordion-button collapsed p-2 fs-sm\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-{{ module.id }}\" aria-expanded=\"false\" aria-controls=\"collapse-{{ module.id }}\" style=\"background-color: rgba(248, 249, 250, 0.7);\">
                                                                            <i class=\"bi bi-chat-dots me-2\"></i>Voir les commentaires
                                                                        </button>
                                                                    </h2>
                                                                    <div id=\"collapse-{{ module.id }}\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading-{{ module.id }}\" data-bs-parent=\"#comments-{{ module.id }}\">
                                                                        <div class=\"accordion-body p-2 fs-sm\">
                                                                            {% if action and action.agentComment %}
                                                                                <div class=\"comment-item mb-2\">
                                                                                    <div class=\"comment-header fw-medium text-primary\">
                                                                                        <i class=\"bi bi-person me-1\"></i>Commentaire agent:
                                                                                    </div>
                                                                                    <div class=\"comment-content ps-3 pt-1\">
                                                                                        {{ action.agentComment }}
                                                                                    </div>
                                                                                </div>
                                                                            {% endif %}

                                                                            {% if action and action.mentorComment %}
                                                                                <div class=\"comment-item\">
                                                                                    <div class=\"comment-header fw-medium text-primary\">
                                                                                        <i class=\"bi bi-person-check me-1\"></i>Commentaire tuteur:
                                                                                    </div>
                                                                                    <div class=\"comment-content ps-3 pt-1\">
                                                                                        {{ action.mentorComment }}
                                                                                    </div>
                                                                                </div>
                                                                            {% endif %}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            {% else %}
                                                                <div class=\"text-muted fst-italic fs-sm\"><i class=\"bi bi-chat-dots me-1\"></i>Aucun commentaire</div>
                                                            {% endif %}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {% endfor %}
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "admin/progress/user_details.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/progress/user_details.html.twig");
    }
}
