<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Product;

class Products implements FixtureInterface, ContainerAwareInterface
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
            //$product->setSupplier($productExplodeInfos[7]);



            $manager->persist($product);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}