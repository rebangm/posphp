<?php


namespace Pos\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Pos\ProductBundle\Entity\Orderform;

class OrderForms extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $file = file_get_contents(dirname(__FILE__)."/orderForm.txt");

        $orderForms = explode("\n", $file);
        array_shift($orderForms);

        foreach($orderForms as $OrderFormInfos){

            $orderFormExplodeInfos = explode(":",$OrderFormInfos);
            $orderForm = new orderForm();
            $orderForm->setName($orderFormExplodeInfos[0]);










            $manager->persist($orderForm);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }

}