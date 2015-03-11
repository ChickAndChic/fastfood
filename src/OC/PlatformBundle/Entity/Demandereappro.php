<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandereappro
 *
 * @ORM\Table(name="DemandeReappro", indexes={@ORM\Index(name="FK_DemandeReappro_Simple", columns={"IdProduit"}), @ORM\Index(name="FK_DemandeReappro_Ingredient", columns={"IdIngredient"}), @ORM\Index(name="IDX_5C94913151582F30", columns={"IdResto"})})
 * @ORM\Entity
 */
class Demandereappro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quantitereappro", type="bigint", nullable=false)
     */
    private $quantitereappro;

    /**
     * @var \Restaurant
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdResto", referencedColumnName="IdResto")
     * })
     */
    private $idresto;

    /**
     * @var \Simple
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Simple")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdProduit", referencedColumnName="IdProduit")
     * })
     */
    private $idproduit;

    /**
     * @var \Ingredient
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Ingredient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdIngredient", referencedColumnName="IdIngredient")
     * })
     */
    private $idingredient;



    /**
     * Set quantitereappro
     *
     * @param integer $quantitereappro
     * @return Demandereappro
     */
    public function setQuantitereappro($quantitereappro)
    {
        $this->quantitereappro = $quantitereappro;

        return $this;
    }

    /**
     * Get quantitereappro
     *
     * @return integer 
     */
    public function getQuantitereappro()
    {
        return $this->quantitereappro;
    }

    /**
     * Set idresto
     *
     * @param \OC\PlatformBundle\Entity\Restaurant $idresto
     * @return Demandereappro
     */
    public function setIdresto(\OC\PlatformBundle\Entity\Restaurant $idresto)
    {
        $this->idresto = $idresto;

        return $this;
    }

    /**
     * Get idresto
     *
     * @return \OC\PlatformBundle\Entity\Restaurant 
     */
    public function getIdresto()
    {
        return $this->idresto;
    }

    /**
     * Set idproduit
     *
     * @param \OC\PlatformBundle\Entity\Simple $idproduit
     * @return Demandereappro
     */
    public function setIdproduit(\OC\PlatformBundle\Entity\Simple $idproduit)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return \OC\PlatformBundle\Entity\Simple 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set idingredient
     *
     * @param \OC\PlatformBundle\Entity\Ingredient $idingredient
     * @return Demandereappro
     */
    public function setIdingredient(\OC\PlatformBundle\Entity\Ingredient $idingredient)
    {
        $this->idingredient = $idingredient;

        return $this;
    }

    /**
     * Get idingredient
     *
     * @return \OC\PlatformBundle\Entity\Ingredient 
     */
    public function getIdingredient()
    {
        return $this->idingredient;
    }
}
