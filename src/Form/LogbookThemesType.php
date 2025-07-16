<?php

namespace App\Form;

use App\Entity\Logbook;
use App\Entity\Theme;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogbookThemesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Logbook|null $logbook */
        $logbook = $options['data'] ?? null;

        $builder
            ->add('themes', EntityType::class, [
                'class' => Theme::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'label' => 'Ajouter des thèmes',
                'mapped' => false, // Ne pas mapper directement à l'entité
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.title', 'ASC');
                },
                'choice_filter' => function (?Theme $theme) use ($logbook) {
                    // Si le thème ou le carnet sont null, ou si leurs IDs sont null, inclure le thème dans la liste
                    if ($theme === null || $logbook === null) {
                        return true;
                    }

                    $themeId = $theme->getId();
                    if ($themeId === null) {
                        return true;
                    }

                    // Ne pas montrer les thèmes déjà associés au carnet
                    foreach ($logbook->getThemes() as $existingTheme) {
                        $existingThemeId = $existingTheme->getId();
                        if ($existingThemeId !== null && $existingThemeId->equals($themeId)) {
                            return false;
                        }
                    }

                    return true;
                },
                'attr' => [
                    'class' => 'form-control select2',
                    'data-placeholder' => 'Sélectionnez les thèmes à ajouter...'
                ],
                'help' => 'Sélectionnez les thèmes à ajouter au carnet.',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Logbook::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'logbook_themes_form',
        ]);
    }
}
