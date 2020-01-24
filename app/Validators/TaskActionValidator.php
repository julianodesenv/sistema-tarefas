<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TaskActionValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TaskActionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'sector_id' => 'required|exists:sectors,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'sector_id' => 'required|exists:sectors,id',
            'name' => 'required|max:191',
            'active' => 'required'
        ],
    ];
}
