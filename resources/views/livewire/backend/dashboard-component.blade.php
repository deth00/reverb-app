<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ການເລືອກຕັ້ງ</a></li>
                    </ol>
                </div>
                <h4 class="page-title">ໜ້າຫຼັກ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="phetsarath-font">ເພີ່ມຂໍ້ມູນເລືອກຕັ້ງ</h5>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">ວັນທີ</h6>
                        </label>
                        <input type="date" class="form-control phetsarath-font @error('date') is-invalid @enderror"
                            id="date" wire:model="date" wire:keydown.enter="store">
                        @error('date') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">1. ຫົວຂໍ້ການເລືອກຕັ້ງ</h6>
                        </label>
                        <input type="text" class="form-control phetsarath-font @error('name') is-invalid @enderror"
                            id="name" wire:model="name" wire:keydown.enter="store"
                            placeholder="ເພີ່ມຫົວຂໍ້ການເລືອກຕັ້ງ">
                        @error('name') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">2. ຈຳນວນຜູ້ເຂົ້າຮ່ວມທັງໝົດ</h6>
                        </label>
                        <input type="number" class="form-control phetsarath-font @error('total') is-invalid @enderror"
                            id="total" wire:model="total" wire:keydown.enter="store" placeholder="ຈຳນວນທັງໝົດ">
                        @error('total') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">3. ຈຳນວນຜູ້ສະໝັກ</h6>
                        </label>
                        <input type="number"
                            class="form-control phetsarath-font @error('registed') is-invalid @enderror" id="registed"
                            wire:model="registed" wire:keydown.enter="store" placeholder="ຈຳນວນຜູ້ຖືກເລືອກ">
                        @error('registed') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">4. ຈຳນວນຜູ້ຖືກເລືອກ</h6>
                        </label>
                        <input type="number"
                            class="form-control phetsarath-font @error('selected') is-invalid @enderror" id="selected"
                            wire:model="selected" wire:keydown.enter="store" placeholder="ຈຳນວນຜູ້ຖືກເລືອກ">
                        @error('selected') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <h6 class="phetsarath-font">5. ຈຳນວນບັດເສຍ</h6>
                        </label>
                        <input type="number"
                            class="form-control phetsarath-font @error('expire') is-invalid @enderror" id="expire"
                            wire:model="expire" wire:keydown.enter="store" placeholder="ຈຳນວນບັດເສຍ">
                        @error('expire') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <button class="btn width-md btn-bordered btn-success waves-effect waves-light form-control phetsarath-font"
                            wire:click="store">ເພີ່ມຂໍ້ມູນ</button>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>

        <div class="col-md-12 col-lg-6 col-xl-8">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <h5 class="phetsarath-font text-white">ລາຍການເລືອກຕັ້ງທີ່ກຳລັງເຄື່ອນໄຫວ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ລຳດັບ</th>
                                                <th>ວັນທີ</th>
                                                <th>ຫົວຂໍ້</th>
                                                <th>ຜູ້ຖືກເລືອກ / ຜູ້ສະໝັກ / ທັງໝົດ</th>
                                                <th>ສະຖານະ</th>
                                                <th>ປູ່ມຄຳສັ່ງ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($data as $item)
                                            <tr class="text-center">
                                                <td class="p-2">{{$no++}}</td>
                                                <td class="p-2">{{date('d/m/Y',strtotime($item->created_date))}}
                                                    {{date('H:i:s',strtotime($item->created_time))}}</td>
                                                <td class="p-2">{{$item->name}}</td>
                                                <td class="p-2"><b>{{$item->selected}} / {{$item->registed}} /
                                                        {{$item->total}}</b></td>
                                                <td class="p-2">
                                                    @if ($item->status == 0)
                                                    <span class="p-2 text-warning">ເປີດການເລືອກຕັ້ງ</span>
                                                    @else
                                                    <span class="p-2 text-success">ສິ້ນສຸດການເລືອກຕັ້ງ</span>
                                                    @endif
                                                </td>

                                                <td class="p-2">
                                                    @if($item->user_id == auth()->user()->id)
                                                    <div class="btn-group btn-group-justified text-white mb-2">
                                                        <a class="btn btn-info waves-effect waves-light"
                                                            wire:click="sendId({{$item->id}})"><i
                                                                class="mdi mdi-send-circle"></i></a>
                                                    </div>
                                                    @else
                                                    <div class="btn-group btn-group-justified text-white mb-2">
                                                        <a class="btn btn-info waves-effect waves-light"
                                                            href="{{route('view',$item->id)}}"><i
                                                                class="mdi mdi-send-circle"></i></a>
                                                    </div>
                                                    @endif
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center p-2" style="font-size: 12px">
                                                    ບໍ່ມີຂໍ້ມູນ</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>