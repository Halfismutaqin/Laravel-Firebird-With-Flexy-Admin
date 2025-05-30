<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreRole_Model extends Model
{
    protected $table = 'CONFIG_ROLE'; // Nama tabel dalam database
    protected $primaryKey = 'ROLE_ID'; // Nama kolom primary key
    public $incrementing = false; // Primary key tidak auto-increment
    public $timestamps = false; // Tidak menggunakan kolom timestamps

    // Kolom-kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'ROLE_TYPE',
        'ROLE_CATEGORY',
        'ROLE_NAME',
        'ROLE_DESC',
        'ROLE_STATUS',
        'CREATED_DT',
        'CREATED_BY',
        'LAST_UPDATED_DT',
        'LAST_UPDATED_BY',
    ];
}
