<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuItemRepository")
 */
class MenuItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gerecht", inversedBy="grecjtnf")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gerecht;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subgerecht", inversedBy="subduv")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subgerecht;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $MenuItemCode;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $MenuItem;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $Prijs;

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

    public function getSubgerecht(): ?Subgerecht
    {
        return $this->subgerecht;
    }

    public function setSubgerecht(?Subgerecht $subgerecht): self
    {
        $this->subgerecht = $subgerecht;

        return $this;
    }

    public function getMenuItemCode(): ?string
    {
        return $this->MenuItemCode;
    }

    public function setMenuItemCode(string $MenuItemCode): self
    {
        $this->MenuItemCode = $MenuItemCode;

        return $this;
    }

    public function getMenuItem(): ?string
    {
        return $this->MenuItem;
    }

    public function setMenuItem(string $MenuItem): self
    {
        $this->MenuItem = $MenuItem;

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
}
