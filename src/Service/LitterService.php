<?php

namespace App\Service;

use App\Entity\Litter;
use App\Repository\LitterRepository;
use App\Repository\KittenRepository;
use App\Repository\CatRepository;
use App\Entity\Cat;

class LitterService
{
    private LitterRepository $litterRepository;
    private KittenRepository $kittenRepository;
    private CatRepository $catRepository;

    public function __construct(LitterRepository $litterRepository, KittenRepository $kittenRepository, CatRepository $catRepository)
    {
        $this->litterRepository = $litterRepository;
        $this->kittenRepository = $kittenRepository;
        $this->catRepository = $catRepository;
    }

    public function getLitter(): ?Litter
    {
        return $this->litterRepository->findOneByIsActive();
    }

    public function getMom(Litter $litter): ?Cat
    {
        return $this->catRepository->findOneBy(['id' => $litter->getCatMother()]);
    }

    public function getDad(Litter $litter): ?Cat
    {
        return $this->catRepository->findOneBy(['id' => $litter->getCatFather()]);
    }

    public function get5Kittens(Litter $litter): array
    {
        return $this->kittenRepository->find5ByLitter($litter->getId());
    }
}
