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

/* reset_password/email.html.twig */
class __TwigTemplate_0cba9712170e533de5c90b34057426ca extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/email.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reset_password/email.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Réinitialisation de votre mot de passe</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        /* Reset styles */
        body, #bodyTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        img, a img {
            border: 0;
            outline: none;
            text-decoration: none;
        }
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }
        /* Custom styles */
        .button {
            background: #0d6efd;
            border-radius: 4px;
            color: #ffffff !important;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            line-height: 45px;
            text-align: center;
            text-decoration: none;
            width: 250px;
            -webkit-text-size-adjust: none;
        }
        .button:hover {
            background: #0b5ed7 !important;
        }
        @media only screen and (max-width: 480px) {
            .container {
                width: 100% !important;
            }
            .button {
                width: 100% !important;
                display: block !important;
            }
        }
    </style>
</head>
<body style=\"margin: 0; padding: 0; background-color: #f8f9fa;\">
    <!-- Email wrapper -->
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"bodyTable\" style=\"height: 100%;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- Email container -->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"container\" style=\"background-color: #ffffff; margin: 40px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);\">
                    <!-- Header -->
                    <tr>
                        <td align=\"center\" style=\"padding: 40px 0;\">
                            <img src=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logos/edf.png"), "html", null, true);
        yield "\" alt=\"EDF Logo\" width=\"96\" height=\"96\" style=\"display: block; margin: 0 auto;\">
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style=\"padding: 0 40px;\">
                            <h1 style=\"color: #212529; font-size: 24px; font-weight: bold; margin: 0 0 20px; text-align: center;\">
                                Réinitialisation de votre mot de passe
                            </h1>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Bonjour,
                            </p>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte. Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.
                            </p>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 30px;\">
                                Pour réinitialiser votre mot de passe, cliquez sur le bouton ci-dessous :
                            </p>

                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"margin: 0 0 30px;\">
                                <tr>
                                    <td align=\"center\">
                                        <a href=\"http://localhost:8000";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password", ["token" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 99, $this->source); })()), "token", [], "any", false, false, false, 99)]), "html", null, true);
        yield "\" class=\"button\" style=\"background: #0d6efd; border-radius: 4px; color: #ffffff; display: inline-block; font-family: sans-serif; font-size: 16px; font-weight: bold; line-height: 45px; text-align: center; text-decoration: none; width: 250px; -webkit-text-size-adjust: none;\">
                                            Réinitialiser mon mot de passe
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Si le bouton ne fonctionne pas, vous pouvez copier et coller le lien suivant dans votre navigateur :
                            </p>

                            <p style=\"background-color: #f8f9fa; border-radius: 4px; color: #6c757d; font-size: 14px; line-height: 20px; margin: 0 0 30px; padding: 15px; word-break: break-all;\">
                                https://gna.papoel.fr/";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reset_password", ["token" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 111, $this->source); })()), "token", [], "any", false, false, false, 111)]), "html", null, true);
        yield "
                            </p>

                            <p style=\"color: #dc3545; font-size: 14px; line-height: 20px; margin: 0 0 30px;\">
                                ⚠️ Ce lien expirera dans ";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 115, $this->source); })()), "expirationMessageKey", [], "any", false, false, false, 115), CoreExtension::getAttribute($this->env, $this->source, (isset($context["resetToken"]) || array_key_exists("resetToken", $context) ? $context["resetToken"] : (function () { throw new RuntimeError('Variable "resetToken" does not exist.', 115, $this->source); })()), "expirationMessageData", [], "any", false, false, false, 115), "ResetPasswordBundle"), "html", null, true);
        yield ".
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style=\"padding: 30px 40px; background-color: #f8f9fa; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;\">
                            <p style=\"color: #6c757d; font-size: 14px; line-height: 20px; margin: 0; text-align: center;\">
                                Cet email a été envoyé automatiquement. Merci de ne pas y répondre.
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
        return "reset_password/email.html.twig";
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
        return array (  173 => 115,  166 => 111,  151 => 99,  123 => 74,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Réinitialisation de votre mot de passe</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        /* Reset styles */
        body, #bodyTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        img, a img {
            border: 0;
            outline: none;
            text-decoration: none;
        }
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }
        /* Custom styles */
        .button {
            background: #0d6efd;
            border-radius: 4px;
            color: #ffffff !important;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            line-height: 45px;
            text-align: center;
            text-decoration: none;
            width: 250px;
            -webkit-text-size-adjust: none;
        }
        .button:hover {
            background: #0b5ed7 !important;
        }
        @media only screen and (max-width: 480px) {
            .container {
                width: 100% !important;
            }
            .button {
                width: 100% !important;
                display: block !important;
            }
        }
    </style>
</head>
<body style=\"margin: 0; padding: 0; background-color: #f8f9fa;\">
    <!-- Email wrapper -->
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" id=\"bodyTable\" style=\"height: 100%;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- Email container -->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" class=\"container\" style=\"background-color: #ffffff; margin: 40px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);\">
                    <!-- Header -->
                    <tr>
                        <td align=\"center\" style=\"padding: 40px 0;\">
                            <img src=\"{{ asset('images/logos/edf.png') }}\" alt=\"EDF Logo\" width=\"96\" height=\"96\" style=\"display: block; margin: 0 auto;\">
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style=\"padding: 0 40px;\">
                            <h1 style=\"color: #212529; font-size: 24px; font-weight: bold; margin: 0 0 20px; text-align: center;\">
                                Réinitialisation de votre mot de passe
                            </h1>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Bonjour,
                            </p>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte. Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.
                            </p>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 30px;\">
                                Pour réinitialiser votre mot de passe, cliquez sur le bouton ci-dessous :
                            </p>

                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"margin: 0 0 30px;\">
                                <tr>
                                    <td align=\"center\">
                                        <a href=\"http://localhost:8000{{ path('app_reset_password', {token: resetToken.token}) }}\" class=\"button\" style=\"background: #0d6efd; border-radius: 4px; color: #ffffff; display: inline-block; font-family: sans-serif; font-size: 16px; font-weight: bold; line-height: 45px; text-align: center; text-decoration: none; width: 250px; -webkit-text-size-adjust: none;\">
                                            Réinitialiser mon mot de passe
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style=\"color: #6c757d; font-size: 16px; line-height: 24px; margin: 0 0 20px;\">
                                Si le bouton ne fonctionne pas, vous pouvez copier et coller le lien suivant dans votre navigateur :
                            </p>

                            <p style=\"background-color: #f8f9fa; border-radius: 4px; color: #6c757d; font-size: 14px; line-height: 20px; margin: 0 0 30px; padding: 15px; word-break: break-all;\">
                                https://gna.papoel.fr/{{ path('app_reset_password', {token: resetToken.token}) }}
                            </p>

                            <p style=\"color: #dc3545; font-size: 14px; line-height: 20px; margin: 0 0 30px;\">
                                ⚠️ Ce lien expirera dans {{ resetToken.expirationMessageKey|trans(resetToken.expirationMessageData, 'ResetPasswordBundle') }}.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style=\"padding: 30px 40px; background-color: #f8f9fa; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;\">
                            <p style=\"color: #6c757d; font-size: 14px; line-height: 20px; margin: 0; text-align: center;\">
                                Cet email a été envoyé automatiquement. Merci de ne pas y répondre.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
", "reset_password/email.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/reset_password/email.html.twig");
    }
}
