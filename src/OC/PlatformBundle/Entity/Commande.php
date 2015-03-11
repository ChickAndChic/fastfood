<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="Commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDCOMMANDE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HEURERECUP", type="time", nullable=true)
     */
    private $heurerecup;

    /**
     * @var string
     *
     * @ORM\Column(name="ETATCOMMANDE", type="string", length=255, nullable=false)
     */
    private $etatcommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="idcommande")
     * @ORM\JoinTable(name="commandemenu",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDCOMMANDE", referencedColumnName="IDCOMMANDE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDMENU", referencedColumnName="IDMENU")
     *   }
     * )
     */
    private $idmenu;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idcommande")
     * @ORM\JoinTable(name="commandeprodhorsmenu",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDCOMMANDE", referencedColumnName="IDCOMMANDE")
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
        $this->idmenu = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idcommande
     *
     * @return integer 
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }

    /**
     * Set heurerecup
     *
     * @param \DateTime $heurerecup
     * @return Commande
     */
    public function setHeurerecup($heurerecup)
    {
        $this->heurerecup = $heurerecup;

        return $this;
    }

    /**
     * Get heurerecup
     *
     * @return \DateTime 
     */
    public function getHeurerecup()
    {
        return $this->heurerecup;
    }

    /**
     * Set etatcommande
     *
     * @param string $etatcommande
     * @return Commande
     */
    public function setEtatcommande($etatcommande)
    {
        $this->etatcommande = $etatcommande;

        return $this;
    }

    /**
     * Get etatcommande
     *
     * @return string 
     */
    public function getEtatcommande()
    {
        return $this->etatcommande;
    }

    /**
     * Add idmenu
     *
     * @param \OC\PlatformBundle\Entity\Menu $idmenu
     * @return Commande
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

    /**
     * Add idproduit
     *
     * @param \OC\PlatformBundle\Entity\Produit $idproduit
     * @return Commande
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
