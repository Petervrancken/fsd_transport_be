<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TariefRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"tarief:read"}},
 *     denormalizationContext={"groups"={"tarief:write"}},
 * )
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
     * @ORM\Column(type="float")
     * @Groups({"tarief:read", "tarief:write", "vervoersmiddel:read"})
     */
    private $prijs;

    /**
     * @ORM\Column(type="date")
     * @Groups({"tarief:read", "tarief:write"})
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity=Vervoersmiddel::class, inversedBy="tarieven")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"tarief:read", "tarief:write"})
     */
    private $vervoersmiddel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(float $prijs): self
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

    public function getVervoersmiddel(): ?Vervoersmiddel
    {
        return $this->vervoersmiddel;
    }

    public function setVervoersmiddel(?Vervoersmiddel $vervoersmiddel): self
    {
        $this->vervoersmiddel = $vervoersmiddel;

        return $this;
    }
}
