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
                'label' => 'Quantité',
                'attr' => [
                    'min' => 1,
                    'html5' => false
                ],
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Quantité doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Le champ Quantité ne doit contenir que des chiffres.',
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
            ->add('idOeuvre')

            ->add('idU')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
