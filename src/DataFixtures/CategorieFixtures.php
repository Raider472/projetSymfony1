<?php
    namespace App\DataFixtures;
 
    use App\Entity\Categorie;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
     
    class CategorieFixtures extends Fixture
    {
        public const CATEGORIE_REFERENCE = 'Categorie';
        
        public function load(ObjectManager $manager) {
            $nomsCategorie = [
                "Shirt",
                "Pull",
                "Chausure",
                "Pantalon",
                "Other"
            ];
     
            foreach ($nomsCategorie as $key => $nomCategorie) {
                $categorie = new Categorie();
                $categorie->setNom($nomCategorie);
                $manager->persist($categorie);
                $this->addReference(self::CATEGORIE_REFERENCE . '_' . $key, $categorie);
            }
     
            $manager->flush();
        }
    }
?>
