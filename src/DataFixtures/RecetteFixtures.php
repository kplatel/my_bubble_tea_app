<?php

// src/DataFixtures/RecetteFixtures.php
namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\IngredientFixtures;

class RecetteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $user = $this->getReference('user-test', \App\Entity\User::class);

        // CRÉATION D'UNE RECETTE LIÉE À L'UTILISATEUR
        $recette1 = new Recette();
        $recette1->setNom('Mon Boba d\'été');
        $recette1->setPrixTotal(5.50);
        $recette1->setCaloriesTotal(250);
        $recette1->setUser($user);

        $manager->persist($recette1);

        $recette2 = new Recette();
        $recette2->setNom('Délice Tapioca');
        $recette2->setPrixTotal(6.20);
        $recette2->setCaloriesTotal(310);
        $recette2->setUser($user);

        $manager->persist($recette2);

        // On envoie tout en base de données
        $manager->flush();

    }

    // Cette fonction ordonne à Symfony de charger User et Ingredient d'abord
    public function getDependencies():array
    {
        return [
            UserFixtures::class,
            IngredientFixtures::class,
        ];
    }
}
