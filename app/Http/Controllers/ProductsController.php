<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productIndex(){
        
        if (auth()->check() && auth()->user()->userRole=='admin') {
            $user = auth()->user();
            $adminComponents =[
             'user' => $user
            ];
            return view('products.productsIndex.productIndex',compact('adminComponents'));
   
            
         }else{
           return redirect()->route('unathorized');
         }
            

        

    }
}
