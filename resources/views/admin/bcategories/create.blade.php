@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open([
                    'route' => 'menucategories.store',
                    'files' => true
                    ]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Название" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <select name="parent_id" id="" class="form-control select2">
                                <option value="0">Самостаятельня категория</option>
                                @include('MenuItem2', ['items' => $m_builder->roots()])
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Картинка категории верхняя</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Картинка категории нижняя</label>
                            <input type="file" id="exampleInputFile" name="image2">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="my-editor" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
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