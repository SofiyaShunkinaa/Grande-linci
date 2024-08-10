<?php

namespace App\Service;

use App\Entity\GuestRequest;
use App\Form\RequestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class GuestRequestService
{
    private EntityManagerInterface $entityManager;
    private Request $request;

    public function __construct(EntityManagerInterface $entityManager, Request $request)
    {
        $this->entityManager = $entityManager;
        $this->request = $request;
    }

    public function createAndHandleForm(): array
    {
        $guestRequest = new GuestRequest();
        $form = $this->createForm(RequestType::class, $guestRequest);
        $form->handleRequest($this->$request);
        
        if($form->isSubmitted() && $form->isValid()){
            $guestRequest->setRequestDate(new \DateTime());
            
            $this->entityManager->persist($guestRequest);
            $this->entityManager->flush();

            $this->addFlash('success', 'Your request has been submitted successfully.');
        }

        return ['form' => $form->createView()];
    }
}
