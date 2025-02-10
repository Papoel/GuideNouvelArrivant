<?php

declare(strict_types=1);

namespace App\Services\Datas;

use App\Entity\Module;
use App\Entity\Theme;
use Doctrine\ORM\EntityManagerInterface;

readonly class DataLoader
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * @return Theme[]
     */
    public function loadThemes(): array
    {
        $themeTitles = [
            '1.1 Connaissance de la réglementation et des prescriptions',
            '1.2 Connaissance des outils SDIN',
            '1.3 Préparation et réalisation des activités',
        ];

        $themes = [];
        foreach ($themeTitles as $themeTitle) {
            $theme = new Theme();
            $theme->setTitle(title: $themeTitle);
            $this->entityManager->persist($theme);
            $themes[] = $theme;
        }

        $this->entityManager->flush();

        return $themes;
    }

    /**
     * @param Theme[] $themes
     */
    public function loadModules(array $themes): void
    {
        if (count($themes) < 3) {
            throw new \InvalidArgumentException(message: 'Il faut au moins 3 thèmes pour charger les modules');
        }

        // Assignez les thèmes à des variables pour plus de clarté
        [$theme1, $theme2, $theme3] = $themes;

        $moduleData = [
            // Modules pour $theme1
            ['Prendre connaissance de la DI100', "Déclaration des événements à l'ASN", $theme1],
            ['Prendre connaissance de la DI55', "Présentation de l'organisation pour le traitement et la gestion des écarts", $theme1],
            ['Prendre connaissance de la DI61', 'Métrologies et éxigences associés', $theme1],
            ['Prendre connaissance de la DI81', 'Qualification des matériels', $theme1],
            ['EP / PBMP', "Prendre connaissance des critères d'acceptabilité d'un EP RGE9 et de la gestion associé en cas de non respect d'un critère", $theme1],
            ['Prendre connaissance du processus PdR', "Rencontre avec l'ingénieur PdR, immersion d'une journée avec un logisticien d'interface (le magasin est envisageable)", $theme1],
            ['Prendre connaissance de la réglementation environnementale', 'Découvrez les objectifs du site, et les actions mise en oeuvre au quotidien', $theme1],
            ['Prendre connaissance de la réglementation propreté radiologique', 'Découvrez les objectifs du site, du service, et les actions mise en oeuvre au quotidien', $theme1],
            ['Prendre connaissance de la réglementation incendie', 'Découvrez comment le risque incendie est pris en compte dans nos activités (points chauds, charge calorifiques, SFS)', $theme1],
            ['Prendre connaissance des principes de la maintenance et leurs exigences associés', 'Découvrez comment la maintenance est gérées, les types de maintenances (curative ou préventive), les PBMP, PLMP, AP913...', $theme1],
            ['Analyse de risque', 'Prendre connaissance de la démarche Analyse de Risque', $theme1],
            ['Activité cas 1 et cas 2',
                '<ol>
                    <li>Prendre connaissance des différences entre une activité en cas 1 et une activité en cas 2</li>
                    <li>Appropriation des fiches réflexes n°65 (BPE) et n°22 (VSO)</li>
                </ol>',
                $theme1,
            ],
            ['Gestion des DMP/MTI',
                "<ol>
                    <li>Prendre connaissance de l'organisation du site et du service pour la gestion des DMP/MTI</li>
                    <li>Prendre connaissance des différentes aires de stockage et tableaux de gestion physique</li>
                    <li>Appropriation de la fiche réflexe n°20</li>
                </ol>",
                $theme1,
            ],
            ['Fiches de constats',
                "<ol>
                    <li>Prendre connaissance de l'organisation pour la gestion des fiches de constats</li>
                    <li>Appropriation de la fiche réflexe n°8</li>
                </ol>",
                $theme1,
            ],

            // Modules pour $theme2 (à compléter avec les vrais titres et descriptions)
            ['AdREX', "Prendre connaissance de l'outil AdREX (Créer, contrôler et capitaliser une AdR dans l'EAM et en dehors de l'EAM", $theme2],
            ['BI', "Prendre connaissance de l'outil de requête (ROP10, ROP11...)", $theme2],
            ['EAM | Pluri', 'Gérer des activités pluriannuelles (Affecter un code projet à une DT ou à une TOT', $theme2],
            ['EAM | AT-TEM', "Gérer des activités d'un projet AT ou TEM (Affecter ou reporter un code projet à une TOT", $theme2],
            ['EAM | DT',
                '<ol>
                    <li>Émettre une DT et associer une DT à un OT</li>
                    <li>Prendre connaissance du guide de rédaction des DT</li>
                </ol>',
                $theme2,
            ],
            ['EAM | DMP-MTI', 'Préparer ou créer un OTM / OTR de pose et dépose de DMP ou MTI', $theme2],
            ['EAM | OT', 'Créer et dupliquer un OT', $theme2],
            ['EAM | 1N',
                "<ol>
                    <li>Prendre connaissance des attendus pour la réalisation de l'analyse premier niveau</li>
                    <li>Prendre connaissance de la fiche réflexe n°18</li>
                </ol>",
                $theme2,
            ],
            ['EAM | PDR', 'Assurer la mise à disposition des PDR (Contrôler, Modifier, Approuver une DM', $theme2],
            ['EAM | HISTO',
                "<ol>
                    <li>Connaitre l'organisation pour l'historisation des dossiers</li>
                    <li>Prendre connaissance de la fiche réflexe n°13</li>
                </ol>",
                $theme2,
            ],
            ['Maitriser la qualité du dossier de maintenance', 'Prendre connaissance de la fiche réflexe n°27', $theme2],
            ["Requalification d'une partie de l'installation",
                "<ol>
                    <li>Renseigner la coche requalification nécessaire d'une TOT M ou R</li>
                    <li>Instruire l'ADS ou la FSR (sharepoint)</li>
                    <li>Préparer les TOTR RQi ou RQf</li>
                </ol>",
                $theme2,
            ],
            ['eDRT (Web et Tablette)', 'Préparer ou réaliser une activité technique dématérialisée', $theme2],

            ['EPSILON2',
                '<ol>
                    <li>Consulter une demande de logistique</li>
                    <li>Créer une demande de logistique</li>
                    <li>Approuver une demande de logistique</li>
                    <li>Soumettre une demande de logistique</li>
                </ol>',
                $theme2,
            ],
            ['Espace Opérationnel (EOX)', "Prendre connaissance de l'espace opérationnel", $theme2],
            ['GPS',
                "<ol>
                    <li>Maitriser l'outil pour consulter ou gérer des activités TEM ou AT</li>
                    <li>Savoir faire le TPLRIA</li>
                    <li>Savoir créer une fiche d'appel</li>
                </ol>",
                $theme2,
            ],
            ['PGI / SAP',
                '<ol>
                    <li>Assurer la mise à disposition des PdR</li>
                    <li>Savoir consulter le stock de PdR</li>
                    <li>Savoir rechercher et suivre une commande de PdR</li>
                </ol>',
                $theme2,
            ],
            ['VESPA', 'Consulter, surligner et modifier les schémas mécaniques', $theme2],
            ['AICO',
                '<ol>
                    <li>Savoir rédiger des demandes de régimes (consignation, intervention immédiate...)</li>
                    <li>Savoir rédiger un A2X</li>
                    <li>Savoir créer une gamme de régime</li>
                    <li>Savoir ajouter des chargés de travaux sur un régime</li>
                </ol>',
                $theme2,
            ],
            ['ECM', 'Apprendre à rechercher la documentation', $theme2],
            ['OSECAP', 'Prendre connaissance des 9 objets de capitalisation (ADR, ADS, DSI, DL, DM...)', $theme2],
            ['PLURITOOLS', 'Prendre connaissance de la gestion des activités pluriannuelles', $theme2],
            ['Présentation du processus d\'achat', "Présentation du processus d'achat et de l'organisation liée au cheminement des commandes", $theme3],
            ['Présentation des bases budgétaires',
                "<ol>
                    <li>PGI: Rédaction d'une demande d'achat</li>
                    <li>PGI: Réception d'une commande</li>
                    <li>PGI: Module PdR</li>
                    <li>PGI: Imputation</li>
                </ol>",
                $theme3,
            ],
            ['CCTP', "Présentation des éxigences d'un CCTP", $theme3],
            ['Surveillance des partenaires',
                "<ol>
                    <li>Présentation des éxigences vis à vis des partenaires</li>
                    <li>Programme de surveillance</li>
                    <li>Rédaction et traitement des FEP</li>
                    <li>Connaissance de l'application ARGOS</li>
                    <li>Connaissance de l'application KALIF</li>
                    <li>Appropriation de la fiche réflexe N°72</li>
                </ol>",
                $theme3,
            ],
            ["Réunion d'enclenchement ou levée des préalables", "Anime ou participe à une réunion d'enclenchement ou de levée des préalables", $theme3],
            ['FEP',
                "<ol>
                    <li>Participe à la rédaction d'une Fiche d'Evaluation de la Prestation</li>
                    <li>Connaissance de l'application e-FEP</li>
                </ol>",
                $theme3,
            ],
            ['Projet TEM',
                "<ol>
                    <li>Présentation du projet TEM et de l'organisation de la planification à S+9</li>
                    <li>Participation éventuelle aux réunions de pilotage RHC / RCM / RDTem</li>
                </ol>",
                $theme3,
            ],
            ['Projet AT',
                "<ol>
                    <li>Présentation des projets d'arrêt et de la préparation modulaire d'arrêt de tranche</li>
                    <li>Participation éventuelle aux réunions de pilotage RDT / RTOT / RAT</li>
            </ol>",
                $theme3,
            ],
            ['Organisation du Service',
                "<ol>
                    <li>Prendre connaissance de l'organisation du service</li>
                    <li>Prendre connaissance du REX (Caméléon)</li>
                </ol>",
                $theme3,
            ],
            ['Organisation du Site', "Prendre connaissance de l'organisation du site et du service pour la préparation des COMSAT (changement d'état standard)", $theme3],
        ];

        foreach ($moduleData as $data) {
            $module = new Module();
            $module->setTitle($data[0]);
            $module->setDescription($data[1]);
            $module->setTheme($data[2]);
            $this->entityManager->persist($module);
        }

        $this->entityManager->flush();
    }
}
