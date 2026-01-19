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

/* admin/user/delete_modal.html.twig */
class __TwigTemplate_4cda72fce321941d42ba87fdcec9a37f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/delete_modal.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/delete_modal.html.twig"));

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/user/delete_modal.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array ();
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
<div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
        <div class=\"modal-content shadow border-0\">
            <div class=\"modal-header border-bottom-0 bg-light\">
                <h5 class=\"modal-title\" id=\"deleteModalLabel\">
                    <i class=\"fas fa-exclamation-triangle text-warning me-2\"></i>
                    Confirmation de suppression
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body px-4 py-4\">
                <p class=\"text-muted mb-4\">Choisissez une option de suppression :</p>
                <div class=\"d-flex flex-column gap-3\">
                    <a href=\"{{ delete_user_url }}\" class=\"btn btn-danger-subtle text-danger border-danger border-1 p-3 position-relative d-flex align-items-center\">
                        <i class=\"fas fa-user-times me-3\"></i>
                        <span>Supprimer uniquement l'utilisateur</span>
                        <i class=\"fas fa-chevron-right ms-auto\"></i>
                    </a>

                    <a href=\"{{ delete_all_url }}\" class=\"btn btn-danger p-3 position-relative d-flex align-items-center\">
                        <i class=\"fas fa-trash-alt me-3\"></i>
                        <span>Tout supprimer</span>
                        <i class=\"fas fa-chevron-right ms-auto\"></i>
                    </a>

                    <a href=\"{{ delete_logbooks_url }}\" class=\"btn btn-warning text-dark p-3 position-relative d-flex align-items-center\">
                        <i class=\"fas fa-book me-3\"></i>
                        <span>Supprimer uniquement les carnets</span>
                        <i class=\"fas fa-chevron-right ms-auto\"></i>
                    </a>
                </div>
            </div>
            <div class=\"modal-footer border-top-0 bg-light\">
                <button type=\"button\" class=\"btn btn-secondary px-4\" data-bs-dismiss=\"modal\">
                    <i class=\"fas fa-times me-2\"></i>Annuler
                </button>
            </div>
        </div>
    </div>
</div>

{% block javascript %}
    alert('delete_modal.html.twig');
{% endblock %}
#}
", "admin/user/delete_modal.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/admin/user/delete_modal.html.twig");
    }
}
