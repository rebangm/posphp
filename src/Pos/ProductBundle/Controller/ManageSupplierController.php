<?php

namespace Pos\ProductBundle\Controller;

use Pos\ProductBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pos\ProductBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ManageSupplierController extends Controller
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
        $dql   = "SELECT c FROM PosProductBundle:Product c ORDER BY c.id ASC";

        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            $limit
        );

        $pagination->setTemplate('PosPaginatorBundle::slidingPagination.html.twig');
        $pagination->setUsedRoute('pos_customer_manage_list');

        return $this->render('PosProductBundle:Manage:manage.html.twig',
            array('pagination' => $pagination ));

    }

    /**
     * @param Product $product
     * @ParamConverter("product", options={"mapping": {"product_id": "id"}})
     */
    public function editAction(Product $product){
        $request = $this->get('request');
        $session = $request->getSession();

        if (!$product) {
            throw $this->createNotFoundException('Aucun produit trouvé pour : '.$product);
        }

        $form = $this->createForm(new ProductType(), $product);
        if ( $request->getMethod() == 'POST' ) {
            $form->handleRequest($request);
            if ( $form->isValid() ) {

                $em   = $this->getDoctrine()->getManager();
                $em->persist($product);

                $em->flush();
                $session->getFlashBag()->add('success',
                    'Modification effectuée!');
                return $this->redirect($this->generateUrl('pos_product_manage_list'));
            } else {
                $session->getFlashBag()->add('error',
                    'Données du formulaire invalide.');
            }
        }

        return $this->render('PosProductBundle:Manage:edit.html.twig',
            array( 'form' => $form->createView(), 'id'   => $product->getId() ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(){

        $product = new Product();
        $request = $this->get('request');
        $session = $request->getSession();

        $form = $this->createForm(new ProductType(), $product);
        if ( $request->getMethod() == 'POST' ) {
            $form->handleRequest($request);
            if ( $form->isValid() ) {

                $em   = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();


                $em->flush();
                $session->getFlashBag()->add('success',
                    'Ajout effectuée!');
                return $this->redirect($this->generateUrl('pos_product_manage_list'));
            } else {
                $session->getFlashBag()->add('error',
                    'Données du formulaire invalide.');
            }
        }

        return $this->render('PosProductBundle:Manage:add.html.twig',
            array( 'form' => $form->createView(), 'id'   => $product->getId() ));
    }

}
