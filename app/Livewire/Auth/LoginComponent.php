<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
    public $param = [];
    public $username, $password;

    public function render()
    {
        return view('livewire.auth.login-component')->layout('components.layouts.login.app');
    }

    public function login(){
        
        $this->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'ກະລຸນາປ້ອນ ຊື່ຜຸ້ໃຊ້ ກ່ອນ!',
            'password.required'=>'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ ກ່ອນ!',
        ]);

        if(Auth::attempt([
            'name'=> $this->username,
            'password'=> $this->password
        ]))
        {
                session()->flash('success', 'ເຂົ້າລະບົບສຳເລັດ');
                return redirect(route('dashboards'));
        }else{
            $this->dispatch('alert',type: 'error', message:'ຊື່ຜູ້ໃຊ້ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ, ກະລຸນາລອງໃໝ່!');
            $this->password = null;
        }
    }

    public function logout(){
        Auth::logout();
        session()->flash('success', 'ອອກລະບົບສຳເລັດ');
        return redirect(route('login'));
    }
}
