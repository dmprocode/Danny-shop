<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Carbon\Carbon;


class UserController extends Controller
{
    public function loginIndex(){
        return view('Login.index');
    }
     

    public function loginForm(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:10'
        ], [
            'email.required' => 'User Email is Required',
            'email.email' => 'Please Select a Valid Email',
            'password.required' => 'Password Field Is required',
            'password.min' => 'Password cannot be less than 6 characters',
            'password.max' => 'Password cannot exceed 10 characters'
        ]);

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
           $user = auth()->user();
           session(['user_role', $user->userRole]);
           if ($user->userRole == 'admin') {

              return redirect()->route('admin-dashboard')->with('message','Welcame Admin');
            }
            else if($user->userRole == 'shopkeeper'){
                return redirect()->route('shopkeeper-dashboard')->with('message' ,'Hello Cathy');
            }
           
          
        }
    
    }
    

    public function adminDashboard(){
        
        if (auth()->check() && auth()->user()->userRole === 'admin') {
            $user = auth()->user();
            $adminComponents =[
                'user' =>  $user,
            ];
            return view('systeamAdmin.adminDashboard.dashboardindex',compact('adminComponents'));
        } else {
            return redirect()->route('unathorized')->with('error', 'You have no access to this page');
        }
        
       
      

    }

    public function userTable(){
        if (auth()->check() && auth()->user()->userRole == 'admin') {
            $user = auth()->user();
            $systeamUser = User::latest()->get();
            $adminComponents=[
                'user'=> $user,
                 'users' => $systeamUser
            ];
            return view('systeamAdmin.adminDashboard.usersIndex',compact('adminComponents'));
    } 
    return redirect()->route('login');
        

}

    public function addUsers(Request $request){
        $validatedData = $request->validate([
            'fullname'   => 'required|string|min:3|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'dob'        => 'required|before:today',
            'userRole'   => 'required|in:admin,shopkeeper,customer',
            'userImage'  => 'image|mimes:jpeg,png,jpg|max:2048',
            'gender'     => 'required|in:Male,Female',
        ], [
            'fullname.required'   => 'Please enter your fullname.',
            'fullname.min'        => 'Full name must be at least 3 characters.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Enter a valid email address.',
            'email.unique'        => 'This email is already registered.',
            'password.required'   => 'Password is required.',
            'password.min'        => 'Password must be at least 6 characters.',
            'dob.required'        => 'Please enter your date of birth.',
            'dob.before'          => 'Date of birth must be in the past.',
            'userRole.required'   => 'Please select a user role.',
            'userRole.in'         => 'Invalid role selected.',
            'userImage.image'     => 'The file must be an image.',
            'userImage.mimes'     => 'Only JPEG, PNG, and JPG formats are allowed.',
            'userImage.max'       => 'Image size must not exceed 2MB.',
            'gender.required'     => 'Please select your gender.',
            'gender.in'           => 'Gender must be Male or Female.',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('userImage')) {
            $image = $request->file('userImage');
            $imagePath = $image->store('userImage', 'public');
        }

        $password = Hash::make($request->password);
        $dob = Carbon::parse($request->dob)->format('Y-m-d');

    
        // Create New User
        $user = User::create([
            'fullname'     => $request->fullname,
            'email'    => $request->email,
            'password' => $password,
            'dob'=> $dob,
            'userRole'=> $request->userRole,
            'address'  => $request->address,
            'gender'   => $request->gender,
            'userImage'    => $imagePath,
        ]);
    
        return response()->json([
            'message' => 'User added successfully!',
        ]);
    }

    public function updateUser(Request $request){
        $user_id = User::find($request->up_id);
        if ($user_id) {
            $user_id->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'userRole' => $request->userRole,
                'address' => $request->address,

            ]);
            return response()->json([
                'status'=>200,
                'message' => 'User Updated Successfully'
            ]);
        }
        return response()->json([
            'message' => 'Something Same thing went wrong'
        ]);

        
    }


   
}
        
    

