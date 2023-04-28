<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Validator\Constraints\Regex;

class Article1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre_artic', TextType::class, [
            'label' => 'titre_artic',
            'constraints' => [
                new Regex([
                    'pattern' => '/^[a-zA-Z]+$/',
                    'message' => 'Le champ Type ne doit contenir que des lettres.',
                ])
            ]
        ])
            ->add('theme_artic')
            ->add('date_ajout_artic')
            ->add('descriptif_artic', TextType::class, [
                'label' => 'descriptif_artic',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le champ Type ne doit contenir que des lettres.',
                    ])
                ]
            ])
            ->add('categorieArticle')
            ->add('image',FileType::class,[
                'mapped'=>false,
                'required'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
