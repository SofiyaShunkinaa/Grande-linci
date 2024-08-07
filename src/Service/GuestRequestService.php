<?php

namespace App\Service;

use App\Entity\GuestRequest;
use App\Form\RequestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class GuestRequestService
{
    private EntityManagerInterface $entityManager;
    private FormFactoryInterface $formFactory;
    private FlashBagInterface $flashBag;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, FlashBagInterface $flashBag)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->flashBag = $flashBag;
    }

    public function createAndHandleForm(Request $request): array
    {
        $guestRequest = new GuestRequest();
        $form = $this->formFactory->create(RequestType::class, $guestRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guestRequest->setRequestDate(new \DateTime());

            $this->entityManager->persist($guestRequest);
            $this->entityManager->flush();

            $this->flashBag->add('success', 'Your request has been submitted successfully.');
        }

        return ['form' => $form->createView(), 'guestRequest' => $guestRequest];
    }
}
