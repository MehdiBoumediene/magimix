<?php

namespace App\Form;

use App\Entity\Produits;
use App\Entity\Categories;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('categorie', EntityType::class, [
                'class' => Categories::class,
                'label' => false,
                'choice_label' => 'nom',
                'empty_data'=>'',
                'required'=>false,
         
            ])

            
            ->add('image',FileType::class,[
                'label'=> 'Documents',
                'multiple' => false,
                'mapped'=> false,
                'required'=> false,
        
            
            ])

            ->add('description',CkEditorType::class,[

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
