<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function adminDashboard(){
        return view('systeamAdmin.adminDashboard.dashboardindex');

    }

    public function userTable(){
        return view('systeamAdmin.adminDashboard.usersIndex');
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
}
        
    

