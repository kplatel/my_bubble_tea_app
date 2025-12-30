<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'app_ingredient')]
    public function index(IngredientRepository $repository): Response
    {
        // On récupère tous les ingrédients en base de données
        $ingredients = $repository->findAll();

        return $this->render('ingredient/ingredient.html.twig', [
            'ingredients' => $ingredients,
        ]);
    }
}
