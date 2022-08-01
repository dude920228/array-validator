<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

use DateTime;

/**
 * Description of DateTime
 *
 * @author kdudas
 */
class DateTimeValidator extends ValidatorBase implements ValidatorInterface
{

    private string $format = 'Y-m-d H:i:s';
    protected string $message = 'Invalid or badly formatted date provided';
    private $messages = [];

    public function __construct(?string $format = null)
    {
        if ($format !== null) {
            $this->format = $format;
        }
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function isValid($value, bool $isInvalidTest = false): bool
    {
        $dateTime = DateTime::createFromFormat($this->format, $value);
        if (!$dateTime) {
            $this->messages[] = $this->message;
            return false;
        }

        return true;
    }

}
