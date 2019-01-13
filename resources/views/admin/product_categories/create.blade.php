@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'productcategories.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Название">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <select name="parent_id" id="" class="form-control select2">
                                <option value="0">Самостаятельня категория</option>
                                @include('MenuItem2', ['items' => $m_builder->roots()])
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <select name="filter_type" id="" class="form-control select2">
                                <option value="1">Series</option>
                                <option value="0">Features</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
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