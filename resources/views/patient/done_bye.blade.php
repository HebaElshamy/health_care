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

                <p class="login-box-msg">تسجيل الخروج</p>
                <div class="text-center">
                    <p>
                        بالسلامه اجر ان شاءالله اجر وعافيه
                    </p>
                    <p>
                        تم اشعار الطبيب بحالتك يُرجى الانتظار لحين مُناداتك
                    </p>
                    <a href="{{route('patient.search')}}" class="btn btn-info">المريض التالي</a>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @include('include.script')
</body>

</html>
