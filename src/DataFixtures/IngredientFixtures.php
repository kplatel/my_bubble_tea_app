<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ingredient;

class IngredientFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $base = new Ingredient();
        $base
                ->setNom('Green Tea')
                ->setType('base')
                ->setPrix(3.50)
                ->setCalories(50);

                $manager->persist($base);
                $this->addReference('ing-green-tea', $base);

        $topping = new Ingredient();
        $topping
                ->setNom('Tapioca Pearls')
                ->setType('topping')
                ->setPrix(0.50)
                ->setCalories(120);

                $manager->persist($topping);
                $this->addReference('ing-tapioca', $topping);

        $sirop = new Ingredient();
        $sirop->setNom('Fraise')
                ->setType('sirop')
                ->setPrix(0.50)
                ->setCalories(40);


                $manager->persist($sirop);
                $this->addReference('ing-fraise', $sirop);


        $manager->flush();
    }

}
