<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}}
 * )
 * @UniqueEntity(fields={"email"})
 */

// userinterface iets met wachtwoorden kan geimplementeerd worden

class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"vervoersmiddel:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read", "user:write"})
     * @Assert\NotBlank(
     *     message="Verplicht in te vullen"
     * )
     * @Assert\Email(
     *     message="Geen geldig e-mail adres"
     * )
     */
    private $email;

    /*
    /**
     * @ORM\Column(type="json")
     *
     *
    private $roles = [];
    */

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user:write"})
     * @Assert\Length(
     *     min=7,
     *
     *     minMessage="Wachtwoord moet minstens 6 tekens bevatten",
     *
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write", "verplaatsing:read"})
     * @Assert\NotBlank(
     *     message="Veld verplicht invulLen"
     * )
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write", "verplaatsing:read"})
     * @Assert\NotBlank(
     *     message="Veld verplicht invullen"
     * )
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user:read", "user:write"})
     */
    private $photo;

    /**
     * @ORM\Column(type="smallint")
     * @Groups({"user:read"})
     * @Assert\NotBlank()
     */
    private $admin = 2;

    /**
     * @ORM\OneToMany(targetEntity=Verplaatsing::class, mappedBy="user")
     * @Assert\NotBlank(
     *   message="Veld verplicht invullen"
     *  )
     */
    private $verplaatsingen;

    /**
     * @ORM\OneToMany(targetEntity=Vervoersmiddel::class, mappedBy="user")
     * @Assert\NotBlank(
     *   message="Voer voertuig in"
     * )
     */
    private $vervoersmiddelen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user:read", "user:write"})
     * @Assert\NotBlank (
     *     message="Verplicht in te vullen"
     * )
     */
    private $Functie;

    public function __construct()
    {
        $this->verplaatsingen = new ArrayCollection();
        $this->vervoersmiddelen = new ArrayCollection();
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
        /*
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);*/
        
        return [];
    }

    public function setRoles(array $roles): self
    {
        /*
        $this->roles = $roles;

        return $this;*/
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

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
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
    public function getVerplaatsingen(): Collection
    {
        return $this->verplaatsingen;
    }

    public function addVerplaatsingen(Verplaatsing $verplaatsingen): self
    {
        if (!$this->verplaatsingen->contains($verplaatsingen)) {
            $this->verplaatsingen[] = $verplaatsingen;
            $verplaatsingen->setUser($this);
        }

        return $this;
    }

    public function removeVerplaatsingen(Verplaatsing $verplaatsingen): self
    {
        if ($this->verplaatsingen->removeElement($verplaatsingen)) {
            // set the owning side to null (unless already changed)
            if ($verplaatsingen->getUser() === $this) {
                $verplaatsingen->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vervoersmiddel[]
     */
    public function getVervoersmiddelen(): Collection
    {
        return $this->vervoersmiddelen;
    }

    public function addVervoersmiddelen(Vervoersmiddel $vervoersmiddelen): self
    {
        if (!$this->vervoersmiddelen->contains($vervoersmiddelen)) {
            $this->vervoersmiddelen[] = $vervoersmiddelen;
            $vervoersmiddelen->setUser($this);
        }

        return $this;
    }

    public function removeVervoersmiddelen(Vervoersmiddel $vervoersmiddelen): self
    {
        if ($this->vervoersmiddelen->removeElement($vervoersmiddelen)) {
            // set the owning side to null (unless already changed)
            if ($vervoersmiddelen->getUser() === $this) {
                $vervoersmiddelen->setUser(null);
            }
        }

        return $this;
    }

    public function getFunctie(): ?string
    {
        return $this->Functie;
    }

    public function setFunctie(?string $Functie): self
    {
        $this->Functie = $Functie;

        return $this;
    }
}
