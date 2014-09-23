<?php

namespace Pos\SaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OutletStoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('PosSaleBundle:OutletStore:index.html.twig');
    }
}
