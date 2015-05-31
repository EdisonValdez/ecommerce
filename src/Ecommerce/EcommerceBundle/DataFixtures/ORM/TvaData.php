<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Ecommerce\EcommerceBundle\Entity\Tva;

class TvaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tva = new Tva();
        $tva->setMultiplicate('0.982');
        $tva->setNom('TVA 1.75%');
        $tva->setValeur('1.75');
        $manager->persist($tva);
        
        $tva1 = new Tva();
        $tva1->setMultiplicate('0.833');
        $tva1->setNom('TVA 20%');
        $tva1->setValeur('20');
        $manager->persist($tva1);
                
        $manager->flush();
        
        $this->addReference('tva', $tva);
        $this->addReference('tva1', $tva1);
  
    }
    
    public function getOrder() {
        return 3;
    }
}