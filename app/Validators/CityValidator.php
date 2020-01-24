<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CityValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class CityValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'state_id' => 'required|exists:states,id',
            'name' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'state_id' => 'required|exists:states,id',
            'name' => 'required|max:191']
        ,
    ];
}
