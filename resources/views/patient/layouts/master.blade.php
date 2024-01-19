@include('include.style')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin.home')}}" class="nav-link">الصفحة الرئيسية</a>
                </li>

            </ul>

            <!-- Right navbar links -->
           
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">العيادة الذكية</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                        <img src="{{asset('assets/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div> --}}
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::guard('patients')->user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('patient.home')}}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>الصفحة الرئيسية</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-add"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>تغير كلمة المرور</p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{route('patient.new.booking')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>حجز جديد</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('patient.logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>تسجيل خروج</p>
                            </a>
                            <form id="logout-form" action="{{ route('patient.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>حقوق النشر&copy; 2024 <a href="{{url('/')}}">العيادة الذكية</a>.</strong>
            كل الحقوق محفوظة.
            <div class="float-right d-none d-sm-inline-block">
                <b>النسخة</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">مسئول جديد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('doctor.change.password')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="inputName"> كلمة المرور القديمة </label>
                                <input type="password" id="inputName" class="form-control" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="inputName"> كلمة المرور الجديدة </label>
                                <input type="password" id="inputName" class="form-control" name="new_password">
                            </div>



                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">حفظ </button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    @include('include.script')
</body>

</html>
