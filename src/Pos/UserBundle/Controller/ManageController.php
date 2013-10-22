<?php

namespace Pos\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pos\UserBundle\Entity\User;
use Pos\UserBundle\Form\UserType;
use Pos\UserBundle\Form\UserEditType;

class ManageController extends Controller
{

    public function indexAction($page)
    {
        if ( $page < 1 ) {
            $error = "the page requested doesn't exist";
            $this->get('session')->getFlashBag()->add('error', $error);
            return $this->redirect($this->generateUrl('pos_user_manage',
                                                      array( 'page' => 1 )));
        }

        $limit  = 20;
        $offset = ($page - 1) * 20;

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('PosUserBundle:User');

        $listUsers = $repository->findBy(array( ), array( ), $limit, $offset);

        return $this->render('PosUserBundle:Manage:manage.html.twig',
                             array( 'page'  => $page,
                'users' => $listUsers ));
    }

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

    public function editAction($id)
    {
        if ( $this->get('security.context')->isGranted('ROLE_ADMIN') ) {
            $request = $this->get('request');

            $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('PosUserBundle:User');

            $user = $repository->findOneById($id);
            $form = $this->createForm(new UserEditType, $user);            
            if ( $request->getMethod() == 'POST' ) {             
                $form->bind($request);
                if ( $form->isValid() ) {
                    $role = $form->get('roles')->getData();
                    //var_dump($role);
                    $user->setRoles($role);
                    //var_dump($user);
                    $em   = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                    return $this->redirect($this->generateUrl('pos_user_manage'));
                }
            }

            return $this->render('PosUserBundle:Manage:edit.html.twig',
                                 array( 'form' => $form->createView(), 'id'   => $id ));
        }
    }

}
