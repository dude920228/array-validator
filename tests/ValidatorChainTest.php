<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace KDudas\ArrayValidator\Tests;

use KDudas\ArrayValidator\Enum;
use KDudas\ArrayValidator\IsString;
use KDudas\ArrayValidator\Regexp;
use KDudas\ArrayValidator\ValidatorChain;
use PHPUnit\Framework\TestCase;

/**
 * Description of ValidatorChainTest
 *
 * @author kdudas
 */
class ValidatorChainTest extends TestCase
{

    private $config = [
        'first' => [
            'required' => false,
            'validators' => [
                [
                    'type' => IsString::class
                ],
                [
                    'type' => Regexp::class,
                    'options' => [
                        'pattern' => '/[a-z]/'
                    ]
                ]
            ]
        ],
        'second' => [
            'required' => true,
            'validators' => [
                [
                    'type' => Enum::class,
                    'message' => 'Invalid value',
                    'options' => [
                        'allowedElements' => ['active', 'passive']
                    ]
                ]
            ]
        ],
        'third' => [
            'required' => true,
            'requiredMessage' => 'This field is required',
            'validators' => [
                [
                    'type' => IsString::class
                ]
            ]
        ]
    ];
    private ValidatorChain $validatorChain;

    public function __construct($name = null, $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validatorChain = new ValidatorChain($this->config);
    }

    public function testValidInput()
    {
        $value = [
            'first' => 'abc',
            'second' => 'active',
            'third' => 'abc'
        ];

        $this->assertTrue($this->validatorChain->isValid($value));
        $this->assertEmpty($this->validatorChain->getMessages());
    }

    public function testRequiredInput()
    {
        $value = [];

        $this->assertFalse($this->validatorChain->isValid($value));
        $this->assertEquals([
            'second' => [
                'The field is required and cannot be empty'
            ],
            'third' => [
                'This field is required'
            ]
        ], $this->validatorChain->getMessages());
    }

    public function testInvalidInput()
    {
        $value = [
            'first' => 123,
            'second' => 'invalid value',
            'third' => []
        ];

        $this->assertFalse($this->validatorChain->isValid($value));
        $this->assertEquals([
            'first' => [
                'The value provided is not a string',
                'The value provided doesn\'t match the required format'
            ],
            'second' =>  ['Invalid value'],
            'third' => ['The value provided is not a string']
        ], $this->validatorChain->getMessages());
    }

}
