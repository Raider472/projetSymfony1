<?php

    namespace App\Form\Type;

    use App\Entity\Marque;
    use App\Entity\Taille;
    use App\Entity\Vetement;
use App\Entity\Widget;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;


    class VetementType extends AbstractType {
        public function buildForm(FormBuilderInterface $builder, array $options): void {
            $builder
                ->add('nom', TextType::class, [
                    'label' => 'Nom du vetement',
                ])
                ->add("lien", TextType::class, [
                    'label' => "lien de l'image",
                ])
                ->add('marque', EntityType::class, [
                    'class' => Marque::class,
                    'choice_label' => 'nom',
                    'label' => 'Marque du Vêtement',
                ])
                ->add('taille', EntityType::class, [
                    'class'=> Taille::class,
                    'choice_label' => 'nom',
                    'label' => 'taille du Vêtement',
                    'multiple' => true,
                    'expanded' => true,
                ])
                ->add('ajouter', SubmitType::class, [
                    'attr' => ['class' => 'save'],
                ])

            ;
        }

        public function configureOptions(OptionsResolver $resolver): void {
            $resolver->setDefaults([
                'data_class' => Vetement::class,
            ]);
        }
    }
?>