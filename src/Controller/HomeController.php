<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Litter;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\LitterRepository;
use App\Repository\KittenRepository;
use App\Repository\CatRepository;

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(LitterRepository $litterRepository, KittenRepository $kittenRepository, CatRepository $catRepository): Response
    {
        $litter = $litterRepository->findOneByIsActive();
        $kittens = $kittenRepository->find4ByLitter($litter->getId());
        $mom = $catRepository->findOneBy(['id'=>$litter->getCatMother()]);
        $dad = $catRepository->findOneBy(['id'=>$litter->getCatFather()]);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'litter' => $litter,
            'kittens' => $kittens,
            'mother' => $mom,
            'father' => $dad,
        ]);
    }
}
