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
    private bool $acceptNumericString;
    protected string $message = "Value is not an integer";
    protected array $messages = [];

    public function __construct(bool $acceptNumericString = false)
    {
        $this->acceptNumericString = $acceptNumericString;
        if($this->acceptNumericString) {
            $this->message = "Value is not numeric";
        }
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if(!$this->acceptNumericString && is_int($value)) {
            return true;
        }
        if($this->acceptNumericString && is_numeric($value) && strpos($value, '.') === false) {
            return true;
        }
        $this->messages[] = $this->message;

        return false;
    }

}
