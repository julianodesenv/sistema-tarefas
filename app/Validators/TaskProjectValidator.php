<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TaskProjectValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class TaskProjectValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'task_project_template_id' => 'required|exists:task_project_templates,id',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:191',
            'start_date' => 'required|date',
            'end_date_forecast' => 'required|date',
            'active' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'task_project_template_id' => 'required|exists:task_project_templates,id',
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|max:191',
            'start_date' => 'required|date',
            'end_date_forecast' => 'required|date',
            'active' => 'required'
        ],
    ];
}
