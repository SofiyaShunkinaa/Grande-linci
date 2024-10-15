<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\LitterService;
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
    public function index(LitterService $litterService, Request $request): Response
    {
        $litterData = $litterService->getLitter();

        $guestRequest = new GuestRequest();
        $form = $this->createForm(RequestType::class, $guestRequest);
        $form->handleRequest($request);
        
        if ($litterData === null) {
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
                'litter' => null,
                'kittens' => [],
                'mother' => null,
                'father' => null,
                'form' => $form->createView(),
            ]);
        }    

        [$litter, $mom, $dad] = $litterService->getLitter();   
        $kittens = $litterService->get5Kittens($litter);

        if($form->isSubmitted() && $form->isValid()){
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
