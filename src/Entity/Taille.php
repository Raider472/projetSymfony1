<?php

namespace App\Entity;

use App\Repository\TailleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TailleRepository::class)]
class Taille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\ManyToMany(targetEntity: Vetement::class, mappedBy: 'taille')]
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
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

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
            $vetement->addTaille($this);
        }

        return $this;
    }

    public function removeVetement(Vetement $vetement): static
    {
        if ($this->vetement->removeElement($vetement)) {
            $vetement->removeTaille($this);
        }

        return $this;
    }
}
