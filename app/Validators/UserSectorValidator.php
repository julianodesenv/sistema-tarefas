<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserSectorValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class UserSectorValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'user_id' => 'required|exists:users,id',
            'sector_id'  => 'required|exists:sectors,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'user_id' => 'required|exists:users,id',
            'sector_id'  => 'required|exists:sectors,id'
        ],
    ];
}
