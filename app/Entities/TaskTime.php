<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TaskTime.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TaskTime extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_user_id',
        'start',
        'end',
        'description',
        'status' //play, pause, finish
    ];

    public function taskUser()
    {
        return $this->belongsTo(TaskUser::class, 'task_user_id');
    }

}
