<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\User;
use App\Entity\Speciality;
use App\Repository\JobRepository;
use App\Repository\SpecialityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var User $user */
        $user = $builder->getData();

        $builder
            ->add(
                child: 'firstname',
                type: TextType::class,
                options: [
                    'label' => 'Prénom',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Votre prénom',
                    ],
                ]
            )
            ->add(
                child: 'lastname',
                type: TextType::class,
                options: [
                    'label' => 'Nom',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Votre nom',
                    ],
                ]
            )
            ->add(
                child: 'nni',
                type: TextType::class,
                options: [
                    'label' => 'NNI',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Votre NNI',
                    ],
                ]
            )
            ->add(
                child: 'email',
                type: EmailType::class,
                options: [
                    'label' => 'Email',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'votre.email@example.com',
                    ],
                ]
            )
            ->add(
                child: 'hiringAt',
                type: DateType::class,
                options: [
                    'label' => 'Date d\'embauche',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                child: 'job',
                type: EntityType::class,
                options: [
                    'label' => 'Poste',
                    'class' => Job::class,
                    'choice_label' => 'name',
                    'query_builder' => function (JobRepository $repository) {
                        return $repository->createQueryBuilder('j')
                            ->orderBy('j.name', 'ASC');
                    },
                    'attr' => [
                        'class' => 'form-select',
                    ],
                ]
            )
            ->add(
                child: 'speciality',
                type: EntityType::class,
                options: [
                    'label' => 'Spécialité',
                    'class' => Speciality::class,
                    'choice_label' => 'name',
                    'query_builder' => function (SpecialityRepository $repository) {
                        return $repository->createQueryBuilder('s')
                            ->orderBy('s.name', 'ASC');
                    },
                    'attr' => [
                        'class' => 'form-select',
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => User::class,
            ]
        );
    }
}
