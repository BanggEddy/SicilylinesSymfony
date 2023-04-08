<?php

namespace App\Form;

use App\Entity\Liaison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Secteur;
use App\Entity\Port;

class LiaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('duree')
            ->add('secteur', EntityType::class, [
                'class'=> Secteur::class,
                'choice_label' => 'libelle',
            ])
            ->add('portarrive', EntityType::class, [
                'class'=> Port::class,
                'choice_label' => 'nom',
            ])
            ->add('portdepart', EntityType::class, [
                'class'=> Port::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Liaison::class,
        ]);
    }
}
