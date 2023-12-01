<?php

    namespace App\Controller;

    use App\Entity\Vetement;
use App\Form\Type\VetementType;
use App\Repository\VetementRepository;
use App\Service\AppService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

    
    class VetementController extends AbstractController {

        #[Route('/vetementInspection/{id}', name: 'vetementInspection')]
        public function inspectionVetement(string $id, VetementRepository $vetementRepository): Response {
            $vetement = $vetementRepository->findOneBy(["id" => $id]);

            return $this->render('inspectionVetement.html.twig', [
                "vetement" =>  $vetement,
            ]);
        }

        #[Route('/vetementAjout', name: 'creationVetement')]
        public function ajoutVetement(Request $request, AppService $appService): Response {
            
            $vetement = new Vetement();
            $form = $this->createForm(VetementType::class, $vetement);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $appService->save($vetement);
         
                $this->addFlash('success', 'Vetement créé!');
                return $this->redirectToRoute('accueil');
            }

            return $this->render('ajoutVetement.html.twig', [
                'vetement' => $vetement,
                'formulaire' => $form->createView()
            ]);
        }

        #[Route('/vetementSuppression/{id}', name: 'suppressionVetement')]
        public function suppressionVetement(string $id, EntityManagerInterface $em, VetementRepository $vetementRepository): Response {
            
            $vetement = $vetementRepository->findOneBy(["id" => $id]);

            $em->remove($vetement);
            $em->flush();

            return $this->redirectToRoute('accueil');
        }

        #[Route('/vetementModification/{id}', name: 'modificationVetement')]
        public function modificationVetement(string $id, EntityManagerInterface $em, VetementRepository $vetementRepository, Request $request, AppService $appService): Response {
            
            $vetement = $vetementRepository->findOneBy(["id" => $id]);
            $form = $this->createForm(VetementType::class, $vetement);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $appService->save($vetement);
         
                $this->addFlash('success', 'Vetement modifié!');
                return $this->redirectToRoute('accueil');
            }

            return $this->render('modificationVetement.html.twig', [
                'vetement' => $vetement,
                'formulaire' => $form->createView()
            ]);
        }
    }
?>