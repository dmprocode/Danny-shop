<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

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
        $productId = Product::find($request->id);
       
        if ($productId) {
            $productId->update([
                'name' => $request->up_productname,
                'category' => $request->up_category,
                'buying_price' => $request->up_buying_price,
                'number_carton' => $request->up_number_of_catton,
                'number_pieces' => $request->up_picess,
                'color' => $request->up_color,
                'size' => $request->up_size,
                'measerments'  =>  $request->up_measerments,
            ]);
            return response()->json([
                'message' => 'Product Updated Successfully'
            ]);
        }
       
        
        
    }

    public function deleteProduct(Request $request){
        $productId = Product::find($request->delete_id)->delete();
        return response()->json([
            'message' => 'Product Deleted Successfully'
        ]);
    }


    //================+++Set products Price ================================


    public function productsPrice(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $productPrice = Product::latest()->get();
            
            $adminComponents =[
                'user'=> $user,
                'productPrice' => $productPrice,
            ];
            return view('systeamAdmin.products.productsPrice',compact('adminComponents','productPrice'));
        }
        return redirect()->route('unathorized');
    }

    public function setProductprice(Request $request){
        $validatedData = $request->validate([
            'sellingprice' => 'nullable|numeric|min:0',
            'priceper_dazeen' => 'nullable|numeric|min:0',
        ], [
            'sellingprice.numeric' => 'Selling price must be a valid number.',
            'sellingprice.min' => 'Selling price cannot be negative.',
    
            'priceper_dazeen.numeric' => 'Selling price per dozen must be a valid number.',
            'priceper_dazeen.min' => 'Selling price per dozen cannot be negative.',
        ]);
       $productid = Product::find($request->id);
       if ($productid) {
         $productid->update([
            'selling_price_per_piece'=> $request->sellingprice,
            'selling_price_per_dozen' => $request->priceper_dazeen,
       ]);
       return response()->json([
        'message' => 'Customer Added Successfully',
       ]);
    }
    }



    // ======================Products Sales ========================

    public function productSalesIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $productPrice = Product::latest()->get();
            $productList = Product::latest()->get();
            
            $adminComponents =[
                'user'=> $user,
                'productPrice' => $productPrice,
                'product' => $productList,
            ];
            return view('systeamAdmin.productsSales.productSalesIndex',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
    }


    public function customerIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $customer = User::where('userRole','customer')->get();
            
            $adminComponents =[
                'user'=> $user,
                'customers' => $customer,
            ];
            return view('systeamAdmin.productsSales.CustmerIndex',compact('adminComponents'));
        }
    }

    public function addCustomer(Request $request){
        $this->validate($request, [
            'customerName' => 'required|string|max:255',
            'phonenumber' => 'nullable|string|regex:/^[0-9+\-\s]+$/|min:7|max:15',
        ], [
            'customerName.required' => 'Customer name is required.',
            'customerName.string' => 'Customer name must be a valid string.',
            'customerName.max' => 'Customer name should not exceed 255 characters.',
            
            'phonenumber.regex' => 'Phone number can only contain numbers, spaces, dashes, and the plus sign.',
            'phonenumber.min' => 'Phone number must be at least 7 digits long.',
            'phonenumber.max' => 'Phone number should not exceed 15 digits.',
        ]);
        
        $userRole = 'customer';
        $customer=User::create([
            'fullname' => $request->customerName,
            'userRole' => $userRole,
        
        ]);
        return response()->json([
            'message' => 'Products Updated Successfully'
        ]);
        
        
    }
    


}
