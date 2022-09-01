<?php

namespace KDudas\ArrayValidator;

/**
 * Description of IsFloat
 *
 */
class IsFloat extends IsNumeric implements ValidatorInterface
{
    private array $messages = [];
    protected string $message = 'The value is not a floating point number';
    private bool $acceptNumericString;

    public function __construct(bool $accpetNumericString = false)
    {
        $this->acceptNumericString = $accpetNumericString;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if(parent::isValid($value)) {
            if($this->acceptNumericString && strpos($value, '.') !== false && is_string($value)) {
                return true;
            }
            if(is_float($value) || is_int($value)) {
                return true;
            }
        }
        $this->messages[] = $this->message;

        return false;
    }

}
