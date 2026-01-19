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

/* admin/form_theme.html.twig */
class __TwigTemplate_069d3c9e96a5e2435bc85deba178265b extends Template
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
            'ea_crud_widget_panels' => [$this, 'block_ea_crud_widget_panels'],
            'item_actions' => [$this, 'block_item_actions'],
            'form_row' => [$this, 'block_form_row'],
            'form_label' => [$this, 'block_form_label'],
            'form_widget_simple' => [$this, 'block_form_widget_simple'],
            'button_row' => [$this, 'block_button_row'],
            'button_widget' => [$this, 'block_button_widget'],
            'head_stylesheets' => [$this, 'block_head_stylesheets'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "@EasyAdmin/crud/form_theme.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/form_theme.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/form_theme.html.twig"));

        $this->parent = $this->load("@EasyAdmin/crud/form_theme.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_crud_widget_panels(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_panels"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_panels"));

        // line 6
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea_crud_form"]) || array_key_exists("ea_crud_form", $context) ? $context["ea_crud_form"] : (function () { throw new RuntimeError('Variable "ea_crud_form" does not exist.', 6, $this->source); })()), "form_panels", [], "any", false, false, false, 6), function ($__panel_config__) use ($context, $macros) { $context["panel_config"] = $__panel_config__; return ( !CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "form_tab", [], "any", false, false, false, 6) || (CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "form_tab", [], "any", false, false, false, 6) == (isset($context["tab_name"]) || array_key_exists("tab_name", $context) ? $context["tab_name"] : (function () { throw new RuntimeError('Variable "tab_name" does not exist.', 6, $this->source); })()))); }));
        foreach ($context['_seq'] as $context["panel_name"] => $context["panel_config"]) {
            // line 7
            yield "        ";
            $context["panel_has_header"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "label", [], "any", true, true, false, 7)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "label", [], "any", false, false, false, 7), false)) : (false)) || ((CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "icon", [], "any", true, true, false, 7)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "icon", [], "any", false, false, false, 7), false)) : (false)));
            // line 8
            yield "        ";
            $context["panel_has_footer"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "help", [], "any", true, true, false, 8)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "help", [], "any", false, false, false, 8), false)) : (false));
            // line 9
            yield "        ";
            $context["panel_collapsible"] = CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "collapsible", [], "any", false, false, false, 9);
            // line 10
            yield "        ";
            $context["panel_collapsed"] = CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "collapsed", [], "any", false, false, false, 10);
            // line 11
            yield "
        <div class=\"";
            // line 12
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "css_class", [], "any", true, true, false, 12) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "css_class", [], "any", false, false, false, 12)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "css_class", [], "any", false, false, false, 12), "html", null, true)) : (""));
            yield " ";
            yield (((($tmp = (isset($context["panel_has_header"]) || array_key_exists("panel_has_header", $context) ? $context["panel_has_header"] : (function () { throw new RuntimeError('Variable "panel_has_header" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("field-panel") : (""));
            yield " ";
            yield (((($tmp = (isset($context["panel_collapsible"]) || array_key_exists("panel_collapsible", $context) ? $context["panel_collapsible"] : (function () { throw new RuntimeError('Variable "panel_collapsible" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("collapsible") : (""));
            yield " ";
            yield (((($tmp = (isset($context["panel_collapsed"]) || array_key_exists("panel_collapsed", $context) ? $context["panel_collapsed"] : (function () { throw new RuntimeError('Variable "panel_collapsed" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("collapsed") : (""));
            yield "\" ";
            yield (((($tmp = (isset($context["panel_collapsed"]) || array_key_exists("panel_collapsed", $context) ? $context["panel_collapsed"] : (function () { throw new RuntimeError('Variable "panel_collapsed" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("data-collapsed=\"true\"") : (""));
            yield ">
            ";
            // line 13
            if ((($tmp = (isset($context["panel_has_header"]) || array_key_exists("panel_has_header", $context) ? $context["panel_has_header"] : (function () { throw new RuntimeError('Variable "panel_has_header" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 14
                yield "                <div class=\"content-panel-header\">
                    <div class=\"content-panel-title\">
                        ";
                // line 16
                if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "icon", [], "any", true, true, false, 16)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "icon", [], "any", false, false, false, 16), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 17
                    yield "                            <i class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "icon", [], "any", false, false, false, 17), "html", null, true);
                    yield " panel-icon\"></i>
                        ";
                }
                // line 19
                yield "                        ";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "label", [], "any", false, false, false, 19));
                yield "
                    </div>

                    ";
                // line 22
                if ((($tmp = (isset($context["panel_collapsible"]) || array_key_exists("panel_collapsible", $context) ? $context["panel_collapsible"] : (function () { throw new RuntimeError('Variable "panel_collapsible" does not exist.', 22, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 23
                    yield "                        <div class=\"content-panel-collapse\">
                            <i class=\"fas fw fa-chevron-right collapse-icon\"></i>
                        </div>
                    ";
                }
                // line 27
                yield "                </div>
            ";
            }
            // line 29
            yield "
            <div class=\"content-panel-body\">
                ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "fields", [], "any", false, false, false, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 32
                yield "                    ";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["field"], "isFormLayoutField", [], "method", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 33
                    yield "                        ";
                    yield $context["field"];
                    yield "
                    ";
                } else {
                    // line 35
                    yield "                        ";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["field"], "formLayoutRenderCallback", [(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })())], "method", false, false, false, 35);
                    yield "
                    ";
                }
                // line 37
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            yield "            </div>

            ";
            // line 40
            if ((($tmp = (isset($context["panel_has_footer"]) || array_key_exists("panel_has_footer", $context) ? $context["panel_has_footer"] : (function () { throw new RuntimeError('Variable "panel_has_footer" does not exist.', 40, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 41
                yield "                <div class=\"content-panel-footer\">
                    ";
                // line 42
                yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["panel_config"], "help", [], "any", false, false, false, 42));
                yield "
                </div>
            ";
            }
            // line 45
            yield "        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['panel_name'], $context['panel_config'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 50
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_item_actions(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item_actions"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item_actions"));

        // line 51
        yield "    ";
        $context["actions"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea_crud_form"]) || array_key_exists("ea_crud_form", $context) ? $context["ea_crud_form"] : (function () { throw new RuntimeError('Variable "ea_crud_form" does not exist.', 51, $this->source); })()), "ea", [], "any", false, false, false, 51), "crud", [], "any", false, false, false, 51), "actions", [], "any", false, false, false, 51);
        // line 52
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["actions"] ?? null), "index", [], "any", true, true, false, 52) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 52, $this->source); })()), "index", [], "any", false, false, false, 52), "isEnabled", [], "any", false, false, false, 52))) {
            // line 53
            yield "        <div class=\"btn-group\">
            ";
            // line 54
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 54, $this->source); })()), "index", [], "any", false, false, false, 54));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 55
                yield "                ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "templatePath", [], "any", false, false, false, 55), ["action" => $context["action"], "entity_config" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 55, $this->source); })()), "crud", [], "any", false, false, false, 55)], false);
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            yield "        </div>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_row"));

        // line 63
        $context["row_attr"] = Twig\Extension\CoreExtension::merge((isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 63, $this->source); })()), ["class" => ((((CoreExtension::getAttribute($this->env, $this->source,         // line 64
($context["row_attr"] ?? null), "class", [], "any", true, true, false, 64)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 64, $this->source); })()), "class", [], "any", false, false, false, 64), "")) : ("")) . " form-group field-") . Twig\Extension\CoreExtension::replace((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 64, $this->source); })()), ["." => "-"]))]);
        // line 67
        yield from $this->yieldParentBlock("form_row", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 71
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_label"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_label"));

        // line 72
        if ((($tmp =  !((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 72, $this->source); })()) === false)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 73
            $context["label_attr"] = Twig\Extension\CoreExtension::merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 73, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source,             // line 74
($context["label_attr"] ?? null), "class", [], "any", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 74, $this->source); })()), "class", [], "any", false, false, false, 74), "")) : ("")) . " form-control-label text-dark fw-500"))]);
        }
        // line 77
        yield from $this->yieldParentBlock("form_label", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 81
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_widget_simple(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_simple"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_simple"));

        // line 82
        $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 82, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source,         // line 83
($context["attr"] ?? null), "class", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 83, $this->source); })()), "class", [], "any", false, false, false, 83), "")) : ("")) . " form-control form-control-lg"))]);
        // line 85
        yield from $this->yieldParentBlock("form_widget_simple", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 89
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_row"));

        // line 90
        yield "<div class=\"form-group field-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["block_prefixes"]) || array_key_exists("block_prefixes", $context) ? $context["block_prefixes"] : (function () { throw new RuntimeError('Variable "block_prefixes" does not exist.', 90, $this->source); })()),  -2, 1)), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["ea"] ?? null), "field", [], "any", false, true, false, 90), "cssClass", [], "any", true, true, false, 90)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 90, $this->source); })()), "field", [], "any", false, false, false, 90), "cssClass", [], "any", false, false, false, 90), "")) : ("")), "html", null, true);
        yield "\">";
        // line 91
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), 'widget');
        // line 92
        yield "</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 95
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_widget"));

        // line 96
        $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 96, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 96)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 96, $this->source); })()), "class", [], "any", false, false, false, 96), "btn-primary")) : ("btn-primary")) . " btn btn-lg"))]);
        // line 97
        yield from $this->yieldParentBlock("button_widget", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 101
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_stylesheets"));

        // line 102
        yield "    ";
        yield from $this->yieldParentBlock("head_stylesheets", $context, $blocks);
        yield "
    
    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-hover-color: #32507f;
            --text-color: #2c384e;
            --border-color: #e9ecef;
            --panel-header-bg: rgba(61, 95, 158, 0.08);
            --panel-border-radius: 0.75rem;
            --panel-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.07);
        }

        /* Style des panneaux */
        .field-panel {
            background-color: #fff;
            border: 1px solid var(--border-color);
            border-radius: var(--panel-border-radius);
            box-shadow: var(--panel-shadow);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: box-shadow 0.2s ease-in-out;
        }
        
        .field-panel:hover {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }
        
        .content-panel-header {
            background-color: var(--panel-header-bg);
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            display: flex;
            font-weight: 600;
            justify-content: space-between;
            padding: 1rem 1.25rem;
        }
        
        .content-panel-body {
            padding: 1.5rem 1.25rem;
        }
        
        .content-panel-footer {
            background-color: #f8f9fa;
            border-top: 1px solid var(--border-color);
            color: #6c757d;
            font-size: 0.875rem;
            padding: 0.75rem 1.25rem;
        }
        
        .panel-icon {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        /* Style des champs */
        .form-control-label {
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .form-control {
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            padding: 0.6rem 0.75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(61, 95, 158, 0.25);
        }
        
        .form-help {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        /* Style des boutons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--primary-hover-color);
            border-color: var(--primary-hover-color);
        }
        
        .btn {
            border-radius: 0.375rem;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            transition: all 0.2s ease-in-out;
        }
        
        /* Style du tableau */
        .datagrid thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid var(--border-color) !important;
            font-weight: 600;
        }
        
        .datagrid tbody tr:hover {
            background-color: rgba(61, 95, 158, 0.04);
        }
        
        /* Style des actions en ligne */
        .action-edit, .action-detail {
            background-color: #fff;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            margin-right: 0.25rem;
        }
        
        .action-edit:hover, .action-detail:hover {
            background-color: var(--panel-header-bg);
        }
        
        .action-delete {
            background-color: #fff;
            border: 1px solid #dc3545;
            color: #dc3545;
        }
        
        .action-delete:hover {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/form_theme.html.twig";
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
        return array (  411 => 102,  398 => 101,  387 => 97,  385 => 96,  372 => 95,  361 => 92,  359 => 91,  353 => 90,  340 => 89,  329 => 85,  327 => 83,  326 => 82,  313 => 81,  302 => 77,  299 => 74,  298 => 73,  296 => 72,  283 => 71,  272 => 67,  270 => 64,  269 => 63,  256 => 62,  243 => 57,  234 => 55,  230 => 54,  227 => 53,  224 => 52,  221 => 51,  208 => 50,  192 => 45,  186 => 42,  183 => 41,  181 => 40,  177 => 38,  171 => 37,  165 => 35,  159 => 33,  156 => 32,  152 => 31,  148 => 29,  144 => 27,  138 => 23,  136 => 22,  129 => 19,  123 => 17,  121 => 16,  117 => 14,  115 => 13,  103 => 12,  100 => 11,  97 => 10,  94 => 9,  91 => 8,  88 => 7,  83 => 6,  70 => 5,  47 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/admin/form_theme.html.twig #}
{% extends '@EasyAdmin/crud/form_theme.html.twig' %}

{# Amélioration du style des panneaux de formulaire #}
{% block ea_crud_widget_panels %}
    {% for panel_name, panel_config in ea_crud_form.form_panels|filter(panel_config => not panel_config.form_tab or panel_config.form_tab == tab_name) %}
        {% set panel_has_header = panel_config.label|default(false) or panel_config.icon|default(false) %}
        {% set panel_has_footer = panel_config.help|default(false) %}
        {% set panel_collapsible = panel_config.collapsible %}
        {% set panel_collapsed = panel_config.collapsed %}

        <div class=\"{{ panel_config.css_class ?? '' }} {{ panel_has_header ? 'field-panel' }} {{ panel_collapsible ? 'collapsible' }} {{ panel_collapsed ? 'collapsed' }}\" {{ panel_collapsed ? 'data-collapsed=\"true\"' }}>
            {% if panel_has_header %}
                <div class=\"content-panel-header\">
                    <div class=\"content-panel-title\">
                        {% if panel_config.icon|default(false) %}
                            <i class=\"{{ panel_config.icon }} panel-icon\"></i>
                        {% endif %}
                        {{ panel_config.label|trans|raw }}
                    </div>

                    {% if panel_collapsible %}
                        <div class=\"content-panel-collapse\">
                            <i class=\"fas fw fa-chevron-right collapse-icon\"></i>
                        </div>
                    {% endif %}
                </div>
            {% endif %}

            <div class=\"content-panel-body\">
                {% for field in panel_config.fields %}
                    {% if not field.isFormLayoutField() %}
                        {{ field|raw }}
                    {% else %}
                        {{ field.formLayoutRenderCallback(form)|raw }}
                    {% endif %}
                {% endfor %}
            </div>

            {% if panel_has_footer %}
                <div class=\"content-panel-footer\">
                    {{ panel_config.help|trans|raw }}
                </div>
            {% endif %}
        </div>
    {% endfor %}
{% endblock ea_crud_widget_panels %}

{# Amélioration des boutons d'action #}
{% block item_actions %}
    {% set actions = ea_crud_form.ea.crud.actions %}
    {% if actions.index is defined and actions.index.isEnabled %}
        <div class=\"btn-group\">
            {% for action in actions.index %}
                {{ include(action.templatePath, { action: action, entity_config: ea.crud }, with_context = false) }}
            {% endfor %}
        </div>
    {% endif %}
{% endblock %}

{# Amélioration du style des champs #}
{% block form_row -%}
    {% set row_attr = row_attr|merge({
        class: row_attr.class|default('') ~ ' form-group field-' ~ name|replace({'.': '-'})
    })
    %}
    {{- parent() -}}
{%- endblock form_row %}

{# Amélioration du style des labels #}
{% block form_label -%}
    {% if label is not same as(false) -%}
        {% set label_attr = label_attr|merge({
            class: (label_attr.class|default('') ~ ' form-control-label text-dark fw-500')|trim
        }) %}
    {%- endif %}
    {{- parent() -}}
{%- endblock form_label %}

{# Amélioration du style des inputs #}
{% block form_widget_simple -%}
    {% set attr = attr|merge({
        class: (attr.class|default('') ~ ' form-control form-control-lg')|trim
    }) %}
    {{- parent() -}}
{%- endblock form_widget_simple %}

{# Amélioration des boutons #}
{% block button_row -%}
    <div class=\"form-group field-{{ block_prefixes|slice(-2, 1)|first }} {{ ea.field.cssClass|default('') }}\">
        {{- form_widget(form) -}}
    </div>
{%- endblock button_row %}

{% block button_widget -%}
    {% set attr = attr|merge({class: (attr.class|default('btn-primary') ~ ' btn btn-lg')|trim}) %}
    {{- parent() -}}
{%- endblock %}

{# Ajout de style CSS personnalisé #}
{% block head_stylesheets %}
    {{ parent() }}
    
    <style>
        :root {
            --primary-color: #3d5f9e;
            --primary-hover-color: #32507f;
            --text-color: #2c384e;
            --border-color: #e9ecef;
            --panel-header-bg: rgba(61, 95, 158, 0.08);
            --panel-border-radius: 0.75rem;
            --panel-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.07);
        }

        /* Style des panneaux */
        .field-panel {
            background-color: #fff;
            border: 1px solid var(--border-color);
            border-radius: var(--panel-border-radius);
            box-shadow: var(--panel-shadow);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: box-shadow 0.2s ease-in-out;
        }
        
        .field-panel:hover {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }
        
        .content-panel-header {
            background-color: var(--panel-header-bg);
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            display: flex;
            font-weight: 600;
            justify-content: space-between;
            padding: 1rem 1.25rem;
        }
        
        .content-panel-body {
            padding: 1.5rem 1.25rem;
        }
        
        .content-panel-footer {
            background-color: #f8f9fa;
            border-top: 1px solid var(--border-color);
            color: #6c757d;
            font-size: 0.875rem;
            padding: 0.75rem 1.25rem;
        }
        
        .panel-icon {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        /* Style des champs */
        .form-control-label {
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .form-control {
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            padding: 0.6rem 0.75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(61, 95, 158, 0.25);
        }
        
        .form-help {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        /* Style des boutons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--primary-hover-color);
            border-color: var(--primary-hover-color);
        }
        
        .btn {
            border-radius: 0.375rem;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            transition: all 0.2s ease-in-out;
        }
        
        /* Style du tableau */
        .datagrid thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid var(--border-color) !important;
            font-weight: 600;
        }
        
        .datagrid tbody tr:hover {
            background-color: rgba(61, 95, 158, 0.04);
        }
        
        /* Style des actions en ligne */
        .action-edit, .action-detail {
            background-color: #fff;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            margin-right: 0.25rem;
        }
        
        .action-edit:hover, .action-detail:hover {
            background-color: var(--panel-header-bg);
        }
        
        .action-delete {
            background-color: #fff;
            border: 1px solid #dc3545;
            color: #dc3545;
        }
        
        .action-delete:hover {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
{% endblock %}
", "admin/form_theme.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/form_theme.html.twig");
    }
}
