<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TaskValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TaskValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'required|exists:task_projects,id',
            'sector_id' => 'required|exists:sectors,id',
            'action_id' => 'required|exists:task_actions,id',
            'priority_id' => 'required|exists:task_priorities,id',
            'responsible_user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'required|exists:task_projects,id',
            'sector_id' => 'required|exists:sectors,id',
            'action_id' => 'required|exists:task_actions,id',
            'priority_id' => 'required|exists:task_priorities,id',
            'responsible_user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ],
    ];
}
