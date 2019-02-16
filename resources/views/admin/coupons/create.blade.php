@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'coupons.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем купон</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название купона</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="code" placeholder="CRDBDD01">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Процент скидки купона</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="percent_off" placeholder="Просто число примеру: 5">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection