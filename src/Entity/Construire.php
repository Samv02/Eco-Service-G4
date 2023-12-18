<?php

namespace App\Entity;

use App\Repository\ConstruireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstruireRepository::class)]
class Construire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'construires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recettes $id_recette = null;

    #[ORM\ManyToOne(inversedBy: 'construires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $id_produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRecette(): ?Recettes
    {
        return $this->id_recette;
    }

    public function setIdRecette(?Recettes $id_recette): static
    {
        $this->id_recette = $id_recette;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?Produit $id_produit): static
    {
        $this->id_produit = $id_produit;

        return $this;
    }
}
