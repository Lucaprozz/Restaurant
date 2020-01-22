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
     * @ORM\Column(type="string", length=3)
     */
    private $Tafel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tijd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="klants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $AantalPersonen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="Datum")
     */
    private $datum;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="Tijd")
     */
    private $Tijd;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="Tafel")
     */
    private $tafel;

    public function __construct()
    {
        $this->datum = new ArrayCollection();
        $this->Tijd = new ArrayCollection();
        $this->tafel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTafel(): ?string
    {
        return $this->Tafel;
    }

    public function setTafel(string $Tafel): self
    {
        $this->Tafel = $Tafel;

        return $this;
    }

    public function getDatum(): ?string
    {
        return $this->Datum;
    }

    public function setDatum(string $Datum): self
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getTijd(): ?string
    {
        return $this->tijd;
    }

    public function setTijd(string $tijd): self
    {
        $this->tijd = $tijd;

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

    public function getAantalPersonen(): ?int
    {
        return $this->AantalPersonen;
    }

    public function setAantalPersonen(int $AantalPersonen): self
    {
        $this->AantalPersonen = $AantalPersonen;

        return $this;
    }

    public function addDatum(Bestelling $datum): self
    {
        if (!$this->datum->contains($datum)) {
            $this->datum[] = $datum;
            $datum->setDatum($this);
        }

        return $this;
    }

    public function removeDatum(Bestelling $datum): self
    {
        if ($this->datum->contains($datum)) {
            $this->datum->removeElement($datum);
            // set the owning side to null (unless already changed)
            if ($datum->getDatum() === $this) {
                $datum->setDatum(null);
            }
        }

        return $this;
    }

    public function addTijd(Bestelling $tijd): self
    {
        if (!$this->Tijd->contains($tijd)) {
            $this->Tijd[] = $tijd;
            $tijd->setTijd($this);
        }

        return $this;
    }

    public function removeTijd(Bestelling $tijd): self
    {
        if ($this->Tijd->contains($tijd)) {
            $this->Tijd->removeElement($tijd);
            // set the owning side to null (unless already changed)
            if ($tijd->getTijd() === $this) {
                $tijd->setTijd(null);
            }
        }

        return $this;
    }

    public function addTafel(Bestelling $tafel): self
    {
        if (!$this->tafel->contains($tafel)) {
            $this->tafel[] = $tafel;
            $tafel->setTafel($this);
        }

        return $this;
    }

    public function removeTafel(Bestelling $tafel): self
    {
        if ($this->tafel->contains($tafel)) {
            $this->tafel->removeElement($tafel);
            // set the owning side to null (unless already changed)
            if ($tafel->getTafel() === $this) {
                $tafel->setTafel(null);
            }
        }

        return $this;
    }
}
