<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Supplier;

class Suppliers implements FixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $file = file_get_contents(dirname(__FILE__)."/suppliers.txt");
        $suppliers = explode("\n", $file);
        array_shift($suppliers);

        foreach($suppliers as $supplierInfos){

            $supplier = new Supplier();
            $supplier->setCompanyName($supplierInfos[0]);
            $supplier->setCompanyNumber($supplierInfos[1]);
            $supplier->setPhoneNumber($supplierInfos[2]);
            $supplier->setAddress($supplierInfos[3]);
            $supplier->setCity($supplierInfos[4]);
            $supplier->setState($supplierInfos[5]);
            $supplier->setCountry($supplierInfos[6]);
            $supplier->setFreeShipment($supplierInfos[7]);


            $manager->persist($supplier);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}