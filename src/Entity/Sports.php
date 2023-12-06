<?php

namespace App\Entity;

use App\Repository\SportsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportsRepository::class)]
class Sports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'sports', targetEntity: Athletes::class)]
    private Collection $ath�lete;

    #[ORM\OneToMany(mappedBy: 'sports', targetEntity: Times::class)]
    private Collection $time;

    #[ORM\Column(length: 511, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->ath�lete = new ArrayCollection();
        $this->time = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Athletes>
     */
    public function getAth�lete(): Collection
    {
        return $this->ath�lete;
    }

    public function addAthLete(Athletes $athLete): static
    {
        if (!$this->ath�lete->contains($athLete)) {
            $this->ath�lete->add($athLete);
            $athLete->setSports($this);
        }

        return $this;
    }

    public function removeAthLete(Athletes $athLete): static
    {
        if ($this->ath�lete->removeElement($athLete)) {
            // set the owning side to null (unless already changed)
            if ($athLete->getSports() === $this) {
                $athLete->setSports(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Times>
     */
    public function getTime(): Collection
    {
        return $this->time;
    }

    public function addTime(Times $time): static
    {
        if (!$this->time->contains($time)) {
            $this->time->add($time);
            $time->setSports($this);
        }

        return $this;
    }

    public function removeTime(Times $time): static
    {
        if ($this->time->removeElement($time)) {
            // set the owning side to null (unless already changed)
            if ($time->getSports() === $this) {
                $time->setSports(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
