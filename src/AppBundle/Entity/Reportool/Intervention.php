<?php

namespace AppBundle\Entity\Reportool;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Reportool\InterventionRepository")
 */
class Intervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Reporting", inversedBy="interventions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reporting;

    public function getId()
    {
        return $this->id;
    }

    public function getReporting()
    {
        return $this->reporting;
    }

    public function setReporting($reporting)
    {
        $this->reporting = $reporting;

        return $this;
    }
}
