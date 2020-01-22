<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GerechtRepository")
 */
class Gerecht
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
    private $Gerechtcode;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Gerecht;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subgerecht", mappedBy="gerecht")
     */
    private $gerecht;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuItem", mappedBy="gerecht")
     */
    private $grecjtnf;

    public function __construct()
    {
        $this->gerecht = new ArrayCollection();
        $this->grecjtnf = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGerechtcode(): ?string
    {
        return $this->Gerechtcode;
    }

    public function setGerechtcode(string $Gerechtcode): self
    {
        $this->Gerechtcode = $Gerechtcode;

        return $this;
    }

    public function getGerecht(): ?string
    {
        return $this->Gerecht;
    }

    public function setGerecht(string $Gerecht): self
    {
        $this->Gerecht = $Gerecht;

        return $this;
    }

    public function addGerecht(Subgerecht $gerecht): self
    {
        if (!$this->gerecht->contains($gerecht)) {
            $this->gerecht[] = $gerecht;
            $gerecht->setGerecht($this);
        }

        return $this;
    }

    public function removeGerecht(Subgerecht $gerecht): self
    {
        if ($this->gerecht->contains($gerecht)) {
            $this->gerecht->removeElement($gerecht);
            // set the owning side to null (unless already changed)
            if ($gerecht->getGerecht() === $this) {
                $gerecht->setGerecht(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getGrecjtnf(): Collection
    {
        return $this->grecjtnf;
    }

    public function addGrecjtnf(MenuItem $grecjtnf): self
    {
        if (!$this->grecjtnf->contains($grecjtnf)) {
            $this->grecjtnf[] = $grecjtnf;
            $grecjtnf->setGerecht($this);
        }

        return $this;
    }

    public function removeGrecjtnf(MenuItem $grecjtnf): self
    {
        if ($this->grecjtnf->contains($grecjtnf)) {
            $this->grecjtnf->removeElement($grecjtnf);
            // set the owning side to null (unless already changed)
            if ($grecjtnf->getGerecht() === $this) {
                $grecjtnf->setGerecht(null);
            }
        }

        return $this;
    }
}
