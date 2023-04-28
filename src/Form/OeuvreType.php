<?php

namespace App\Form;

use App\Entity\Oeuvre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Type;


class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Type',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le champ Type ne doit contenir que des lettres.',
                    ])
                ]
            ])
            ->add('nb', IntegerType::class, [
                'label' => 'Nombre',
<<<<<<< Updated upstream
=======
                'attr' => [
                    'min' => 1,
                    'html5' => false
                ],
>>>>>>> Stashed changes
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Nombre doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Le champ Nombre ne doit contenir que des chiffres.',
                    ]),
                ]
            ])
            ->add('couleur', TextType::class, [
                'label' => 'Couleur',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le champ Couleur ne doit contenir que des lettres.',
                    ])
                ]
            ])
            ->add('prix', NumberType::class, [
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
            ->add('dimension', NumberType::class, [
                'label' => 'Dimension',
                'constraints' => [
                    new PositiveOrZero([
                        'message' => 'Le champ Dimension doit être positif ou nul.',
                    ]),
                    new Type([
                        'type' => 'float',
                        'message' => 'Le champ Dimension ne doit contenir que des chiffres.',
                    ]),
                ]
            ])
            ->add('id_u', IntegerType::class, [
                'label' => 'Id_u',
<<<<<<< Updated upstream
=======
                'attr' => [
                    'min' => 1,
                    'html5' => false
                ],
>>>>>>> Stashed changes
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
            'data_class' => Oeuvre::class,
        ]);
    }
<<<<<<< Updated upstream
=======
    
>>>>>>> Stashed changes
}
