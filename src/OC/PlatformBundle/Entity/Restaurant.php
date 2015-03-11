<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="Restaurant")
 * @ORM\Entity
 */
class Restaurant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdResto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idresto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu", mappedBy="idresto")
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
     * Get idresto
     *
     * @return integer 
     */
    public function getIdresto()
    {
        return $this->idresto;
    }

    /**
     * Add idmenu
     *
     * @param \OC\PlatformBundle\Entity\Menu $idmenu
     * @return Restaurant
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
