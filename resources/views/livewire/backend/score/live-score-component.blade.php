<div>


    <div class="row">
        <div class="col-md-12">
            <div class="page-title-box p-2">
                <div class="row">
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <h4>
                            ຈຳນວນບັດທັງໝົດ : <span class="timenewroman-font text-primary">{{ $subject->total }}</span>
                            ບັດ
                            |
                            ຈຳນວນບັດທີ່ປ່ອນ : <span
                                class="timenewroman-font text-success">{{ number_format($sum_count / $subject->selected) }}</span>
                            ບັດ
                            |
                            ຈຳນວນບັດທີ່ຍັງບໍ່ປ່ອນ : <span
                                class="timenewroman-font text-danger">{{ number_format($subject->total - $sum_count / $subject->selected - $subject->expire) }}</span>
                            ບັດ
                            |
                            ຈຳນວນບັດເສຍ : <span
                                class="timenewroman-font text-danger">{{ number_format($subject->expire) }}</span>
                            ບັດ
                        </h4>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <div class="btn-group btn-group-justified float-right text-white mb-2">
                            <a target="_bank" href="{{ route('download-bill', $subject->id) }}"
                                class="btn btn-info float-right"><i class="mdi mdi-printer"></i></a>
                            <a href="javascript:void(0)" class="btn btn-danger float-right" wire:click="finish"><i
                                    class="mdi mdi-circle-off-outline"></i></a>
                            <a target="_bank" href="{{ route('view', $subject->id) }}"
                                class="btn btn-warning float-right"><i class="mdi mdi-table-eye"></i></a>
                            <a target="_bank" href="{{ route('download', $subject->id) }}"
                                class="btn btn-primary float-right"><i class="mdi mdi-file-word"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:poll.5s class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box">

                <div class="row">

                    {{-- <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($subject->total - $sum_count / $subject->selected - $subject->expire != 0)
                                    <div class="row">
                                        @for ($i = 0; $datas_count->selected > $i; $i++)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control phetsarath-font zipcode-number"
                                                    placeholder="ໝາຍເລກ" wire:model="score.{{$i}}" min="0"
                                                    max="{{$datas_count->registed}}" maxlength="1" name="" id="zipCode"
                                                    {{$vote_count}}>
                                            </div>
                                        </div>
                                        @endfor
                                        <div class="col-md-4">
                                            @if ($vote != [])
                                                <div class="form-group">
                                                    @if ($del_count != null)
                                                        <button class="btn btn-warning phetsarath-font"
                                                            wire:click="rm">ລົບຄະແນນ</button>
                                                    @else
                                                        <button class="btn btn-success phetsarath-font"
                                                            wire:click="store">ຢືນຢັນ</button>
                                                    @endif
                                                    <button class="btn btn-danger phetsarath-font"
                                                        wire:click="clear">ຍົກເລີກ</button>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <button class="btn btn-primary phetsarath-font"
                                                        wire:click="showVote" id="changeRed">ເລືອກ</button>
                                                    <button class="btn btn-danger phetsarath-font"
                                                        wire:click="showDel">ລົບຄະແນນ</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary phetsarath-font" wire:click="showNo"
                                                    id="changeRed">ສະຫຼຸບຜົນຄະແນນ</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">

                                    @foreach ($vote as $item)
                                        <div class="col-md-2">
                                            <label for="name-{{ $item->id }}"
                                                class="text-danger">{{ $item->name }}</label>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive">
                                    <table border="2"
                                        class="table table-hover agents-mails-checkbox m-0  table-centered table-actions-bar"
                                        style="color: #000;">
                                        <thead class="text-center">
                                            <tr>
                                                {{-- <th rowspan="2">ລຳດັບ</th> --}}
                                                <th rowspan="2">ຮູບ</th>
                                                <th>ໝາຍເລກ</th>
                                                <th rowspan="2">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                <th rowspan="2">ຄະແນນໄດ້</th>
                                                <th rowspan="2">ຄະແນນເສຍ</th>
                                                <th rowspan="2">ຈຳນວນບັດນັບຄະແນນ</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1; @endphp
                                            @forelse ($datas as $key => $item)
                                                <tr class="text-center" id="{{ $item->no }}" wire:ignore.self>
                                                    {{-- <td rowspan="1">
                                                        <h6 class="timenewroman-font">{{ $i++ }}
                                                        </h6>
                                                    </td> --}}
                                                    <td rowspan="1">
                                                        <img src="{{ asset($item->img) }}" alt="contact-img"
                                                            title="contact-img" width="30px" height="30px">
                                                    </td>
                                                    <td>
                                                        <h6 class="timenewroman-font">{{ $item->no }}
                                                        </h6>
                                                    </td>
                                                    <td class="text-left">
                                                        <h6 class="phetsarath-font">{{ $item->name }}</h6>
                                                    </td>
                                                    <td rowspan="1">
                                                        <h6 class="timenewroman-font">
                                                            {{ $subject->total - ($subject->total - $sum_count / $subject->selected + $item->score) }}
                                                        </h6>
                                                    </td>
                                                    <td rowspan="1">
                                                        <h6 class="timenewroman-font">
                                                            {{ $item->score }}
                                                        </h6>
                                                    </td>
                                                    <td rowspan="1">
                                                        <h6 class="timenewroman-font">
                                                            {{ number_format($sum_count / $subject->selected) }}</h6>
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="9">ບໍ່ມີຂໍ້ມູນຜູ້ສະໝັກ</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table responsive -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end col -->

                </div>
            </div>
        </div>
    </div>
    <!-- End row -->

</div>

@push('scripts')
    <script>
        var inputQuantity = [];
        $(function() {
            $(".zipcode-number").on("keyup", function(e) {
                var $field = $(this),
                    val = this.value,
                    $thisIndex = parseInt($field.data("idx"), 20);
                if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid")) {
                    this.value = inputQuantity[$thisIndex];
                    return;
                }
                if (val.length > Number($field.attr("maxlength"))) {
                    val = val.slice(0, 5);
                    $field.val(val);
                }
                inputQuantity[$thisIndex] = val;
            });
        });

        window.addEventListener('show-select', event => {
            const fruits = @this.score
            console.log(fruits);
            fruits.forEach(myFunction);

            function myFunction(item, index) {
                // document.getElementById(item).style.color = "#fff";
                document.getElementById(item).style.backgroundColor = "#ff6f6f";
            }
        })

        window.addEventListener('show-reset', event => {
            const fruits = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
            console.log(fruits);
            fruits.forEach(myFunction);

            function myFunction(item, index) {
                document.getElementById(item).style.backgroundColor = "#fff";
            }
        })

        document.addEventListener('livewire:load', ()=>{
            window.livewire.on('newfocus', inputname => {
                document.getElementById('currentInput').focus();
            })
        });

    </script>
@endpush
