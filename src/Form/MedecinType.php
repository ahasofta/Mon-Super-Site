<?php

namespace App\Form;

use App\Entity\Medecin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
<<<<<<< HEAD
=======
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
>>>>>>> ff5ca654aa1edaa135f63e83f201afdd7316b165
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_med')
            ->add('prenom_med')
            ->add('specialite')
            ->add('localisation')
<<<<<<< HEAD
            ->add('visualiser')
            ->add('patients')
=======
            
>>>>>>> ff5ca654aa1edaa135f63e83f201afdd7316b165
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
