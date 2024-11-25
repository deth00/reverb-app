<?php

namespace App\Livewire\Backend\Score;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\SendRealtimeMessage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Subject;
use App\Models\Registed;
use Illuminate\Database\Eloquent\Builder;

class ViewComponent extends Component
{
    use LivewireAlert;
    public string $message;

    public $data, $datas, $count, $edit_id;
    public $subject, $subject_id, $search;
    public $vote = [];

    public function mount($id){
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
        $this->message = $id;
        $this->data = Registed::where('subject_id',$this->subject_id)->get();
        $this->count = count(Registed::where('subject_id',$this->subject_id)->get());

        if($this->subject['registed'] != $this->count){
            session()->flash('error', 'ຜູ້ສະໝັກບໍ່ຕົງກັບທີ່ກຳນົດ');
            return redirect(route('registeds',$this->subject_id));
        }
    }

    public function triggerEvent(): void
    {
        event(new SendRealtimeMessage($this->message));
    }

    #[On('echo:my-channel,SendRealtimeMessage')]
    public function handleRealtimeMessage($message): void 
    {
        $this->datas = Registed::where('subject_id',$message['message'])->orderBy('score', 'asc')->get();
    }
    
    public function render()
    {
        $this->datas = Registed::where('subject_id',$this->subject_id)->orderBy('score', 'asc')->get();
        $sum_count = Registed::where('subject_id',$this->subject_id)->orderBy('no', 'asc')->sum('score');
        return view('livewire.backend.score.view-component',compact('sum_count'));
    }


}
