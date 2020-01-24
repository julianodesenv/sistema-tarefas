<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sector.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Sector extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'sectors';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active'
    ];

    public function users()
    {
        return $this->hasMany(UserSector::class);
    }

}
