@extends('patient.layouts.master')
@section('content')
<style>
    .callout1 {
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24) !important;
        border-right: 5px solid #e9ecef;
        border-right-color: #d39e00;
        border-radius: 0.25rem;
        background-color: #fff;
        padding: 1rem;
    }

    .callout-info {
        border-right-color: #117a8b;
    }

    .callout-danger {
        border-right-color: #bd2130;
    }

    .callout-success {
        border-right-color: #1e7e34;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">تأكيد الحجز</h1>
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
                            <h5 class="card-title text-left float-left text-bold">
                                مراجعة بيانات المريض</h5>

                            <div class="card-tools float-right">

                                <h5 class="card-title text-left float-right text-bold">
                                    @php
                                    use Carbon\Carbon;
                                    @endphp
                                    {{ Carbon::now()->format('d/m/Y') }}

                                    {{ Carbon::now()->setTimezone('Asia/Riyadh')->format('H:i:s')}}
                                </h5>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-right float-left">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card text-right callout1 callout-success">

                                        <!-- /.card-header -->
                                        <div class="card-body p-0 ">
                                            <div class="table-responsive">
                                                <table class="table m-0 text-right">
                                                    <tbody class="text-left">
                                                        <tr>
                                                            <td >
                                                                اسم المريض
                                                            </td>
                                                            <td>
                                                                {{auth()->guard('patients')->user()->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>رقم الهوية</td>
                                                            <td>{{auth()->guard('patients')->user()->no_id}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>رقم الموبيل</td>
                                                            <td>{{auth()->guard('patients')->user()->phone}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>السن </td>
                                                            <td>{{auth()->guard('patients')->user()->age}}</td>
                                                        </tr>
                                                        @php
                                                        $appointment
                                                        =auth()->guard('patients')->user()->appointments()->latest()->first();
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                الشكوي
                                                            </td>
                                                            <td>
                                                                {{$appointment->description}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>نبض القلب وقياس الأكسجين</td>
                                                            <td>{{$appointment->heart}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>قياس الأكسجين</td>
                                                            <td>{{$appointment->spo2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>درجة الحرارة</td>
                                                            <td>{{$appointment->temp}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>الحالة</td>
                                                            @if ($appointment->status == 0)
                                                            <td>حالة حرجة</td>
                                                            @else
                                                            <td>حالة عادية</td>
                                                            @endif

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>

                                        <!-- /.card-body -->
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


                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-3 col-6">


                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-3 col-6">

                                    <div class="description-block border-right text-center">

                                        <a href="#" class="btn btn-sm btn-danger float-left next_data text-bold"
                                            id="done">تم الحجز</a>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <div class="col-sm-3 col-6">


                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->

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
<script>
  // JavaScript
    $(document).ready(function(){
    $("#done").click(function (e){
    e.preventDefault();
    $.ajax({
    type: "GET",
    url: "http://localhost/Health-Care-Center/public/patient/done",
    success: function(response) {
    window.location.href = '{{ route("patient.done.bye") }}';
    },
    error: function(error) {
    console.error('Error:', error);
    }
    });
    });
    });


</script>
@endsection
