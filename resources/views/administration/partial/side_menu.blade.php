<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Template</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{auth()->guard('admin')->user()->AvatarUrl}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if(auth()->guard('admin')->user()->hasAnyPermission(['dashboard-show']) )
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}"
                           class="nav-link {{ request()->is('admin/dashboard')? 'active':'' }}">
                            <i class="fas fa-tachometer-alt"></i>                            <p>
                                {{__('dashboard.Dashboard')}}
                            </p>
                        </a>
                    </li>
                @endif

            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(auth()->guard('admin')->user()->hasAnyPermission(['administration-list','administration-create','administration-edit','administration-delete']) )
                    <li class="nav-item">
                        <a href="{{route('admin.administrations.index')}}"
                           class="nav-link {{ request()->is('admin/administrations')|| request()->is('admin/administrations/*') ? 'active':'' }}">
                            <i class="nav-icon fas  fa-user-secret"></i>
                            <p>
                                {{__('dashboard.administration')}}
                            </p>
                        </a>
                    </li>
                @endif

                @if(auth()->guard('admin')->user()->hasAnyPermission(['user-list','user-create','user-edit','user-delete']) )
                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}"
                           class="nav-link {{ request()->is('admin/users')|| request()->is('admin/users/*') ? 'active':'' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                {{__('dashboard.Users')}}
                            </p>
                        </a>
                    </li>
                @endif

                @if(auth()->guard('admin')->user()->hasAnyPermission(['role-list','role-create','role-edit','role-delete']) )

                    <li class="nav-item">
                        <a href="{{route('admin.roles.index')}}"
                           class="nav-link {{ request()->is('admin/roles')|| request()->is('admin/roles/*') ? 'active':'' }}">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                {{__('dashboard.Roles')}}
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth()->guard('admin')->user()->hasAnyPermission(['permission-list']) )

                    <li class="nav-item">
                        <a href="{{route('admin.permissions.index')}}"
                           class="nav-link {{ request()->is('admin/permissions')|| request()->is('admin/permissions/*') ? 'active':'' }}">
                            <i class="fas fa-genderless"></i>
                            <p>
                                {{__('dashboard.Permissions')}}
                            </p>
                        </a>
                    </li>
                @endif

                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{route('admin.media.index')}}" class="nav-link">--}}
                {{--                        <i class="fas fa-photo-video"></i>--}}
                {{--                        <p>--}}
                {{--                            Media--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                <li class="nav-item">
                    <a href="{{route('admin.activity.index')}}"
                       class="nav-link {{ request()->is('admin/activity-index')|| request()->is('admin/admin-activity-show/*') ? 'active':'' }}">
                        <i class="fas fa-photo-video"></i>
                        <p>
                            {{__('dashboard.Activity Log')}}
                        </p>
                    </a>
                </li>

                {{--                <li class="nav-header">EXAMPLES</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>

                        <p>
                            {{__('dashboard.Logout')}}
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
