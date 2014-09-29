<?php

namespace Pos\HomeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Dashboard', array('route' => 'pos_home_homepage'));
        $menu->addChild('Point of sales', array('route' => 'pos_point_of_sales_homepage'));
        $menu->addChild('Warehouse', array('route' => 'pos_product_manage'))->addChild('Product', array('route' => 'pos_product_manage'));


        return $menu;
    }
}