<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="menusoort")
     */
    private $menu;

    public function __construct()
    {
        $this->menu = new ArrayCollection();
    }

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

    /**
     * @return Collection|Bestelling[]
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Bestelling $menu): self
    {
        if (!$this->menu->contains($menu)) {
            $this->menu[] = $menu;
            $menu->setMenusoort($this);
        }

        return $this;
    }

    public function removeMenu(Bestelling $menu): self
    {
        if ($this->menu->contains($menu)) {
            $this->menu->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getMenusoort() === $this) {
                $menu->setMenusoort(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam();
    }
}
