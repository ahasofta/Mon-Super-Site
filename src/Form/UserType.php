<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            //->add('usernameCanonical')
            ->add('email')
           // ->add('emailCanonical')
            ->add('enabled')
           // ->add('salt')
            ->add('password',PasswordType::class)
            //->add('lastLogin')
           // ->add('confirmationToken')
           // ->add('passwordRequestedAt')
           ->add('roles', ChoiceType::class, [
            'choices' => [
                'ROLE_MEDECIN' => 'ROLE_MEDECIN',
                'ROLE_PARTENAIRE' => 'ROLE_PARTENAIRE',
                'ROLE_ADMIN' => 'ROLE_ADMIN'
            ],
            'expanded' => false,
            'multiple' => true,
            'label' => 'Rôles' 
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
