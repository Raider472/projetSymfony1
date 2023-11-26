<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AcceuilController extends AbstractController {
    #[Route('/', name: 'acceuil')]
    public function accueil(): Response {
        return $this->render('accueil.html.twig', []);
    }
}

?>