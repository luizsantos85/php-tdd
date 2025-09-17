<?php

namespace Tests\Unit\Core\Payment;

use PHPUnit\Framework\TestCase;
use Core\Payment\PaymentController;
use Core\Payment\PaymentInterface;
use Mockery;
use stdClass;

/**
 * Teste unitário da camada de Payment.
 * Verifica se o PaymentController chama o método makePayment do serviço injetado.
 */
class PaymentUnitTest extends TestCase
{
    // Método setUp opcional: usado para inicializações comuns antes de cada teste.
    // Atualmente está comentado porque não há inicialização compartilhada.
    // Descomente e adapte se precisar configurar algo antes de cada teste.

    // protected function setUp(): void
    // {
    //     parent::setUp(); 
    // }

    public function testPayment()
    {
        // Cria um mock que implementa PaymentInterface.
        // Usamos stdClass para permitir mock de uma classe simples + interface.
        $mockPayment = Mockery::mock(stdClass::class, PaymentInterface::class);

        // Define a expectativa: makePayment será chamado exatamente 1 vez
        // e retornará true.
        $mockPayment->shouldReceive('makePayment')
            ->times(1) // Espera que o método seja chamado exatamente 1 vez
            // ->once()
            ->andReturn(true);

        // Injeta o mock no controller e executa o fluxo.
        $payment = new PaymentController($mockPayment);
        $response = $payment->execute();

        // Verifica se o resultado é true conforme definido no mock.
        $this->assertTrue($response);
    }

    protected function tearDown(): void
    {
        // Fecha todos os mocks criados pelo Mockery para evitar efeitos colaterais.
        Mockery::close();
        parent::tearDown(); // Mantém o comportamento padrão do PHPUnit.
    }
}
