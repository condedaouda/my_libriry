<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Your first name',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter Your first name"
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Your last name',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter Your first name"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Your email',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter your email address"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'label' => 'Your password',
                'invalid_message' => "Password and confirmation must be the same",
                'first_options' => ['label' => 'Password','attr' =>[
                    'placeholder' => 'Please enter your password',
                ],],
                
                'second_options' => ['label' => 'Confirm your password','attr' =>[
                    'placeholder' => 'Please confirm your password',
                ],]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Register"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
