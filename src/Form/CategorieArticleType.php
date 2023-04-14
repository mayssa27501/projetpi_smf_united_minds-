<?php

namespace App\Form;

use App\Entity\CategorieArticle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Article;


class CategorieArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCatArtic')
            ->add('dateAjoutArtic')
            ->add('descriptifArtic')
            
            ->add('idArtic',EntityType::class,['class'=> Article::class,
            'choice_label'=>'idArtic',
            'label'=>'Article']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategorieArticle::class,
        ]);
    }
}
