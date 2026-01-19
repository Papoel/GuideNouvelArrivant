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

/* admin/field/themes_selection.html.twig */
class __TwigTemplate_478447badae054b4c5a0253bcdf49e8b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/themes_selection.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/themes_selection.html.twig"));

        // line 2
        $context["ea_vars"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 2, $this->source); })()), "crud", [], "any", false, false, false, 2), "vars", [], "any", false, false, false, 2);
        // line 3
        $context["field_value"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["ea_vars"] ?? null), "field_value", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea_vars"]) || array_key_exists("ea_vars", $context) ? $context["ea_vars"] : (function () { throw new RuntimeError('Variable "ea_vars" does not exist.', 3, $this->source); })()), "field_value", [], "any", false, false, false, 3), "")) : (""));
        // line 4
        yield "
<div class=\"themes-selection\">
    ";
        // line 6
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'widget', ["attr" => ["class" => "form-select-lg theme-select", "data-controller" => "select2"]]);
        yield "

    <div class=\"themes-help mt-3\">
        <p class=\"text-muted small\">
            <i class=\"fas fa-info-circle me-1\"></i>
            Sélectionnez les thèmes qui seront inclus dans ce modèle de carnet.
            Chaque thème contient des modules qui seront automatiquement ajoutés au carnet.
        </p>
    </div>

    ";
        // line 16
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["field_value"]) || array_key_exists("field_value", $context) ? $context["field_value"] : (function () { throw new RuntimeError('Variable "field_value" does not exist.', 16, $this->source); })())) > 0)) {
            // line 17
            yield "        <div class=\"selected-themes mt-3\">
            <div class=\"themes-header d-flex justify-content-between mb-2\">
                <span class=\"text-muted small\">Thèmes sélectionnés</span>
                <span class=\"badge bg-light text-dark small\">";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["field_value"]) || array_key_exists("field_value", $context) ? $context["field_value"] : (function () { throw new RuntimeError('Variable "field_value" does not exist.', 20, $this->source); })())), "html", null, true);
            yield "</span>
            </div>

            <div class=\"themes-list bg-light rounded p-3\">
                <div class=\"row g-3\">
                    ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["field_value"]) || array_key_exists("field_value", $context) ? $context["field_value"] : (function () { throw new RuntimeError('Variable "field_value" does not exist.', 25, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 26
                yield "                        <div class=\"col-lg-6 col-md-12\">
                            <div class=\"theme-item d-flex align-items-center\">
                                <div class=\"theme-icon me-2\">
                                    <div class=\"rounded-circle bg-white p-2 d-flex align-items-center justify-content-center\" style=\"width: 32px; height: 32px;\">
                                        <i class=\"fas fa-list-alt text-success small\"></i>
                                    </div>
                                </div>
                                <div class=\"theme-info\">
                                    <div class=\"theme-name text-dark\">";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 34), "html", null, true);
                yield "</div>
                                    ";
                // line 35
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 35)) > 0)) {
                    // line 36
                    yield "                                        <div class=\"theme-modules small text-muted\">
                                            ";
                    // line 37
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 37)), "html", null, true);
                    yield " module";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 37)) > 1)) {
                        yield "s";
                    }
                    // line 38
                    yield "                                        </div>
                                    ";
                }
                // line 40
                yield "                                </div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "                </div>
            </div>
        </div>
    ";
        }
        // line 48
        yield "</div>
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
        return "admin/field/themes_selection.html.twig";
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
        return array (  132 => 48,  126 => 44,  117 => 40,  113 => 38,  107 => 37,  104 => 36,  102 => 35,  98 => 34,  88 => 26,  84 => 25,  76 => 20,  71 => 17,  69 => 16,  56 => 6,  52 => 4,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Template pour la sélection des thèmes dans les formulaires de création/édition #}
{% set ea_vars = ea.crud.vars %}
{% set field_value = ea_vars.field_value|default('') %}

<div class=\"themes-selection\">
    {{ form_widget(form, {'attr': {'class': 'form-select-lg theme-select', 'data-controller': 'select2'}}) }}

    <div class=\"themes-help mt-3\">
        <p class=\"text-muted small\">
            <i class=\"fas fa-info-circle me-1\"></i>
            Sélectionnez les thèmes qui seront inclus dans ce modèle de carnet.
            Chaque thème contient des modules qui seront automatiquement ajoutés au carnet.
        </p>
    </div>

    {% if field_value|length > 0 %}
        <div class=\"selected-themes mt-3\">
            <div class=\"themes-header d-flex justify-content-between mb-2\">
                <span class=\"text-muted small\">Thèmes sélectionnés</span>
                <span class=\"badge bg-light text-dark small\">{{ field_value|length }}</span>
            </div>

            <div class=\"themes-list bg-light rounded p-3\">
                <div class=\"row g-3\">
                    {% for theme in field_value %}
                        <div class=\"col-lg-6 col-md-12\">
                            <div class=\"theme-item d-flex align-items-center\">
                                <div class=\"theme-icon me-2\">
                                    <div class=\"rounded-circle bg-white p-2 d-flex align-items-center justify-content-center\" style=\"width: 32px; height: 32px;\">
                                        <i class=\"fas fa-list-alt text-success small\"></i>
                                    </div>
                                </div>
                                <div class=\"theme-info\">
                                    <div class=\"theme-name text-dark\">{{ theme.title }}</div>
                                    {% if theme.modules|length > 0 %}
                                        <div class=\"theme-modules small text-muted\">
                                            {{ theme.modules|length }} module{% if theme.modules|length > 1 %}s{% endif %}
                                        </div>
                                    {% endif %}
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            </div>
        </div>
    {% endif %}
</div>
", "admin/field/themes_selection.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/field/themes_selection.html.twig");
    }
}
