<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Supplier;

class Suppliers extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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

        foreach($suppliers as $key => $supplierInfos){

            $supplierExplodeInfos = explode(":",$supplierInfos);
            $supplier = new Supplier();
            $supplier->setCompanyName($supplierExplodeInfos[0]);
            $supplier->setCompanyNumber($supplierExplodeInfos[1]);
            $supplier->setPhoneNumber($supplierExplodeInfos[2]);
            $supplier->setAddress($supplierExplodeInfos[3]);
            $supplier->setCity($supplierExplodeInfos[4]);
            $supplier->setState($supplierExplodeInfos[5]);
            $supplier->setZipCode($supplierExplodeInfos[6]);
            $supplier->setCountry($supplierExplodeInfos[7]);
            $supplier->setFreeShipment($supplierExplodeInfos[8]);

            $this->addReference('supplier'.$key, $supplier);

            $manager->persist($supplier);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }

}