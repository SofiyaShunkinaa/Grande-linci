<?php

namespace App\Entity;

use App\Repository\KittenStatusRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\StatusType;

#[ORM\Entity(repositoryClass: KittenStatusRepository::class)]
class KittenStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, enumType: StatusType::class)]
    private ?StatusType $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?StatusType
    {
        return $this->status;
    }

    public function setStatus(StatusType $status): static
    {
        $this->status = $status;

        return $this;
    }
}
