<?php

    namespace App\Controller;

    use App\Entity\Vetement;
use App\Form\Type\VetementType;
use App\Repository\VetementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
    
    class VetementController extends AbstractController {
        #[Route('/vetement', name: 'vetementAll')]
        public function vetementListAll(VetementRepository $vetementRepository): Response {
            
            $vetements = $vetementRepository->findAll();

            return $this->render('vetementAll.html.twig', [
                "vetements" =>  $vetements,
            ]);
        }

        #[Route('/vetementSingle', name: 'vetementSingle')]
        public function vetementById(VetementRepository $vetementRepository): Response {
            
            $vetements = $vetementRepository->findOneBy(["nom" => "Pull"]);

            return $this->render('vetementSingle.html.twig', [
                "vetement" =>  $vetements,
            ]);
        }

        #[Route('/vetementAjout', name: 'creationVetement')]
        public function ajoutVetement(Request $request, EntityManagerInterface $em): Response {
            
            $vetement = new Vetement();
            $form = $this->createForm(VetementType::class, $vetement);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($vetement);
                $em->flush();
         
                $this->addFlash('success', 'Vetement créé!');
                return $this->redirectToRoute('accueil');
            }

            return $this->render('ajoutVetement.html.twig', [
                'vetement' => $vetement,
                'formulaire' => $form->createView()
            ]);
        }

        #[Route('/vetementSuppression', name: 'suppressionVetement')]
        public function suppressionVetement(Request $request, EntityManagerInterface $em): Response {
            
            $vetement = new Vetement();
            $form = $this->createForm(VetementType::class, $vetement);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($vetement);
                $em->flush();
         
                $this->addFlash('success', 'Vetement créé!');
                return $this->redirectToRoute('accueil');
            }

            return $this->render('ajoutVetement.html.twig', [
                'vetement' => $vetement,
                'formulaire' => $form->createView()
            ]);
        }
    }
?>