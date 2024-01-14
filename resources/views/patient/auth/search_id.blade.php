@include('include.style')

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">العيادة
                <b>الذكية</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">البحث عن رقم الهويه</p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('patient.search.id')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-left" name="no_id" placeholder="رقم الهويه">
                        <div class="input-group-append">
                            <div class="input-group-text ">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">البحث</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @include('include.script')
</body>

</html>
