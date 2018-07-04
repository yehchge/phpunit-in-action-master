<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error;

class ErrorTest extends TestCase
{

    /**
     * @expectedException Error
     * @group exception
     */
    public function testFileWriting()
    {
        $this->asserFalse(file_put_contents('/is-not-writeable/file', 'stuff'));
    }

}
