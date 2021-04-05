<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="smallint")
     */
    private $admin;

    /**
     * @ORM\OneToMany(targetEntity=Verplaatsing::class, mappedBy="user")
     */
    private $verplaatsing;

    /**
     * @ORM\OneToMany(targetEntity=Veroersmiddel::class, mappedBy="user")
     */
    private $vervoersmiddel;

    public function __construct()
    {
        $this->verplaatsing = new ArrayCollection();
        $this->vervoersmiddel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAdmin(): ?int
    {
        return $this->admin;
    }

    public function setAdmin(int $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return Collection|Verplaatsing[]
     */
    public function getVerplaatsing(): Collection
    {
        return $this->verplaatsing;
    }

    public function addVerplaatsing(Verplaatsing $verplaatsing): self
    {
        if (!$this->verplaatsing->contains($verplaatsing)) {
            $this->verplaatsing[] = $verplaatsing;
            $verplaatsing->setUser($this);
        }

        return $this;
    }

    public function removeVerplaatsing(Verplaatsing $verplaatsing): self
    {
        if ($this->verplaatsing->removeElement($verplaatsing)) {
            // set the owning side to null (unless already changed)
            if ($verplaatsing->getUser() === $this) {
                $verplaatsing->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Veroersmiddel[]
     */
    public function getVervoersmiddel(): Collection
    {
        return $this->vervoersmiddel;
    }

    public function addVervoersmiddel(Veroersmiddel $vervoersmiddel): self
    {
        if (!$this->vervoersmiddel->contains($vervoersmiddel)) {
            $this->vervoersmiddel[] = $vervoersmiddel;
            $vervoersmiddel->setUser($this);
        }

        return $this;
    }

    public function removeVervoersmiddel(Veroersmiddel $vervoersmiddel): self
    {
        if ($this->vervoersmiddel->removeElement($vervoersmiddel)) {
            // set the owning side to null (unless already changed)
            if ($vervoersmiddel->getUser() === $this) {
                $vervoersmiddel->setUser(null);
            }
        }

        return $this;
    }
}
