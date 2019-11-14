<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        return route('login');
    }
}


// dd($request);
// ↓
// Request {#42 ▼
//     #json: null
//     #convertedFiles: null
//     #userResolver: Closure($guard = null) {#175 ▶}
//     #routeResolver: Closure() {#177 ▶}
//     +attributes: ParameterBag {#44 ▶}
//     +request: ParameterBag {#50 ▶}
//     +query: ParameterBag {#50 ▶}
//     +server: ServerBag {#46 ▼
//       #parameters: array:26 [▶]
//     }
//     +files: FileBag {#47 ▶}
//     +cookies: ParameterBag {#45 ▶}
//     +headers: HeaderBag {#48 ▶}
//     #content: null
//     #languages: null
//     #charsets: null
//     #encodings: null
//     #acceptableContentTypes: null
//     #pathInfo: "/home"
//     #requestUri: "/home"
//     #baseUrl: ""
//     #basePath: null
//     #method: "GET"
//     #format: null
//     #session: Store {#214 ▶}
//     #locale: null
//     #defaultLocale: "en"
//     -isHostValid: true
//     -isForwardedValid: true
//     basePath: ""
//     format: "html"
//   }