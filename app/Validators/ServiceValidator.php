<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ServiceValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ServiceValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'type_id' => 'required|exists:type_services,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'type_id' => 'required|exists:type_services,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
    ];
}
