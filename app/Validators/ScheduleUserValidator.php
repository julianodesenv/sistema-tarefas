<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ScheduleUserValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ScheduleUserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'schedule_id' => 'required|exists:schedules,id',
            'user_id' => 'required|exists:users,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'schedule_id' => 'required|exists:schedules,id',
            'user_id' => 'required|exists:users,id'
        ],
    ];
}
