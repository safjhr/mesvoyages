<?php

namespace App\Form;

use App\Entity\Environnement;
use App\Entity\Visite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ville')
            ->add('pays')
            
            
            ->add('note')
            ->add('avis')
            ->add('tempmin', null, [
                'label' =>'t° min'
            ])
            ->add('tempmax', null, [
                'label' =>'t° max'
            ])
            ->add('environnements', EntityType::class, [
                'class' => Environnement::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'required' => false
            ])
            
            -> add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'sélectionner image'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])   
            ->add('submit', SubmitType::class, [
                'label' =>'Enregistrer'
            ]) 
            ->add('datecreation', DateType::class, [
                'widget' => 'single_text',
                'data' => isset($options['data']) &&
                $options['data']->getDateCreation() != null ? $options['data']->getDateCreation()  : new \DateTime('now'),
                'label' => 'Date'
            ])  
            ->add('note', IntegerType::class, [
                'attr' =>[
                    'min' => 0,
                    'max' => 20
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
