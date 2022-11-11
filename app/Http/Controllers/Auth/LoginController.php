<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
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

    public function LoginManual(Request $request)
    {
        $email = User::where('email', $request->email)->first();
        if (!$email) {
            return redirect()->back()->with('error','Email anda tidak ditemukan!');;
        } else {
            if (!Hash::check($request->password, $email->password)) {
                return redirect()->back()->with('error','Password anda salah!');
            } else {
                $user = User::find($email->id_user);
                Auth::login($user);
                return redirect('admin');
            }
        }
    }
}
