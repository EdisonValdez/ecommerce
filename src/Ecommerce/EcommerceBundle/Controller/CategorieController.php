<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function categorieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('EcommerceBundle:Categories')->findAll();
        
        return $this->render('EcommerceBundle:Default:categorie/modulesUsed/categorie.html.twig', array('categorie'=> $categorie));
    }
    
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('EcommerceBundle:Categories')->findAll();
        
        return $this->render('EcommerceBundle:Default:categorie/modulesUsed/menu.html.twig', array('categorie'=> $categorie));
    }
    
    
   
}
