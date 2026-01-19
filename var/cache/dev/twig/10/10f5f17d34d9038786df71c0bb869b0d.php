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

/* admin/field/service_detail.html.twig */
class __TwigTemplate_3dff3b1864edf995bc8a32c8e67a4aae extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/service_detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/service_detail.html.twig"));

        // line 2
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 2, $this->source); })()), "value", [], "any", false, false, false, 2)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 3
            yield "    <div class=\"mb-4\">
        <div class=\"d-flex align-items-center mb-3\">
            <div class=\"service-icon me-3\">
                <div class=\"rounded-circle bg-light p-3 d-flex align-items-center justify-content-center\" style=\"width: 54px; height: 54px;\">
                    <i class=\"fas fa-building text-success\"></i>
                </div>
            </div>
            <div class=\"service-info\">
                <h4 class=\"fw-semibold text-dark mb-0\">";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 11, $this->source); })()), "value", [], "any", false, false, false, 11), "html", null, true);
            yield "</h4>
                <div class=\"text-muted small\">Service associé</div>
            </div>
        </div>

        ";
            // line 16
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 16, $this->source); })()), "value", [], "any", false, false, false, 16), "description", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 17
                yield "            <div class=\"service-description ms-4 ps-3 border-start border-2 border-light-subtle\">
                ";
                // line 18
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 18, $this->source); })()), "value", [], "any", false, false, false, 18), "description", [], "any", false, false, false, 18);
                yield "
            </div>
        ";
            }
            // line 21
            yield "    </div>
";
        } else {
            // line 23
            yield "    <div class=\"empty-state p-3 text-center bg-light rounded mb-4\">
        <div class=\"py-3\">
            <i class=\"fas fa-building text-secondary opacity-50 fa-2x mb-2\"></i>
            <p class=\"text-secondary mb-0\">Aucun service associé à ce modèle</p>
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
        return "admin/field/service_detail.html.twig";
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
        return array (  83 => 23,  79 => 21,  73 => 18,  70 => 17,  68 => 16,  60 => 11,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Template pour l'affichage d'un service dans la page détail des modèles de carnet #}
{% if field.value %}
    <div class=\"mb-4\">
        <div class=\"d-flex align-items-center mb-3\">
            <div class=\"service-icon me-3\">
                <div class=\"rounded-circle bg-light p-3 d-flex align-items-center justify-content-center\" style=\"width: 54px; height: 54px;\">
                    <i class=\"fas fa-building text-success\"></i>
                </div>
            </div>
            <div class=\"service-info\">
                <h4 class=\"fw-semibold text-dark mb-0\">{{ field.value }}</h4>
                <div class=\"text-muted small\">Service associé</div>
            </div>
        </div>

        {% if field.value.description %}
            <div class=\"service-description ms-4 ps-3 border-start border-2 border-light-subtle\">
                {{ field.value.description|raw }}
            </div>
        {% endif %}
    </div>
{% else %}
    <div class=\"empty-state p-3 text-center bg-light rounded mb-4\">
        <div class=\"py-3\">
            <i class=\"fas fa-building text-secondary opacity-50 fa-2x mb-2\"></i>
            <p class=\"text-secondary mb-0\">Aucun service associé à ce modèle</p>
        </div>
    </div>
{% endif %}
", "admin/field/service_detail.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/field/service_detail.html.twig");
    }
}
