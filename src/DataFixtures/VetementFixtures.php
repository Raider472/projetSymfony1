<?php
    namespace App\DataFixtures;
 
    use App\Entity\Vetement;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
     
    class VetementFixtures extends Fixture
    {
        public const VETEMENT_REFERENCE = 'Vetment';
        
        public function load(ObjectManager $manager)
        {
            $nomsVetement = [
                "Shirt",
                "Pull",
                "Chausure",
                "Pantalon"
            ];
     
            foreach ($nomsVetement as $key => $nomVetement) {
                $vetement = new Vetement();
                $vetement->setNom($nomVetement);
                $vetement->addTaille($this->getReference(TailleFixtures::TAILLE_REFERENCE . "_" . "0"));
                $vetement->setMarque($this->getReference(MarqueFixtures::MARQUE_REFERENCE . "_" . "0"));
                $manager->persist($vetement);
                $this->addReference(self::VETEMENT_REFERENCE . '_' . $key, $vetement);
            }
     
            $manager->flush();
        }
    }
?>
