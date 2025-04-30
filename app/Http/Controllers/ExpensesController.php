<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function expenseseIndex(){
        if (auth()->check() && auth()->user()->userRole =='admin') {
            $user = auth()->user();
            $adminComponents =[
                'user'=> $user,
            ];
            return view('systeamAdmin.expensesses.expensessesIndex',compact('adminComponents'));
        }
        return redirect()->route('unathorized');
    }
}
