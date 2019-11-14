<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;  // 追記

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

    protected $maxAttempts = 3;     // ログイン試行回数（回）

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/todo';  // RedirectsUsers.phpで定義されているredirectPath関数を参照。$maxAttemptsと同じような仕組みになっている。

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ここから
    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
    // ここまで追記

}

// AuthenticatesUsersトレイトをuse指定いる。
// @showLoginFormと@loginはAuthenticatesUsersトレイトに記述されている。