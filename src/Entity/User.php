<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_utilisateur = null;

    #[ORM\Column]
    private ?bool $actif_utilisateur = null;

    #[ORM\Column]
    private ?array $roles = [];

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Adresse $id_adresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

     /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function isActifUtilisateur(): ?bool
    {
        return $this->actif_utilisateur;
    }

    public function setActifUtilisateur(bool $actif_utilisateur): static
    {
        $this->actif_utilisateur = $actif_utilisateur;

        return $this;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getIdAdresse(): ?Adresse
    {
        return $this->id_adresse;
    }

    public function setIdAdresse(?Adresse $id_adresse): static
    {
        $this->id_adresse = $id_adresse;

        return $this;
    }
}
