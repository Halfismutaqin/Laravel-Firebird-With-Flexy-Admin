<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CoreUser_Model extends Authenticatable
{
    use Notifiable;

    protected $table = 'USRSTBL';
    protected $primaryKey = 'USER_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'USER_ID',
        'USER_PASSWORD',
        'USER_NAME',
        'ACTIVE',
        'REMEMBER_TOKEN'
    ];

    protected $hidden = [
        'USER_PASSWORD',
        'REMEMBER_TOKEN'
    ];

    public function getAuthPassword()
    {
        return $this->USER_PASSWORD;
    }

    // Jika perlu menyesuaikan nama field untuk remember token
    public function getRememberTokenName()
    {
        return 'REMEMBER_TOKEN';
    }
}