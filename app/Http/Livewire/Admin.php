<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\EmployeeInformation;
use App\User;
use Illuminate\Support\Facades\Hash;

class Admin extends Component
{

    public $name,$tittle,$adress,$phone,$paid_leave,$email,$id_employee; 
    public $addMode,$editMode; 
    public function render()
    {
        $employees= EmployeeInformation::paginate(5);
        return view('livewire.admin',['employees'=> $employees]);
    }



    public function add()
    {
        $this->addMode=true;
    }

    public function close()
    {

        $this->addMode=false;
    }

    public function store()
    {
        $this->validate([
        'name' => 'required|min:3',
        'tittle' => 'required',
        'adress' => 'required',
        'email' => 'required',
        'phone' => 'required|numeric',
        'paid_leave' => 'required|numeric'
    ]);

    $user = new User;
    $user->email =$this->email;
    $user->name =$this->name;
    $user->role ='3';
    $user->password =Hash::make("doni123");
    $user->save();
    

    EmployeeInformation::create([
        'name' => $this->name,
        'tittle' => $this->tittle,
        'adress' => $this->adress,
        'phone' => $this->phone,
        'paid_leave' => $this->paid_leave,
        'user_id' => $user->id
    ]);

    }

    public function edit($id)
    {
        $employees= EmployeeInformation::find($id);
        $this->name =$employees->name;
        $this->tittle =$employees->tittle;
        $this->adress =$employees->adress;
        $this->phone =$employees->phone;
        $this->paid_leave =$employees->paid_leave;
        $this->id_employee =$employees->id;

        $employees= User::find($employees->user_id);

        // dd($employees);
        $this->email =$employees->email;


        $this->editMode=true;
    }

    public function update(){
        $employees= EmployeeInformation::find($this->id_employee);
        $employees->name   = $this->name ;
        $employees->tittle = $this->tittle;
        $employees->adress = $this->adress;
        $employees->phone  =$this->phone;
        $employees->paid_leave = $this->paid_leave ;
        $employees->save();


        $user= User::find($this->id_employee);
        $user->email =$this->email;
        $user->save();
    
    

    }

    public function logout()
    {
        app('App\Http\Livewire\Login')->logout();
    }


    public function detail()
    {
        
        app('App\Http\Livewire\Employee')->render(1);
    }

    


}
