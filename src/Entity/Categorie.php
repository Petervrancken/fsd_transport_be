<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}}
 * )
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity=Vervoersmiddel::class, mappedBy="categorie")
     */
    private $vervoersmiddelen;

    public function __construct()
    {
        $this->vervoersmiddelen = new ArrayCollection();
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
            $vervoersmiddelen->setCategorie($this);
        }

        return $this;
    }

    public function removeVervoersmiddelen(Vervoersmiddel $vervoersmiddelen): self
    {
        if ($this->vervoersmiddelen->removeElement($vervoersmiddelen)) {
            // set the owning side to null (unless already changed)
            if ($vervoersmiddelen->getCategorie() === $this) {
                $vervoersmiddelen->setCategorie(null);
            }
        }

        return $this;
    }
}
