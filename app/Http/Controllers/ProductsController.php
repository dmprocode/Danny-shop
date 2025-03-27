<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function productIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $products = Product::latest()->get();
            $adminComponents =[
                'products' =>  $products,
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
        'buying_price' => 'required|numeric|min:0',
        'price_per_item' => 'nullable|numeric|min:0',
        'selling_price_pice' => 'nullable|numeric|min:0',
        'number_of_dazzen' => 'nullable|integer|min:0',
        'number_of_catton' => 'required|integer|min:1',
        'number_of_pieces' => 'nullable|integer|min:1',

        'color' => 'nullable|string|max:50',
        'size' => 'nullable|string|max:50',
        'user_id' => 'nullable|exists:users,id', // Ensures the user exists
    ], [
        'product_name.required' => 'Product name is required.',
        'product_name.unique' => 'This product name already exists.',
        'product_image.image' => 'The file must be an image.',
        'category.required' => 'Please select a product category.',
        'category.not_in' => 'Please select Valid product category.',
        'buying_price.required' => 'Price is required.',
        'buying_price.numeric' => 'Price must be a valid number.',
        'number_of_catton.required' => 'Number of cartons is required.',
        'selling_price_pice.numeric' => 'The selling price per piece must be a valid number.',
        'selling_price_pice.min' => 'The selling price per piece cannot be a negative value.',
    ]);

   
    if ($request->hasFile('product_image')) {
        $imagePath = $request->file('product_image')->store('products', 'public');
    } else {
        $imagePath = null;
    }

    $product = Product::create([
        'name' => $request->product_name,
        'image' => $imagePath,
        'category' => $request->category,
        'buying_price' => $request->buying_price,
        'number_carton' => $request->number_of_catton,
        'number_pieces' => $request->number_of_pieces,
        'measerments' => $request->measerments,
        'price_per_dozen' => $request->price_per_dozen,
        'selling_price_per_piece' => $request->selling_price_per_piece,
        'selling_price_per_dozen' => $request->selling_price_per_dozen,
        'color' => $request->color,
        'size' => $request->size,
        'number_of_set' => $request->numset,
    ]);

    
    
    return response()->json(['message' => 'Product added successfully!']);
    
}

    public function updateProducts(Request $request){
        return response()->json([
            'message' => $request->all()
        ]);
        $product_id = Product::find($request->id);
        if ($product_id) {
            $product_id->update([
                'name' => $request->productname,
                'category' => $request->category,
                'price' =>  $request->price,
                'price_per_item' =>  $request->buying_price,
                'selling_price_per_item' =>  $request->price,
                'price' =>  $request->price,
                'price' =>  $request->price,
                'price' =>  $request->price,

            ]);
        }
        return response()->json([
            'message' => $product_id,
        ]);
        
    }

}
