<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Description of IsStringTest
 *
 * @author kdudas
 */
class IsStringTest extends TestCase
{
    public function testIsStringValidValue()
    {
        $validator = new \KDudas\ArrayValidator\IsString();
        $value = 'String';
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
    }

    public function testIsStringInvalidValue()
    {
        $validator = new \KDudas\ArrayValidator\IsString(false);
        $value = 1;
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(['The value provided is not a string'], $validator->getMessages());
    }

    public function testIsStringCustomMessage()
    {
        $validator = new \KDudas\ArrayValidator\IsString(false);
        $validator->setMessage('You must provide a text');
        $value = 1;
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(['You must provide a text'], $validator->getMessages());
    }
}
