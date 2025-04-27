<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;   
use Carbon\Carbon;




class ParchassesController extends Controller
{
    public function parchassesIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $productsLists =  Product::latest()->get();

            $todayParchasses = Purchase::with('products')
                                ->whereDate('created_at', Carbon::today())
                                ->latest()
                                ->get();
                    $adminComponents =[
                'user'=> $user,
                'productsList' => $productsLists,
                'todayParchasses' => $todayParchasses
            ];
            return view('systeamAdmin.parchasess.parchassesIndex',compact('adminComponents'));
        }       
         return redirect()->route('unathorized');

    }

    public  function productParchassesPrice(Request $request){

        $productsId = $request->productPrice;
        if ($productsId) {
            $producttsPrice = Product::find($productsId);
            return response()->json([
                'producttsPrice' => $producttsPrice
            ]);
        }

        
    }


    public  function addParchasses(Request $request){   
            
        $request->validate([
            'buying_price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'number_of_catton' => 'required|integer|min:1',
            'number_of_pieces' => 'nullable|integer|min:0',
            'product_name' => 'not_in:Select|string|max:255',
            'salesPoint' => 'nullable|string|max:255',
        ], [
            'buying_price.required' => 'Buying price is required.',
            'buying_price.numeric' => 'Buying price must be a valid number.',
            'buying_price.min' => 'Buying price cannot be negative.',
        
            'category.required' => 'Please select a product category.',
            'category.string' => 'Category must be a text value.',
        
            'number_of_catton.required' => 'Number of cartons is required.',
            'number_of_catton.integer' => 'Carton count must be a whole number.',
            'number_of_catton.min' => 'You must have at least 1 carton.',
        
            'number_of_pieces.integer' => 'Pieces must be a whole number.',
            'number_of_pieces.min' => 'Pieces cannot be negative.',
        
            'product_name.required' => 'Product name is required.',
            'product_name.string' => 'Product name must be a valid text.',
        
            'salesPoint.string' => 'Sales point must be a valid text field.',
        ]);

        $purchase = Purchase::create([
            'product_id'       => $request->product_name,
            'buying_price'     => $request->buying_price,
            'number_catton'    => $request->number_of_catton,
            'number_picess'    => $request->number_of_pieces ?? 0, // fallback if null
            'sales_point'      => $request->salesPoint,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Purchase recorded successfully!',
            'data'    => $purchase,
        ]);
        
                          
        

    }


    public function updatePachasses(Request $request){

        $parchassess_id = Purchase::find($request->id);
        if ($parchassess_id) {

            $parchassess_id->update([
                'buying_price' => $request->buying_price,
                'number_catton'=> $request->up_catton,
                'number_picess'=> $request->parchasses_picess,
                'sales_point'=> $request->salePoint
            ]);

            $parchassess_id->products->update([
                'name' => $request->productsname
            ]);
            return response()->json([
                'message' => 'Parchasses Updated Successfully'
            ]);     
        
        }
        
    }


    public function deleteParchasses(Request $request){
        $deleteId = Purchase::find($request->delete_id)->delete();
        return response()->json([
            'message' => 'Parchasses Deleted Successfully'
        ]);
    }


    public function latestParchasses(){

        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $parchassesList = Purchase::with('products')->latest()->get();
             $adminComponents =[
                'user'=> $user,
                'parchassesList' => $parchassesList
            ];
            return view('systeamAdmin.parchasess.latestParchasses',compact('adminComponents'));
        }       
         return redirect()->route('unathorized');
    }


    public function viewMoreParchasses($product_id){

        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $parchassesWithProducts = Purchase::with('products')->where('id',$product_id)->get();
            $viewMoreParchasses = Purchase::where('id', $product_id)->sum('buying_price');
            
             $adminComponents =[
                'user'=> $user,
                'parchassesWithProduct' => $parchassesWithProducts,
                'viewMoreParchasses' => $viewMoreParchasses

            ];
            return view('systeamAdmin.parchasess.viewMoreParchasses',compact('adminComponents'));
        }       
         return redirect()->route('unathorized');
        

       
    }
}
