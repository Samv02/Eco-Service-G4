<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numRue_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRue_adresse = null;

    #[ORM\Column]
    private ?int $CodePostal_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $pays_adresse = null;

    #[ORM\OneToMany(mappedBy: 'id_cat', targetEntity: Utilisateur::class)]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRueAdresse(): ?int
    {
        return $this->numRue_adresse;
    }

    public function setNumRueAdresse(int $numRue_adresse): static
    {
        $this->numRue_adresse = $numRue_adresse;

        return $this;
    }

    public function getNomRueAdresse(): ?string
    {
        return $this->nomRue_adresse;
    }

    public function setNomRueAdresse(string $nomRue_adresse): static
    {
        $this->nomRue_adresse = $nomRue_adresse;

        return $this;
    }

    public function getCodePostalAdresse(): ?int
    {
        return $this->CodePostal_adresse;
    }

    public function setCodePostalAdresse(int $CodePostal_adresse): static
    {
        $this->CodePostal_adresse = $CodePostal_adresse;

        return $this;
    }

    public function getVilleAdresse(): ?string
    {
        return $this->Ville_adresse;
    }

    public function setVilleAdresse(string $Ville_adresse): static
    {
        $this->Ville_adresse = $Ville_adresse;

        return $this;
    }

    public function getPaysAdresse(): ?string
    {
        return $this->pays_adresse;
    }

    public function setPaysAdresse(string $pays_adresse): static
    {
        $this->pays_adresse = $pays_adresse;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setIdCat($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getIdCat() === $this) {
                $utilisateur->setIdCat(null);
            }
        }

        return $this;
    }
}
