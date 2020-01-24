<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TaskProject.
 *
 * @package namespace AgenciaS3\Entities;
 */
class TaskProject extends Model implements Transformable
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
        'client_id',
        'user_id',
        'name',
        'start_date',
        'end_date',
        'end_date_forecast',
        'description',
        'active'
    ];

    public function template()
    {
        return $this->belongsTo(TaskProjectTemplate::class, 'task_project_template_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
