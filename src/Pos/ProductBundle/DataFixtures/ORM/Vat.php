<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Vat;

class Vats implements FixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $vatRates = array(0,7,10,20);




        foreach($vatRates as $vatRate){

            $vat = new Vat();
            $vat->setRate($vatRate) ;


            $manager->persist($vat);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}