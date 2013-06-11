<?php

namespace Pos\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Pos\UserBundle\Entity\User;

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
        $em      = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PosUserBundle:User')->find($id);

        if ( !$user ) {
            throw $this->createNotFoundException(
                'Aucun utilisateur trouvé pour cet id : ' . $id
            );
        }

        $user->setIsActive($active);
        $em->flush();
        return new Response('id : ' . $id . ', active : ' . $active . ' ');
    }

    public function editAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('PosUserBundle:User');

        $user = $repository->findOneById($id);
        
        return $this->render('PosUserBundle:Manage:edit.html.twig',
                             array( 'user' => $user ));
    }
    
}
