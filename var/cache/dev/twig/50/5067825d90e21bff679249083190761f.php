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

/* @FlasherSymfony/profiler/flasher.html.twig */
class __TwigTemplate_9e794b1f79b6f65a3c0753142311d0dd extends Template
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
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
            'head' => [$this, 'block_head'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/profiler/flasher.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@FlasherSymfony/profiler/flasher.html.twig"));

        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 22
        yield "    ";
        $macros["͜macros"] = $this;
        // line 23
        yield "
    ";
        // line 24
        $context["displayedEnvelopes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 24, $this->source); })()), "displayedEnvelopes", [], "any", false, false, false, 24);
        // line 25
        yield "    ";
        $context["dispatchedEnvelopes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 25, $this->source); })()), "dispatchedEnvelopes", [], "any", false, false, false, 25);
        // line 26
        yield "
    ";
        // line 27
        $context["totalDispatched"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["dispatchedEnvelopes"]) || array_key_exists("dispatchedEnvelopes", $context) ? $context["dispatchedEnvelopes"] : (function () { throw new RuntimeError('Variable "dispatchedEnvelopes" does not exist.', 27, $this->source); })()));
        // line 28
        yield "    ";
        $context["totalDisplayed"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["displayedEnvelopes"]) || array_key_exists("displayedEnvelopes", $context) ? $context["displayedEnvelopes"] : (function () { throw new RuntimeError('Variable "displayedEnvelopes" does not exist.', 28, $this->source); })()));
        // line 29
        yield "
    ";
        // line 30
        if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 30, $this->source); })()) > 0)) {
            // line 31
            yield "        ";
            // line 32
            yield "        ";
            $context["typeCounts"] = [];
            // line 33
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["displayedEnvelopes"]) || array_key_exists("displayedEnvelopes", $context) ? $context["displayedEnvelopes"] : (function () { throw new RuntimeError('Variable "displayedEnvelopes" does not exist.', 33, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["envelope"]) {
                // line 34
                yield "            ";
                $context["type"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "type", [], "any", true, true, false, 34)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["envelope"], "type", [], "any", false, false, false, 34), "info")) : ("info")));
                // line 35
                yield "            ";
                $context["typeCounts"] = Twig\Extension\CoreExtension::merge((isset($context["typeCounts"]) || array_key_exists("typeCounts", $context) ? $context["typeCounts"] : (function () { throw new RuntimeError('Variable "typeCounts" does not exist.', 35, $this->source); })()), [ (string)(isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 35, $this->source); })()) => (((CoreExtension::getAttribute($this->env, $this->source, ($context["typeCounts"] ?? null), (isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 35, $this->source); })()), [], "array", true, true, false, 35)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["typeCounts"]) || array_key_exists("typeCounts", $context) ? $context["typeCounts"] : (function () { throw new RuntimeError('Variable "typeCounts" does not exist.', 35, $this->source); })()), (isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 35, $this->source); })()), [], "array", false, false, false, 35), 0)) : (0)) + 1)]);
                // line 36
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['envelope'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "
        ";
            // line 38
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 39
                yield "            ";
                yield $macros["͜macros"]->getTemplateForMacro("macro_logo", $context, 39, $this->getSourceContext())->macro_logo(...[]);
                yield "

            ";
                // line 41
                yield Twig\Extension\CoreExtension::source($this->env, "@FlasherSymfony/profiler/flasher.svg");
                yield "
            <span class=\"sf-toolbar-value\">
                ";
                // line 43
                if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 43, $this->source); })()) == (isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 43, $this->source); })()))) {
                    // line 44
                    yield "                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 44, $this->source); })()), "html", null, true);
                    yield "
                ";
                } else {
                    // line 46
                    yield "                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 46, $this->source); })()), "html", null, true);
                    yield "/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 46, $this->source); })()), "html", null, true);
                    yield "
                ";
                }
                // line 48
                yield "            </span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 50
            yield "
        ";
            // line 51
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 52
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Notifications Displayed</b>
                <span class=\"sf-toolbar-status\">";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 54, $this->source); })()), "html", null, true);
                yield "</span>
            </div>

            ";
                // line 57
                if (((isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 57, $this->source); })()) != (isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 57, $this->source); })()))) {
                    // line 58
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Notifications Dispatched:</b>
                    <span class=\"sf-toolbar-status\">";
                    // line 60
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 60, $this->source); })()), "html", null, true);
                    yield "</span>
                </div>
            ";
                }
                // line 63
                yield "
            ";
                // line 64
                if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 64, $this->source); })()) > (isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 64, $this->source); })()))) {
                    // line 65
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <span>Note: Some notifications are from previous requests.</span>
                </div>
            ";
                }
                // line 69
                yield "
            ";
                // line 70
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["typeCounts"]) || array_key_exists("typeCounts", $context) ? $context["typeCounts"] : (function () { throw new RuntimeError('Variable "typeCounts" does not exist.', 70, $this->source); })()));
                foreach ($context['_seq'] as $context["type"] => $context["count"]) {
                    // line 71
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>";
                    // line 72
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["type"]), "html", null, true);
                    yield "</b>
                    <span class=\"sf-toolbar-status\">";
                    // line 73
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["count"], "html", null, true);
                    yield "</span>
                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['type'], $context['count'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                yield "        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 77
            yield "
        ";
            // line 78
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => (isset($context["profiler_url"]) || array_key_exists("profiler_url", $context) ? $context["profiler_url"] : (function () { throw new RuntimeError('Variable "profiler_url" does not exist.', 78, $this->source); })())]);
            yield "
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 82
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 83
        yield "    ";
        $macros["͜macros"] = $this;
        // line 84
        yield "
    ";
        // line 85
        $context["totalDisplayed"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 85, $this->source); })()), "displayedEnvelopes", [], "any", false, false, false, 85));
        // line 86
        yield "    ";
        $context["totalDispatched"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 86, $this->source); })()), "dispatchedEnvelopes", [], "any", false, false, false, 86));
        // line 87
        yield "
    <span class=\"label";
        // line 88
        if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 88, $this->source); })()) == 0)) {
            yield " disabled";
        }
        yield "\">
        <span class=\"icon\">";
        // line 89
        yield Twig\Extension\CoreExtension::source($this->env, "@FlasherSymfony/profiler/flasher.svg");
        yield "</span>
        ";
        // line 90
        yield $macros["͜macros"]->getTemplateForMacro("macro_logo", $context, 90, $this->getSourceContext())->macro_logo(...[]);
        yield "
        ";
        // line 91
        if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 91, $this->source); })()) > 0)) {
            // line 92
            yield "            <span class=\"count\">
                ";
            // line 93
            if (((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 93, $this->source); })()) == (isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 93, $this->source); })()))) {
                // line 94
                yield "                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 94, $this->source); })()), "html", null, true);
                yield "</span>
                ";
            } else {
                // line 96
                yield "                    <span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDisplayed"]) || array_key_exists("totalDisplayed", $context) ? $context["totalDisplayed"] : (function () { throw new RuntimeError('Variable "totalDisplayed" does not exist.', 96, $this->source); })()), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalDispatched"]) || array_key_exists("totalDispatched", $context) ? $context["totalDispatched"] : (function () { throw new RuntimeError('Variable "totalDispatched" does not exist.', 96, $this->source); })()), "html", null, true);
                yield "</span>
                ";
            }
            // line 98
            yield "            </span>
        ";
        }
        // line 100
        yield "    </span>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 103
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 104
        yield "    ";
        $context["displayedEnvelopes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 104, $this->source); })()), "displayedEnvelopes", [], "any", false, false, false, 104);
        // line 105
        yield "    ";
        $context["dispatchedEnvelopes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 105, $this->source); })()), "dispatchedEnvelopes", [], "any", false, false, false, 105);
        // line 106
        yield "    ";
        $context["totalNotifications"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["dispatchedEnvelopes"]) || array_key_exists("dispatchedEnvelopes", $context) ? $context["dispatchedEnvelopes"] : (function () { throw new RuntimeError('Variable "dispatchedEnvelopes" does not exist.', 106, $this->source); })()));
        // line 107
        yield "    ";
        $context["displayedNotifications"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["displayedEnvelopes"]) || array_key_exists("displayedEnvelopes", $context) ? $context["displayedEnvelopes"] : (function () { throw new RuntimeError('Variable "displayedEnvelopes" does not exist.', 107, $this->source); })()));
        // line 108
        yield "    ";
        $context["config"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 108, $this->source); })()), "config", [], "any", false, false, false, 108);
        // line 109
        yield "    ";
        $context["versions"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 109, $this->source); })()), "versions", [], "any", false, false, false, 109);
        // line 110
        yield "
    <h2>PHPFlasher Notifications</h2>

    ";
        // line 113
        if (((isset($context["totalNotifications"]) || array_key_exists("totalNotifications", $context) ? $context["totalNotifications"] : (function () { throw new RuntimeError('Variable "totalNotifications" does not exist.', 113, $this->source); })()) == 0)) {
            // line 114
            yield "        <div class=\"empty\">
            <p>No notifications have been dispatched.</p>
        </div>
    ";
        } else {
            // line 118
            yield "        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Notifications <span class=\"badge\">";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayedNotifications"]) || array_key_exists("displayedNotifications", $context) ? $context["displayedNotifications"] : (function () { throw new RuntimeError('Variable "displayedNotifications" does not exist.', 120, $this->source); })()), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalNotifications"]) || array_key_exists("totalNotifications", $context) ? $context["totalNotifications"] : (function () { throw new RuntimeError('Variable "totalNotifications" does not exist.', 120, $this->source); })()), "html", null, true);
            yield "</span></h3>
                <div class=\"tab-content\">
                    ";
            // line 122
            if (((isset($context["displayedNotifications"]) || array_key_exists("displayedNotifications", $context) ? $context["displayedNotifications"] : (function () { throw new RuntimeError('Variable "displayedNotifications" does not exist.', 122, $this->source); })()) > (isset($context["totalNotifications"]) || array_key_exists("totalNotifications", $context) ? $context["totalNotifications"] : (function () { throw new RuntimeError('Variable "totalNotifications" does not exist.', 122, $this->source); })()))) {
                // line 123
                yield "                        <div class=\"sf-callout\">
                            <p>The number of displayed notifications is greater than the number of dispatched notifications. This may happen if notifications are stored in the session from previous requests.</p>
                        </div>
                    ";
            }
            // line 127
            yield "
                    <h4>Displayed Notifications</h4>
                    ";
            // line 129
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@FlasherSymfony/profiler/_notifications_table.html.twig", ["envelopes" => (isset($context["displayedEnvelopes"]) || array_key_exists("displayedEnvelopes", $context) ? $context["displayedEnvelopes"] : (function () { throw new RuntimeError('Variable "displayedEnvelopes" does not exist.', 129, $this->source); })())]);
            yield "

                    ";
            // line 131
            if (((isset($context["totalNotifications"]) || array_key_exists("totalNotifications", $context) ? $context["totalNotifications"] : (function () { throw new RuntimeError('Variable "totalNotifications" does not exist.', 131, $this->source); })()) > (isset($context["displayedNotifications"]) || array_key_exists("displayedNotifications", $context) ? $context["displayedNotifications"] : (function () { throw new RuntimeError('Variable "displayedNotifications" does not exist.', 131, $this->source); })()))) {
                // line 132
                yield "                        <h4>Remaining Notifications</h4>
                        ";
                // line 133
                $context["remainingNotifications"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["dispatchedEnvelopes"]) || array_key_exists("dispatchedEnvelopes", $context) ? $context["dispatchedEnvelopes"] : (function () { throw new RuntimeError('Variable "dispatchedEnvelopes" does not exist.', 133, $this->source); })()), (isset($context["displayedNotifications"]) || array_key_exists("displayedNotifications", $context) ? $context["displayedNotifications"] : (function () { throw new RuntimeError('Variable "displayedNotifications" does not exist.', 133, $this->source); })()));
                // line 134
                yield "                        ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@FlasherSymfony/profiler/_notifications_table.html.twig", ["envelopes" => (isset($context["remainingNotifications"]) || array_key_exists("remainingNotifications", $context) ? $context["remainingNotifications"] : (function () { throw new RuntimeError('Variable "remainingNotifications" does not exist.', 134, $this->source); })())]);
                yield "
                    ";
            }
            // line 136
            yield "                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Debug</h3>
                <div class=\"tab-content\">
                    <h4>Version Information</h4>
                    <ul>
                        <li><strong>PHPFlasher Version:</strong> ";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["versions"]) || array_key_exists("versions", $context) ? $context["versions"] : (function () { throw new RuntimeError('Variable "versions" does not exist.', 144, $this->source); })()), "php_flasher", [], "any", false, false, false, 144), "html", null, true);
            yield "</li>
                        <li><strong>PHP Version:</strong> ";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["versions"]) || array_key_exists("versions", $context) ? $context["versions"] : (function () { throw new RuntimeError('Variable "versions" does not exist.', 145, $this->source); })()), "php", [], "any", false, false, false, 145), "html", null, true);
            yield "</li>
                        <li><strong>Symfony Version:</strong> ";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["versions"]) || array_key_exists("versions", $context) ? $context["versions"] : (function () { throw new RuntimeError('Variable "versions" does not exist.', 146, $this->source); })()), "symfony", [], "any", false, false, false, 146), "html", null, true);
            yield "</li>
                    </ul>

                    <h4>Configuration</h4>
                    ";
            // line 150
            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 150, $this->source); })()), 10);
            yield "
                </div>
            </div>
        </div>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 157
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        // line 158
        yield "    ";
        yield from $this->yieldParentBlock("head", $context, $blocks);
        yield "
    <style>
        .sf-tabs .tab-content {
            background-color: transparent;
        }
        .sf-tabs .tab-title {
            cursor: pointer;
        }
        .notification-type-success { color: #10b981; }
        .notification-type-error { color: #ef4444; }
        .notification-type-info { color: #3b82f6; }
        .notification-type-warning { color: #f59e0b; }
        table.notifications-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.notifications-table th, table.notifications-table td {
            padding: 8px;
            vertical-align: top;
        }
        .metadata {
            font-size: 0.9em;
            color: #555;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
    public function macro_logo(...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "logo"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "logo"));

            // line 4
            yield "    <strong style=\"line-height: 1; display: inline-block; font-size: 0;\">
        <span style=\"
            color: #FFFFFF;
            background-color: #312E81;
            padding: 2px 0 2px 4px;
            display: inline-block;
            font-size: 16px;
        \">PHP</span><span style=\"
            color: #FFFFFF;
            background-color: #6366F1;
            padding: 2px 4px 2px 0;
            display: inline-block;
            font-size: 16px;
        \">Flasher</span>
    </strong>
";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@FlasherSymfony/profiler/flasher.html.twig";
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
        return array (  518 => 4,  501 => 3,  462 => 158,  449 => 157,  432 => 150,  425 => 146,  421 => 145,  417 => 144,  407 => 136,  401 => 134,  399 => 133,  396 => 132,  394 => 131,  389 => 129,  385 => 127,  379 => 123,  377 => 122,  370 => 120,  366 => 118,  360 => 114,  358 => 113,  353 => 110,  350 => 109,  347 => 108,  344 => 107,  341 => 106,  338 => 105,  335 => 104,  322 => 103,  310 => 100,  306 => 98,  298 => 96,  292 => 94,  290 => 93,  287 => 92,  285 => 91,  281 => 90,  277 => 89,  271 => 88,  268 => 87,  265 => 86,  263 => 85,  260 => 84,  257 => 83,  244 => 82,  230 => 78,  227 => 77,  223 => 76,  214 => 73,  210 => 72,  207 => 71,  203 => 70,  200 => 69,  194 => 65,  192 => 64,  189 => 63,  183 => 60,  179 => 58,  177 => 57,  171 => 54,  167 => 52,  165 => 51,  162 => 50,  157 => 48,  149 => 46,  143 => 44,  141 => 43,  136 => 41,  130 => 39,  128 => 38,  125 => 37,  119 => 36,  116 => 35,  113 => 34,  108 => 33,  105 => 32,  103 => 31,  101 => 30,  98 => 29,  95 => 28,  93 => 27,  90 => 26,  87 => 25,  85 => 24,  82 => 23,  79 => 22,  66 => 21,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% macro logo() %}
    <strong style=\"line-height: 1; display: inline-block; font-size: 0;\">
        <span style=\"
            color: #FFFFFF;
            background-color: #312E81;
            padding: 2px 0 2px 4px;
            display: inline-block;
            font-size: 16px;
        \">PHP</span><span style=\"
            color: #FFFFFF;
            background-color: #6366F1;
            padding: 2px 4px 2px 0;
            display: inline-block;
            font-size: 16px;
        \">Flasher</span>
    </strong>
{% endmacro %}

{% block toolbar %}
    {% import _self as macros %}

    {% set displayedEnvelopes = collector.displayedEnvelopes %}
    {% set dispatchedEnvelopes = collector.dispatchedEnvelopes %}

    {% set totalDispatched = dispatchedEnvelopes|length %}
    {% set totalDisplayed = displayedEnvelopes|length %}

    {% if totalDisplayed > 0 %}
        {# Initialize type counts #}
        {% set typeCounts = {} %}
        {% for envelope in displayedEnvelopes %}
            {% set type = envelope.type|default('info')|lower %}
            {% set typeCounts = typeCounts | merge({ (type): (typeCounts[type]|default(0) + 1) }) %}
        {% endfor %}

        {% set icon %}
            {{ macros.logo() }}

            {{ source('@FlasherSymfony/profiler/flasher.svg') }}
            <span class=\"sf-toolbar-value\">
                {% if totalDisplayed == totalDispatched %}
                    {{ totalDisplayed }}
                {% else %}
                    {{ totalDisplayed }}/{{ totalDispatched }}
                {% endif %}
            </span>
        {% endset %}

        {% set text %}
            <div class=\"sf-toolbar-info-piece\">
                <b>Notifications Displayed</b>
                <span class=\"sf-toolbar-status\">{{ totalDisplayed }}</span>
            </div>

            {% if totalDispatched != totalDisplayed %}
                <div class=\"sf-toolbar-info-piece\">
                    <b>Notifications Dispatched:</b>
                    <span class=\"sf-toolbar-status\">{{ totalDispatched }}</span>
                </div>
            {% endif %}

            {% if totalDisplayed > totalDispatched %}
                <div class=\"sf-toolbar-info-piece\">
                    <span>Note: Some notifications are from previous requests.</span>
                </div>
            {% endif %}

            {% for type, count in typeCounts %}
                <div class=\"sf-toolbar-info-piece\">
                    <b>{{ type|capitalize }}</b>
                    <span class=\"sf-toolbar-status\">{{ count }}</span>
                </div>
            {% endfor %}
        {% endset %}

        {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: profiler_url }) }}
    {% endif %}
{% endblock %}

{% block menu %}
    {% import _self as macros %}

    {% set totalDisplayed = collector.displayedEnvelopes|length %}
    {% set totalDispatched = collector.dispatchedEnvelopes|length %}

    <span class=\"label{% if totalDisplayed == 0 %} disabled{% endif %}\">
        <span class=\"icon\">{{ source('@FlasherSymfony/profiler/flasher.svg') }}</span>
        {{ macros.logo() }}
        {% if totalDisplayed > 0 %}
            <span class=\"count\">
                {% if totalDisplayed == totalDispatched %}
                    <span>{{ totalDisplayed }}</span>
                {% else %}
                    <span>{{ totalDisplayed }}/{{ totalDispatched }}</span>
                {% endif %}
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    {% set displayedEnvelopes = collector.displayedEnvelopes %}
    {% set dispatchedEnvelopes = collector.dispatchedEnvelopes %}
    {% set totalNotifications = dispatchedEnvelopes|length %}
    {% set displayedNotifications = displayedEnvelopes|length %}
    {% set config = collector.config %}
    {% set versions = collector.versions %}

    <h2>PHPFlasher Notifications</h2>

    {% if totalNotifications == 0 %}
        <div class=\"empty\">
            <p>No notifications have been dispatched.</p>
        </div>
    {% else %}
        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Notifications <span class=\"badge\">{{ displayedNotifications }}/{{ totalNotifications }}</span></h3>
                <div class=\"tab-content\">
                    {% if displayedNotifications > totalNotifications %}
                        <div class=\"sf-callout\">
                            <p>The number of displayed notifications is greater than the number of dispatched notifications. This may happen if notifications are stored in the session from previous requests.</p>
                        </div>
                    {% endif %}

                    <h4>Displayed Notifications</h4>
                    {{ include('@FlasherSymfony/profiler/_notifications_table.html.twig', { 'envelopes': displayedEnvelopes }) }}

                    {% if totalNotifications > displayedNotifications %}
                        <h4>Remaining Notifications</h4>
                        {% set remainingNotifications = dispatchedEnvelopes|slice(displayedNotifications) %}
                        {{ include('@FlasherSymfony/profiler/_notifications_table.html.twig', { 'envelopes': remainingNotifications }) }}
                    {% endif %}
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Debug</h3>
                <div class=\"tab-content\">
                    <h4>Version Information</h4>
                    <ul>
                        <li><strong>PHPFlasher Version:</strong> {{ versions.php_flasher }}</li>
                        <li><strong>PHP Version:</strong> {{ versions.php }}</li>
                        <li><strong>Symfony Version:</strong> {{ versions.symfony }}</li>
                    </ul>

                    <h4>Configuration</h4>
                    {{ profiler_dump(config, maxDepth=10) }}
                </div>
            </div>
        </div>
    {% endif %}
{% endblock %}

{% block head %}
    {{ parent() }}
    <style>
        .sf-tabs .tab-content {
            background-color: transparent;
        }
        .sf-tabs .tab-title {
            cursor: pointer;
        }
        .notification-type-success { color: #10b981; }
        .notification-type-error { color: #ef4444; }
        .notification-type-info { color: #3b82f6; }
        .notification-type-warning { color: #f59e0b; }
        table.notifications-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.notifications-table th, table.notifications-table td {
            padding: 8px;
            vertical-align: top;
        }
        .metadata {
            font-size: 0.9em;
            color: #555;
        }
    </style>
{% endblock %}
", "@FlasherSymfony/profiler/flasher.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/vendor/php-flasher/flasher-symfony/Resources/views/profiler/flasher.html.twig");
    }
}
