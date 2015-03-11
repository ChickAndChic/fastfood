<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compose
 *
 * @ORM\Table(name="Compose")
 * @ORM\Entity
 */
class Compose
{
    /**
     * @var string
     *
     * @ORM\Column(name="LibelleProd", type="string", length=32, nullable=false)
     */
    private $libelleprod;

    /**
     * @var string
     *
     * @ORM\Column(name="PrixUnitProduit", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prixunitproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeUnit", type="string", length=32, nullable=false)
     */
    private $typeunit;

    /**
     * @var integer
     *
     * @ORM\Column(name="SeuilPrep", type="integer", nullable=false)
     */
    private $seuilprep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TpsConso", type="time", nullable=false)
     */
    private $tpsconso;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="blob", nullable=true)
     */
    private $image;

    /**
     * @var \Produit
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdProduit", referencedColumnName="IdProduit")
     * })
     */
    private $idproduit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="idproduit")
     * @ORM\JoinTable(name="contient",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IdProduit", referencedColumnName="IdProduit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdIngredient", referencedColumnName="IdIngredient")
     *   }
     * )
     */
    private $idingredient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idingredient = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set libelleprod
     *
     * @param string $libelleprod
     * @return Compose
     */
    public function setLibelleprod($libelleprod)
    {
        $this->libelleprod = $libelleprod;

        return $this;
    }

    /**
     * Get libelleprod
     *
     * @return string 
     */
    public function getLibelleprod()
    {
        return $this->libelleprod;
    }

    /**
     * Set prixunitproduit
     *
     * @param string $prixunitproduit
     * @return Compose
     */
    public function setPrixunitproduit($prixunitproduit)
    {
        $this->prixunitproduit = $prixunitproduit;

        return $this;
    }

    /**
     * Get prixunitproduit
     *
     * @return string 
     */
    public function getPrixunitproduit()
    {
        return $this->prixunitproduit;
    }

    /**
     * Set typeunit
     *
     * @param string $typeunit
     * @return Compose
     */
    public function setTypeunit($typeunit)
    {
        $this->typeunit = $typeunit;

        return $this;
    }

    /**
     * Get typeunit
     *
     * @return string 
     */
    public function getTypeunit()
    {
        return $this->typeunit;
    }

    /**
     * Set seuilprep
     *
     * @param integer $seuilprep
     * @return Compose
     */
    public function setSeuilprep($seuilprep)
    {
        $this->seuilprep = $seuilprep;

        return $this;
    }

    /**
     * Get seuilprep
     *
     * @return integer 
     */
    public function getSeuilprep()
    {
        return $this->seuilprep;
    }

    /**
     * Set tpsconso
     *
     * @param \DateTime $tpsconso
     * @return Compose
     */
    public function setTpsconso($tpsconso)
    {
        $this->tpsconso = $tpsconso;

        return $this;
    }

    /**
     * Get tpsconso
     *
     * @return \DateTime 
     */
    public function getTpsconso()
    {
        return $this->tpsconso;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Compose
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set idproduit
     *
     * @param \OC\PlatformBundle\Entity\Produit $idproduit
     * @return Compose
     */
    public function setIdproduit(\OC\PlatformBundle\Entity\Produit $idproduit)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return \OC\PlatformBundle\Entity\Produit 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Add idingredient
     *
     * @param \OC\PlatformBundle\Entity\Ingredient $idingredient
     * @return Compose
     */
    public function addIdingredient(\OC\PlatformBundle\Entity\Ingredient $idingredient)
    {
        $this->idingredient[] = $idingredient;

        return $this;
    }

    /**
     * Remove idingredient
     *
     * @param \OC\PlatformBundle\Entity\Ingredient $idingredient
     */
    public function removeIdingredient(\OC\PlatformBundle\Entity\Ingredient $idingredient)
    {
        $this->idingredient->removeElement($idingredient);
    }

    /**
     * Get idingredient
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdingredient()
    {
        return $this->idingredient;
    }
}
