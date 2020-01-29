<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TaskTimeValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TaskTimeValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'task_user_id' => 'required|exists:task_users,id',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'status' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'task_user_id' => 'required|exists:task_users,id',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'status' => 'required'
        ],
    ];
}
