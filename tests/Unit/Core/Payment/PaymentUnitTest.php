<?php

namespace Tests\Unit\Core\Payment;

use PHPUnit\Framework\TestCase;
use Core\Payment\PaymentController;
use Core\Payment\PaymentInterface;
use Mockery;
use stdClass;

class PaymentUnitTest extends TestCase
{
    public function testPayment()
    {
        $mockPayment = Mockery::mock(stdClass::class, PaymentInterface::class);
        $mockPayment->shouldReceive('makePayment')
            ->times(1) // Espera que o método seja chamado exatamente 1 vez
            // ->once()
            ->andReturn(true);

        $payment = new PaymentController($mockPayment);
        $response = $payment->execute();

        $this->assertTrue($response);
    }

    protected function tearDown(): void
    {
        Mockery::close(); // Fecha todos os mocks criados pelo Mockery
        parent::tearDown(); // Manter comportamento padrão
    }
}
