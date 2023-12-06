<?php

namespace App\Entity;

use App\Repository\TimesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimesRepository::class)]
class Times
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $time = null;

    #[ORM\ManyToOne(inversedBy: 'time')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sports $sports = null;

    #[ORM\ManyToOne(inversedBy: 'times')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Athletes $athletes = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSports(): ?Sports
    {
        return $this->sports;
    }

    public function setSports(?Sports $sports): static
    {
        $this->sports = $sports;

        return $this;
    }

    public function getAthletes(): ?Athletes
    {
        return $this->athletes;
    }

    public function setAthletes(?Athletes $athletes): static
    {
        $this->athletes = $athletes;

        return $this;
    }
}
