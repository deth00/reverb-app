<div>
    <div class="row">
        <div class="col-md-6 order-md-2">
            <img src="{{asset('login/images/nbb-counting1.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 ">
            <div class="row justify-content-center mt-4">
                <div class="col-md-12 ">
                    <div class="mb-4">
                        <h1 style="font-family: 'Phetsarath OT';">ຍິນດີຕ້ອນຮັບ <strong>ລະບົບນັບຄະແນນ</strong></h1>
                        <p class="mb-4" style="font-size: 20px;font-family: 'Phetsarath OT';">ລະບົບ ການຈັດການຂໍ້ມູນ ແລະ ຕິດຕາມການນັບຄະແນນ
                            ພາຍໃນ ທນບ.</p>
                    </div>
                    <div class="form-group first">
                        <label for="username">
                            <p class="phetsarath-font">ຊື່ຜູ້ໃຊ້ງານ</p>
                        </label>
                        <input type="text" class="form-control phetsarath-font @error('username') is-invalid @enderror" id="username"
                            wire:model="username" wire:keydown.enter="login">
                        @error('username') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">
                            <p class="phetsarath-font">ລະຫັດຜ່ານ</p>
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" wire:model="password" wire:keydown.enter="login">
                        @error('password') <span style="color: red" class="error">{{ $message }}</span>@enderror
                    </div>
                    <buttom type="submit" class="btn text-white btn-block btn-primary"
                        wire:click="login"> <h5 class="phetsarath-font p-2">ເຂົ້າລະບົບ</h5></buttom>
                </div>
            </div>
        </div>
    </div>
</div>
