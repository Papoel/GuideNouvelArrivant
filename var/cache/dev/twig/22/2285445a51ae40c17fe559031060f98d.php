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

/* action/_formUserAction.html.twig */
class __TwigTemplate_4ec34d4eb0a8e1f835482048ee686648 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "action/_formUserAction.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "action/_formUserAction.html.twig"));

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

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Agents</legend>
                    <div class=\"row\">
                        <div class=\"col-12 mb-3\">
                            ";
        // line 23
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "agentComment", [], "any", false, false, false, 23), 'row', ["label_attr" => ["class" => "form-label"], "attr" => ["class" => "form-control"]]);
        // line 26
        yield "
                        </div>
                    </div>
                </fieldset>
            </section>

        </div>
    </main>

    <div class=\"modal-footer\">
        <button type=\"submit\" class=\"btn btn-primary\">Sauvegarder</button>
        
        ";
        // line 38
        if (( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38)) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "agentComment", [], "any", false, false, false, 38), "vars", [], "any", false, false, false, 38), "value", [], "any", false, false, false, 38)))) {
            // line 39
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("action_clear", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 39, $this->source); })()), "id", [], "any", false, false, false, 39), "nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "user", [], "any", false, false, false, 39), "nni", [], "any", false, false, false, 39)]), "html", null, true);
            yield "\" class=\"btn btn-outline-danger ms-2\">
                <i class=\"bi bi-trash\"></i> Supprimer le commentaire
            </a>
        ";
        }
        // line 43
        yield "    </div>


";
        // line 46
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), 'form_end');
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
        return "action/_formUserAction.html.twig";
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
        return array (  113 => 46,  108 => 43,  100 => 39,  98 => 38,  84 => 26,  82 => 23,  68 => 12,  64 => 11,  56 => 5,  54 => 4,  48 => 1,);
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

            <!-- Section Agents -->
            <section class=\"border border-1 border-success-subtle rounded-2 p-3 mb-3\">
                <fieldset id=\"agentAction\">
                    <legend class=\"bg-success-subtle text-success py-2 px-3 rounded-1 text-uppercase fw-bold\">Agents</legend>
                    <div class=\"row\">
                        <div class=\"col-12 mb-3\">
                            {{ form_row(form.agentComment, {
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
        <button type=\"submit\" class=\"btn btn-primary\">Sauvegarder</button>
        
        {% if action.id is not null and form.agentComment.vars.value is not empty %}
            <a href=\"{{ path('action_clear', {'id': action.id, 'nni': app.user.nni}) }}\" class=\"btn btn-outline-danger ms-2\">
                <i class=\"bi bi-trash\"></i> Supprimer le commentaire
            </a>
        {% endif %}
    </div>


{{ form_end(form) }}
", "action/_formUserAction.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/action/_formUserAction.html.twig");
    }
}
