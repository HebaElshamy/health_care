@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">الأقسام</h1>
                </div><!-- /.col -->
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus"></i>
                        إضافة قسم جديد

                    </button>
                </div>



            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float: right!important">جميع الأقسام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم الدكتور</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">البريد الإليكتروني</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">عدد المرضي</th>
                                <th class="text-center">أجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $key => $doctor )

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->phone}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->category->name}}</td>
                                <td></td>
                                <td class="text-center py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        {{-- <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
                                            data-target="#modal-view"><i class="fas fa-eye text-info "></i></a>
                                        <div class="modal fade text-left" id="modal-view">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-left">عرض القسم</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <strong> اسم القسم</strong>
                                                        <p class="text-muted">
                                                        </p>
                                                        <hr>
                                                        <strong> وصفالقسم</strong>
                                                        <p class="text-muted"></p>
                                                        <hr>
                                                        <strong> حالةالقسم</strong>
                                                        <p class="text-muted">
                                                        </p>
                                                        <hr>
                                                        <strong> عددالأطباء</strong>
                                                        <p class="text-muted"></p>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="modal-footer justify-content-between">

                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div> --}}
                                        <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
                                            data-target="#modal-edit{{$doctor->id}}"><i
                                                class="fas fa-pencil-alt text-success"></i></a>
                                        <div class="modal fade text-left" id="modal-edit{{$doctor->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">تعديل بيانات الدكتور</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.doctor.update',$doctor->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="inputName">اسم الدكتور</label>
                                                                <input type="text" id="inputName" class="form-control"
                                                                    name="name" value="{{$doctor->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputName">البريد الإلكترونى </label>
                                                                <input type="email" id="inputName" class="form-control"
                                                                    name="email" value="{{$doctor->email}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputName">رقم الجوال</label>
                                                                <input type="text" id="inputName" class="form-control"
                                                                    name="phone" value="{{$doctor->phone}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputStatus"> القسم</label>
                                                                <select class="form-control custom-select"
                                                                    name='category_id'>
                                                                    <option selected="" disabled="">اختر القسم</option>
                                                                    @forelse ($categories as $category )
                                                                    <option value="{{$category->id}}" @if ($category->id
                                                                        == $doctor->category_id) selected
                                                                        @endif>{{$category->name}}</option>
                                                                    @empty
                                                                    <option value="">لايوجد اقسام</option>
                                                                    @endforelse
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="submit" class="btn btn-success">تعديل
                                                            القسم</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>

                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
                                            data-target="#modal-delete{{$doctor->id}}"><i
                                                class="fas fa-trash text-danger"></i></a>
                                        <div class="modal fade" id="modal-delete{{$doctor->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-left">حذف الطبيب</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-danger">
                                                        <p>هل متأكد من حذف الطبيب ؟</p>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <div class="modal-footer justify-content-between">
                                                            <form id="delete-form{{$doctor->id}}"
                                                                action="{{ route('admin.doctor.destroy', $doctor->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">حذف</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">إلغاء</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center"> لا يوجد أطباء حاليا</td>
                            </tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم الدكتور</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">البريد الإليكتروني</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">عدد المرضي</th>
                                <th class="text-center">أجراء</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.row -->


        </div><!-- /.container-fluid -->
        {{-- add model --}}
        <div class="modal fade" id="modal-add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">قسم جديد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.doctor.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">اسم الدكتور</label>
                                <input type="text" id="inputName" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="inputName">البريد الإلكترونى </label>
                                <input type="email" id="inputName" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="inputName">رقم الجوال</label>
                                <input type="text" id="inputName" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus"> القسم</label>
                                <select class="form-control custom-select" name='category_id'>
                                    <option selected="" disabled="">اختر القسم</option>
                                    <option value="0">{{$category->name}}</option>
                                    @forelse ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @empty
                                    <option value="">لايوجد اقسام</option>
                                    @endforelse
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">حفظ القسم</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
