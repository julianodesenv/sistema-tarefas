<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class UserPasswordValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'password' => 'required|min:6|confirmed'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'password' => 'required|min:6|confirmed',
        ],
    ];
}
