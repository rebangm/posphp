<?php

namespace Pos\CustomerBundle\Controller;

use Pos\CustomerBundle\Form\CustomerType;
use Pos\CustomerBundle\Form\ChildType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pos\CustomerBundle\Entity\Customer;
use Pos\CustomerBundle\Entity\Child;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Class ManageController
 * @package Pos\CustomerBundle\Controller
 */
class ManageController extends Controller
{
    /**
     * @param $page
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
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

    /**
     * @param Customer $customer
     * @ParamConverter("customer", options={"mapping": {"customer_id": "id"}})
     */
    public function editAction(Customer $customer){


        $request = $this->get('request');
        $session = $request->getSession();
        $listChild = array();
        foreach ($customer->getChild() as $child) {
            $listChild[] = $child;
        }
        if (!$customer) {
            throw $this->createNotFoundException('Aucun client trouvé pour : '.$customer);
        }

        $form = $this->createForm(new CustomerType(), $customer);
        if ( $request->getMethod() == 'POST' ) {
            $form->handleRequest($request);
            if ( $form->isValid() ) {

                $customer->getChild()->clear();

                $em   = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();

                foreach ($form->get('child')->getData() as $child) {
                    $child->setCustomer($customer);
                    $em->persist($child);
                }
                foreach ($listChild as $originalChild) {
                    foreach ($form->get('child')->getData() as $child) {
                        // Si $originalChild existe dans le formulaire, on sort de la boucle car pas besoin de la supprimer
                        if ($originalChild == $child) {
                            continue 2;
                        }
                    }
                    // $originalChild n'existe plus dans le formulaire, on la supprime
                    $em->remove($originalChild);
                }

                $em->flush();
                $session->getFlashBag()->add('success',
                    'Modification effectuée!');
                return $this->redirect($this->generateUrl('pos_customer_manage_list'));
            } else {
                $session->getFlashBag()->add('error',
                    'Données du formulaire invalide.');
            }
        }

        return $this->render('PosCustomerBundle:Manage:edit.html.twig',
            array( 'form' => $form->createView(), 'id'   => $customer->getId() ));
    }

    /**
     * @param Customer $customer
     * @ParamConverter("customer", options={"mapping": {"customer_id": "id"}})
     */
    public function addChildAction(Customer $customer){


        $request = $this->get('request');
        $session = $request->getSession();

        $child = new Child();
        $form = $this->createForm(new ChildType(), $child);
        if ( $request->getMethod() == 'POST' ) {
            $form->handleRequest($request);
            if ( $form->isValid() ) {



                $em   = $this->getDoctrine()->getManager();
                $em->persist($child);
                $em->flush();

                $session->getFlashBag()->add('success',
                    'Modification effectuée!');
                return $this->redirect($this->generateUrl('pos_customer_manage_list'));
            } else {
                $session->getFlashBag()->add('error',
                    'Données du formulaire invalide.');
            }
        }

        return $this->render('PosCustomerBundle:Manage:addChild.html.twig',
            array( 'form' => $form->createView(), 'id'   => $customer->getId() ));


        $session->getFlashBag()->add('success',
            'Pass throw addChild action');

        return $this->redirect($this->generateUrl('pos_customer_manage_list'));

    }


    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function addAction(){

        $customer = new Customer();
        $request = $this->get('request');
        $session = $request->getSession();

        $form = $this->createForm(new CustomerType(), $customer);
        if ( $request->getMethod() == 'POST' ) {
            $form->handleRequest($request);
            if ( $form->isValid() ) {

                $customer->getChild()->clear();

                $em   = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();

                foreach ($form->get('child')->getData() as $child) {
                    $child->setCustomer($customer);
                    $em->persist($child);
                }

                $em->flush();
                $session->getFlashBag()->add('success',
                    'Ajout effectuée!');
                return $this->redirect($this->generateUrl('pos_customer_manage_list'));
            } else {
                $session->getFlashBag()->add('error',
                    'Données du formulaire invalide.');
            }
        }

        return $this->render('PosCustomerBundle:Manage:add.html.twig',
            array( 'form' => $form->createView(), 'id'   => $customer->getId() ));
    }

}
