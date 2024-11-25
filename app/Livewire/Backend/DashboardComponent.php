<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Subject;
use Livewire\Attributes\On;

class DashboardComponent extends Component
{
    public $count, $data;
    public $date, $name, $total, $registed, $selected, $expire;

    public function mount(){
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        $this->data = Subject::where('status',0)->get();
        $this->count = count(Subject::select('id')->where('status',0)->get());
        return view('livewire.backend.dashboard-component');
    }

    public function store(){
        $this->validate([
            'name'=>'required',
            'registed'=>'required',
            'selected'=>'required',
            'total'=>'required',
            'expire'=>'required',
        ],[
            'name.required'=>'ກະລຸນາປ້ອນ ຫົວຂໍ້ການເລືອກຕັ້ງ ກ່ອນ!',
            'registed.required'=>'ກະລຸນາປ້ອນ ຈຳນວນຜູ້ສະໝັກ ກ່ອນ!',
            'selected.required'=>'ກະລຸນາປ້ອນ ຈຳນວນຜູ້ຖືກເລືອກ ກ່ອນ!',
            'total.required'=>'ກະລຸນາປ້ອນ ຈຳນວນຜູ້ເຂົ້າຮ່ວມທັງໝົດ ກ່ອນ!',
            'expire.required'=>'ກະລຸນາປ້ອນ ຈຳນວນບັດເສຍ ກ່ອນ!',
        ]);

        $subject = Subject::create([
            'created_date'=>$this->date,
            'created_time'=>now(),
            'name'=>$this->name,
            'registed'=>$this->registed,
            'selected'=>$this->selected,
            'total'=>$this->total,
            'expire'=>$this->expire,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('success', 'ເພີ່ມສຳເລັດ');
        return redirect(route('registeds',$subject->id));
    }

    public function sendId($ids){
        return redirect(route('registeds',$ids));
    }
}
