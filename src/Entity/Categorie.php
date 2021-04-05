<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
     * @ORM\OneToMany(targetEntity=Veroersmiddel::class, mappedBy="categorie")
     */
    private $vervoersmiddel;

    public function __construct()
    {
        $this->vervoersmiddel = new ArrayCollection();
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
            $vervoersmiddel->setCategorie($this);
        }

        return $this;
    }

    public function removeVervoersmiddel(Veroersmiddel $vervoersmiddel): self
    {
        if ($this->vervoersmiddel->removeElement($vervoersmiddel)) {
            // set the owning side to null (unless already changed)
            if ($vervoersmiddel->getCategorie() === $this) {
                $vervoersmiddel->setCategorie(null);
            }
        }

        return $this;
    }
}
