<?php

namespace AgenciaS3\Entities;

use AgenciaS3\Validators\ServiceValidator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SocialMediaPostService.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SocialMediaPostService extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'service_id',
        'value'
    ];

    public function post()
    {
        return $this->belongsTo(SocialMediaPost::class, 'post_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
