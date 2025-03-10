<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function productIndex(){
        
        if (auth()->check() && auth()->user()->userRole=='admin') {
            $user = auth()->user();
            $product = ProductModel::get();

            $totalBuyingPrice = ProductModel::select(DB::raw('SUM(buying_price * quantity) as total'))->value('total');
            
            $adminComponents =[
             'user' => $user,
             'products' => $product,
             'buyingPrice' =>  $totalBuyingPrice,
            ];
            return view('products.productsIndex.productIndex',compact('adminComponents'));
   
            
         }else{
           return redirect()->route('unathorized');
         }
            

        

    }


    public function addProducts(Request $request){
        $addproducts = ProductModel::create([
          'productname' => $request->productname,
          'buying_price'=> $request->buyingPrice,
          'quantity'=> $request->quanity,
          'selling_price'=> $request->sellingprice,

        ]);
        return redirect()->route('product-index');
       }
}
