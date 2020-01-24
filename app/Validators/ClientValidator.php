<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClientValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ClientValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'user_id' => 'required|exists:users,id',
            'type' => 'required',
            'email' => 'required|email|unique:clients|max:191',
            'type_client_id' => 'required|exists:type_clients,id',
            'segment_client_id' => 'required|exists:segment_clients,id',
            'entry_date' => 'required',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'type' => 'required',
            'email' => 'required|email|max:191',
            'type_client_id' => 'required|exists:type_clients,id',
            'segment_client_id' => 'required|exists:segment_clients,id',
            'active' => 'required'
        ],
    ];
}
