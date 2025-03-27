<?php

namespace App\Http\Controllers;

use App\Models\CoreUser_Model;
use Illuminate\Http\Request;

class CoreUser extends Controller
{
    public function index()
    {
        $data = CoreUser_Model::all(); // Mengambil semua data dari tabel
        // var_dump($data);
        // die;
        return view('core/user.index', compact('data')); // Kirim data ke view
    }
}
