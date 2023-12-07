<?php

namespace App\Entity;

use App\Repository\SprintMatchDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SprintMatchDataRepository::class)]
class SprintMatchData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $time = null;

    #[ORM\Column(length: 2)]
    private ?string $position = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?matches $matches = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?athletes $athletes = null;

    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, athletes>
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(athletes $athlete): static
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes->add($athlete);
        }

        return $this;
    }

    public function removeAthlete(athletes $athlete): static
    {
        $this->athletes->removeElement($athlete);

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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getMatches(): ?matches
    {
        return $this->matches;
    }

    public function setMatches(?matches $matches): static
    {
        $this->matches = $matches;

        return $this;
    }

    public function setAthletes(?athletes $athletes): static
    {
        $this->athletes = $athletes;

        return $this;
    }
}
