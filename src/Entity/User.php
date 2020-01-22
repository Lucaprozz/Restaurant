<?
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->user = new ArrayCollection();
        $this->klants = new ArrayCollection();
        // your own logic
    }

        /**
         * @ORM\Column(type="datetime")
         */
        private $last_activity;

            /**
             * @ORM\Column(type="string", length=255)
             */
            private $name;

            /**
            * @ORM\Column(type="string", length=255)
            */
            private $telnr;

            /**
             * @ORM\Column(type="integer")
             */
            private $AantalPersonen;

            /**
             * @ORM\OneToMany(targetEntity="App\Entity\Reservering", mappedBy="user")
             */
            private $klants;

            public function getLastActivity(): ?\DateTimeInterface
            {
                return $this->last_activity;
            }

            public function setLastActivity(\DateTimeInterface $last_activity): self
            {
                $this->last_activity = $last_activity;

                return $this;
            }

            public function isActiveNow()
            {
                // Delay during which the user will be considered as still active
                $delay = new \DateTime('2 minutes ago');

                return ( $this->getLastActivity() > $delay );
            }

                public function getName(): ?string
                {
                    return $this->name;
                }

                public function setName(string $firstname): self
                {
                    $this->name = $name;

                    return $this;
                }

                    public function getTelnr(): ?string
                    {
                        return $this->telnr;
                    }

                    public function setTelnr(string $telnr): self
                    {
                        $this->telnr = $telnr;

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

                    /**
                     * @return Collection|Reservering[]
                     */
                    public function getKlants(): Collection
                    {
                        return $this->klants;
                    }

                    public function addKlant(Reservering $klant): self
                    {
                        if (!$this->klants->contains($klant)) {
                            $this->klants[] = $klant;
                            $klant->setUser($this);
                        }

                        return $this;
                    }

                    public function removeKlant(Reservering $klant): self
                    {
                        if ($this->klants->contains($klant)) {
                            $this->klants->removeElement($klant);
                            // set the owning side to null (unless already changed)
                            if ($klant->getUser() === $this) {
                                $klant->setUser(null);
                            }
                        }

                        return $this;
                    }
   }
