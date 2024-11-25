<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body style="font-family: 'Phetsarath OT';margin: 10px 10px 10px 10px">
        <table width="100%" style="font-family: 'Phetsarath OT';margin: 10px 10px 10px 10px">
            <tr style="padding-bottom: 15px;">
                <td style="text-align: center;" colspan="2">
                    <b
                        style="font-family: 'Phetsarath OT';font-size: 16px">ທາບທາມບຸກຄະລາກອນຮັບສະໝັກເຂົ້າໃນ{{$subject->name}}</b><br>
                    <b style="font-family: 'Phetsarath OT';font-size: 16px">ຄັ້ງວັນທີ
                        {{date('d / m / Y',strtotime($subject->created_date))}}</b>
                </td>
            </tr>

            <tr style="padding-bottom: 0px;">
                <td style="text-align: left;" colspan="2">
                    <table width="100%" border="2">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ລຳດັບ</th>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ຊື່ ແລະ ນາມສະກຸນ
                                </th>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ວັນ,ເດືອນ,ປີເກີດ
                                </th>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ອາຍຸ</th>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ອາຍຸ ພັກ</th>
                                <th rowspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ເຜົ່າ</th>
                                <th colspan="2" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ລະດັບ</th>
                                <th colspan="3" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ຕຳແໜ່ງປັດຈຸບັນ ແລະ
                                    ບ່ອນປະຈຳການ</th>
                            </tr>
                            <tr>
                                <th style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ວິຊາສະເພາະ</th>
                                <th style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ທິດສະດີ</th>
                                <th style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ຕຳແໜ່ງພັກ</th>
                                <th style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ຕຳແໜ່ງລັດ</th>
                                <th style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ຕຳແໜ່ງແມ່ຍິງ</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($datas as $key => $item )
                            <tr class="text-center">
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->no}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px">{{$item->name}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">
                                    {{date('d/m/Y',strtotime($item->bod))}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->age}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->age_phuk}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->phao}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->visa_sphoc}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->thitsadee}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->tumneng_phuk}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->tumneng_lut}}</td>
                                <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">{{$item->tumneng_ying}}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="9" style="font-family: 'Phetsarath OT';font-size: 14px; text-align: center;">ບໍ່ມີຂໍ້ມູນຜູ້ສະໝັກ
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="padding-bottom: 0px;">
                <td style="text-align: left;" colspan="2">
                    <b style="font-family: 'Phetsarath OT';font-size: 16px"> &emsp;&emsp; ໝາຍເຫດ:</b> <br>
                    <span style="font-family: 'Phetsarath OT';font-size: 16px"> &emsp;&emsp; - ການຂີດບັດແມ່ນໃຫ້ຂີດ
                        {{$subject->registed - $subject->selected}} ສະຫາຍ ທີ່ຕົນບໍ່ເຫັນດີ ແລະ ຮັກສາໄວ້
                        {{$subject->selected}} ສະຫາຍ</span><br>
                    <span style="font-family: 'Phetsarath OT';font-size: 16px"> &emsp;&emsp; -
                        ການຂີດບັດແມ່ນໃຫ້ຂີດແຕ່ລຳດັບທີ, ຊື່ ແລະ ນາມສະກຸນ ຈົນສຸດແຖວ, ກໍລະນີຂີດຫຼຸດ ຫຼື
                        ຂີດເກີນແມ່ນເປັນບັດຕາຍ.</span>
                </td>
            </tr>
        </table>
    </body>

    </html>
</div>