<?php

namespace Core\Payment;

class PagarMe implements PaymentInterface
{
    public function findAll(): array
    {
        return [];
    }

    public function findClientById(string $id): ?object
    {
        return null;
    }

    public function createPlan(array $data): array
    {
        return [];
    }

    public function makePayment(array $data): bool
    {
        return true;
    }
}
