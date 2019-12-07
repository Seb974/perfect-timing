<?php

namespace App\Form;

use App\Entity\Activity;
use App\Entity\HostPlace;
use App\Form\PhotoType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class HostPlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('address', TextType::class, [
            //     'required' => true,
            // ])
            ->add('email', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control required']
            ])
            ->add('activity', EntityType::class, [
                'class' => Activity::class,
                'attr' => ['class' => 'form-control required'],
                'mapped' => true,
                'choice_label' => function ($activity) {
                    return $activity->getName();
                }
            ])
            ->add('photo', FileType::class, [
                'label' => 'Illustration',
                'attr' => ['class' => 'btn btn-secondary'],
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5242880',
                        'mimeTypes' => [
                            "image/png",
                            "image/jpeg",
                            "image/jpg",
                            "image/gif",
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HostPlace::class,
        ]);
    }
}
