<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Description of RegexpTest
 *
 * @author kdudas
 */
class RegexpTest extends TestCase
{
    private string $regexp = '/[a-z]+/';

    public function testRegexpValidValue()
    {
        $regexp = new \KDudas\ArrayValidator\Regexp($this->regexp);
        $value = 'abc';
        $this->assertTrue($regexp->isValid($value));
        $this->assertEmpty($regexp->getMessages());
    }

    public function testRegexpInvalidValue()
    {
        $regexp = new \KDudas\ArrayValidator\Regexp($this->regexp);
        $value = '123';
        $this->assertFalse($regexp->isValid($value));
        $this->assertEquals(['The value provided doesn\'t match the required format'], $regexp->getMessages());
    }

    public function testRegexpCustomMessage()
    {
        $regexp = new \KDudas\ArrayValidator\Regexp($this->regexp);
        $regexp->setMessage('The value must only contain letters');
        $value = '123';
        $this->assertFalse($regexp->isValid($value));
        $this->assertEquals(['The value must only contain letters'], $regexp->getMessages());
    }
}
