<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
// use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;

use App\Paid_leave;
// use Validator;
class DepositController extends Controller
{
    //
    public function store(Request $request)
    {
        // $this->validate($request->all(),[
        //     'destination_bank' => 'required|numeric',
        // ]);

        // dd($request->username);
        $validate =Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'bank_origin' => ['required', 'string'],
            'destination_bank' => ['required', 'string',],
            'amount' => ['required', 'numeric'],
            'destination_bank' => ['required', 'string'],
        ]);


        if($validate->fails()){
    		return [
    			'error' => $validate->errors(),
    			'data' => false
    		];
    	}
        $deposit = new Deposit;
        $deposit->username = $request->username  ;
        $deposit->bank_origin =$request->bank_origin  ;
        $deposit->destination_bank = $request->destination_bank;
        $deposit->amount = $request->amount;
        $deposit->note = $request->note;
        $deposit->approval = "proccesed";
        $deposit->save();

        return array('Response'=>'succes');


}


public function index()
{

    // $paid_leaves= Paid_leave::with('employee')->get();
    // $paid_leaves2= Paid_leave::with('employee')->get();
    // dd($paid_leaves[0]['employee']['name']);
    // return $paid_leaves2;
}
}
