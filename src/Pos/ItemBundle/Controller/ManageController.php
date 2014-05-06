<?php

namespace Pos\ItemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PosItemBundle:Default:index.html.twig', array('name' => $name));
    }
}
