<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class Login extends Component
{

    public $email;
    public $password;
    public function render()
    {
        if (Auth::check()) { 
        app('App\Http\Livewire\Student')->render();
        }
        return view('livewire.login');
    }

    public function login()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {

            if(Auth::user()->role == '1'){
                return redirect()->route('SuperAdmin');
            }
            
            if(Auth::user()->role == '3'){
                return redirect()->route('employee');
            }
            if(Auth::user()->role == '2'){
                return redirect()->route('admin');
            }
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
