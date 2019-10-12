<?php

namespace Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $api_token
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package Modules\User\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

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

    /**
     * Get formatted name
     *
     * @return string
     */
    public function formattedName()
    {
        return ucwords($this->name);
    }
}
