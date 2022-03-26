<div class="mobile_canvus_menu">
    <div class="close_btn">
      <img src="{{ asset('assets/images/icon/close-dark.png') }}" alt="">
    </div>
    <div class="menu_part_lux">
      <ul class="nav menu_list wd_scroll">
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
  </div>
