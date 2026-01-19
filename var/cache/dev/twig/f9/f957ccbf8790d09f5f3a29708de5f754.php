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

/* modals/_create_action.html.twig */
class __TwigTemplate_9ee899c950862cda2ee9c1ccc79182a6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modals/_create_action.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "modals/_create_action.html.twig"));

        // line 1
        yield "<div class=\"modal fade\" id=\"modalCreateAction";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 1, $this->source); })()), "id", [], "any", false, false, false, 1), "html", null, true);
        yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content shadow-lg\">
            <div class=\"modal-header\">
                <!-- Callout Primary -->
                <div class=\"callout callout-primary\">
                    <div class=\"d-flex align-items-center\">
                        <div class=\"icon\">
                            <i class=\"bi bi-info-circle\"></i>
                        </div>
                        <div>
                            <span class=\"module-title\"><strong>Titre du module:</strong> ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12), "html", null, true);
        yield "</span> <br>
                            <span class=\"module-description\"><strong>Description: </strong>";
        // line 13
        yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 13, $this->source); })()), "description", [], "any", false, false, false, 13);
        yield "</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"modal-body\">
                ";
        // line 19
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ActionForm", ["module" => (isset($context["module"]) || array_key_exists("module", $context) ? $context["module"] : (function () { throw new RuntimeError('Variable "module" does not exist.', 19, $this->source); })()), "actionId" => (isset($context["actionId"]) || array_key_exists("actionId", $context) ? $context["actionId"] : (function () { throw new RuntimeError('Variable "actionId" does not exist.', 19, $this->source); })())]);
        yield "
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
        return "modals/_create_action.html.twig";
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
        return array (  76 => 19,  67 => 13,  63 => 12,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"modal fade\" id=\"modalCreateAction{{module.id}}\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-xl modal-dialog-centered\">
        <div class=\"modal-content shadow-lg\">
            <div class=\"modal-header\">
                <!-- Callout Primary -->
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
            </div>
            <div class=\"modal-body\">
                {{ component('ActionForm', { module: module, actionId: actionId }) }}
            </div>
        </div>
    </div>
</div>
", "modals/_create_action.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/modals/_create_action.html.twig");
    }
}
