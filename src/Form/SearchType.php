<?php

namespace App\Form;
use App\Classes\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceList;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
Use App\Entity\Category;
Use App\Entity\Classe;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder 
            ->add('string', TextType::class, [
                'label' => 'Rechercher',
                'required' => false,
                'attr' => [
                    'placeholder' => 'search...',
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('classes', EntityType::class, [
                'class' => Classe::class,
                // 'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'Classe',
                'choice_label' => 'name'
            ])
                
            ->add('submit', SubmitType::class, [
                'label' => 'Filtrer',
                'attr' => [
                    'class' => 'btn-block btn-info btn-sm',
                ]
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'GET',
            'crsf_preotection' => false,
        ]);
    }

    public function getBlockPrefix(){
        return '';
    }
}