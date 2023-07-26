<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     *
     * @Route("/payment", name="show_payment", priority=50)
     */
    public function showPaymentForm(): Response
    {
        return $this->render('payment.html.twig');
    }
}
