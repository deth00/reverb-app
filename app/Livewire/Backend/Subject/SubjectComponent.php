<?php

namespace App\Livewire\Backend\Subject;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Registed;

class SubjectComponent extends Component
{
    public $search;
    public $count, $data, $editId, $delId, $delName;
    public $name, $total, $registed, $selected, $expire;
    public $dataQ = 15;

    public function render()
    {
        $this->data = Subject::where('user_id',auth()->user()->id)->get();
        $this->count = count(Subject::select('id')->where('user_id',auth()->user()->id)->get());
        return view('livewire.backend.subject.subject-component');
    }

    public function dataQS(){
        $this->data = Subject::where('name','like','%'.$this->search.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get();
        $this->count = count(Subject::select('id')->where('name','like','%'.$this->search.'%')->where('user_id',auth()->user()->id)->limit($this->dataQ)->get());
    }

    public function searchData(){
        $this->data = Subject::where('name','like','%'.$this->search.'%')->where('user_id',auth()->user()->id)->get();
        $this->count = count(Subject::select('id')->where('name','like','%'.$this->search.'%')->where('user_id',auth()->user()->id)->get());
    }

    public function edit($ids){
        $this->editId = $ids;
        $subject = Subject::find($ids);
        $this->name = $subject->name;
        $this->registed = $subject->registed;
        $this->selected = $subject->selected;
        $this->total = $subject->total;
        $this->expire = $subject->expire;

        $this->dispatch('show-edit');
    }

    public function update(){
        $subject = Subject::find($this->editId)->update([
            'name'=>$this->name,
            'registed'=>$this->registed,
            'selected'=>$this->selected,
            'total'=>$this->total,
            'expire'=>$this->expire,
        ]);
        session()->flash('success', 'ອັບເດດສຳເລັດ');
        return redirect(route('subjects'));
    }

    public function destroy($ids){
        $this->delId = $ids;
        $subject = Subject::find($ids);
        $this->delName = $subject->name;
        $this->dispatch('show-del');
    }    

    public function delete(){
        $subject = Subject::find($this->delId)->delete();
        $regis = Registed::where('subject_id',$this->delId)->delete();
        session()->flash('success', 'ລົບສຳເລັດ');
        return redirect(route('subjects'));
    }
}
