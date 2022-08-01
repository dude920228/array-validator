<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use KDudas\ArrayValidator\DateTimeValidator;
use PHPUnit\Framework\TestCase;

/**
 * Description of DateTimeTest
 *
 * @author kdudas
 */
class DateTimeTest extends TestCase
{
    public function testDateTimeValidData()
    {
        $validator = new DateTimeValidator();
        $value = '2022-01-01 12:00:00';
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
    }

    public function testDateTimeInvalidFormat()
    {
        $validator = new DateTimeValidator();
        $value = '2022-01-01 12:00';
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(['Invalid or badly formatted date provided'], $validator->getMessages());
    }

    public function testDateTimeInvalidDate()
    {
        $validator = new DateTimeValidator();
        $value = 'abc';
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(['Invalid or badly formatted date provided'], $validator->getMessages());
    }

    public function testDateTimeCustomFormat()
    {
        $validator = new DateTimeValidator(DATE_ATOM);
        $value = '2022-08-01T15:27:45+02:00';
        $this->assertTrue($validator->isValid($value));
        $this->assertEmpty($validator->getMessages());
    }

    public function testDateTimeCustomFormatInvalidValue()
    {
        $validator = new DateTimeValidator(DATE_ATOM);
        $value = '2022-08-01 15:27:45';
        $this->assertFalse($validator->isValid($value));
        $this->assertEquals(['Invalid or badly formatted date provided'], $validator->getMessages());
    }
}
