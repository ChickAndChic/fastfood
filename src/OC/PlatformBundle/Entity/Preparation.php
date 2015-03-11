<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preparation
 *
 * @ORM\Table(name="Preparation", indexes={@ORM\Index(name="FK_Preparation_Produit", columns={"IdProduit"})})
 * @ORM\Entity
 */
class Preparation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Idprep", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureDebut", type="time", nullable=false)
     */
    private $heuredebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureDispo", type="time", nullable=false)
     */
    private $heuredispo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Dispo", type="boolean", nullable=false)
     */
    private $dispo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HeureFin", type="time", nullable=false)
     */
    private $heurefin;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdProduit", referencedColumnName="IdProduit")
     * })
     */
    private $idproduit;



    /**
     * Get idprep
     *
     * @return integer 
     */
    public function getIdprep()
    {
        return $this->idprep;
    }

    /**
     * Set heuredebut
     *
     * @param \DateTime $heuredebut
     * @return Preparation
     */
    public function setHeuredebut($heuredebut)
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    /**
     * Get heuredebut
     *
     * @return \DateTime 
     */
    public function getHeuredebut()
    {
        return $this->heuredebut;
    }

    /**
     * Set heuredispo
     *
     * @param \DateTime $heuredispo
     * @return Preparation
     */
    public function setHeuredispo($heuredispo)
    {
        $this->heuredispo = $heuredispo;

        return $this;
    }

    /**
     * Get heuredispo
     *
     * @return \DateTime 
     */
    public function getHeuredispo()
    {
        return $this->heuredispo;
    }

    /**
     * Set dispo
     *
     * @param boolean $dispo
     * @return Preparation
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return boolean 
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set heurefin
     *
     * @param \DateTime $heurefin
     * @return Preparation
     */
    public function setHeurefin($heurefin)
    {
        $this->heurefin = $heurefin;

        return $this;
    }

    /**
     * Get heurefin
     *
     * @return \DateTime 
     */
    public function getHeurefin()
    {
        return $this->heurefin;
    }

    /**
     * Set idproduit
     *
     * @param \OC\PlatformBundle\Entity\Produit $idproduit
     * @return Preparation
     */
    public function setIdproduit(\OC\PlatformBundle\Entity\Produit $idproduit = null)
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
