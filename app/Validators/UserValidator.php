<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3|max:191',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:user_roles,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3|max:191',
            'email' => 'required|email',
            'role_id' => 'required|exists:user_roles,id'
        ],
    ];
}
