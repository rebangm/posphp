<?php

namespace Pos\ProductBundle\Controller;

use Pos\ProductBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pos\ProductBundle\Entity\Product;

class ManageController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('PosProductBundle:Manage:index.html.twig', array('page' => $page));
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
