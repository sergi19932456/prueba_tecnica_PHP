<?php

namespace App\Entity;

use App\Repository\ConvertirRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConvertirRepository::class)]
class Convertir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_con = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(length: 5)]
    private ?string $from_corrency = null;

    #[ORM\Column(length: 5)]
    private ?string $to_corrency = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCon(): ?int
    {
        return $this->id_con;
    }

    public function setIdCon(int $id_con): self
    {
        $this->id_con = $id_con;

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

    public function getFromCorrency(): ?string
    {
        return $this->from_corrency;
    }

    public function setFromCorrency(string $from_corrency): self
    {
        $this->from_corrency = $from_corrency;

        return $this;
    }

    public function getToCorrency(): ?string
    {
        return $this->to_corrency;
    }

    public function setToCorrency(string $to_corrency): self
    {
        $this->to_corrency = $to_corrency;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
