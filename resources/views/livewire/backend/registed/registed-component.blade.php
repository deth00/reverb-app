<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຂໍ້ມູນຜູ້ສະໝັກເລືອກຕັ້ງ</a></li>
                    </ol>
                </div>
                <h4 class="page-title" style="color: #000;">ຫົວຂໍ້ : {{ $subject->name }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="text-center card-box">
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-3 mx-auto d-block">

                                    @if ($profile)
                                        <img src="{{ asset($profile->temporaryUrl()) }}"
                                            class="rounded-circle img-thumbnail" alt="profile-image">
                                        <i class="mdi mdi-star-circle member-star text-success"
                                            title="verified user"></i>
                                    @elseif ($profiles)
                                        <img src="{{ asset($profiles) }}" class="rounded-circle img-thumbnail"
                                            alt="profile-image">
                                    @else
                                        <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}"
                                            class="rounded-circle img-thumbnail" alt="profile-image">
                                    @endif

                                </div>
                                <div class="form-group" wire:ignore>
                                    <input type="file" class="filestyle" wire:model="profile"
                                        placeholder="ອັບໂຫຼດຮູບພາບ">
                                </div>

                            </div>
                            <!-- end member-card -->

                        </div>
                        <!-- end card-box -->

                        <div class="card-box">
                            @if ($edit_id)
                                <center>
                                    <h4 class="header-title mt-0 mb-4 text-warning">ແກ້ໄຂຂໍ້ມູນຜູ້ສະໝັກ</h4>
                                </center>
                            @else
                                <center>
                                    <h4 class="header-title mt-0 mb-4 text-primary">ຂໍ້ມູນຜູ້ສະໝັກ</h4>
                                </center>
                            @endif

                            <div class="form-group">
                                <input type="text"
                                    class="form-control phetsarath-font @error('no') is-invalid @enderror"
                                    id="no" placeholder="ລຳດັບ" wire:model="no" wire:keydown.enter="store">
                            </div>

                            <div class="form-group">
                                <input type="text"
                                    class="form-control phetsarath-font @error('name') is-invalid @enderror"
                                    id="name" placeholder="ຊື່ ແລະ ນາມສະກຸນ" wire:model="name"
                                    wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control @error('bod') is-invalid @enderror"
                                    id="bod" wire:model="bod">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><input type="number"
                                            class="form-control phetsarath-font @error('age') is-invalid @enderror"
                                            id="age" placeholder="ອາຍຸ" wire:model="age"
                                            wire:keydown.enter="store"></div>
                                    <div class="col-md-6"><input type="number" class="form-control phetsarath-font"
                                            id="age_phuk" placeholder="ອາຍຸພັກ" wire:model="age_phuk"
                                            wire:keydown.enter="store">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control phetsarath-font @error('phao') is-invalid @enderror"
                                    id="phao" placeholder="ເຜົ່າ" wire:model="phao" wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control phetsarath-font" id="visa_sphoc"
                                    placeholder="ວິຊາສະເພາະ" wire:model="visa_sphoc" wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control phetsarath-font" id="thitsadee"
                                    placeholder="ທິດສະດີ" wire:model="thitsadee" wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control phetsarath-font" id="tumneng_phuk"
                                    placeholder="ຕຳແໜ່ງພັກ" wire:model="tumneng_phuk" wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control phetsarath-font @error('tumneng_lut') is-invalid @enderror"
                                    id="tumneng_lut" placeholder="ຕຳແໜ່ງລັດ" wire:model="tumneng_lut"
                                    wire:keydown.enter="store">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control phetsarath-font" id="tumneng_ying"
                                    placeholder="ຕຳແໜ່ງແມ່ຍິງ" wire:model="tumneng_ying" wire:keydown.enter="store">
                            </div>

                            @if ($edit_id)
                                <div class="form-group">
                                    <button
                                        class="btn btn-warning waves-effect waves-light form-control p-2 phetsarath-font"
                                        wire:click="store">ອັບເດດຂໍ້ມູນ</button>
                                </div>
                                <div class="form-group">
                                    <button
                                        class="btn btn-danger waves-effect waves-light form-control p-2 phetsarath-font"
                                        wire:click="remove">ລົບຂໍ້ມູນ</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <button
                                        class="btn btn-primary waves-effect waves-light form-control p-2 phetsarath-font"
                                        wire:click="store">ເພີ່ມຂໍ້ມູນ</button>
                                </div>
                            @endif


                        </div>
                        <!-- end card-box -->

                    </div>

                    <div class="col-lg-8 col-xl-9">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group search-box">
                                                <input type="text" id="search-input"
                                                    class="form-control product-search phetsarath-font"
                                                    placeholder="ຄົ້ນຫາຂໍ້ມູນຜູ້ສະໝັກ" wire:model.live="search"
                                                    wire:keydown.enter="searchData">
                                                <button type="submit" class="btn btn-search"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{ route('view-score', $subject_id) }}"
                                                class="btn btn-success btn-rounded btn-md waves-effect waves-light"><i
                                                    class="mdi mdi-format-list-bulleted-triangle"></i>
                                                ນັບຄະແນນການເລືອກຕັ້ງ</a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{ route('history', $subject_id) }}"
                                                class="btn btn-primary btn-rounded btn-md waves-effect waves-light"><i
                                                    class="mdi mdi-history"></i>
                                                ປະຫວັດການປ້ອນ</a>
                                        </div>
                                        
                                    </div>

                                    <div class="table-responsive">
                                        <table border="2"
                                            class="table table-hover agents-mails-checkbox m-0  table-centered table-actions-bar">
                                            <thead class="text-center">
                                                <tr>
                                                    <th rowspan="2">ລຳດັບ</th>
                                                    <th rowspan="2">ຮູບ</th>
                                                    <th rowspan="2">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                    <th rowspan="2">ວັນ,ເດືອນ,ປີເກີດ</th>
                                                    <!-- <th rowspan="2">ອາຍຸ</th>
                                                    <th rowspan="2">ອາຍຸ ພັກ</th>
                                                    <th rowspan="2">ເຜົ່າ</th> -->
                                                    <th colspan="2">ລະດັບ</th>
                                                    <th colspan="3">ຕຳແໜ່ງປັດຈຸບັນ ແລະ ບ່ອນປະຈຳການ</th>
                                                </tr>
                                                <tr>
                                                    <th>ວິຊາສະເພາະ</th>
                                                    <th>ທິດສະດີ</th>
                                                    <th>ຕຳແໜ່ງພັກ</th>
                                                    <th>ຕຳແໜ່ງລັດ</th>
                                                    <th>ຕຳແໜ່ງແມ່ຍິງ</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @forelse ($data as $key => $item)
                                                    <tr class="text-center" wire:click="edit({{ $item->id }})">
                                                        <td>{{ $item->no }}</td>
                                                        <td>
                                                            <img src="{{ asset($item->img) }}" alt="contact-img"
                                                                title="contact-img" class="rounded-circle avatar-sm">
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($item->bod)) }}</td>
                                                        <td>{{ $item->visa_sphoc }}</td>
                                                        <td>{{ $item->thitsadee }}</td>
                                                        <td>{{ $item->tumneng_phuk }}</td>
                                                        <td>{{ $item->tumneng_lut }}</td>
                                                        <td>{{ $item->tumneng_ying }}</td>
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
                                <!-- end card-box -->

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
