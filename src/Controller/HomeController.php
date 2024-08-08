<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RequestType;
use App\Service\LitterService;
use App\Service\GuestRequestService;
use Doctrine\ORM\EntityManagerInterface;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LitterService $litterService, GuestRequestService $guestRequestService, Request $request): Response
    {
        [$litter, $mom, $dad] = $litterService->getLitter();   
        $kittens = $litterService->get5Kittens($litter);

        $formResult = $guestRequestService->createAndHandleForm($request);
        $formView = $formResult['form'];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'litter' => $litter,
            'kittens' => $kittens,
            'mother' => $mom,
            'father' => $dad,
            'form' => $form,
        ]);
    }
}
