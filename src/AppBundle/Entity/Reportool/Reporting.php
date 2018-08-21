<?php

namespace AppBundle\Entity\Reportool;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Reporting
 *
 * @ORM\Table(name="reportool_reporting")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reportool\ReportingRepository")
 */
class Reporting
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
     * @ORM\Column(type="datetime")
     */
    private $datecreation;

    /**
     * @ORM\OneToOne(targetEntity="ReportingType", inversedBy="reporting", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="reportings")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="Intervention", mappedBy="reporting", orphanRemoval=true)
     */
    private $interventions;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->interventions = new ArrayCollection();
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

    public function getDatecreation()
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(ReportingType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user)
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Intervention[]
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention)
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setReporting($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention)
    {
        if ($this->interventions->contains($intervention)) {
            $this->interventions->removeElement($intervention);
            // set the owning side to null (unless already changed)
            if ($intervention->getReporting() === $this) {
                $intervention->setReporting(null);
            }
        }

        return $this;
    }
}

