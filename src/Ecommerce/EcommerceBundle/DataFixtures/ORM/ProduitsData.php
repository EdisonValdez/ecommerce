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
        $produits->setDescription('Fruit du pommier, charnu, de forme plus ou moins arrondie, de couleur verte, jaune ou rouge selon la variété, que l\'on consomme frais, en compote, en beignets et dont on fait le cidre ou des jus.');
        $produits->setDisponible('1');
        $produits->setImage($this->getReference('media1'));
        $produits->setNom('pommes');
        $produits->setPrix('0.95');
        $produits->setTva($this->getReference('tva1'));
        $manager->persist($produits);
        
        $produits1 = new Produits();
        $produits1->setCategorie($this->getReference('categorie2'));
        $produits1->setDescription('Arbre tropical à tronc droit, noir, écorce rugueuse, grand verre et épais, pérenne, dur, et en forme de lance des feuilles vert foncé, les petites et parfumées, jaunes ou rouges de fleurs et de fruits comestibles; peut dépasser 30 m de hauteur.');
        $produits1->setDisponible('1');
        $produits1->setImage($this->getReference('media2'));
        $produits1->setNom('Mango');
        $produits1->setPrix('0.45');
        $produits1->setTva($this->getReference('tva1'));
        $manager->persist($produits1);
        
        $produits2 = new Produits();
        $produits2->setCategorie($this->getReference('categorie4'));
        $produits2->setDescription('La fraise est le fruit des fraisiers (Fragaria), herbacées de la famille des Rosaceae. Ce fruit est botaniquement parlant un faux-fruit puisqu\'il s\'agit en réalité d\'un  réceptacle charnu sur lequel sont disposés régulièrement des akènes dans des alvéoles plus ou moins profondes, la fraise étant donc un polyakène.');
        $produits2->setDisponible('1');
        $produits2->setImage($this->getReference('media'));
        $produits2->setNom('Fraise');
        $produits2->setPrix('1.95');
        $produits2->setTva($this->getReference('tva1'));
        $manager->persist($produits2);
        
        $produits3 = new Produits();
        $produits3->setCategorie($this->getReference('categorie3'));
        $produits3->setDescription('Fruit d\'orange, comestibles, rond, peau et la pulpe brute épaisse divisé en segments, aigre-doux et très juteuses.');
        $produits3->setDisponible('1');
        $produits3->setImage($this->getReference('media3'));
        $produits3->setNom('Orange');
        $produits3->setPrix('0.95');
        $produits3->setTva($this->getReference('tva1'));
        $manager->persist($produits3);
        
        $produits4 = new Produits();
        $produits4->setCategorie($this->getReference('categorie1'));
        $produits4->setDescription('Fruit de l\'arbre de citron, comestibles, de forme ovale, de couleur jaune ou vert peau et la pulpe divisée en segments, de l\'acide et de la saveur très aromatique.');
        $produits4->setDisponible('1');
        $produits4->setImage($this->getReference('media4'));
        $produits4->setNom('Citron');
        $produits4->setPrix('0.95');
        $produits4->setTva($this->getReference('tva1'));
        $manager->persist($produits4);
        
        $produits5 = new Produits();
        $produits5->setCategorie($this->getReference('categorie'));
        $produits5->setDescription('Fruits de Banana, comestible, allongé et légèrement incurvé, pâte blanchâtre et lisse la peau jaune qui se détache facilement.');
        $produits5->setDisponible('1');
        $produits5->setImage($this->getReference('media5'));
        $produits5->setNom('Banane');
        $produits5->setPrix('0.35');
        $produits5->setTva($this->getReference('tva1'));
        $manager->persist($produits5);
        
        $produits6 = new Produits();
        $produits6->setCategorie($this->getReference('categorie3'));
        $produits6->setDescription('La cerise, petit, rond, chair rouge, juteuse et sucrée sombre et os à l\'intérieur.');
        $produits6->setDisponible('1');
        $produits6->setImage($this->getReference('media6'));
        $produits6->setNom('Cerise');
        $produits6->setPrix('0.15');
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
        $produits8->setDescription('Fruit de cette plante, comestible, creux, allongé, vert, rouge ou jaune, à l\'intérieur duquel est un graines plates de couleur blanche ou jaune.');
        $produits8->setDisponible('1');
        $produits8->setImage($this->getReference('media8'));
        $produits8->setNom('Poivron');
        $produits8->setPrix('2.95');
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