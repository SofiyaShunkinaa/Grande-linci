<?php

namespace App\Entity;

use App\Repository\CatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatRepository::class)]
class Cat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $breedId = null;

    #[ORM\Column]
    private ?int $genderId = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getGenderId(): ?int
    {
        return $this->genderId;
    }

    public function setGenderId(int $genderId): static
    {
        $this->genderId = $genderId;

        return $this;
    }
}
