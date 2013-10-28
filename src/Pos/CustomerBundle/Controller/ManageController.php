<?php

namespace Pos\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pos\CostumerBundle\Entity\Costumer;

class ManageController extends Controller
{
    
    public function indexAction($page)
    {
        if ( $page < 1 ) {
            $error = "the page requested doesn't exist";
            $this->get('session')->getFlashBag()->add('error', $error);
            return $this->redirect($this->generateUrl('pos_customer_manage',
                                                      array( 'page' => 1 )));
        }

        $limit  = 5;
        $offset = ($page - 1) * $limit;

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('PosCostumerBundle:Customer');

        $listCustomers = $repository->findBy(array( ), array( ), $limit, $offset);
        $totalRows  = $repository->getTotalCount();
        $pagination = array( 'nbPage'    => ceil(( int ) $totalRows / $limit),
            'prev'      => $page - 1,
            'next'      => $page + 1,
            'page'      => $page,
            'totalRows' => $totalRows );

        return $this->render('PosCostumerBundle:Manage:manage.html.twig',
                             array( 'customers'      => $listCustomers,
                'pagination' => $pagination
            ));
    }
}
