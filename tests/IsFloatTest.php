<?php

namespace KDudas\ArrayValidator\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Description of IsFloatTest
 *
 */
class IsFloatTest extends TestCase
{
    public function testIsFloatValidFloat()
    {
        $validator = new \KDudas\ArrayValidator\IsFloat(false);
        $value = 1.325;
        $this->assertTrue($validator->isValid($value));
    }

    public function testIsFloatValidNumericFloat()
    {
        $validator = new \KDudas\ArrayValidator\IsFloat(true);
        $value = "1.325";
        $this->assertTrue($validator->isValid($value));
    }

    public function testIsFloatInvalidNumericFloat()
    {
        $validator = new \KDudas\ArrayValidator\IsFloat(false);
        $value = "1.325";
        $this->assertFalse($validator->isValid($value));
    }

    public function testIsFloatInvalidInt()
    {
        $validator = new \KDudas\ArrayValidator\IsFloat(false);
        $value = 10;
        $this->assertFalse($validator->isValid($value));
    }

    public function testIsFloatInvalidNumericStringInt()
    {
        $validator = new \KDudas\ArrayValidator\IsFloat(true);
        $value = "10";
        $this->assertFalse($validator->isValid($value));
    }
}
