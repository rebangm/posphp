<?php

namespace Pos\Bundle\SaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PosSaleBundle:Default:index.html.twig');
    }
}
