<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;
use App\Models\CustomerProduct;
use App\Models\Expenses;
use App\Models\CapitalModel;



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
        $productsSales = User::where('userRole', 'customer')
        ->whereHas('products', function ($query) {
            $query->whereDate('customer_products.created_at', Carbon::today());
        })
        ->with(['products' => function ($query) {
            $query->whereDate('customer_products.created_at', Carbon::today());
        }])
        ->latest()
        ->get();
        $todaySelling = CustomerProduct::whereDate('created_at', Carbon::today())->sum('pieceSellingPrice');
        $todayProfit = CustomerProduct::whereDate('created_at', Carbon::today())->sum('product_profit');
        $expenses = Expenses::whereDate('created_at',Carbon::today())->latest()->get();
        $todayTotalExpense = Expenses::whereDate('created_at', Carbon::today())->sum('amount');
        $netprofit = ($todayProfit)-($todayTotalExpense);
        $myCapital  = CapitalModel::sum('start_amount');

            $adminComponents =[
                'user'=> $user,
                'todayparchass' => $todayparchass,
                'todayTotal' => $todayTotal,
                'productsSales' => $productsSales,
                'todaySelling' => $todaySelling,
                'todayProfit' => $todayProfit,
                'expenses' => $expenses,
                'todayTotalExpense' => $todayTotalExpense,
                'netprofit' => $netprofit,
                'my_capital' => $myCapital,
            ];
            return view('systeamAdmin.Reports.toDayreports',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
        
    }
}