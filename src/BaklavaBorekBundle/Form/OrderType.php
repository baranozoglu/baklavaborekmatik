<?php

namespace BaklavaBorekBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add("userId", 'entity', array(
              "class" => 'BaklavaBorekBundle:User',
              "label" => false
          ))
          ->add("item", 'collection', array(
              "entry_type" => ItemType::class,
              "allow_add" => true,
              "allow_delete" => true,
              "by_reference" => false,
          ))
          ->add('willPurchaseDate', 'date', array(
              'widget' => 'single_text',
              'html5' => false,
              "required" => false,
              "label" => false
          ))
          ->add('purchaseDate', 'date', array(
              'widget' => 'single_text',
              'html5' => false,
              "label" => false
          ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
          'data_class' => 'BaklavaBorekBundle\Entity\Order'
        ));
    }

}