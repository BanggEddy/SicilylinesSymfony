<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 125)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: BateauEquipement::class)]
    private Collection $bateauEquipements;



    public function __construct()
    {
        $this->contenir = new ArrayCollection();
        $this->bateauEquipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Contenir>
     */
    public function getContenir(): Collection
    {
        return $this->contenir;
    }

    public function addContenir(Contenir $contenir): self
    {
        if (!$this->contenir->contains($contenir)) {
            $this->contenir->add($contenir);
        }

        return $this;
    }

    public function removeContenir(Contenir $contenir): self
    {
        $this->contenir->removeElement($contenir);

        return $this;
    }

    /**
     * @return Collection<int, BateauEquipement>
     */
    public function getBateauEquipements(): Collection
    {
        return $this->bateauEquipements;
    }

    public function addBateauEquipement(BateauEquipement $bateauEquipement): self
    {
        if (!$this->bateauEquipements->contains($bateauEquipement)) {
            $this->bateauEquipements->add($bateauEquipement);
            $bateauEquipement->setEquipement($this);
        }

        return $this;
    }

    public function removeBateauEquipement(BateauEquipement $bateauEquipement): self
    {
        if ($this->bateauEquipements->removeElement($bateauEquipement)) {
            // set the owning side to null (unless already changed)
            if ($bateauEquipement->getEquipement() === $this) {
                $bateauEquipement->setEquipement(null);
            }
        }

        return $this;
    }
}
