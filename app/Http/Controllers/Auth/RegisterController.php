<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)  // $this->validator($request->all())で配列を受け取っている。
    {
        return Validator::make($data, [  // Validatorインスタンスを返す。
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',  // _confirmation
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([  // Userインスタンスを返している。
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}




// protected function validator(array $data)の
// $dataには
// array:5 [▼
//   "_token" => "Abd0nNhyOjgZcyEq6eIvW9yFAasRmMhCmd5B2Bp2"
//   "name" => "c"
//   "email" => "cde@gmail.com"
//   "password" => "cdefghi"
//   "password_confirmation" => "cdefghi"
// ]
// が格納されている。


// protected function create(array $data)には
// array:5 [▼
//   "_token" => "iRecRecey9B9596v6koxQ4nbuFayRGVnsNR3LW6n"
//   "name" => "d"
//   "email" => "defg@gmail.com"
//   "password" => "defghij"
//   "password_confirmation" => "defghij"
// ]
// が格納されている。



// Validator::make($data, [
//     'name' => 'required|string|max:255',
//     'email' => 'required|string|email|max:255|unique:users',
//     'password' => 'required|string|min:6|confirmed',
// ]);
// この中には、
// Validator {#239 ▼
//     #translator: Translator {#119 ▶}
//     #container: Application {#2 ▶}
//     #presenceVerifier: DatabasePresenceVerifier {#238 ▶}
//     #failedRules: []
//     #messages: null
//     #data: array:5 [▼
//       "_token" => "Abd0nNhyOjgZcyEq6eIvW9yFAasRmMhCmd5B2Bp2"
//       "name" => "c"
//       "email" => "cde@gmail.com"
//       "password" => "cdefghi"
//       "password_confirmation" => "cdefghi"
//     ]
//     #initialRules: array:3 [▼
//       "name" => "required|string|max:255"
//       "email" => "required|string|email|max:255|unique:users"
//       "password" => "required|string|min:6|confirmed"
//     ]
//     #rules: array:3 [▼
//       "name" => array:3 [▼
//         0 => "required"
//         1 => "string"
//         2 => "max:255"
//       ]
//       "email" => array:5 [▼
//         0 => "required"
//         1 => "string"
//         2 => "email"
//         3 => "max:255"
//         4 => "unique:users"
//       ]
//       "password" => array:4 [▼
//         0 => "required"
//         1 => "string"
//         2 => "min:6"
//         3 => "confirmed"
//       ]
//     ]
//     #currentRule: null
//     #implicitAttributes: []
//     #distinctValues: []
//     #after: []
//     +customMessages: []
//     +fallbackMessages: []
//     +customAttributes: []
//     +customValues: []
//     +extensions: []
//     +replacers: []
//     #fileRules: array:9 [▶]
//     #implicitRules: array:10 [▶]
//     #dependentRules: array:18 [▶]
//     #sizeRules: array:8 [▶]
//     #numericRules: array:2 [▶]
//   }
//   が格納されている。


// dd(User::create([
//     'name' => $data['name'],
//     'email' => $data['email'],
//     'password' => Hash::make($data['password']),
// ]));
// ↓
// User {#247 ▼
//     #fillable: array:3 [▶]
//     #hidden: array:2 [▶]
//     #connection: "mysql"
//     #table: "users"
//     #primaryKey: "id"
//     #keyType: "int"
//     +incrementing: true
//     #with: []
//     #withCount: []
//     #perPage: 15
//     +exists: true
//     +wasRecentlyCreated: true
//     #attributes: array:6 [▼
//       "name" => "a"
//       "email" => "aaaaaaaaaa@gmail.com"
//       "password" => "$2y$10$02KdR5ze3xZ1aRXlHO5Zheik.kvNwmJ.OtOTz7xMVBt53sZzURSri"
//       "updated_at" => "2019-09-11 06:00:00"
//       "created_at" => "2019-09-11 06:00:00"
//       "id" => 7
//     ]
//     #original: array:6 [▶]
//     #changes: []
//     #casts: []
//     #dates: []
//     #dateFormat: null
//     #appends: []
//     #dispatchesEvents: []
//     #observables: []
//     #relations: []
//     #touches: []
//     +timestamps: true
//     #visible: []
//     #guarded: array:1 [▶]
//     #rememberTokenName: "remember_token"