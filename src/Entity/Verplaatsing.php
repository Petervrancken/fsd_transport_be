<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VerplaatsingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VerplaatsingRepository::class)
 */
class Verplaatsing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="integer")
     */
    private $km_start;

    /**
     * @ORM\Column(type="integer")
     */
    private $km_stop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loc_start;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loc_stop;

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
        return $this->km_start;
    }

    public function setKmStart(int $km_start): self
    {
        $this->km_start = $km_start;

        return $this;
    }

    public function getKmStop(): ?int
    {
        return $this->km_stop;
    }

    public function setKmStop(int $km_stop): self
    {
        $this->km_stop = $km_stop;

        return $this;
    }

    public function getLocStart(): ?string
    {
        return $this->loc_start;
    }

    public function setLocStart(string $loc_start): self
    {
        $this->loc_start = $loc_start;

        return $this;
    }

    public function getLocStop(): ?string
    {
        return $this->loc_stop;
    }

    public function setLocStop(string $loc_stop): self
    {
        $this->loc_stop = $loc_stop;

        return $this;
    }
}
