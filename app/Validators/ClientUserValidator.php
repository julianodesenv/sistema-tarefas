<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClientUserValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ClientUserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id'
        ],
    ];
}
