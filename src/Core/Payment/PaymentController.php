<?php

namespace Core\Payment;

class PaymentController
{
    private PaymentInterface $repository;
    
    public function __construct(PaymentInterface $repository)
    {
        $this->repository = $repository;
    }
}