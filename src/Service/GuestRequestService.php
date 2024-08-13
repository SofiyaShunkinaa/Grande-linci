<?php

namespace App\Service;

use App\Entity\GuestRequest;
use App\Form\RequestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GuestRequestService
{
    private EntityManagerInterface $entityManager;
    private FormFactoryInterface $formFactory;
    private SessionInterface $session;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory, SessionInterface $session)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->session = $session;
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

            $this->session->getFlashBag()->add('success', 'Your request has been submitted successfully.');
        }

        return ['form' => $form->createView(), 'guestRequest' => $guestRequest];
    }
}
