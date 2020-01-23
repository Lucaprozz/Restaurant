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
     * @ORM\Column(type="datetime")
     */
    private $datum_tijd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="user")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tafel", inversedBy="Tafel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tafel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="reservering")
     */
    private $reservering;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Barman", mappedBy="reservering")
     */
    private $reserveren;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kok", mappedBy="reservering")
     */
    private $resereveren;

    public function __construct()
    {
        $this->reservering = new ArrayCollection();
        $this->reserveren = new ArrayCollection();
        $this->resereveren = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Barman[]
     */
    public function getReserveren(): Collection
    {
        return $this->reserveren;
    }

    public function addReserveren(Barman $reserveren): self
    {
        if (!$this->reserveren->contains($reserveren)) {
            $this->reserveren[] = $reserveren;
            $reserveren->setReservering($this);
        }

        return $this;
    }

    public function removeReserveren(Barman $reserveren): self
    {
        if ($this->reserveren->contains($reserveren)) {
            $this->reserveren->removeElement($reserveren);
            // set the owning side to null (unless already changed)
            if ($reserveren->getReservering() === $this) {
                $reserveren->setReservering(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Kok[]
     */
    public function getResereveren(): Collection
    {
        return $this->resereveren;
    }

    public function addResereveren(Kok $resereveren): self
    {
        if (!$this->resereveren->contains($resereveren)) {
            $this->resereveren[] = $resereveren;
            $resereveren->setReservering($this);
        }

        return $this;
    }

    public function removeResereveren(Kok $resereveren): self
    {
        if ($this->resereveren->contains($resereveren)) {
            $this->resereveren->removeElement($resereveren);
            // set the owning side to null (unless already changed)
            if ($resereveren->getReservering() === $this) {
                $resereveren->setReservering(null);
            }
        }

        return $this;
    }
}
