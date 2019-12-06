<?php

namespace App\Form;

use App\Entity\Activity;
use App\Entity\HostPlace;
use App\Form\PhotoType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HostPlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', TextType::class, [
                'required' => true,
            ])
            // ->add('owner')
            ->add('activity', EntityType::class, [
                'class' => Activity::class,
                'mapped' => true,
                'choice_label' => function ($activity) {
                    return $activity->getName();
                }
            ])
            ->add('photos', CollectionType::class, array(
                'entry_type'   => PhotoType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'mapped' => true,
              ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HostPlace::class,
        ]);
    }
}
