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
                            <h5 class="card-title text-right float-left text-bold">تسجيل بيانات المريض</h5>

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

                                <ul class="error_desc text-right"></ul>

                            </div>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card text-right callout1 callout-success">
                                        <div class="card-header border-transparent text-bold text-right ">
                                            <h3 class="card-title text-bold text-left float-left">اكتب الشكوي</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-12 ">
                                                                <div class="form-group">
                                                                    <textarea id="inputDescription" class="form-control"
                                                                        rows="4"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card text-right callout1 callout-warning">
                                        <div class="card-header border-transparent text-bold text-right ">
                                            <h3 class="card-title text-bold text-left float-left">اخذ قياس ضربات القلب
                                                والاكسجين بالدم</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-5 ">
                                                                <div class="text-left">
                                                                    <ol>
                                                                        <li>ضع طرف اصبعك علي الحساس الذي يضء بالأحمر حتي
                                                                            يغطي الحساس بالكامل حتي يتم قياس

                                                                            معدل ضربات القلب والاكسجين بالدم.
                                                                        </li>
                                                                        <li>انتظر حتي 10 ثواني لاخذ القراءة بشكل صحيح
                                                                            وسوف تظهر امامك.</li>

                                                                    </ol>
                                                                </div>
                                                            </td>
                                                            <td class="col-3 ">


                                                                <label> الأكسجين بالدم</label>
                                                                <input type="text" class="form-control" name="heart"
                                                                    id="spo2" value="" disabled>
                                                                <br>
                                                                <label> ضربات القلب</label>
                                                                <input type="text" class="form-control" name="heart"
                                                                    id="heart" value="" disabled>
                                                            </td>
                                                            <td class="col-4 ">
                                                                <div class="">
                                                                    <img src=" {{asset('assets/')}}/dist/img/heart.jpeg"
                                                                        width="200px" height="200px" alt="heart">
                                                                </div>

                                                            </td>

                                                        </tr>



                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">

                                            <a href="#" class="btn btn-sm btn-warning float-left"
                                                style="background-color: #d39e00; color: #fff" id="heatrSensor">اخذ قياس
                                                ضربات
                                                القلب</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <div class="card text-right callout1 callout-info">
                                        <div class="card-header border-transparent text-bold text-right ">
                                            <h3 class="card-title text-bold text-left float-left">
                                                اخذ قياس درجة الحرارة
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-5 ">
                                                                <div class="text-left">
                                                                    <ol>
                                                                        <li>
                                                                            ضع يدك علي الحساس الأسود المجاور لمدة 30
                                                                            ثانية لقياس درجة الحرارة حتى تظهر قراءة درجة
                                                                            الحراره على الشاشة
                                                                        </li>
                                                                        <li>
                                                                            اذا لم تظهر القراءات رجاء اعد العملية مرة
                                                                            اخري حتى يتم اخذ القياسات
                                                                        </li>

                                                                    </ol>
                                                                </div>
                                                            </td>
                                                            <td class="col-3 ">
                                                                <br>
                                                                <br>

                                                                <input type="text" class="form-control" name="temp"
                                                                    id="temp" value="" disabled>
                                                            </td>
                                                            <td class="col-4 ">
                                                                <div class="">
                                                                    <img src=" {{asset('assets/')}}/dist/img/temp.jpeg"
                                                                        width="200px" height="200px" alt="temp">
                                                                </div>

                                                            </td>

                                                        </tr>



                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">

                                            <a href="#" class="btn btn-sm btn-info float-left" id="tempSensor">اخذ قياس
                                                درجة الحرارة

                                            </a>
                                        </div>
                                        <!-- /.card-footer -->
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

                                    <div class="description-block border-right text-center">
                                        <a href="#" class="btn btn-sm btn-danger float-left next_data text-bold"
                                            id="next_data">التالي
                                            لتأكيد الحجز</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
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
</script> --}}
{{-- //form store
id="next_data"
--}}
{{--
//heart sensor
id="heatrSensor"
id="spo2" =>input
id="heart" =>input

--}}
{{--
//temp sensor
id="tempSensor"
id="temp" =>input
--}}
{{--
//description
id="inputDescription"
--}}
{{--
//error
error_desc =>value
error_header =>d-none
--}}
<script>
    $(document).ready(function(){
        $("#next_data").click(function (e){
        e.preventDefault();
        var description = $("#inputDescription").val();
        var heart = $("#heart").val();
        var temp = $("#temp").val();
        var spo2 = $("#spo2").val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // console.log(description)
        // console.log(heart)
        // console.log(temp)
        $.ajax({
        type: "POST",
        url: "http://localhost/Health-Care-Center/public/patient/add_data",
        data: {
        description: description,
        heart: heart,
        temp: temp,
        spo2: spo2,
        _token: csrfToken
        },
        success: function(response) {
        var message = response.message;
        var st =response.st;
        // console.log(message.length)
        if(st == 1){
       $(".error_header").removeClass('d-none');
            for(var i =0 ; i<message.length;i++){
            $(".error_desc").append('<li>' + message[i] + '</li>');
            }
        }

        if(st == 2){
        $(".error_header").addClass('d-none');
        $(".error_desc").text("");
        window.location.href = '{{ route("patient.confirm") }}';


        }
        },

        });

    });

});
</script>
<script>
    $(document).ready(function(){
            $("#heatrSensor").click(function(){
                $.ajax({
                    url: "{{ route('patient.heart') }}",
                    type: "GET",

                    success: function(response){
                        console.log(response);
                        var arduinoResponseArray = response.arduino_response.split(',');
                        $('#heart').val(arduinoResponseArray[0].trim());
                        $('#spo2').val(arduinoResponseArray[1].trim());
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
</script>
<script>
    $(document).ready(function(){
            $("#tempSensor").click(function(){
                $.ajax({
                    url: "{{ route('patient.temp') }}",
                    type: "GET",

                    success: function(response){
                        console.log(response);
                        $('#temp').val(response.arduino_response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
</script>

@endsection
