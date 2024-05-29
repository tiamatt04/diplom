<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function authorization(AuthorizationRequest $request)
    {
        if (Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->route('/');
        }
        return back();
    }

    public function register(RegistrationRequest $request)
    {
        $request = $request->validated();
        $request['password'] = Hash::make($request['password']);
        User::create($request);
        return redirect()->route('auth');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('main');
    }

}
