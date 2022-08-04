<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

/**
 * Description of MinMaxTest
 *
 * @author kdudas
 */
class MinMaxTest extends \PHPUnit\Framework\TestCase
{
    public function testMinMaxValid()
    {
        $validator = new \KDudas\ArrayValidator\MinMax(0, 1, true);
        $value = 0;
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
    }

    public function testMinMaxInvalidValue()
    {
        $validator = new \KDudas\ArrayValidator\MinMax(0, 1, true);
        $value = 2;
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals([
            "The value is outside of the available range of values"
        ], $validator->getMessages());
    }

    public function testMinMaxNotInt()
    {
        $validator = new \KDudas\ArrayValidator\MinMax(0, 1, false);
        $value = "asd";
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals([
            "Value is not an integer"
        ], $validator->getMessages());
    }
}
