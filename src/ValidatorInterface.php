<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 *
 * @author kdudas
 */
interface ValidatorInterface
{
    public function isValid($value): bool;

    public function getMessages(): array;
}
