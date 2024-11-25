<?php

namespace App\Livewire\Backend\Score;

use App\Models\Registed;
use App\Models\Subject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LiveScoreComponent extends Component
{
    use LivewireAlert;
    public string $message;
    public $data, $datas, $count, $edit_id;
    public $subject, $subject_id, $user_id, $search;
    public $score = [], $vote = [], $vote_count, $del_count;
    public function mount($id)
    {
     
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
        $this->message = $id;
        $this->user_id = 1;
        $this->data = Registed::where('subject_id', $this->subject_id)->get();
        $this->count = count(Registed::where('subject_id', $this->subject_id)->get());
        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->get();

        if ($this->subject['user_id'] == 1) {
            if ($this->subject['registed'] != $this->count) {
                session()->flash('error', 'ຜູ້ສະໝັກບໍ່ຕົງກັບທີ່ກຳນົດ');
                return redirect(route('registeds', $this->subject_id));
            }
        } else {
            session()->flash('error', 'ລາຍການນີ້ຍັງບໍ່ເປີດການລົງຄະແນນ');
            return redirect(route('dashboard'));
        }
    }

    public function render()
    {
        if ($this->score != []) {
            $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
        }

        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->get();
        $datas_count = Subject::where('id', $this->subject_id)->first();
        $sum_count = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        return view('livewire.backend.score.live-score-component', compact('datas_count','sum_count'));
    }
}
