<?php

namespace Pos\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pos\UserBundle\Entity\User;
use Pos\UserBundle\Form\UserType;
use Pos\UserBundle\Form\UserEditType;

/**
 * Class ManageController
 * @package Pos\UserBundle\Controller
 */
class ManageController extends Controller
{
    private $limitOptions = array(1,5,10,50);

    private $authorizedColumns = array('id','firstName','lastName','userName');
    /**
     * @param $page
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function indexAction($page)
    {
        if ( $page < 1 ) {
            $error = "the page requested doesn't exist";
            $this->get('session')->getFlashBag()->add('error', $error);
            return $this->redirect($this->generateUrl('pos_user_manage', array( 'page' => 1 )));
        }

        $limit  = (int)$this->container->get('request')->get('limit',5);
        if(!in_array($limit,$this->limitOptions))
            $limit = 5;


        $order  = $this->container->get('request')->get('order', 'id');
        if(!in_array($order,$this->authorizedColumns))
            $order = 'id';

        $em = $this->getDoctrine()->getManager();
        $dql   = "SELECT a FROM PosUserBundle:User a ORDER BY a." . $order . " ASC";

        $query = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $page,
            $limit
        );
        //$pagination->setTemplate('KnpPaginatorBundle:Pagination:twitter_bootstrap_pagination.html.twig');
        $pagination->setTemplate('PosPaginatorBundle::slidingPagination.html.twig');
        $pagination->setUsedRoute('pos_user_manage_list');


        return $this->render('PosUserBundle:Manage:manage.html.twig',
                             array( 'limitOptions' => $this->limitOptions,
                                    'pagination' => $pagination
            ));
    }

    /**
     * @param $id
     * @param $active
     * @return JsonResponse
     *
     */
    public function setActiveAction($id, $active)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADMIN') ) {
            if ( $this->container->get('request')->isXmlHttpRequest() ) {
                $em   = $this->getDoctrine()->getManager();
                $user = $em->getRepository('PosUserBundle:User')->find($id);

                if ( !$user ) {
                    $status  = 'error';
                    $message = 'Aucun utilisateur trouvé pour cet id : ' . $id;
                } else {
                    $user->setIsActive($active);
                    $em->flush();
                    $status  = 'success';
                    $message = array(
                        'id'     => $id,
                        'active' => $active,
                        'url'    => $this->generateUrl('pos_user_manage_ajax_active',
                                                       array( 'id'     => $id, 'active' => ( int ) !$active )) );
                }
            } else {
                $status  = 'error';
                $message = 'Not an ajax request.';
            }
        } else {
            $status  = 'error';
            $message = 'Unauthorized action for your role.';
        }
        return new JsonResponse(array( 'status'  => $status, 'message' => $message ));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADMIN') ) {
            $request = $this->get('request');
            $session = $request->getSession();

            $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('PosUserBundle:User');

            $user = $repository->findOneById($id);
            $form = $this->createForm(new UserEditType, $user);
            if ( $request->getMethod() == 'POST' ) {
                $form->handleRequest($request);
                if ( $form->isValid() ) {
                    $role = $form->get('roles')->getData();
                    $user->setRoles($role);
                    $em   = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                    $session->getFlashBag()->add('success',
                                                 'Modification effectuée!');
                    return $this->redirect($this->generateUrl('pos_user_manage'));
                } else {
                    $session->getFlashBag()->add('error',
                                                 'Données du formulaire invalide.');
                }
            }

            return $this->render('PosUserBundle:Manage:edit.html.twig',
                                 array( 'form' => $form->createView(), 'id'   => $id ));
        }
    }

    /**
     * 
     * @return type
     */
    public function addAction()
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADMIN') ) {
            $request = $this->get('request');
            $session = $request->getSession();

            $user = new User();

            $form = $this->createForm(new UserType, $user);
            if ( $request->getMethod() == 'POST' ) {
                $form->handleRequest($request);
                if ( $form->isValid() ) {

                    $role = $form->get('roles')->getData();
                    $user->setRoles($role);
                    $em   = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                    $session->getFlashBag()->add('success', 'Utilisateur créé!');
                    return $this->redirect($this->generateUrl('pos_user_manage'));
                } else {
                    //$form->
                    $session->getFlashBag()->add('error',
                                                 'Données du formulaire invalide. ');
                }
            }

            return $this->render('PosUserBundle:Manage:add.html.twig',
                                 array( 'form' => $form->createView() ));
        }
    }

}

