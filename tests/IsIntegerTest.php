<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use KDudas\ArrayValidator\IsInteger;
use PHPUnit\Framework\TestCase;

/**
 * Description of IsIntegerTest
 *
 * @author kdudas
 */
class IsIntegerTest extends TestCase
{
    public function testIsIntegerStrictValid()
    {
        $validator = new IsInteger();
        $value = 1;
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
    }

    public function testIsIntegerValid()
    {
        $validator = new IsInteger(true);
        $value = 1;
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
        $numeric = "123";
        $this->assertTrue($validator->isValid($numeric));
        $this->assertEmpty($validator->getMessages());
    }

    public function testIsIntegerInvalid()
    {
        $validator = new IsInteger(false);
        $value = "asd";
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(["Value is not an integer"], $validator->getMessages());
    }

    public function testIsIntegerInvalidNumericStringAllowed()
    {
        $validator = new IsInteger(true);
        $value = "asd";
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(["Value is not numeric"], $validator->getMessages());
    }

    public function testIsIntegerInvalidNumericStringAllowedFloatValue()
    {
        $validator = new IsInteger(true);
        $value = "10.12132";
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(["Value is not numeric"], $validator->getMessages());
    }
}
