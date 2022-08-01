<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of ListElements
 *
 * @author kdudas
 */
class Enum extends ValidatorBase implements ValidatorInterface
{
    private array $allowedElements;
    private array $messages = [];
    protected string $message = 'Value is not allowed';

    public function __construct(array $allowedElements)
    {
        $this->allowedElements = $allowedElements;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if(!in_array($value, $this->allowedElements)) {
            $this->messages[] = $this->message;

            return false;
        }

        return true;
    }
}
