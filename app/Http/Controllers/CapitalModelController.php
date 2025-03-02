<?php

namespace App\Http\Controllers;
use App\Models\Capital;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class CapitalModelController extends Controller
{
  // ================Capital Vieww====================

    public function capitalIndex(){
        if (auth::check() && auth()->user()->userRole == 'admin') {
            $user = auth()->user();
            $listOfUser =User::where('userRole','admin')->get();
            $adminComponents = [
                'user' => $user,
                'listOfUser' => $listOfUser
            ];
            return view('systeamAdmin.capital.capitalIndex',compact('adminComponents'));
        }
        return redirect()->route('login');
    }
}
