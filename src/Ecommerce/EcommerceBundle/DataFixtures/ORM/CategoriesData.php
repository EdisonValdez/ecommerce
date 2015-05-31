<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Ecommerce\EcommerceBundle\Entity\Categories;

class CategoriesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categorie = new Categories();
        $categorie->setImage($this->getReference('media'));
        $categorie->setNom('Fruit Cocktel');
        $manager->persist($categorie);
        
        $categorie1 = new Categories;
        $categorie1->setImage($this->getReference('media1'));
        $categorie1->setNom('Fruits');
        $manager->persist($categorie1);
        
        $categorie2 = new Categories;
        $categorie2->setImage($this->getReference('media2'));
        $categorie2->setNom('Tropical Fruits');
        $manager->persist($categorie2);
        
        $categorie3 = new Categories;
        $categorie3->setImage($this->getReference('media3'));
        $categorie3->setNom('Mediterranean Fruit');
        $manager->persist($categorie3);
        
        $categorie4 = new Categories;
        $categorie4->setImage($this->getReference('media4'));
        $categorie4->setNom('Legume');
        $manager->persist($categorie4);
     
        
        $manager->flush();
        
        $this->addReference('categorie', $categorie);
        $this->addReference('categorie1', $categorie1);
        $this->addReference('categorie2', $categorie2);
        $this->addReference('categorie3', $categorie3);
        $this->addReference('categorie4', $categorie4);
  
    }
    
    public function getOrder() {
        return 2;
    }
}