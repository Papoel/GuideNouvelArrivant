# Étude de la fonctionnalité "Créer des modèles de carnet"

## 1. Introduction

### 1.1 Contexte
Actuellement, le système de Guide du Nouvel Arrivant permet de créer des carnets d'intégration pour les nouveaux agents. Ces carnets sont constitués de thèmes, modules et actions que l'agent doit compléter durant son parcours d'intégration. Cependant, chaque carnet est créé individuellement et ne peut pas être basé sur un modèle prédéfini selon le métier de l'agent.

### 1.2 Objectif de la fonctionnalité
L'objectif est de permettre la création de modèles de carnets qui pourront être affectés aux agents selon leur métier. Ces modèles pourront également être personnalisés si besoin pour s'adapter aux spécificités de chaque agent.

### 1.3 Bénéfices attendus

- Gain de temps dans la création des carnets d'intégration
- Standardisation des parcours d'intégration par métier
- Flexibilité pour personnaliser les carnets selon les besoins spécifiques
- Cohérence dans le suivi des nouveaux arrivants

## 2. Analyse de faisabilité

### 2.1 État actuel du système
Le système actuel comprend les entités suivantes :
- [Logbook](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/Logbook.php:11:0-129:1) (Carnet) : Contient les thèmes et est associé à un utilisateur
- [Theme](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/Theme.php:12:0-130:1) : Regroupe des modules et est associé à des carnets
- [Module](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/Module.php:12:0-150:1) : Regroupe des actions et est associé à un thème
- [Action](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/Action.php:10:0-198:1) : Représente une tâche à accomplir et est associée à un module et un utilisateur
- [User](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/User.php:18:0-466:1) : Représente un utilisateur du système avec un métier défini (JobEnum)

Les carnets sont actuellement créés individuellement pour chaque utilisateur, sans possibilité de réutiliser une structure prédéfinie.

### 2.2 Conclusion sur la faisabilité
La fonctionnalité "Créer des modèles de carnet" est tout à fait réalisable dans le système actuel. Elle nécessite l'ajout d'une nouvelle entité `LogbookTemplate` et des modifications dans le processus de création des carnets.

## 3. Conception de la solution

### 3.1 Architecture proposée

#### 3.1.1 Nouvelle entité : LogbookTemplate (Modèle de carnet)
Cette nouvelle entité sera le cœur de la fonctionnalité et contiendra :
- Un identifiant unique
- Un nom
- Une description
- Une association avec un ou plusieurs métiers (JobEnum)
- Une collection de thèmes (relation avec Theme)
- Un indicateur pour savoir si c'est un modèle par défaut pour un métier donné

Voici un tableau pour vous guider lors de la création de l'entité avec la commande `symfony console make:entity` :

| Propriété    | Type          | Nullable | Unique | Relation                  | Réponses à la commande make:entity                                                                |
|--------------|---------------|----------|--------|---------------------------|---------------------------------------------------------------------------------------------------|
| id           | uuid          | non      | oui    | -                         | Généré automatiquement                                                                           |
| name         | string (100)  | non      | non    | -                         | `name` → `string` → `100` → `no` (not nullable)                                                   |
| description  | text          | oui      | non    | -                         | `description` → `text` → `yes` (nullable)                                                        |
| isDefault    | boolean       | non      | non    | -                         | `isDefault` → `boolean` → `no` (not nullable) → `false` (default value)                           |
| jobs         | json          | non      | non    | -                         | `jobs` → `json` → `no` (not nullable) → `[]` (default value)                                     |
| themes       | relation      | non      | non    | ManyToMany avec Theme     | `themes` → `relation` → `Theme` → `ManyToMany` → `yes` (inversed by) → `logbookTemplates` → `no` (orphan removal) |
| createdAt    | datetime_immutable | non | non | -                         | `createdAt` → `datetime_immutable` → `no` (not nullable)                                          |
| updatedAt    | datetime_immutable | non | non | -                         | `updatedAt` → `datetime_immutable` → `no` (not nullable)                                          |

Note: Pour les champs `createdAt` et `updatedAt`, vous pouvez utiliser le trait `TimestampTrait` si disponible dans votre projet.

#### 3.1.2 Relations entre entités
- `LogbookTemplate` ↔ [Theme](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/Theme.php:12:0-130:1) : Relation ManyToMany (un modèle peut contenir plusieurs thèmes, un thème peut appartenir à plusieurs modèles)
- `LogbookTemplate` ↔ `JobEnum` : Relation OneToMany (un modèle peut être associé à plusieurs métiers)
- [User](cci:2://file:///Users/papoel/Documents/sandbox/side_project/GuideNouvelArrivant/src/Entity/User.php:18:0-466:1) ↔ `LogbookTemplate` : Pas de relation directe, mais utilisation du JobEnum comme lien

### 3.2 Modifications du schéma de base de données

#### 3.2.1 Nouvelle table : logbook_templates
```sql
CREATE TABLE logbook_templates (
    id UUID PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    is_default BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL
);
```

#### 3.2.2 Table de liaison : logbook_template_job

```sql
CREATE TABLE logbook_template_job (
    logbook_template_id UUID NOT NULL,
    job VARCHAR(80) NOT NULL,
    PRIMARY KEY (logbook_template_id, job),
    FOREIGN KEY (logbook_template_id) REFERENCES logbook_templates(id) ON DELETE CASCADE
);
);
```

#### 3.2.3 Table de liaison : logbook_template_theme

```sql
CREATE TABLE logbook_template_theme (
    logbook_template_id UUID NOT NULL,
    theme_id UUID NOT NULL,
    PRIMARY KEY (logbook_template_id, theme_id),
    FOREIGN KEY (logbook_template_id) REFERENCES logbook_templates(id) ON DELETE CASCADE,
    FOREIGN KEY (theme_id) REFERENCES themes(id) ON DELETE CASCADE
);
```

#### 3.3 Processus de création et d'utilisation des modèles

1. Création d'un modèle de carnet :

- L'administrateur crée un nouveau modèle de carnet
- Il associe des thèmes existants au modèle
- Il définit pour quels métiers ce modèle est applicable
- Il peut définir si ce modèle est le modèle par défaut pour un métier donné

2. Affectation d'un modèle à un agent :

- Lors de la création d'un nouvel utilisateur, le système propose automatiquement le modèle par défaut correspondant à son métier
- L'administrateur peut choisir un autre modèle parmi ceux disponibles pour ce métier
- L'administrateur peut personnaliser le carnet généré à partir du modèle

3. Personnalisation d'un carnet basé sur un modèle :

- Ajout/suppression de thèmes
- Ajout/suppression de modules
- Ajout/suppression d'actions

## 4. Implémentation technique

### 4.1 Nouvelles entités à créer

#### 4.1.1 Entité LogbookTemplate

```php
<?php

namespace App\Entity;

use App\Entity\Traits\TimestampTrait;
use App\Enum\JobEnum;
use App\Repository\LogbookTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LogbookTemplateRepository::class)]
#[ORM\Table(name: '`logbook_templates`')]
#[ORM\HasLifecycleCallbacks]
class LogbookTemplate
{
    use TimestampTrait;

    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    private ?Uuid $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez saisir un nom.')]
    #[Assert\Length(max: 100, maxMessage: 'Le nom ne doit pas dépasser {{ limit }} caractères.')]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isDefault = false;

    /** @var Collection<int, Theme> */
    #[ORM\ManyToMany(targetEntity: Theme::class, inversedBy: 'logbookTemplates')]
    private Collection $themes;

    /** @var array<int, JobEnum> */
    #[ORM\Column(type: Types::JSON)]
    private array $jobs = [];

    public function __construct()
    {
        $this->themes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name ?: '';
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /** @return Collection<int, Theme> */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): static
    {
        if (!$this->themes->contains($theme)) {
            $this->themes->add($theme);
        }

        return $this;
    }

    public function removeTheme(Theme $theme): static
    {
        $this->themes->removeElement($theme);

        return $this;
    }

    /** @return array<int, JobEnum> */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /** @param array<int, JobEnum> $jobs */
    public function setJobs(array $jobs): static
    {
        $this->jobs = $jobs;

        return $this;
    }

    public function addJob(JobEnum $job): static
    {
        if (!in_array($job, $this->jobs, true)) {
            $this->jobs[] = $job;
        }

        return $this;
    }

    public function removeJob(JobEnum $job): static
    {
        $key = array_search($job, $this->jobs, true);
        if ($key !== false) {
            unset($this->jobs[$key]);
            $this->jobs = array_values($this->jobs);
        }

        return $this;
    }

    public function hasJob(JobEnum $job): bool
    {
        return in_array($job, $this->jobs, true);
    }
}
```

#### 4.1.2 Mise à jour de l'entité Theme

```php
// Ajouter cette propriété à l'entité Theme
/** @var Collection<int, LogbookTemplate> */
#[ORM\ManyToMany(targetEntity: LogbookTemplate::class, mappedBy: 'themes')]
private Collection $logbookTemplates;

// Ajouter dans le constructeur
$this->logbookTemplates = new ArrayCollection();

// Ajouter les getters et setters
/** @return Collection<int, LogbookTemplate> */
public function getLogbookTemplates(): Collection
{
    return $this->logbookTemplates;
}

public function addLogbookTemplate(LogbookTemplate $logbookTemplate): static
{
    if (!$this->logbookTemplates->contains($logbookTemplate)) {
        $this->logbookTemplates->add($logbookTemplate);
        $logbookTemplate->addTheme($this);
    }

    return $this;
}

public function removeLogbookTemplate(LogbookTemplate $logbookTemplate): static
{
    if ($this->logbookTemplates->removeElement($logbookTemplate)) {
        $logbookTemplate->removeTheme($this);
    }

    return $this;
}
```

### 4.2 Nouveaux repositories à créer

#### 4.2.1 LogbookTemplateRepository

```php
<?php

namespace App\Repository;

use App\Entity\LogbookTemplate;
use App\Enum\JobEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogbookTemplate>
 */
class LogbookTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogbookTemplate::class);
    }

    public function findDefaultTemplateForJob(JobEnum $job): ?LogbookTemplate
    {
        return $this->createQueryBuilder('lt')
            ->where('lt.isDefault = :isDefault')
            ->andWhere(':job MEMBER OF lt.jobs')
            ->setParameter('isDefault', true)
            ->setParameter('job', $job)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findTemplatesForJob(JobEnum $job): array
    {
        return $this->createQueryBuilder('lt')
            ->where(':job MEMBER OF lt.jobs')
            ->setParameter('job', $job)
            ->orderBy('lt.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
```

### 4.3 Nouveaux services à créer

#### 4.3.1 LogbookTemplateService

```php
<?php

namespace App\Services\Logbook;

use App\Entity\Logbook;
use App\Entity\LogbookTemplate;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Repository\LogbookTemplateRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class LogbookTemplateService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LogbookTemplateRepository $logbookTemplateRepository,
    ) {
    }

    public function createLogbookFromTemplate(LogbookTemplate $template, User $user): Logbook
    {
        $logbook = new Logbook();
        $logbook->setName('Carnet de ' . $user->getFullname());
        $logbook->setOwner($user);

        // Ajouter les thèmes du modèle au carnet
        foreach ($template->getThemes() as $theme) {
            $logbook->addTheme($theme);
        }

        return $logbook;
    }

    public function getDefaultTemplateForUser(User $user): ?LogbookTemplate
    {
        $job = $user->getJob();
        if (null === $job) {
            return null;
        }

        return $this->logbookTemplateRepository->findDefaultTemplateForJob($job);
    }

    public function getTemplatesForUser(User $user): array
    {
        $job = $user->getJob();
        if (null === $job) {
            return [];
        }

        return $this->logbookTemplateRepository->findTemplatesForJob($job);
    }
}
```
### 4.4 Nouveaux formulaires à créer

#### 4.4.1 LogbookTemplateType

```php
<?php

namespace App\Form;

use App\Entity\LogbookTemplate;
use App\Entity\Theme;
use App\Enum\JobEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogbookTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du modèle',
                'attr' => [
                    'placeholder' => 'Saisissez le nom du modèle',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Décrivez ce modèle de carnet',
                    'rows' => 5,
                ],
            ])
            ->add('isDefault', CheckboxType::class, [
                'label' => 'Modèle par défaut',
                'required' => false,
                'help' => 'Si coché, ce modèle sera utilisé par défaut pour les métiers sélectionnés',
            ])
            ->add('jobs', ChoiceType::class, [
                'label' => 'Métiers concernés',
                'choices' => JobEnum::cases(),
                'choice_label' => fn(JobEnum $job) => $job->value,
                'multiple' => true,
                'expanded' => true,
                'required' => true,
            ])
            ->add('themes', EntityType::class, [
                'label' => 'Thèmes',
                'class' => Theme::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => false,
                'required' => true,
                'attr' => [
                    'class' => 'select2',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LogbookTemplate::class,
        ]);
    }
}
```

#### 4.4.2 LogbookTemplateChoiceType

```php
<?php

namespace App\Form;

use App\Entity\LogbookTemplate;
use App\Entity\User;
use App\Repository\LogbookTemplateRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogbookTemplateChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];

        $builder
            ->add('template', EntityType::class, [
                'label' => 'Modèle de carnet',
                'class' => LogbookTemplate::class,
                'choice_label' => 'name',
                'required' => true,
                'query_builder' => function (LogbookTemplateRepository $repository) use ($user) {
                    $job = $user->getJob();
                    if (null === $job) {
                        return $repository->createQueryBuilder('lt')
                            ->orderBy('lt.name', 'ASC');
                    }

                    return $repository->createQueryBuilder('lt')
                        ->where(':job MEMBER OF lt.jobs')
                        ->setParameter('job', $job)
                        ->orderBy('lt.name', 'ASC');
                },
                'placeholder' => 'Choisissez un modèle',
                'attr' => [
                    'class' => 'form-select',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'user' => null,
        ]);

        $resolver->setRequired(['user']);
        $resolver->setAllowedTypes('user', User::class);
    }
}
```

### 4.5 Nouveaux contrôleurs à créer

#### 4.5.1 LogbookTemplateController

```php
<?php

namespace App\Controller\Admin;

use App\Entity\LogbookTemplate;
use App\Form\LogbookTemplateType;
use App\Repository\LogbookTemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/logbook-template')]
#[IsGranted('ROLE_ADMIN')]
class LogbookTemplateController extends AbstractController
{
    #[Route('/', name: 'app_admin_logbook_template_index', methods: ['GET'])]
    public function index(LogbookTemplateRepository $logbookTemplateRepository): Response
    {
        return $this->render('admin/logbook_template/index.html.twig', [
            'logbook_templates' => $logbookTemplateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_logbook_template_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $logbookTemplate = new LogbookTemplate();
        $form = $this->createForm(LogbookTemplateType::class, $logbookTemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($logbookTemplate);
            $entityManager->flush();

            $this->addFlash('success', 'Le modèle de carnet a été créé avec succès.');

            return $this->redirectToRoute('app_admin_logbook_template_index');
        }

        return $this->render('admin/logbook_template/new.html.twig', [
            'logbook_template' => $logbookTemplate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_logbook_template_show', methods: ['GET'])]
    public function show(LogbookTemplate $logbookTemplate): Response
    {
        return $this->render('admin/logbook_template/show.html.twig', [
            'logbook_template' => $logbookTemplate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_logbook_template_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LogbookTemplate $logbookTemplate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LogbookTemplateType::class, $logbookTemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Le modèle de carnet a été modifié avec succès.');

            return $this->redirectToRoute('app_admin_logbook_template_index');
        }

        return $this->render('admin/logbook_template/edit.html.twig', [
            'logbook_template' => $logbookTemplate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_logbook_template_delete', methods: ['POST'])]
    public function delete(Request $request, LogbookTemplate $logbookTemplate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$logbookTemplate->getId(), $request->request->get('_token'))) {
            $entityManager->remove($logbookTemplate);
            $entityManager->flush();
            
            $this->addFlash('success', 'Le modèle de carnet a été supprimé avec succès.');
        }

        return $this->redirectToRoute('app_admin_logbook_template_index');
    }
}
```

### 4.6 Modification des contrôleurs existants

#### 4.6.1 Modification du LogbookController

```php
// Ajouter dans le contrôleur existant

use App\Form\LogbookTemplateChoiceType;
use App\Services\Logbook\LogbookTemplateService;

// Modifier la méthode new pour inclure la sélection de modèle
#[Route('/new/{userId}', name: 'app_admin_logbook_new', methods: ['GET', 'POST'])]
public function new(
    Request $request, 
    EntityManagerInterface $entityManager,
    UserRepository $userRepository,
    LogbookTemplateService $logbookTemplateService,
    string $userId = null
): Response {
    // Récupérer l'utilisateur si un ID est fourni
    $user = null;
    if ($userId) {
        $user = $userRepository->find($userId);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
    }

    // Créer un formulaire pour choisir un modèle si l'utilisateur a un métier défini
    $templateForm = null;
    if ($user && $user->getJob()) {
        $templateForm = $this->createForm(LogbookTemplateChoiceType::class, null, [
            'user' => $user,
        ]);
        $templateForm->handleRequest($request);

        if ($templateForm->isSubmitted() && $templateForm->isValid()) {
            $template = $templateForm->get('template')->getData();
            if ($template) {
                $logbook = $logbookTemplateService->createLogbookFromTemplate($template, $user);
                $entityManager->persist($logbook);
                $entityManager->flush();

                $this->addFlash('success', 'Le carnet a été créé avec succès à partir du modèle.');
                return $this->redirectToRoute('app_admin_logbook_show', ['id' => $logbook->getId()]);
            }
        }
    }

    // Formulaire standard pour créer un carnet
    $logbook = new Logbook();
    if ($user) {
        $logbook->setOwner($user);
    }

    $form = $this->createForm(LogbookType::class, $logbook);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($logbook);
        $entityManager->flush();

        $this->addFlash('success', 'Le carnet a été créé avec succès.');
        return $this->redirectToRoute('app_admin_logbook_show', ['id' => $logbook->getId()]);
    }

    return $this->render('admin/logbook/new.html.twig', [
        'logbook' => $logbook,
        'form' => $form,
        'template_form' => $templateForm,
        'user' => $user,
    ]);
}
```

#### 4.6.2 Modification du UserController

```php
// Ajouter dans le contrôleur existant

use App\Services\Logbook\LogbookTemplateService;

// Modifier la méthode new pour créer automatiquement un carnet à partir du modèle par défaut
#[Route('/new', name: 'app_admin_user_new', methods: ['GET', 'POST'])]
public function new(
    Request $request, 
    EntityManagerInterface $entityManager,
    UserPasswordHasherInterface $userPasswordHasher,
    LogbookTemplateService $logbookTemplateService
): Response {
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Hacher le mot de passe
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $form->get('plainPassword')->getData()
            )
        );

        $entityManager->persist($user);
        
        // Créer un carnet à partir du modèle par défaut si disponible
        if ($user->getJob()) {
            $defaultTemplate = $logbookTemplateService->getDefaultTemplateForUser($user);
            if ($defaultTemplate) {
                $logbook = $logbookTemplateService->createLogbookFromTemplate($defaultTemplate, $user);
                $entityManager->persist($logbook);
            }
        }
        
        $entityManager->flush();

        $this->addFlash('success', 'L\'utilisateur a été créé avec succès.');
        return $this->redirectToRoute('app_admin_user_index');
    }

    return $this->render('admin/user/new.html.twig', [
        'user' => $user,
        'form' => $form,
    ]);
}
```

## 5. Templates Twig

### 5.1 templates/admin/logbook_template/index.html.twig

```twig
{% extends 'base.html.twig' %}

{% block title %}Liste des modèles de carnet{% endblock %}

{% block body %}
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des modèles de carnet</h1>
            <a href="{{ path('app_admin_logbook_template_new') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Nouveau modèle
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Métiers</th>
                                <th>Thèmes</th>
                                <th>Par défaut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        {% for logbook_template in logbook_templates %}
                            <tr>
                                <td>{{ logbook_template.name }}</td>
                                <td>
                                    {% for job in logbook_template.jobs %}
                                        <span class="badge bg-secondary">{{ job.name }}</span>
                                    {% endfor %}
                                </td>
                                <td>{{ logbook_template.themes|length }}</td>
                                <td>
                                    {% if logbook_template.isDefault %}
                                        <span class="badge bg-success">Oui</span>
                                    {% else %}
                                        <span class="badge bg-light text-dark">Non</span>
                                    {% endif %}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ path('app_admin_logbook_template_show', {'id': logbook_template.id}) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ path('app_admin_logbook_template_edit', {'id': logbook_template.id}) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan="5" class="text-center">Aucun modèle de carnet trouvé</td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
```

### 5.2 templates/admin/logbook_template/new.html.twig

```twig
{% extends 'base.html.twig' %}

{% block title %}Nouveau modèle de carnet{% endblock %}

{% block body %}
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Nouveau modèle de carnet</h1>
            <a href="{{ path('app_admin_logbook_template_index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                {{ form_start(form) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ form_row(form.name) }}
                            {{ form_row(form.description) }}
                            {{ form_row(form.isDefault) }}
                        </div>
                        <div class="col-md-6">
                            {{ form_row(form.jobs) }}
                            {{ form_row(form.themes) }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Enregistrer
                        </button>
                    </div>
                {{ form_end(form) }}
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser Select2 pour les thèmes
            $('.select2').select2({
                placeholder: 'Sélectionnez les thèmes',
                width: '100%'
            });
        });
    </script>
{% endblock %}


### 5.3 templates/admin/logbook_template/edit.html.twig

```twig
{% extends 'base.html.twig' %}

{% block title %}Modifier le modèle de carnet{% endblock %}

{% block body %}
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Modifier le modèle de carnet</h1>
            <div>
                <a href="{{ path('app_admin_logbook_template_index')  }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left me-1"></i> Retour à la liste
                </a>
                {{ include('admin/logbook_template/_delete_form.html.twig') }}
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                {{ form_start(form) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ form_row(form.name) }}
                            {{ form_row(form.description) }}
                            {{ form_row(form.isDefault) }}
                        </div>
                        <div class="col-md-6">
                            {{ form_row(form.jobs) }}
                            {{ form_row(form.themes) }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Enregistrer
                        </button>
                    </div>
                {{ form_end(form) }}
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser Select2 pour les thèmes
            $('.select2').select2({
                placeholder: 'Sélectionnez les thèmes',
                width: '100%'
            });
        });
    </script>
{% endblock %}
```

### 5.4 templates/admin/logbook_template/show.html.twig
```twig
{% extends 'base.html.twig' %}

{% block title %}Détails du modèle de carnet{% endblock %}

{% block body %}
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ logbook_template.name }}</h1>
            <div>
                <a href="{{ path('app_admin_logbook_template_index')  }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left me-1"></i> Retour à la liste
                </a>
                <a href="{{ path('app_admin_logbook_template_edit', {'id': logbook_template.id}) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil me-1"></i> Modifier
                </a>
                {{ include('admin/logbook_template/_delete_form.html.twig') }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Informations générales</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{ logbook_template.name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ logbook_template.description|nl2br }}</td>
                                </tr>
                                <tr>
                                    <th>Modèle par défaut</th>
                                    <td>
                                        {% if logbook_template.isDefault %}
                                            <span class="badge bg-success">Oui</span>
                                        {% else %}
                                            <span class="badge bg-light text-dark">Non</span>
                                        {% endif %}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Métiers concernés</th>
                                    <td>
                                        {% for job in logbook_template.jobs %}
                                            <span class="badge bg-secondary">{{ job.name }}</span>
                                        {% endfor %}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Thèmes inclus</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            {% for theme in logbook_template.themes %}
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ theme.title }}
                                    <span class="badge bg-primary rounded-pill">{{ theme.modules|length }} modules</span>
                                </li>
                            {% else %}
                                <li class="list-group-item">Aucun thème associé à ce modèle</li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
```

### 5.5 templates/admin/logbook_template/_delete_form.html.twig

```html
<form method="post" action="{{ path('app_admin_logbook_template_delete', {'id': logbook_template.id}) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle de carnet ?');" class="d-inline">
    <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ logbook_template.id) }}">
    <button class="btn btn-danger">
        <i class="bi bi-trash me-1"></i> Supprimer
    </button>
</form>
```

### 5.6 Modification de templates/admin/logbook/new.html.twig

```twig
{% extends 'base.html.twig' %}

{% block title %}Nouveau carnet{% endblock %}

{% block body %}
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Nouveau carnet{% if user %} pour {{ user.fullname }}{% endif %}</h1>
            <a href="{{ path('app_admin_logbook_index')  }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>

        {% if template_form is not null %}
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Créer à partir d'un modèle</h5>
                </div>
                <div class="card-body">
                    {{ form_start(template_form) }}
                        <div class="row">
                            <div class="col-md-8">
                                {{ form_row(template_form.template) }}
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-check-circle me-1"></i> Utiliser ce modèle
                                </button>
                            </div>
                        </div>
                    {{ form_end(template_form) }}
                </div>
            </div>

            <div class="text-center mb-4">
                <p class="text-muted">- ou -</p>
            </div>
        {% endif %}

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Créer un carnet personnalisé</h5>
            </div>
            <div class="card-body">
                {{ form_start(form) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ form_row(form.name) }}
                        </div>
                        <div class="col-md-6">
                            {{ form_row(form.owner) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{ form_row(form.themes) }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Enregistrer
                        </button>
                    </div>
                {{ form_end(form) }}
            </div>
        </div>
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser Select2 pour les thèmes
            $('.select2').select2({
                placeholder: 'Sélectionnez les thèmes',
                width: '100%'
            });
        });
    </script>
{% endblock %}
```

## 7. Avantages et inconvénients

### 7.1 Avantages

- Gain de temps : Les administrateurs pourront créer rapidement des carnets d'intégration pour les nouveaux agents en utilisant des modèles prédéfinis.
- Standardisation : Les parcours d'intégration seront standardisés par métier, garantissant une cohérence dans le processus d'intégration.
- Flexibilité : Les modèles peuvent être personnalisés selon les besoins spécifiques de chaque agent.
- Maintenance simplifiée : Les modifications apportées aux modèles peuvent être appliquées à tous les nouveaux carnets créés.
- Meilleure organisation : Les modèles permettent une meilleure organisation des thèmes et modules par métier.

### 7.2 Inconvénients

- Complexité accrue : L'ajout d'une nouvelle entité et de nouvelles relations augmente la complexité du système.
- Migration des données : Les carnets existants ne bénéficieront pas automatiquement de cette fonctionnalité.
- Maintenance des modèles : Les modèles devront être maintenus à jour en fonction de l'évolution des métiers et des processus d'intégration.
- Risque de rigidité : Une trop grande standardisation pourrait limiter l'adaptabilité aux besoins spécifiques.
- Formation nécessaire : Les administrateurs devront être formés à l'utilisation de cette nouvelle fonctionnalité.

## 8. Conclusion

La fonctionnalité "Créer des modèles de carnet" est une amélioration significative du système actuel qui permettra de gagner du temps et d'assurer une meilleure cohérence dans le processus d'intégration des nouveaux agents. Elle est techniquement réalisable avec l'ajout d'une nouvelle entité LogbookTemplate et des modifications mineures dans le processus de création des carnets.

Cette fonctionnalité s'inscrit parfaitement dans la logique du système existant et répond à un besoin concret d'optimisation du processus d'intégration. Les avantages en termes de gain de temps et de standardisation surpassent largement les inconvénients liés à la complexité accrue du système.

La mise en œuvre de cette fonctionnalité nécessitera une migration de base de données, la création de nouvelles entités, services, contrôleurs et templates, ainsi que la modification de certains composants existants. Une fois implémentée, elle offrira une expérience utilisateur améliorée et une gestion plus efficace des carnets d'intégration.
