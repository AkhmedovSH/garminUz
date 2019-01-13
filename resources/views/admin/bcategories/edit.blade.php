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
                    {{Form::open([
                        'route' => ['menucategories.update', $bcategory->id],
                        'files' => true,
                        'method' => 'put'
                    ])}}
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем категорию</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $bcategory->title }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Картинка категории верхняя</label>
                                <img src="{{$bcategory->getImage()}}" alt="" class="img-responsive" width="200">
                                <input type="file" id="exampleInputFile" name="image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Картинка категории нижняя</label>
                                <img src="{{$bcategory->getImage()}}" alt="" class="img-responsive" width="200">
                                <input type="file" id="exampleInputFile" name="image2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="my-editor" cols="30" rows="10" class="form-control">{{ $bcategory->description }}</textarea>
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