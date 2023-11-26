<?php
    namespace App\DataFixtures;
 
    use App\Entity\Marque;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
     
    class MarqueFixtures extends Fixture
    {
        public const MARQUE_REFERENCE = 'Marque';
        
        public function load(ObjectManager $manager)
        {
            $nomsMarque = [
                "Gucci",
                "China",
                "Kipling",
                "JSP"
            ];
     
            foreach ($nomsMarque as $key => $nomMarque) {
                $marque = new Marque();
                $marque->setNom($nomMarque);
                $manager->persist($marque);
                $this->addReference(self::MARQUE_REFERENCE . '_' . $key, $marque);
            }
     
            $manager->flush();
        }
    }
?>