<?php

namespace App\Form;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MentorActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(child: 'mentorComment', type: TextareaType::class, options: [
                'label' => 'Commentaires',
                'attr' => ['rows' => 5],
                'required' => false,
            ])
            ->add(
                child: 'submit',
                type: SubmitType::class,
                options: [
                    'label' => 'Sauvegarder',
                    'attr' => ['class' => 'btn btn-sm btn-primary me-2'],
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Action::class,
            'attr' => ['novalidate' => 'novalidate'],
        ]);
    }
}
