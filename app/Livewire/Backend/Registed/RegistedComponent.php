<?php

namespace App\Livewire\Backend\Registed;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Registed;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Builder;

class RegistedComponent extends Component
{
    use WithFileUploads;
    public $data, $count, $edit_id;
    public $subject, $subject_id, $search;
    public $no, $profile, $profiles, $name, $bod, $age, $age_phuk, $phao, $visa_sphoc, $thitsadee, $tumneng_phuk, $tumneng_lut, $tumneng_ying;


    public function mount($id){
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
        $this->dispatch('focus_name');
    }

    public function render()
    {
        $this->data = Registed::when($this->search != null, fn(Builder $query) => $query->where('name','like','%'.$this->search.'%'))->where('subject_id',$this->subject_id)->get();
        $this->count = count(Registed::where('subject_id',$this->subject_id)->get());
        return view('livewire.backend.registed.registed-component');
    }

    public function searchData(){
        $this->data = Registed::when($this->search != null, fn(Builder $query) => $query->where('name','like','%'.$this->search.'%'))->where('subject_id',$this->subject_id)->get();
    }

    public function resetField(){
        $this->no = null;
        $this->profile = null;
        $this->profiles = null;
        $this->name = null;
        $this->bod = null;
        $this->age = null;
        $this->age_phuk = null;
        $this->phao = null;
        $this->visa_sphoc = null;
        $this->thitsadee = null;
        $this->tumneng_phuk = null;
        $this->tumneng_lut = null;
        $this->tumneng_ying = null;
    }

    public function store(){

            $this->validate([
                'no'=>'required',
                'name'=>'required',
                'bod'=>'required',
                'age'=>'required',
                'tumneng_lut'=>'required',
            ]);
    
            if (!empty($this->profile)) {
                $this->validate([
                    'profile' => 'required|mimes:jpg,png,jpeg',
                ]);
                $imgName = date('ymdhis').'_'. $this->profile->getClientOriginalName();
                $this->profile->storeAs('upload/registed/', $imgName);
                $this->profiles = 'upload/registed/'.$imgName;
                
            }
    
            if($this->edit_id){
                Registed::find($this->edit_id)->update([
                    'no'=>$this->no,
                    'subject_id'=>$this->subject_id,
                    'name'=>$this->name,
                    'bod'=>$this->bod,
                    'age'=>$this->age,
                    'age_phuk'=>$this->age_phuk,
                    'phao'=>$this->phao,
                    'visa_sphoc'=>$this->visa_sphoc,
                    'thitsadee'=>$this->thitsadee,
                    'tumneng_phuk'=>$this->tumneng_phuk,
                    'tumneng_lut'=>$this->tumneng_lut,
                    'tumneng_ying'=>$this->tumneng_ying,
                    'img'=>$this->profiles,
                ]);
                session()->flash('success', 'ອັບເດດສຳເລັດ');
                return redirect(route('registeds',$this->subject_id));
            }else{
                if($this->count < $this->subject['registed']){
                    Registed::create([
                        'no'=>$this->no,
                        'subject_id'=>$this->subject_id,
                        'name'=>$this->name,
                        'bod'=>$this->bod,
                        'age'=>$this->age,
                        'age_phuk'=>$this->age_phuk,
                        'phao'=>$this->phao,
                        'visa_sphoc'=>$this->visa_sphoc,
                        'thitsadee'=>$this->thitsadee,
                        'tumneng_phuk'=>$this->tumneng_phuk,
                        'tumneng_lut'=>$this->tumneng_lut,
                        'tumneng_ying'=>$this->tumneng_ying,
                        'img'=>$this->profiles,
                    ]);
                    session()->flash('success', 'ເພີ່ມສຳເລັດ');
                    return redirect(route('registeds',$this->subject_id));
                }else{
                    session()->flash('error', 'ບໍ່ສາມາດເພີ່ມໄດ້! ຜູ້ສະໝັກເກີນທີ່ກຳນົດ');
                    return redirect(route('registeds',$this->subject_id));
                }
            }
        
    }

    public function edit($ids){
        $this->edit_id = $ids;
        $regis = Registed::find($ids);
        $this->profiles = $regis->img;
        $this->name = $regis->name;
        $this->bod = $regis->bod;
        $this->age = $regis->age;
        $this->age_phuk = $regis->age_phuk;
        $this->phao = $regis->phao;
        $this->visa_sphoc = $regis->visa_sphoc;
        $this->thitsadee = $regis->thitsadee;
        $this->tumneng_phuk = $regis->tumneng_phuk;
        $this->tumneng_lut = $regis->tumneng_lut;
        $this->tumneng_ying = $regis->tumneng_ying;
        $this->no = $regis->no;
    }

    public function remove(){
        Registed::find($this->edit_id)->delete();
        session()->flash('success', 'ລົບຂໍ້ມູນສຳເລັດ');
        return redirect(route('registeds',$this->subject_id));
    }

    public function viewScore(){
        if($this->subject['registed'] == $this->count){
            return redirect(route('view-score',$this->subject_id));
        }else{
            session()->flash('error', 'ຜູ້ສະໝັກບໍ່ຕົງກັບທີ່ກຳນົດ');
            return redirect(route('registeds',$this->subject_id));
        }
    }
}
