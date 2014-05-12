<?php

namespace Pos\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('utilization')
            ->add('typesetting')
            ->add('barcode')
            ->add('generate','button', array(
                'attr' => array('class' => 'btn btn-dark')))
            ->add('purchasePrice')
            ->add('salePrice')
            ->add('quantity')
            ->add('stockToSupply')
            ->add('restockingSupplier')
            ->add('bookedQuantity')
            ->add('vatRate')
            ->add('supplier')
            ->add('Enregistrer' , 'submit', array(
                'attr' => array('class' => 'btn btn-primary')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pos\ProductBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pos_productbundle_product';
    }
}
