<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopkeeperController extends Controller
{
  
    public function dashboardIndex(){
      if (auth()->check() && auth()->user()->userRole=='shopkeeper') {
         $user = auth()->user();
         $shopkpeerComponts =[
          'user' => $user
         ];
         return view('shopkeeper.shopkeeperDashboard.dashboardindex',compact('shopkpeerComponts'));

         
      }else{
        return redirect()->route('unathorized');
      }
  }
  


}
