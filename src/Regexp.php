<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of Regexp
 *
 * @author kdudas
 */
class Regexp extends ValidatorBase implements ValidatorInterface
{
    private string $pattern;
    private array $messages = [];
    protected string $message = 'The value provided doesn\'t match the required format';

    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        $matches = [];
        $result = preg_match($this->pattern, $value, $matches);
        if(empty($matches)) {
            $this->messages[] = $this->message;

            return false;
        }

        return true;
    }
}
