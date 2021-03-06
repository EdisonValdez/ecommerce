<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponseResponse;
use Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses;
use Ecommerce\EcommerceBundle\Form\UtilizateurAdressesType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class PanierController extends Controller
{
    public function ajouterAction($id)
    {
        $session = $this->getRequest()->getSession();
        
        if(!$session->has('panier')) $session->set('panier', array());
        $panier = $session->get('panier');
        
        if(array_key_exists($id, $panier)){
            if($this->getRequest()->query->get('qte') != null)   $panier[$id] = $this->getRequest()->query->get('qte'); 
        } else {
            if($this->getRequest()->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
          else
              $panier[$id] = 1;
        }
        $session->set('panier', $panier);
         
        return $this->redirect($this->generateUrl('panier'));
    }
    
    public function suprimerAction($id)
    {
       $session = $this->getRequest()->getSession();
       $panier = $session->get('panier');
       
        if(array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $panier = $session->set('panier', $panier);
            
        }
         return $this->redirect($this->generateUrl('panier'));
    }

    public function panierAction()
    {
        $session = $this->getRequest()->getSession();
        if(!$session->has('panier')) $session->set('panier', array());
        
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findArray(array_keys($session->get('panier')));
         
        return $this->render('EcommerceBundle:Default:panier/layout/panier.html.twig', array('produits' => $produits,
                                                                                                'panier' => $session->get('panier')));
    }
    
    public function adresseSuppresionAction($id)
    {
        $em = $this->getDoctrine ()->getManager();
        $entity =  $em->getRepository('EcommerceBundle:UtilizateurAdresses')->find($id);
        
        if($this->container->get('security.context')->getToken()->getUser() != $entity->getUtilizateur() || !$entity)
         return $this->redirect($this->generateUrl('livraison'));
            $em->remove($entity);
            $em->flush();
            
         return $this->redirect($this->generateUrl('livraison'));
    }
    
    public function livraisonAction()
    {
        $utilizateur = $this->container->get('security.context')->getToken()->getUser();
        $entity = new UtilizateurAdresses;
        $form = $this->createForm(new UtilizateurAdressesType(), $entity);
        
        if($this->get('request')->getMethod() == 'POST')
        {
            $form->handleRequest($this->getRequest());
             
            if($form->isValid())
                $em = $this->getDoctrine ()->getManager ();
                $entity->setUtilizateur($utilizateur);
                $em->persist($entity);
                $em->flush();
                
                return $this->redirect($this->generateUrl('livraison'));
        }
        
        
        return $this->render('EcommerceBundle:Default:panier/layout/livraison.html.twig', array('utilizateur' => $utilizateur,
                                                                                                'form' => $form->createView()));
    }
    
    public function setLivraisonOnSession()
 {      
        $session = $this->getRequest()->getSession();

        if (!$session->has('adresse')) $session->set('adresse', array());
        $adresse = $session->get('adresse');

        if ($this->getRequest()->request->get('livraison') != null && $this->getRequest()->request->get('facturation') != null) {
            $adresse['livraison'] = $this->getRequest()->request->get('livraison');
            $adresse['facturation'] = $this->getRequest()->request->get('facturation');
        } else {
            return $this->redirect($this->generateUrl('validation'));
        }

        $session->set('adresse', $adresse);
        return $this->redirect($this->generateUrl('validation'));
    }

    public function validationAction()
    {
        if($this->get('request')->getMethod() == 'POST')
            $this->setLivraisonOnSession();
        
        $em = $this->getDoctrine()->getManager();
        $prepareCommande = $this->forward('EcommerceBundle:Commandes:prepareCommande');
        $commande = $em->getRepository('EcommerceBundle:Commandes')->find($prepareCommande->getContent());       
 
        
        return $this->render('EcommerceBundle:Default:panier/layout/validation.html.twig', array('commande' => $commande));
        
    }
   
}
