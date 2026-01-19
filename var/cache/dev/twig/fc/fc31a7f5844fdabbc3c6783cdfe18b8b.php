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

/* admin/field/themes_detail.html.twig */
class __TwigTemplate_2f70b95ae2bd2e881490a2efcd27c154 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/themes_detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/field/themes_detail.html.twig"));

        // line 2
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 2, $this->source); })()), "value", [], "any", false, false, false, 2)) > 0)) {
            // line 3
            yield "    <div class=\"themes-container\">
        ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 4, $this->source); })()), "value", [], "any", false, false, false, 4));
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
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 5
                yield "            <div class=\"theme-item mb-4\">
                <div class=\"theme-header d-flex align-items-start mb-3\">
                    <div class=\"theme-icon me-3\">
                        <div class=\"rounded-circle bg-light p-3 d-flex align-items-center justify-content-center\" style=\"width: 48px; height: 48px;\">
                            <i class=\"fas fa-list-alt text-success\"></i>
                        </div>
                    </div>
                    <div class=\"theme-info flex-grow-1\">
                        <h5 class=\"fw-semibold mb-1\">";
                // line 13
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "title", [], "any", false, false, false, 13), "html", null, true);
                yield "</h5>
                        ";
                // line 14
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 14)) > 0)) {
                    // line 15
                    yield "                            <div class=\"text-muted small\">
                                <span class=\"me-2\">";
                    // line 16
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 16)), "html", null, true);
                    yield " module";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 16)) > 1)) {
                        yield "s";
                    }
                    yield "</span>
                                <a href=\"#\" 
                                   class=\"text-decoration-none text-secondary small\"
                                   data-bs-toggle=\"collapse\" 
                                   data-bs-target=\"#modules-";
                    // line 20
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 20), "html", null, true);
                    yield "\">
                                    <i class=\"fas fa-angle-down me-1\"></i>Détails
                                </a>
                            </div>
                        ";
                }
                // line 25
                yield "                    </div>
                </div>
                
                ";
                // line 28
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 29
                    yield "                    <div class=\"theme-description ms-5 ps-2 mb-3 border-start border-2 border-light-subtle text-secondary\">
                        ";
                    // line 30
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "description", [], "any", false, false, false, 30);
                    yield "
                    </div>
                ";
                }
                // line 33
                yield "                
                ";
                // line 34
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 34)) > 0)) {
                    // line 35
                    yield "                    <div class=\"collapse ms-5 ps-2\" id=\"modules-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 35), "html", null, true);
                    yield "\">
                        <div class=\"card border-0 bg-light\">
                            <div class=\"card-header bg-light border-0 py-2\">
                                <span class=\"text-muted small\">Modules inclus</span>
                            </div>
                            <div class=\"list-group list-group-flush rounded-bottom\">
                                ";
                    // line 41
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "modules", [], "any", false, false, false, 41));
                    foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                        // line 42
                        yield "                                    <div class=\"list-group-item bg-light border-light-subtle d-flex align-items-center\">
                                        <i class=\"fas fa-check-circle text-success me-2 small\"></i>
                                        <span class=\"text-dark\">";
                        // line 44
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "title", [], "any", false, false, false, 44), "html", null, true);
                        yield "</span>
                                    </div>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 47
                    yield "                            </div>
                        </div>
                    </div>
                ";
                } else {
                    // line 51
                    yield "                    <div class=\"ms-5 ps-2\">
                        <span class=\"text-muted small fst-italic\">Aucun module défini</span>
                    </div>
                ";
                }
                // line 55
                yield "                
                <hr class=\"my-4 opacity-10\">
            </div>
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
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            yield "    </div>
";
        } else {
            // line 61
            yield "    <div class=\"empty-state text-center bg-light rounded p-4 mb-4\">
        <i class=\"fas fa-list text-secondary opacity-50 fa-2x mb-3\"></i>
        <p class=\"text-secondary mb-0\">Aucun thème associé à ce modèle</p>
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
        return "admin/field/themes_detail.html.twig";
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
        return array (  189 => 61,  185 => 59,  168 => 55,  162 => 51,  156 => 47,  147 => 44,  143 => 42,  139 => 41,  129 => 35,  127 => 34,  124 => 33,  118 => 30,  115 => 29,  113 => 28,  108 => 25,  100 => 20,  89 => 16,  86 => 15,  84 => 14,  80 => 13,  70 => 5,  53 => 4,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Template pour l'affichage des thèmes dans la page détail des modèles de carnet #}
{% if field.value|length > 0 %}
    <div class=\"themes-container\">
        {% for theme in field.value %}
            <div class=\"theme-item mb-4\">
                <div class=\"theme-header d-flex align-items-start mb-3\">
                    <div class=\"theme-icon me-3\">
                        <div class=\"rounded-circle bg-light p-3 d-flex align-items-center justify-content-center\" style=\"width: 48px; height: 48px;\">
                            <i class=\"fas fa-list-alt text-success\"></i>
                        </div>
                    </div>
                    <div class=\"theme-info flex-grow-1\">
                        <h5 class=\"fw-semibold mb-1\">{{ theme.title }}</h5>
                        {% if theme.modules|length > 0 %}
                            <div class=\"text-muted small\">
                                <span class=\"me-2\">{{ theme.modules|length }} module{% if theme.modules|length > 1 %}s{% endif %}</span>
                                <a href=\"#\" 
                                   class=\"text-decoration-none text-secondary small\"
                                   data-bs-toggle=\"collapse\" 
                                   data-bs-target=\"#modules-{{ loop.index }}\">
                                    <i class=\"fas fa-angle-down me-1\"></i>Détails
                                </a>
                            </div>
                        {% endif %}
                    </div>
                </div>
                
                {% if theme.description %}
                    <div class=\"theme-description ms-5 ps-2 mb-3 border-start border-2 border-light-subtle text-secondary\">
                        {{ theme.description|raw }}
                    </div>
                {% endif %}
                
                {% if theme.modules|length > 0 %}
                    <div class=\"collapse ms-5 ps-2\" id=\"modules-{{ loop.index }}\">
                        <div class=\"card border-0 bg-light\">
                            <div class=\"card-header bg-light border-0 py-2\">
                                <span class=\"text-muted small\">Modules inclus</span>
                            </div>
                            <div class=\"list-group list-group-flush rounded-bottom\">
                                {% for module in theme.modules %}
                                    <div class=\"list-group-item bg-light border-light-subtle d-flex align-items-center\">
                                        <i class=\"fas fa-check-circle text-success me-2 small\"></i>
                                        <span class=\"text-dark\">{{ module.title }}</span>
                                    </div>
                                {% endfor %}
                            </div>
                        </div>
                    </div>
                {% else %}
                    <div class=\"ms-5 ps-2\">
                        <span class=\"text-muted small fst-italic\">Aucun module défini</span>
                    </div>
                {% endif %}
                
                <hr class=\"my-4 opacity-10\">
            </div>
        {% endfor %}
    </div>
{% else %}
    <div class=\"empty-state text-center bg-light rounded p-4 mb-4\">
        <i class=\"fas fa-list text-secondary opacity-50 fa-2x mb-3\"></i>
        <p class=\"text-secondary mb-0\">Aucun thème associé à ce modèle</p>
    </div>
{% endif %}
", "admin/field/themes_detail.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/field/themes_detail.html.twig");
    }
}
