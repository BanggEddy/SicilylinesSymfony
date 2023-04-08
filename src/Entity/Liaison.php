<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiaisonRepository::class)]
class Liaison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Secteur $secteur = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Traversee::class)]
    private Collection $traversees;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Port $portarrive = null;

    #[ORM\ManyToOne(inversedBy: 'portdepart')]
    private ?Port $portdepart = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: LiaisonPeriodeType::class)]
    private Collection $liaisonPeriodeTypes;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duree = null;

 

    public function __construct()
    {
        $this->tarifers = new ArrayCollection();
        $this->traversees = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->liaisonPeriodeTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * @return Collection<int, Tarifer>
     */
    public function getTarifers(): Collection
    {
        return $this->tarifers;
    }

    public function addTarifer(Tarifer $tarifer): self
    {
        if (!$this->tarifers->contains($tarifer)) {
            $this->tarifers->add($tarifer);
            $tarifer->setLiaison($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLiaison() === $this) {
                $tarifer->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPort(): ?Port
    {
        return $this->port;
    }

    public function setPort(?Port $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

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
            $traversee->setLiaison($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getLiaison() === $this) {
                $traversee->setLiaison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addLiaison($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeLiaison($this);
        }

        return $this;
    }

    public function getPortarrive(): ?Port
    {
        return $this->portarrive;
    }

    public function setPortarrive(?Port $portarrive): self
    {
        $this->portarrive = $portarrive;

        return $this;
    }

    public function getPortdepart(): ?Port
    {
        return $this->portdepart;
    }

    public function setPortdepart(?Port $portdepart): self
    {
        $this->portdepart = $portdepart;

        return $this;
    }

    /**
     * @return Collection<int, LiaisonPeriodeType>
     */
    public function getLiaisonPeriodeTypes(): Collection
    {
        return $this->liaisonPeriodeTypes;
    }

    public function addLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if (!$this->liaisonPeriodeTypes->contains($liaisonPeriodeType)) {
            $this->liaisonPeriodeTypes->add($liaisonPeriodeType);
            $liaisonPeriodeType->setLiaison($this);
        }

        return $this;
    }

    public function removeLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if ($this->liaisonPeriodeTypes->removeElement($liaisonPeriodeType)) {
            // set the owning side to null (unless already changed)
            if ($liaisonPeriodeType->getLiaison() === $this) {
                $liaisonPeriodeType->setLiaison(null);
            }
        }

        return $this;
    }
}
