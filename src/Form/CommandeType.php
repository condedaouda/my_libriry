<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\Length;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Your first and last name',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter your first and last name"
                ]
            ])
            ->add('numero', NumberType::class, [
                'label' => 'Your number',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter your phone number"
                ]
            ])
            ->add('ecole', TextType::class, [
                'label' => 'The name of your school',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter the name of your school"
                ]
            ])

            ->add('adress', TextType::class, [
                'label' => 'Your address',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter your address"
                ]
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'quantity',
                'constraints' => new Length([
                    'min' =>1,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Please enter the quantity of the document"
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save the order',
                'attr' => [
                    'class' => 'btn btn-block btn-info'
                ]
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
