<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
use App\Models\ProductStore;

class ProductStoreController extends Controller
{
    
public function productStore(){
    if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $productList = Product::latest()->get();


     $productStore = ProductStore::with('product')->latest()->get();
            $adminComponents =[
                'user'=> $user,
                'product'=> $productList,
                'product_store' =>$productStore
            ];
           
            return view('systeamAdmin.products.productStoreIndex',compact('adminComponents'));

        }
        return redirect()->route('unathorized');
    
}


// =============add product store============
    public function addProductStore(Request $req){
        $validated = $req->validate([
        'product_id' => 'required|integer|exists:products,id|unique:product_stores,product_id',
        'numberOfCtn' => 'required|integer|min:1'
    ], [
        'product_id.required' => 'Please select a product',
        'product_id.integer' => 'Invalid product format',
        'product_id.exists' => 'Selected product does not exist in database',
        'product_id.unique' => 'This product is already added to the store',
        'numberOfCtn.required' => 'Number of cartons is required',
        'numberOfCtn.integer' => 'Number of cartons must be a whole number',
        'numberOfCtn.min' => 'Number of cartons must be at least 1'
    ]);

    $addStoreProduct = ProductStore::create([
        'product_id' => $req->product_id,
        'number_of_cartons' => $req->numberOfCtn,
    ]);

    return response()->json([
        'status'=>200,
        'message' =>'Product Added Successfully'
    ]);

    
       
    }
    public function updateProductStore(Request $req){
        

     $productId =ProductStore::find($req->id);
     if(!$productId){
        return response()->json([
            'message' =>'Product not Found'
        ]);
     }
     
     $productId->update([
        'number_of_cartons' => $req->number_of_cartons
     ]);
     $productId->product->update([
        'name'=>$req->name
     ]);
     return response()->json([
            'message' => 'Product Updated  successfully'
        ]);
      
    }
    public function deleteProductStore(Request $req){
        $deleteProduct = ProductStore::find($req->delete_store_product_id);
        if (!$deleteProduct) {
            return response()>json([
                'message' => 'No Product Found'
            ]);
        };
        $deleteProduct->delete();

        return response()->json([
            'message'=> 'Product Deleted Successfully'
        ]);
    }

}
