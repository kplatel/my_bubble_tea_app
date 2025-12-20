<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // CRÉATION D'UN UTILISATEUR TEST
        $user = new User();
        $user->setEmail('test@test.com');
        // On hache le mot de passe "mdp123"
        $mdp = $this->hasher->hashPassword($user, 'mdp123');
        $user->setPassword($mdp);
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $this->addReference('user-test', $user);


        // On envoie tout en base de données
        $manager->flush();
    }
}
