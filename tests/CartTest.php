<?php
/* tests/CartTest.php */

require __dir__ . '/../Cart.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    private $cart = null;

    public function setUp()
    {
        $this->cart = new Cart();
    }

    public function tearDown()
    {
        $this->cart = null;
    }

    /**
     * @dataProvider provider
     * @group update
     */
    public function testUpdateQuantitiesAndHetTotal($quantities, $expected)
    {
        $this->cart->updateQuantities($quantities);
        $this->assertEquals($expected, $this->cart->getTotal());
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
     * @expectedException CartException
     * @group update
     * @group exception
     */
    public function testUpdateQuantitieWithExcetion()
    {
        $quantities = [ -1, 0, 0, 0, 0, 0];
        $this->cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }

    /**
     * @group get
     */
    public function testGetProducts()
    {
        $products = $this->cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }


}
