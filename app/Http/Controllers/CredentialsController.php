<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CredentialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.editProfile');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->email],
//            'password' => 'required|confirmed|min:6',
            'actualPassword' => 'required'
        ]);

        $user = User::where('email', auth()->user()->email)->first();
        if( !Hash::check( $request->actualPassword, $user->password )){
            return back()->with('message', 'Password actual incorrecta');
        }

        $user->password = Hash::make( $request->password );
        $user->email = $request->email;
        $user->save();

        auth()->attempt( $request->only('email', 'password'), $request->remember );

        // Redirect
        return redirect()->route('posts.index', $user->username);

    }

}
