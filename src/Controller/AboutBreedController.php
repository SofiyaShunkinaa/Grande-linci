<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutBreedController extends AbstractController
{
    #[Route('/about-breed', name: 'app_about_breed')]
    public function index(): Response
    {
        return $this->render('about_breed/index.html.twig', [
            'controller_name' => 'AboutBreedController',
        ]);
    }
}
