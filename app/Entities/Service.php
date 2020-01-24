<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Service.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Service extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'name',
        'active'
    ];

    public function type()
    {
        return $this->belongsTo(TypeService::class, 'type_id');
    }

    public function services()
    {
        return $this->hasMany(ClientService::class, 'id', 'service_id');
    }

}
