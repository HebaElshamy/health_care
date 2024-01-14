@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">الإدارة</h1>
                </div><!-- /.col -->
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus"></i>
                        إضافة مسئول جديد

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
                    <h3 class="card-title" style="float: right!important">جميع المسئولين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم المسئول</th>
                                <th class="text-center">البريد الالكتروني</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">حالته</th>
                                <th class="text-center">أجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $key=>$admin )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>
                                    @if ($admin->status =="super_admin")
                                    <span class="badge badge-success">{{$admin->status}}</span>
                                    @else
                                    <span class="badge badge-warning">{{$admin->status}}</span>
                                    @endif
                                </td>
                                @if (Auth::user()->id == $admin->id)
                                <td></td>
                                @else
                                <td class="text-center py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
                                            data-target="#modal-delete{{$admin->id}}"><i
                                                class="fas fa-trash text-danger"></i></a>
                                        <div class="modal fade" id="modal-delete{{$admin->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-left">حذف القسم</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-danger">
                                                        <p>هل متأكد من حذف المسئول ؟</p>
                                                    </div>
                                                    {{-- <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger">حذف</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                    </div> --}}
                                                    <div class="modal-footer justify-content-between">
                                                        <div class="modal-footer justify-content-between">
                                                            <form id="delete-form{{$admin->id}}"
                                                                action="{{ route('admin.admin.delete', $admin->id) }}"
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
                                @endif

                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">اسم المسئول</th>
                                    <th class="text-center">البريد الالكتروني</th>
                                    <th class="text-center">رقم الجوال</th>
                                    <th class="text-center">حالته</th>
                                    <th class="text-center">أجراء</th>
                                </tr>
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
                        <h4 class="modal-title">مسئول جديد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.admin.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">اسم المسئول</label>
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
                                <label for="inputStatus">حالة المسئول</label>
                                <select class="form-control custom-select" name='status'>
                                    <option selected="" disabled="">اختر حالة المسئول</option>
                                    <option value="0">اساسى</option>
                                    <option value="1">غير اساسى</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">حفظ المسئول</button>
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
