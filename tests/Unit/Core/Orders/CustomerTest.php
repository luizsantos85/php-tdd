<?php

namespace Tests\Core\Orders;

use PHPUnit\Framework\TestCase;
use Core\Orders\Customer;
use FontLib\Table\Type\name;

class CustomerTest extends TestCase
{
    public function testAttributes()
    {
        $customer = new Customer(
            name: 'Luiz Henrique Santos',
        );

        $this->assertEquals('Luiz Henrique Santos', $customer->getName());

        $customer->changeName(
            name: 'new name',
        );
        $this->assertEquals('new name', $customer->getName());

        $this->assertTrue(true);
    }
}
