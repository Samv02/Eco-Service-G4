<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Lier::class)]
    private Collection $liers;

    #[ORM\Column]
    private ?bool $role = null;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->liers = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setIdUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getIdUser() === $this) {
                $commande->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lier>
     */
    public function getLiers(): Collection
    {
        return $this->liers;
    }

    public function addLier(Lier $lier): static
    {
        if (!$this->liers->contains($lier)) {
            $this->liers->add($lier);
            $lier->setIdUser($this);
        }

        return $this;
    }

    public function removeLier(Lier $lier): static
    {
        if ($this->liers->removeElement($lier)) {
            // set the owning side to null (unless already changed)
            if ($lier->getIdUser() === $this) {
                $lier->setIdUser(null);
            }
        }

        return $this;
    }

    public function isRole(): ?bool
    {
        return $this->role;
    }

    public function setRole(bool $role): static
    {
        $this->role = $role;

        return $this;
    }
}
