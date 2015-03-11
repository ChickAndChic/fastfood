<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manager
 *
 * @ORM\Table(name="Manager", indexes={@ORM\Index(name="Restaurant", columns={"IdResto"})})
 * @ORM\Entity
 */
class Manager
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idManager", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmanager;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdResto", type="integer", nullable=false)
     */
    private $idresto;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=10, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=10, nullable=false)
     */
    private $mdp;



    /**
     * Get idmanager
     *
     * @return integer 
     */
    public function getIdmanager()
    {
        return $this->idmanager;
    }

    /**
     * Set idresto
     *
     * @param integer $idresto
     * @return Manager
     */
    public function setIdresto($idresto)
    {
        $this->idresto = $idresto;

        return $this;
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
     * Set nom
     *
     * @param string $nom
     * @return Manager
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Manager
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Manager
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }
}
