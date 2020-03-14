<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fas fa-globe-americas"></i> {{__('dashboard.Languages')}}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <a href="{{ url('admin/locale/en') }}" class="dropdown-item"><i class="fa fa-language"></i> EN</a>
                <a href="{{ url('admin/locale/ar') }}" class="dropdown-item"><i class="fa fa-language"></i> Ar</a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
