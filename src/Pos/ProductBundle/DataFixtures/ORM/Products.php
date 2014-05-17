<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Product;

class Products extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $file = file_get_contents(dirname(__FILE__)."/products.txt");

        $products = explode("\n", $file);
        array_shift($products);

        foreach($products as $productInfos){

            $productExplodeInfos = explode(":",$productInfos);
            $product = new Product();
            $product->setName($productExplodeInfos[0]);
            $product->setBarcode($productExplodeInfos[1]);
            $product->setDescription($productExplodeInfos[2]);
            $product->setPurchasePrice($productExplodeInfos[3]);
            $product->setSalePrice($productExplodeInfos[4]);
            $product->setStockToSupply($productExplodeInfos[5]);
            $product->setQuantity($productExplodeInfos[6]);
            $product->setSupplier($manager->merge($this->getReference('supplier'.rand(0, 4))));
            $product->setVat($manager->merge($this->getReference('vat'.rand(0, 3))));



            $manager->persist($product);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }

}