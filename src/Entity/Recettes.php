<?php

namespace App\Entity;

use App\Repository\RecettesRepository;
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
}
