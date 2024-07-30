<?php

namespace App\Entity;

use App\Repository\SliderImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SliderImageRepository::class)]
class SliderImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $img1 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $img2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $img3 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $img4 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $img5 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg1(): ?string
    {
        return $this->img1;
    }

    public function setImg1(string $img1): static
    {
        $this->img1 = $img1;

        return $this;
    }

    public function getImg2(): ?string
    {
        return $this->img2;
    }

    public function setImg2(string $img2): static
    {
        $this->img2 = $img2;

        return $this;
    }

    public function getImg3(): ?string
    {
        return $this->img3;
    }

    public function setImg3(string $img3): static
    {
        $this->img3 = $img3;

        return $this;
    }

    public function getImg4(): ?string
    {
        return $this->img4;
    }

    public function setImg4(string $img4): static
    {
        $this->img4 = $img4;

        return $this;
    }

    public function getImg5(): ?string
    {
        return $this->img5;
    }

    public function setImg5(string $img5): static
    {
        $this->img5 = $img5;

        return $this;
    }
}
