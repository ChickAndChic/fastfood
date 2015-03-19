<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="Menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDMENU", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLEMENU", type="string", length=255, nullable=true)
     */
    private $libellemenu;

    /**
     * @var string
     *
     * @ORM\Column(name="PRIXUNITMENU", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $prixunitmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=40, nullable=false)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Commande", mappedBy="idmenu")
     */
    private $idcommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Restaurant", inversedBy="idmenu")
     * @ORM\JoinTable(name="defini",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDMENU", referencedColumnName="IDMENU")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdResto", referencedColumnName="IdResto")
     *   }
     * )
     */
    private $idresto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categorie", mappedBy="idmenu")
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idmenu")
     * @ORM\JoinTable(name="prodauxchoixdansmenu",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDMENU", referencedColumnName="IDMENU")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdProduit", referencedColumnName="IdProduit")
     *   }
     * )
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcommande = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idresto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idcategorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idmenu
     *
     * @return integer
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }

    /**
     * Set libellemenu
     *
     * @param string $libellemenu
     * @return Menu
     */
    public function setLibellemenu($libellemenu)
    {
        $this->libellemenu = $libellemenu;

        return $this;
    }

    /**
     * Get libellemenu
     *
     * @return string
     */
    public function getLibellemenu()
    {
        return $this->libellemenu;
    }

    /**
     * Set prixunitmenu
     *
     * @param string $prixunitmenu
     * @return Menu
     */
    public function setPrixunitmenu($prixunitmenu)
    {
        $this->prixunitmenu = $prixunitmenu;

        return $this;
    }

    /**
     * Get prixunitmenu
     *
     * @return string
     */
    public function getPrixunitmenu()
    {
        return $this->prixunitmenu;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Menu
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
     * Add idcommande
     *
     * @param \OC\PlatformBundle\Entity\Commande $idcommande
     * @return Menu
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
     * Add idresto
     *
     * @param \OC\PlatformBundle\Entity\Restaurant $idresto
     * @return Menu
     */
    public function addIdresto(\OC\PlatformBundle\Entity\Restaurant $idresto)
    {
        $this->idresto[] = $idresto;

        return $this;
    }

    /**
     * Remove idresto
     *
     * @param \OC\PlatformBundle\Entity\Restaurant $idresto
     */
    public function removeIdresto(\OC\PlatformBundle\Entity\Restaurant $idresto)
    {
        $this->idresto->removeElement($idresto);
    }

    /**
     * Get idresto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdresto()
    {
        return $this->idresto;
    }

    /**
     * Add idcategorie
     *
     * @param \OC\PlatformBundle\Entity\Categorie $idcategorie
     * @return Menu
     */
    public function addIdcategorie(\OC\PlatformBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie[] = $idcategorie;

        return $this;
    }

    /**
     * Remove idcategorie
     *
     * @param \OC\PlatformBundle\Entity\Categorie $idcategorie
     */
    public function removeIdcategorie(\OC\PlatformBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie->removeElement($idcategorie);
    }

    /**
     * Get idcategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Add idproduit
     *
     * @param \OC\PlatformBundle\Entity\Produit $idproduit
     * @return Menu
     */
    public function addIdproduit(\OC\PlatformBundle\Entity\Produit $idproduit)
    {
        $this->idproduit[] = $idproduit;

        return $this;
    }

    /**
     * Remove idproduit
     *
     * @param \OC\PlatformBundle\Entity\Produit $idproduit
     */
    public function removeIdproduit(\OC\PlatformBundle\Entity\Produit $idproduit)
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

