<?php

namespace App\Entity;

use App\Repository\RecettesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecettesRepository::class)]
class Recettes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_recette = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $desc_recette = null;

    #[ORM\Column(length: 255)]
    private ?string $img_recette = null;

    #[ORM\OneToMany(mappedBy: 'id_recette', targetEntity: Construire::class)]
    private Collection $construires;

    public function __construct()
    {
        $this->construires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRecette(): ?string
    {
        return $this->nom_recette;
    }

    public function setNomRecette(string $nom_recette): static
    {
        $this->nom_recette = $nom_recette;

        return $this;
    }

    public function getDescRecette(): ?string
    {
        return $this->desc_recette;
    }

    public function setDescRecette(string $desc_recette): static
    {
        $this->desc_recette = $desc_recette;

        return $this;
    }

    public function getImgRecette(): ?string
    {
        return $this->img_recette;
    }

    public function setImgRecette(string $img_recette): static
    {
        $this->img_recette = $img_recette;

        return $this;
    }

    /**
     * @return Collection<int, Construire>
     */
    public function getConstruires(): Collection
    {
        return $this->construires;
    }

    public function addConstruire(Construire $construire): static
    {
        if (!$this->construires->contains($construire)) {
            $this->construires->add($construire);
            $construire->setIdRecette($this);
        }

        return $this;
    }

    public function removeConstruire(Construire $construire): static
    {
        if ($this->construires->removeElement($construire)) {
            // set the owning side to null (unless already changed)
            if ($construire->getIdRecette() === $this) {
                $construire->setIdRecette(null);
            }
        }

        return $this;
    }
}
