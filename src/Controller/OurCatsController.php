<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OurCatsController extends AbstractController
{
    #[Route('/our-cats', name: 'app_our_cats')]
    public function index(): Response
    {
        return $this->render('our_cats/index.html.twig', [
            'controller_name' => 'OurCatsController',
        ]);
    }
}
