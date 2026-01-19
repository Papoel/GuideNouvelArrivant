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

/* emails/rgpd/deletion_cancellation.html.twig */
class __TwigTemplate_3635b4ab2e37e0c9cb0553857b5b870c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/rgpd/deletion_cancellation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/rgpd/deletion_cancellation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Annulation de la demande de suppression</title>
</head>
<body style=\"margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f9fa;\">
    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #f8f9fa; padding: 40px 20px;\">
        <tr>
            <td align=\"center\">
                <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);\">
                    <!-- Header -->
                    <tr>
                        <td style=\"background: linear-gradient(135deg, #28a745 0%, #218838 100%); padding: 30px; text-align: center; border-radius: 8px 8px 0 0;\">
                            <h1 style=\"color: #ffffff; margin: 0; font-size: 24px;\">
                                ✅ Demande annulée
                            </h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style=\"padding: 30px;\">
                            <p style=\"color: #2c384e; font-size: 16px; margin-bottom: 20px;\">
                                Bonjour <strong>";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 26, $this->source); })()), "firstname", [], "any", false, false, false, 26), "html", null, true);
        yield "</strong>,
                            </p>
                            
                            <p style=\"color: #2c384e; font-size: 16px; margin-bottom: 20px;\">
                                Votre demande de suppression de compte du 
                                <strong>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["deletionRequest"]) || array_key_exists("deletionRequest", $context) ? $context["deletionRequest"] : (function () { throw new RuntimeError('Variable "deletionRequest" does not exist.', 31, $this->source); })()), "requestedAt", [], "any", false, false, false, 31), "d/m/Y à H:i", "Europe/Paris"), "html", null, true);
        yield "</strong>
                                a été <strong style=\"color: #28a745;\">annulée avec succès</strong>.
                            </p>
                            
                            <!-- Success Box -->
                            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 25px 0;\">
                                <tr>
                                    <td style=\"background-color: #d4edda; border-left: 4px solid #28a745; padding: 15px; border-radius: 0 8px 8px 0;\">
                                        <strong style=\"color: #155724;\">🎉 Bonne nouvelle !</strong>
                                        <p style=\"color: #155724; margin: 10px 0 0 0; font-size: 14px;\">
                                            Votre compte et toutes vos données sont conservés.<br>
                                            Vous pouvez continuer à utiliser l'application normalement.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            
                            <p style=\"color: #6c757d; font-size: 14px; margin-top: 25px;\">
                                Si vous n'êtes pas à l'origine de cette annulation, veuillez contacter 
                                le support immédiatement.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style=\"background-color: #f8f9fa; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; border-top: 1px solid #e9ecef;\">
                            <p style=\"color: #6c757d; font-size: 12px; margin: 0;\">
                                Cet email a été envoyé automatiquement par l'application GuideNouvelArrivant.<br>
                                © ";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " CNPE Penly - Service MRC
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
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
        return "emails/rgpd/deletion_cancellation.html.twig";
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
        return array (  115 => 60,  83 => 31,  75 => 26,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Annulation de la demande de suppression</title>
</head>
<body style=\"margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f9fa;\">
    <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #f8f9fa; padding: 40px 20px;\">
        <tr>
            <td align=\"center\">
                <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);\">
                    <!-- Header -->
                    <tr>
                        <td style=\"background: linear-gradient(135deg, #28a745 0%, #218838 100%); padding: 30px; text-align: center; border-radius: 8px 8px 0 0;\">
                            <h1 style=\"color: #ffffff; margin: 0; font-size: 24px;\">
                                ✅ Demande annulée
                            </h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style=\"padding: 30px;\">
                            <p style=\"color: #2c384e; font-size: 16px; margin-bottom: 20px;\">
                                Bonjour <strong>{{ user.firstname }}</strong>,
                            </p>
                            
                            <p style=\"color: #2c384e; font-size: 16px; margin-bottom: 20px;\">
                                Votre demande de suppression de compte du 
                                <strong>{{ deletionRequest.requestedAt|date('d/m/Y à H:i', 'Europe/Paris') }}</strong>
                                a été <strong style=\"color: #28a745;\">annulée avec succès</strong>.
                            </p>
                            
                            <!-- Success Box -->
                            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: 25px 0;\">
                                <tr>
                                    <td style=\"background-color: #d4edda; border-left: 4px solid #28a745; padding: 15px; border-radius: 0 8px 8px 0;\">
                                        <strong style=\"color: #155724;\">🎉 Bonne nouvelle !</strong>
                                        <p style=\"color: #155724; margin: 10px 0 0 0; font-size: 14px;\">
                                            Votre compte et toutes vos données sont conservés.<br>
                                            Vous pouvez continuer à utiliser l'application normalement.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            
                            <p style=\"color: #6c757d; font-size: 14px; margin-top: 25px;\">
                                Si vous n'êtes pas à l'origine de cette annulation, veuillez contacter 
                                le support immédiatement.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style=\"background-color: #f8f9fa; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; border-top: 1px solid #e9ecef;\">
                            <p style=\"color: #6c757d; font-size: 12px; margin: 0;\">
                                Cet email a été envoyé automatiquement par l'application GuideNouvelArrivant.<br>
                                © {{ \"now\"|date(\"Y\") }} CNPE Penly - Service MRC
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
", "emails/rgpd/deletion_cancellation.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/emails/rgpd/deletion_cancellation.html.twig");
    }
}
