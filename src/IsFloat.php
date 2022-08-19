<?php

namespace KDudas\ArrayValidator;

/**
 * Description of IsFloat
 *
 */
class IsFloat extends ValidatorBase implements ValidatorInterface
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
        if($this->acceptNumericString && is_numeric($value) && strpos($value, '.') !== false) {
            return true;
        }
        if(!$this->acceptNumericString && is_float($value)) {
            return true;
        }

        return false;
    }

}
