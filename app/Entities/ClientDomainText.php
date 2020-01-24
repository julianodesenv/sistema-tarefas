<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ClientDomainText.
 *
 * @package namespace AgenciaS3\Entities;
 */
class ClientDomainText extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_domain_id',
        'user_id',
        'name',
        'description',
        'order'
    ];

    public function clientDomain()
    {
        return $this->belongsTo(ClientDomain::class, 'client_domain_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
