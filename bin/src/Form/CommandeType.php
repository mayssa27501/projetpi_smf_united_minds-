<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\Range;



class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('quantite', IntegerType::class, [
                'label' => 'Quantite',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Quantite doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Le champ Quantite ne doit contenir que des chiffres.',
                    ]),
                ]
            ])
            ->add('prixc', NumberType::class, [
                'label' => 'Prix',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Prix doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'float',
                        'message' => 'Le champ Prix ne doit contenir que des chiffres.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => '$',
                    'value' => '$0.00',
                ],
            ])
            ->add('id_oeuvre', IntegerType::class, [
                'label' => 'Id_oeuvre',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Id_oeuvre doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Le champ Id_oeuvre ne doit contenir que des chiffres.',
                    ]),
                    new Range([
                        'min' => 1,
                        'max' => 17,
                        'notInRangeMessage' => 'Oeuvre inexistant',
                    ]),
                ]
            ])

            ->add('id_u', IntegerType::class, [
                'label' => 'Id_u',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Id_u doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Le champ Id_u ne doit contenir que des chiffres.',
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
