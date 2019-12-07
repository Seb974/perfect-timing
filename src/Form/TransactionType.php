<?php

namespace App\Form;

use App\Entity\HostPlace;
use App\Entity\Transaction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'required' => true,
            ])
            ->add('motivation', TextType::class, [
                'required' => true,
            ])
            // ->add('dateSelected')
            ->add('state', ChoiceType::class, [
                'choices'  => [
                    'En attente' => "En attente",
                    'Validée' => "Validée",
                    'Refusée' => "Refusée",
                ],
                'mapped' => false,
            ])
            ->add('relation', EntityType::class, [
                'class' => HostPlace::class,
                'mapped' => true,
                'choice_label' => function ($hostPlace) {
                    return $hostPlace->getOwner()->getUsername();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
