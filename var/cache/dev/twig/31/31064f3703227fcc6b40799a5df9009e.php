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

/* action/_formMentorAction.html.twig */
class __TwigTemplate_cef75a91532ef5e31a0244f6aa13168e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "action/_formMentorAction.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "action/_formMentorAction.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        yield "
    <main>
        <div class=\"container-fluid\">
            ";
        // line 4
        $context["module"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 4, $this->source); })()), "module", [], "any", false, false, false, 4);
        // line 5
        yield "            <div class=\"callout callout-primary\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"icon\">
                        <i class=\"bi bi-info-circle\"></i>
                    </div>
                    <div>
                        <span class=\"module-title\"><strong>Titre du module:</strong> ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 11, $this->source); })()), "title", [], "any", false, false, false, 11), "html", null, true);
        yield "</span> <br>
                        <span class=\"module-description\"><strong>Description: </strong>";
        // line 12
        yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 12, $this->source); })()), "description", [], "any", false, false, false, 12);
        yield "</span>
                    </div>
                </div>
            </div>

            <div class=\"callout callout-warning\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"icon\">
                        <i class=\"bi bi-info-circle\"></i>
                    </div>
                    <div>
                        <span class=\"module-title\"><strong>Commentaire de l'agent : </strong> ";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 23, $this->source); })()), "agentComment", [], "any", false, false, false, 23), "html", null, true);
        yield " </span> <br>
                        <span class=\"module-dateCompletion\"><strong>Fait le : </strong>";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 24, $this->source); })()), "agentValidatedAt", [], "any", false, false, false, 24), "d/m/Y"), "html", null, true);
        yield "</span>
                    </div>
                </div>
            </div>

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Tuteur</legend>
                    <div class=\"row\">
                        <div class=\"col-12 mb-3\">
                            ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "mentorComment", [], "any", false, false, false, 35), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 38
        yield "
                        </div>
                    </div>
                </fieldset>
            </section>

        </div>
    </main>

    <div class=\"modal-footer\">
        ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "submit", [], "any", false, false, false, 48), 'widget');
        yield "
    </div>

";
        // line 51
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), 'form_end');
        yield "
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
        return "action/_formMentorAction.html.twig";
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
        return array (  120 => 51,  114 => 48,  102 => 38,  100 => 35,  86 => 24,  82 => 23,  68 => 12,  64 => 11,  56 => 5,  54 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form) }}
    <main>
        <div class=\"container-fluid\">
            {% set module = action.module %}
            <div class=\"callout callout-primary\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"icon\">
                        <i class=\"bi bi-info-circle\"></i>
                    </div>
                    <div>
                        <span class=\"module-title\"><strong>Titre du module:</strong> {{ module.title }}</span> <br>
                        <span class=\"module-description\"><strong>Description: </strong>{{ module.description|raw }}</span>
                    </div>
                </div>
            </div>

            <div class=\"callout callout-warning\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"icon\">
                        <i class=\"bi bi-info-circle\"></i>
                    </div>
                    <div>
                        <span class=\"module-title\"><strong>Commentaire de l'agent : </strong> {{ action.agentComment}} </span> <br>
                        <span class=\"module-dateCompletion\"><strong>Fait le : </strong>{{ action.agentValidatedAt|date('d/m/Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Tuteur</legend>
                    <div class=\"row\">
                        <div class=\"col-12 mb-3\">
                            {{ form_row(form.mentorComment, {
                                'label_attr': { 'class': 'form-label' },
                                'attr': { 'class': 'form-control' }
                            }) }}
                        </div>
                    </div>
                </fieldset>
            </section>

        </div>
    </main>

    <div class=\"modal-footer\">
        {{ form_widget(form.submit) }}
    </div>

{{ form_end(form) }}
", "action/_formMentorAction.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/action/_formMentorAction.html.twig");
    }
}
