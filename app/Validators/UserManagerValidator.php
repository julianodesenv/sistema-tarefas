<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserManagerValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class UserManagerValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'manager_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'manager_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id'
        ],
    ];
}
