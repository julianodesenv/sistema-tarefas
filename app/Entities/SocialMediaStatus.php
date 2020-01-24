<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SocialMediaStatus.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SocialMediaStatus extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
        'active',
        'order'
    ];

    public function socialMediaPosts()
    {
        return $this->hasMany(SocialMediaPost::class);
    }

}
