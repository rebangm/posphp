<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\CustomerBundle\Entity\Customer;

class Customers implements FixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        // Les noms d'utilisateurs à créer
        $noms = array( 
            'Customer1' => array('Jean-Philippe','Dépigny'), 
            'esage' => array('Elodie','Sage'),
            'edepigny' => array('Elise','Dépigny'),
            'ngrevet' => array('Nicolas','Grevet'),
            'gdievart' => array('Guillaume','Diévart'),
            'mvial' => array('Michaël','Vial'),
            'jpetit' => array('Jérémy','Petit'),
            'rdagod' => array('Romain','Dagod'),
            'ctofan' => array('Cristina','Tofan'),
            'jdepigny' => array('Jean-Paul','Dépigny'),
            'mhdepigny' => array('Marie-Hélène','Dépigny')
            );

        foreach ( $noms as $i => $nom )
        {
            // On crée l'utilisateur
            $customers[$i] = new Customer;
                       
            $customers[$i]->setFirstName($nom[0]);
            $customers[$i]->setLastName($nom[1]);
            $customers[$i]->setMail($i.'@customer.com');
            $manager->persist($customers[$i]);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}