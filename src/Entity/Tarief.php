<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TariefRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;



/**
 * @ApiResource(
 *     normalizationContext={"groups"={"tarief:read"}},
 *     denormalizationContext={"groups"={"tarief:write"}},
 * )
 * @ORM\Entity(repositoryClass=TariefRepository::class)
 * @ApiFilter(BooleanFilter::class, properties={"published"})
 * @ApiFilter(PropertyFilter::class)
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
     * @Groups({"tarief:read", "tarief:write", "vervoersmiddel:read", "verplaatsing:read", "vervoersmiddel:write", "vervoersmiddel:read"})
     */
    private $prijs;

    /**
     * @ORM\Column(type="date")
     * @Groups({"tarief:read", "tarief:write", "vervoersmiddel:write"})
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity=Vervoersmiddel::class, inversedBy="tarieven")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"tarief:read", "tarief:write", "vervoersmiddel:write"})
     */
    private $vervoersmiddel;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"vervoersmiddel:write", "verplaatsing:read"})
     */
    private $published;

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

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }
}
