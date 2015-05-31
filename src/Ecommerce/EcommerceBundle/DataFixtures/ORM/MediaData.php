<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ecommerce\EcommerceBundle\Entity\Media;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $media = new Media();
        $media->setPath('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTjeGO-FFrwHY22yKUb0hLWnH96EJwPWEWjeHOrbjYdH3oEDbAkKg');
        $media->setAlt('fresa');
        $manager->persist($media);
        
        $media1 = new Media();
        $media1->setPath('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQH6orM1PRbAV4LHj5ACNqQKbOiwcGIT1ee8gsH15IEH6a-iY1g');
        $media1->setAlt('Apple');
        $manager->persist($media1);
        
        $media2 = new Media();
        $media2->setPath('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSie95sTN5Pbo6and9-fWIXSSjXhDTOy87TFsxfw3ddF6JnNS6');
        $media2->setAlt('Mango');
        $manager->persist($media2);
        
        $media3 = new Media();
        $media3->setPath('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSI9r9nMoTvyrLVoru5MUl2dA4wfL1D0O4NL0Gw50ZB9a7IVtmEXg');
        $media3->setAlt('Orange');
        $manager->persist($media3);
        
        $media4 = new Media();
        $media4->setPath('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMG4MkKOoVap6InYkbKV_esjZIWCzZR8jkqVOpjzf4H1jRC6M2');
        $media4->setAlt('Lemon');
        $manager->persist($media4);
        
        $media5 = new Media();
        $media5->setPath('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRjY-CdIZZOPoEyZBVlk9e6YodQGiUF-Rd5djC9alaDpeG27EfRMQ');
        $media5->setAlt('Bananas');
        $manager->persist($media5);
        
        $media6 = new Media();
        $media6->setPath('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc17YYf09-1ha_Brg-aUlbeVVhD-9p-QaV5jzKvKx7WiEibCcVSQ');
        $media6->setAlt('Cherry');
        $manager->persist($media6);
        
        $media7 = new Media();
        $media7->setPath('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcScSsJqgiojjw1NyYNZLpb4rQebbQSDt2Hf2KTLiZF_fbFvEbHAXQ');
        $media7->setAlt('Pomelo');
        $manager->persist($media7);
        
        $media8 = new Media();
        $media8->setPath('http://estaticos02.marca.com/opinion/blogs/img/1289.jpg');
        $media8->setAlt('something goes here');
        $manager->persist($media8);
        
        $manager->flush();
        
        $this->addReference('media', $media);
        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
        
    }
    
    public function getOrder()
    {
        return 1;
    }
     
}