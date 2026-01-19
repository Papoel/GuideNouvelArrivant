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

/* app/dashboard/_dashboardFooter.html.twig */
class __TwigTemplate_eb2e6c21c534d315fdedc4f7990af9d4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardFooter.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/_dashboardFooter.html.twig"));

        // line 1
        yield "<footer id=\"footer\" class=\"footer\">
    <div class=\"container-fluid\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-4 text-center text-md-start mb-2 mb-md-0\">
                <div class=\"copyright\">
                    &copy; 2025 - ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " <strong>Pascal Briffard</strong>. Tous droits réservés.
                </div>
            </div>
            <div class=\"col-md-4 text-center mb-2 mb-md-0\">
                <div class=\"legal-links\">
                    <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_privacy_policy");
        yield "\" class=\"footer-link\">
                        <i class=\"bi bi-shield-check me-1\"></i>Politique de confidentialité
                    </a>
                    <span class=\"mx-2 text-muted\">|</span>
                    <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_legal_notices");
        yield "\" class=\"footer-link\">
                        <i class=\"bi bi-file-text me-1\"></i>Mentions légales
                    </a>
                </div>
            </div>
            <div class=\"col-md-4 text-center text-md-end\">
                <div class=\"credits\">
                    <a target=\"_blank\" href=\"https://www.github.com/Papoel\" class=\"footer-link\">Papoel</a>
                    <span class=\"mx-1 text-muted\">•</span>
                    <a target=\"_blank\" href=\"https://www.symfony.com/\" class=\"footer-link\">Symfony 7</a>
                    <span class=\"mx-1 text-muted\">•</span>
                    <a target=\"_blank\" href=\"https://getbootstrap.com/\" class=\"footer-link\">Bootstrap</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    #footer {
        padding: 15px 20px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
    }
    #footer .footer-link {
        color: #3d5f9e;
        text-decoration: none;
        font-size: 0.85rem;
        transition: color 0.2s ease;
    }
    #footer .footer-link:hover {
        color: #2c384e;
        text-decoration: underline;
    }
    #footer .copyright {
        font-size: 0.85rem;
        color: #6c757d;
    }
    #footer .credits {
        font-size: 0.8rem;
        color: #6c757d;
    }
    #footer .legal-links {
        font-size: 0.85rem;
    }
</style>
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
        return "app/dashboard/_dashboardFooter.html.twig";
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
        return array (  70 => 15,  63 => 11,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer id=\"footer\" class=\"footer\">
    <div class=\"container-fluid\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-4 text-center text-md-start mb-2 mb-md-0\">
                <div class=\"copyright\">
                    &copy; 2025 - {{ \"now\"|date(\"Y\") }} <strong>Pascal Briffard</strong>. Tous droits réservés.
                </div>
            </div>
            <div class=\"col-md-4 text-center mb-2 mb-md-0\">
                <div class=\"legal-links\">
                    <a href=\"{{ path('app_privacy_policy') }}\" class=\"footer-link\">
                        <i class=\"bi bi-shield-check me-1\"></i>Politique de confidentialité
                    </a>
                    <span class=\"mx-2 text-muted\">|</span>
                    <a href=\"{{ path('app_legal_notices') }}\" class=\"footer-link\">
                        <i class=\"bi bi-file-text me-1\"></i>Mentions légales
                    </a>
                </div>
            </div>
            <div class=\"col-md-4 text-center text-md-end\">
                <div class=\"credits\">
                    <a target=\"_blank\" href=\"https://www.github.com/Papoel\" class=\"footer-link\">Papoel</a>
                    <span class=\"mx-1 text-muted\">•</span>
                    <a target=\"_blank\" href=\"https://www.symfony.com/\" class=\"footer-link\">Symfony 7</a>
                    <span class=\"mx-1 text-muted\">•</span>
                    <a target=\"_blank\" href=\"https://getbootstrap.com/\" class=\"footer-link\">Bootstrap</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    #footer {
        padding: 15px 20px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
    }
    #footer .footer-link {
        color: #3d5f9e;
        text-decoration: none;
        font-size: 0.85rem;
        transition: color 0.2s ease;
    }
    #footer .footer-link:hover {
        color: #2c384e;
        text-decoration: underline;
    }
    #footer .copyright {
        font-size: 0.85rem;
        color: #6c757d;
    }
    #footer .credits {
        font-size: 0.8rem;
        color: #6c757d;
    }
    #footer .legal-links {
        font-size: 0.85rem;
    }
</style>
", "app/dashboard/_dashboardFooter.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/_dashboardFooter.html.twig");
    }
}
