<?php

namespace AppBundle\Entity\Reportool;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reportool\ReportingTypeRepository")
 */
class ReportingType
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
    private $designation;

    /**
     * @ORM\OneToOne(targetEntity="Reporting", mappedBy="type", cascade={"persist", "remove"})
     */
    private $reporting;

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    public function getReporting()
    {
        return $this->reporting;
    }

    public function setReporting($reporting)
    {
        $this->reporting = $reporting;

        // set the owning side of the relation if necessary
        if ($this !== $reporting->getType()) {
            $reporting->setType($this);
        }

        return $this;
    }
}
