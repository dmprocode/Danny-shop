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
            $capitalWithUser = User::whereHas('capital')->with('capital')->get();
            $adminComponents = [
                'user' => $user,
                'listOfUser' => $listOfUser,
                'capitalUser' => $capitalWithUser,
            
            ];
            return view('systeamAdmin.capital.capitalIndex',compact('adminComponents'));
        }
        return redirect()->route('login');
    }

    public function checkCapital(Request $request){

        if (auth::check() && auth()->user()->userRole == 'admin') {
            $user = auth()->user();
            $initialInvstement = CapitalModel::sum('start_amount');
            if($initialInvstement > 0){
                return response()->json([
                    'status' => 600,
                    
                ]);
            }
            $adminComponents = [
                'user' => $user,
                'initialInvstement' => $initialInvstement
            
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
              $userWithCapital = User::with('capital')->get();
              $capitalAllocation = CapitalModel::sum('start_amount');
             $fatherInvestimeants = CapitalModel::sum('update_amount');
             $adminComponents =[
                'user' => $user,
                'listOfUser' => $listOfUser,
                'userWithCapital' => $userWithCapital,
                'capitalAllocation' =>  $capitalAllocation,
                'fatherInvestimeants'=>$fatherInvestimeants
             ];
             return view(' systeamAdmin.capital.capitalChange   ',compact('adminComponents'));

        }
        return redirect()->route('login');
        
    }

    public function increaseCapital(Request $request){
       
        $this->validate($request, [
            'change_amouth' => 'required|numeric|min:0',
            'userRole' => 'required|numeric|not_in:Select',
        ], [
            'change_amouth.required' => 'This field is required.',
            'change_amouth.numeric' => 'Please enter a valid number.',
            'change_amouth.min' => 'Negative numbers are not allowed.',
            
            'userRole.required' => 'The user role field is required.',
            'userRole.numeric' => 'The user role must be a number.',
            'userRole.not_in' => 'Please select a valid user role.',
        ]);
        
        $changeCapital =  CapitalModel::create([
            'update_amount'=> $request->change_amouth,
            'user_id' => $request->userRole

        ]);
        return response()->json([
            'message' => 'Capital Changed Successfully'
        ]);

    }
    public function updateCapitalDetails(Request $request)
    {
        $request->validate([
            'up_id' => 'required|exists:capital_models,id',
            'investiments' => 'required|numeric|min:0'
        ]);
    
        $capital = CapitalModel::find($request->up_id);
    
        if ($capital) {
            $capital->update([
                'update_amount' => $request->investiments
            ]);
    
            return response()->json([
                'message' => 'Capital Updated Successfully',
                'status' => 200
            ]);
        }
    
        return response()->json([
            'message' => 'Capital record not found',
            'status' => 404
        ], 404);
    }
    
}
