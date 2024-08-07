<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\GuestRequest;
use App\Form\RequestType;
use App\Service\LitterService;
use Doctrine\ORM\EntityManagerInterface;


class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(LitterService $litterService, Request $request): Response
    {
        $litter = $litterService->getLitter();
        $kittens = $litterService->getKittens($litter);
        $mom = $litterService->getMom($litter);
        $dad = $litterService->getDad($litter);

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
