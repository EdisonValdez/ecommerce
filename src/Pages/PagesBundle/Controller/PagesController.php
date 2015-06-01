<?php

namespace Pages\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('PagesBundle:Pages')->findAll();
        
        return $this->render('PagesBundle:Default:pages/modulesUsed/menu.html.twig', array('pages' => $pages));
    }
    public function pagesAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PagesBundle:Pages')->find($id);
        
        if(!$page) : return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig'); endif;
        
        return $this->render('PagesBundle:Default:pages/layout/pages.html.twig', array('page' => $page));
    }
}
