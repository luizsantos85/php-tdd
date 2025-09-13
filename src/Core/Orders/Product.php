<?php

namespace Core\Orders;

class Product
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected float $price,
        protected int $quantity,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function calcTotal(): float
    {
        return $this->price * $this->quantity;
    }

    public function calcTotalPorcent(float $porcent = 10): float
    {
        $total = $this->calcTotal();
        $acrescimo = ($total * $porcent) / 100;
        return $total + $acrescimo;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
