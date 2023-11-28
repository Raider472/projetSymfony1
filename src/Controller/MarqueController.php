<?php

    namespace App\Controller;

    use Doctrine\ORM\EntityManagerInterface;
    use App\Entity\Marque; 
    use App\Form\Type\MarqueType; 
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class MarqueController extends AbstractController {

        #[Route('/ajoutDeMarque', name: 'creationMarque', methods: ['GET', 'POST'])]
        public function ajoutMarque(Request $request, EntityManagerInterface $em): Response {

            $marque = new Marque();
            $form = $this->createForm(MarqueType::class, $marque);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($marque);
                $em->flush();
         
                $this->addFlash('success', 'Marque créé!');
                return $this->redirectToRoute('acceuil');
            }

            return $this->render('ajoutMarque.html.twig', [
                'marque' => $marque,
                'formulaire' => $form->createView()
            ]);
        }
    }
?>