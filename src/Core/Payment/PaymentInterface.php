<?php

namespace Core\Payment;

interface PaymentInterface
{
    public function findAll(): array;
    public function findClientById(string $id): ?object;
    public function createPlan(array $data): array;
    public function makePayment(array $data): bool;
    // public function findByName(string $name): ?object;
    // public function update(): void;
    // public function delete(string $id): void;
}
