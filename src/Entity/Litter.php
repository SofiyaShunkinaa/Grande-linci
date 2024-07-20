<?php

namespace App\Entity;

use App\Repository\LitterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LitterRepository::class)]
class Litter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $breedId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cat $catMotherId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cat $catFatherId = null;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getBreedId(): ?int
    {
        return $this->breedId;
    }

    public function setBreedId(int $breedId): static
    {
        $this->breedId = $breedId;

        return $this;
    }

    public function getCatMotherId(): ?Cat
    {
        return $this->catMotherId;
    }

    public function setCatMotherId(?Cat $catMotherId): static
    {
        $this->catMotherId = $catMotherId;

        return $this;
    }

    public function getCatFatherId(): ?Cat
    {
        return $this->catFatherId;
    }

    public function setCatFatherId(?Cat $catFatherId): static
    {
        $this->catFatherId = $catFatherId;

        return $this;
    }
}
