<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Recette;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\IngredientRepository;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('nom')
    ->add('base', EntityType::class, [
        'class' => Ingredient::class,
        'query_builder' => function (IngredientRepository $er) {
            return $er->createQueryBuilder('i')
                ->where('i.type = :type')
                ->setParameter('type', 'base');
        },
        'choice_label' => 'nom',
    ])
    ->add('sirop', EntityType::class, [
        'class' => Ingredient::class,
        'query_builder' => function (IngredientRepository $er) {
            return $er->createQueryBuilder('i')
                ->where('i.type = :type')
                ->setParameter('type', 'sirop');
        },
        'choice_label' => 'nom',
    ])
    ->add('topping', EntityType::class, [
        'class' => Ingredient::class,
        'query_builder' => function (IngredientRepository $er) {
            return $er->createQueryBuilder('i')
                ->where('i.type = :type')
                ->setParameter('type', 'topping');
        },
        'choice_label' => 'nom',
    ]);
}
}
