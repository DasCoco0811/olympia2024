<?php

namespace App\Entity;

use App\Repository\TimesLongjumpRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimesLongjumpRepository::class)]
class TimesLongjump
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Athletes $athlete = null;

    #[ORM\Column]
    private ?float $distance = null;

    #[ORM\Column(nullable: true)]
    private ?float $penalty = null;

    #[ORM\Column(nullable: true)]
    private ?bool $disqualified = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAthlete(): ?Athletes
    {
        return $this->athlete;
    }

    public function setAthlete(?Athletes $athlete): static
    {
        $this->athlete = $athlete;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): static
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPenalty(): ?float
    {
        return $this->penalty;
    }

    public function setPenalty(?float $penalty): static
    {
        $this->penalty = $penalty;

        return $this;
    }

    public function isDisqualified(): ?bool
    {
        return $this->disqualified;
    }

    public function setDisqualified(?bool $disqualified): static
    {
        $this->disqualified = $disqualified;

        return $this;
    }
}
