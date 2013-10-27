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
            ->add('mail', 'email', array('max_length' => 120))
            ->remove('salt')
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'options' => array('required' => true),
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Mot de passe (validation)')))
            ->add('phoneNumber')
            ->add('roles','choice', array('choices' => array(
                        'ROLE_USER'         => 'ROLE_USER',
                        'ROLE_ADMIN'        => 'ROLE_ADMIN',
                        'ROLE_SUPERADMIN'   => 'ROLE_SUPERADMIN',
                    ),
                'required'  => true,
                'multiple' => false))
            ->add('isActive', 'checkbox', array (
            		'label'=>'Utilisateur actif',
            		'required' => false))
            ->add('Enregistrer' , 'submit', array(
    			'attr' => array('class' => 'btn btn-primary')))
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
