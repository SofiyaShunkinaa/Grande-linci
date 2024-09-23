<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\LitterService;


class AvailableKittensController extends AbstractController
{
    #[Route('/available-kittens', name: 'app_available_kittens')]
    public function index(LitterService $litterService): Response
    {
        $litters = $litterService->getAllLitters();
        $buttons = [];
        foreach($litters as $litter){
            $status = $litterService->getLitterStatus($litter);
            
            $buttons[] = [
                'name' => $litter->getName(),
                'id' => $litter->getId(),
                'status' => $status,
            ];
        }

        return $this->render('available_kittens/index.html.twig', [
            'controller_name' => 'AvailableKittensController',
            'buttons' => $buttons,
        ]);
    }
}
