<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class registerController extends Controller
{

    public function _construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

       
        
        $this->validate($request,
        ['name' => 'required|max:255',
        'email' => 'required|max:255',
        'password'=>'required',
        ] );

        User::create(['name'=>$request->name,
                     'email'=>$request->email,
                     'password'=>Hash::make($request->password),]);

        auth()->attempt($request->only('email','password'));

        
        // sign in

       return redirect('filterpage');



        //store the user
        //sign the user in
        // redirect the user
    }
}
