<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of ValidatorBase
 *
 * @author kdudas
 */
class ValidatorBase
{
    protected string $message = 'Invalid value provided';

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
