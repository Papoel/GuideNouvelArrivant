# Rapport d'Estimation de Valeur
## Application GuideNouvelArrivant

**Date du rapport** : 18 janvier 2026  
**Auteur/Développeur** : Pascal BRIFFARD

---

## 1. Résumé du Projet

| Métrique | Valeur |
|----------|--------|
| **Période de développement** | Juillet 2024 → Janvier 2026 (18 mois) |
| **Nombre total de commits** | 369 |
| **Lignes de code (PHP + Twig)** | 25 426 lignes |
| **Fichiers PHP (src/)** | 119 fichiers |
| **Templates Twig** | 62 fichiers |
| **Entités métier** | 11 entités |

---

## 2. Répartition de l'Activité

| Mois | Commits |
|------|---------|
| Juillet 2024 | 9 |
| Août 2024 | 44 |
| Septembre 2024 | 23 |
| Octobre 2024 | 6 |
| Novembre 2024 | 37 |
| Janvier 2025 | 22 |
| Février 2025 | 73 |
| Mai 2025 | 15 |
| Juin 2025 | 12 |
| Juillet 2025 | 48 |
| Août 2025 | 14 |
| Septembre 2025 | 42 |
| Octobre 2025 | 10 |
| Novembre 2025 | 6 |
| Janvier 2026 | 8 |

**Mois actifs** : 15 mois sur 18

---

## 3. Estimation du Temps de Développement

### Méthode 1 : Par commits
- **369 commits** × 1h moyenne/commit = **~370 heures**

### Méthode 2 : Par lignes de code
- **25 426 lignes** ÷ 50 lignes/heure (code complexe) = **~508 heures**

### Méthode 3 : Par fonctionnalités
| Fonctionnalité | Estimation |
|----------------|------------|
| Architecture & Setup Symfony | 40h |
| 11 Entités + Relations + Migrations | 60h |
| Authentification & Sécurité | 30h |
| CRUD Utilisateurs (EasyAdmin) | 25h |
| Gestion des Carnets de compagnonnage | 50h |
| Système de Thèmes/Modules/Actions | 60h |
| Validation Agent/Tuteur | 40h |
| Dashboard & Statistiques | 35h |
| Export PDF (Dompdf) | 25h |
| Système de Feedbacks (REX) | 30h |
| Emails automatiques (Scheduler) | 25h |
| Templates Twig (62 fichiers) | 50h |
| Conformité RGPD | 20h |
| Tests & Debugging | 40h |
| **TOTAL** | **~530 heures** |

### Estimation retenue : **450 à 550 heures**

---

## 4. Valorisation Financière

### Taux horaire de référence (développeur Symfony senior)

| Contexte | Taux horaire |
|----------|--------------|
| Freelance marché français | 60-80 €/h |
| ESN/SSII | 50-70 €/h |
| Interne (coût employeur) | 40-50 €/h |

### Calcul de la valeur

| Scénario | Heures | Taux | **Valeur** |
|----------|--------|------|------------|
| **Bas** | 450h | 50€/h | **22 500 €** |
| **Médian** | 500h | 60€/h | **30 000 €** |
| **Haut** | 550h | 70€/h | **38 500 €** |

---

## 5. Valeur Ajoutée Fonctionnelle

Au-delà du code, l'application apporte :

### Gains opérationnels
- ✅ Digitalisation du suivi d'intégration
- ✅ Traçabilité des validations (agent/tuteur)
- ✅ Conformité RGPD intégrée
- ✅ Export PDF pour archivage
- ✅ Capitalisation des retours d'expérience

### Économies potentielles
- Temps gagné par les tuteurs et managers
- Réduction des erreurs de suivi papier
- Centralisation des données d'intégration

---

## 6. Proposition de Prix

### Option A : Cession totale des droits
**Prix proposé : 25 000 € à 35 000 €**

Inclut :
- Code source complet
- Documentation technique
- Transfert de propriété intellectuelle
- Formation utilisateur (2 jours)
- Support de transition (1 mois)

### Option B : Licence d'utilisation exclusive
**Prix proposé : 10 000 € + 2 000 €/an de maintenance**

Inclut :
- Droit d'utilisation illimité sur périmètre EDF
- Mises à jour correctives
- Support technique

### Option C : Prime d'invention interne EDF
À négocier selon le dispositif interne EDF (généralement 3 000 € à 15 000 €).

---

## 7. Recommandations

1. **Documenter le temps réel passé** si vous avez des traces (agenda, notes)
2. **Contacter le service Innovation/RH** pour connaître les dispositifs internes
3. **Consulter un avocat** si négociation de cession formelle
4. **Ne pas sous-estimer** la valeur : un développement équivalent en externe coûterait minimum 30 000 €

---

*Ce rapport est une estimation indicative basée sur l'analyse du dépôt Git. La valeur réelle dépend du contexte de négociation.*
