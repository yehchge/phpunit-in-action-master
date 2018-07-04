<?php
/* tests/CartTest.php */

require __dir__ . '/../Cart.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    /**
     * @dataProvider provider
     */
    public function testUpdateQuantitiesAndHetTotal($quantities, $expected)
    {
        $cart = new Cart();

        $cart->updateQuantities($quantities);
        $this->assertEquals($expected, $cart->getTotal());

        return $cart;
    }

    public function provider(){
        return array(
            array(
                array(1,0,0,0,0,0),199
            ),
            array(
                array(1,00,2,0,0),797
            )
        );
    }

    /**
     * @depends testUpdateQuantitiesAndHetTotal
     */
    public function testGetProducts($cart)
    {
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(2, $products[3]['quantity']);
    }
}
