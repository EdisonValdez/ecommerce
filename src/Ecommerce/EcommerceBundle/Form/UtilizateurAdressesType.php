<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilizateurAdressesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('telephone', 'text')
            ->add('adresse', 'text')
            ->add('cp', 'text')
            ->add('pays', 'text')
            ->add('complement', 'text', array('required'=> false))
            ->add('ville', 'text')
            
            //>add('utilizateur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ecommerce_ecommercebundle_utilizateuradresses';
    }
}
