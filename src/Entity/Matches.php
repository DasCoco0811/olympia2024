<?php

namespace App\Entity;

use App\Repository\MatchesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchesRepository::class)]
class Matches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1)]
    private ?string $sex = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?sports $sport = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getSport(): ?sports
    {
        return $this->sport;
    }

    public function setSport(?sports $sport): static
    {
        $this->sport = $sport;

        return $this;
    }
}
