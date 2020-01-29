<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TaskUser.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TaskUser extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id',
        'user_id',
        'status',
        'total'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function times()
    {
        return $this->hasMany(TaskTime::class);
    }

    public function finishDay()
    {
        return $this->where('status', 'finish')
            ->where('updated_at', '>=', date('Y-m-d').' 00:00:00')
            ->where('updated_at', '<=', date('Y-m-d').' 23:59:59');
    }

}
