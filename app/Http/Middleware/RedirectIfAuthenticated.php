<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {  // ログインをしていたら/homeへリダイレクト。引数にNullを入れたい？Authクラスは実行しているユーザーに対してのデータを持ってくる。
            return redirect('/home');
        }
        return $next($request);  // 処理の継続。$requestの中のResponseインスタンスをreturnで返してる？
    }
}


// RedirectIfAuthenticatedファイルのhandleの引数：ログアウト時
// ・$requestの値
// →Requestインスタンス

// ・$nextの値
// →Closure($passable)インスタンス

// ・$guard
// →null（ログアウト時）

// ・Auth::guard($guard)
// →SessionGuardインスタンス。config/session.phpで設定している？

// ・Auth::guard($guard)->check()
// →false（ログアウト時）


// RedirectIfAuthenticatedファイルのhandleの引数：ログイン時
// ・Auth::guard($guard)->check()
// →true
// ・$guard
// →null

// ・$next($request)
// →Responseインスタンスが格納されている。
