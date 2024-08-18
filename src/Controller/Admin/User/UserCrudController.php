<?php

namespace App\Controller\Admin\User;

use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
        ;

        yield TextField::new(propertyName: 'firstname', label: 'Prénom')
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield TextField::new(propertyName: 'lastname', label: 'Nom')
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield TextField::new(propertyName: 'email', label: 'Email')->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield TextField::new(propertyName: 'password', label: 'Mot de passe')
            ->setFormType(formTypeFqcn: PasswordType::class)
            ->onlyWhenCreating()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield ChoiceField::new(propertyName: 'roles', label: 'Rôles')
            ->setChoices(choiceGenerator: [
                'Administrateur' => 'ROLE_ADMIN',
                'Tuteur' => 'ROLE_MENTOR',
                'Nouvel arrivant' => 'ROLE_NEWCOMER',
            ])
            ->allowMultipleChoices(allow: true) // Permet la sélection multiple
            ->renderExpanded(expanded: false) // Affiche les choix comme une liste déroulante
            ->renderAsBadges([
                'ROLE_ADMIN' => 'danger',
                'ROLE_MENTOR' => 'success',
                'ROLE_NEWCOMER' => 'warning',
            ])
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield TextField::new(propertyName: 'jobLabel', label: 'Métier')->hideOnForm();
        yield ChoiceField::new(propertyName: 'job', label: 'Métier')
            ->setChoices(choiceGenerator: [
                'Technicien' => JobEnum::TECHNICIEN,
                'Ingénieur' => JobEnum::INGENIEUR,
                "Chargé d'affaires" => JobEnum::CHARGE_AFFAIRES,
                "Chargé d'affaires projet" => JobEnum::CHARGE_AFFAIRES_PROJET,
                'Chargé de surveillance' => JobEnum::CHARGE_SURVEILLANCE,
            ])
            ->onlyWhenCreating()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield TextField::new(propertyName: 'specialityLabel', label: 'Spécialité')->hideOnForm();
        yield ChoiceField::new(propertyName: 'speciality', label: 'Spécialité')
            ->setChoices(choiceGenerator: [
                'Chaudronnerie' => SpecialityEnum::CHA,
                'Levage' => SpecialityEnum::LEV,
                'Mécanique' => SpecialityEnum::MEC,
                'Robinetterie' => SpecialityEnum::ROB,
                'Soudage' => SpecialityEnum::SOU,
            ])
            ->onlyOnForms()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield AssociationField::new(propertyName: 'mentor', label: 'Tuteur')
            ->setRequired(isRequired: true)
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield DateTimeField::new(propertyName: 'hiringAt', label: 'Date d\'embauche')
            ->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormType(formTypeFqcn: DateType::class)
        ;

        yield DateTimeField::new(propertyName: 'lastLoginAt', label: 'Dernière connexion')->hideOnIndex()->hideOnForm();
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular(label: 'Utilisateur')

            ->setEntityLabelInPlural(label: 'Utilisateurs')

            ->setPageTitle(pageName: 'index', title: '⚡️ Liste des agents')

            ->setPaginatorPageSize(maxResultsPerPage: 20)

            ->setPageTitle(
                pageName: 'detail',
                title: fn (User $user) => '👁️ Détails - '.$user->getFullName()
            )

            ->setPageTitle(
                pageName: 'edit',
                title: fn (User $user) => '🧑‍💻 Modifier - '.$user->getFullName()
            )

            ->setPageTitle(
                pageName: 'new',
                title: '⭐️ Créer un nouvel utilisateur'
            )

            ->setDateTimeFormat(
                dateFormatOrPattern: DateTimeField::FORMAT_LONG,
                timeFormat: DateTimeField::FORMAT_SHORT
            );
    }

    /**
     * @param User $entityInstance
     */
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof User && $entityInstance->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $entityInstance,
                $entityInstance->getPassword()
            );
            $entityInstance->setPassword($hashedPassword);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}
