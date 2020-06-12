<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\RoleUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $role_ids = RoleUser::where('user_id', Auth::user()->id)->get();
                foreach ($role_ids as $role_id) {
                    if ($role_id->role_id != 2) {
                        return redirect()->route('home');
                    }
                }
                return redirect()->route('index');
            } else {
                return redirect()->route('login')->with('error', 'Sai email hoặc mật khẩu!');
            }
        } catch (\Exception $e) {

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
