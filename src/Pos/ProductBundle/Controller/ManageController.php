<?php

namespace Pos\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManageController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('PosProductBundle:Manage:index.html.twig', array('page' => $page));
    }
}
