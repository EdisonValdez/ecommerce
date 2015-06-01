<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Form\RechercheType;

class ProduitsController extends Controller
{
    public function produitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->findBy(array('disponible' => 1));
       
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', 
                array('produit'=> $produit));
    }
    
    public function presentationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')
                ->find($id);
        if(!$produit): return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig'); endif;
     
        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig', array('produit'=> $produit));
    }
    
    public function categorieAction($categorie)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        
        $categorie = $em->getRepository('EcommerceBundle:Categories')->find($categorie);
       
        if(!$categorie): return $this->render('PagesBundle:Default:pages/modulesUsed/404.html.twig'); endif;
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produit' => $produit));
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
