<?php

namespace Pos\PaginatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PosPaginatorBundle:Default:index.html.twig', array('name' => $name));
    }
}
