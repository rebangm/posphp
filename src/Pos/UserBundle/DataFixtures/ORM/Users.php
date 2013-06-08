<?php

// src/Sdz/UserBundle/DataFixtures/ORM/Users.php

namespace Pos\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\UserBundle\Entity\User;

class Users implements FixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        // Les noms d'utilisateurs à créer
        $noms = array( 'jpdepigny', 'esage' );

        foreach ( $noms as $i => $nom )
        {
            // On crée l'utilisateur
            $users[$i] = new User;
            $encoder = $this->container->get('security.encoder_factory')->getEncoder($users[$i]);
            var_dump($encoder);
            var_dump($nom);
            var_dump($encoder->encodePassword($nom, $users[$i]->getSalt()));
            $users[$i]->setPassword($encoder->encodePassword($nom, $users[$i]->getSalt()));
            //$users[$i]->setSalt('');
            var_dump($users[$i]->getSalt());
            // Le nom d'utilisateur et le mot de passe sont identiques
            $users[$i]->setUsername($nom);
            
            $users[$i]->setFirstName($nom);
            $users[$i]->setLastName($nom);
            //$users[$i]->set($nom);
            // Le sel et les rôles sont vides pour l'instant
            $users[$i]->setRoles(array( 'ROLE_USER' ));

            // On le persiste
            $manager->persist($users[$i]);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}