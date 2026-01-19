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

/* pages/processus/processus_elementaire.html.twig */
class __TwigTemplate_8a4769090a477e78376b2e5f75b319e0 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "pages/pages.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/processus/processus_elementaire.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pages/processus/processus_elementaire.html.twig"));

        $this->parent = $this->load("pages/pages.html.twig", 1);
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

        yield "Processus MP6MCH03";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "
    ";
        // line 7
        $context["user"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "user", [], "any", false, false, false, 7);
        // line 8
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardHeader.html.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "    ";
        yield from $this->load("app/dashboard/_dashboardAside.html.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "
    <main id=\"main\" class=\"main\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <!-- Breadcrumb -->
                <div class=\"col-12 mb-3\">
                    <nav aria-label=\"breadcrumb\">
                        <ol class=\"breadcrumb\">
                            <li class=\"breadcrumb-item\"><a href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index", ["nni" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "nni", [], "any", false, false, false, 18)]), "html", null, true);
        yield "\" class=\"text-decoration-none\"><i class=\"bi bi-house-door me-1\"></i>Accueil</a></li>
                            <li class=\"breadcrumb-item active\" aria-current=\"page\">Processus élémentaire MP6MCH03</li>
                        </ol>
                    </nav>
                </div>

                <div class=\"col-12\">
                    <div class=\"process-header\">
                        <h1>Carnet de Compagnonnage</h1>
                        <p>Document de référence - CNPE de Penly</p>
                        <span class=\"ref\">Réf. D5039MQMP000320 | Indice 00 | Juin 2023</span>
                    </div>

                    <p>
                        Cette note a pour objectif de définir les rôles de chacun en matière de tutorat et de compagnonnage à l'égard des
                        nouveaux arrivants dans le métier. Elle s'adresse aux managers des services, tuteurs et compagnons pour
                        l'intégration et la professionnalisation des jeunes embauchés et des nouveaux arrivants au sein du CNPE.
                    </p>
                </div>

                <section class=\"col-12\">
                    ";
        // line 40
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-journal-text\"></i>1. Objet et domaine d'application</h2>
                        <p>
                            Cette note présente la déclinaison locale et l'architecture du suivi des activités du Processus Élémentaire
                            « MCH-03 - Réaliser le compagnonnage » sur le CNPE de Penly.
                        </p>
                    </div>

                    ";
        // line 49
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-journal-text\"></i>2. Référentiels</h2>
                        <p>Les documents suivants sont à considérer comme référentiels :</p>
                        <ul class=\"process-list\">
                            <li>D5039 - MQ/MP6 - Motiver et mobiliser les femmes et les hommes</li>
                            <li>D5039 - MQ/MP000211 - Sous-Processus MP6.MCH</li>
                            <li>D4008-NA/DRH-M - Guide du tutorat et du compagnonnage</li>
                            <li>D4008.10.11.15/0432 - Guide de management des compétences à la DPN</li>
                            <li>D4008.10.11.17/0134 - Guide de transmission des savoir-faire et compétences</li>
                        </ul>
                    </div>

                    ";
        // line 62
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-diagram-3\"></i>3. Positionnement</h2>
                        <p>
                            Le Processus Élémentaire « MCH-03 » est rattaché au Sous-Processus MCH « Manager les compétences et les habilitations ».
                            Il est piloté par le Pilote Opérationnel Compétences du site.
                        </p>
                    </div>

                    ";
        // line 71
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-bullseye\"></i>4. Finalité</h2>
                        <p>
                            Dans un contexte évolutif, il s'agit de définir les compétences voulues à moyen et long terme, d'élaborer, déployer et
                            rendre visibles les dispositifs de professionnalisation permettant de les anticiper, les sécuriser et les garantir sur le terrain.
                        </p>

                        <p>
                            La transition des connaissances et de l'expérience vers les nouveaux arrivants et la capitalisation des compétences clés des
                            salariés expérimentés sont des enjeux majeurs plus lorsque le CNPE connaît une période de changement de méthodes et des matériels.
                        </p>
                        <p>
                            Le guide de transmission des savoir-faire et compétences référencé D4008.10.11.17/0134 décrit
                            le Processus de transmission et de développement des savoir-faire et compétences associés à 3
                            situations :
                            <ul class=\"process-list ms-4\">
                                <li>Pour les nouveaux salariés dans les métiers du nucléaire.</li>
                                <li>Lors du départ prochain d'un salarié détenant des compétences rares et sensibles.</li>
                                <li>Le rôle du salarié tout au long de sa vie professionnelle.</li>
                            </ul>
                        </p>
                    </div>

                    ";
        // line 95
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>5. Préambule</h2>
                        <p>
                            Cette note a pour objectif de définir les rôles de chacun en matière de tutorat et de compagnonnage à l'égard des
                            nouveaux arrivants dans le métier.
                        </p>
                        <p>Elle s'adresse aux managers des services, tuteurs et compagnons pour l' intégration
                            et la professionnalisation des jeunes embauchés et des nouveaux arrivants au sein d'un CNPE.
                        </p>
                        <p>
                            Elle intègre des documents permettant d'effectuer le suivi et la traçabilité des actions d'accueil sécurité ainsi que les
                            actions de compagnonnage permettant l'habilitation B0, H0, M0 et RP1 nécessaire à l'autonomie dans les locaux industriels de
                            l'agent en formation.
                        </p>
                        <p>
                            Les annexes se veulent opérationnelles pour un usage direct par les services. Elles peuvent si besoin être déclinées dans
                            les notes des services.
                        </p>
                    </div>

                    ";
        // line 116
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-people\"></i>6. Rôles des différents acteurs</h2>

                        <h3 class=\"subsection-title\">6.1. L'apprenant</h3>
                        <div class=\"ps-3\">
                            <p>
                                Les primo-intervenants et les primo-encadrants sont identifiés. L'apprenant peut être :
                                <ul class=\"process-list ms-4\">
                                    <li>Un agent nouvellement embauché ou muté sur le CNPE.</li>
                                    <li>Un agent redéployé au sein du CNPE.</li>
                                </ul>
                            </p>
                            <p>
                                Il est l'acteur principal du dispositif, c'est lui qui concrétise, en termes de résultats
                                (compétences) les efforts déployés par tous les autres acteurs. Il n'est pas passif, son
                                implication personnelle favorise son intégration dans le collectif de travail, avec son tuteur
                                et sa hiérarchie
                            </p>
                        </div>

                        <h3 class=\"subsection-title\">6.2. Le compagnon</h3>
                        <div class=\"ps-3\">
                            <p>
                                Des référents peuvent être désignés dans les services pour garantir l'acquisition, le
                                maintien et le développement permanent de la qualité du geste professionnel. Ce sont
                                des professionnels expérimentés et reconnus utilisant toutes les modalités de
                                professionnalisation sur le terrain.
                            </p>
                            <p>
                                Le rôle du compagnon est de transmettre essentiellement les savoirs spécifiques aux
                                activités du métier, dans les règles de l'art (utilisation des procédures, respect des règles,
                                attitude interrogative, communication, pratiques de fiabilisation...).
                            </p>
                            <p>
                                Le compagnon est un agent confirmé et reconnu dans son métier. C'est un collègue de
                                travail ou un coach/référent « PPH ». Il n'a pas de relation hiérarchique vis-à-vis de
                                l'apprenant. Il est sollicité par le tuteur.
                            </p>
                            <p>
                                En pratique, le compagnon :
                                <ul class=\"process-list ms-4\">
                                    <li>Favorise les mises en situation du nouvel arrivant selon les axes définis avec le
                                    tuteur et en lien avec le carnet de compagnonnage.</li>
                                    <li>Transmet, sur le terrain, les gestes et les bonnes attitudes permettant de réaliser
                                    intégralement les activités.</li>
                                    <li>Prend en compte le compagnonnage pour toutes les phases de l'activité.</li>
                                    <li>Vérifie l'atteinte des objectifs tels que définis avec le tuteur.</li>
                                </ul>
                            </p>
                        </div>

                        <h3 class=\"subsection-title\">6.3. Le tuteur (dénommé également maître de professionnalisation)</h3>
                        <div class=\"ps-3\">
                            <p>
                                Le tuteur est un agent formellement missionné par son manager afin d'encadrer, de
                                former, d'accompagner une personne nouvellement arrivée sur le site durant sa période
                                de formation afin de faciliter son intégration dans l'Entreprise, l'unité, l'équipe de travail.
                            </p>
                            <p>
                                Il peut confier à un ou plusieurs compagnons l'apprentissage de certains savoirs.
                            </p>
                            <p>
                                Cette période d'intégration sera aussi le moment essentiel pendant laquelle le tuteur
                                communique au nouvel arrivant une culture professionnelle propre au nucléaire.
                                Le tuteur est évalué sur la réussite de la mission de tutorat confiée. En pratique, le
                                tuteur :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Renseigne et veille à la bonne tenue du carnet de compagnonnage.</li>
                                <li>Prévoit et organise le temps de travail.</li>
                                <li>Est un médiateur et un interlocuteur privilégié pour l'apprenant.</li>
                                <li>Assure la relation avec le système de formation (correspondant formation du
                                service).</li>
                                <li>Apprécie la progression de l'apprenant et évalue ses compétences sur l'ensemble du
                                champ attendu en prenant en compte les retours des compagnons.</li>
                                <li>Valide formellement les acquis et les trace dans le carnet de compagnonnage.</li>
                                <li>Donne son avis au Chef d'Équipe (ou de Service) sur le professionnalisme et les
                                compétences de l'apprenant en vue de l'habilitation.</li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title\">6.4. Le manager</h3>
                        <div class=\"ps-3\">
                            <p>C'est avant tout un superviseur. Il peut s'agir du Chef de Service ou du Chef d'Équipe. En
                            pratique, le manager :</p>
                            <ul class=\"process-list ms-4\">
                                <li>Nomme et missionne le tuteur via lettre de mission (<a href=\"#annexe1\">annexe 1</a>).</li>
                                <li>Valide le programme de professionnalisation (formations, immersions,
                                compagnonnage...).</li>
                                <li>Valide périodiquement (entretiens trimestriels) avec le tuteur et l'apprenant, la
                                progression de l'apprentissage.</li>
                                <li>Valide, avec le tuteur, le bilan final du compagnonnage en vue de l'habilitation.</li>
                                <li>Habilite le nouvel arrivé.</li>
                                <li>Apprécie la contribution du tuteur.</li>
                                <li>Apprécie les contributions des compagnons.</li>
                                <li>Évalue par des visites sur le terrain l'efficacité de l'action de tutorat -
                                compagnonnage.
                            </ul>
                        </div>

                        <h3 class=\"subsection-title\">6.5. Choix du tuteur</h3>
                        <div class=\"ps-3\">
                            <p>
                                Il dispose d'une légitimité professionnelle au sein du métier, il est en dehors de la
                                ligne managériale.
                            </p>
                            <p>
                                Il doit développer, par ailleurs, des compétences transverses d'ordre relationnel,
                                pédagogique et d'organisation. Le tuteur doit être capable de :
                                <strong class=\"text-decoration-underline d-block\">Compétences relationnelles</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Identifier, chez l'apprenant, ses difficultés à s'insérer dans le métier et l'équipe.</li>
                                    <li>Conduire un entretien.</li>
                                    <li>Être dans une attitude d'écoute.</li>
                                    <li>Créer des situations de communication dans le contexte hiérarchisé des industries
                                    (c'est souvent une découverte pour les apprentis et les jeunes embauchés).</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block\">Compétences pédagogiques</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Présenter à l'apprenant les différents aspects de son métier.</li>
                                    <li>Définir et présenter l'organisation du travail et du CNPE.</li>
                                    <li>Formuler des objectifs qui feront ensuite l'objet d'une évaluation.</li>
                                    <li>Évaluer et construire la progression pédagogique en lien avec les objectifs visés.</li>
                                    <li>Varier les méthodes pédagogiques (expliquer, montrer, mettre en situation).</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block\">Compétences organisationelles</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Identifier ses interlocuteurs et leurs attentes.</li>
                                    <li>Identifier les ressources et les moyens d'y accéder, négocier avec les différents
                                    interlocuteurs en tenant compte de leurs attentes.</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block ms-4\">Conseil:</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Cette mission n'est pas réservée aux agents ayant une longue expérience dans le
                                        métier considéré mais aux agents ayant les aptitudes (la valeur d'un tuteur n'attend
                                        pas le nombre des années).
                                    </li>
                                    <li>
                                        La mission tutorale représente un investissement personnel pour le tuteur, elle
                                        nécessite une certaine disponibilité ainsi qu'une capacité à remettre en cause ses
                                        savoirs et à les structurer pour mieux les transmettre. C'est pourquoi, le tuteur doit
                                        donner son accord pour la mission qui lui est proposée. Il conserve la
                                        responsabilité de l'action pendant toute sa durée.
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>

                    ";
        // line 266
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>7. Préparation et perfectionnement au rôle du tuteur</h2>
                        <p>
                            L'accompagnement des tuteurs dans leur mission est une responsabilité de l'organisation. Il
                            convient de fournir aux tuteurs, d'une part, un environnement susceptible de leur faciliter la tâche
                            et d'autre part, des points d'appui qui les aideront dans l'accomplissement de leur mission tel
                            que :
                        </p>
                        <ul class=\"process-list ms-4\">
                            <li>La possibilité de suivre une action de formation adaptée (formation tutorat dans le cadre d'un apprentissage).</li>
                            <li>La possibilité de suivre une formation référent PFI MG020.</li>
                            <li>Sur les aspects de pratiques pédagogiques, possibilité de solliciter un formateur en
                                passant par le Service Commun de Formation.
                            </li>
                        </ul>
                    </div>

                    ";
        // line 284
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>8. Le carnet de compagnonnage</h2>
                        <p>
                            Le carnet de compagnonnage est un guide permettant d'amener le nouvel arrivant au niveau
                            de connaissances et de compétences minimum lui permettant d'exercer son activité.
                        </p>
                        <p>
                            Il intègre particulièrement les connaissances et compétences nécessaires à l'obtention des
                            habilitations « Sûreté Nucléaire » (SN) ainsi que les habilitations classiques des domaines
                            tels qu'électrique, radioprotection, mécanique.
                        </p>
                        <p>
                            Il mentionne les capacités acquises et les validations associées réalisées par le tuteur ou les
                            compagnons.
                        </p>
                        <p>
                            Le carnet de compagnonnage est à disposition du manager lors des entretiens trimestriels
                            de titularisation pour le nouvel embauché ou lors des entretiens individuels pour l'agent
                            découvrant le métier ou encore à l'occasion de la reconduction des titres d'habilitation.
                        </p>
                        <p>Une fois complété, le carnet de compagnonnage sera archivé dans le CIF de l'agent.</p>
                    </div>

                    ";
        // line 308
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>9. La mise en oeuvre de la professionnalisation</h2>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.1. Première étape: la définition des compétences à acquérir</h3>
                        <div class=\"ps-3\">
                            <p>L'habilitation repose sur un référentiel de compétences qui comprend des objectifs généraux :</p>
                            <ul class=\"process-list ms-4\">
                                <li>Une culture sûreté leur permettant d'appréhender chaque intervention dans un
                                    esprit critique, d'utiliser les documents existants, de signaler les écarts et de
                                    mettre en oeuvre les pratiques de fiabilisation adaptées.
                                </li>
                                <li>Une connaissance des installations et des matériels.</li>
                                <li>Une connaissance des risques vis-à-vis de la sûreté, de la sécurité et de la
                                    radioprotection.
                                </li>
                                <li>Une connaissance de l'organisation du CNPE, du service et des différents pôles.</li>
                            </ul>
                            <p>Et des objectifs au métier :</p>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    Les référentiels de compétences incluant les domaines d'activités et les observables
                                    associés à chaque domaine.
                                </li>
                                <li>
                                    Parmi les domaines d'activité, la hiérarchie met en détermine les domaines prioritaires sur lesquels habiliter
                                    le nouvel arrivant lorsque cela est possible.
                                </li>
                            </ul>
                            <p>
                                Les guides ou fiches de compagnonnage sont établis dans les services à partir de ces
                                référentiels de compétences. Ils couvrent, avec les autres formations, l'ensemble des domaines.
                                <strong class=\"text-decoration-underline d-block p-0\">Conseil:</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Le hiérarchique balaye avec le tuteur le contenu du carnet de compagnonnage dans le but de partager le même niveau d'exigence.</li>
                                </ul>
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.2. Deuxième étape: Le missionnement des tuteurs et compagnons</h3>
                        <div class=\"ps-3\">
                            <p>Le manager et le tuteur se rencontrent pour établir les objectifs de la mission tutorale et
                                les moyens associés : temps, compagnons à solliciter au regard des domaines priorisés
                                de la professionnalisation, rapports d'étape, délais...
                            </p>
                            <p>Ces éléments sont formalisés dans une lettre de mission.</p>
                            <strong class=\"text-decoration-underline d-block ms-4\">Conseil:</strong>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    Si le tuteur assure directement la formation, ne pas lui confier plus de deux missions
                                    tutorales simultanées.
                                </li>
                                <li>
                                    Dans le cas où une véritable équipe (tuteur et compagnons) est mise en place, l'effet
                                    « promotion » renforce la dynamique d'apprentissage. La taille de la promotion est à
                                    définir conjointement avec le tuteur.
                                </li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.3. Troisième étape: Le missionnement des tuteurs et compagnons</h3>
                        <div class=\"ps-3\">
                            <p>
                            L'élaboration du programme de professionnalisation est complétée par la préparation des
                            aspects logistiques et des différentes actions réalisées à l'accueil de l'agent.
                            </p>
                            <p>Ces éléments sont formalisés dans une lettre de mission.</p>
                            <strong class=\"text-decoration-underline d-block\">Les immersions:</strong>
                            <p>
                                Les immersions permettent de découvrir l'aspect transverse des organisations et les
                                contraintes et bonnes pratiques des autres métiers.
                            </p>
                            <p>
                                Pour les jeunes embauchés, il peut comprendre aussi une immersion dans un autre
                                CNPE et/ou une AMT.
                            </p>
                            <p>
                                <strong class=\"text-decoration-underline d-block\">Conseil:</strong>
                                Dès ce stade, contacter les Services du CNPE sur lesquels les détachements sont
                                envisagés.
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.4. Quatrième étape: Préparation de l'accueil du nouvel arrivant, la logistique</h3>
                        <div class=\"ps-3\">
                            <p>
                                L'accueil du nouvel arrivant est une des conditions de réussite de son intégration,
                                il comporte a minima les actions suivantes :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Formalités d'accès sur le site.</li>
                                <li>Règlement des aspects pratiques (protections individuelles, accès cantine, lieu de
                                travail, ...) figurant dans le guide d accueil du nouvel arrivant.</li>
                                <li>Présentation de l'arrivant dans l'équipe de travail.</li>
                                <li>Présentation du dispositif de professionnalisation.</li>
                                <li>Présentation du carnet de compagnonnage.</li>
                               <li>Présentation à la hiérarchie du service (passage en EDS).</li>
                            </ul>
                            <p>
                                Le guide pour l'accueil du nouvel arrivant en <a class=\"link-annexe\" href=\"#annexe2\">annexe 2</a> liste l'ensemble des points
                                à transmettre à l'apprenant et se divise en 3 parties :
                            </p>
                            <ol class=\"process-list ms-4\">
                                <li>Logistique.</li>
                                <li>Accueil sécurité.</li>
                                <li>État des installations.</li>
                            </ol>
                            <p>
                                La partie « Accueil sécurité » répond sous forme de compagnonnage à l'obligation
                                réglementaire pour l'employeur de présenter à tout nouvel arrivant les risques
                                sécurité qu'il peut être amené à rencontrer.
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.5. Le suivi de la professionnalisation</h3>
                        <div class=\"ps-3\">
                            <p>
                                Le suivi de la professionnalisation passe par la formalisation des différentes étapes à
                                travers le carnet de compagnonnage et/ou des comptes-rendus d'entretiens
                                individuels. Ces éléments sont susceptibles d'être vérifiés par le Chef de Service ou
                                lors d'inspections internes voir externes.
                            </p>
                            <p>
                                Par ailleurs, les apprentissages « terrain » doivent être articulés avec les
                                apprentissages en stage (vérification des pré-requis avant le stage, vérification des
                                acquis après le stage, levée des axes de progrès, mise en situation professionnelle).
                            </p>
                            <p>
                                Le tuteur a un rôle d'ensemblier sur la totalité des modalités de professionnalisation
                                (stage, compagnonnage, détachement, ...). Il assure le suivi de la professionnalisation de son nouvel arrivant et en rend compte à son manager.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Important:</strong>
                            <p>
                                Sans être habilité, un apprenant peut réaliser une action nécessitant une habilitation SN
                                en étant placé sous la responsabilité directe et permanente de son tuteur ou compagnon.
                                Ce dernier possède les habilitations requises pour cette action et se sera assuré au
                                préalable que son apprenti est en mesure d'effectuer l'action en toute sécurité,
                                connaissance et compréhension du geste. Il reste physiquement aux côtés de
                                l apprenant.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Conseil:</strong>
                            <ul class=\"process-list ms-4\">
                                <li>Ne pas oublier la vérification des pré-requis avant le départ en formation de
                                    l'apprenant.
                                </li>
                                <li>Ne pas oublier la levée des axes de progrès au retour de stage.</li>
                            </ul>
                            <strong class=\"text-decoration-underline d-block\">Académie savoirs communs (AKSC)</strong>
                            <p>
                                L'Académie des métiers Savoirs Communs (AK SC) fait partie du processus
                                d'intégration du nouvel arrivant. Cette formation de huit semaines permet rapidement
                                de suivre la majorité des stages requis pour s'approprier les fondamentaux du
                                nucléaire et mieux comprendre l'environnement de travail en CNPE.
                            </p>
                            <p>
                                Elle permet aussi au manager de délivrer une première habilitation après validation des acquis sur le terrain.
                                <br>Ce dispositif a pour but :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    D'assurer l'acquisition et le transfert des compétences, au plus près du terrain, par une
                                    alternance de formation théorique en salle, et de formations pratiques sur le terrain.
                                </li>
                                <li>
                                    Amener le plus rapidement possible tous les nouveaux arrivants, qu'ils soient
                                    nouveaux embauchés ou en redéploiement depuis d'autres entités du groupe, à la
                                    situation d'obtention des habilitations progressives leur permettant d'exercer leur futur
                                    métier sur des champs de plus en plus élargis.
                                </li>
                                <li>
                                    Par l'effet promotion, dynamiser et accélérer l'intégration, l'acculturation et la
                                    professionnalisation des nouveaux arrivants, ainsi que mettre en oeuvre des synergies
                                    et des réseaux profitables et pérennes.
                                </li>
                                <li>
                                    Favoriser la présence des hiérarchiques et des opérationnels dans l'intégration de la
                                    formation.
                                </li>
                                <li>
                                    D'assurer la transmission des savoir-faire par des salariés expérimentés du CNPE qui
                                    portent certains sujets/modules du parcours.
                                </li>
                            </ul>
                            <p>
                                Pour tout nouvel arrivant dans le nucléaire, cette action de professionnalisation est la
                                première partie destinée pour acquérir les bases des métiers du nucléaire avant
                                d'aborder des parcours plus spécifiques liés à leur métier.
                            </p>
                            <p>
                                À l'issue de cette AKSC, ou durant les phases de retour dans le service, l apprenant
                                devra acquérir les bases techniques du métier concerné.
                            </p>
                            <p>
                                Que ce soit durant l'AKSC ou à l'issue de celle-ci, le tuteur a un rôle important
                                d'accompagnement et de soutien, il doit notamment :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Assurer un contact régulier avec l'académicien et apporter son aide en cas de difficultés.</li>
                                <li>Consolider l'acquisition des connaissances et compétences pendant les périodes
                                    dans le(s) service(s).
                                </li>
                                <li>Apporter un appui lors des périodes d immersion dans un autre service.</li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.6. Sixième étape: Le suivi des apprenants</h3>
                        <div class=\"ps-3\">
                            <p>
                                Au-delà des points trimestriels entre le manager, le tuteur et l'apprenant, il y a une
                                réunion un peu plus formelle au cours de laquelle est réalisé le bilan des acquis
                                professionnels en vue de la première habilitation.
                            </p>
                            <p>
                                À l'occasion de ce bilan, chacun fait ressortir les points forts et les points à améliorer
                                du dispositif qui vient de se dérouler afin de progresser ensemble.
                            </p>
                            <p>
                                La validation des acquis professionnels relève du tuteur et la décision d'habiliter
                                sur les domaines d'activité concernés relève du Chef de Service.
                            </p>
                            <p>
                                Au-delà de la première habilitation, le tuteur, le manager et l'apprenant sont amenés
                                à se rencontrer régulièrement pour étendre progressivement le champ d'habilitation
                                du nouvel arrivant (habilitation progressive).
                            </p>
                            <p>
                                Conformément aux dispositions associées aux habilitations et aux Observations en
                                Situation de Travail (OST), reprises dans la note de Sous-Processus D 5039 -
                                MQ/MP000321, la délivrance des habilitations, autorisations, qualifications, s appuie sur
                                la base des compétences démontées et évaluées via les OST.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Conseil :</strong>
                            <ul>
                                <li>
                                    Laisser une large part d'expression et de participation à l'apprenant, et de pas
                                    résumer la phase de bilan à une simple évaluation de l'apprenant.
                                </li>
                                <li>
                                    Favoriser, lorsque le métier le permet l'habilitation progressive par domaine afin
                                    de responsabiliser l'apprenant au plus tôt.
                                </li>
                            </ul>
                        </div>
                    </div>

                    ";
        // line 553
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\">10. Formation d'accueil sécurité du nouvel arrivant</h2>
                        <div class=\"ps-3\">
                            <p>
                                Cette formation est traitée par compagnonnage. Cette partie du compagnonnage est à
                                réaliser dans le mois suivant l'arrivée de l'agent conformément à la réglementation du code
                                du travail. Elle n'ouvre pas droit à une quelconque habilitation. Le périmètre (présentation
                                des risques, pictogrammes, sorties de secours... ) se limite aux locaux où l'agent est laissé
                                en autonomie sans tuteur ou compagnon. Sans les habilitations requises, l'agent n'est pas
                                autorisé à circuler seul (sans tuteur) dans les locaux industriels.
                            </p>
                            <p>
                                La fiche n° 2 du guide nouvel arrivant en annexe 2 formalise ce compagnonnage, fiche
                                renseignée par l'agent et validée par le tuteur.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Important:</strong>
                            <p>
                                <strong>
                                    Cette annexe est perspective dans sa forme et son contenu. Elle est réalisée dans le mois
                                    qui suit l'arrivée de l'agent. Elle est archivée dans le CIF de l'agent.
                                </strong>
                            </p>
                        </div>
                    </div>

                    ";
        // line 579
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\">11. Habilitations requises pour l'apprenant</h2>
                        <div class=\"ps-3\">
                            <p>
                                Pour circuler de manière autonome dans les locaux industriels, l'agent doit connaître les
                                risques associés et adapter son comportement aux différentes situations rencontrées aussi
                                bien en situation normale (port des EPI, comportement à proximité d'un chantier, respect des
                                balisages, affichages...) qu'en situation incidentelle (actions en cas de feu, PUI...).
                            </p>
                            <p>
                                Le guide de compagnonnage « Module RP1, B0, H0, M0 » en annexe 3 permet l'habilitation
                                RP1, M0, H0 et B0 restreint aux interventions sur du matériel hors tension et accès aux
                                locaux réservés. Ceci, lorsque les 2 phases savoirs théoriques, savoirs pratiques et mise en
                                application sont validées par le tuteur.
                            </p>
                            <p>
                                À l'issue de cette phase de compagnonnage, l'agent est capable d'accéder, de se déplacer,
                                de sortir des zones conventionnelles et nucléaires en utilisant les moyens de protection
                                adaptés aux risques rencontrés.
                            </p>
                            <p>
                                Cette annexe, fournie à titre d'exemple, peut être utilisée telle quelle par le service ou
                                déclinée dans une note du service.
                            </p>
                        </div>
                    </div>

                    ";
        // line 607
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\">12. Synthèse du dispositif de professionnalisation d'un nouveau salarié dans un métier de la DPN</h2>
                        <small class=\"text-center\">
                            Le dispositif de professionnalisation du nouvel arrivant est synthétisé dans le schèma ci-dessous :
                        </small>
                        <img class=\"img-fluid px-5\" src=\"";
        // line 612
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/docs/dispositif_professionalisation.png"), "html", null, true);
        yield "\" style=\"width: 75%; height: auto;\" alt=\"Dispositif de professionnalisation\">
                    </div>

                    ";
        // line 616
        yield "                    <div class=\"content-card\">
                        <h2 class=\"section-title\">13. Les académies savoir spécifiques métier</h2>
                        <p>
                            Ce dispositif national des académies des métiers spécifiques est piloté par l'animation métier qui
                            en est la MOA et l'UFPI la MOE. Il est adapté à chaque métier pour répondre au mieux aux
                            performances portées par les métiers de la DPN.
                        </p>
                        <p>Ce dispositif a pour objectif de :</p>
                        <ul class=\"process-list ms-4\">
                            <li>
                                Acquérir les connaissances techniques et les savoir-faire indispensables sur le plan individuel
                                pour réaliser les activités de base du métier au sein d'une équipe.
                            </li>
                            <li>
                                Acquérir la culture du métier et la mettre en oeuvre au sein du service et lors d'interaction avec
                                d'autres services du site.
                            </li>
                            <li>Maîtriser et respecter les fondamentaux des métiers.</li>
                            <li>Acquérir les démarches qualités réfléchies et rigoureuse visant à fiabiliser les interventions.</li>
                            <li>
                                Professionnaliser les salariés aux pratiques de fiabilisation, à la maîtrise du risque incendie, à
                                l'utilisation de l'Analyse de Risques, et à l'État exemplaire des installations.
                            </li>
                            <li>Situer les activités dans le fonctionnement global d'une centrale nucléaire.</li>
                            <li>S'intégrer dans une équipe de travail et de travailler en équipe.</li>
                            <li>
                                Intervenir en Zone Contrôlée en respectant les régies de sécurité conventionnelles et de
                                Radioprotection et les consignes affichées.
                            </li>
                        </ul>
                        <p>
                            La réalisation du parcours académie spécifique métier permet au manager, après la validation
                            des acquis sur le terrain, de délivrer les habilitations RP2, SN2, ainsi que les habilitations
                            spécifiques au métier.
                        </p>
                    </div>

                </section>

                <section id=\"annexes\">
                </section>
            </div>
            <div class=\"col-12\">
                <p class=\"mb-0\">
                    <i class=\"bi bi-file-earmark-text me-1\"></i> Document issu de la GED DPI Nucléaire — 08/07/2025
                </p>
            </div>
        </div>
    </main>
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
        return "pages/processus/processus_elementaire.html.twig";
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
        return array (  736 => 616,  730 => 612,  723 => 607,  694 => 579,  667 => 553,  421 => 308,  396 => 284,  377 => 266,  226 => 116,  204 => 95,  179 => 71,  169 => 62,  155 => 49,  145 => 40,  121 => 18,  111 => 10,  108 => 9,  105 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'pages/pages.html.twig' %}

{% block title %}Processus MP6MCH03{% endblock %}

{% block content %}

    {% set user = app.user %}
    {% include('app/dashboard/_dashboardHeader.html.twig') %}
    {% include('app/dashboard/_dashboardAside.html.twig') %}

    <main id=\"main\" class=\"main\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <!-- Breadcrumb -->
                <div class=\"col-12 mb-3\">
                    <nav aria-label=\"breadcrumb\">
                        <ol class=\"breadcrumb\">
                            <li class=\"breadcrumb-item\"><a href=\"{{ path('dashboard_index', {'nni': app.user.nni}) }}\" class=\"text-decoration-none\"><i class=\"bi bi-house-door me-1\"></i>Accueil</a></li>
                            <li class=\"breadcrumb-item active\" aria-current=\"page\">Processus élémentaire MP6MCH03</li>
                        </ol>
                    </nav>
                </div>

                <div class=\"col-12\">
                    <div class=\"process-header\">
                        <h1>Carnet de Compagnonnage</h1>
                        <p>Document de référence - CNPE de Penly</p>
                        <span class=\"ref\">Réf. D5039MQMP000320 | Indice 00 | Juin 2023</span>
                    </div>

                    <p>
                        Cette note a pour objectif de définir les rôles de chacun en matière de tutorat et de compagnonnage à l'égard des
                        nouveaux arrivants dans le métier. Elle s'adresse aux managers des services, tuteurs et compagnons pour
                        l'intégration et la professionnalisation des jeunes embauchés et des nouveaux arrivants au sein du CNPE.
                    </p>
                </div>

                <section class=\"col-12\">
                    {# 1. Objet et domaine d'application #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-journal-text\"></i>1. Objet et domaine d'application</h2>
                        <p>
                            Cette note présente la déclinaison locale et l'architecture du suivi des activités du Processus Élémentaire
                            « MCH-03 - Réaliser le compagnonnage » sur le CNPE de Penly.
                        </p>
                    </div>

                    {# 2. Référentiels #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-journal-text\"></i>2. Référentiels</h2>
                        <p>Les documents suivants sont à considérer comme référentiels :</p>
                        <ul class=\"process-list\">
                            <li>D5039 - MQ/MP6 - Motiver et mobiliser les femmes et les hommes</li>
                            <li>D5039 - MQ/MP000211 - Sous-Processus MP6.MCH</li>
                            <li>D4008-NA/DRH-M - Guide du tutorat et du compagnonnage</li>
                            <li>D4008.10.11.15/0432 - Guide de management des compétences à la DPN</li>
                            <li>D4008.10.11.17/0134 - Guide de transmission des savoir-faire et compétences</li>
                        </ul>
                    </div>

                    {# 3. Positionnement #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-diagram-3\"></i>3. Positionnement</h2>
                        <p>
                            Le Processus Élémentaire « MCH-03 » est rattaché au Sous-Processus MCH « Manager les compétences et les habilitations ».
                            Il est piloté par le Pilote Opérationnel Compétences du site.
                        </p>
                    </div>

                    {# 4. Finalité #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-bullseye\"></i>4. Finalité</h2>
                        <p>
                            Dans un contexte évolutif, il s'agit de définir les compétences voulues à moyen et long terme, d'élaborer, déployer et
                            rendre visibles les dispositifs de professionnalisation permettant de les anticiper, les sécuriser et les garantir sur le terrain.
                        </p>

                        <p>
                            La transition des connaissances et de l'expérience vers les nouveaux arrivants et la capitalisation des compétences clés des
                            salariés expérimentés sont des enjeux majeurs plus lorsque le CNPE connaît une période de changement de méthodes et des matériels.
                        </p>
                        <p>
                            Le guide de transmission des savoir-faire et compétences référencé D4008.10.11.17/0134 décrit
                            le Processus de transmission et de développement des savoir-faire et compétences associés à 3
                            situations :
                            <ul class=\"process-list ms-4\">
                                <li>Pour les nouveaux salariés dans les métiers du nucléaire.</li>
                                <li>Lors du départ prochain d'un salarié détenant des compétences rares et sensibles.</li>
                                <li>Le rôle du salarié tout au long de sa vie professionnelle.</li>
                            </ul>
                        </p>
                    </div>

                    {# 5. Préambule #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>5. Préambule</h2>
                        <p>
                            Cette note a pour objectif de définir les rôles de chacun en matière de tutorat et de compagnonnage à l'égard des
                            nouveaux arrivants dans le métier.
                        </p>
                        <p>Elle s'adresse aux managers des services, tuteurs et compagnons pour l' intégration
                            et la professionnalisation des jeunes embauchés et des nouveaux arrivants au sein d'un CNPE.
                        </p>
                        <p>
                            Elle intègre des documents permettant d'effectuer le suivi et la traçabilité des actions d'accueil sécurité ainsi que les
                            actions de compagnonnage permettant l'habilitation B0, H0, M0 et RP1 nécessaire à l'autonomie dans les locaux industriels de
                            l'agent en formation.
                        </p>
                        <p>
                            Les annexes se veulent opérationnelles pour un usage direct par les services. Elles peuvent si besoin être déclinées dans
                            les notes des services.
                        </p>
                    </div>

                    {# 6. Rôles des différents acteurs #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-people\"></i>6. Rôles des différents acteurs</h2>

                        <h3 class=\"subsection-title\">6.1. L'apprenant</h3>
                        <div class=\"ps-3\">
                            <p>
                                Les primo-intervenants et les primo-encadrants sont identifiés. L'apprenant peut être :
                                <ul class=\"process-list ms-4\">
                                    <li>Un agent nouvellement embauché ou muté sur le CNPE.</li>
                                    <li>Un agent redéployé au sein du CNPE.</li>
                                </ul>
                            </p>
                            <p>
                                Il est l'acteur principal du dispositif, c'est lui qui concrétise, en termes de résultats
                                (compétences) les efforts déployés par tous les autres acteurs. Il n'est pas passif, son
                                implication personnelle favorise son intégration dans le collectif de travail, avec son tuteur
                                et sa hiérarchie
                            </p>
                        </div>

                        <h3 class=\"subsection-title\">6.2. Le compagnon</h3>
                        <div class=\"ps-3\">
                            <p>
                                Des référents peuvent être désignés dans les services pour garantir l'acquisition, le
                                maintien et le développement permanent de la qualité du geste professionnel. Ce sont
                                des professionnels expérimentés et reconnus utilisant toutes les modalités de
                                professionnalisation sur le terrain.
                            </p>
                            <p>
                                Le rôle du compagnon est de transmettre essentiellement les savoirs spécifiques aux
                                activités du métier, dans les règles de l'art (utilisation des procédures, respect des règles,
                                attitude interrogative, communication, pratiques de fiabilisation...).
                            </p>
                            <p>
                                Le compagnon est un agent confirmé et reconnu dans son métier. C'est un collègue de
                                travail ou un coach/référent « PPH ». Il n'a pas de relation hiérarchique vis-à-vis de
                                l'apprenant. Il est sollicité par le tuteur.
                            </p>
                            <p>
                                En pratique, le compagnon :
                                <ul class=\"process-list ms-4\">
                                    <li>Favorise les mises en situation du nouvel arrivant selon les axes définis avec le
                                    tuteur et en lien avec le carnet de compagnonnage.</li>
                                    <li>Transmet, sur le terrain, les gestes et les bonnes attitudes permettant de réaliser
                                    intégralement les activités.</li>
                                    <li>Prend en compte le compagnonnage pour toutes les phases de l'activité.</li>
                                    <li>Vérifie l'atteinte des objectifs tels que définis avec le tuteur.</li>
                                </ul>
                            </p>
                        </div>

                        <h3 class=\"subsection-title\">6.3. Le tuteur (dénommé également maître de professionnalisation)</h3>
                        <div class=\"ps-3\">
                            <p>
                                Le tuteur est un agent formellement missionné par son manager afin d'encadrer, de
                                former, d'accompagner une personne nouvellement arrivée sur le site durant sa période
                                de formation afin de faciliter son intégration dans l'Entreprise, l'unité, l'équipe de travail.
                            </p>
                            <p>
                                Il peut confier à un ou plusieurs compagnons l'apprentissage de certains savoirs.
                            </p>
                            <p>
                                Cette période d'intégration sera aussi le moment essentiel pendant laquelle le tuteur
                                communique au nouvel arrivant une culture professionnelle propre au nucléaire.
                                Le tuteur est évalué sur la réussite de la mission de tutorat confiée. En pratique, le
                                tuteur :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Renseigne et veille à la bonne tenue du carnet de compagnonnage.</li>
                                <li>Prévoit et organise le temps de travail.</li>
                                <li>Est un médiateur et un interlocuteur privilégié pour l'apprenant.</li>
                                <li>Assure la relation avec le système de formation (correspondant formation du
                                service).</li>
                                <li>Apprécie la progression de l'apprenant et évalue ses compétences sur l'ensemble du
                                champ attendu en prenant en compte les retours des compagnons.</li>
                                <li>Valide formellement les acquis et les trace dans le carnet de compagnonnage.</li>
                                <li>Donne son avis au Chef d'Équipe (ou de Service) sur le professionnalisme et les
                                compétences de l'apprenant en vue de l'habilitation.</li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title\">6.4. Le manager</h3>
                        <div class=\"ps-3\">
                            <p>C'est avant tout un superviseur. Il peut s'agir du Chef de Service ou du Chef d'Équipe. En
                            pratique, le manager :</p>
                            <ul class=\"process-list ms-4\">
                                <li>Nomme et missionne le tuteur via lettre de mission (<a href=\"#annexe1\">annexe 1</a>).</li>
                                <li>Valide le programme de professionnalisation (formations, immersions,
                                compagnonnage...).</li>
                                <li>Valide périodiquement (entretiens trimestriels) avec le tuteur et l'apprenant, la
                                progression de l'apprentissage.</li>
                                <li>Valide, avec le tuteur, le bilan final du compagnonnage en vue de l'habilitation.</li>
                                <li>Habilite le nouvel arrivé.</li>
                                <li>Apprécie la contribution du tuteur.</li>
                                <li>Apprécie les contributions des compagnons.</li>
                                <li>Évalue par des visites sur le terrain l'efficacité de l'action de tutorat -
                                compagnonnage.
                            </ul>
                        </div>

                        <h3 class=\"subsection-title\">6.5. Choix du tuteur</h3>
                        <div class=\"ps-3\">
                            <p>
                                Il dispose d'une légitimité professionnelle au sein du métier, il est en dehors de la
                                ligne managériale.
                            </p>
                            <p>
                                Il doit développer, par ailleurs, des compétences transverses d'ordre relationnel,
                                pédagogique et d'organisation. Le tuteur doit être capable de :
                                <strong class=\"text-decoration-underline d-block\">Compétences relationnelles</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Identifier, chez l'apprenant, ses difficultés à s'insérer dans le métier et l'équipe.</li>
                                    <li>Conduire un entretien.</li>
                                    <li>Être dans une attitude d'écoute.</li>
                                    <li>Créer des situations de communication dans le contexte hiérarchisé des industries
                                    (c'est souvent une découverte pour les apprentis et les jeunes embauchés).</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block\">Compétences pédagogiques</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Présenter à l'apprenant les différents aspects de son métier.</li>
                                    <li>Définir et présenter l'organisation du travail et du CNPE.</li>
                                    <li>Formuler des objectifs qui feront ensuite l'objet d'une évaluation.</li>
                                    <li>Évaluer et construire la progression pédagogique en lien avec les objectifs visés.</li>
                                    <li>Varier les méthodes pédagogiques (expliquer, montrer, mettre en situation).</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block\">Compétences organisationelles</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Identifier ses interlocuteurs et leurs attentes.</li>
                                    <li>Identifier les ressources et les moyens d'y accéder, négocier avec les différents
                                    interlocuteurs en tenant compte de leurs attentes.</li>
                                </ul>
                                <strong class=\"text-decoration-underline d-block ms-4\">Conseil:</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Cette mission n'est pas réservée aux agents ayant une longue expérience dans le
                                        métier considéré mais aux agents ayant les aptitudes (la valeur d'un tuteur n'attend
                                        pas le nombre des années).
                                    </li>
                                    <li>
                                        La mission tutorale représente un investissement personnel pour le tuteur, elle
                                        nécessite une certaine disponibilité ainsi qu'une capacité à remettre en cause ses
                                        savoirs et à les structurer pour mieux les transmettre. C'est pourquoi, le tuteur doit
                                        donner son accord pour la mission qui lui est proposée. Il conserve la
                                        responsabilité de l'action pendant toute sa durée.
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>

                    {# 7. Préparation et perfectionnement au rôle du tuteur #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>7. Préparation et perfectionnement au rôle du tuteur</h2>
                        <p>
                            L'accompagnement des tuteurs dans leur mission est une responsabilité de l'organisation. Il
                            convient de fournir aux tuteurs, d'une part, un environnement susceptible de leur faciliter la tâche
                            et d'autre part, des points d'appui qui les aideront dans l'accomplissement de leur mission tel
                            que :
                        </p>
                        <ul class=\"process-list ms-4\">
                            <li>La possibilité de suivre une action de formation adaptée (formation tutorat dans le cadre d'un apprentissage).</li>
                            <li>La possibilité de suivre une formation référent PFI MG020.</li>
                            <li>Sur les aspects de pratiques pédagogiques, possibilité de solliciter un formateur en
                                passant par le Service Commun de Formation.
                            </li>
                        </ul>
                    </div>

                    {# 8. Le carnet de compagnonnage #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>8. Le carnet de compagnonnage</h2>
                        <p>
                            Le carnet de compagnonnage est un guide permettant d'amener le nouvel arrivant au niveau
                            de connaissances et de compétences minimum lui permettant d'exercer son activité.
                        </p>
                        <p>
                            Il intègre particulièrement les connaissances et compétences nécessaires à l'obtention des
                            habilitations « Sûreté Nucléaire » (SN) ainsi que les habilitations classiques des domaines
                            tels qu'électrique, radioprotection, mécanique.
                        </p>
                        <p>
                            Il mentionne les capacités acquises et les validations associées réalisées par le tuteur ou les
                            compagnons.
                        </p>
                        <p>
                            Le carnet de compagnonnage est à disposition du manager lors des entretiens trimestriels
                            de titularisation pour le nouvel embauché ou lors des entretiens individuels pour l'agent
                            découvrant le métier ou encore à l'occasion de la reconduction des titres d'habilitation.
                        </p>
                        <p>Une fois complété, le carnet de compagnonnage sera archivé dans le CIF de l'agent.</p>
                    </div>

                    {# 9. La mise en oeuvre de la professionnalisation #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\"><i class=\"bi bi-chat-quote\"></i>9. La mise en oeuvre de la professionnalisation</h2>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.1. Première étape: la définition des compétences à acquérir</h3>
                        <div class=\"ps-3\">
                            <p>L'habilitation repose sur un référentiel de compétences qui comprend des objectifs généraux :</p>
                            <ul class=\"process-list ms-4\">
                                <li>Une culture sûreté leur permettant d'appréhender chaque intervention dans un
                                    esprit critique, d'utiliser les documents existants, de signaler les écarts et de
                                    mettre en oeuvre les pratiques de fiabilisation adaptées.
                                </li>
                                <li>Une connaissance des installations et des matériels.</li>
                                <li>Une connaissance des risques vis-à-vis de la sûreté, de la sécurité et de la
                                    radioprotection.
                                </li>
                                <li>Une connaissance de l'organisation du CNPE, du service et des différents pôles.</li>
                            </ul>
                            <p>Et des objectifs au métier :</p>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    Les référentiels de compétences incluant les domaines d'activités et les observables
                                    associés à chaque domaine.
                                </li>
                                <li>
                                    Parmi les domaines d'activité, la hiérarchie met en détermine les domaines prioritaires sur lesquels habiliter
                                    le nouvel arrivant lorsque cela est possible.
                                </li>
                            </ul>
                            <p>
                                Les guides ou fiches de compagnonnage sont établis dans les services à partir de ces
                                référentiels de compétences. Ils couvrent, avec les autres formations, l'ensemble des domaines.
                                <strong class=\"text-decoration-underline d-block p-0\">Conseil:</strong>
                                <ul class=\"process-list ms-4\">
                                    <li>Le hiérarchique balaye avec le tuteur le contenu du carnet de compagnonnage dans le but de partager le même niveau d'exigence.</li>
                                </ul>
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.2. Deuxième étape: Le missionnement des tuteurs et compagnons</h3>
                        <div class=\"ps-3\">
                            <p>Le manager et le tuteur se rencontrent pour établir les objectifs de la mission tutorale et
                                les moyens associés : temps, compagnons à solliciter au regard des domaines priorisés
                                de la professionnalisation, rapports d'étape, délais...
                            </p>
                            <p>Ces éléments sont formalisés dans une lettre de mission.</p>
                            <strong class=\"text-decoration-underline d-block ms-4\">Conseil:</strong>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    Si le tuteur assure directement la formation, ne pas lui confier plus de deux missions
                                    tutorales simultanées.
                                </li>
                                <li>
                                    Dans le cas où une véritable équipe (tuteur et compagnons) est mise en place, l'effet
                                    « promotion » renforce la dynamique d'apprentissage. La taille de la promotion est à
                                    définir conjointement avec le tuteur.
                                </li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.3. Troisième étape: Le missionnement des tuteurs et compagnons</h3>
                        <div class=\"ps-3\">
                            <p>
                            L'élaboration du programme de professionnalisation est complétée par la préparation des
                            aspects logistiques et des différentes actions réalisées à l'accueil de l'agent.
                            </p>
                            <p>Ces éléments sont formalisés dans une lettre de mission.</p>
                            <strong class=\"text-decoration-underline d-block\">Les immersions:</strong>
                            <p>
                                Les immersions permettent de découvrir l'aspect transverse des organisations et les
                                contraintes et bonnes pratiques des autres métiers.
                            </p>
                            <p>
                                Pour les jeunes embauchés, il peut comprendre aussi une immersion dans un autre
                                CNPE et/ou une AMT.
                            </p>
                            <p>
                                <strong class=\"text-decoration-underline d-block\">Conseil:</strong>
                                Dès ce stade, contacter les Services du CNPE sur lesquels les détachements sont
                                envisagés.
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.4. Quatrième étape: Préparation de l'accueil du nouvel arrivant, la logistique</h3>
                        <div class=\"ps-3\">
                            <p>
                                L'accueil du nouvel arrivant est une des conditions de réussite de son intégration,
                                il comporte a minima les actions suivantes :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Formalités d'accès sur le site.</li>
                                <li>Règlement des aspects pratiques (protections individuelles, accès cantine, lieu de
                                travail, ...) figurant dans le guide d accueil du nouvel arrivant.</li>
                                <li>Présentation de l'arrivant dans l'équipe de travail.</li>
                                <li>Présentation du dispositif de professionnalisation.</li>
                                <li>Présentation du carnet de compagnonnage.</li>
                               <li>Présentation à la hiérarchie du service (passage en EDS).</li>
                            </ul>
                            <p>
                                Le guide pour l'accueil du nouvel arrivant en <a class=\"link-annexe\" href=\"#annexe2\">annexe 2</a> liste l'ensemble des points
                                à transmettre à l'apprenant et se divise en 3 parties :
                            </p>
                            <ol class=\"process-list ms-4\">
                                <li>Logistique.</li>
                                <li>Accueil sécurité.</li>
                                <li>État des installations.</li>
                            </ol>
                            <p>
                                La partie « Accueil sécurité » répond sous forme de compagnonnage à l'obligation
                                réglementaire pour l'employeur de présenter à tout nouvel arrivant les risques
                                sécurité qu'il peut être amené à rencontrer.
                            </p>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.5. Le suivi de la professionnalisation</h3>
                        <div class=\"ps-3\">
                            <p>
                                Le suivi de la professionnalisation passe par la formalisation des différentes étapes à
                                travers le carnet de compagnonnage et/ou des comptes-rendus d'entretiens
                                individuels. Ces éléments sont susceptibles d'être vérifiés par le Chef de Service ou
                                lors d'inspections internes voir externes.
                            </p>
                            <p>
                                Par ailleurs, les apprentissages « terrain » doivent être articulés avec les
                                apprentissages en stage (vérification des pré-requis avant le stage, vérification des
                                acquis après le stage, levée des axes de progrès, mise en situation professionnelle).
                            </p>
                            <p>
                                Le tuteur a un rôle d'ensemblier sur la totalité des modalités de professionnalisation
                                (stage, compagnonnage, détachement, ...). Il assure le suivi de la professionnalisation de son nouvel arrivant et en rend compte à son manager.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Important:</strong>
                            <p>
                                Sans être habilité, un apprenant peut réaliser une action nécessitant une habilitation SN
                                en étant placé sous la responsabilité directe et permanente de son tuteur ou compagnon.
                                Ce dernier possède les habilitations requises pour cette action et se sera assuré au
                                préalable que son apprenti est en mesure d'effectuer l'action en toute sécurité,
                                connaissance et compréhension du geste. Il reste physiquement aux côtés de
                                l apprenant.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Conseil:</strong>
                            <ul class=\"process-list ms-4\">
                                <li>Ne pas oublier la vérification des pré-requis avant le départ en formation de
                                    l'apprenant.
                                </li>
                                <li>Ne pas oublier la levée des axes de progrès au retour de stage.</li>
                            </ul>
                            <strong class=\"text-decoration-underline d-block\">Académie savoirs communs (AKSC)</strong>
                            <p>
                                L'Académie des métiers Savoirs Communs (AK SC) fait partie du processus
                                d'intégration du nouvel arrivant. Cette formation de huit semaines permet rapidement
                                de suivre la majorité des stages requis pour s'approprier les fondamentaux du
                                nucléaire et mieux comprendre l'environnement de travail en CNPE.
                            </p>
                            <p>
                                Elle permet aussi au manager de délivrer une première habilitation après validation des acquis sur le terrain.
                                <br>Ce dispositif a pour but :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>
                                    D'assurer l'acquisition et le transfert des compétences, au plus près du terrain, par une
                                    alternance de formation théorique en salle, et de formations pratiques sur le terrain.
                                </li>
                                <li>
                                    Amener le plus rapidement possible tous les nouveaux arrivants, qu'ils soient
                                    nouveaux embauchés ou en redéploiement depuis d'autres entités du groupe, à la
                                    situation d'obtention des habilitations progressives leur permettant d'exercer leur futur
                                    métier sur des champs de plus en plus élargis.
                                </li>
                                <li>
                                    Par l'effet promotion, dynamiser et accélérer l'intégration, l'acculturation et la
                                    professionnalisation des nouveaux arrivants, ainsi que mettre en oeuvre des synergies
                                    et des réseaux profitables et pérennes.
                                </li>
                                <li>
                                    Favoriser la présence des hiérarchiques et des opérationnels dans l'intégration de la
                                    formation.
                                </li>
                                <li>
                                    D'assurer la transmission des savoir-faire par des salariés expérimentés du CNPE qui
                                    portent certains sujets/modules du parcours.
                                </li>
                            </ul>
                            <p>
                                Pour tout nouvel arrivant dans le nucléaire, cette action de professionnalisation est la
                                première partie destinée pour acquérir les bases des métiers du nucléaire avant
                                d'aborder des parcours plus spécifiques liés à leur métier.
                            </p>
                            <p>
                                À l'issue de cette AKSC, ou durant les phases de retour dans le service, l apprenant
                                devra acquérir les bases techniques du métier concerné.
                            </p>
                            <p>
                                Que ce soit durant l'AKSC ou à l'issue de celle-ci, le tuteur a un rôle important
                                d'accompagnement et de soutien, il doit notamment :
                            </p>
                            <ul class=\"process-list ms-4\">
                                <li>Assurer un contact régulier avec l'académicien et apporter son aide en cas de difficultés.</li>
                                <li>Consolider l'acquisition des connaissances et compétences pendant les périodes
                                    dans le(s) service(s).
                                </li>
                                <li>Apporter un appui lors des périodes d immersion dans un autre service.</li>
                            </ul>
                        </div>

                        <h3 class=\"subsection-title fw-bold text-decoration-underline\">9.6. Sixième étape: Le suivi des apprenants</h3>
                        <div class=\"ps-3\">
                            <p>
                                Au-delà des points trimestriels entre le manager, le tuteur et l'apprenant, il y a une
                                réunion un peu plus formelle au cours de laquelle est réalisé le bilan des acquis
                                professionnels en vue de la première habilitation.
                            </p>
                            <p>
                                À l'occasion de ce bilan, chacun fait ressortir les points forts et les points à améliorer
                                du dispositif qui vient de se dérouler afin de progresser ensemble.
                            </p>
                            <p>
                                La validation des acquis professionnels relève du tuteur et la décision d'habiliter
                                sur les domaines d'activité concernés relève du Chef de Service.
                            </p>
                            <p>
                                Au-delà de la première habilitation, le tuteur, le manager et l'apprenant sont amenés
                                à se rencontrer régulièrement pour étendre progressivement le champ d'habilitation
                                du nouvel arrivant (habilitation progressive).
                            </p>
                            <p>
                                Conformément aux dispositions associées aux habilitations et aux Observations en
                                Situation de Travail (OST), reprises dans la note de Sous-Processus D 5039 -
                                MQ/MP000321, la délivrance des habilitations, autorisations, qualifications, s appuie sur
                                la base des compétences démontées et évaluées via les OST.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Conseil :</strong>
                            <ul>
                                <li>
                                    Laisser une large part d'expression et de participation à l'apprenant, et de pas
                                    résumer la phase de bilan à une simple évaluation de l'apprenant.
                                </li>
                                <li>
                                    Favoriser, lorsque le métier le permet l'habilitation progressive par domaine afin
                                    de responsabiliser l'apprenant au plus tôt.
                                </li>
                            </ul>
                        </div>
                    </div>

                    {# 10. Formation d'accueil sécurité du nouvel arrivant #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\">10. Formation d'accueil sécurité du nouvel arrivant</h2>
                        <div class=\"ps-3\">
                            <p>
                                Cette formation est traitée par compagnonnage. Cette partie du compagnonnage est à
                                réaliser dans le mois suivant l'arrivée de l'agent conformément à la réglementation du code
                                du travail. Elle n'ouvre pas droit à une quelconque habilitation. Le périmètre (présentation
                                des risques, pictogrammes, sorties de secours... ) se limite aux locaux où l'agent est laissé
                                en autonomie sans tuteur ou compagnon. Sans les habilitations requises, l'agent n'est pas
                                autorisé à circuler seul (sans tuteur) dans les locaux industriels.
                            </p>
                            <p>
                                La fiche n° 2 du guide nouvel arrivant en annexe 2 formalise ce compagnonnage, fiche
                                renseignée par l'agent et validée par le tuteur.
                            </p>
                            <strong class=\"text-decoration-underline d-block\">Important:</strong>
                            <p>
                                <strong>
                                    Cette annexe est perspective dans sa forme et son contenu. Elle est réalisée dans le mois
                                    qui suit l'arrivée de l'agent. Elle est archivée dans le CIF de l'agent.
                                </strong>
                            </p>
                        </div>
                    </div>

                    {# 11. Habilitations requises pour l'apprenant #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\">11. Habilitations requises pour l'apprenant</h2>
                        <div class=\"ps-3\">
                            <p>
                                Pour circuler de manière autonome dans les locaux industriels, l'agent doit connaître les
                                risques associés et adapter son comportement aux différentes situations rencontrées aussi
                                bien en situation normale (port des EPI, comportement à proximité d'un chantier, respect des
                                balisages, affichages...) qu'en situation incidentelle (actions en cas de feu, PUI...).
                            </p>
                            <p>
                                Le guide de compagnonnage « Module RP1, B0, H0, M0 » en annexe 3 permet l'habilitation
                                RP1, M0, H0 et B0 restreint aux interventions sur du matériel hors tension et accès aux
                                locaux réservés. Ceci, lorsque les 2 phases savoirs théoriques, savoirs pratiques et mise en
                                application sont validées par le tuteur.
                            </p>
                            <p>
                                À l'issue de cette phase de compagnonnage, l'agent est capable d'accéder, de se déplacer,
                                de sortir des zones conventionnelles et nucléaires en utilisant les moyens de protection
                                adaptés aux risques rencontrés.
                            </p>
                            <p>
                                Cette annexe, fournie à titre d'exemple, peut être utilisée telle quelle par le service ou
                                déclinée dans une note du service.
                            </p>
                        </div>
                    </div>

                    {# 12. Synthèse du dispositif de professionnalisation d'un nouveau salarié dans un métier de la DPN #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\">12. Synthèse du dispositif de professionnalisation d'un nouveau salarié dans un métier de la DPN</h2>
                        <small class=\"text-center\">
                            Le dispositif de professionnalisation du nouvel arrivant est synthétisé dans le schèma ci-dessous :
                        </small>
                        <img class=\"img-fluid px-5\" src=\"{{ asset('images/docs/dispositif_professionalisation.png') }}\" style=\"width: 75%; height: auto;\" alt=\"Dispositif de professionnalisation\">
                    </div>

                    {# 13. Les académies savoir spécifiques métier #}
                    <div class=\"content-card\">
                        <h2 class=\"section-title\">13. Les académies savoir spécifiques métier</h2>
                        <p>
                            Ce dispositif national des académies des métiers spécifiques est piloté par l'animation métier qui
                            en est la MOA et l'UFPI la MOE. Il est adapté à chaque métier pour répondre au mieux aux
                            performances portées par les métiers de la DPN.
                        </p>
                        <p>Ce dispositif a pour objectif de :</p>
                        <ul class=\"process-list ms-4\">
                            <li>
                                Acquérir les connaissances techniques et les savoir-faire indispensables sur le plan individuel
                                pour réaliser les activités de base du métier au sein d'une équipe.
                            </li>
                            <li>
                                Acquérir la culture du métier et la mettre en oeuvre au sein du service et lors d'interaction avec
                                d'autres services du site.
                            </li>
                            <li>Maîtriser et respecter les fondamentaux des métiers.</li>
                            <li>Acquérir les démarches qualités réfléchies et rigoureuse visant à fiabiliser les interventions.</li>
                            <li>
                                Professionnaliser les salariés aux pratiques de fiabilisation, à la maîtrise du risque incendie, à
                                l'utilisation de l'Analyse de Risques, et à l'État exemplaire des installations.
                            </li>
                            <li>Situer les activités dans le fonctionnement global d'une centrale nucléaire.</li>
                            <li>S'intégrer dans une équipe de travail et de travailler en équipe.</li>
                            <li>
                                Intervenir en Zone Contrôlée en respectant les régies de sécurité conventionnelles et de
                                Radioprotection et les consignes affichées.
                            </li>
                        </ul>
                        <p>
                            La réalisation du parcours académie spécifique métier permet au manager, après la validation
                            des acquis sur le terrain, de délivrer les habilitations RP2, SN2, ainsi que les habilitations
                            spécifiques au métier.
                        </p>
                    </div>

                </section>

                <section id=\"annexes\">
                </section>
            </div>
            <div class=\"col-12\">
                <p class=\"mb-0\">
                    <i class=\"bi bi-file-earmark-text me-1\"></i> Document issu de la GED DPI Nucléaire — 08/07/2025
                </p>
            </div>
        </div>
    </main>
{% endblock %}
", "pages/processus/processus_elementaire.html.twig", "/Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/templates/pages/processus/processus_elementaire.html.twig");
    }
}
