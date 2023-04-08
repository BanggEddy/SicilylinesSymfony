<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $longueur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?float $vitesse = null;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: Traversee::class)]
    private Collection $traversees;



    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: BateauEquipement::class)]
    private Collection $bateauEquipements;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: BateauCategorie::class)]
    private Collection $bateauCategories;



    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->contenir = new ArrayCollection();
        $this->proposer = new ArrayCollection();
        $this->bateauEquipements = new ArrayCollection();
        $this->bateauCategories = new ArrayCollection();
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

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * @return Collection<int, Traversee>
     */
    public function getTraversees(): Collection
    {
        return $this->traversees;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversees->contains($traversee)) {
            $this->traversees->add($traversee);
            $traversee->setBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getBateau() === $this) {
                $traversee->setBateau(null);
            }
        }

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
     * @return Collection<int, Proposer>
     */
    public function getProposer(): Collection
    {
        return $this->proposer;
    }

    public function addProposer(Proposer $proposer): self
    {
        if (!$this->proposer->contains($proposer)) {
            $this->proposer->add($proposer);
        }

        return $this;
    }

    public function removeProposer(Proposer $proposer): self
    {
        $this->proposer->removeElement($proposer);

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
            $bateauEquipement->setBateau($this);
        }

        return $this;
    }

    public function removeBateauEquipement(BateauEquipement $bateauEquipement): self
    {
        if ($this->bateauEquipements->removeElement($bateauEquipement)) {
            // set the owning side to null (unless already changed)
            if ($bateauEquipement->getBateau() === $this) {
                $bateauEquipement->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BateauCategorie>
     */
    public function getBateauCategories(): Collection
    {
        return $this->bateauCategories;
    }

    public function addBateauCategory(BateauCategorie $bateauCategory): self
    {
        if (!$this->bateauCategories->contains($bateauCategory)) {
            $this->bateauCategories->add($bateauCategory);
            $bateauCategory->setBateau($this);
        }

        return $this;
    }

    public function removeBateauCategory(BateauCategorie $bateauCategory): self
    {
        if ($this->bateauCategories->removeElement($bateauCategory)) {
            // set the owning side to null (unless already changed)
            if ($bateauCategory->getBateau() === $this) {
                $bateauCategory->setBateau(null);
            }
        }

        return $this;
    }
}
