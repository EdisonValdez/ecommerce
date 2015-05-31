<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ProduitsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produits = new Produits();
        $produits->setCategorie($this->getReference('categorie1')); 
        $produits->setDescription('Le poivron rouge est un groupe de cultive');
        $produits->setDisponible('1');
        $produits->setImage($this->getReference('media1'));
        $produits->setNom('Le nom');
        $produits->setPrix('0.95');
        $produits->setTva($this->getReference('tva1'));
        $manager->persist($produits);
        
        $produits1 = new Produits();
        $produits1->setCategorie($this->getReference('categorie2'));
        $produits1->setDescription('Apple');
        $produits1->setDisponible('1');
        $produits1->setImage($this->getReference('media2'));
        $produits1->setNom('Le nom');
        $produits1->setPrix('0.95');
        $produits1->setTva($this->getReference('tva1'));
        $manager->persist($produits1);
        
        $produits2 = new Produits();
        $produits2->setCategorie($this->getReference('categorie4'));
        $produits2->setDescription('Mango');
        $produits2->setDisponible('1');
        $produits2->setImage($this->getReference('media'));
        $produits2->setNom('Le nom');
        $produits2->setPrix('0.95');
        $produits2->setTva($this->getReference('tva1'));
        $manager->persist($produits2);
        
        $produits3 = new Produits();
        $produits3->setCategorie($this->getReference('categorie3'));
        $produits3->setDescription('Orange');
        $produits3->setDisponible('1');
        $produits3->setImage($this->getReference('media3'));
        $produits3->setNom('Le nom');
        $produits3->setPrix('0.95');
        $produits3->setTva($this->getReference('tva1'));
        $manager->persist($produits3);
        
        $produits4 = new Produits();
        $produits4->setCategorie($this->getReference('categorie1'));
        $produits4->setDescription('Lemon');
        $produits4->setDisponible('1');
        $produits4->setImage($this->getReference('media4'));
        $produits4->setNom('Le nom');
        $produits4->setPrix('0.95');
        $produits4->setTva($this->getReference('tva1'));
        $manager->persist($produits4);
        
        $produits5 = new Produits();
        $produits5->setCategorie($this->getReference('categorie'));
        $produits5->setDescription('Bananas');
        $produits5->setDisponible('1');
        $produits5->setImage($this->getReference('media5'));
        $produits5->setNom('Le nom');
        $produits5->setPrix('0.95');
        $produits5->setTva($this->getReference('tva1'));
        $manager->persist($produits5);
        
        $produits6 = new Produits();
        $produits6->setCategorie($this->getReference('categorie3'));
        $produits6->setDescription('Cherry');
        $produits6->setDisponible('1');
        $produits6->setImage($this->getReference('media6'));
        $produits6->setNom('Le nom');
        $produits6->setPrix('0.95');
        $produits6->setTva($this->getReference('tva1'));
        $manager->persist($produits6);
        
        $produits7 = new Produits();
        $produits7->setCategorie($this->getReference('categorie2'));
        $produits7->setDescription('Pomelo');
        $produits7->setDisponible('1');
        $produits7->setImage($this->getReference('media7'));
        $produits7->setNom('Le nom');
        $produits7->setPrix('0.95');
        $produits7->setTva($this->getReference('tva1'));
        $manager->persist($produits7);
        
        $produits8 = new Produits();
        $produits8->setCategorie($this->getReference('categorie1'));
        $produits8->setDescription('something goes here');
        $produits8->setDisponible('1');
        $produits8->setImage($this->getReference('media8'));
        $produits8->setNom('Le nom');
        $produits8->setPrix('0.95');
        $produits8->setTva($this->getReference('tva1'));
        $manager->persist($produits8);
        
        $manager->flush();
        
        $this->addReference('produits', $produits);
        $this->addReference('produits1', $produits1);
        $this->addReference('produits2', $produits2);
        $this->addReference('produits3', $produits3);
        $this->addReference('produits4', $produits4);
        $this->addReference('produits5', $produits5);
        $this->addReference('produits6', $produits6);
        $this->addReference('produits7', $produits7);
        $this->addReference('produits8', $produits8);
        
    }
    
    public function getOrder()
    {
        return 4;
    }
     
}