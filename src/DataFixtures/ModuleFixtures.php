<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $theme1 = $manager->getRepository(className: Theme::class)->findOneBy(['id' => 1]);
        $theme2 = $manager->getRepository(className: Theme::class)->findOneBy(['id' => 2]);
        $theme3 = $manager->getRepository(className: Theme::class)->findOneBy(['id' => 3]);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la DI100');
        $module->setDescription(description: "Déclaration des événements à l'ASN");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la DI55');
        $module->setDescription(description: "Présentation de l'organisation pour le traitement et la gestion des écarts");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la DI61');
        $module->setDescription(description: 'Métrologies et éxigences associés');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la DI81');
        $module->setDescription(description: 'Qualification des matériels');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance des EP / PBMP');
        $module->setDescription(description: "Prendre connaissance des critères d'acceptabilité d'un EP RGE9 et de la gestion associé en cas de non respect d'un critère");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance du processus PdR');
        $module->setDescription(description: "Rencontre avec l'ingénieur PdR, immersion d'une journée avec un logisticien d'interface (le magasin est envisageable)");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la réglementation environnementale');
        $module->setDescription(description: 'Découvrez les objectifs du site, et les actions mise en oeuvre au quotidien');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la réglementation propreté radiologique');
        $module->setDescription(description: 'Découvrez les objectifs du site, du service, et les actions mise en oeuvre au quotidien');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance de la réglementation incendie');
        $module->setDescription(description: 'Découvrez comment le risque incendie est pris en compte dans nos activités (points chauds, charge calorifiques, SFS)');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Prendre connaissance des principes de la maintenance et leurs exigences associés');
        $module->setDescription(description: 'Découvrez comment la maintenance est gérées, les types de maintenances (curative ou préventive), les PBMP, PLMP, AP913...');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Analyse de risque');
        $module->setDescription(description: 'Prendre connaissance de la démarche Analyse de Risque');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Activité cas 1 et cas 2');
        $module->setDescription(description: '
            <ol>
                <li>Prendre connaissance des différences entre une activité en cas 1 et une activité en cas 2</li>
                <li>Appropriation des fiches réflexes n°65 (BPE) et n°22 (VSO)</li>
            </ol>
        ');
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Gestion des DMP/MTI');
        $module->setDescription(description: "
            <ol>
                <li>Prendre connaissance de l'organisation du site et du service pour la gestion des DMP/MTI</li>
                <li>Prendre connaissance des différentes aires de stockage et tableaux de gestion physique</li>
                <li>Appropriation de la fiche réflexe n°20</li>
            </ol>
        ");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Fiches de constats');
        $module->setDescription(description: "
            <ol>
                <li>Prendre connaissance de l'organisation pour la gestion des fiches de constats</li>
                <li>Appropriation de la fiche réflexe n°8</li>
            </ol>
        ");
        $module->setTheme($theme1);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'AdREX');
        $module->setDescription(description: "Prendre connaissance de l'outil AdREX (Créer, contrôler et capitaliser une AdR dans l'EAM et en dehors de l'EAM");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Bi');
        $module->setDescription(description: "Prendre connaissance de l'outil de requête (ROP10, ROP11...");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | Pluri');
        $module->setDescription(description: 'Gérer des activités pluriannuelles (Affecter un code projet à une DT ou à une TOT');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | AT-TEM');
        $module->setDescription(description: "Gérer des activités d'un projet AT ou TEM (Affecter ou reporter un code projet à une TOT");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | DT');
        $module->setDescription(description: '
            <ol>
                <li>Émettre une DT et associer une DT à un OT</li>
                <li>Prendre connaissance du guide de rédaction des DT</li>
            </ol>
        ');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | DMP-MTI');
        $module->setDescription(description: 'Préparer ou créer un OTM / OTR de pose et dépose de DMP ou MTI');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | OT');
        $module->setDescription(description: 'Créer et dupliquer un OT');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | 1N');
        $module->setDescription(description: "
            <ol>
                <li>Prendre connaissance des attendus pour la réalisation de l'analyse premier niveau</li>
                <li>Prendre connaissance de la fiche réflexe n°18</li>
            </ol>
        ");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | PDR');
        $module->setDescription(description: 'Assurer la mise à disposition des PDR (Contrôler, Modifier, Approuver une DM');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EAM | HISTO');
        $module->setDescription(description: "
            <ol>
                <li>Connaitre l'organisation pour l'historisation des dossiers</li>   
                <li>Prendre connaissance de la fiche réflexe n°13</li>   
            </ol>
         ");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Maitriser la qualité du dossier de maintenance');
        $module->setDescription(description: 'Prendre connaissance de la fiche réflexe n°27');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: "Requalification d'une partie de l'installation");
        $module->setDescription(description: "
            <ol>
                <li>Renseigner la coche requalification nécessaire d'une TOT M ou R</li>
                <li>Instruire l'ADS ou la FSR (sharepoint)</li>
                <li>Préparer les TOTR RQi ou RQf</li>
            </ol> 
        ");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'eDRT (Web et Tablette');
        $module->setDescription(description: 'Préparer ou réaliser une activité technique dématérialisée');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'EPSILON2');
        $module->setDescription(description: '
            <ol>
                <li>Consulter une demande de logistique</li>
                <li>Créer une demande de logistique</li>
                <li>Approuver une demande de logistique</li>
                <li>Soumettre une demande de logistique</li>
            </ol> 
        ');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Espace Opérationnel (EOX)');
        $module->setDescription(description: "Prendre connaissance de l'espace opérationnel");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'GPS');
        $module->setDescription(description: "
            <ol>
                <li>Maitriser l'outil pour consulter ou gérer des activités TEM ou AT</li>
                <li>Savoir faire le TPLRIA</li>
                <li>Savoir créer une fiche d'appel</li>
            </ol> 
        ");
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'PGI / SAP');
        $module->setDescription(description: '
            <ol>
                <li>Assurer la mise à disposition des PdR</li>
                <li>Savoir consulter le stock de PdR</li>
                <li>Savoir rechercher et suivre une commande de PdR</li>
            </ol> 
        ');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'VESPA');
        $module->setDescription(description: 'Consulter, surligner et modifier les schémas mécaniques');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'AICO');
        $module->setDescription(description: '
            <ol>
                <li>Savoir rédiger des demandes de régimes (consignation, intervention immédiate...)</li>
                <li>Savoir rédiger un A2X</li>
                <li>Savoir créer une gamme de régime</li>
                <li>Savoir ajouter des chargés de travaux sur un régime</li>
            </ol> 
        ');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'ECM');
        $module->setDescription(description: 'Apprendre à rechercher la documentation');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'OSECAP');
        $module->setDescription(description: 'Prendre connaissance des 9 objets de capitalisation (ADR, ADS, DSI, DL, DM...)');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'PLURITOOLS');
        $module->setDescription(description: 'Prendre connaissance de la gestion des activités pluriannuelles');
        $module->setTheme($theme2);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: "Présentation du processus d'achat");
        $module->setDescription(description: "Présentation du processus d'achat et de l'organisation liée au cheminement des commandes");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Présentation des bases budgétaires');
        $module->setDescription(description: "
            <ol>
                <li>PGI: Rédaction d'une demande d'achat</li>
                <li>PGI: Réception d'une commande</li>
                <li>PGI: Module PdR</li>
                <li>PGI: Imputation</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'CCTP');
        $module->setDescription(description: "Présentation des éxigences d'un CCTP");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Surveillance des partenaires');
        $module->setDescription(description: "
            <ol>
                <li>Présentation des éxigences vis à vis des partenaires</li>
                <li>Programme de surveillance</li>
                <li>Rédaction et traitement des FEP</li>
                <li>Connaissance de l'application ARGOS</li>
                <li>Connaissance de l'application KALIF</li>
                <li>Appropriation de la fiche réflexe N°72</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: "Réunion d'enclenchement ou levée des préalables");
        $module->setDescription(description: "Anime ou participe à une réunion d'enclenchement ou de levée des préalables");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'FEP');
        $module->setDescription(description: "
            <ol>
                <li>Participe à la rédaction d'une Fiche d'Evaluation de la Prestation</li>
                <li>Connaissance de l'application e-FEP</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Projet TEM');
        $module->setDescription(description: "
            <ol>
                <li>Présentation du projet TEM et de l'organisation de la planification à S+9</li>
                <li>Participation éventuelle aux réunions de pilotage RHC / RCM / RDTem</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Projet AT');
        $module->setDescription(description: "
            <ol>
                <li>Présentation des projets d'arrêt et de la préparation modulaire d'arrêt de tranche</li>
                <li>Participation éventuelle aux réunions de pilotage RDT / RTOT / RAT</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Organisation du Service');
        $module->setDescription(description: "
            <ol>
                <li>Prendre connaissance de l'organisation du service</li>
                <li>Prendre connaissance du REX (Caméléon)</li>
            </ol> 
        ");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $module = new Module();
        $module->setTitle(title: 'Organisation du Site');
        $module->setDescription(description: "Prendre connaissance de l'organisation du site et du service pour la préparation des COMSAT (changement d'état standard)");
        $module->setTheme($theme3);
        $manager->persist(object: $module);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [ThemeFixtures::class];
    }
}
