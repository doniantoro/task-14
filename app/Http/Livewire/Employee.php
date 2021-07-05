<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\EmployeeInformation;

use App\Paid_leave;
use DateTime;
use Illuminate\Http\Request;
class Employee extends Component
{
    public $isModal;
    public $form;
    public $start,$end,$reason,$id_employee;
    public function render()
    {   
        $employees= EmployeeInformation::where('user_id',auth()->user()->id)->get();
        $paid_leaves= Paid_leave::where('id_employee',$employees['0']->id)->get();

        // dd($employees['0']->id);
        $this->id_employee=$employees['0']->id;
        return view('livewire.employee',['employees'=> $employees,'paid_leaves' => $paid_leaves]);
    }

       public function closeModal()
       {
           $this->isModal = false;
       }
   
       public function openModal()
       {
           $this->isModal = true;
       }

       public function apply_paid_leave()
       {

        $this->validate([
            'start' => 'required',
            'end' => 'required',
            'reason' => 'required',
        ]);

        $start  = new DateTime($this->start);
        $until = new DateTime($this->end);

        $now  = new DateTime();
        
        
         if($start<$now){

            session()->flash('message', 'Start date at least  today');
        }else if($start<$until){

            $user = new Paid_leave;
            $user->id_employee =$this->id_employee;
            $user->start =$this->start;
            $user->until =$this->end;
            $user->reason =$this->reason;
            $user->status ='proccessed';
            $user->save();

        }
        else{
            session()->flash('message', 'Start date must Early !!!');
        }
    

        $this->isModal = false;
           
       }

       public function logout()
       {
           
           app('App\Http\Livewire\Login')->logout();
       }

   
   
}
