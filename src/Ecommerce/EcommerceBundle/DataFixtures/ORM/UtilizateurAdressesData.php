<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Symfony\Component\DependencyInjection\ContainerInterface;
use Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;



class UtilizateurAdressesData extends AbstractFixture implements OrderedFixtureInterface
{
   
    public function load(ObjectManager $manager)
    {
        $utilizateurAdresses = new UtilizateurAdresses();
        $utilizateurAdresses->setUtilizateur($this->getReference('utilizateur'));
        $utilizateurAdresses->setNom('Edison');
        $utilizateurAdresses->setPrenom('Valdez');
        $utilizateurAdresses->setTelephone('56988889898');
        $utilizateurAdresses->setAdresse('3 Unie Van 25000');
        $utilizateurAdresses->setCp('20012');
        $utilizateurAdresses->setPays('France');
        $utilizateurAdresses->setVille('Le Havre');
        $utilizateurAdresses->setComplement('face a l\'Eglise');
        $manager->persist($utilizateurAdresses);
        
        $utilizateurAdresses1 = new UtilizateurAdresses();
        $utilizateurAdresses1->setUtilizateur($this->getReference('utilizateur1'));
        $utilizateurAdresses1->setNom('Edison');
        $utilizateurAdresses1->setPrenom('Valdez');
        $utilizateurAdresses1->setTelephone('56988889898');
        $utilizateurAdresses1->setAdresse('3 Unie Van 25000');
        $utilizateurAdresses1->setCp('20012');
        $utilizateurAdresses1->setPays('France');
        $utilizateurAdresses1->setVille('Le Havre');
        $utilizateurAdresses1->setComplement('face a l\'Eglise');
        $manager->persist($utilizateurAdresses1);
        
        $utilizateurAdresses2 = new UtilizateurAdresses();
        $utilizateurAdresses2->setUtilizateur($this->getReference('utilizateur2'));
        $utilizateurAdresses2->setNom('Edison');
        $utilizateurAdresses2->setPrenom('Valdez');
        $utilizateurAdresses2->setTelephone('56988889898');
        $utilizateurAdresses2->setAdresse('3 Unie Van 25000');
        $utilizateurAdresses2->setCp('20012');
        $utilizateurAdresses2->setPays('France');
        $utilizateurAdresses2->setVille('Le Havre');
        $utilizateurAdresses2->setComplement('face a l\'Eglise');
        $manager->persist($utilizateurAdresses2);
        
        $utilizateurAdresses3 = new UtilizateurAdresses();
        $utilizateurAdresses3->setUtilizateur($this->getReference('utilizateur3'));
        $utilizateurAdresses3->setNom('Edison');
        $utilizateurAdresses3->setPrenom('Valdez');
        $utilizateurAdresses3->setTelephone('56988889898');
        $utilizateurAdresses3->setAdresse('3 Unie Van 25000');
        $utilizateurAdresses3->setCp('20012');
        $utilizateurAdresses3->setPays('France');
        $utilizateurAdresses3->setVille('Le Havre');
        $utilizateurAdresses3->setComplement('face a l\'Eglise');
        $manager->persist($utilizateurAdresses3);
     
        $manager->flush();
    }
    
    public function getOrder() {
        return 6;
    }
}