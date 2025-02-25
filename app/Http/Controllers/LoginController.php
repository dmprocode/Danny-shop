<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function unauthorized(){
        return view('uathorrised.anauthorised');
    }
}
