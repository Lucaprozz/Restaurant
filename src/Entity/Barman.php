<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BarmanRepository")
 */
class Barman
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="reserveren")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservering;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservering(): ?Reservering
    {
        return $this->reservering;
    }

    public function setReservering(?Reservering $reservering): self
    {
        $this->reservering = $reservering;

        return $this;
    }
}
