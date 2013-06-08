<?php

namespace Pos\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PosHomeBundle:Default:index.html.twig');
    }
}
