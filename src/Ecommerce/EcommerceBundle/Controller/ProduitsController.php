<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Form\RechercheType;
use Ecommerce\EcommerceBundle\Entity\Categories;

class ProduitsController extends Controller
{
    /*public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        
        $categorie = $em->getRepository('EcommerceBundle:Categories')->find($categorie);
        if(!$categorie): return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig'); endif;
     
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produit' => $produit));
    }
    */
    public function produitsAction(Categories $categorie = null)
    {   $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        
        if($categorie != null)
           $findProduit = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        else
            $findProduit = $em->getRepository('EcommerceBundle:Produits')->findBy(array('disponible' => 1));
       
        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        $produit  = $this->get('knp_paginator')->paginate($findProduit,$this->get('request')->query->get('page', 1)/*page number*/,
            3/*limit per page*/
        );
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produit'=> $produit,
                                                                                                 'panier' => $panier));
    }
    
    public function presentationAction($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);
        
        if(!$produit): return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig'); endif;
     
        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        
        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig', array('produit'=> $produit,
                                                                                                     'panier' => $panier));
    }
    
    
    public function rechercheAction()
    {
        $form = $this->createForm(new RechercheType());
         return $this->render('EcommerceBundle:Default:recherche/modulesUsed/recherche.html.twig',
                array('form' => $form->createView()));
    }
    
    public function rechercheTraitmentAction()
    {
        $form = $this->createForm(new RechercheType());
        if($this->get('request')->getMethod() == 'POST'):
            $form->bind($this->get('request'));
        else :
         return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig');    
           endif;
      
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->recherche($form['recherche']->getData());
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig',
                array('produit' => $produit));
    }
}
