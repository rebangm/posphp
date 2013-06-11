<?php

namespace Pos\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('username')
            ->add('salt')
            ->add('password')
            ->add('phoneNumber')
            ->add('roles')
            ->add('isActive')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pos\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'pos_userbundle_usertype';
    }
}
