<?php

namespace App\Form;

use App\Entity\Panier;
use App\Entity\User;
use App\Entity\Oeuvre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('quantite')
        ->add('id_utilisateur', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'id',
        ])
        ->add('id_oeuvre', EntityType::class, [
            'class' => Oeuvre::class,
            'choice_label' => 'id',
        ])
    ;
}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panier::class,
        ]);
    }
}
