<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="LOGO" style="width:80px; height:80px;">
            </div>
            <div class="col-md-8">
                <span class="brand-text font-weight-light" style="white-space: normal;">Admin</span>
            </div>
        </div>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.patient.index') }}"
                        class="nav-link {{ (request()->is('admin/patient*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Data Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ (request()->is('farm*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Pendaftaran
                        </p>
                    </a>
                </li>
            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
