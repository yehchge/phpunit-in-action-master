<?php
/* tests/CartTest.php */

require __dir__ . '/../Cart.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    public function tsetUpdateQuantitiesAndHetTotal()
    {
        $cart = new Cart();

        // Test 1
        $quantities = [
            1, 0, 0, 0, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(199, $cart->getTotal());

        // Test 2
        $quantities = [
            1, 0, 0, 2, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(797, $cart->getTotal());

        return $cart;
    }

    /**
     * @depends tsetUpdateQuantitiesAndHetTotal
     */
    public function testGetProducts($cart)
    {
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(2, $products[3]['quantity']);
    }
}
