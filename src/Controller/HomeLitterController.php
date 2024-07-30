<?php

namespace App\Controller;

use App\Entity\Litter;
use App\Form\HomeLitterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeLitterController extends AbstractController
{
    #[Route('/admin/select-active-litter', name: 'admin_select_litter')]
    public function selectLitter(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(HomeLitterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $litter = $data['litter'];
        } else {
            $litter = $em->getRepository(Litter::class)->findOneBy([], ['id' => 'DESC']);
        }

        return $this->render('admin/select_litter.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function viewLitter($id, EntityManagerInterface $em): Response
    {
        if ($id) {
            $litter = $em->getRepository(Litter::class)->find($id);
        } else {
            $litter = $em->getRepository(Litter::class)->findOneBy([], ['id' => 'DESC']);
        }

        if (!$litter) {
            throw $this->createNotFoundException('Litter not found');
        }

        return $this->render('home/litter/index.html.twig', [
            'litter' => $litter,
        ]);
    }
}
