<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າສະແດງຜົນການເລືອກຕັ້ງ</a></li>
                    </ol>
                </div>
                <h4 class="page-title">ຫົວຂໍ້ : <span style="color: #000;">{{$subject->name}}</span> , ໃນວັນທີ : <span
                        style="color: #000;">{{date('d/m/Y', strtotime($subject->created_date))}}</span></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h4>
                            ຈຳນວນບັດທັງໝົດ : <span class="timenewroman-font text-primary">{{$subject->total}}</span> ບັດ
                            |
                            ຈຳນວນບັດທີ່ປ່ອນ : <span
                                class="timenewroman-font text-success">{{number_format($sum_count / $subject->selected)}}</span>
                            ບັດ
                            |
                            ຈຳນວນບັດທີ່ຍັງບໍ່ປ່ອນ : <span
                                class="timenewroman-font text-danger">{{number_format(($subject->total - ($sum_count / $subject->selected)) - $subject->expire )}}</span>
                            ບັດ
                            |
                            ຈຳນວນບັດເສຍ : <span
                                class="timenewroman-font text-danger">{{number_format($subject->expire)}}</span>
                            ບັດ
                        </h4>    
                    <hr>
                    </div>
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
                                                <th rowspan="2">ຮູບ</th>
                                                <th>ໝາຍເລກ</th>
                                                <th rowspan="2">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                <th rowspan="2">ຄະແນນໄດ້</th>
                                                <th rowspan="2">ຄະແນນເສຍ</th>
                                                <th rowspan="2">ຈຳນວນບັດນັບຄະແນນ</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($datas as $key => $item )

                                            <tr class="text-center">
                                                <td rowspan="1">
                                                    <img src="{{asset($item->img)}}" alt="contact-img"
                                                        title="contact-img" width="50px" height="70px">
                                                </td>
                                                <td>
                                                    <h4 class="timenewroman-font">{{$item->no}}</h4>
                                                </td>
                                                <td class="text-left">
                                                    <h4 class="phetsarath-font">{{$item->name}}</h4>
                                                </td>
                                                <td rowspan="1">
                                                    <h4 class="timenewroman-font">
                                                        {{ $subject->total - (($subject->total - ($sum_count / $subject->selected)) + $item->score)}}
                                                    </h4>
                                                </td>
                                                <td rowspan="1">
                                                    <h4 class="timenewroman-font">
                                                        {{$item->score}}
                                                    </h4>
                                                </td>
                                                <td rowspan="1">
                                                    <h4 class="timenewroman-font">
                                                        {{number_format($sum_count / $subject->selected)}}</h4>
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

                                    <div class="table-responsive" style="display: none;">
                                        <table border="2"
                                            class="table table-hover agents-mails-checkbox m-0  table-centered table-actions-bar"
                                            style="color: #000;">
                                            <thead class="text-center">
                                                <tr>
                                                    <th rowspan="2">ລຳດັບ</th>
                                                    <th rowspan="2">ຮູບ</th>
                                                    <th rowspan="2">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                    <th rowspan="2">ວັນ,ເດືອນ,ປີເກີດ</th>
                                                    <th rowspan="2">ອາຍຸ</th>
                                                    <th rowspan="2">ອາຍຸ ພັກ</th>
                                                    <th rowspan="2">ເຜົ່າ</th>
                                                    <th colspan="2">ລະດັບ</th>
                                                    <th colspan="3">ຕຳແໜ່ງປັດຈຸບັນ ແລະ ບ່ອນປະຈຳການ</th>
                                                    <th rowspan="2">ຄະແນນ</th>
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
                                                @php $no = 1; @endphp
                                                @forelse ($datas as $key => $item )
                                                
                                                <tr class="text-center">
                                                    <td rowspan="2">{{$no++}}</td>
                                                    <td rowspan="2">
                                                        <img src="{{asset($item->img)}}" alt="contact-img"
                                                            title="contact-img" width="100px" height="120px">
                                                    </td>
                                                    <td class="text-left">{{$item->no}}. {{$item->name}}</td>
                                                    <td>{{date('d/m/Y',strtotime($item->bod))}}</td>
                                                    <td>{{$item->age}}</td>
                                                    <td>{{$item->age_phuk}}</td>
                                                    <td>{{$item->phao}}</td>
                                                    <td>{{$item->visa_sphoc}}</td>
                                                    <td>{{$item->thitsadee}}</td>
                                                    <td>{{$item->tumneng_phuk}}</td>
                                                    <td>{{$item->tumneng_lut}}</td>
                                                    <td>{{$item->tumneng_ying}}</td>
                                                    <td rowspan="2">
                                                        <h4 class="timenewroman-font">{{$item->score}}</h4>
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td colspan="10">
                                                        <div class="progress">
                                                            @if($item->no == 1)
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 2)
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 3)
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 4)
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 5)
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 6)
                                                            <div class="progress-bar bg-pink" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 7)
                                                            <div class="progress-bar bg-purple" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 8)
                                                            <div class="progress-bar bg-orange" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 9)
                                                            <div class="progress-bar bg-brown" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @elseif ($item->no == 10)
                                                            <div class="progress-bar bg-teal" role="progressbar"
                                                                aria-valuenow="{{$item->score}}" aria-valuemin="0"
                                                                aria-valuemax="{{$subject->total}}"
                                                                style="width: {{($item->score*100)/$subject->total}}%;">
                                                            </div>
                                                            @endif

                                                        </div>
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