<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutBreedController extends AbstractController
{
    #[Route('/about-breed/main-coon', name: 'app_about_main_coon')]
    public function index(): Response
    {
        return $this->render('about_breed/main_coon.html.twig', [
            'controller_name' => 'AboutBreedController',
        ]);
    }
}
