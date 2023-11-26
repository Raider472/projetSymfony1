<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Vetement::class)]
    private Collection $vetement;

    public function __construct()
    {
        $this->vetement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Vetement>
     */
    public function getVetement(): Collection
    {
        return $this->vetement;
    }

    public function addVetement(Vetement $vetement): static
    {
        if (!$this->vetement->contains($vetement)) {
            $this->vetement->add($vetement);
            $vetement->setMarque($this);
        }

        return $this;
    }

    public function removeVetement(Vetement $vetement): static
    {
        if ($this->vetement->removeElement($vetement)) {
            // set the owning side to null (unless already changed)
            if ($vetement->getMarque() === $this) {
                $vetement->setMarque(null);
            }
        }

        return $this;
    }
}
