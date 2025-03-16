<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductsController extends Controller
{
    public function productIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $adminComponents =[
                'user'=> $user,
            ];
            return view('systeamAdmin.products.productIndex',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
    }

    public function addProducts(Request $request)
{
    $validatedData = $request->validate([
        'product_name' => 'required|string|unique:products,name|max:255',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        'category' => 'required|not_in:Select Product Category|string|max:100',
        'price' => 'required|numeric|min:0',
        'price_per_item' => 'nullable|numeric|min:0',
        'selling_price_per_item' => 'nullable|numeric|min:0',
        'number_of_set' => 'nullable|integer|min:0',
        'number_of_catton' => 'required|integer|min:1',
        'number_of_pieces' => 'required|integer|min:1',
        'color' => 'nullable|string|max:50',
        'size' => 'nullable|string|max:50',
        'user_id' => 'nullable|exists:users,id', // Ensures the user exists
    ], [
        'product_name.required' => 'Product name is required.',
        'product_name.unique' => 'This product name already exists.',
        'product_image.image' => 'The file must be an image.',
        'category.required' => 'Please select a product category.',
        'category.not_in' => 'Please select Valid product category.',
        'price.required' => 'Price is required.',
        'price.numeric' => 'Price must be a valid number.',
        'number_of_catton.required' => 'Number of cartons is required.',
        'number_of_pieces.required' => 'Number of pieces is required.',
    ]);

    // Store product
    // $product = Product::create($validatedData);

    return response()->json(['message' => 'Product added successfully!', 'product' => $product]);
}

}
