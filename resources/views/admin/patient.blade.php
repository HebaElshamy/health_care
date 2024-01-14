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
                                <th class="text-center">اسم القسم</th>
                                <th class="text-center">حالة القسم</th>
                                <th class="text-center">عدد الأطباء</th>
                                <th class="text-center">أجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td> 4</td>
                                <td class="text-center py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
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
                                        </div>
                                        <a href="#" class="btn  mr-2" style="font-size: 20px" data-toggle="modal"
                                            data-target="#modal-edit"><i class="fas fa-pencil-alt text-success"></i></a>
                                        <div class="modal fade text-left" id="modal-edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">تعديل القسم</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label for="inputName">اسم القسم</label>
                                                                <input type="text" id="inputName" class="form-control"
                                                                    name="name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDescription">وصف القسم</label>
                                                                <textarea id="inputDescription" class="form-control"
                                                                    rows="2" name="description"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputStatus">حالة القسم</label>
                                                                <select class="form-control custom-select">
                                                                    <option selected="" disabled="" name='status'>اختر
                                                                        حالة القسم</option>
                                                                    <option value="0">متاح</option>
                                                                    <option value="1">غير متاح</option>
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
                                            data-target="#modal-delete"><i class="fas fa-trash text-danger"></i></a>
                                        <div class="modal fade" id="modal-delete">
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
                                                        <p>هل متأكد من حذف القسم ؟</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger">حذف</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم القسم</th>
                                <th class="text-center">حالة القسم</th>
                                <th class="text-center">عدد الأطباء</th>
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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputName">اسم القسم</label>
                                <input type="text" id="inputName" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">وصف القسم</label>
                                <textarea id="inputDescription" class="form-control" rows="2"
                                    name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">حالة القسم</label>
                                <select class="form-control custom-select">
                                    <option selected="" disabled="" name='status'>اختر حالة القسم</option>
                                    <option value="0">متاح</option>
                                    <option value="1">غير متاح</option>
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
