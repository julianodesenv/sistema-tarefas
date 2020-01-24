<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClientServiceValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ClientServiceValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'demand_id' => 'required|exists:demands,id',
            'quantity' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'demand_id' => 'required|exists:demands,id',
            'quantity' => 'required'
        ],
    ];
}
