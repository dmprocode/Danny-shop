<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;



class ReportController extends Controller
{
    public function reportIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            // ========To day Parchasses===========
            $todayparchass = Purchase::with('product')->whereDate('created_at', Carbon::today())->get();
            $todayTotal = $todayparchass->sum(function($item) {
                return $item->buying_price * $item->number_catton;
            });
 //==================Products Solid out=================
$todaySoldOutProducts = Product::whereDate('updated_at', Carbon::today())
->with('costomers') 
->get();
dd($todaySoldOutProducts);
           $todaySolidoutProducts = User::with('products')->whereDate('created_at', Carbon::today())->get();
           dd($todaySolidoutProducts);
            $adminComponents =[
                'user'=> $user,
                'todayparchass' => $todayparchass,
                'todayTotal' => $todayTotal
            ];
            return view('systeamAdmin.Reports.toDayreports',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
        
    }
}
