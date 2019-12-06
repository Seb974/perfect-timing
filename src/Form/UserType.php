<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
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
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The entered password are different.',
                'options'         => [ 'attr' => [ 'class' => 'password-field']],
                'mapped'          => false,
                'required'        => true,
                'first_options'   => [ 'label' => 'plainPassword' ],
                'second_options'  => [ 'label' => 'confirmPasword'],
                'constraints'     => [ 
                  new NotBlank( ['message' => 'Please enter a password'] ),
                  new Length([
                      'min'        => 6,
                      'max'        => 20,
                      'minMessage' => 'Your password should be at least {{ limit }} characters',
                      'maxMessage' => 'Your password should be at most {{ limit }} characters',
                  ])
              ]
          ])
            ->add('address', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'input-map']
            ])
            // ->add('latitude', NumberType::class, [
            //     'mapped' => false,
            //     'required' => false,
            // ])
            // ->add('longitude', NumberType::class, [
            //     'mapped' => false,
            //     'required' => false,
            // ])
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'human' => "ROLE_HUMAN",
                    'bisolarian' => "ROLE_BISOLRIAN",
                    'admin' => "ROLE_ADMIN",
                ],
                'mapped' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
