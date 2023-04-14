<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'constraints' => [
                    new NotBlank(),
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
                'choice_label' => 'idCategorie',
                'label' => 'Categorie'
            ]);
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
           'choice_label'=>'idCategorie',
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