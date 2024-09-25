<?php

namespace App\Service;

use App\Repository\CatRepository;
use App\Entity\Cat;

class CatService
{
    private CatRepository $catRepository;

    public function __construct(CatRepository $catRepository)
    {
        $this->catRepository = $catRepository;
    }

    public function getMaleCats(): ?array
    {
        $maleCats = $this->catRepository->findByGender('1');

        if(!$maleCats){
            return null;
        }

        return $maleCats;
    }

    public function getFemaleCats(): ?array
    {
        $femaleCats = $this->catRepository->findByGender('2');

        if(!$femaleCats){
            return null;
        }

        return $femaleCats;
    }

}