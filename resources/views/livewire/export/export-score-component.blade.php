<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <table width="100%" style="font-family: 'Phetsarath OT';">
            <tr style="padding-bottom: 15px;">
                <td style="text-align: center;" colspan="2">
                    <b style="font-family: 'Phetsarath OT';font-size: 14px">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ</b><br>
                    <b style="font-family: 'Phetsarath OT';font-size: 14px">ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນະຖາວອນ</b>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td width="50%">
                    <b style="font-family: 'Phetsarath OT';font-size: 14px">ຄະນະພັກຮາກຖານທະນາຄານນະໂຍບາຍ</b><br>
                    <b style="font-family: 'Phetsarath OT';font-size: 14px">ໜ່ວຍພັກພະແນກບັນຊີ-ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ</b>
                </td>
                <td width="50%" style="text-align: right;">
                    <b style="font-family: 'Phetsarath OT';font-size: 14px"></b><br>
                    <b style="font-family: 'Phetsarath OT';font-size: 14px">ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ___/___/______ </b>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: center;" colspan="2">
                    <b  style="font-family: 'Phetsarath OT';font-size: 16px">ບົດລາຍງານ</b><br>
                    <b  style="font-family: 'Phetsarath OT';font-size: 16px">{{$subject->name}}</b>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: left;" colspan="2">
                    <b  style="font-family: 'Phetsarath OT';font-size: 14px">ຮຽນ: 	- ຄະນະປະທານກອງປະຊຸມ ທີ່ນັບຖື.</b><br>
                    <b  style="font-family: 'Phetsarath OT';font-size: 14px"> &emsp;&emsp; - ບັນດາສະຫາຍແຂກຜູ້ມີກຽດ ແລະ ຜູ້ແທນກອງປະຊຸມ ທີ່ຮັກແພງ.</b>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: left;" colspan="2">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px">-	ອີງໃສ່ຜົນການປ່ອນບັດເລືອກຕັ້ງຕົວຈິງ ຂ້າພະເຈົ້າຂໍລາຍງານຜົນການເລືອກຕັ້ງຄະນະໜ່ວຍພັກຊຸດໃໝ່ລະອຽດດັ່ງນີ້:</span><br>
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px">1.	ຈຳນວນຜູ້ແທນ ທີ່ມີໜ້າຕົວຈິງ {{$subject->total - $subject->expire}} ສະຫາຍ, ຍິງ..........ສະຫາຍ; ຜູ້ຮັບສະໝັກເລືອກຕັ້ງຈຳນວນ {{$subject->registed}} ສະຫາຍ, ຍິງ......ສະຫາຍ ແລະ ຈຳນວນຄະນະທີ່ຕ້ອງຄັດເລືອກ {{$subject->selected}} ສະຫາຍ.</span><br>
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px">2.	ບັດທີ່ຖືກແຈກຢາຍໃຫ້ຜູ້ແທນກອງປະຊຸມຕົວຈິງ ທັງໝົດຈໍານວນ {{$subject->total - $subject->expire}} ບັດ.</span><br>
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px">3.	ບັດທີ່ຖືກຕ້ອງ ຈໍານວນ {{$subject->total}} ບັດ.</span><br>
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px">4.	ບັດຕາຍ (ບໍ່ຖືກຕ້ອງ) ມີຈໍານວນ {{$subject->expire}} ບັດ.</span>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: left;" colspan="2">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"> &emsp;&emsp; ຜ່ານການນັບຄະແນນຕົວຈິງ  ຄະນະຮັບຜິດຊອບຄວບຄຸມປ່ອນບັດເລືອກຕັ້ງ ໄດ້ສັງລວມຜົນຄະແນນການເລືອກຕັ້ງເປັນລາຍບຸກຄົນ ມີລາຍລະອຽດລຸ່ມນີ້:</span>
                </td>
            </tr>

            <tr style="padding-bottom: 15px;">
                <td style="text-align: left;" colspan="2">
                    <table width="100%" border="1">
                        <tr style="text-align: center;">
                            <th style="font-family: 'Phetsarath OT';font-size: 14px"><b>ລ/ດ</b></th>
                            <th style="font-family: 'Phetsarath OT';font-size: 14px"><b>ຊື່ ແລະ ນາມສະກຸນ</b></th>
                            <th style="font-family: 'Phetsarath OT';font-size: 14px"><b>ນຳເບີ</b></th>
                            <th style="font-family: 'Phetsarath OT';font-size: 14px"><b>ຄະແນນທີ່ໄດ້</b></th>
                            <th style="font-family: 'Phetsarath OT';font-size: 14px"><b>ຄະແນນທີ່ເສຍ</b></th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($datas as $item)
                        <tr style="text-align: center;">
                            <td style="font-family: 'Phetsarath OT';font-size: 14px">{{$no++}}</td>
                            <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: left;">{{$item->name}}</td>
                            <td style="font-family: 'Phetsarath OT';font-size: 14px; text-align: left;">{{$item->no}}</td>
                            <td style="font-family: 'Phetsarath OT';font-size: 14px">{{ $subject->total - (($subject->total - ($sum_count / $subject->selected)) + $item->score)}}</td>
                            <td style="font-family: 'Phetsarath OT';font-size: 14px">{{$item->score}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: left;" colspan="2">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"> &emsp;&emsp; ສະນັ້ນ, ພວກຂ້າພະເຈົ້າຈຶ່ງລາຍງານຜົນຂອງການປ່ອນບັດເລືອກຕັ້ງຄະນະໜ່ວຍພັກຊຸດໃໝ່ ຕໍ່ຄະນະປະທານກອງປະຊຸມໃຫຍ່ຮັບຊາບ.</span>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;" colspan="2">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"> &emsp;&emsp; ມາຮອດນີ້ ໜ້າທີ່ຂອງຄະນະຮັບຜິດຊອບ ຄວບຄຸມການປ່ອນບັດເລືອກຕັ້ງ ໄດ້ສິ້ນສຸດລົງ ໃນນາມຄະນະຮັບຜິດຊອບຂໍອວຍພອນແດ່ກອງປະຊຸມ ຈົ່ງປະສົບຜົນສໍາເລັດຢ່າງຈົບງາມ ຕໍ່ໄປຂໍມອບໜ້າທີ່ຄືນໃຫ້ຄະນະປະທານສືບຕໍ່ຊີ້ນໍາ-ນໍາພາ ດໍາເນີນກອງປະຊຸມຕໍ່ໄປ.</span>
                </td>
            </tr>
            <tr style="padding-bottom: 15px;">
                <td style="text-align: center;" colspan="2">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"> <b><i>(ຂໍຂອບໃຈ)</i></b> </span>
                </td>
            </tr>
            <tr>
                <td width="50%"></td>
                <td style="text-align: right;">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"> ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ :____/___/_________</span>
                </td>
            </tr>
            <tr>
                <td width="50%" style="text-align: center;"><b>ປ່ອນບັດ</b></td>
                <td style="text-align: center;">
                    <span  style="font-family: 'Phetsarath OT';font-size: 14px"><b>ຄະນະກໍາມະການຄວບຄຸມການ</b></span>
                </td>
            </tr>
        </table>
    </body>

    </html>
</div>