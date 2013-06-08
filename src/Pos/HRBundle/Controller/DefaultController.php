<?php

namespace Pos\HRBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PosHRBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function adduserAction($name)
    {
        return $this->render('PosHRBundle:Default:add.html.twig', array('name' => $name));
    }
}
