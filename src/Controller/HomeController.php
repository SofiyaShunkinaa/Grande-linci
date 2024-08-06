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
use Symfony\Component\HttpFoundation\Request;
use App\Entity\GuestRequest;
use App\Form\RequestType;

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(LitterRepository $litterRepository, KittenRepository $kittenRepository, CatRepository $catRepository, Request $request): Response
    {
        $litter = $litterRepository->findOneByIsActive();
        $kittens = $kittenRepository->find5ByLitter($litter->getId());
        $mom = $catRepository->findOneBy(['id'=>$litter->getCatMother()]);
        $dad = $catRepository->findOneBy(['id'=>$litter->getCatFather()]);

        $guestRequest = new GuestRequest();
        $form = $this->createForm(RequestType::class, $guestRequest);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $guestRequest->setRequestDate(new \DateTime());
            
            $this->entityManager->persist($guestRequest);
            $this->entityManager->flush();

            $this->addFlash('success', 'Your request has been submitted successfully.');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'litter' => $litter,
            'kittens' => $kittens,
            'mother' => $mom,
            'father' => $dad,
            'form' => $form->createView(),
        ]);
    }
}
