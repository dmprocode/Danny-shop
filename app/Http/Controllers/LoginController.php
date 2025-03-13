<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

use App\Model\User;



class LoginController extends Controller
{
    public function unauthorized(){       
        return view('uathorrised.anauthorised');
    }

    public function logout(Request $request){
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            
            return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
