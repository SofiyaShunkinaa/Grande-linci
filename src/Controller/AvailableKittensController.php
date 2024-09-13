<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AvailableKittensController extends AbstractController
{
    #[Route('/available-kittens', name: 'app_available_kittens')]
    public function index(): Response
    {
        return $this->render('available_kittens/index.html.twig', [
            'controller_name' => 'AvailableKittensController',
        ]);
    }
}
