<?php

namespace AppBundle\Entity\Reportool;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reportool\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telfixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telpro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\ManyToMany(targetEntity="Reporting", mappedBy="users")
     */
    private $reportings;

    /**
     * @ORM\OneToOne(targetEntity="Civilite", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $civilite;

    /**
     * @ORM\OneToOne(targetEntity="UserType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->reportings = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodepostal()
    {
        return $this->codepostal;
    }

    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getTelfixe()
    {
        return $this->telfixe;
    }

    public function setTelfixe($telfixe)
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    public function getTelpro()
    {
        return $this->telpro;
    }

    public function setTelpro($telpro)
    {
        $this->telpro = $telpro;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|Reporting[]
     */
    public function getReportings()
    {
        return $this->reportings;
    }

    public function addReporting(Reporting $reporting)
    {
        if (!$this->reportings->contains($reporting)) {
            $this->reportings[] = $reporting;
            $reporting->addUser($this);
        }

        return $this;
    }

    public function removeReporting(Reporting $reporting)
    {
        if ($this->reportings->contains($reporting)) {
            $this->reportings->removeElement($reporting);
            $reporting->removeUser($this);
        }

        return $this;
    }

    public function getCivilite()
    {
        return $this->civilite;
    }

    public function setCivilite(Civilite $civilite)
    {
        $this->civilite = $civilite;

        return $this;

    }
    public function getType()
    {
        return $this->type;
    }

    public function setType(UserType $type)
    {
        $this->type = $type;

        return $this;
    }
}
