<?php
    namespace App\DataFixtures;
 
    use App\Entity\Vetement;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
     
    class VetementFixtures extends Fixture
    {
        public const VETEMENT_REFERENCE = 'Vetment';
        
        public function load(ObjectManager $manager) {
            $nomsVetement = [
                "Shirt",
                "Pull",
                "Chausure",
                "Pantalon",
                "lappDumb"
            ];

            $liens = [
                "https://media.gucci.com/style/DarkGray_Center_0_0_490x490/1692980128/440103_X3F05_1508_001_100_0000_Light.jpg",
                "https://m.media-amazon.com/images/I/61olBuYEvRL._AC_UF1000,1000_QL80_.jpg",
                "https://www.chaussmomes.com/media/catalog/product/cache/2/image/660x600/85e4522595efc69f496374d01ef2bf13/7/4/74070.jpg",
                "https://www.france-elite.com/696-large_default/pantalon-jeunes-sapeurs-pompiers.jpg",
                "https://openseauserdata.com/files/59d372ab3a14dd0a05ad56726f515749.png"
            ];

            $numéro = 0; //Oui c'est peut-être pas la meilleur manière de génerer des vêtements
     
            foreach ($nomsVetement as $key => $nomVetement) {
                $vetement = new Vetement();
                $vetement->setNom($nomVetement);
                $vetement->setLien($liens[$numéro]);
                $vetement->addTaille($this->getReference(TailleFixtures::TAILLE_REFERENCE . "_" . $numéro));
                $vetement->setMarque($this->getReference(MarqueFixtures::MARQUE_REFERENCE . "_" . $numéro));
                $manager->persist($vetement);
                $this->addReference(self::VETEMENT_REFERENCE . '_' . $key, $vetement);
                $numéro++;
            }
     
            $manager->flush();
        }
    }
?>
