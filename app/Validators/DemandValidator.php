<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class DemandValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class DemandValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'unique' => 'required',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'unique' => 'required',
            'active' => 'required'
        ],
    ];
}
