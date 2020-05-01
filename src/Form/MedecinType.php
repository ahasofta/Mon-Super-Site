<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Medecin;
use App\Repository\MedecinRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('user',EntityType::class,[
                'class'=> User::class,
               'choice_label' => 'username',    
                
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medecin::class,
        ]);
    }
}
