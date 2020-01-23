<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TafelRepository")
 */
class Tafel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Aantal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservering", mappedBy="tafel")
     */
    private $Tafel;

    public function __construct()
    {
        $this->Tafel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->Aantal;
    }

    public function setAantal(int $Aantal): self
    {
        $this->Aantal = $Aantal;

        return $this;
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getTafel(): Collection
    {
        return $this->Tafel;
    }

    public function addTafel(Reservering $tafel): self
    {
        if (!$this->Tafel->contains($tafel)) {
            $this->Tafel[] = $tafel;
            $tafel->setTafel($this);
        }

        return $this;
    }

    public function removeTafel(Reservering $tafel): self
    {
        if ($this->Tafel->contains($tafel)) {
            $this->Tafel->removeElement($tafel);
            // set the owning side to null (unless already changed)
            if ($tafel->getTafel() === $this) {
                $tafel->setTafel(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
