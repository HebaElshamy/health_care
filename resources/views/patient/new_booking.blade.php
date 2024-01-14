@extends('patient.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">حجز جديد</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h5 class="card-title text-right float-left text-bold">اكتب الشكوي</h5>

                            <div class="card-tools float-right">

                                <h5 class="card-title text-right float-left text-bold">
                                    @php
                                    use Carbon\Carbon;
                                    @endphp
                                    {{ Carbon::now()->format('d/m/Y') }}

                                    {{ Carbon::now()->setTimezone('Asia/Riyadh')->format('H:i:s')}}
                                </h5>

                            </div>

                        </div>
                        <div class="card-header error_header d-none">

                            <div class="alert alert-danger">
                                <ul>
                                    <li class="error_desc"></li>
                                </ul>
                            </div>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">


                                    <form action="{{route('patient.descroption') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                                        </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">

                                    <div class="description-block border-right">
                                        <a href="#" class="btn btn-sm btn-info float-left next_data text-bold">التالي
                                            لأخذ القياسات</a>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                </form>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    $(".next_data").click(function (e) {
        e.preventDefault();
        var currentValue = $("#inputDescription").val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "http://localhost/Health-Care-Center/public/patient/descroption",
            data: {
            value: currentValue,
            _token: csrfToken
            },
            success: function(response) {
                var message = response.message;
                var st =response.st;
                if(st == 1){
                    $(".error_header").removeClass('d-none');
                    $(".error_desc").text(message);
                }
                if(st == 2){
                    $(".error_header").addClass('d-none');
                    $(".error_desc").text("");
                }
            },

        });
    });
});
</script>
@endsection
