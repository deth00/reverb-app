<?php

namespace App\Livewire\Export;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\SendRealtimeMessage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Subject;
use App\Models\Registed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExportScoreComponent extends Component
{
    use LivewireAlert;
    public string $message;

    public $data, $datas, $count, $edit_id;
    public $subject, $subject_id, $search;

    public function mount($id){
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
        $this->message = $id;
        $this->data = Registed::where('subject_id',$this->subject_id)->orderBy('score','asc')->get();
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
        $this->datas = Registed::where('subject_id',$message['message'])->orderBy('score', 'desc')->get();
    }
    
    public function render()
    {
        $this->datas = Registed::where('subject_id',$this->subject_id)->orderBy('score', 'desc')->get();
        $sum_count = Registed::where('subject_id',$this->subject_id)->orderBy('no', 'asc')->sum('score');
        return view('livewire.export.export-score-component',compact('sum_count'))->layout('components.layouts.export.app');
    }

    public function export(int $id){
        $subject = Subject::find($id);
        $datas =  Registed::where('subject_id',$id)->orderBy('score', 'asc')->get();
        $sum_count = Registed::where('subject_id',$id)->orderBy('score', 'asc')->sum('score');

        $header=array(
            'Content-type'=>'text/html',
            'Content-Disposition'=>'attachment;Filename=score.doc'
        );
        $ids = $id;
        return \Response::make(view('livewire.export.export-score-component',compact('ids','subject','datas','sum_count')),200,$header);
    }

    public function export_bill(int $id){
        $subject = Subject::find($id);
        $datas =  Registed::where('subject_id',$id)->orderBy('score', 'asc')->get();
        $sum_count = Registed::where('subject_id',$id)->orderBy('score', 'asc')->sum('score');

        $header=array(
            'Content-type'=>'text/html',
            'Content-Disposition'=>'attachment;Filename=score-bill.doc'
        );
        $ids = $id;
        return \Response::make(view('livewire.export.export-score-bill-component',compact('ids','subject','datas','sum_count')),200,$header);
    }
}
