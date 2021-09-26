<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', options: array('attr' => array('class' => 'form-control')))
            // ->add('roles')
            // ->add('password')
            // ->add('isVerified')
            ->add('name', options: array('attr' => array('class' => 'form-control')))
            ->add('firstname', options: array('attr' => array('class' => 'form-control')))
            // ->add('clientId')
            ->add('phone', options: array('attr' => array('class' => 'form-control', 'type' => 'number')))
            ->add('adressLine1', options: array('attr' => array('class' => 'form-control')))
            ->add('adressLine2', options: array('attr' => array('class' => 'form-control')))
            ->add('postcode', options: array('attr' => array('class' => 'form-control')))
            ->add('country', options: array('attr' => array('class' => 'form-control')))
            ->add('Valider', SubmitType::class, options: array('attr' => array('class' => 'btn btn-primary')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
