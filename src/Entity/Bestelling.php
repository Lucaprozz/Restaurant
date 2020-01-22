<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestellingRepository")
 */
class Bestelling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="datum")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Datum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="Tijd")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tijd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="tafel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tafel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?Reservering
    {
        return $this->Datum;
    }

    public function setDatum(?Reservering $Datum): self
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getTijd(): ?Reservering
    {
        return $this->Tijd;
    }

    public function setTijd(?Reservering $Tijd): self
    {
        $this->Tijd = $Tijd;

        return $this;
    }

    public function getTafel(): ?Reservering
    {
        return $this->Tafel;
    }

    public function setTafel(?Reservering $Tafel): self
    {
        $this->Tafel = $Tafel;

        return $this;
    }
}
