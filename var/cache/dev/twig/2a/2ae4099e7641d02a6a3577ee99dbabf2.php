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

/* app/dashboard/mentor/logbook_details0.html.twig */
class __TwigTemplate_1159f36c5dea4ba407ff26c1c53abef9 extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/logbook_details0.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "app/dashboard/mentor/logbook_details0.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Détails du Carnet";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    ";
        $context["user"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6);
        // line 7
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardHeader.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardAside.html.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "
    <main id=\"main\" class=\"main\">
        <!-- Message Flash -->
        <section id=\"flash_messages\" class=\"container-fluid mt-4\">
            ";
        // line 14
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", [], "any", false, false, false, 14));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 15
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 16
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
                        ";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        yield "        </section>

        <section>
            ";
        // line 29
        yield "
            <div class=\"container-fluid\">
                <div class=\"row mb-3\">
                    <div class=\"col-md-12\">
                        <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"Rechercher...\">
                        <label for=\"searchInput\"></label>
                    </div>
                </div>

                ";
        // line 38
        $context["lastTheme"] = null;
        // line 39
        yield "                <div class=\"col-12\">
                    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["padawanData"]) || array_key_exists("padawanData", $context) ? $context["padawanData"] : (function () { throw new RuntimeError('Variable "padawanData" does not exist.', 40, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 41
            yield "                        ";
            if (((isset($context["lastTheme"]) || array_key_exists("lastTheme", $context) ? $context["lastTheme"] : (function () { throw new RuntimeError('Variable "lastTheme" does not exist.', 41, $this->source); })()) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "module", [], "any", false, false, false, 41), "theme", [], "any", false, false, false, 41), "title", [], "any", false, false, false, 41))) {
                // line 42
                yield "                            ";
                if ((($tmp =  !(null === (isset($context["lastTheme"]) || array_key_exists("lastTheme", $context) ? $context["lastTheme"] : (function () { throw new RuntimeError('Variable "lastTheme" does not exist.', 42, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 43
                    yield "                                </tbody>
                                </table>
                                </article>
                            ";
                }
                // line 47
                yield "                            <article>
                            <h3>";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "module", [], "any", false, false, false, 48), "theme", [], "any", false, false, false, 48), "title", [], "any", false, false, false, 48), "html", null, true);
                yield "</h3>
                                <table class=\"table table-striped table-bordered my-4\">
                                    <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Commentaire agent</th>
                                        <th>Commentaire Mentor</th>
                                        <th class=\"text-center\">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 59
                $context["lastTheme"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "module", [], "any", false, false, false, 59), "theme", [], "any", false, false, false, 59), "title", [], "any", false, false, false, 59);
                // line 60
                yield "                        ";
            }
            // line 61
            yield "                                <!-- Affichage des données du carnet de bord -->
                                    <tr class=\"searchable align-middle\">
                                        <td>";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "module", [], "any", false, false, false, 63), "title", [], "any", false, false, false, 63), "html", null, true);
            yield "</td>
                                        <td>";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "agentComment", [], "any", false, false, false, 64), "html", null, true);
            yield "</td>
                                        <td>";
            // line 65
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["data"], "mentorComment", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "mentorComment", [], "any", false, false, false, 65), "html", null, true)) : ("Aucun commentaire"));
            yield "</td>
                                        <td>
                                            <div class=\"d-flex justify-content-center gap-2\">
                                                ";
            // line 68
            if (( !CoreExtension::getAttribute($this->env, $this->source, $context["data"], "mentorComment", [], "any", false, false, false, 68) && (null === CoreExtension::getAttribute($this->env, $this->source, $context["data"], "mentorValidatedAt", [], "any", false, false, false, 68)))) {
                // line 69
                yield "                                                    <a class=\"btn btn-sm btn-outline-primary\"
                                                       href=\"";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 71
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "nni", [], "any", false, false, false, 71), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 72
$context["data"], "user", [], "any", false, false, false, 72), "nni", [], "any", false, false, false, 72), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 73
$context["data"], "logbook", [], "any", false, false, false, 73), "id", [], "any", false, false, false, 73), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 74
$context["data"], "module", [], "any", false, false, false, 74), "id", [], "any", false, false, false, 74), "actionId" => CoreExtension::getAttribute($this->env, $this->source,                 // line 75
$context["data"], "id", [], "any", false, false, false, 75)]), "html", null, true);
                // line 76
                yield "\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Commenter
                                                    </a>
                                                ";
            } elseif ((null === CoreExtension::getAttribute($this->env, $this->source,             // line 80
$context["data"], "mentorValidatedAt", [], "any", false, false, false, 80))) {
                // line 81
                yield "                                                    <a class=\"btn btn-sm btn-outline-primary\"
                                                       href=\"";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_edit", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 83
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "user", [], "any", false, false, false, 83), "nni", [], "any", false, false, false, 83), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 84
$context["data"], "user", [], "any", false, false, false, 84), "nni", [], "any", false, false, false, 84), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 85
$context["data"], "logbook", [], "any", false, false, false, 85), "id", [], "any", false, false, false, 85), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 86
$context["data"], "module", [], "any", false, false, false, 86), "id", [], "any", false, false, false, 86), "actionId" => CoreExtension::getAttribute($this->env, $this->source,                 // line 87
$context["data"], "id", [], "any", false, false, false, 87)]), "html", null, true);
                // line 88
                yield "\">
                                                        <i class=\"bi bi-pencil\"></i>
                                                        Modifier
                                                    </a>
                                                    <a class=\"btn btn-sm btn-outline-danger\"
                                                       href=\"";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_delete_comment", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 94
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 94, $this->source); })()), "user", [], "any", false, false, false, 94), "nni", [], "any", false, false, false, 94), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 95
$context["data"], "user", [], "any", false, false, false, 95), "nni", [], "any", false, false, false, 95), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 96
$context["data"], "logbook", [], "any", false, false, false, 96), "id", [], "any", false, false, false, 96), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 97
$context["data"], "module", [], "any", false, false, false, 97), "id", [], "any", false, false, false, 97), "actionId" => CoreExtension::getAttribute($this->env, $this->source,                 // line 98
$context["data"], "id", [], "any", false, false, false, 98)]), "html", null, true);
                // line 99
                yield "\">
                                                        <i class=\"bi bi-trash\"></i>
                                                        Supprimer
                                                    </a>
                                                ";
            }
            // line 104
            yield "                                                ";
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["data"], "mentorVisa", [], "any", false, false, false, 104)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 105
                yield "                                                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_validate", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 106
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "user", [], "any", false, false, false, 106), "nni", [], "any", false, false, false, 106), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 107
$context["data"], "user", [], "any", false, false, false, 107), "nni", [], "any", false, false, false, 107), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 108
$context["data"], "logbook", [], "any", false, false, false, 108), "id", [], "any", false, false, false, 108), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 109
$context["data"], "module", [], "any", false, false, false, 109), "id", [], "any", false, false, false, 109), "actionId" => CoreExtension::getAttribute($this->env, $this->source,                 // line 110
$context["data"], "id", [], "any", false, false, false, 110)]), "html", null, true);
                // line 111
                yield "\" class=\"btn btn-sm btn-outline-success\">
                                                        <i class=\"bi bi-check-circle-fill\"></i>
                                                        Valider
                                                    </a>
                                                ";
            } else {
                // line 116
                yield "                                                    ";
                // line 117
                yield "                                                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("mentor_logbook_action_invalidate", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 118
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 118, $this->source); })()), "user", [], "any", false, false, false, 118), "nni", [], "any", false, false, false, 118), "padawanNni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 119
$context["data"], "user", [], "any", false, false, false, 119), "nni", [], "any", false, false, false, 119), "logbookId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 120
$context["data"], "logbook", [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120), "moduleId" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 121
$context["data"], "module", [], "any", false, false, false, 121), "id", [], "any", false, false, false, 121), "actionId" => CoreExtension::getAttribute($this->env, $this->source,                 // line 122
$context["data"], "id", [], "any", false, false, false, 122)]), "html", null, true);
                // line 123
                yield "\" class=\"btn btn-sm btn-outline-danger\">
                                                        <i class=\"bi bi-x-circle-fill\"></i>
                                                        Dévalider
                                                    </a>
                                                ";
            }
            // line 128
            yield "                                            </div>
                                        </td>
                                    </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['data'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        yield "                                    </tbody>
                                </table>
                    </article>

                    <!-- Pagination Controls -->
                    <nav>
                        <ul class=\"pagination justify-content-center\">
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"#\" id=\"prevPage\">Précédent</a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"#\" id=\"nextPage\">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Filtrage des résultats de recherche
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('.searchable');

            rows.forEach(function(row) {
                if (row.textContent.toLowerCase().indexOf(input) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Pagination
        let currentPage = 1;
        let rowsPerPage = 5; // Nombre de lignes par page

        function paginate() {
            let rows = document.querySelectorAll('.searchable');
            let totalRows = rows.length;
            let totalPages = Math.ceil(totalRows / rowsPerPage);

            rows.forEach((row, index) => {
                row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? '' : 'none';
            });

            // Gérer l'état des boutons de pagination
            document.getElementById('prevPage').parentElement.classList.toggle('disabled', currentPage === 1);
            document.getElementById('nextPage').parentElement.classList.toggle('disabled', currentPage === totalPages);
        }

        document.getElementById('prevPage').addEventListener('click', function(e) {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                paginate();
            }
        });

        document.getElementById('nextPage').addEventListener('click', function(e) {
            e.preventDefault();
            let totalRows = document.querySelectorAll('.searchable').length;
            let totalPages = Math.ceil(totalRows / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                paginate();
            }
        });

        // Initialiser la pagination au chargement
        paginate();
    </script>


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
        return "app/dashboard/mentor/logbook_details0.html.twig";
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
        return array (  318 => 132,  309 => 128,  302 => 123,  300 => 122,  299 => 121,  298 => 120,  297 => 119,  296 => 118,  294 => 117,  292 => 116,  285 => 111,  283 => 110,  282 => 109,  281 => 108,  280 => 107,  279 => 106,  277 => 105,  274 => 104,  267 => 99,  265 => 98,  264 => 97,  263 => 96,  262 => 95,  261 => 94,  260 => 93,  253 => 88,  251 => 87,  250 => 86,  249 => 85,  248 => 84,  247 => 83,  246 => 82,  243 => 81,  241 => 80,  235 => 76,  233 => 75,  232 => 74,  231 => 73,  230 => 72,  229 => 71,  228 => 70,  225 => 69,  223 => 68,  217 => 65,  213 => 64,  209 => 63,  205 => 61,  202 => 60,  200 => 59,  186 => 48,  183 => 47,  177 => 43,  174 => 42,  171 => 41,  167 => 40,  164 => 39,  162 => 38,  151 => 29,  146 => 22,  140 => 21,  130 => 17,  125 => 16,  120 => 15,  115 => 14,  109 => 9,  106 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails du Carnet{% endblock %}

{% block body %}
    {% set user = app.user %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <!-- Message Flash -->
        <section id=\"flash_messages\" class=\"container-fluid mt-4\">
            {# Display messages Flash #}
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
                        {{ message }}
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>
                {% endfor %}
            {% endfor %}
        </section>

        <section>
            {#<form class=\"d-flex\" role=\"search\">
                <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">
                <button class=\"btn btn-outline-success\" type=\"submit\">Search</button>
            </form>#}

            <div class=\"container-fluid\">
                <div class=\"row mb-3\">
                    <div class=\"col-md-12\">
                        <input type=\"text\" id=\"searchInput\" class=\"form-control\" placeholder=\"Rechercher...\">
                        <label for=\"searchInput\"></label>
                    </div>
                </div>

                {% set lastTheme = null %}
                <div class=\"col-12\">
                    {% for data in padawanData %}
                        {% if lastTheme != data.module.theme.title %}
                            {% if lastTheme is not null %}
                                </tbody>
                                </table>
                                </article>
                            {% endif %}
                            <article>
                            <h3>{{ data.module.theme.title }}</h3>
                                <table class=\"table table-striped table-bordered my-4\">
                                    <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Commentaire agent</th>
                                        <th>Commentaire Mentor</th>
                                        <th class=\"text-center\">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {% set lastTheme = data.module.theme.title %}
                        {% endif %}
                                <!-- Affichage des données du carnet de bord -->
                                    <tr class=\"searchable align-middle\">
                                        <td>{{ data.module.title }}</td>
                                        <td>{{ data.agentComment }}</td>
                                        <td>{{ data.mentorComment ? data.mentorComment : 'Aucun commentaire' }}</td>
                                        <td>
                                            <div class=\"d-flex justify-content-center gap-2\">
                                                {% if not data.mentorComment and data.mentorValidatedAt is null %}
                                                    <a class=\"btn btn-sm btn-outline-primary\"
                                                       href=\"{{ path('mentor_logbook_action_edit', {
                                                           'nni': app.user.nni,
                                                           'padawanNni': data.user.nni,
                                                           'logbookId': data.logbook.id,
                                                           'moduleId': data.module.id,
                                                           'actionId': data.id
                                                       }) }}\">
                                                        <i class=\"bi bi-chat-dots\"></i>
                                                        Commenter
                                                    </a>
                                                {% elseif data.mentorValidatedAt is null %}
                                                    <a class=\"btn btn-sm btn-outline-primary\"
                                                       href=\"{{ path('mentor_logbook_action_edit', {
                                                           'nni': app.user.nni,
                                                           'padawanNni': data.user.nni,
                                                           'logbookId': data.logbook.id,
                                                           'moduleId': data.module.id,
                                                           'actionId': data.id
                                                       }) }}\">
                                                        <i class=\"bi bi-pencil\"></i>
                                                        Modifier
                                                    </a>
                                                    <a class=\"btn btn-sm btn-outline-danger\"
                                                       href=\"{{ path('mentor_logbook_action_delete_comment', {
                                                           'nni': app.user.nni,
                                                           'padawanNni': data.user.nni,
                                                           'logbookId': data.logbook.id,
                                                           'moduleId': data.module.id,
                                                           'actionId': data.id
                                                       }) }}\">
                                                        <i class=\"bi bi-trash\"></i>
                                                        Supprimer
                                                    </a>
                                                {% endif %}
                                                {% if not data.mentorVisa %}
                                                    <a href=\"{{ path('mentor_logbook_action_validate', {
                                                        'nni': app.user.nni,
                                                        'padawanNni': data.user.nni,
                                                        'logbookId': data.logbook.id,
                                                        'moduleId': data.module.id,
                                                        'actionId': data.id
                                                    }) }}\" class=\"btn btn-sm btn-outline-success\">
                                                        <i class=\"bi bi-check-circle-fill\"></i>
                                                        Valider
                                                    </a>
                                                {% else %}
                                                    {#.Dévalider le commentaire #}
                                                    <a href=\"{{ path('mentor_logbook_action_invalidate', {
                                                        'nni': app.user.nni,
                                                        'padawanNni': data.user.nni,
                                                        'logbookId': data.logbook.id,
                                                        'moduleId': data.module.id,
                                                        'actionId': data.id
                                                    }) }}\" class=\"btn btn-sm btn-outline-danger\">
                                                        <i class=\"bi bi-x-circle-fill\"></i>
                                                        Dévalider
                                                    </a>
                                                {% endif %}
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    </tbody>
                                </table>
                    </article>

                    <!-- Pagination Controls -->
                    <nav>
                        <ul class=\"pagination justify-content-center\">
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"#\" id=\"prevPage\">Précédent</a>
                            </li>
                            <li class=\"page-item\">
                                <a class=\"page-link\" href=\"#\" id=\"nextPage\">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Filtrage des résultats de recherche
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('.searchable');

            rows.forEach(function(row) {
                if (row.textContent.toLowerCase().indexOf(input) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Pagination
        let currentPage = 1;
        let rowsPerPage = 5; // Nombre de lignes par page

        function paginate() {
            let rows = document.querySelectorAll('.searchable');
            let totalRows = rows.length;
            let totalPages = Math.ceil(totalRows / rowsPerPage);

            rows.forEach((row, index) => {
                row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? '' : 'none';
            });

            // Gérer l'état des boutons de pagination
            document.getElementById('prevPage').parentElement.classList.toggle('disabled', currentPage === 1);
            document.getElementById('nextPage').parentElement.classList.toggle('disabled', currentPage === totalPages);
        }

        document.getElementById('prevPage').addEventListener('click', function(e) {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                paginate();
            }
        });

        document.getElementById('nextPage').addEventListener('click', function(e) {
            e.preventDefault();
            let totalRows = document.querySelectorAll('.searchable').length;
            let totalPages = Math.ceil(totalRows / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                paginate();
            }
        });

        // Initialiser la pagination au chargement
        paginate();
    </script>


{% endblock %}
", "app/dashboard/mentor/logbook_details0.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/app/dashboard/mentor/logbook_details0.html.twig");
    }
}
