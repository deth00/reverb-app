<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">ການບໍລິການ</a></li> -->
                        <li class="breadcrumb-item active">ຂໍ້ມູນຫົວຂໍ້ການເລືອກຕັ້ງ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຂໍ້ມູນຫົວຂໍ້ການເລືອກຕັ້ງ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: center;" class="text-right">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQS" name="Q" id="Q" class="form-control">
                                        <option value="15">15</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="999999999">ທັງໝົດ</option>
                                    </select>
                                    <!-- <input type="number" wire:model="dataQ" name="dataQ" id="dataQ" class="form-control col-12"> -->
                                </td>
                                <td style="vertical-align: center;"><span>&emsp; ລາຍການ</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">

                    </div>

                    <div class="col-2">
                        <!-- <input type="date" name="date" id="date" wire:model="dateS" class="form-control"> -->
                    </div>
                    <div class="col-2">
                        <input type="text" name="search" id="search" wire:model="search" wire:keydown.enter="searchData"
                            class="form-control phetsarath-font" placeholder="ຄົ້ນຫາ">
                    </div>
                    <div class="col-1 ">
                        <button type="button" class="btn btn-primary" wire:click="searchData">
                            <i class="mdi mdi-file-search-outline"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ລຳດັບ</th>
                                            <th>ວັນທີ</th>
                                            <th>ຫົວຂໍ້</th>
                                            <th>ເລືອກ / ຜູ້ສະໝັກ / ບັດຕາຍ / ທັງໝົດ</th>
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
                                            <td class="p-2"><b><span class="text-primary">{{$item->selected}}</span> /
                                                    <span class="text-success">{{$item->registed}}</span> / <span
                                                        class="text-danger">{{$item->expire}}</span> / <span
                                                        class="text-info">{{$item->total}}</span></b></td>
                                            <td class="p-2">
                                                @if ($item->status == 0)
                                                <span class="p-2 text-primary">ເປີດການເລືອກຕັ້ງ</span>
                                                @else
                                                <span class="p-2 text-danger">ສິ້ນສຸດການເລືອກຕັ້ງ</span>
                                                @endif
                                            </td>

                                            <td class="p-2">
                                                @if ($item->user_id == auth()->user()->id)
                                                <div class="btn-group btn-group-justified text-white mb-2">
                                                @if($item->status == 0)
                                                    <a class="btn btn-warning waves-effect waves-light"
                                                        wire:click="edit({{$item->id}})"><i
                                                            class="mdi mdi-pencil-remove-outline"></i></a>
                                                    <a class="btn btn-danger waves-effect waves-light"
                                                        wire:click="destroy({{$item->id}})"><i
                                                            class="mdi mdi-window-close"></i></a>
                                                @endif
                                                    @if($item->status == 0)
                                                    <a class="btn btn-info waves-effect waves-light"
                                                        href="{{route('registeds',$item->id)}}"><i
                                                            class="mdi mdi-table-eye"></i></a>
                                                    @else
                                                    <a class="btn btn-info waves-effect waves-light"
                                                        href="{{route('view',$item->id)}}"><i
                                                            class="mdi mdi-table-eye"></i></a>
                                                    @endif
                                                    <a target="_bank" href="{{route('download',$item->id)}}"
                                class="btn btn-primary float-right"><i class="mdi mdi-file-word"></i></a>
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

                <div class="row">
                    <div class="col-12">
                        <span><br> ລວມທັງໝົດ <span class="text-danger">{{$count}}</span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 text-white">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect phetsarath-font"
                        data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light phetsarath-font"
                        wire:click="update">ອັບເດດຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title mt-0 text-white">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3><b>ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ່ ?</b></h3>
                    <p>ລາຍລະອຽດ: <span class="text-danger">{{$delName}}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect phetsarath-font"
                        data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light phetsarath-font"
                        wire:click="delete">ລົບຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

@push('scripts')
<script>
window.addEventListener('show-edit', event => {
    $('#edit-modal').modal('show');
})
window.addEventListener('show-edit', event => {
    $('#edit-modal').modal('hide');
})
window.addEventListener('show-del', event => {
    $('#custom-modal').modal('show');
})
window.addEventListener('show-del', event => {
    $('#custom-modal').modal('hide');
})
</script>
@endpush