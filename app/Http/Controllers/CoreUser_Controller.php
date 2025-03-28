<?php

namespace App\Http\Controllers;

use App\Models\CoreUser_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoreUser_Controller extends Controller
{
    public function index(Request $request)
    {
        $data = CoreUser_Model::all();
        
        // Cara 1: Menggunakan facade Session
        $sessionAll = Session::all();
        dump($sessionAll); // Menggunakan dump() untuk debug yang lebih baik
        
        return view('core/user.index', compact('data'));
    }
}