<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Menu", inversedBy="menu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menusoort;

    /**
     * @ORM\Column(type="integer")
     */
    private $Aantal;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $Prijs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="reservering")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservering;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Barman", mappedBy="bestelling")
     */
    private $bestelling;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kok", mappedBy="bestelling")
     */
    private $besteldin;

    public function __construct()
    {
        $this->bestelling = new ArrayCollection();
        $this->besteldin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenusoort(): ?Menu
    {
        return $this->menusoort;
    }

    public function setMenusoort(?Menu $menusoort): self
    {
        $this->menusoort = $menusoort;

        return $this;
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

    public function getPrijs(): ?string
    {
        return $this->Prijs;
    }

    public function setPrijs(string $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
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

    /**
     * @return Collection|Barman[]
     */
    public function getBestelling(): Collection
    {
        return $this->bestelling;
    }

    public function addBestelling(Barman $bestelling): self
    {
        if (!$this->bestelling->contains($bestelling)) {
            $this->bestelling[] = $bestelling;
            $bestelling->setBestelling($this);
        }

        return $this;
    }

    public function removeBestelling(Barman $bestelling): self
    {
        if ($this->bestelling->contains($bestelling)) {
            $this->bestelling->removeElement($bestelling);
            // set the owning side to null (unless already changed)
            if ($bestelling->getBestelling() === $this) {
                $bestelling->setBestelling(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Kok[]
     */
    public function getBesteldin(): Collection
    {
        return $this->besteldin;
    }

    public function addBesteldin(Kok $besteldin): self
    {
        if (!$this->besteldin->contains($besteldin)) {
            $this->besteldin[] = $besteldin;
            $besteldin->setBestelling($this);
        }

        return $this;
    }

    public function removeBesteldin(Kok $besteldin): self
    {
        if ($this->besteldin->contains($besteldin)) {
            $this->besteldin->removeElement($besteldin);
            // set the owning side to null (unless already changed)
            if ($besteldin->getBestelling() === $this) {
                $besteldin->setBestelling(null);
            }
        }

        return $this;
    }
}
