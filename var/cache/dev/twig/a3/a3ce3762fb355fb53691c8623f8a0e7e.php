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

/* app/profile/settings.html.twig */
class __TwigTemplate_14389eedc1a605a5a35454f9d0697793 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/profile/settings.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/profile/settings.html.twig"));

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

        yield "Paramètres du compte";
        
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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
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

        // line 10
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
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

        // line 14
        yield "    <div class=\"profile-header\">
        <div class=\"profile-header-overlay\"></div>
        <div class=\"container position-relative\">
            <div class=\"d-flex align-items-center py-5\">
                <div class=\"profile-image-large\">
                    <div class=\"profile-image-content\">
                        <i class=\"bi bi-person\"></i>
                    </div>
                </div>
                <div class=\"profile-header-content ms-4\">
                    <h1 class=\"text-white mb-2\">";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "fullname", [], "any", false, false, false, 24), "html", null, true);
        yield "</h1>
                    <div class=\"d-flex align-items-center text-white-50\">
                        <i class=\"bi bi-briefcase me-2\"></i>
                        <span>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "job", [], "any", false, false, false, 27), "name", [], "any", false, false, false, 27), "html", null, true);
        yield "</span>
                        <span class=\"mx-3\">•</span>
                        <i class=\"bi bi-tools me-2\"></i>
                        <span>";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 30, $this->source); })()), "speciality", [], "any", false, false, false, 30), "name", [], "any", false, false, false, 30), "html", null, true);
        yield "</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"profile-nav mb-3\">
        <div class=\"container\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb mb-0 py-3\">
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "user", [], "any", false, false, false, 42), "nni", [], "any", false, false, false, 42)]), "html", null, true);
        yield "\" class=\"text-decoration-none\">Accueil</a></li>
                        <li class=\"breadcrumb-item active\">Paramètres du compte</li>
                    </ol>
                </nav>
                <div class=\"profile-badge\">
                    <span class=\"badge bg-gradient\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 47, $this->source); })()), "nni", [], "any", false, false, false, 47), "html", null, true);
        yield "</span>
                </div>
            </div>
        </div>
    </div>

    <div class=\"profile-content pb-5\">
        <div class=\"container\">
            <div class=\"row g-4\">
                <!-- Colonne de gauche -->
                <div class=\"col-xl-4\">
                    <!-- Carte d'informations -->
                    <div class=\"card custom-card\" data-aos=\"fade-right\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title d-flex align-items-center mb-4\">
                                <i class=\"bi bi-info-circle me-2\"></i>
                                Informations rapides
                            </h5>
                            <div class=\"info-grid\">
                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-envelope\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Email</span>
                                        <span class=\"info-value\">";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "email", [], "any", false, false, false, 72), "html", null, true);
        yield "</span>
                                    </div>
                                </div>

                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-person-check\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Tuteur</span>
                                        <span class=\"info-value\">";
        // line 82
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 82, $this->source); })()), "getMentor", [], "method", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 82, $this->source); })()), "getMentor", [], "method", false, false, false, 82), "fullname", [], "any", false, false, false, 82), "html", null, true)) : ("Non assigné"));
        yield "</span>
                                    </div>
                                </div>

                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-calendar-check\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Date d'embauche</span>
                                        <span class=\"info-value\">";
        // line 92
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 92, $this->source); })()), "hiringAt", [], "any", false, false, false, 92)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 92, $this->source); })()), "hiringAt", [], "any", false, false, false, 92), "d/m/Y"), "html", null, true)) : ("Non renseignée"));
        yield "</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne de droite -->
                <div class=\"col-xl-8\">
                    <div class=\"card custom-card\" data-aos=\"fade-left\">
                        <div class=\"card-body p-4\">
                            ";
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 104, $this->source); })()), "flashes", ["success"], "method", false, false, false, 104));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 105
            yield "                                <div class=\"custom-alert success mb-4\">
                                    <div class=\"custom-alert-icon\">
                                        <i class=\"bi bi-check-circle\"></i>
                                    </div>
                                    <div class=\"custom-alert-content\">
                                        ";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
                                    </div>
                                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        yield "
                            ";
        // line 116
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 116, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation custom-form"]]);
        yield "
                                <div class=\"row g-4\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 120
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 120, $this->source); })()), "firstname", [], "any", false, false, false, 120), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Prénom"]]);
        yield "
                                            ";
        // line 121
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 121, $this->source); })()), "firstname", [], "any", false, false, false, 121), 'label');
        yield "
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 126
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 126, $this->source); })()), "lastname", [], "any", false, false, false, 126), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Nom"]]);
        yield "
                                            ";
        // line 127
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 127, $this->source); })()), "lastname", [], "any", false, false, false, 127), 'label');
        yield "
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 135
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 135, $this->source); })()), "nni", [], "any", false, false, false, 135), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "NNI"]]);
        yield "
                                            ";
        // line 136
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 136, $this->source); })()), "nni", [], "any", false, false, false, 136), 'label');
        yield "
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 141
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 141, $this->source); })()), "email", [], "any", false, false, false, 141), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Email"]]);
        yield "
                                            ";
        // line 142
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 142, $this->source); })()), "email", [], "any", false, false, false, 142), 'label');
        yield "
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 150
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 150, $this->source); })()), "hiringAt", [], "any", false, false, false, 150), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Date d'embauche"]]);
        yield "
                                            ";
        // line 151
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 151, $this->source); })()), "hiringAt", [], "any", false, false, false, 151), 'label');
        yield "
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 156
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 156, $this->source); })()), "job", [], "any", false, false, false, 156), 'widget', ["attr" => ["class" => "form-select", "placeholder" => "Poste"]]);
        yield "
                                            ";
        // line 157
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 157, $this->source); })()), "job", [], "any", false, false, false, 157), 'label');
        yield "
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            ";
        // line 165
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 165, $this->source); })()), "speciality", [], "any", false, false, false, 165), 'widget', ["attr" => ["class" => "form-select", "placeholder" => "Spécialité"]]);
        yield "
                                            ";
        // line 166
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 166, $this->source); })()), "speciality", [], "any", false, false, false, 166), 'label');
        yield "
                                        </div>
                                    </div>
                                </div>

                                <div class=\"form-actions mt-4\">
                                    <button type=\"submit\" class=\"btn btn-gradient\">
                                        <i class=\"bi bi-check2-circle me-2\"></i>
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            ";
        // line 177
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 177, $this->source); })()), 'form_end');
        yield "
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-header {
            background: linear-gradient(135deg, #4154f1, #2c384e);
            position: relative;
            overflow: hidden;
        }

        .profile-header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
        }

        .profile-image-large {
            width: 120px;
            height: 120px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .profile-image-large i {
            font-size: 3rem;
            color: white;
        }

        .profile-nav {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-badge .badge {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #4154f1, #2c384e);
            border-radius: 12px;
        }

        .custom-card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-grid {
            display: grid;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #4154f1, #2c384e);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .info-icon i {
            color: white;
            font-size: 1.2rem;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            display: block;
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            display: block;
            font-weight: 500;
            color: #2c384e;
        }

        .custom-alert {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 12px;
            background: #e8f6f3;
            border: 1px solid #d1e7dd;
        }

        .custom-alert-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #0f5132;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .custom-alert-icon i {
            color: white;
        }

        .custom-alert-content {
            flex: 1;
            color: #0f5132;
        }

        .custom-form .form-floating {
            position: relative;
        }

        .custom-floating .form-control,
        .custom-floating .form-select {
            height: 60px;
            padding: 1.625rem 0.75rem 0.625rem;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: white;
        }

        .custom-floating .form-select {
            background-position: right 0.75rem center;
        }

        .custom-floating .form-control:focus,
        .custom-floating .form-select:focus {
            border-color: #4154f1;
            box-shadow: 0 0 0 0.25rem rgba(65, 84, 241, 0.1);
        }

        .custom-floating label {
            padding: 0.75rem;
            font-size: 0.85rem;
            opacity: 0.65;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
        }

        .custom-floating .form-control::placeholder,
        .custom-floating .form-select::placeholder {
            color: transparent;
        }

        /* Uniquement pour les inputs text qui n'ont pas de valeur */
        .custom-floating .form-control:placeholder-shown:not(:focus) ~ label {
            transform: scale(1) translateY(1rem) translateX(0);
            opacity: 0.75;
        }

        /* Pour les select, garder le label toujours en haut car il y a toujours une valeur */
        .custom-floating .form-select ~ label {
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            opacity: 0.65;
        }

        .mentor-field {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 12px;
        }

        .mentor-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #2c384e;
        }

        .mentor-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            height: 60px;
            background-color: white;
        }

        .mentor-info {
            display: flex;
            align-items: center;
            margin-top: 0.75rem;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .mentor-info i {
            margin-right: 0.5rem;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #4154f1, #2c384e);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(65, 84, 241, 0.3);
            color: white;
        }

        @media (max-width: 768px) {
            .profile-header-content {
                text-align: center;
            }

            .profile-image-large {
                margin: 0 auto 1rem;
            }

            .profile-badge {
                margin-top: 1rem;
            }
        }
    </style>
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
        return "app/profile/settings.html.twig";
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
        return array (  403 => 177,  389 => 166,  385 => 165,  374 => 157,  370 => 156,  362 => 151,  358 => 150,  347 => 142,  343 => 141,  335 => 136,  331 => 135,  320 => 127,  316 => 126,  308 => 121,  304 => 120,  297 => 116,  294 => 115,  283 => 110,  276 => 105,  272 => 104,  257 => 92,  244 => 82,  231 => 72,  203 => 47,  195 => 42,  180 => 30,  174 => 27,  168 => 24,  156 => 14,  143 => 13,  129 => 10,  116 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Paramètres du compte{% endblock %}

{% block stylesheets %}
    {{ parent() }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
{% endblock %}

{% block body %}
    <div class=\"profile-header\">
        <div class=\"profile-header-overlay\"></div>
        <div class=\"container position-relative\">
            <div class=\"d-flex align-items-center py-5\">
                <div class=\"profile-image-large\">
                    <div class=\"profile-image-content\">
                        <i class=\"bi bi-person\"></i>
                    </div>
                </div>
                <div class=\"profile-header-content ms-4\">
                    <h1 class=\"text-white mb-2\">{{ user.fullname }}</h1>
                    <div class=\"d-flex align-items-center text-white-50\">
                        <i class=\"bi bi-briefcase me-2\"></i>
                        <span>{{ user.job.name }}</span>
                        <span class=\"mx-3\">•</span>
                        <i class=\"bi bi-tools me-2\"></i>
                        <span>{{ user.speciality.name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"profile-nav mb-3\">
        <div class=\"container\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb mb-0 py-3\">
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"text-decoration-none\">Accueil</a></li>
                        <li class=\"breadcrumb-item active\">Paramètres du compte</li>
                    </ol>
                </nav>
                <div class=\"profile-badge\">
                    <span class=\"badge bg-gradient\">{{ user.nni }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class=\"profile-content pb-5\">
        <div class=\"container\">
            <div class=\"row g-4\">
                <!-- Colonne de gauche -->
                <div class=\"col-xl-4\">
                    <!-- Carte d'informations -->
                    <div class=\"card custom-card\" data-aos=\"fade-right\">
                        <div class=\"card-body p-4\">
                            <h5 class=\"card-title d-flex align-items-center mb-4\">
                                <i class=\"bi bi-info-circle me-2\"></i>
                                Informations rapides
                            </h5>
                            <div class=\"info-grid\">
                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-envelope\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Email</span>
                                        <span class=\"info-value\">{{ user.email }}</span>
                                    </div>
                                </div>

                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-person-check\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Tuteur</span>
                                        <span class=\"info-value\">{{ user.getMentor() ? user.getMentor().fullname : 'Non assigné' }}</span>
                                    </div>
                                </div>

                                <div class=\"info-item\">
                                    <div class=\"info-icon\">
                                        <i class=\"bi bi-calendar-check\"></i>
                                    </div>
                                    <div class=\"info-content\">
                                        <span class=\"info-label\">Date d'embauche</span>
                                        <span class=\"info-value\">{{ user.hiringAt ? user.hiringAt|date('d/m/Y') : 'Non renseignée' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne de droite -->
                <div class=\"col-xl-8\">
                    <div class=\"card custom-card\" data-aos=\"fade-left\">
                        <div class=\"card-body p-4\">
                            {% for message in app.flashes('success') %}
                                <div class=\"custom-alert success mb-4\">
                                    <div class=\"custom-alert-icon\">
                                        <i class=\"bi bi-check-circle\"></i>
                                    </div>
                                    <div class=\"custom-alert-content\">
                                        {{ message }}
                                    </div>
                                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>
                            {% endfor %}

                            {{ form_start(form, {'attr': {'class': 'needs-validation custom-form'}}) }}
                                <div class=\"row g-4\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.firstname, {'attr': {'class': 'form-control', 'placeholder': 'Prénom'}}) }}
                                            {{ form_label(form.firstname) }}
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.lastname, {'attr': {'class': 'form-control', 'placeholder': 'Nom'}}) }}
                                            {{ form_label(form.lastname) }}
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.nni, {'attr': {'class': 'form-control', 'placeholder': 'NNI'}}) }}
                                            {{ form_label(form.nni) }}
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.email, {'attr': {'class': 'form-control', 'placeholder': 'Email'}}) }}
                                            {{ form_label(form.email) }}
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.hiringAt, {'attr': {'class': 'form-control', 'placeholder': \"Date d'embauche\"}}) }}
                                            {{ form_label(form.hiringAt) }}
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.job, {'attr': {'class': 'form-select', 'placeholder': 'Poste'}}) }}
                                            {{ form_label(form.job) }}
                                        </div>
                                    </div>
                                </div>

                                <div class=\"row g-4 mt-2\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-floating custom-floating\">
                                            {{ form_widget(form.speciality, {'attr': {'class': 'form-select', 'placeholder': 'Spécialité'}}) }}
                                            {{ form_label(form.speciality) }}
                                        </div>
                                    </div>
                                </div>

                                <div class=\"form-actions mt-4\">
                                    <button type=\"submit\" class=\"btn btn-gradient\">
                                        <i class=\"bi bi-check2-circle me-2\"></i>
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            {{ form_end(form) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-header {
            background: linear-gradient(135deg, #4154f1, #2c384e);
            position: relative;
            overflow: hidden;
        }

        .profile-header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
        }

        .profile-image-large {
            width: 120px;
            height: 120px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .profile-image-large i {
            font-size: 3rem;
            color: white;
        }

        .profile-nav {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-badge .badge {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #4154f1, #2c384e);
            border-radius: 12px;
        }

        .custom-card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-grid {
            display: grid;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #4154f1, #2c384e);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .info-icon i {
            color: white;
            font-size: 1.2rem;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            display: block;
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            display: block;
            font-weight: 500;
            color: #2c384e;
        }

        .custom-alert {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 12px;
            background: #e8f6f3;
            border: 1px solid #d1e7dd;
        }

        .custom-alert-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #0f5132;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .custom-alert-icon i {
            color: white;
        }

        .custom-alert-content {
            flex: 1;
            color: #0f5132;
        }

        .custom-form .form-floating {
            position: relative;
        }

        .custom-floating .form-control,
        .custom-floating .form-select {
            height: 60px;
            padding: 1.625rem 0.75rem 0.625rem;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: white;
        }

        .custom-floating .form-select {
            background-position: right 0.75rem center;
        }

        .custom-floating .form-control:focus,
        .custom-floating .form-select:focus {
            border-color: #4154f1;
            box-shadow: 0 0 0 0.25rem rgba(65, 84, 241, 0.1);
        }

        .custom-floating label {
            padding: 0.75rem;
            font-size: 0.85rem;
            opacity: 0.65;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
        }

        .custom-floating .form-control::placeholder,
        .custom-floating .form-select::placeholder {
            color: transparent;
        }

        /* Uniquement pour les inputs text qui n'ont pas de valeur */
        .custom-floating .form-control:placeholder-shown:not(:focus) ~ label {
            transform: scale(1) translateY(1rem) translateX(0);
            opacity: 0.75;
        }

        /* Pour les select, garder le label toujours en haut car il y a toujours une valeur */
        .custom-floating .form-select ~ label {
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            opacity: 0.65;
        }

        .mentor-field {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 12px;
        }

        .mentor-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #2c384e;
        }

        .mentor-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            height: 60px;
            background-color: white;
        }

        .mentor-info {
            display: flex;
            align-items: center;
            margin-top: 0.75rem;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .mentor-info i {
            margin-right: 0.5rem;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #4154f1, #2c384e);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(65, 84, 241, 0.3);
            color: white;
        }

        @media (max-width: 768px) {
            .profile-header-content {
                text-align: center;
            }

            .profile-image-large {
                margin: 0 auto 1rem;
            }

            .profile-badge {
                margin-top: 1rem;
            }
        }
    </style>
{% endblock %}
", "app/profile/settings.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/profile/settings.html.twig");
    }
}
