<?php

namespace Tests\Unit\Core\Orders;

use PHPUnit\Framework\TestCase;
use Core\Orders\Product;

class ProductUnitTest extends TestCase
{
    public function testAttributes()
    {
        $product = new Product(
            id: '1',
            name: 'Product 01',
            price: 10.00,
            quantity: 3,
        );

        $this->assertEquals(1, $product->getId());
        $this->assertEquals('Product 01', $product->getName());
        $this->assertEquals(10.00, $product->getPrice());
        
    }

    public function testCalc()
    {
        $product = new Product(
            id: '1',
            name: 'Product 01',
            price: 10.00,
            quantity: 2,
        );

        $this->assertEquals(20.00, $product->calcTotal());
        
        // calcula total com 10% de acréscimo
        $this->assertEquals(22.00, $product->calcTotalPorcent());
    }

    public function testCalcPorcent()
    {
        $product = new Product(
            id: '1',
            name: 'Product 01',
            price: 10.00,
            quantity: 2,
        );

        // calcula total com 15% de acréscimo
        $this->assertEquals(23.00, $product->calcTotalPorcent(15));
    }

}
