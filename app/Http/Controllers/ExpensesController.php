<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;  
use App\Models\Expenses;
use App\Models\CustomerProduct;
use App\Models\CapitalModel;


class ExpensesController extends Controller
{
    public function expenseseIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $expenses = Expenses::latest()->get();
            $todayTotalExpense = Expenses::whereDate('created_at', Carbon::today())->sum('amount');
            $adminComponents =[
                'user'=> $user,
                'expenses'=>$expenses,
                'todayTotalExpense' => $todayTotalExpense
            ];
            return view('systeamAdmin.expensesses.expensessesIndex',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
    }

    public function addExpensess(Request $request){

        $validated = $request->validate([
            'amouth' => 'required|numeric|min:0.01',
            'disc' => 'required|string|max:50',
            'date' => 'required|date|before_or_equal:today'
        ], [
            'amouth.required' => 'The expense amount is required.',
            'amouth.numeric' => 'Please enter a valid number for the amount.',
            'amouth.min' => 'The amount must be at least :min.',
            'disc.required' => 'Please provide a disc for the expense.',
            'disc.max' => 'The description cannot exceed :max characters.',
            'date.required' => 'The expense date is required.',
            'date.date' => 'Please enter a valid date.',
            'date.before_or_equal' => 'The date cannot be in the future.',
        ]);
        $formattedDate = Carbon::parse($request->date)->format('Y-m-j');

        $expenses = Expenses::create([
            'amount'=> $request->amouth,
            'description' => $request->disc,
            'date' => $formattedDate
        ]);
        
        return response()->json([
            'message' => 'Expenses Added Successfully'
        ]);
        
       
    }

    public function deleteExpensses(Request $request){

        $deleteExpenses = Expenses::find($request->expenses_id)->delete();

        return response()->json([
            'message' => 'Expenses Record Deleted Successfully'
        ]);
    }

    public function updateExpenses(request $request){

        $expenses_id = Expenses::find($request->ex_Id);
        if ($expenses_id) {
            $expenses_id->update([
              'amount' => $request->amouth,
              'description' => $request->disc

            ]);
            return response()->json([
                'message' => 'Expenses Record Updated Successfully'
            ]);
        }
        
    }

    public function profitExpensses(){ 

            if (auth()->check() && auth()->user()->userRole =='admin') {
                $user = auth()->user();
                $expenses = Expenses::latest()->get();
                $todayTotalExpense = Expenses::whereDate('created_at', Carbon::today())->sum('amount');
                $realExpennses = Expenses::whereDate('created_at',Carbon::today())->sum('amount');
                $realProfit = CustomerProduct::whereDate('created_at', Carbon::today())->sum('product_profit');
                $todayProfit = $realProfit-$realExpennses;
                $mycapital = CapitalModel::latest()->get();
                
                $adminComponents =[
                    'user'=> $user,
                    'expenses'=>$expenses,
                    'todayTotalExpense' => $todayTotalExpense,
                    'realProfit' => $realProfit,
                    'realExpennses' => $realExpennses,
                    'todayProfit' => $todayProfit,
                    'mycapital' => $mycapital
                ];
                return view('systeamAdmin.expensesses.expensesProfit',compact('adminComponents'));
            }
            return redirect()->route('unathorized');
        
    
    }
    
    
    public function addProfit(Request $request)
{
    $request->validate([
        'profit' => 'required|numeric|min:0.01',
    ]);

    $profit = $request->profit;

    // Get the latest manually-entered capital (no product_profit)
    $lastManualCapital = CapitalModel::whereNull('product_profit')
        ->orderBy('created_at', 'desc')
        ->first();

    if (!$lastManualCapital) {
        return response()->json([
            'error' => 'No base capital found to add profit to.'
        ], 422);
    }

    // Add profit to the base capital
    $newStartAmount = $lastManualCapital->start_amount + $profit;

    // Insert new record
    CapitalModel::create([
        'start_amount'    => $newStartAmount,
        'product_profit'  => $profit,
        'created_at'      => now(),
        'updated_at'      => now(),
    ]);

    return response()->json([
        'message' => 'Profit added successfully.',
        'new_start_amount' => $newStartAmount
    ]);
}

    


    public function deleteProfit(Request $request){
        $deleteProfit = CapitalModel::find($request->id)->delete();
        return response()->json([
            'message' => 'Profit Deleted Successfully'
        ]);
    }




}
