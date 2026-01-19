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

/* app/dashboard/cards/userCard.html.twig */
class __TwigTemplate_4e7db45b065ff53bd5ce9220ad8b2634 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/cards/userCard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/cards/userCard.html.twig"));

        // line 1
        yield "<div class=\"col-12 col-md-6 mb-4\">
    <div class=\"card info-card user-card h-100\">
        <!-- Bandeau de spécialité -->
        <div class=\"ribbon-box mt-2\">
            <div class=\"ribbon
                ";
        // line 6
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 6, $this->source); })()), "speciality", [], "any", false, false, false, 6), "code", [], "any", false, false, false, 6) == "CHA")) {
            yield "ribbon-cha
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 7
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 7, $this->source); })()), "speciality", [], "any", false, false, false, 7), "code", [], "any", false, false, false, 7) == "LEV")) {
            yield "ribbon-lev
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 8
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 8, $this->source); })()), "speciality", [], "any", false, false, false, 8), "code", [], "any", false, false, false, 8) == "MEC")) {
            yield "ribbon-mec
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 9
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 9, $this->source); })()), "speciality", [], "any", false, false, false, 9), "code", [], "any", false, false, false, 9) == "ROB")) {
            yield "ribbon-rob
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 10
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 10, $this->source); })()), "speciality", [], "any", false, false, false, 10), "code", [], "any", false, false, false, 10) == "SOU")) {
            yield "ribbon-sou
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 11
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 11, $this->source); })()), "speciality", [], "any", false, false, false, 11), "code", [], "any", false, false, false, 11) == "END")) {
            yield "ribbon-end
                ";
        }
        // line 13
        yield "            \">
                ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 14, $this->source); })()), "speciality", [], "any", false, false, false, 14), "code", [], "any", false, false, false, 14), "html", null, true);
        yield "
            </div>
        </div>
        <div class=\"card-body\">
            <h5 class=\"card-title\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "fullname", [], "any", false, false, false, 18), "html", null, true);
        yield "
                ";
        // line 19
        if ((($tmp =  !((isset($context["userSeniority"]) || array_key_exists("userSeniority", $context) ? $context["userSeniority"] : (function () { throw new RuntimeError('Variable "userSeniority" does not exist.', 19, $this->source); })()) === "Non défini")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                    | <span class=\"text-muted\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userSeniority"]) || array_key_exists("userSeniority", $context) ? $context["userSeniority"] : (function () { throw new RuntimeError('Variable "userSeniority" does not exist.', 20, $this->source); })()), "html", null, true);
            yield "</span>
                ";
        }
        // line 22
        yield "            </h5>

            <div class=\"d-flex align-items-center\">
                <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center me-3\">
                    <i class=\"bi bi-person\"></i>
                </div>

                <div class=\"ps-3\">
                        <h5 class=\"card-title\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 30, $this->source); })()), "getFullname", [], "method", false, false, false, 30), "html", null, true);
        yield "</h5>
                        <h6>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "job", [], "any", false, false, false, 31), "name", [], "any", false, false, false, 31), "html", null, true);
        yield "</h6>
                    <!-- Date d'embauche -->
                    <span class=\"text-success small pt-1 fw-bold\">Embauche:</span>
                    ";
        // line 34
        if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "hiringAt", [], "any", false, false, false, 34))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "                        <span class=\"text-muted small pt-2 ps-1\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 35, $this->source); })()), "hiringAt", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true);
            yield "</span>
                    ";
        } else {
            // line 37
            yield "                        <span class=\"text-muted small pt-2 ps-1\">Non renseignée</span>
                    ";
        }
        // line 39
        yield "                </div>

            </div>
        </div>
    </div>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "app/dashboard/cards/userCard.html.twig";
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
        return array (  134 => 39,  130 => 37,  124 => 35,  122 => 34,  116 => 31,  112 => 30,  102 => 22,  96 => 20,  94 => 19,  90 => 18,  83 => 14,  80 => 13,  75 => 11,  71 => 10,  67 => 9,  63 => 8,  59 => 7,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"col-12 col-md-6 mb-4\">
    <div class=\"card info-card user-card h-100\">
        <!-- Bandeau de spécialité -->
        <div class=\"ribbon-box mt-2\">
            <div class=\"ribbon
                {% if user.speciality.code == 'CHA' %}ribbon-cha
                {% elseif user.speciality.code == 'LEV' %}ribbon-lev
                {% elseif user.speciality.code == 'MEC' %}ribbon-mec
                {% elseif user.speciality.code == 'ROB' %}ribbon-rob
                {% elseif user.speciality.code == 'SOU' %}ribbon-sou
                {% elseif user.speciality.code == 'END' %}ribbon-end
                {% endif %}
            \">
                {{ user.speciality.code }}
            </div>
        </div>
        <div class=\"card-body\">
            <h5 class=\"card-title\">{{ user.fullname }}
                {% if userSeniority is not same as \"Non défini\" %}
                    | <span class=\"text-muted\">{{ userSeniority }}</span>
                {% endif %}
            </h5>

            <div class=\"d-flex align-items-center\">
                <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center me-3\">
                    <i class=\"bi bi-person\"></i>
                </div>

                <div class=\"ps-3\">
                        <h5 class=\"card-title\">{{ user.getFullname() }}</h5>
                        <h6>{{ user.job.name }}</h6>
                    <!-- Date d'embauche -->
                    <span class=\"text-success small pt-1 fw-bold\">Embauche:</span>
                    {% if user.hiringAt is not null %}
                        <span class=\"text-muted small pt-2 ps-1\">{{ user.hiringAt|date('d/m/Y') }}</span>
                    {% else %}
                        <span class=\"text-muted small pt-2 ps-1\">Non renseignée</span>
                    {% endif %}
                </div>

            </div>
        </div>
    </div>
</div>
", "app/dashboard/cards/userCard.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/cards/userCard.html.twig");
    }
}
