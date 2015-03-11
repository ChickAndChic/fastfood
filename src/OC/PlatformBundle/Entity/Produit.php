<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="Produit", indexes={@ORM\Index(name="FK_Produit_Categorie", columns={"IDCATEGORIE"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

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
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDCATEGORIE", referencedColumnName="IDCATEGORIE")
     * })
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", mappedBy="idproduit")
     */
    private $idcommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu", mappedBy="idproduit")
     */
    private $idmenu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommande = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmenu = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idproduit
     *
     * @return integer 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set libelleprod
     *
     * @param string $libelleprod
     * @return Produit
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
     * @return Produit
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
     * @return Produit
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
     * @return Produit
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
     * @return Produit
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
     * @return Produit
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
     * Set idcategorie
     *
     * @param \OC\PlatformBundle\Entity\Categorie $idcategorie
     * @return Produit
     */
    public function setIdcategorie(\OC\PlatformBundle\Entity\Categorie $idcategorie = null)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return \OC\PlatformBundle\Entity\Categorie 
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Add idcommande
     *
     * @param \OC\PlatformBundle\Entity\Commande $idcommande
     * @return Produit
     */
    public function addIdcommande(\OC\PlatformBundle\Entity\Commande $idcommande)
    {
        $this->idcommande[] = $idcommande;

        return $this;
    }

    /**
     * Remove idcommande
     *
     * @param \OC\PlatformBundle\Entity\Commande $idcommande
     */
    public function removeIdcommande(\OC\PlatformBundle\Entity\Commande $idcommande)
    {
        $this->idcommande->removeElement($idcommande);
    }

    /**
     * Get idcommande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }

    /**
     * Add idmenu
     *
     * @param \OC\PlatformBundle\Entity\Menu $idmenu
     * @return Produit
     */
    public function addIdmenu(\OC\PlatformBundle\Entity\Menu $idmenu)
    {
        $this->idmenu[] = $idmenu;

        return $this;
    }

    /**
     * Remove idmenu
     *
     * @param \OC\PlatformBundle\Entity\Menu $idmenu
     */
    public function removeIdmenu(\OC\PlatformBundle\Entity\Menu $idmenu)
    {
        $this->idmenu->removeElement($idmenu);
    }

    /**
     * Get idmenu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }
}
