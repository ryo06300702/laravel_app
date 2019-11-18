<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;  // 追記

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass)
    {
        $this->middleware('auth');
        $this->todo = $instanceClass;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->getByUserId(Auth::id()); // Collectionインスタンス
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();  // $input内にuser_idをkeyとして持つ値はない。
        $input['user_id'] = Auth::id();  // all()で取得した配列に user_id = Auth::id() のkey = valueを格納している。
        $this->todo->fill($input)->save();
        return redirect()->route('todo.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', compact('todo')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->todo->find($id)->fill($input)->save();
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}






// $user = Auth::user();  //Userインスタンスを格納。
// ↓
// User {#245 ▼
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
//     +wasRecentlyCreated: false
//     #attributes: array:8 [▶]
//     #original: array:8 [▼
//       "id" => 2
//       "name" => "あいうえお"
//       "email" => "aiueo@gmail.com"
//       "email_verified_at" => null
//       "password" => "$2y$10$RXkwy2jKP5oYxxyRFlUZoOucX9.fXghP/CopODG.i3pKZH0HfdGka"
//       "remember_token" => null
//       "created_at" => "2019-09-17 10:11:17"
//       "updated_at" => "2019-09-17 10:11:17"
//     ]
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
//   }