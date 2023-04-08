<?php

namespace App\Form;

use App\Entity\ReservationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Type;
use App\Entity\Reservation;

class ReservationTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('type', EntityType::class, [
                'class'=> Type::class,
                'choice_label' => 'libelle',
            ])
            ->add('reservation', EntityType::class, [
                'class'=> Reservation::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReservationType::class,
        ]);
    }
}
