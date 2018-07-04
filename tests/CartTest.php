<?php
/* tests/CartTest.php */

require __dir__ . '/../Cart.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    /**
     * @dataProvider provider
     * @group update
     */
    public function testUpdateQuantitiesAndHetTotal($quantities, $expected)
    {
        $cart = new Cart();
        $cart->updateQuantities($quantities);
        $this->assertEquals($expected, $cart->getTotal());
    }

    public function provider(){
        return array(
            array(
                array(1,0,0,0,0,0),199
            ),
            array(
                array(1,0,0,2,0,0),797
            )
        );
    }

    /**
     * @group get
     */
    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }

    /**
     * @expectedException CartException
     * @group update
     * @group exception
     */
    public function testUpdateQuantitieWithExcetion()
    {
        $cart = new Cart();
        $quantities = [ -1, 0, 0, 0, 0, 0];
        $cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }
}
