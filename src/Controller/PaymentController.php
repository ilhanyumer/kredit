<?php

namespace App\Controller;

use App\Entity\Credit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     *
     * @Route("/payment", name="show_payment", priority=50)
     */
    public function showPaymentForm(EntityManagerInterface $entityManager): Response
    {
        $credits = $entityManager->getRepository(Credit::class)->findAll();

        return $this->render('payment.html.twig', [
            'credits' => $credits
        ]);
    }

    /**
     *
     * @Route("/pay", methods={"POST"}, name="pay", priority=50)
     */
    public function pay(Request $request): Response
    {
        $creditId = $request->get('credit-id');
        $amount = $request->get('amount');
    }
}
