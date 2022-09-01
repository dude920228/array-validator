<?php

namespace KDudas\ArrayValidator;

/**
 * Description of IsNumeric
 *
 */
class IsNumeric extends ValidatorBase implements ValidatorInterface
{
    protected $message = 'The value is not numeric';
    private $messages = [];

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value): bool
    {
        if (!is_numeric($value)) {
            $this->messages[] = $message;

            return false;
        }

        return true;
    }

}
