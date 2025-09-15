<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\User;
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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check if this is an admin email
        $email = $request->input('email');
        $admin = Admin::where('email', $email)->first();
        
        if ($admin) {
            // This is an admin, use admin guard
            return $this->attemptAdminLogin($request);
        } else {
            // This is a regular user, use web guard
            return $this->attemptUserLogin($request);
        }
    }

    /**
     * Attempt to log in as an admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function attemptAdminLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $remember = $request->filled('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admins.dashboard'));
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Attempt to log in as a regular user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function attemptUserLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $remember = $request->filled('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectPath());
        }

        return $this->sendFailedLoginResponse($request);
    }
}
