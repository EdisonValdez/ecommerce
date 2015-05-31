<?php

namespace Utilizateur\UtilizateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UtilizateurBundle:Default:index.html.twig', array('name' => $name));
    }
}
