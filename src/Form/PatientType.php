<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\Medecin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num_unique_rdz')
            ->add('genre')
            ->add('nom_patient')
            ->add('prenom_patient')
            ->add('date_naissance')
            ->add('mutuelle')
            ->add('date_rdz')
            ->add('telephone')
            ->add('ville')
            ->add('quartier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
