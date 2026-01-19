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

/* admin/service/analyse_processus.html.twig */
class __TwigTemplate_3e085e477c2d09fe414efd422501b1e4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/service/analyse_processus.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/service/analyse_processus.html.twig"));

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

        yield "Analyse de conformité";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 273
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

        // line 274
        yield "    <main class=\"container-fluid my-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5\">
            <div>
                <h1 class=\"text-dark fw-semibold\" id=\"main-heading\">
                    <i class=\"bi bi-clipboard-check me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Analyse de conformité
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">
                    Analyse de conformité des carnets de compagnonnage.
                </p>
            </div>
            <div>
                <a
                    href=\"";
        // line 287
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        yield "\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à l'administration\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à l'administration
                </a>
            </div>
        </div>

        <div class=\"row g-4\">
            ";
        // line 298
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["check_conformity"]) || array_key_exists("check_conformity", $context) ? $context["check_conformity"] : (function () { throw new RuntimeError('Variable "check_conformity" does not exist.', 298, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 299
            yield "            ";
            // line 300
            yield "            ";
            $context["total_items"] = (Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["item"]) - 1);
            // line 301
            yield "            ";
            $context["completed_items"] = 0;
            // line 302
            yield "            ";
            $context["todo_items"] = 0;
            // line 303
            yield "
            ";
            // line 305
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_first_name", [], "any", false, false, false, 305) == true)) {
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 305, $this->source); })()) + 1);
            }
            // line 306
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_last_name", [], "any", false, false, false, 306) == true)) {
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 306, $this->source); })()) + 1);
            }
            // line 307
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_job", [], "any", false, false, false, 307) == true)) {
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 307, $this->source); })()) + 1);
            }
            // line 308
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_service", [], "any", false, false, false, 308) == true)) {
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 308, $this->source); })()) + 1);
            }
            // line 309
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mentor", [], "any", false, false, false, 309) == true)) {
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 309, $this->source); })()) + 1);
            }
            // line 310
            yield "
            ";
            // line 312
            yield "            ";
            $context["mission_status"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mission", [], "any", false, false, false, 312);
            // line 313
            yield "            ";
            if (((isset($context["mission_status"]) || array_key_exists("mission_status", $context) ? $context["mission_status"] : (function () { throw new RuntimeError('Variable "mission_status" does not exist.', 313, $this->source); })()) === true)) {
                // line 314
                yield "                ";
                $context["completed_items"] = ((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 314, $this->source); })()) + 1);
                // line 315
                yield "            ";
            } elseif (((isset($context["mission_status"]) || array_key_exists("mission_status", $context) ? $context["mission_status"] : (function () { throw new RuntimeError('Variable "mission_status" does not exist.', 315, $this->source); })()) === "TODO")) {
                // line 316
                yield "                ";
                $context["todo_items"] = ((isset($context["todo_items"]) || array_key_exists("todo_items", $context) ? $context["todo_items"] : (function () { throw new RuntimeError('Variable "todo_items" does not exist.', 316, $this->source); })()) + 1);
                // line 317
                yield "            ";
            }
            // line 318
            yield "
            ";
            // line 319
            $context["conformity_percent"] = (((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 319, $this->source); })()) / (isset($context["total_items"]) || array_key_exists("total_items", $context) ? $context["total_items"] : (function () { throw new RuntimeError('Variable "total_items" does not exist.', 319, $this->source); })())) * 100);
            // line 320
            yield "
            ";
            // line 322
            yield "            ";
            $context["progress_class"] = "";
            // line 323
            yield "            ";
            $context["status_text"] = "";
            // line 324
            yield "            ";
            $context["status_icon"] = "";
            // line 325
            yield "
            ";
            // line 326
            if (((isset($context["conformity_percent"]) || array_key_exists("conformity_percent", $context) ? $context["conformity_percent"] : (function () { throw new RuntimeError('Variable "conformity_percent" does not exist.', 326, $this->source); })()) == 100)) {
                // line 327
                yield "                ";
                $context["progress_class"] = "success-subtle text-success-emphasis rounded-pill fw-light ls-1";
                // line 328
                yield "                ";
                $context["status_text"] = "Conforme";
                // line 329
                yield "                ";
                $context["status_icon"] = "bi-check-circle-fill";
                // line 330
                yield "            ";
            } elseif (((isset($context["conformity_percent"]) || array_key_exists("conformity_percent", $context) ? $context["conformity_percent"] : (function () { throw new RuntimeError('Variable "conformity_percent" does not exist.', 330, $this->source); })()) >= 75)) {
                // line 331
                yield "                ";
                $context["progress_class"] = "primary-subtle text-primary-emphasis rounded-pill fw-light ls-1";
                // line 332
                yield "                ";
                $context["status_text"] = "Presque conforme";
                // line 333
                yield "                ";
                $context["status_icon"] = "bi-check-circle";
                // line 334
                yield "            ";
            } elseif (((isset($context["conformity_percent"]) || array_key_exists("conformity_percent", $context) ? $context["conformity_percent"] : (function () { throw new RuntimeError('Variable "conformity_percent" does not exist.', 334, $this->source); })()) >= 50)) {
                // line 335
                yield "                ";
                $context["progress_class"] = "warning-subtle text-warning-emphasis rounded-pill fw-light ls-1";
                // line 336
                yield "                ";
                $context["status_text"] = "Partiellement conforme";
                // line 337
                yield "                ";
                $context["status_icon"] = "bi-exclamation-circle";
                // line 338
                yield "            ";
            } else {
                // line 339
                yield "                ";
                $context["progress_class"] = "danger-subtle text-danger-emphasis rounded-pill fw-light ls-1";
                // line 340
                yield "                ";
                $context["status_text"] = "Non conforme";
                // line 341
                yield "                ";
                $context["status_icon"] = "bi-x-circle";
                // line 342
                yield "            ";
            }
            // line 343
            yield "            ";
            // line 344
            yield "            ";
            // line 345
            yield "            <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-12\">
                <div class=\"conformity-card\">
                    <div class=\"card-header d-flex justify-content-between align-items-center\">
                        <span class=\"fw-medium\">";
            // line 348
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "fullname", [], "any", false, false, false, 348), "html", null, true);
            yield "</span>
                        <span class=\"badge bg-";
            // line 349
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress_class"]) || array_key_exists("progress_class", $context) ? $context["progress_class"] : (function () { throw new RuntimeError('Variable "progress_class" does not exist.', 349, $this->source); })()), "html", null, true);
            yield " conformity-badge\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["status_text"]) || array_key_exists("status_text", $context) ? $context["status_text"] : (function () { throw new RuntimeError('Variable "status_text" does not exist.', 349, $this->source); })()), "html", null, true);
            yield "</span>
                    </div>
                    <div class=\"card-body\">
                        <div class=\"conformity-progress mb-3\">
                            <div class=\"conformity-progress-bar ";
            // line 353
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress_class"]) || array_key_exists("progress_class", $context) ? $context["progress_class"] : (function () { throw new RuntimeError('Variable "progress_class" does not exist.', 353, $this->source); })()), "html", null, true);
            yield "\" style=\"width: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["conformity_percent"]) || array_key_exists("conformity_percent", $context) ? $context["conformity_percent"] : (function () { throw new RuntimeError('Variable "conformity_percent" does not exist.', 353, $this->source); })()), "html", null, true);
            yield "%\"
                                 aria-valuenow=\"";
            // line 354
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["conformity_percent"]) || array_key_exists("conformity_percent", $context) ? $context["conformity_percent"] : (function () { throw new RuntimeError('Variable "conformity_percent" does not exist.', 354, $this->source); })()), "html", null, true);
            yield "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                        </div>
                        <div class=\"conformity-meta mb-3\">
                            <strong>";
            // line 357
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["completed_items"]) || array_key_exists("completed_items", $context) ? $context["completed_items"] : (function () { throw new RuntimeError('Variable "completed_items" does not exist.', 357, $this->source); })()), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total_items"]) || array_key_exists("total_items", $context) ? $context["total_items"] : (function () { throw new RuntimeError('Variable "total_items" does not exist.', 357, $this->source); })()), "html", null, true);
            yield "</strong> éléments conformes
                            ";
            // line 358
            if (((isset($context["todo_items"]) || array_key_exists("todo_items", $context) ? $context["todo_items"] : (function () { throw new RuntimeError('Variable "todo_items" does not exist.', 358, $this->source); })()) > 0)) {
                // line 359
                yield "                                <span class=\"ms-2 badge bg-warning-subtle text-warning-emphasis\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["todo_items"]) || array_key_exists("todo_items", $context) ? $context["todo_items"] : (function () { throw new RuntimeError('Variable "todo_items" does not exist.', 359, $this->source); })()), "html", null, true);
                yield " à compléter</span>
                            ";
            }
            // line 361
            yield "                        </div>

                        <h6 class=\"mb-3 fw-bold\">Détails de conformité</h6>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Prénom</span>
                            <span class=\"conformity-status-icon ";
            // line 367
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_first_name", [], "any", false, false, false, 367)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
            yield "\">
                                <i class=\"bi ";
            // line 368
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_first_name", [], "any", false, false, false, 368)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
            yield "\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Nom</span>
                            <span class=\"conformity-status-icon ";
            // line 374
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_last_name", [], "any", false, false, false, 374)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
            yield "\">
                                <i class=\"bi ";
            // line 375
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_last_name", [], "any", false, false, false, 375)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
            yield "\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Métier</span>
                            <span class=\"conformity-status-icon ";
            // line 381
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_job", [], "any", false, false, false, 381)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
            yield "\">
                                <i class=\"bi ";
            // line 382
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_job", [], "any", false, false, false, 382)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
            yield "\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Service</span>
                            <span class=\"conformity-status-icon ";
            // line 388
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_service", [], "any", false, false, false, 388)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
            yield "\">
                                <i class=\"bi ";
            // line 389
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "apprenant_service", [], "any", false, false, false, 389)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
            yield "\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Tuteur</span>
                            <span class=\"conformity-status-icon ";
            // line 395
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mentor", [], "any", false, false, false, 395)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
            yield "\">
                                <i class=\"bi ";
            // line 396
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mentor", [], "any", false, false, false, 396)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
            yield "\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Mission</span>
                            ";
            // line 402
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mission", [], "any", false, false, false, 402) === "TODO")) {
                // line 403
                yield "                                <span class=\"todo-badge\">
                                    <i class=\"bi bi-pencil-fill me-1\" style=\"font-size: 0.7rem;\"></i>
                                    À compléter
                                </span>
                            ";
            } else {
                // line 408
                yield "                                <span class=\"conformity-status-icon ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mission", [], "any", false, false, false, 408)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("success") : ("danger"));
                yield "\">
                                    <i class=\"bi ";
                // line 409
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mission", [], "any", false, false, false, 409)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-check-lg") : ("bi-x-lg"));
                yield "\"></i>
                                </span>
                            ";
            }
            // line 412
            yield "                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 417
        yield "        </div>
    </main>
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
        return "admin/service/analyse_processus.html.twig";
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
        return array (  414 => 417,  404 => 412,  398 => 409,  393 => 408,  386 => 403,  384 => 402,  375 => 396,  371 => 395,  362 => 389,  358 => 388,  349 => 382,  345 => 381,  336 => 375,  332 => 374,  323 => 368,  319 => 367,  311 => 361,  305 => 359,  303 => 358,  297 => 357,  291 => 354,  285 => 353,  276 => 349,  272 => 348,  267 => 345,  265 => 344,  263 => 343,  260 => 342,  257 => 341,  254 => 340,  251 => 339,  248 => 338,  245 => 337,  242 => 336,  239 => 335,  236 => 334,  233 => 333,  230 => 332,  227 => 331,  224 => 330,  221 => 329,  218 => 328,  215 => 327,  213 => 326,  210 => 325,  207 => 324,  204 => 323,  201 => 322,  198 => 320,  196 => 319,  193 => 318,  190 => 317,  187 => 316,  184 => 315,  181 => 314,  178 => 313,  175 => 312,  172 => 310,  167 => 309,  162 => 308,  157 => 307,  152 => 306,  147 => 305,  144 => 303,  141 => 302,  138 => 301,  135 => 300,  133 => 299,  129 => 298,  115 => 287,  100 => 274,  87 => 273,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Analyse de conformité{% endblock %}

{#{% block stylesheets %}
    {{ parent() }}
    <style>
        /* Variables pour l'accessibilité et la cohérence */
        :root {
            --primary-color: #3d5f9e;
            --primary-dark: #2d4a7d;
            --primary-hover: #34508a;
            --primary-light: rgba(61, 95, 158, 0.08);
            --text-dark: #2c384e;
            --text-muted: #5d6778;
            --bg-light: #f8f9fa;
            --border-color: #e0e5ee;
            --success-color: #2e7d32;
            --warning-color: #e65100;
            --info-color: #0277bd;
            --danger-color: #c62828;
            --card-radius: 0.5rem;
            --transition-speed: 0.2s;
            --focus-ring-color: rgba(61, 95, 158, 0.5);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 10px 20px rgba(0, 0, 0, 0.08);
            --card-border: 1px solid var(--border-color);
            --card-header-bg: #fcfcfd;
            --card-body-bg: #ffffff;
            --card-footer-bg: #f9fafc;
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
            background-color: var(--card-body-bg);
            border: var(--card-border);
            margin-bottom: 1.5rem;
            transition: transform var(--transition-speed), box-shadow var(--transition-speed);
            overflow: hidden; /* Assure que les coins arrondis sont respectés */
        }

        .content-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .content-card .card-header {
            background-color: var(--card-header-bg);
            border-bottom: var(--card-border);
            padding: 1rem 1.5rem;
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
            font-weight: 500;
        }

        .dashboard-header {
            position: relative;
            padding-left: 1.25rem;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        /* Styles pour les cartes de conformité */
        .conformity-card {
            border: var(--card-border);
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            background-color: var(--card-body-bg);
            transition: transform var(--transition-speed), box-shadow var(--transition-speed);
            height: 100%;
            overflow: hidden; /* Assure que les coins arrondis sont respectés */
        }

        .conformity-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(61, 95, 158, 0.2);
        }

        .conformity-card .card-header {
            font-weight: 500;
            font-size: 1rem;
            padding: 1rem 1.25rem;
            background-color: var(--card-header-bg);
            border-bottom: var(--card-border);
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .conformity-card .card-body {
            padding: 1.25rem;
            background-color: var(--card-body-bg);
        }

        .conformity-card .card-footer {
            background-color: var(--card-footer-bg);
            border-top: var(--card-border);
            padding: 0.75rem 1.25rem;
            border-bottom-left-radius: var(--card-radius);
            border-bottom-right-radius: var(--card-radius);
        }

        .conformity-status {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .conformity-status-label {
            flex: 1;
            color: var(--text-dark);
            font-weight: 500;
        }

        .conformity-status {
            position: relative;
        }

        .conformity-status-icon {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all var(--transition-speed) ease;
        }

        .conformity-status-icon.success {
            background-color: rgba(46, 125, 50, 0.08);
            color: var(--success-color);
        }

        .conformity-status-icon.warning {
            background-color: rgba(230, 81, 0, 0.08);
            color: var(--warning-color);
        }

        .conformity-status-icon.danger {
            background-color: rgba(198, 40, 40, 0.08);
            color: var(--danger-color);
        }

        .conformity-status:hover .conformity-status-icon {
            transform: scale(1.1);
        }

        .todo-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            background-color: rgba(230, 81, 0, 0.1);
            color: var(--warning-color);
            margin-left: 0.75rem;
            border: 1px solid rgba(230, 81, 0, 0.2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            letter-spacing: 0.03em;
        }

        .conformity-progress {
            height: 6px;
            border-radius: 3px;
            background-color: #f0f2f5;
            margin: 1rem 0;
            overflow: hidden;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .conformity-progress-bar {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 3px;
            transition: width 0.6s ease;
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem;
        }

        .conformity-progress-bar.success {
            background-color: var(--success-color);
        }

        .conformity-progress-bar.warning {
            background-color: var(--warning-color);
        }

        .conformity-progress-bar.danger {
            background-color: var(--danger-color);
        }

        .conformity-badge {
            font-weight: 500;
            padding: 0.35em 0.75em;
            border-radius: 50rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .conformity-meta {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            padding: 0.5rem;
            background-color: rgba(0, 0, 0, 0.02);
            border-radius: 0.25rem;
            border-left: 3px solid var(--primary-color);
        }

        /* Responsive design */
        .mobile-view {
            display: block;
        }

        .desktop-view {
            display: none;
        }

        .ls-1 {
            letter-spacing: 0.06em;
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
    <main class=\"container-fluid my-4\">
        <div class=\"dashboard-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5\">
            <div>
                <h1 class=\"text-dark fw-semibold\" id=\"main-heading\">
                    <i class=\"bi bi-clipboard-check me-2 me-md-3\" aria-hidden=\"true\"></i>
                    Analyse de conformité
                </h1>
                <p class=\"mb-3 mb-md-0 mt-2\" style=\"color: var(--text-muted);\">
                    Analyse de conformité des carnets de compagnonnage.
                </p>
            </div>
            <div>
                <a
                    href=\"{{ path('admin') }}\"
                    class=\"btn btn-outline-secondary rounded-pill shadow-sm\"
                    style=\"padding: 0.6rem 1.2rem;\"
                    aria-label=\"Retour à l'administration\"
                >
                    <i class=\"bi bi-arrow-left me-2\" aria-hidden=\"true\"></i>Retour à l'administration
                </a>
            </div>
        </div>

        <div class=\"row g-4\">
            {% for item in check_conformity %}
            {# Calcul du pourcentage de conformité #}
            {% set total_items = item|length -1 %}
            {% set completed_items = 0 %}
            {% set todo_items = 0 %}

            {# Vérification de chaque élément #}
            {% if item.apprenant_first_name == true %}{% set completed_items = completed_items + 1 %}{% endif %}
            {% if item.apprenant_last_name == true %}{% set completed_items = completed_items + 1 %}{% endif %}
            {% if item.apprenant_job == true %}{% set completed_items = completed_items + 1 %}{% endif %}
            {% if item.apprenant_service == true %}{% set completed_items = completed_items + 1 %}{% endif %}
            {% if item.mentor == true %}{% set completed_items = completed_items + 1 %}{% endif %}

            {# Traitement spécial pour la mission - utilisation d'une variable temporaire #}
            {% set mission_status = item.mission %}
            {% if mission_status is same as(true) %}
                {% set completed_items = completed_items + 1 %}
            {% elseif mission_status is same as(\"TODO\") %}
                {% set todo_items = todo_items + 1 %}
            {% endif %}

            {% set conformity_percent = (completed_items / total_items) * 100 %}

            {# Définition des classes de couleur selon le pourcentage #}
            {% set progress_class = '' %}
            {% set status_text = '' %}
            {% set status_icon = '' %}

            {% if conformity_percent == 100 %}
                {% set progress_class = 'success-subtle text-success-emphasis rounded-pill fw-light ls-1' %}
                {% set status_text = 'Conforme' %}
                {% set status_icon = 'bi-check-circle-fill' %}
            {% elseif conformity_percent >= 75 %}
                {% set progress_class = 'primary-subtle text-primary-emphasis rounded-pill fw-light ls-1' %}
                {% set status_text = 'Presque conforme' %}
                {% set status_icon = 'bi-check-circle' %}
            {% elseif conformity_percent >= 50 %}
                {% set progress_class = 'warning-subtle text-warning-emphasis rounded-pill fw-light ls-1' %}
                {% set status_text = 'Partiellement conforme' %}
                {% set status_icon = 'bi-exclamation-circle' %}
            {% else %}
                {% set progress_class = 'danger-subtle text-danger-emphasis rounded-pill fw-light ls-1' %}
                {% set status_text = 'Non conforme' %}
                {% set status_icon = 'bi-x-circle' %}
            {% endif %}
            {# Vérification du comptage des éléments TODO #}
            {# {{ dump(item.mission, todo_items) }} #}
            <div class=\"col-xl-3 col-lg-4 col-md-6 col-sm-12\">
                <div class=\"conformity-card\">
                    <div class=\"card-header d-flex justify-content-between align-items-center\">
                        <span class=\"fw-medium\">{{ item.fullname }}</span>
                        <span class=\"badge bg-{{ progress_class }} conformity-badge\">{{ status_text }}</span>
                    </div>
                    <div class=\"card-body\">
                        <div class=\"conformity-progress mb-3\">
                            <div class=\"conformity-progress-bar {{ progress_class }}\" style=\"width: {{ conformity_percent }}%\"
                                 aria-valuenow=\"{{ conformity_percent }}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
                        </div>
                        <div class=\"conformity-meta mb-3\">
                            <strong>{{ completed_items }}/{{ total_items }}</strong> éléments conformes
                            {% if todo_items > 0 %}
                                <span class=\"ms-2 badge bg-warning-subtle text-warning-emphasis\">{{ todo_items }} à compléter</span>
                            {% endif %}
                        </div>

                        <h6 class=\"mb-3 fw-bold\">Détails de conformité</h6>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Prénom</span>
                            <span class=\"conformity-status-icon {{ item.apprenant_first_name ? 'success' : 'danger' }}\">
                                <i class=\"bi {{ item.apprenant_first_name ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Nom</span>
                            <span class=\"conformity-status-icon {{ item.apprenant_last_name ? 'success' : 'danger' }}\">
                                <i class=\"bi {{ item.apprenant_last_name ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Métier</span>
                            <span class=\"conformity-status-icon {{ item.apprenant_job ? 'success' : 'danger' }}\">
                                <i class=\"bi {{ item.apprenant_job ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Service</span>
                            <span class=\"conformity-status-icon {{ item.apprenant_service ? 'success' : 'danger' }}\">
                                <i class=\"bi {{ item.apprenant_service ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Tuteur</span>
                            <span class=\"conformity-status-icon {{ item.mentor ? 'success' : 'danger' }}\">
                                <i class=\"bi {{ item.mentor ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                            </span>
                        </div>

                        <div class=\"conformity-status\">
                            <span class=\"conformity-status-label\">Mission</span>
                            {% if item.mission is same as(\"TODO\") %}
                                <span class=\"todo-badge\">
                                    <i class=\"bi bi-pencil-fill me-1\" style=\"font-size: 0.7rem;\"></i>
                                    À compléter
                                </span>
                            {% else %}
                                <span class=\"conformity-status-icon {{ item.mission ? 'success' : 'danger' }}\">
                                    <i class=\"bi {{ item.mission ? 'bi-check-lg' : 'bi-x-lg' }}\"></i>
                                </span>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </main>
{% endblock %}
", "admin/service/analyse_processus.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/service/analyse_processus.html.twig");
    }
}
