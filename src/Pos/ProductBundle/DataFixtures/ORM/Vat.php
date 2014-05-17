<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Vat;

class Vats extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $vatRates = array(0,7,10,20);

        foreach($vatRates as $key => $vatRate){

            $vat = new Vat();
            $vat->setRate($vatRate) ;
            $this->addReference('vat'.$key, $vat);

            $manager->persist($vat);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}