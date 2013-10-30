<?php

namespace Pos\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pos\CustomerBundle\Entity\Customer;

/**
 * Class ManageController
 * @package Pos\CustomerBundle\Controller
 */
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

        $em = $this->getDoctrine()->getManager();
        //$dql   = "SELECT a FROM PosUserBundle:User a ORDER BY a." . $order . " ASC";
        $dql   = "SELECT c FROM PosCustomerBundle:Customer c ORDER BY c.id ASC";

        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            $limit
        );

        $pagination->setTemplate('PosPaginatorBundle::slidingPagination.html.twig');
        $pagination->setUsedRoute('pos_customer_manage_list');

        return $this->render('PosCustomerBundle:Manage:manage.html.twig',
                             array('pagination' => $pagination ));
    }
}
