<?php

namespace App\Form;

use App\Entity\Bieres;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BieresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('marque_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('titreAlcool_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('contenance_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('prixAchat_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('prixVente_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('prixTTC_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('type1_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('type2_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('type3_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('profil_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('couleur_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('fabricant_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('conditionnement', options: array('attr' => array('class' => 'form-control')))
            ->add('origine_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('description_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('ingredients_Biere', options: array('attr' => array('class' => 'form-control')))
            ->add('consigne_Biere', options: array('attr' => array('class' => 'form-check-input')))
            ->add('Bio_Biere', options: array('attr' => array('class' => 'form-check-input')))
            ->add('promo_Biere', options: array('attr' => array('class' => 'form-check-input')))
            ->add('sansAlc_Biere', options: array('attr' => array('class' => 'form-check-input')))
            ->add('SGluten_Biere', options: array('attr' => array('class' => 'form-check-input')))
            ->add('actif', options: array('attr' => array('class' => 'form-check-input')))
            ->add('users', options: array('attr' => array('class' => 'form-control')))
            ->add('images', FileType::class,[
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false], array('attr' => array('class' => 'form-control'))
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bieres::class,
        ]);
    }
}
