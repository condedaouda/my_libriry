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
                'label' => 'Votre nom et prénom',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Merci de saisir votre nom et prénom"
                ]
            ])
            ->add('numero', NumberType::class, [
                'label' => 'Votre numéro',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Merci de saisir votre numéro de téléphone"
                ]
            ])
            ->add('ecole', TextType::class, [
                'label' => 'Le nom de votre école',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Merci de saisir le nom de votre école"
                ]
            ])

            ->add('adress', TextType::class, [
                'label' => 'Votre address',
                'constraints' => new Length([
                    'min' =>2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Merci de saisir votre adress"
                ]
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Quantité',
                'constraints' => new Length([
                    'min' =>1,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => "Merci de saisir la quantité du document"
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer la commande',
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
