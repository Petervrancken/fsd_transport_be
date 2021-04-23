<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VerplaatsingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"verplaatsing:read"}},
 *     denormalizationContext={"groups"={"verplaatsing:write"}}
 * )
 *
 * @ORM\Entity(repositoryClass=VerplaatsingRepository::class)
 * @ApiFilter(RangeFilter::class, properties={"datum"})
 * @ApiFilter(OrderFilter::class, properties={"datum"})
 * @ApiFilter(SearchFilter::class, properties={"user.id": "partial"})
 * @ApiFilter(BooleanFilter::class, properties={"vervoersmiddel.tarieven.published"})
 */
class Verplaatsing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"verplaatsing:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"verplaatsing:read", "verplaatsing:write", "vervoersmiddel:item:get"})
     * @Assert\NotBlank(
     *    message="Verplicht in te vullen"
     * )
     */
    private $datum;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"verplaatsing:read", "verplaatsing:write"})
     * @Assert\NotBlank (
     *     message="Verplicht in te vullen"
     * )
     */
    private $kmStart;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"verplaatsing:read", "verplaatsing:write"})
     * @Assert\NotBlank (
     *     message="Verplicht in te vullen"
     * )
     */
    private $kmStop;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"verplaatsing:read", "verplaatsing:write", "vervoersmiddel:item:get"})
     * @Assert\NotBlank (
     *     message="Verplicht in te vullen"
     * )
     */
    private $locStart;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"verplaatsing:read", "verplaatsing:write", "vervoersmiddel:item:get"})
     * @Assert\NotBlank (
     *     message="Verplicht in te vullen"
     * )
     */
    private $locStop;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="verplaatsingen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"verplaatsing:read", "verplaatsing:write"})
     */
    private $user;

    /**
     * iri="vervoersmiddels"
     * @ORM\ManyToOne(targetEntity=Vervoersmiddel::class, inversedBy="verplaatsingen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"verplaatsing:read", "verplaatsing:write"})
     *
     */
    private $vervoersmiddel;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getKmStart(): ?int
    {
        return $this->kmStart;
    }

    public function setKmStart(int $kmStart): self
    {
        $this->kmStart = $kmStart;

        return $this;
    }

    public function getKmStop(): ?int
    {
        return $this->kmStop;
    }

    public function setKmStop(int $kmStop): self
    {
        $this->kmStop = $kmStop;

        return $this;
    }

    public function getLocStart(): ?string
    {
        return $this->locStart;
    }

    public function setLocStart(string $locStart): self
    {
        $this->locStart = $locStart;

        return $this;
    }

    public function getLocStop(): ?string
    {
        return $this->locStop;
    }

    public function setLocStop(string $locStop): self
    {
        $this->locStop = $locStop;

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
