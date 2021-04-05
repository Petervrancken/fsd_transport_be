<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TariefRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TariefRepository::class)
 */
class Tarief
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prijs;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity=Veroersmiddel::class, inversedBy="tarief")
     * @ORM\JoinColumn(nullable=false)
     */
    private $veroersmiddel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getVeroersmiddel(): ?Veroersmiddel
    {
        return $this->veroersmiddel;
    }

    public function setVeroersmiddel(?Veroersmiddel $veroersmiddel): self
    {
        $this->veroersmiddel = $veroersmiddel;

        return $this;
    }
}
