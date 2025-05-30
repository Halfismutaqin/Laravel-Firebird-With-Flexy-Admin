<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigMenu_Model extends Model
{
    protected $table = 'CONFIG_MENU'; // Nama tabel dalam database
    protected $primaryKey = 'MENU_ID'; // Nama kolom primary key
    public $incrementing = true; // Primary key tidak auto-increment
    public $timestamps = false; // Tidak menggunakan kolom timestamps

    // Kolom-kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'MENU_TYPE',
        'MENU_NAME',
        'MENU_DESC',
        'MENU_SEQUENCE',
        'MENU_PARENT',
        'MENU_ROUTE',
        'MENU_ICON',
        'MENU_STATUS',
        'CREATED_DT',
        'CREATED_BY',
        'LAST_UPDATED_DT',
        'LAST_UPDATED_BY',
    ];
}
