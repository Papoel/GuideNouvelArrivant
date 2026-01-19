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

/* @FlasherSymfony/profiler/_notifications_table.html.twig */
class __TwigTemplate_0aafa4230344131316822a2c22284c56 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/profiler/_notifications_table.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/profiler/_notifications_table.html.twig"));

        // line 1
        yield "<table class=\"notifications-table\">
    <thead>
    <tr>
        <th>#</th>
        <th>Plugin</th>
        <th>Type</th>
        <th>Title</th>
        <th>Message</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["envelopes"]) || array_key_exists("envelopes", $context) ? $context["envelopes"] : (function () { throw new RuntimeError('Variable "envelopes" does not exist.', 13, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["envelope"]) {
            // line 14
            yield "            <tr>
                <td>";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 15), "html", null, true);
            yield "</td>
                <td>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "metadata", [], "any", false, false, false, 16), "plugin", [], "any", false, false, false, 16), "html", null, true);
            yield "</td>
                <td class=\"notification-type-";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "type", [], "any", false, false, false, 17)), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "type", [], "any", false, false, false, 17), "html", null, true);
            yield "</td>
                <td>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "title", [], "any", false, false, false, 18), "html", null, true);
            yield "</td>
                <td>";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "message", [], "any", false, false, false, 19), "html", null, true);
            yield "</td>
                <td>
                    ";
            // line 21
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "options", [], "any", false, false, false, 21))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 22
                yield "                        ";
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "options", [], "any", false, false, false, 22));
                yield "
                    ";
            } else {
                // line 24
                yield "                        <em>No Options</em>
                    ";
            }
            // line 26
            yield "                </td>
            </tr>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['envelope'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "    </tbody>
</table>
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
        return "@FlasherSymfony/profiler/_notifications_table.html.twig";
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
        return array (  133 => 29,  117 => 26,  113 => 24,  107 => 22,  105 => 21,  100 => 19,  96 => 18,  90 => 17,  86 => 16,  82 => 15,  79 => 14,  62 => 13,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<table class=\"notifications-table\">
    <thead>
    <tr>
        <th>#</th>
        <th>Plugin</th>
        <th>Type</th>
        <th>Title</th>
        <th>Message</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
        {% for envelope in envelopes %}
            <tr>
                <td>{{ loop.index }}</td>
                <td>{{ envelope.metadata.plugin }}</td>
                <td class=\"notification-type-{{ envelope.type|lower }}\">{{ envelope.type }}</td>
                <td>{{ envelope.title }}</td>
                <td>{{ envelope.message }}</td>
                <td>
                    {% if envelope.options is not empty %}
                        {{ profiler_dump(envelope.options) }}
                    {% else %}
                        <em>No Options</em>
                    {% endif %}
                </td>
            </tr>
        {% endfor %}
    </tbody>
</table>
", "@FlasherSymfony/profiler/_notifications_table.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/php-flasher/flasher-symfony/Resources/views/profiler/_notifications_table.html.twig");
    }
}
