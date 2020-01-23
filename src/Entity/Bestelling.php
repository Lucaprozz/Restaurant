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
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Soort;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Naam;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSoort(): ?string
    {
        return $this->Soort;
    }

    public function setSoort(string $Soort): self
    {
        $this->Soort = $Soort;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

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
}
