<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 125)]
    private ?string $libelle = null;


    #[ORM\ManyToOne(inversedBy: 'types')]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: LiaisonPeriodeType::class)]
    private Collection $liaisonPeriodeTypes;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: ReservationType::class)]
    private Collection $reservationTypes;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
        $this->liaisonPeriodeTypes = new ArrayCollection();
        $this->reservationTypes = new ArrayCollection();
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
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->addType($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeType($this);
        }

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
            $tarifer->setType($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getType() === $this) {
                $tarifer->setType(null);
            }
        }

        return $this;
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
            $liaisonPeriodeType->setType($this);
        }

        return $this;
    }

    public function removeLiaisonPeriodeType(LiaisonPeriodeType $liaisonPeriodeType): self
    {
        if ($this->liaisonPeriodeTypes->removeElement($liaisonPeriodeType)) {
            // set the owning side to null (unless already changed)
            if ($liaisonPeriodeType->getType() === $this) {
                $liaisonPeriodeType->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationType>
     */
    public function getReservationTypes(): Collection
    {
        return $this->reservationTypes;
    }

    public function addReservationType(ReservationType $reservationType): self
    {
        if (!$this->reservationTypes->contains($reservationType)) {
            $this->reservationTypes->add($reservationType);
            $reservationType->setType($this);
        }

        return $this;
    }

    public function removeReservationType(ReservationType $reservationType): self
    {
        if ($this->reservationTypes->removeElement($reservationType)) {
            // set the owning side to null (unless already changed)
            if ($reservationType->getType() === $this) {
                $reservationType->setType(null);
            }
        }

        return $this;
    }
}
