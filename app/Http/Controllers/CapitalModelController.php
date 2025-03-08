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
            $capitalWithUser = User::with('capital')->get();
            $adminComponents = [
                'user' => $user,
                'listOfUser' => $listOfUser,
                'capitalUser' => $capitalWithUser
            ];
            return view('systeamAdmin.capital.capitalIndex',compact('adminComponents'));
        }
        return redirect()->route('login');
    }

    public function addCapital(Request $request){
        $this->validate($request, [
            'start_amount' => 'required|numeric|min:0',  
            'userRole' => 'required|not_in:Select',
        ], [
            'start_amount.required' => 'The start amount is required.',
            'start_amount.numeric' => 'The start amount must be a number.',
            'start_amount.min' => 'Negative number are not Allowed.',

            'userRole.required' => 'Please select a user role.',
            'userRole.not_in' => 'Invalid selection for user role.',
        ]);
        
        
        $addCapitalData = CapitalModel::create([
            'start_amount' => $request->start_amount,
            'user_id' => $request->userRole,
        ]);
        return response()->json([
            'message' => 'Capital Added Suucessfully'
        ]);
    }
    public function updateCapital(Request $request){

        $update_id = User::with('capital')->find($request->up_id);
        if ($update_id) {
            $update_id->update([
                'start_amount' => $request->start_amount,
                'update_amount' => $request->update_amouth,

            ]);
            $user_id = User::find($request->user_id);
            if ($user_id) {
                $user_id->update([
                    'fullname' => $request->addedBy

                ]);
                return response()->json([
                    'message' => 'Data Updated Successfully'
                ]);
            }


            
        }
      
    }


    public function changeCapital(){
        if (auth()->check() && auth()->user()->userRole == 'admin') {
             $user = auth()->user();
             $listOfUser =User::where('userRole','admin')->get();

             $adminComponents =[
                'user' => $user,
                'listOfUser' => $listOfUser
             ];
             return view(' systeamAdmin.capital.capitalChange   ',compact('adminComponents'));

        }
        return redirect()->route('login');
        
    }

    public function increaseCapital(Request $request){
       
        $this->validate( $request,[
        'change_amouth'=> 'required|numeric|min:0'
        ],[
            'change_amouth.required' => 'This Field Is Required',
            'change_amouth.numeric' => 'Please Select valid number',
            'change_amouth.min' => 'Negative number are not Allowed',


        ]);
        $changeCapital =  CapitalModel::create([
            'update_amount'=> $request->change_amouth,
            'added_by' => $request->userRole,

        ]);
        return response()->json([
            'message' => 'Capital Changed Successfully'
        ]);

    }
   
}
