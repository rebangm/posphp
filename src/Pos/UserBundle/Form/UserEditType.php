<?php

namespace Pos\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditType extends UserType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        parent::buildForm($builder, $options);
        $builder
            ->remove('salt')
            ->remove('password')
            ->add('roles', 'choice', array('choices' =>
                array(
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
                ),
                'required'  => true,
                'multiple' => false
            ));
        //$builder->add('password','password',array('always_empty' => true));
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
