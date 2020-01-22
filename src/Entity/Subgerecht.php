<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubgerechtRepository")
 */
class Subgerecht
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gerecht", inversedBy="gerecht")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gerecht;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $SubgerechtCode;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Subgerecht;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuItem", mappedBy="subgerecht")
     */
    private $subduv;

    public function __construct()
    {
        $this->subduv = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGerecht(): ?Gerecht
    {
        return $this->gerecht;
    }

    public function setGerecht(?Gerecht $gerecht): self
    {
        $this->gerecht = $gerecht;

        return $this;
    }

    public function getSubgerechtCode(): ?string
    {
        return $this->SubgerechtCode;
    }

    public function setSubgerechtCode(string $SubgerechtCode): self
    {
        $this->SubgerechtCode = $SubgerechtCode;

        return $this;
    }

    public function getSubgerecht(): ?string
    {
        return $this->Subgerecht;
    }

    public function setSubgerecht(string $Subgerecht): self
    {
        $this->Subgerecht = $Subgerecht;

        return $this;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getSubduv(): Collection
    {
        return $this->subduv;
    }

    public function addSubduv(MenuItem $subduv): self
    {
        if (!$this->subduv->contains($subduv)) {
            $this->subduv[] = $subduv;
            $subduv->setSubgerecht($this);
        }

        return $this;
    }

    public function removeSubduv(MenuItem $subduv): self
    {
        if ($this->subduv->contains($subduv)) {
            $this->subduv->removeElement($subduv);
            // set the owning side to null (unless already changed)
            if ($subduv->getSubgerecht() === $this) {
                $subduv->setSubgerecht(null);
            }
        }

        return $this;
    }
}
