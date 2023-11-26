<?php
    namespace App\DataFixtures;
 
    use App\Entity\Taille;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
     
    class TailleFixtures extends Fixture
    {
        public const TAILLE_REFERENCE = 'Taille';
        
        public function load(ObjectManager $manager)
        {
            $nomsTaille = [
                "S",
                "M",
                "L",
                "XL",
                "XXL"
            ];
     
            foreach ($nomsTaille as $key => $nomTaille) {
                $taille = new Taille();
                $taille->setNom($nomTaille);
                $manager->persist($taille);
                $this->addReference(self::TAILLE_REFERENCE . '_' . $key, $taille);
            }
     
            $manager->flush();
        }
    }
?>