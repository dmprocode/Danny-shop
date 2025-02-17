<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminDashboard(){
        return view('systeamAdmin.adminDashboard.dashboardindex');

    }

    public function userTable(){
        return view('systeamAdmin.adminDashboard.usersIndex');
    }
}
