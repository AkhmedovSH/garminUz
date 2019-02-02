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
                            <label>Меню</label>
                            {{Form::select('tags[]',
                            $tags,
                            null,
                            ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите теги'])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            {{ Form::select('filter_type', ['0' => 'Features', '1' => 'Series'],
                                null, ['class' => 'form-control select2']) }}
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