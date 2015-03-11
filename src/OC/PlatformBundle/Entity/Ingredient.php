<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="Ingredient")
 * @ORM\Entity
 */
class Ingredient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdIngredient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idingredient;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleIngr", type="string", length=255, nullable=false)
     */
    private $libelleingr;

    /**
     * @var integer
     *
     * @ORM\Column(name="SeuilStock", type="integer", nullable=false)
     */
    private $seuilstock;

    /**
     * @var integer
     *
     * @ORM\Column(name="Stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Compose", mappedBy="idingredient")
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idingredient
     *
     * @return integer 
     */
    public function getIdingredient()
    {
        return $this->idingredient;
    }

    /**
     * Set libelleingr
     *
     * @param string $libelleingr
     * @return Ingredient
     */
    public function setLibelleingr($libelleingr)
    {
        $this->libelleingr = $libelleingr;

        return $this;
    }

    /**
     * Get libelleingr
     *
     * @return string 
     */
    public function getLibelleingr()
    {
        return $this->libelleingr;
    }

    /**
     * Set seuilstock
     *
     * @param integer $seuilstock
     * @return Ingredient
     */
    public function setSeuilstock($seuilstock)
    {
        $this->seuilstock = $seuilstock;

        return $this;
    }

    /**
     * Get seuilstock
     *
     * @return integer 
     */
    public function getSeuilstock()
    {
        return $this->seuilstock;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Ingredient
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Add idproduit
     *
     * @param \OC\PlatformBundle\Entity\Compose $idproduit
     * @return Ingredient
     */
    public function addIdproduit(\OC\PlatformBundle\Entity\Compose $idproduit)
    {
        $this->idproduit[] = $idproduit;

        return $this;
    }

    /**
     * Remove idproduit
     *
     * @param \OC\PlatformBundle\Entity\Compose $idproduit
     */
    public function removeIdproduit(\OC\PlatformBundle\Entity\Compose $idproduit)
    {
        $this->idproduit->removeElement($idproduit);
    }

    /**
     * Get idproduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }
}
