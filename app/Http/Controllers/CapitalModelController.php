<?php

namespace App\Http\Controllers;
use App\Models\CapitalModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class CapitalModelController extends Controller
{
  // ================Capital Vieww====================

    public function capitalIndex(){
        if (auth::check() && auth()->user()->userRole == 'admin') {
            $user = auth()->user();
            $listOfUser =User::where('userRole','admin')->get();
            $adminComponents = [
                'user' => $user,
                'listOfUser' => $listOfUser
            ];
            return view('systeamAdmin.capital.capitalIndex',compact('adminComponents'));
        }
        return redirect()->route('login');
    }

    public function addCapital(Request $request){
        $this->validate($request, [
            'start_amount' => 'numeric',  
            'userRole' => 'required|not_in:Select',
        ], [
            'start_amount.numeric' => 'The start amount must be a number.',
            'userRole.required' => 'Please select a user role.',
            'userRole.not_in' => 'Invalid selection for user role.',
        ]);
        
        $checkCapital = CapitalModel::sum('start_amount');
        if ($checkCapital > 0) {
            return response()->json([
                'status' => 201,
                'message' => ';You need To update Capital'
            ]);
        }
        
            $updatedCapital = CapitalModel::create([
                'update_amount' => $request->updatedAmouth
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Capital Updated Successfully'
            ]);
        
        
               
        
       
    }
}
