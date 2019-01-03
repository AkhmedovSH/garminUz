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
                        'route' => ['bookcategories.update', $bcategory->id],
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
                                    <label>Теги</label>
        
                                    {{Form::select('tags[]',
                                    $tags,
                                    $selectedTags,
                                    ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите теги'])
                                    }}
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