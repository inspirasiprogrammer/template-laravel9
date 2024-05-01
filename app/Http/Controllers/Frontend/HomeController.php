<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a home page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @param  Request 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return view('frontend.register');
    }


    /**
     * register a user with plan
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user              = new User;
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->role        = 'user';
        $user->status      = 1;
        $user->authkey     = $this->generateAuthKey();
        $user->password    = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect('/user/dashboard');
    }

    /**
     * generate auth key
     */
    public function generateAuthKey()
    {
        $rend = Str::random(50);
        $check = User::where('authkey', $rend)->first();

        if ($check == true) {
            $rend = $this->generateAuthKey();
        }
        return $rend;
    }
}
