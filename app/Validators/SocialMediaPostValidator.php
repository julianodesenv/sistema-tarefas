<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SocialMediaPostValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SocialMediaPostValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:social_media_statuses,id',
            'name' => 'required|max:191',
            'date' => 'required|date'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:social_media_statuses,id',
            'name' => 'required|max:191',
            'date' => 'required|date'
        ],
    ];
}
