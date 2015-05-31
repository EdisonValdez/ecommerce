<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        //le html c'est fini
        $builder
                ->add('email', 'email')
                ->add('nom')
                ->add('prenom')
                ->add('sex', 'choice', array(
                    'choices' => array('0' => 'home',
                                       '1' => 'femme',
                                        '0' => 'home',
                                        '2' => 'autres'
                        ), 'preferred_choices' => array('1','2')
                ))
                ->add('date', 'date')
                ->add('country', 'country', 
                        array('preferred_choices' => array('Fr')))
                ->add('contenu', 'textarea')
                ->add('utilizateurs', 'entity', array(
                    'class' => 'Utilizateur\UtilizateurBundle\Entity\Utilizateur'
                ))
                ->add('envoyer', 'submit', array(
                    'attr'=> array('class'=>'btn btn-primary')
                ));
    }
    
    public function getName() {
        return 'ecommerce_ecommercebundle_test';
    }
}
