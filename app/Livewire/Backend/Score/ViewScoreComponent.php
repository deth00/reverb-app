<?php

namespace App\Livewire\Backend\Score;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Registed;
use Livewire\Attributes\On;
use App\Events\SendRealtimeMessage;
use App\Models\Log;
use App\Models\LogS;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;

class ViewScoreComponent extends Component
{
    use LivewireAlert;
    public string $message;
    public $data, $datas, $count, $edit_id, $btn = 0;
    public $subject, $subject_id, $user_id, $search, $log, $log_but;
    public $score = [], $vote = [], $vote_count, $del_count, $ls = [];

    public function mount($id)
    {
        $this->subject = Subject::find($id);
        $this->subject_id = $id;
        $this->message = $id;
        $this->user_id = auth()->user()->id;
        $this->data = Registed::where('subject_id', $this->subject_id)->get();
        $this->count = count(Registed::where('subject_id', $this->subject_id)->get());
        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->get();
        if ($this->subject['user_id'] == auth()->user()->id) {
            if ($this->subject['registed'] != $this->count) {
                session()->flash('error', 'ຜູ້ສະໝັກບໍ່ຕົງກັບທີ່ກຳນົດ');
                return redirect(route('registeds', $this->subject_id));
            }
        } else {
            session()->flash('error', 'ລາຍການນີ້ຍັງບໍ່ເປີດການລົງຄະແນນ');
            return redirect(route('dashboard'));
        }
    }

    public function triggerEvent(): void
    {
        event(new SendRealtimeMessage($this->message));
    }

    // #[On('echo:my-channel,SendRealtimeMessage')]
    // public function handleRealtimeMessage($message): void
    // {
    //     $this->datas = Registed::where('subject_id', $message['message'])->orderBy('no', 'asc')->get();
    // }



    public function render()
    {
        if ($this->score != []) {
            $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
        }
        $this->log = Log::where('subject_id', $this->subject_id)->where('del', 1)->get();
        // dd($this->log);
        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->get();
        $datas_count = Subject::where('id', $this->subject_id)->first();
        $sum_count = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        return view('livewire.backend.score.view-score-component', compact('datas_count', 'sum_count'));
    }

    public function showDatas()
    {
        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->get();
    }

    public function add($ids)
    {
        $sum_count = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        $result = $sum_count / $this->subject['selected'];

        if ($result < $this->subject['total']) {
            $score = Registed::find($ids);
            if ($score->score < $this->subject['total']) {
                $score->score += 1;
                $score->save();
            } else {
                $this->dispatch('alert', type: 'error', message: 'ບໍ່ສາມາດເພີ່ມໄດ້ຈຳນວນຄະແນນເລືອກຕັ້ງສູງສຸດແລ້ວ!');
            }
        } else {
            $this->dispatch('alert', type: 'error', message: 'ບໍ່ສາມາດເພີ່ມໄດ້ຈຳນວນຄະແນນເລືອກຕັ້ງສູງສຸດແລ້ວ!');
        }
    }

    public function del($ids)
    {
        $score = Registed::find($ids);
        if ($score->score  > 0) {
            $score->score -= 1;
            $score->save();
        } else {
            $this->dispatch('alert', type: 'error', message: 'ບໍ່ສາມາດລົບໄດ້ຈຳນວນຄະແນນເລືອກຕັ້ງຕ່ຳສຸດແລ້ວ!');
        }
    }
    public int $expire;
    public function finish()
    {
        $sum_count = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        $result = $sum_count / $this->subject['selected'];
        $this->expire = (int) $this->subject['total'] - (int) $result;
        // dd($this->expire);
        $subject = Subject::find($this->subject_id);
        $subject->expire = $this->expire;
        $subject->status = 1;
        $subject->save();
        session()->flash('success', 'ສິ້ນສຸດການລົງຄະແນນ');
        return redirect(route('dashboards'));
    }
    public function showbackward()
    {
        $this->dispatch('show-edit');
    }
    public function backward()
    {
        $subject = Subject::find($this->subject_id);
        $b = preg_split("/[,]/", $this->log_but);
        foreach ($b as $data) {
            $res = Registed::where('subject_id', $this->subject_id)->where('no', $data)->first();
            if (!empty($res)) {
                $res->score -= 1;
                $res->save();
            }
        }

        $check = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
        $add2 = Registed::where('subject_id', $this->subject_id)->get();
        foreach ($add2 as $data) {
            $data->vote = $check / $subject->selected;
            $data->update();
        }
        // dd($b);
        $log = Log::where('subject_id', $this->subject_id)->where('but', $b[3])->first();
        $log->del = 0;
        $log->save();
        $this->score = [];
        $this->dispatch('alert', type: 'success', message: 'ເພີ່ມສຳເລັດ!');
        $this->clear();
        session()->flash('success', 'ຍ້ອນກັບສຳເລັດ');
        return redirect(route('view-score', $this->subject_id));
        // $log = Log::where('subject_id',$this->subject_id)->get();
        // // $b= preg_split("/[,]/",$log[0]['no']);
        // dd($log);
    }

    public function showVote()
    {
        $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
        $c = count($this->score);
        $d = count($this->vote);
        // dd($c, $d);
        if ($c != $d) {
            $this->btn = 1;
            // dd($this->btn);
        }
        if ($this->score != []) {
            $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
            $this->dispatch('show-select');
            $this->vote_count = 'disabled';
        } else {
            $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາປ້ອນຂໍ້ມູນຜູ້ຖືກເລືອກໃຫ້ຄົບ!');
        }
    }

    public function clear()
    {
        $this->score = [];
        $this->vote = [];
        $this->btn = 0;
        $this->vote_count = null;
        $this->dispatch('show-reset');
    }

    public function showDel()
    {
        if ($this->score != []) {
            $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
            $this->del_count = count(Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get());
        } else {
            $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາປ້ອນຂໍ້ມູນຜູ້ຖືກເລືອກໃຫ້ຄົບ!');
        }
    }

    public function store()
    {
        // dd($this->score);
        try {
            $subject = Subject::find($this->subject_id);
            if (count($this->score) == $subject->selected) {
                if (count($this->score) !== count(array_unique($this->score))) {
                    $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາປ້ອນຂໍ້ມູນບໍ່ໃຫ້ຊ້ຳກັນ');
                } else {
                    $this->vote = Registed::where('subject_id', $this->subject_id)->whereIn('no', $this->score)->get();
                    if (count($this->score) == count($this->vote)) {
                        foreach ($this->score as $item) {
                            $add = Registed::where('subject_id', $this->subject_id)->where('no', $item)->first();
                            if (!empty($add)) {
                                $add->score += 1;
                                $add->save();
                            }
                        }

                        $check = Registed::where('subject_id', $this->subject_id)->orderBy('no', 'asc')->sum('score');
                        $add2 = Registed::where('subject_id', $this->subject_id)->get();
                        foreach ($add2 as $data) {
                            $data->vote = $check / $subject->selected;
                            $data->update();
                        }

                        $log = new Log();
                        $log->subject_id = $this->subject_id;
                        $log->no = implode(",", $this->score);
                        $log->score += 1;
                        $log->but = $check / $subject->selected;
                        $log->save();
                        $this->score = [];
                        $this->dispatch('alert', type: 'success', message: 'ເພີ່ມສຳເລັດ!');
                        $this->clear();
                        $this->vote_count = null;
                        $this->dispatch('show-reset');
                    } else {
                        $this->dispatch('alert', type: 'warning', message: 'ຂໍ້ມູນຜູ້ຖືກເລືອກບໍ່ຄົບ!');
                    }


                    // return redirect(route('view-score',$this->subject_id));
                }

                // }
            } else {
                $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາປ້ອນຂໍ້ມູນຜູ້ຖືກເລືອກໃຫ້ຄົບ!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('alert', type: 'error', message: 'ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່!');
        }
    }

    public function rm()
    {
        try {
            $subject = Subject::find($this->subject_id);
            if (count($this->score) == $subject->selected) {
                foreach ($this->score as $item) {
                    if ($item != 0) {
                        $add = Registed::where('subject_id', $this->subject_id)->where('no', $item)->first();
                        $add->score -= 1;
                        $add->save();
                    }
                }
                $this->score = [];
                $this->dispatch('alert', type: 'success', message: 'ເພີ່ມສຳເລັດ!');
                $this->clear();
                $this->del_count = null;
            } else {
                $this->dispatch('alert', type: 'warning', message: 'ກະລຸນາປ້ອນຂໍ້ມູນຜູ້ຖືກເລືອກໃຫ້ຄົບ!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('alert', type: 'error', message: 'ເກີດຂໍ້ຜິດພາດກະລຸນາລອງໃໝ່!');
        }
    }

    public function showNo()
    {
        $this->datas = Registed::where('subject_id', $this->subject_id)->orderBy('score', 'asc')->get();
        $this->dispatch('alert', type: 'success', message: 'ສະຫຼຸບຜົນຄະແນນສຳເລັດ!');
    }
}
