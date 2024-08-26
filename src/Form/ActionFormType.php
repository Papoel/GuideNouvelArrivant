<?php

namespace App\Form;

use App\Entity\Action;
use App\Entity\Module;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(child: 'description', type: TextareaType::class, options: [
                'attr' => [
                    'rows' => 5,
                ],
            ])
            ->add(child: 'agentComment', type: TextareaType::class, options: [
                'attr' => [
                    'rows' => 5,
                ],
            ])
            ->add(child: 'agentValidatedAt', type: DateType::class, options: [
                'widget' => 'single_text',
            ])
            ->add(child: 'agentVisa')
            ->add(child: 'mentorComment', type: TextareaType::class, options: [
                'attr' => [
                    'rows' => 5,
                ],
            ])
            ->add(child: 'mentorValidatedAt', type: DateType::class, options: [
                'widget' => 'single_text',
            ])
            ->add(child: 'mentorVisa')
            ->add(child: 'module', type: EntityType::class, options: [
                'class' => Module::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Action::class,
        ]);
    }
}
