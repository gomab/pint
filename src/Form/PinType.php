<?php

namespace App\Form;

use App\Entity\Pin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

//        $pin = $options['data'];
//
////        dd($pin && $pin->getId());
//
//        $isEdit = $options['method'] === 'PUT';
//        $imageFileConstraints = [];
//
//        if($isEdit){
//            $imageFileConstraints[] =
//        }
//
//        if (($options)){
//
//        }

        $builder
            ->add('title')
            ->add('description')
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image (JPG or PNG File)',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Delete',
                'download_label' => 'Download',
                'download_uri' => true,
//                'image_uri' => true,
                'imagine_pattern' => 'squared_thumbnail_small',
//                'asset_helper' => true,
            ])
//            ->add('createdAt')
//            ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pin::class,
        ]);
    }
}
