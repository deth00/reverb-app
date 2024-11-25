<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">ປະຫວັດການປ້ອນ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ລຳດັບ</th>
                                            <th>ຫົວຂໍ້</th>
                                            <th>ບັດ</th>
                                            <th>ເລກຜູ້ສະໝັກ</th>
                                            <th>ປູ່ມຄຳສັ່ງ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($log as $item)
                                        <tr class="text-center">
                                            <td class="p-2">{{$no++}}</td>
                                            <td class="p-2">{{$item->name}}</td>
                                            <td class="p-2">{{$item->but}}</td>
                                            <td class="p-2">{{$item->no}}</td>
                                            <td class="p-2">
                                
                                            <a class="btn btn-danger waves-effect waves-light"
                                                wire:click="showdel({{$item->id}})"><i
                                                    class="mdi mdi-window-close"></i></a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title mt-0 text-white">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="hiddenId" value="{{ $delId }}">
                    <h3><b>ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ່ ?</b></h3>
                    <p>ລາຍລະອຽດ: <span class="text-danger">{{$delName}}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect phetsarath-font"
                    data-bs-dismiss="modal">ປິດ</button>
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