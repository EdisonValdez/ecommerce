<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Utilizateur\UtilizateurBundle\Entity\Utilizateur;

class UtilizateursData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

   
    public function load(ObjectManager $manager)
    {
        $utilizateur = new Utilizateur();
        $utilizateur->setUsername('EdisonValdez');
        $utilizateur->setEmail('eddnvg@hotmail.com');
        $utilizateur->setEnabled(1);
        $utilizateur->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilizateur)->encodePassword('Thesecret1', $utilizateur->getSalt()));
        $manager->persist($utilizateur);
        
        $utilizateur1 = new Utilizateur();
        $utilizateur1->setUsername('MarthaValdez');
        $utilizateur1->setEmail('martha@martha.com');
        $utilizateur1->setEnabled(1);
        $utilizateur1->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilizateur1)->encodePassword('MarthaValdez1', $utilizateur->getSalt()));
        $manager->persist($utilizateur1);
        
        $utilizateur2 = new Utilizateur();
        $utilizateur2->setUsername('iancasillasbuffon');
        $utilizateur2->setEmail('iancasillasbuffon@gmail.com');
        $utilizateur2->setEnabled(1);
        $utilizateur2->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilizateur2)->encodePassword('iancasillasbuffon', $utilizateur->getSalt()));
        $manager->persist($utilizateur2);
        
        $utilizateur3 = new Utilizateur();
        $utilizateur3->setUsername('ElenaTorres');
        $utilizateur3->setEmail('elentm@hotmail.com');
        $utilizateur3->setEnabled(1);
        $utilizateur3->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilizateur3)->encodePassword('ElenaTorres1', $utilizateur->getSalt()));
        $manager->persist($utilizateur3);
     
        $manager->flush();
        
        $this->addReference('utilizateur', $utilizateur);
        $this->addReference('utilizateur1', $utilizateur1);
        $this->addReference('utilizateur2', $utilizateur2);
        $this->addReference('utilizateur3', $utilizateur3);
    }
    
    public function getOrder() {
        return 5;
    }
}