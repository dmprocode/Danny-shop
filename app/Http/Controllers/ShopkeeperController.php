<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
  
    public function dashboardIndex(){
        return view('shopkeeper.shopkeeperDashboard.dashboardindex');
  }
  


}
