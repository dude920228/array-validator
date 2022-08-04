<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of MinMax
 *
 * @author kdudas
 */
class MinMax extends IsInteger
{
    private int $min;
    private int $max;
    private string $ownMessage = "The value is outside of the available range of values";

    public function __construct(int $min = PHP_INT_MIN, int $max = PHP_INT_MAX, bool $strict = true)
    {
        parent::__construct($strict);
        $this->min = $min;
        $this->max = $max;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        $isInt = parent::isValid($value);
        if(!$isInt) {
            $this->messages = parent::getMessages();
            return false;
        }
        if($value >= $this->min && $value <= $this->max) {
            return true;
        }
        $this->messages[] = $this->ownMessage;

        return false;
    }
}
