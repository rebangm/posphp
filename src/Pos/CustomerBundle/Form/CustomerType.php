<?php

namespace Pos\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('mobileNumber')
            ->add('mail')
            ->add('address')
            ->add('city')
            ->add('zipCode')
            ->add('barCode')
            ->add('generate','button', array(
                'attr' => array('class' => 'btn btn-inverse')))
            ->add('childBirthDate','date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'required' => false,
            ))
            ->add('clear','button', array(
                'attr' => array('class' => 'btn btn-inverse')))
            ->add('enregistrer' , 'submit', array(
                'attr' => array('class' => 'btn btn-primary')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pos\CustomerBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pos_customerbundle_customer';
    }
}
