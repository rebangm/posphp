<?php

namespace Pos\ProductBundle\Form;

use Pos\ProductBundle\Entity\SupplierRepository;
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
            ->add('description', 'textarea', array(
                'attr' => array('class' => 'form-control'),
                'required' => false))
            ->add('utilization', 'textarea', array(
                'attr' => array('class' => 'form-control'),
                'required' => false))
            ->add('typesetting', 'textarea', array(
                'attr' => array('class' => 'form-control'),
                'required' => false))
            ->add('barcode')
            ->add('purchasePrice')
            ->add('salePrice')
            ->add('quantity')
            ->add('stockToSupply')
            ->add('restockingSupplier')
            ->add('bookedQuantity')
            ->add('vat', 'entity', array(
                'attr' => array('class' => 'form-control'),
                'class' => 'PosProductBundle:Vat'))
            ->add('supplier', 'entity', array(
                'attr' => array('class' => 'form-control'),
                'class' => 'Pos\ProductBundle\Entity\Supplier',
                'property' => 'companyName',
                'query_builder' => function(SupplierRepository $er) {
                        return $er->getAllOrderByCompanyName();
                    }
            ))
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
