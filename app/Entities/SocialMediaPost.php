<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SocialMediaPost.
 *
 * @package namespace AgenciaS3\Entities;
 */
class SocialMediaPost extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'user_id',
        'status_id',
        'name',
        'date',
        'link_url',
        'pit',
        'deadline',
        'description'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(SocialMediaStatus::class, 'status_id');
    }

    public function services()
    {
        return $this->hasMany(SocialMediaPostService::class, 'post_id');
    }

}
