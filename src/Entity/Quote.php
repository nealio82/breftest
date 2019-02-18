<?php

namespace App\Entity;

use Ramsey\Uuid\Uuid;

class Quote
{
    private $id;

    private $kitty;

    private $quote;

    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setKitty(Kitty $kitty): void
    {
        $this->kitty = $kitty;
    }

    public function getKitty(): ?Kitty
    {
        return $this->kitty;
    }

    public function setQuote(string $quote): void
    {
        $this->quote = $quote;
    }

    public function getQuote(): ?string
    {
        return $this->quote;
    }
}