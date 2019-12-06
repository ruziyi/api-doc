<?php

namespace Weiwei\LaravelApiDoc\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->route()->getName() != 'doc/login') {
            $sessPass = Session::get('doc_pass');
            $docPass = Config::get('doc.pass');
            app('log')->debug($sessPass .'  '. $docPass);
            if ($sessPass !== md5($docPass)) {
                return redirect('doc/login');
            }
        }
        return $next($request);
    }
}
