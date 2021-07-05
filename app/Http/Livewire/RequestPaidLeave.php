<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\EmployeeInformation;
use App\Paid_leave;
use DateTime;

class RequestPaidLeave extends Component
{


    public $status;
    public function render()
    {


        $paid_leaves= Paid_leave::with('employee')->where('status','!=','proccessed')->get();
        $paid_leaves2= Paid_leave::with('employee')->where('status','proccessed')->get();
        // dd($paid_leaves2);
        return view('livewire.request-paid-leave',['paid_leaves'=>$paid_leaves,'paid_leaves2'=>$paid_leaves2]);
    }



    public function update($id)
    {
        $paid_leave= Paid_leave::find($id);
        $paid_leave->status =$this->status[$id];
        $paid_leave->save();
        
        $until  = new DateTime($paid_leave->until); //Waktu awal
        $start = new DateTime($paid_leave->start);
        $result  = $until->diff($start);


        if($this->status[$id]=="approved"){
            $employees= EmployeeInformation::find($paid_leave->id_employee);
            $employees->paid_leave=$employees->paid_leave-$result->format('%d');
            $employees->save();

        }


    }

    public function logout()
    {
        
        app('App\Http\Livewire\Login')->logout();
    }

}
