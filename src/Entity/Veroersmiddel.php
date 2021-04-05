<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VeroersmiddelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VeroersmiddelRepository::class)
 */
class Veroersmiddel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\ManyToMany(targetEntity=Verplaatsing::class, inversedBy="veroersmiddels")
     */
    private $verplaatsing;

    /**
     * @ORM\OneToMany(targetEntity=Tarief::class, mappedBy="veroersmiddel")
     */
    private $tarief;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="vervoersmiddel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vervoersmiddel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->verplaatsing = new ArrayCollection();
        $this->tarief = new ArrayCollection();
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
    public function getVerplaatsing(): Collection
    {
        return $this->verplaatsing;
    }

    public function addVerplaatsing(Verplaatsing $verplaatsing): self
    {
        if (!$this->verplaatsing->contains($verplaatsing)) {
            $this->verplaatsing[] = $verplaatsing;
        }

        return $this;
    }

    public function removeVerplaatsing(Verplaatsing $verplaatsing): self
    {
        $this->verplaatsing->removeElement($verplaatsing);

        return $this;
    }

    /**
     * @return Collection|Tarief[]
     */
    public function getTarief(): Collection
    {
        return $this->tarief;
    }

    public function addTarief(Tarief $tarief): self
    {
        if (!$this->tarief->contains($tarief)) {
            $this->tarief[] = $tarief;
            $tarief->setVeroersmiddel($this);
        }

        return $this;
    }

    public function removeTarief(Tarief $tarief): self
    {
        if ($this->tarief->removeElement($tarief)) {
            // set the owning side to null (unless already changed)
            if ($tarief->getVeroersmiddel() === $this) {
                $tarief->setVeroersmiddel(null);
            }
        }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
