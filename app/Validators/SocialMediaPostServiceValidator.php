<?php

namespace AgenciaS3\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SocialMediaPostServiceValidator.
 *
 * @package namespace AgenciaS3\Validators;
 */
class SocialMediaPostServiceValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'post_id' => 'required|exists:social_media_posts,id',
            'service_id' => 'required|exists:services,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'post_id' => 'required|exists:social_media_posts,id',
            'service_id' => 'required|exists:services,id'
        ],
    ];
}
