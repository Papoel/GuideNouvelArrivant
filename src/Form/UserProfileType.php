<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var User $user */
        $user = $builder->getData();

        $builder
            ->add(child: 'firstname', type: TextType::class, options: [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre prénom',
                ],
            ])
            ->add(child: 'lastname', type: TextType::class, options: [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre nom',
                ],
            ])
            ->add(child: 'nni', type: TextType::class, options: [
                'label' => 'NNI',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre NNI',
                ],
            ])
            ->add(child: 'email', type: EmailType::class, options: [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'votre.email@example.com',
                ],
            ])
            ->add(child: 'hiringAt', type: DateType::class, options: [
                'label' => 'Date d\'embauche',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add(child: 'job', type: EnumType::class, options: [
                'label' => 'Poste',
                'class' => JobEnum::class,
                'choice_label' => fn ($choice) => $choice->value,
                'attr' => [
                    'class' => 'form-select',
                ],
            ])
            ->add(child: 'speciality', type: EnumType::class, options: [
                'label' => 'Spécialité',
                'class' => SpecialityEnum::class,
                'choice_label' => fn ($choice) => $choice->value,
                'attr' => [
                    'class' => 'form-select',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
