<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClientDomainTextValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class ClientDomainTextValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'client_domain_id' => 'required|exists:client_domains,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:191'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'client_domain_id' => 'required|exists:client_domains,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:191'
        ],
    ];
}
