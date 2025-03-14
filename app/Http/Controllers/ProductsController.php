<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

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

    public function addProducts(Request $request){
        $this->validate($request,[
                'product_name' =>'required|string|max:255|unique:products,name',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category' => 'required|string|max:255',
                'product_price' => 'required|numeric|min:0',
                'product_quantity' => 'required|integer|min:1',
                'product_iteams' => 'required|integer|min:1',
                'classification' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:50',
                'size' => 'nullable|string|max:50',
            ], [
                'product_name.required' => 'The product name is required.',
                'product_name.unique' => 'This product name already exists. Please use a different name.',                'category.required' => 'Please select a valid category.',
                'product_price.required' => 'Product price is required.',
                'product_price.numeric' => 'Price must be a valid number.',
                'product_price.min' => 'Price cannot be negative.',
                'product_quantity.required' => 'Product quantity is required.',
                'product_quantity.integer' => 'Quantity must be a whole number.',
                'product_quantity.min' => 'Quantity must be at least 1.',
                'product_iteams.required' => 'Number of items is required.',
                'product_iteams.integer' => 'Items must be a whole number.',
                'imaproduct_imagege.image' => 'Uploaded file must be an image.',
                'product_image.mimes' => 'Only JPEG, PNG, JPG, GIF, and SVG images are allowed.',
                'product_image.max' => 'Image size must not exceed 2MB.',
        ]);
        
    }
}
