@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open([
                    'route' => 'slider.store',
                    'files' => true
                ]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем Картинки на Главную</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заголовок 2-3 слово</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Заголовок uz">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание 5-10 слов</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Описание">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ссылка пример: https://www.google.com/</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="url" placeholder="Ссылка">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка 1600x455 пикселей формат jpg png jpeg</label>
                            <input type="file" id="exampleInputFile" name="image">
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