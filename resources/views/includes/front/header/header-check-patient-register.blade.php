<header class="header_area white_header">
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Klinik Mutiara</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="{{ (request()->is('patient-register*')) ? 'active' : '' }}">
                            <a href="{{ route('patient-register.index') }}">
                                Pendaftaran
                            </a>
                        </li>
                        <li class="{{ (request()->is('check-patient-register*')) ? 'active' : '' }}">
                            <a href="{{ route('check-patient-register.index') }}">
                                Cek Data Pendaftaran
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="right_burger">
            <ul class="nav">
                <li>
                    <div class="menu_btn">
                        <img src="{{ asset('assets/images/icon/burger-white.png') }}" alt="" />
                        <img src="{{ asset('assets/images/icon/burger.png') }}" alt="" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
