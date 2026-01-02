<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Recette;
use App\Repository\RecetteRepository;

use App\Form\RecetteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BuilderController extends AbstractController
{
    #[Route('/builder', name: 'app_builder')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        // 1. On crée une nouvelle instance de Recette
        $recette = new Recette();

        // 2. On crée le formulaire
        $form = $this->createForm(RecetteType::class, $recette);

        // 3. On demande au formulaire d'écouter la requête (le clic sur le bouton)
        $form->handleRequest($request);

        // 4. Si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère l'utilisateur connecté pour le lier à la recette
            $user = $this->getUser();
            if ($user) {
                $recette->setUser($user);
            }

            // 5. On demande à Doctrine de sauvegarder
            $em->persist($recette);
            $em->flush();

            // 6. On ajoute un petit message de succès
            $this->addFlash('success', 'Votre Bubble Tea a été enregistré !');

            // On redirige (par exemple vers la page de la liste des ingrédients pour l'instant)
            return $this->redirectToRoute('app_ingredient_index');
        }

        return $this->render('builder/builder.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
