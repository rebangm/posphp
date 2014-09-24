<?php

namespace Pos\PointOfsalesBundle\Controller;

use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OutletStoreController extends Controller
{
    public function indexAction()
    {
        $saleSession = false;
        //$session = new saleSession();
        //if($session->isOpen()){



        return $this->render('PosPointOfSalesBundle:OutletStore:index.html.twig',
            array('saleSession' => $saleSession ));
    }
}
