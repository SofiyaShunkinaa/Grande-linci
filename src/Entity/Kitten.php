<?php

namespace App\Entity;

use App\Repository\KittenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KittenRepository::class)]
class Kitten
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Breed $breedId = null;

    #[ORM\Column(length: 255)]
    private ?string $KittenStatus = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gender $genderId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $ColorId = null;

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

    public function getBreedId(): ?Breed
    {
        return $this->breedId;
    }

    public function setBreedId(?Breed $breedId): static
    {
        $this->breedId = $breedId;

        return $this;
    }

    public function getKittenStatus(): ?string
    {
        return $this->KittenStatus;
    }

    public function setKittenStatus(string $KittenStatus): static
    {
        $this->KittenStatus = $KittenStatus;

        return $this;
    }

    public function getGenderId(): ?Gender
    {
        return $this->genderId;
    }

    public function setGenderId(?Gender $genderId): static
    {
        $this->genderId = $genderId;

        return $this;
    }

    public function getColorId(): ?Color
    {
        return $this->ColorId;
    }

    public function setColorId(?Color $ColorId): static
    {
        $this->ColorId = $ColorId;

        return $this;
    }
}
