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

/* components/ActionForm.html.twig */
class __TwigTemplate_b560cb614bb13b5194090c0c5d61df7f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/ActionForm.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/ActionForm.html.twig"));

        // line 1
        yield "<div ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 1, $this->source); })()), "html", null, true);
        yield ">
    ";
        // line 2
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["attr" => ["novalidate" => false, "data-action" => "live#action:prevent", "data-live-action-param" => "save"]]);
        // line 8
        yield "
    <div class=\"modal-body\">
        <div class=\"container-fluid\">

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Agents</legend>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "agentComment", [], "any", false, false, false, 18), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 21
        yield "
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 24), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 27
        yield "
                        </div>
                    </div>
                </fieldset>
            </section>

            <!-- Section Tutor -->
            <section class=\"border border-1 border-primary-subtle rounded-2 p-3\">
                <fieldset id=\"mentorAction\">
                    <legend class=\"bg-primary-subtle text-primary py-2 px-3 rounded-1 text-uppercase fw-bold\">Tuteur</legend>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "mentorComment", [], "any", false, false, false, 39), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 42
        yield "
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "mentorValidatedAt", [], "any", false, false, false, 45), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 48
        yield "
                        </div>
                    </div>
                </fieldset>
            </section>

        </div>
    </div>

    <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-sm btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
        ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "submit", [], "any", false, false, false, 59), 'widget');
        yield "
    </div>

    ";
        // line 62
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), 'form_end');
        yield "
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
        return "components/ActionForm.html.twig";
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
        return array (  118 => 62,  112 => 59,  99 => 48,  97 => 45,  92 => 42,  90 => 39,  76 => 27,  74 => 24,  69 => 21,  67 => 18,  55 => 8,  53 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div {{ attributes }}>
    {{ form_start(form, {
        attr: {
            'novalidate': false,
            'data-action': 'live#action:prevent',
            'data-live-action-param': 'save',
        }
    }) }}
    <div class=\"modal-body\">
        <div class=\"container-fluid\">

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Agents</legend>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            {{ form_row(form.agentComment, {
                                'label_attr': { 'class': 'form-label' },
                                'attr': { 'class': 'form-control' }
                            }) }}
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            {{ form_row(form.agentValidatedAt, {
                                'label_attr': { 'class': 'form-label' },
                                'attr': { 'class': 'form-control' }
                            }) }}
                        </div>
                    </div>
                </fieldset>
            </section>

            <!-- Section Tutor -->
            <section class=\"border border-1 border-primary-subtle rounded-2 p-3\">
                <fieldset id=\"mentorAction\">
                    <legend class=\"bg-primary-subtle text-primary py-2 px-3 rounded-1 text-uppercase fw-bold\">Tuteur</legend>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            {{ form_row(form.mentorComment, {
                                'label_attr': { 'class': 'form-label' },
                                'attr': { 'class': 'form-control' }
                            }) }}
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            {{ form_row(form.mentorValidatedAt, {
                                'label_attr': { 'class': 'form-label' },
                                'attr': { 'class': 'form-control' }
                            }) }}
                        </div>
                    </div>
                </fieldset>
            </section>

        </div>
    </div>

    <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-sm btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
        {{ form_widget(form.submit) }}
    </div>

    {{ form_end(form) }}
</div>
", "components/ActionForm.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/components/ActionForm.html.twig");
    }
}
