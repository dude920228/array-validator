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
class IsString implements ValidatorInterface
{
    private array $messages = [];
    private string $message = 'The value provided is not string';
    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if(!is_string($value)) {
            $this->messages[] = $this->message;

            return false;
        }

        return true;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

}
