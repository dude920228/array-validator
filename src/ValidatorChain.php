<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator;

/**
 * Description of ValidatorChain
 *
 * @author kdudas
 */
class ValidatorChain implements ValidatorInterface
{
    protected array $validators;
    protected array $messages = [];
    protected array $requredFields = [];

    public function __construct(array $validatorsConfig)
    {
        foreach($validatorsConfig as $fieldName => $attachedValidators) {
            if(isset($attachedValidators['required']) && $attachedValidators['required'] == true) {
                $this->requredFields[] = $fieldName;
            }

            foreach($attachedValidators['validators'] as $config) {
                $this->validators[$fieldName][] = $this->createValidator($config);
            }

        }
    }

    private function createValidator(array $config)
    {
        $validatorType = $config['type'];
        $reflection = new \ReflectionClass($validatorType);
        $constructor = $reflection->getConstructor();
        $params = [];
        if($constructor !== null) {
            $params = $constructor->getParameters();
        }
        $orderedParams = [];
        foreach($params as $param) {
            /** @var \ReflectionAttribute $param */
            $paramName = $param->getName();
            $orderedParams[] = $config['options'][$paramName];
        }

        $validator = new $validatorType(...$orderedParams);
        if(isset($config['message'])) {
            $validator->setMessage($config['message']);
        }

        return $validator;
    }

    public function getMessages(): array
    {
        foreach($this->messages as $field => $messages) {
            if(empty($messages)) {
                unset($this->messages[$field]);
            }
        }

        return $this->messages;
    }

    public function isValid($value): bool
    {
        $success = $this->validateRequired($value);
        foreach($this->validators as $fieldName => $validators) {
            $fieldValue = $value[$fieldName];
            foreach($validators as $validator) {
                $success = $validator->isValid($fieldValue) && $success;
                if($this->messages[$fieldName] === null) {
                    $this->messages[$fieldName] = [];
                }
                $this->messages[$fieldName] = array_merge($this->messages[$fieldName], $validator->getMessages());
            }
        }

        return $success;
    }

    private function validateRequired(array $value): bool
    {
        $success = true;
        foreach($this->requredFields as $required) {
            if(!array_key_exists($required, $value)) {
                $success = false;
                $this->messages[$required]['isEmpty'] = true;
            }
        }

        return $success;
    }

}
