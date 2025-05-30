<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class MasterEmployee_Model extends Model
{
    use Notifiable;

    protected $table = 'EMPLOYEE';
    protected $primaryKey = 'EMP_NIK';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'EMP_NIK',
        'EMP_NAME',
        'EMP_STATUS',
    ];

}