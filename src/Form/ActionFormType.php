<?php

namespace App\Form;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'required' => false,
            ])
            ->add(child: 'agentComment', type: TextareaType::class, options: [
                'attr' => [
                    'rows' => 5,
                ],
                'required' => false,
            ])
            ->add(child: 'agentValidatedAt', type: DateType::class, options: [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add(child: 'mentorComment', type: TextareaType::class, options: [
                'attr' => [
                    'rows' => 5,
                ],
                'required' => false,
            ])
            ->add(child: 'mentorValidatedAt', type: DateType::class, options: [
                'widget' => 'single_text',
                'required' => false,
            ])

            ->add(child: 'submit', type: SubmitType::class, options: [
                'label' => 'Enregistrer',
                'row_attr' => [
                    'class' => 'd-grid gap-2 btn btn-sm btn-primary',
                ],
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
