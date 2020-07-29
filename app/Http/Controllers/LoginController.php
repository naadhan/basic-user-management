<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1
        ])) {

            $user = User::where('email', $request->email)->first();
            if($user->isAdmin()) {
                return redirect()->route('admin');
            }
            return redirect()->route('user');
        }
        return redirect()->back()->withErrors(['msg' => 'Invalid login or your account is deactivated. Please contact the Administrator.']);
    }
}
