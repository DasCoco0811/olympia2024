<?php

namespace App\Entity;

use App\Repository\TimesSprintRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimesSprintRepository::class)]
class TimesSprint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Athletes $athlete = null;

    #[ORM\Column]
    private ?float $time = null;

    #[ORM\Column]
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

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setTime(float $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function isDisqualified(): ?bool
    {
        return $this->disqualified;
    }

    public function setDisqualified(bool $disqualified): static
    {
        $this->disqualified = $disqualified;

        return $this;
    }
}
