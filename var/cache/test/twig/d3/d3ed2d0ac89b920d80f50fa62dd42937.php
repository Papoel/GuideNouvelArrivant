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

/* app/dashboard/cards/mentorCard.html.twig */
class __TwigTemplate_afc3391ad11a08459c0ce7c9a9a3f651 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/cards/mentorCard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/cards/mentorCard.html.twig"));

        // line 1
        if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 1, $this->source); })()), "mentor", [], "any", false, false, false, 1))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "    <div class=\"col-12 col-md-6 mb-4\">
        <div class=\"card info-card mentor-card h-100\">
            <div class=\"ribbon-box mt-2\">
                <div class=\"ribbon ribbon-mentor\">
                    mentor (";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 6, $this->source); })()), "mentor", [], "any", false, false, false, 6), "speciality", [], "any", false, false, false, 6), "code", [], "any", false, false, false, 6), "html", null, true);
            yield ")
                </div>
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 10, $this->source); })()), "mentor", [], "any", false, false, false, 10), "html", null, true);
            yield "
                    ";
            // line 11
            if ((($tmp =  !((isset($context["mentorSeniority"]) || array_key_exists("mentorSeniority", $context) ? $context["mentorSeniority"] : (function () { throw new RuntimeError('Variable "mentorSeniority" does not exist.', 11, $this->source); })()) === "Non défini")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 12
                yield "                        | <span class=\"text-muted\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mentorSeniority"]) || array_key_exists("mentorSeniority", $context) ? $context["mentorSeniority"] : (function () { throw new RuntimeError('Variable "mentorSeniority" does not exist.', 12, $this->source); })()), "html", null, true);
                yield "</span>
                    ";
            }
            // line 14
            yield "                </h5>

                <div class=\"d-flex align-items-center\">
                    <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center\">
                        <i class=\"bi bi-person-heart\"></i>
                    </div>

                    <div class=\"ps-3\">
                        ";
            // line 22
            if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "mentor", [], "any", false, false, false, 22))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 23
                yield "                            <h5 class=\"card-title\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "mentor", [], "any", false, false, false, 23), "getFullname", [], "method", false, false, false, 23), "html", null, true);
                yield "</h5>
                            <h6>";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "mentor", [], "any", false, false, false, 24), "jobLabel", [], "any", false, false, false, 24), "html", null, true);
                yield "</h6>
                        ";
            } else {
                // line 26
                yield "                            <h5 class=\"card-title\">Mentor non défini</h5>
                        ";
            }
            // line 28
            yield "                        <!-- Date d'embauche -->
                        <span class=\"text-success small pt-1 fw-bold\">Embauche:</span>
                        ";
            // line 30
            if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 30, $this->source); })()), "mentor", [], "any", false, false, false, 30), "hiringAt", [], "any", false, false, false, 30))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 31
                yield "                            <span class=\"text-muted small pt-2 ps-1\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "mentor", [], "any", false, false, false, 31), "hiringAt", [], "any", false, false, false, 31), "d/m/Y"), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 33
                yield "                            <span class=\"text-muted small pt-2 ps-1\">Non renseignée</span>
                        ";
            }
            // line 35
            yield "                    </div>
                </div>
            </div>
        </div>
    </div>
";
        } else {
            // line 41
            yield "    <!-- Card pas de mentor -->
    <div class=\"col-12 col-md-6 mb-4\">
        <div class=\"card info-card no-mentor-card h-100 px-4\">
            <div class=\"ribbon-box mt-2\">
                <div class=\"ribbon ribbon-no-mentor\">
                    Pas de Mentor
                </div>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3\">
                    <i class=\"bi bi-exclamation-circle\"></i>
                </div>
                <h5 class=\"card-title\">Aucun mentor assigné</h5>
                <p class=\"text-muted\">";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 54, $this->source); })()), "fullname", [], "any", false, false, false, 54), "html", null, true);
            yield " n'a actuellement pas de mentor assigné.</p>
                ";
            // line 55
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 56
                yield "                    <span class=\"btn btn-sm\" id=\"btn-assign--mentor\">Veuillez en informer votre supérieur.</span>
                ";
            }
            // line 58
            yield "            </div>
        </div>
    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "app/dashboard/cards/mentorCard.html.twig";
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
        return array (  150 => 58,  146 => 56,  144 => 55,  140 => 54,  125 => 41,  117 => 35,  113 => 33,  107 => 31,  105 => 30,  101 => 28,  97 => 26,  92 => 24,  87 => 23,  85 => 22,  75 => 14,  69 => 12,  67 => 11,  63 => 10,  56 => 6,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if user.mentor is not null %}
    <div class=\"col-12 col-md-6 mb-4\">
        <div class=\"card info-card mentor-card h-100\">
            <div class=\"ribbon-box mt-2\">
                <div class=\"ribbon ribbon-mentor\">
                    mentor ({{ user.mentor.speciality.code }})
                </div>
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">{{ user.mentor }}
                    {% if mentorSeniority is not same as \"Non défini\" %}
                        | <span class=\"text-muted\">{{ mentorSeniority }}</span>
                    {% endif %}
                </h5>

                <div class=\"d-flex align-items-center\">
                    <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center\">
                        <i class=\"bi bi-person-heart\"></i>
                    </div>

                    <div class=\"ps-3\">
                        {% if user.mentor is not null %}
                            <h5 class=\"card-title\">{{ user.mentor.getFullname() }}</h5>
                            <h6>{{ user.mentor.jobLabel }}</h6>
                        {% else %}
                            <h5 class=\"card-title\">Mentor non défini</h5>
                        {% endif %}
                        <!-- Date d'embauche -->
                        <span class=\"text-success small pt-1 fw-bold\">Embauche:</span>
                        {% if user.mentor.hiringAt is not null %}
                            <span class=\"text-muted small pt-2 ps-1\">{{ user.mentor.hiringAt|date('d/m/Y') }}</span>
                        {% else %}
                            <span class=\"text-muted small pt-2 ps-1\">Non renseignée</span>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% else %}
    <!-- Card pas de mentor -->
    <div class=\"col-12 col-md-6 mb-4\">
        <div class=\"card info-card no-mentor-card h-100 px-4\">
            <div class=\"ribbon-box mt-2\">
                <div class=\"ribbon ribbon-no-mentor\">
                    Pas de Mentor
                </div>
            </div>
            <div class=\"card-body text-center\">
                <div class=\"card-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3\">
                    <i class=\"bi bi-exclamation-circle\"></i>
                </div>
                <h5 class=\"card-title\">Aucun mentor assigné</h5>
                <p class=\"text-muted\">{{ user.fullname }} n'a actuellement pas de mentor assigné.</p>
                {% if is_granted('ROLE_ADMIN') %}
                    <span class=\"btn btn-sm\" id=\"btn-assign--mentor\">Veuillez en informer votre supérieur.</span>
                {% endif %}
            </div>
        </div>
    </div>
{% endif %}
", "app/dashboard/cards/mentorCard.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/cards/mentorCard.html.twig");
    }
}
