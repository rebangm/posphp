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
        $nom = 'Items';

        $i=1;
        for($i ; $i <= 16 ; $i++ )
        {
            // On crée l'utilisateur
            $customers[$i] = new Customer;
                       
            $customers[$i]->setFirstName($nom . 'Prenom' . $i);
            $customers[$i]->setLastName($nom . 'Nom' . $i);
            $customers[$i]->setMail('Client' . $i.'@customer.com');
            $manager->persist($customers[$i]);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}