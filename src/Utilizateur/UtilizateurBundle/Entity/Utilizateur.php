<?php

namespace Utilizateur\UtilizateurBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Utilizateur\UtilizateurBundle\Repository\UtilizateurRepository")
 * @ORM\Table(name="utilizateur")
 */
class Utilizateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection;
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection;
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\Commandes", mappedBy="utilizateur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commandes;
    
    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses", mappedBy="utilizateur", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $adresses;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set commandes
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Commandes $commandes
     * @return Utilizateur
     */
    public function setCommandes(\Ecommerce\EcommerceBundle\Entity\Commandes $commandes = null)
    {
        $this->commandes = $commandes;

        return $this;
    }

    /**
     * Get commandes
     *
     * @return \Ecommerce\EcommerceBundle\Entity\Commandes 
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Set adresses
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses $adresses
     * @return Utilizateur
     */
    public function setAdresses(\Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses $adresses = null)
    {
        $this->adresses = $adresses;

        return $this;
    }

    /**
     * Get adresses
     *
     * @return \Ecommerce\EcommerceBundle\Entity\UtilizateurAdresses 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
