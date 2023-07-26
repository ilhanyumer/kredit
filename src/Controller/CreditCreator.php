<?php

namespace App\Controller;

use App\Entity\Credit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     *
     * @Route("/create-credit-action", methods={"POST"}, name="show_create_credit_action", priority=50)
     */
    public function createCredit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fullName = $request->get('full-name');
        $amount = $request->get('amount');
        $months = $request->get('months');
        $interestRate = 7.9;

        $credit = new Credit();
        $credit->setAmount($amount);
        $credit->setMonths($months);
        $credit->setInterestRate($interestRate);
        $credit->setFullName($fullName);

        $entityManager->persist($credit);
        $entityManager->flush();

        return $this->render('create-credit-action.html.twig', [
            'id' => $credit->getId(),
            'fullName' => $credit->getFullName(),
            'amount' => $credit->getAmount(),
            'months' => $credit->getMonths(),
            'interestRate' => $credit->getInterestRate()
        ]);
    }
}
