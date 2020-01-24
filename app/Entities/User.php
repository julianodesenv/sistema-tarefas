<?php

namespace AgenciaS3\Entities;

use AgenciaS3\Notifications\System\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace AgenciaS3\Entities;
 */
class User extends Authenticatable implements Transformable, MustVerifyEmail
{
    use Notifiable, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name', 'email',
        'email_verified_at',
        'password',
        'image',
        'birth_date',
        'phone',
        'session_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->name));
    }

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function sectors()
    {
        return $this->hasMany(UserSector::class);
    }

    public function socialMediaPosts()
    {
        return $this->hasMany(SocialMediaPost::class);
    }

    public function users()
    {
        return $this->hasMany(UserManager::class);
    }

    public function managers()
    {
        return $this->hasMany(UserManager::class);
    }

}
