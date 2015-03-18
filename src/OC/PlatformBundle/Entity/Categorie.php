<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="Categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDCATEGORIE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLECAT", type="string", length=255, nullable=true)
     */
    private $libellecat;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=40, nullable=false)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="idcategorie")
     * @ORM\JoinTable(name="formule",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDCATEGORIE", referencedColumnName="IDCATEGORIE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDMENU", referencedColumnName="IDMENU")
     *   }
     * )
     */
    private $idmenu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmenu = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idcategorie
     *
     * @return integer 
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set libellecat
     *
     * @param string $libellecat
     * @return Categorie
     */
    public function setLibellecat($libellecat)
    {
        $this->libellecat = $libellecat;

        return $this;
    }

    /**
     * Get libellecat
     *
     * @return string 
     */
    public function getLibellecat()
    {
        return $this->libellecat;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Categorie
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
     * Add idmenu
     *
     * @param \OC\PlatformBundle\Entity\Menu $idmenu
     * @return Categorie
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
