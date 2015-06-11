<?php

namespace Utilizateur\UtilizateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UtilizateursController extends Controller
{
    public function facturesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository('EcommerceBundle:Commandes')->byFacture($this->getUser());
        
        return $this->render('UtilizateurBundle:Default:layout/factures.html.twig', array('factures' => $factures));
    }
    
    public function facturePDFAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $facture = $em->getRepository('EcommerceBundle:Commandes')->findOneBy(
                array('utilizateur' => $this->getUser(), 'valider' => 1, 'id' => $id ));
        
        if(!$facture){
            $this->get('session')->getFlashBag()->add('error', 'Une error est surveneur');
        return $this->redirect($this->generateUrl('factures'));
        }
        $html = $this->renderView('UtilizateurBundle:Default:layout/facturePDF.html.twig', array('facture' => $facture));
        
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','en');
        
        $html2pdf->pdf->SetTitle('Ecommerce Project');
        $html2pdf->pdf->SetAuthor('Facture de '. $this->getUser());
        $html2pdf->pdf->SetSubject('Facture Ecommerce');
        $html2pdf->pdf->SetKeywords('facture, ecommerce');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('Facture.pdf');
        
       $response = new Response();
        $response->headers->set('Content-type', 'application/pdf');
        
        return $response;
        
    }
}
