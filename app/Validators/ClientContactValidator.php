<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClientContactValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ClientContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:191'
        ],
    ];
}
