<?php

namespace Tests\Unit\Core\Orders;

use PHPUnit\Framework\TestCase;
use Core\Orders\Cart;
use Core\Orders\Product;

class CartUnitTest extends TestCase
{

    public function testCart()
    {
        $cart = new Cart();

        $cart->add(product: new Product(
            id: '1',
            name: 'Product 01',
            price: 10.00,
            quantity: 1,
        ));

        $cart->add(product: new Product(
            id: '2',
            name: 'Product 02',
            price: 20.00,
            quantity: 1,
        ));

        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(30, $cart->total());
    }

    //Adicionando produto igual
    public function testCartProductEquals()
    {
        $product1 = new Product(
            id: '1',
            name: 'Product 01',
            price: 10.00,
            quantity: 1,
        );
        $product2 = new Product(
            id: '2',
            name: 'Product 02',
            price: 30.00,
            quantity: 1,
        );

        $cart = new Cart();

        $cart->add(product: $product1);
        $cart->add(product: $product1);
        $cart->add(product: $product2);
        $cart->add(product: $product2);

        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(80, $cart->total());
    }

    // Testa carrinho vazio
    public function testCartEmpty()
    {
        $cart = new Cart();

        $this->assertCount(0, $cart->getItems());
        $this->assertEquals(0, $cart->total());
    }
}
