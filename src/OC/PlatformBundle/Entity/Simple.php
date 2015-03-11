<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Simple
 *
 * @ORM\Table(name="Simple")
 * @ORM\Entity
 */
class Simple
{
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
     * Set seuilstock
     *
     * @param integer $seuilstock
     * @return Simple
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
     * @return Simple
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
     * Set libelleprod
     *
     * @param string $libelleprod
     * @return Simple
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
     * @return Simple
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
     * @return Simple
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
     * @return Simple
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
     * @return Simple
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
     * @return Simple
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
     * @return Simple
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
}
