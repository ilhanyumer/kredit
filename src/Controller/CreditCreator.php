<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreditCreator extends AbstractController
{
    /**
     *
     * @Route("/create-credit", name="show_create_credit", priority=50)
     */
    public function showCreditCreatorForm(): Response
    {
        return $this->render('credit-create-form.html.twig', [
            'one' => "one",
            'two' => "two"
        ]);
    }
}
