<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Description of EnumTest
 *
 * @author kdudas
 */
class EnumTest extends TestCase
{
    public function testEnumValidValue()
    {
        $enum = new \KDudas\ArrayValidator\Enum(['1', '2', '3']);
        $value = '2';
        $this->assertTrue($enum->isValid($value));
        $this->assertEmpty($enum->getMessages());
    }

    public function testEnumInvalidValue()
    {
        $enum = new \KDudas\ArrayValidator\Enum(['1', '2', '3']);
        $value = '5';
        $this->assertFalse($enum->isValid($value));
        $this->assertNotEmpty($enum->getMessages());
        $this->assertEquals(['Value is not allowed'], $enum->getMessages());
    }

    public function testCustomMessage()
    {
        $enum = new \KDudas\ArrayValidator\Enum(['1', '2', '3']);
        $value = '5';
        $enum->setMessage('Invalid value provided');
        $this->assertFalse($enum->isValid($value));
        $this->assertNotEmpty($enum->getMessages());
        $this->assertEquals(['Invalid value provided'], $enum->getMessages());
    }
}
