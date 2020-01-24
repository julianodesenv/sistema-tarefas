<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TaskProjectTemplate.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TaskProjectTemplate extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_project_template_id',
        'name',
        'active'
    ];

    public function taskProjectTemplate()
    {
        return $this->belongsTo(TaskProjectTemplate::class, 'task_project_template_id');
    }

}
