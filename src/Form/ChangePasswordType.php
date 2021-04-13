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

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'My email address',
            ])
            ->add('nom', TextType::class, [
                'disabled' => true,
                'label' => 'My first name',
            ])
            ->add('prenom', TextType::class, [
                'disabled' => true,
                'label' => 'My last name',
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'My current password',
                'mapped' => false,
                'attr' => [
                    'placeholder' => "Please enter your current password"
                ]
            ])

            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'label' => 'my password',
                'invalid_message' => "Password and confirmation must be the same",
                'first_options' => ['label' => 'My new password','attr' =>[
                    'placeholder' => 'Please enter your password',
                ],],
                
                'second_options' => ['label' => 'Confirm your password','attr' =>[
                    'placeholder' => 'Please confirm your password',
                ],]
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Update"
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
