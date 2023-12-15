<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_ticket = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu_ticket = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTicket(): ?string
    {
        return $this->nom_ticket;
    }

    public function setNomTicket(string $nom_ticket): static
    {
        $this->nom_ticket = $nom_ticket;

        return $this;
    }

    public function getContenuTicket(): ?string
    {
        return $this->contenu_ticket;
    }

    public function setContenuTicket(string $contenu_ticket): static
    {
        $this->contenu_ticket = $contenu_ticket;

        return $this;
    }

    public function getRelation(): ?Type
    {
        return $this->relation;
    }

    public function setRelation(?Type $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
