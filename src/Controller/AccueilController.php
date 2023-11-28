<?php

namespace App\Controller;

use App\Repository\VetementRepository;
use App\Repository\WidgetRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AccueilController extends AbstractController {
    #[Route('/', name: 'accueil')]
    public function accueil(VetementRepository $vetementRepository): Response {
        $vetement = $vetementRepository->findAll();

        return $this->render('accueil.html.twig', [
            "vetements" =>  $vetement,
        ]);
    }
}

?>