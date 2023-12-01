<?php
    namespace App\Service;

use App\Entity\Marque;
use App\Entity\Vetement;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

    class AppService {
        public function __construct(private EntityManagerInterface $em) {
            
        }

        public function save(Vetement | Marque $objet): void {
            $this->em->persist($objet);
            $this->em->flush();
        }
    }
?>