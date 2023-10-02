# array-validator
Validates an array of values with a set of validators
# Example validator:

```php
class DemoValidator extends ValidatorChain
{

    public function __construct()
    {
        $validators = [
            'phone' => [
                'required' => true,
                'validators' => [
                    [
                        'type' => Regexp::class,
                        //The message attribute changes the default message of the validator
                        'message' => 'Invalid phone number provided',
                        'options' => [
                            'pattern' => '/\+36-\d{2}[-]\d{3}[-]\d{4}\b/'
                        ]
                    ],
                    [
                        'type' => IsString::class
                    ]
                ]
            ],
            'name' => [
                'required' => true,
                //The Required message attribute changes the default message emmitted when a field is required, but is empty or not present
                'requiredMessage' => 'This field is required',
                'validators' => [
                    [
                        'type' => IsString::class
                    ]
                ]
            ],
            'status' => [
                'required' => true,
                'validators' => [
                    [
                        'type' => IsString::class
                    ],
                    [
                        'type' => Enum::class,
                        'options' => [
                            'allowedElements' => ['active', 'inactive', 'deleted']
                        ]
                    ]
                ]
            ]
        ];

        parent::__construct($validators);
    }

}
```
You can also create a new instance of the `KDudas\ArrayValidator\ValidatorChain` with the same parameters in its `__construct` as above and call its `isValid` method.
If you want to add new validation logic, simply implement the `KDudas\ArrayValidator\ValidatorInterface` in a class and it is ready to use.
To perform the validation, simply call the `isValid` method on the validator instance. To get validation messages, call the `getMessages` method on the `ValidatorChain` instance.
