<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;  
use App\Models\Expenses;

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
}
