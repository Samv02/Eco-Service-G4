<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Utilisateur $id_user = null;

    #[ORM\OneToMany(mappedBy: 'id_commande', targetEntity: Composer::class)]
    private Collection $composers;

    #[ORM\OneToMany(mappedBy: 'id_commande', targetEntity: Lier::class)]
    private Collection $liers;

    #[ORM\Column]
    private ?int $qte_produit = null;

    public function __construct()
    {
        $this->composers = new ArrayCollection();
        $this->liers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->id_user;
    }

    public function setIdUser(?Utilisateur $id_user): static
    {
        $this->id_user = $id_user;

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
            $composer->setIdCommande($this);
        }

        return $this;
    }

    public function removeComposer(Composer $composer): static
    {
        if ($this->composers->removeElement($composer)) {
            // set the owning side to null (unless already changed)
            if ($composer->getIdCommande() === $this) {
                $composer->setIdCommande(null);
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
            $lier->setIdCommande($this);
        }

        return $this;
    }

    public function removeLier(Lier $lier): static
    {
        if ($this->liers->removeElement($lier)) {
            // set the owning side to null (unless already changed)
            if ($lier->getIdCommande() === $this) {
                $lier->setIdCommande(null);
            }
        }

        return $this;
    }

    public function getQteProduit(): ?int
    {
        return $this->qte_produit;
    }

    public function setQteProduit(int $qte_produit): static
    {
        $this->qte_produit = $qte_produit;

        return $this;
    }
}
