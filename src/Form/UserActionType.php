<?php

namespace App\Form;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                child: 'agentComment',
                type: TextareaType::class,
                options: [
                    'label' => 'Commentaires',
                    'attr' => ['rows' => 5],
                    'required' => false,
                    'constraints' => [
                        new Assert\Length(
                            min: 2,
                            max: 1000,
                            minMessage: 'Le commentaire doit faire au moins {{ limit }} caractères',
                            maxMessage: 'Le commentaire ne peut pas dépasser {{ limit }} caractères',
                        ),
                        new Assert\Type(
                            type: 'string',
                            message: 'Le commentaire doit être une chaîne de caractères',
                        ),
                        new Assert\NotBlank(
                            message: 'Un commentaire est requis, merci de laissé un petit mot à ton tuteur.',
                        ),
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
            'data_class' => Action::class,
            'attr' => ['novalidate' => 'novalidate'],
            ]
        );
    }
}
