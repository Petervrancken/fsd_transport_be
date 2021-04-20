<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VervoersmiddelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get","post"},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"vervoersmiddel:read", "vervoersmiddel:item:get"}}
 *     },
 *          "put"
 *     },
 *     normalizationContext={"groups"={"vervoersmiddel:read"}},
 *     denormalizationContext={"groups"={"vervoersmiddel:write"}},
 * )
 * @ORM\Entity(repositoryClass=VervoersmiddelRepository::class)
 */
class Vervoersmiddel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"vervoersmiddel:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vervoersmiddel:read", "vervoersmiddel:write", "verplaatsing:read"})
     */
    private $naam;

    /**
     * @ORM\OneToMany(targetEntity=Verplaatsing::class, mappedBy="vervoersmiddel")
     */
    private $verplaatsingen;

    /**
     * @ORM\OneToMany(targetEntity=Tarief::class, mappedBy="vervoersmiddel", cascade={"persist"} )
     * @Groups ({"verplaatsing:read","vervoersmiddel:write"})
     */
    private $tarieven;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vervoersmiddelen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"vervoersmiddel:write"})
     * @Assert\Valid()
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="vervoersmiddelen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"vervoersmiddel:write"})
     */
    private $categorie;

    public function __construct()
    {
        $this->verplaatsingen = new ArrayCollection();
        $this->tarieven = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $verplaatsingen->setVervoersmiddel($this);
        }

        return $this;
    }

    public function removeVerplaatsingen(Verplaatsing $verplaatsingen): self
    {
        if ($this->verplaatsingen->removeElement($verplaatsingen)) {
            // set the owning side to null (unless already changed)
            if ($verplaatsingen->getVervoersmiddel() === $this) {
                $verplaatsingen->setVervoersmiddel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tarief[]
     */
    public function getTarieven(): Collection
    {
        return $this->tarieven;
    }

    public function addTarieven(Tarief $tarieven): self
    {
        if (!$this->tarieven->contains($tarieven)) {
            $this->tarieven[] = $tarieven;
            $tarieven->setVervoersmiddel($this);
        }

        return $this;
    }

    public function removeTarieven(Tarief $tarieven): self
    {
        if ($this->tarieven->removeElement($tarieven)) {
            // set the owning side to null (unless already changed)
            if ($tarieven->getVervoersmiddel() === $this) {
                $tarieven->setVervoersmiddel(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
