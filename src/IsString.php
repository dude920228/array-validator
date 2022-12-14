<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of String
 *
 * @author kdudas
 */
class IsString extends ValidatorBase implements ValidatorInterface
{
    private array $messages = [];
    protected string $message = 'The value provided is not a string';
    private bool $acceptInt;

    public function __construct(bool $acceptInt = true)
    {
        $this->acceptInt = $acceptInt;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if(!is_string($value) && !$this->acceptInt) {
            $this->messages[] = $this->message;
            return false;
        }
        if(is_int($value) && $this->acceptInt) {
            return true;
        }
        if(is_string($value)) {
            return true;
        }
        $this->messages[] = $this->message;
        
        return false;
    }
}
