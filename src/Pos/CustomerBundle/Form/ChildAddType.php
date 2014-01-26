<?php

namespace Pos\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChildAddType extends ChildType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', array('required' => true) )
            ->add('birthDate','date', array(
                    'input'  => 'datetime',
                    'widget' => 'single_text',
                    'required' => true))
            ->add('Ajouter', 'submit', array(
                'attr' => array('class' => 'btn btn-primary')));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pos\CustomerBundle\Entity\Child'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pos_customerbundle_child';
    }
}
