<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ScheduleValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ScheduleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:191',
            'date' => 'required|date'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:191',
            'date' => 'required|date'
        ],
    ];
}
