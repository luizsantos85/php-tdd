<?php

namespace Tests\Unit\Core\Payment;

use PHPUnit\Framework\TestCase;
use Core\Payment\PaymentController;
use Core\Payment\PaymentInterface;

class PaymentUnitTest extends TestCase
{
    public function testCreatePayment()
    {
        $repository = $this->createMock(PaymentController::class);
        $useCase = new PaymentInterface($repository);

        $this->assertInstanceOf(PaymentInterface::class, $useCase);
    }
}
