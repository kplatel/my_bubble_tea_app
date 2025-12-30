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
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);

        return $this->render('builder/builder.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
