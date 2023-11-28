<?php

    namespace App\Form\Type;

    use App\Entity\Marque;
    use App\Entity\Taille;
    use App\Entity\Vetement;
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
                ->add('marque', EntityType::class, [
                    'class' => Marque::class,
                    'choice_label' => 'nom',
                    'label' => 'Marque du Vêtement',
                ])
                ->add('taille', EntityType::class, [
                    'class'=> Taille::class,
                    'choice_label' => 'nom',
                    'label' => 'taille du Vêtement',
                    'multiple' => true,  // Permet de sélectionner plusieurs tailles
                    'expanded' => true,  // Affiche les tailles sous forme de cases à cocher
                ])
                ->add('save', SubmitType::class, [
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