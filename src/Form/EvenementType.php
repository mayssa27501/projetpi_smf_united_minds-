<?php

namespace App\Form;

use Symfony\Component\Validator\Constraints\Regex;
use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', null, [
            'constraints' => [
                new NotBlank(),
                new Regex([
                    'pattern' => '/^[^\d]+$/',
                    'message' => 'Le nom ne peut pas contenir de chiffres',
                ]),
            ],
        ])
            ->add('descriptif', null, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('image')
            ->add('likes', null, [
                'constraints' => [
                    new Positive(),
                ],
            ])
            ->add('nbParticipants', null, [
                'constraints' => [
                    new Positive(),
                ],
            ])
            ->add('idCategorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'label' => 'Categorie'
            ])
            ->add('dateDebut', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                
                'attr' => [
                    'class' => 'js-datepicker',
                    'autocomplete' => 'off',
                ],
            ])
            ->add('dateFin', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
        
                'attr' => [
                    'class' => 'js-datepicker',
                    'autocomplete' => 'off',
                ],
            ])
    
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}



/* <?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;


class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('descriptif')
            ->add('image')
            ->add('likes')
            ->add('nbParticipants')
            
            ->add('idCategorie',EntityType::class,['class'=> Categorie::class,
           'choice_label'=>'nom',
           'label'=>'Categorie']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
*/ 