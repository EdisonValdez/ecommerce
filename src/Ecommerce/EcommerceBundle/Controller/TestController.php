<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Form\testType;

class TestController extends Controller
   {
    public function  testFormulaireAction(){
        $form = $this->createForm(new testType());
        
        if($this->get('request')->getMethod('POST')){
           
            $form->bind($this->get('request'));
            var_dump($form->getData());
            
            die('ici je traite mon formulaires');
            
        }
        return $this->render('EcommerceBundle:Default:test.html.twig', array('form' => $form->createView()));
      
    }
    
    /*  public function ajoutAction()
    {
        $em = $this->getDoctrine()->getManager();

        /*$produits = new Produits();
        $produits->setCategorie('Legume');
        $produits->setDescription('Le arico ce mange');
        $produits->setDisponible('1');
        $produits->setImage('http://www.motherearthnews.com/~/media/Images/MEN/Editorial/Articles/Magazine%20Articles/2011/08-01/Peeling%20Tomatoes/tomatoes1.jpg');
        $produits->setNom('Tomato');
        $produits->setPrix('0.99');
        $produits->setTva('19.6');
        
        $em->persist($produits);
        
        $produits2 = new Produits();
        $produits2->setCategorie('Legume');
        $produits2->setDescription('Le Arigo ce mange');
        $produits2->setDisponible('1');
        $produits2->setImage('http://www.motherearthnews.com/~/media/Images/MEN/Editorial/Articles/Magazine%20Articles/2011/08-01/Peeling%20Tomatoes/tomatoes1.jpg');
        $produits2->setNom('Arigo');
        $produits2->setPrix('0.97');
        $produits2->setTva('19.6');
        
        $em->persist($produits2);
        $em->flush();
        
       $produits = $em->getRepository('EcommerceBundle:Produits')
                        ->findAll();
         
        return $this->render('EcommerceBundle:Default:test.html.twig', 
                                array('produits' => $produits));
    }*/

    }
