<!-- Navigation Bar-->
<header id="topnav" class="boonhome-font">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        @if (!empty(auth()->user()->name))
                            {{ auth()->user()->name }}
                            <img src="{{ asset('backend/assets/images/user-icon.png') }}" alt="user-image"
                                class="rounded-circle">
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title text-center">
                            @if (!empty(auth()->user()->name))
                            <h6 class="text-overflow m-0"> {{ auth()->user()->name }} </h6>
                            @endif
                            
                        </div>

                        <!-- item-->
                        <!-- <a href="" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>ໂປຣຟາຍ</span>
                        </a>

                        <div class="dropdown-divider"></div> -->

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item phetsarath-font">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>ອອກຈາກລະບົບ</span>
                        </a>

                    </div>
                </li>


                <!-- <li class="dropdown notification-list">
                    <a href="#"
                        class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li> -->


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index-1.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="#" alt="" height="30">
                        <span class="logo-lg-text-light phetsarath-font">ລະບົບນັບຄະແນນພາຍໃນ ທນບ</span>
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                </a>
            </div>


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                <!-- <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    @include('components.layouts.navmenu')
</header>
<!-- End Navigation Bar-->
