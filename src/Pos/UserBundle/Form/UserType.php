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
            ->add('roles','collection', 
                array('type'   => 'choice',
                    'options'  => array(
                    'choices'  => array(
                        'ROLE_USER'         => 'ROLE_USER',
                        'ROLE_ADMIN'        => 'ROLE_ADMIN',
                        'ROLE_SUPERADMIN'   => 'ROLE_SUPERADMIN',
                    ),
                ),
            ))
            ->add('isActive', 'checkbox', array ('required' => false))
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
