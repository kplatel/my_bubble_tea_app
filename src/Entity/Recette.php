<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $prixTotal = null;

    #[ORM\Column]
    private ?int $caloriesTotal = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?Ingredient $base = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?Ingredient $sirop = null;

    #[ORM\ManyToOne(inversedBy: 'topping')]
    private ?Ingredient $topping = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getCaloriesTotal(): ?int
    {
        return $this->caloriesTotal;
    }

    public function setCaloriesTotal(int $caloriesTotal): static
    {
        $this->caloriesTotal = $caloriesTotal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getBase(): ?Ingredient
    {
        return $this->base;
    }

    public function setBase(?Ingredient $base): static
    {
        $this->base = $base;

        return $this;
    }

    public function getSirop(): ?Ingredient
    {
        return $this->sirop;
    }

    public function setSirop(?Ingredient $sirop): static
    {
        $this->sirop = $sirop;

        return $this;
    }

    public function getTopping(): ?Ingredient
    {
        return $this->topping;
    }

    public function setTopping(?Ingredient $topping): static
    {
        $this->topping = $topping;

        return $this;
    }
}
