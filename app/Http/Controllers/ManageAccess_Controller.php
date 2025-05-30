<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoreUser_Model;
use App\Models\CoreRole_Model;
use App\Models\ConfigMenu_Model;
use App\Models\MasterEmployee_Model;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ManageAccess_Controller extends Controller
{
    public function index(){
        return view('layouts.manageAccess.manageAccess_Main');
    }


    // :: Manage User Role ::
    public function userRole_listPage(Request $request)
    {
        // Ambil data user beserta role mereka
        $data = CoreUser_Model::with('getUserRole')->get();
    
        // Debugging session hanya pada mode pengembangan
        if (config('app.debug')) {
            $sessionData = Session::get('USER_ID'); // Ambil session tertentu jika perlu, misalnya USER_ID
            logger('Session USER_ID:', [$sessionData]); // Log data session USER_ID
        }
    
        // Mengirim data ke view
        return view('layouts.manageAccess.manageUserRole_List', compact('data'));
    }

    // Menampilkan detail akses
    public function userRole_detailPage($id)
    {
        // Cari data akses berdasarkan ID
        $accessDetail = CoreRole_Model::find($id);
    
        // Cek jika data tidak ditemukan
        if (!$accessDetail) {
            // Redirect ke route 'manageaccess.roleList' dengan pesan error jika tidak ditemukan
            return redirect()->route('manageaccess.userRole.list')->with('error', 'Detail tidak ditemukan.');
        }
    
        // Return view dengan mengirim data yang ditemukan
        return view('layouts.manageAccess.manageUserRole_Detail', compact('accessDetail'));
    }
    

    public function userRole_addPage(Request $request)
    {
        $data['empList'] = masterEmployee_Model::get();

        $data['roleList'] = CoreRole_Model::get();

        return view('layouts.manageAccess.manageUserRole_Add', compact('data'));
    }

    public function userRole_saveData(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id'       => 'required|string|max:20|unique:USRSTBL,USER_ID',
            'password'      => 'required|string|min:5',
            'role_access'   => 'required|integer',
            'status'        => 'required|string|max:1',
        ]);

        try {
            // Simpan data ke database (misalkan menggunakan model CoreUser_Model)
            CoreUser_Model::create([
                'USER_ID'       => $request->input('user_id'),
                'USER_PASSWORD' => base64_encode($request->input('password')), 
                'ROLE_ID'       => $request->input('role_access'),
                'USER_STATUS'   => $request->input('status'),
                'CREATED_BY'    => Auth::user()->USER_ID, 
                'CREATED_DT'    => now(), 
            ]);
        
            // Redirect ke route 'manageaccess.roleList' jika berhasil
            return redirect()->route('manageaccess.userRole.list')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    //
    // ============================================ :: Manage Config Role :: ================================================
    // 
    public function configRole_listPage(Request $request)
    {
        $data = CoreRole_Model::get();

        // Debugging untuk session, gunakan hanya selama pengembangan
        if (config('app.debug')) {
            $sessionAll = Session::all();
            logger('Session Data:', $sessionAll); // Logging alih-alih dump
        }
        // dd($data);
        return view('layouts.manageAccess.manageConfigRole_List', compact('data'));
    }
    // Menampilkan detail akses
    public function configRole_detailPage($id)
    {
        // Cari data akses berdasarkan ID
        $data['roleDetail'] = CoreRole_Model::find($id);
        $data['roleList'] = CoreRole_Model::get();
    
        // Cek jika data tidak ditemukan
        if (!$data['roleDetail'] ) {
            // Redirect ke route 'manageaccess.roleList' dengan pesan error jika tidak ditemukan
            return redirect()->route('manageaccess.userRole.list')->with('error', 'Detail tidak ditemukan.');
        }
    
        // Return view dengan mengirim data yang ditemukan
        return view('layouts.manageAccess.manageConfigRole_Detail', compact('data'));
    }
    

    public function configRole_addPage(Request $request)
    {
        $data['roleList'] = CoreRole_Model::get();

        return view('layouts.manageAccess.manageConfigRole_Add', compact('data'));
    }

    public function configRole_saveData(Request $request)
    {
        // Validasi input
        $request->validate([
            'roleType'      => 'required|string|max:20',
            'roleCategory'  => 'required|string|max:20',
            'roleName'      => 'required|string|max:50|unique:CONFIG_ROLE,ROLE_NAME',
            'roleDesc'      => 'required|string|max:250',
            'roleStatus'    => 'required|string|max:1',
        ]);

        try {
            // Simpan data ke database (misalkan menggunakan model CoreUser_Model)
            CoreRole_Model::create([
                'ROLE_TYPE'     => strtoupper($request->input('roleType')),
                'ROLE_CATEGORY' => strtoupper($request->input('roleCategory')),
                'ROLE_NAME'     => strtoupper($request->input('roleName')),
                'ROLE_DESC'     => $request->input('roleDesc'),
                'ROLE_STATUS'   => $request->input('roleStatus'),
                'CREATED_BY'    => Auth::user()->USER_ID, 
                'CREATED_DT'    => now(), 
            ]);
        
            // Redirect ke route 'manageaccess.roleList' jika berhasil
            return redirect()->route('manageAccess.configRole.list')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }


    //
    // ============================================ :: Manage Config Menu :: ================================================
    // 
    public function configMenu_listPage(Request $request)
    {
        $data = ConfigMenu_Model::where('MENU_PARENT', 0)->get();

        // Debugging untuk session, gunakan hanya selama pengembangan
        if (config('app.debug')) {
            $sessionAll = Session::all();
            logger('Session Data:', $sessionAll); // Logging alih-alih dump
        }
        // dd($data);
        return view('layouts.manageAccess.manageConfigMenu_List', compact('data'));
    }

    public function configSubMenu_listPage($parentID)
    {
        // Mengambil data submenu berdasarkan parentID
        $data['menu'] = ConfigMenu_Model::where('MENU_PARENT', $parentID)->get();
        $data['parentMenu'] = ConfigMenu_Model::where('MENU_ID', $parentID)->value('MENU_NAME');
        // Debugging untuk session, gunakan hanya selama pengembangan
        if (config('app.debug')) {
            logger('Session Data:', Session::all());
        }
    
        // Return ke view dengan data yang sesuai
        return view('layouts.manageAccess.manageConfigMenuSub_List', compact('data', 'parentID'));
    }

    // Menampilkan detail akses
    public function configMenu_detailPage($id)
    {
        // Cari data akses berdasarkan ID
        $data['roleDetail'] = CoreRole_Model::find($id);
        $data['roleList'] = CoreRole_Model::get();
    
        // Cek jika data tidak ditemukan
        if (!$data['roleDetail'] ) {
            // Redirect ke route 'manageaccess.roleList' dengan pesan error jika tidak ditemukan
            return redirect()->route('manageaccess.configMenu.list')->with('error', 'Detail tidak ditemukan.');
        }
    
        // Return view dengan mengirim data yang ditemukan
        return view('layouts.manageAccess.manageConfigMenu_Detail', compact('data'));
    }
    

    public function configMenu_addPage(Request $request)
    {
        $data['roleList'] = CoreRole_Model::get();

        return view('layouts.manageAccess.manageConfigMenu_Add', compact('data'));
    }

    public function configMenu_saveData(Request $request)
    {
        // Validasi input
        $request->validate([
            'roleType'      => 'required|string|max:20',
            'roleCategory'  => 'required|string|max:20',
            'roleName'      => 'required|string|max:50|unique:CONFIG_ROLE,ROLE_NAME',
            'roleDesc'      => 'required|string|max:250',
            'roleStatus'    => 'required|string|max:1',
        ]);

        try {
            // Simpan data ke database (misalkan menggunakan model CoreUser_Model)
            CoreRole_Model::create([
                'ROLE_TYPE'     => strtoupper($request->input('roleType')),
                'ROLE_CATEGORY' => strtoupper($request->input('roleCategory')),
                'ROLE_NAME'     => strtoupper($request->input('roleName')),
                'ROLE_DESC'     => $request->input('roleDesc'),
                'ROLE_STATUS'   => $request->input('roleStatus'),
                'CREATED_BY'    => Auth::user()->USER_ID, 
                'CREATED_DT'    => now(), 
            ]);
        
            // Redirect ke route 'manageaccess.roleList' jika berhasil
            return redirect()->route('manageAccess.configMenu.list')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}
