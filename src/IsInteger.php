<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of IsInteger
 *
 * @author kdudas
 */
class IsInteger extends ValidatorBase implements ValidatorInterface
{
    private bool $strict;
    protected string $message = "Value is not an integer";
    private array $messages = [];

    public function __construct(bool $strict = true)
    {
        $this->strict = $strict;
        if(!$this->strict) {
            $this->message = "Value is not numeric";
        }
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if($this->strict && is_int($value)) {
            return true;
        }
        if(!$this->strict && is_numeric($value)) {
            return true;
        }
        $this->messages[] = $this->message;

        return false;
    }

}
