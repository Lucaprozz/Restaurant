<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KokRepository")
 */
class Kok
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="resereveren")
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
