<?php

namespace App\Entity;

use App\Repository\LierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LierRepository::class)]
class Lier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'liers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $id_ticket = null;

    #[ORM\ManyToOne(inversedBy: 'liers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $id_user = null;

    #[ORM\ManyToOne(inversedBy: 'liers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $id_commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTicket(): ?Ticket
    {
        return $this->id_ticket;
    }

    public function setIdTicket(?Ticket $id_ticket): static
    {
        $this->id_ticket = $id_ticket;

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

    public function getIdCommande(): ?Commande
    {
        return $this->id_commande;
    }

    public function setIdCommande(?Commande $id_commande): static
    {
        $this->id_commande = $id_commande;

        return $this;
    }
}
