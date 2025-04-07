<?php

namespace App\Http\Controllers;

use App\Models\CoreUser_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Cache\RateLimiter;

class Login_Controller extends Controller
{

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->tooManyAttempts(
            $this->throttleKey($request), 5, 1 // 5 percobaan dalam 1 menit
        );
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('layouts.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:15',
            'password' => 'required|string'
        ]);

        // Sanitasi dan normalisasi input
        $username = strtoupper(htmlspecialchars(trim($credentials['username']), ENT_QUOTES, 'UTF-8'));
        $password = strtoupper(htmlspecialchars(trim($credentials['password']), ENT_QUOTES, 'UTF-8'));

        if (strlen($username) > 15) {
            return back()->withErrors(['username' => 'The username field must not be greater than 15 characters.']);
        }

        $user = CoreUser_Model::where('USER_ID', $username)->first();
        
        if ($user) {
            // Check Web Access:
            if (empty($user->MNG_WEB) or ($user->MNG_WEB !== 'Y')){
                return back()->withErrors(['username' => 'Users do not have access']);
            }

            // Verifikasi password Base64
            if (base64_encode($password) === $user->USER_PASSWORD) {
                Auth::login($user, $request->has('remember'));

                // Regenerasi session dan simpan data user
                $request->session()->regenerate();
                Session::put('user_session', [
                    'user_id' => $user->USER_ID,
                    'user_name' => $user->USER_NAME,
                    'last_login' => now()
                ]);

                Log::info('User logged in', ['user_id' => $user->USER_ID]);
                
                return redirect()->intended(route('dashboard'));
            }
        }

        Log::warning('Failed login attempt', ['username' => $username]);
        return back()->withErrors([
            'username' => 'Make sure the username or password matches',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Log::info('User logged out', ['user_id' => Auth::id()]);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}