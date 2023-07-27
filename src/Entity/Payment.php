<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $payment_amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $credit_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentAmount(): ?string
    {
        return $this->payment_amount;
    }

    public function setPaymentAmount(string $payment_amount): self
    {
        $this->payment_amount = $payment_amount;

        return $this;
    }

    public function getCreditId(): ?int
    {
        return $this->credit_id;
    }

    public function setCreditId(int $credit_id): self
    {
        $this->credit_id = $credit_id;

        return $this;
    }
}
