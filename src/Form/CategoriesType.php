<?php

namespace App\Form;

use App\Entity\Categories;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('logo',FileType::class,[
                'label'=> 'Documents',
                'multiple' => true,
                'mapped'=> false,
                'required'=> false,
        
            
            ])
            ->add('image',FileType::class,[
                'label'=> 'Documents',
                'multiple' => true,
                'mapped'=> false,
                'required'=> false,
        
            
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categories::class,
        ]);
    }
}
