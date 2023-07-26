<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditRepository::class)
 */
class Credit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $months;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $full_name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $interest_rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonths(): ?int
    {
        return $this->months;
    }

    public function setMonths(int $months): self
    {
        $this->months = $months;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getInterestRate(): ?string
    {
        return $this->interest_rate;
    }

    public function setInterestRate(string $interest_rate): self
    {
        $this->interest_rate = $interest_rate;

        return $this;
    }
}
