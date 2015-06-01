<?php

namespace Pages\PagesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Pages\PagesBundle\Entity\Pages;

class PagesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pages = new Pages();
        $pages->setTitre('DoctrineFixturesBundle 2.2 version');
        $pages->setContenu('Fixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.
Setup and Configuration¶

Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.

Follow these steps to install the bundle and the library in the Symfony Standard edition. Add the following to your composer.json file:
	

{
    "require": {
        "doctrine/doctrine-fixtures-bundle": "2.2.*"
    }
}

Update the vendor libraries:

1

	

$ php composer.phar update doctrine/doctrine-fixtures-bundle

If everything worked, the DoctrineFixturesBundle can now be found at vendor/doctrine/doctrine-fixtures-bundle.

DoctrineFixturesBundle installs Doctrine Data Fixtures library. The library can be found at vendor/doctrine/data-fixtures.

Finally, register the Bundle DoctrineFixturesBundle in app/AppKernel.php.

// ...
public function registerBundles()
{
    $bundles = array(
        // ...

    );

    if (...) {
        // ...
        $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
    };


    // ...
}

Writing Simple Fixtures¶

Doctrine2 fixtures are PHP classes where you can create objects and persist them to the database. Like all classes in Symfony2, fixtures should live inside one of your application bundles.

For a bundle located at src/Acme/HelloBundle, the fixture classes should live inside src/Acme/HelloBundle/DataFixtures/ORM or src/Acme/HelloBundle/DataFixtures/MongoDB respectively for the ORM and ODM, This tutorial assumes that you are using the ORM - but fixtures can be added just as easily if you\'re using the ODM.

Imagine that you have a User class, and you\'d like to load one User entry:
');
        $manager->persist($pages);
        
        $pages1 = new Pages();
        $pages1->setTitre('La metamorfosis de Messi');
        $pages1->setContenu('En la explicación a la mutación que ha sufrido Leo Messi de una temporada a otra hay una variante innegable: el peso. El repunte de su carrera hasta una dimensión incluso superior a la que se creía como la mejor, ha venido provocado por una dieta severa.
Messi ha encontrado en Giuliano Poser, el médico de Sacile, cerca de Venecia, el aliado que necesitaba en su carrera. Desde que se ha puesto en sus mano, la megaestrella ha perdido sensiblemente peso —entre cuatro y cinco kilos— y la efectividad ha sido tan comprobada que Leo ha convencido a otros argentinos como Vietto y Agüero para que le visiten de cara a la Copa América, que se celebra en Chile el próximo mes.
El argentino, que cogió fuerzas para la final de la Copa del Rey en la playa con su hijo, volvió a coger altura divina para dejar aún más pequeños a sus teóricos semejantes. Su viaje hacia el quinto Balón de Oro es imparable, inapelable, indiscutible. Tan pancho y normal, como un ser humano más de la faz de la Tierra, el mejor jugador del Barcelona, del momento y probablemente de la historia buscó inspiración a orillas del Mediterráneo. Y pocos días después la plasmó en uno de sus mejores goles con la camiseta del Barcelona, en una obra de arte y precisión a la altura del homenaje a Diego Armando Maradona que protagonizó contra el Getafe en la 2006-2007.
Leer más: Final Copa del Rey: La metamorfosis de Messi - MARCA.com.');
        $manager->persist($pages1);
        $manager->flush();
   }
    
    public function getOrder() {
        return 8;
    }
}