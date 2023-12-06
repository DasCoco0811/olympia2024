<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountriesRepository::class)]
class Countries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $iso_2 = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $iso_3 = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'countries', targetEntity: Athletes::class)]
    private Collection $athletes;

    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIso2(): ?string
    {
        return $this->iso_2;
    }

    public function setIso2(string $iso_2): static
    {
        $this->iso_2 = $iso_2;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso_3;
    }

    public function setIso3(?string $iso_3): static
    {
        $this->iso_3 = $iso_3;

        return $this;
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
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athletes $athlete): static
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes->add($athlete);
            $athlete->setCountries($this);
        }

        return $this;
    }

    public function removeAthlete(Athletes $athlete): static
    {
        if ($this->athletes->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getCountries() === $this) {
                $athlete->setCountries(null);
            }
        }

        return $this;
    }
}
