<?php

namespace AgenciaS3\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Client.
 *
 * @package namespace AgenciaS3\Entities;
 */
class Client extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'cpf',
        'cnpj',
        'state_registration',
        'municipal_registration',
        'corporate_name',
        'fantasy_name',
        'zip_code',
        'state_id',
        'city_id',
        'address',
        'district',
        'number',
        'complement',
        'phone',
        'cell_phone',
        'email',
        'type_client_id',
        'segment_client_id',
        'entry_date',
        'description',
        'active',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function typeClient()
    {
        return $this->belongsTo(TypeClient::class, 'type_client_id');
    }

    public function segmentClient()
    {
        return $this->belongsTo(SegmentClient::class, 'segment_client_id');
    }

    public function contacts()
    {
        return $this->hasMany(ClientContact::class);
    }

    public function services()
    {
        return $this->hasMany(ClientService::class);
    }

    public function users()
    {
        return $this->hasMany(ClientUser::class);
    }

    public function clients()
    {
        return $this->hasMany(ClientUser::class);
    }

    public function socialMediaPosts()
    {
        return $this->hasMany(SocialMediaPost::class);
    }

}
