<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortRepository::class)]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'portarrive', targetEntity: Liaison::class)]
    private Collection $liaisons;

    #[ORM\OneToMany(mappedBy: 'portdepart', targetEntity: Liaison::class)]
    private Collection $portdepart;



    public function __construct()
    {
        $this->liaisons = new ArrayCollection();
        $this->portdepart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Liaison>
     */
    public function getLiaisons(): Collection
    {
        return $this->liaisons;
    }

    public function addLiaison(Liaison $liaison): self
    {
        if (!$this->liaisons->contains($liaison)) {
            $this->liaisons->add($liaison);
            $liaison->setPort($this);
        }

        return $this;
    }

    public function removeLiaison(Liaison $liaison): self
    {
        if ($this->liaisons->removeElement($liaison)) {
            // set the owning side to null (unless already changed)
            if ($liaison->getPort() === $this) {
                $liaison->setPort(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Liaison>
     */
    public function getPortdepart(): Collection
    {
        return $this->portdepart;
    }

    public function addPortdepart(Liaison $portdepart): self
    {
        if (!$this->portdepart->contains($portdepart)) {
            $this->portdepart->add($portdepart);
            $portdepart->setPortdepart($this);
        }

        return $this;
    }

    public function removePortdepart(Liaison $portdepart): self
    {
        if ($this->portdepart->removeElement($portdepart)) {
            // set the owning side to null (unless already changed)
            if ($portdepart->getPortdepart() === $this) {
                $portdepart->setPortdepart(null);
            }
        }

        return $this;
    }
}
