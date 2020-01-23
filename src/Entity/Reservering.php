<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveringRepository")
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tafel", inversedBy="Tafel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tafel;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datum_tijd;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="reservering")
     */
    private $reservering;

    public function __construct()
    {
        $this->reservering = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTafel(): ?Tafel
    {
        return $this->tafel;
    }

    public function setTafel(?Tafel $tafel): self
    {
        $this->tafel = $tafel;

        return $this;
    }

    public function getDatumTijd(): ?\DateTimeInterface
    {
        return $this->datum_tijd;
    }

    public function setDatumTijd(\DateTimeInterface $datum_tijd): self
    {
        $this->datum_tijd = $datum_tijd;

        return $this;
    }

    /**
     * @return Collection|Bestelling[]
     */
    public function getReservering(): Collection
    {
        return $this->reservering;
    }

    public function addReservering(Bestelling $reservering): self
    {
        if (!$this->reservering->contains($reservering)) {
            $this->reservering[] = $reservering;
            $reservering->setReservering($this);
        }

        return $this;
    }

    public function removeReservering(Bestelling $reservering): self
    {
        if ($this->reservering->contains($reservering)) {
            $this->reservering->removeElement($reservering);
            // set the owning side to null (unless already changed)
            if ($reservering->getReservering() === $this) {
                $reservering->setReservering(null);
            }
        }

        return $this;
    }
}
