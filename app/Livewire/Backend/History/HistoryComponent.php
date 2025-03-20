<?php

namespace App\Livewire\Backend\History;

use App\Models\Log;
use App\Models\Registed;
use Livewire\Component;
use App\Models\Subject;

class HistoryComponent extends Component
{
    public $subject, $subject_id, $search;
    public $count, $data, $editId, $delId, $delName;

    public function mount($id)
    {
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
    }

    public function render()
    {
        $log = Log::select('log_score.*', 'sub.name')->where('subject_id', $this->subject_id)
            ->join('subjects as sub', 'log_score.subject_id', '=', 'sub.id')
            ->where('del',1)
            ->get();
        return view('livewire.backend.history.history-component', compact('log'));
    }

    public function showdel($ids)
    {
        $this->delId = $ids;
        $log = Log::find($ids);
        $this->delName = $log->but;
        $this->dispatch('show-del');
    }

    public function delete()
    {
        $subject = Subject::find($this->subject_id);
        $a = Log::where('id', $this->delId)->where('subject_id', $this->subject_id)->first();
        $b = preg_split("/[,]/", $a->no);
        $check = Registed::where('subject_id', $this->subject_id)->whereIn('no', $b)->get();
        if (count($b) == count($check)) {
            foreach ($b as $data) {
                $res = Registed::where('subject_id', $this->subject_id)->where('no', $data)->first();
                if (!empty($res)) {
                    $res->score -= 1;
                    $res->save();
                }
            }
        }

        $check = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        $add2 = Registed::where('subject_id', $this->subject_id)->get();
        foreach ($add2 as $data) {
            $data->vote = $check / $subject->selected;
            $data->update();
        }

        $log = Log::where('subject_id', $this->subject_id)->where('id', $this->delId)->first();
        $log->delete();
        session()->flash('success', 'ຍ້ອນກັບສຳເລັດ');
        return redirect(route('history', $this->subject_id));
    }
}
