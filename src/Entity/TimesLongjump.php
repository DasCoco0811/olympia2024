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
    private ?float $distance1 = null;
    #[ORM\Column]
    private ?float $distance2 = null;
    #[ORM\Column]
    private ?float $distance3 = null;

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

    public function getDistance1(): ?float
    {
        return $this->distance1;
    }

    public function setDistance1(float $distance1): static
    {
        $this->distance1 = $distance1;

        return $this;
    }
    public function getDistance2(): ?float
    {
        return $this->distance2;
    }

    public function setDistance2(float $distance2): static
    {
        $this->distance2 = $distance2;

        return $this;
    }
    public function getDistance3(): ?float
    {
        return $this->distance3;
    }

    public function setDistance3(float $distance3): static
    {
        $this->distance3 = $distance3;

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
