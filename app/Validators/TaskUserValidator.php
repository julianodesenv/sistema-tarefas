<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TaskUserValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TaskUserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required'
        ],
    ];
}
