<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreUser_Model extends Model
{
    use HasFactory;
    protected $table = 'USRSTBL';
    protected $primaryKey = null; // Tidak ada primary key
    public $incrementing = false;
    public $timestamps = false; 
}
