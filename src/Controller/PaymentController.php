<?php

namespace App\Controller;

use App\Entity\Credit;
use App\Entity\Payment;
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
    public function pay(Request $request, EntityManagerInterface $entityManager): Response
    {
        $creditId = $request->get('credit-id');
        $paidAmount = $request->get('amount');

        $credit = $entityManager->getRepository(Credit::class)->findOneBy(['id' => $creditId]);
        $creditAmount = $credit->getAmount();
        $creditMonths = $credit->getMonths();
        $creditInterestRate = $credit->getInterestRate();

        $paymentsOfACredit = $entityManager->getRepository(Payment::class)->findBy(['credit_id' => $creditId]);
        $previouslyTotalPaid = 0;
        foreach ($paymentsOfACredit as $payment) {
            $previouslyTotalPaid += $payment->getPaymentAmount();
        }

        $interestAmountEachYear = $creditAmount * $creditInterestRate / 100;
        $monthsInAYear = 12;
        $interestAmountEachMonth = $interestAmountEachYear / $monthsInAYear;
        $interestAmountInTotal = $creditMonths * $interestAmountEachMonth;
        $finalTotalNeededToPay = $creditAmount + $interestAmountInTotal;

        $paidAmountTotalWillBe = $previouslyTotalPaid + $paidAmount;
        $returnAmount = 0;
        $paidIncludingNowAmount = $paidAmountTotalWillBe;
        if ($paidAmountTotalWillBe > $finalTotalNeededToPay) {
            $returnAmount = $paidAmountTotalWillBe - $finalTotalNeededToPay;
            $paidIncludingNowAmount = $paidAmountTotalWillBe - $returnAmount;
        }

        $payment = new Payment();
        $paidCorrected = $paidAmount - $returnAmount;
        $payment->setPaymentAmount($paidCorrected);
        $payment->setCreditId($creditId);

        $entityManager->persist($payment);
        $entityManager->flush();

        return $this->render('after-payment.html.twig', [
            'paidAmount' => $paidAmount,
            'previouslyTotalPaid' => $previouslyTotalPaid,
            'paidIncludingNowAmount' => $paidIncludingNowAmount,
            'finalTotalNeededToPay' => $finalTotalNeededToPay,
            'returnAmount' => $returnAmount,
        ]);
    }
}
