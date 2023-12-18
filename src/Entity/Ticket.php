<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'id_ticket', targetEntity: Lier::class)]
    private Collection $liers;

    public function __construct()
    {
        $this->liers = new ArrayCollection();
    }

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
            $lier->setIdTicket($this);
        }

        return $this;
    }

    public function removeLier(Lier $lier): static
    {
        if ($this->liers->removeElement($lier)) {
            // set the owning side to null (unless already changed)
            if ($lier->getIdTicket() === $this) {
                $lier->setIdTicket(null);
            }
        }

        return $this;
    }
}
