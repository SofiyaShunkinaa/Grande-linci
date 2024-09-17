<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CatService;

class OurCatsController extends AbstractController
{
    #[Route('/our-cats', name: 'app_our_cats')]
    public function index(CatService $catService): Response
    {
        $females = $catService->getFemaleCats();
        $males = $catService->getMaleCats();
        $catsCount = count($females)+count($males);
           

        return $this->render('our_cats/index.html.twig', [
            'controller_name' => 'OurCatsController',
            'females' => $females,
            'males' => $males,
            'count' => $catsCount,
        ]);
    }
}
