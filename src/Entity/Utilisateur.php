<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $eMail_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $img_utilisateur = null;

    #[ORM\Column]
    private ?bool $actif_utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?Adresse $id_adresse
     = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): static
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): static
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getEMailUtilisateur(): ?string
    {
        return $this->eMail_utilisateur;
    }

    public function setEMailUtilisateur(string $eMail_utilisateur): static
    {
        $this->eMail_utilisateur = $eMail_utilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdp_utilisateur;
    }

    public function setMdpUtilisateur(string $mdp_utilisateur): static
    {
        $this->mdp_utilisateur = $mdp_utilisateur;

        return $this;
    }

    public function getImgUtilisateur(): ?string
    {
        return $this->img_utilisateur;
    }

    public function setImgUtilisateur(string $img_utilisateur): static
    {
        $this->img_utilisateur = $img_utilisateur;

        return $this;
    }

    public function isActifUtilisateur(): ?bool
    {
        return $this->actif_utilisateur;
    }

    public function setActifUtilisateur(bool $actif_utilisateur): static
    {
        $this->actif_utilisateur = $actif_utilisateur;

        return $this;
    }

    public function getIdCat(): ?Adresse
    {
        return $this->id_adresse;
    }

    public function setIdCat(?Adresse $id_adresse): static
    {
        $this->id_adresse = $id_adresse;

        return $this;
    }
}
