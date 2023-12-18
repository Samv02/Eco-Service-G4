<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_produit = null;

    #[ORM\Column(length: 120)]
    private ?string $img_produit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $id_cat = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Marque $id_marque = null;

    #[ORM\OneToMany(mappedBy: 'id_produit', targetEntity: Construire::class)]
    private Collection $construires;

    #[ORM\OneToMany(mappedBy: 'id_produit', targetEntity: Composer::class)]
    private Collection $composers;

    public function __construct()
    {
        $this->construires = new ArrayCollection();
        $this->composers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): static
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getImgProduit(): ?string
    {
        return $this->img_produit;
    }

    public function setImgProduit(string $img_produit): static
    {
        $this->img_produit = $img_produit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdCat(): ?Categorie
    {
        return $this->id_cat;
    }

    public function setIdCat(?Categorie $id_cat): static
    {
        $this->id_cat = $id_cat;

        return $this;
    }

    public function getIdMarque(): ?Marque
    {
        return $this->id_marque;
    }

    public function setIdMarque(?Marque $id_marque): static
    {
        $this->id_marque = $id_marque;

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
            $construire->setIdProduit($this);
        }

        return $this;
    }

    public function removeConstruire(Construire $construire): static
    {
        if ($this->construires->removeElement($construire)) {
            // set the owning side to null (unless already changed)
            if ($construire->getIdProduit() === $this) {
                $construire->setIdProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Composer>
     */
    public function getComposers(): Collection
    {
        return $this->composers;
    }

    public function addComposer(Composer $composer): static
    {
        if (!$this->composers->contains($composer)) {
            $this->composers->add($composer);
            $composer->setIdProduit($this);
        }

        return $this;
    }

    public function removeComposer(Composer $composer): static
    {
        if ($this->composers->removeElement($composer)) {
            // set the owning side to null (unless already changed)
            if ($composer->getIdProduit() === $this) {
                $composer->setIdProduit(null);
            }
        }

        return $this;
    }
}
