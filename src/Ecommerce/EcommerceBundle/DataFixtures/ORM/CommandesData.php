<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Commandes;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;



class CommandesData extends AbstractFixture implements OrderedFixtureInterface
{
   
    public function load(ObjectManager $manager)
    {
        $commandes = new Commandes();
        $commandes->setDate(new \DateTime());
        $commandes->setProduits(array('0' => array('1'=>'2'),
                                      '1' => array('2'=>'1'),
                                      '2' => array('4'=>'5')));
        $commandes->setReference('1');
        $commandes->setUtilizateur($this->getReference('utilizateur1'));
        $commandes->setValider('1');
        $manager->persist($commandes);
        
        $commandes1 = new Commandes();
        $commandes1->setDate(new \DateTime());
        $commandes1->setProduits(array('0' => array('1'=>'2'),
                                      '1' => array('2'=>'1'),
                                      '2' => array('4'=>'5')));
        $commandes1->setReference('2');
        $commandes1->setUtilizateur($this->getReference('utilizateur1'));
        $commandes1->setValider('1');
        $manager->persist($commandes1);
   
     
        $manager->flush();
    }
    
    public function getOrder() {
        return 7;
    }
}