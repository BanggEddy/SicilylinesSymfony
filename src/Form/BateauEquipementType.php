<?php

namespace App\Form;

use App\Entity\BateauEquipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Bateau;
use App\Entity\Equipement;

class BateauEquipementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantite')
            ->add('equipement', EntityType::class, [
                'class'=> Equipement::class,
                'choice_label' => 'nom',
            ])
            ->add('bateau', EntityType::class, [
                'class'=> Bateau::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BateauEquipement::class,
        ]);
    }
}
