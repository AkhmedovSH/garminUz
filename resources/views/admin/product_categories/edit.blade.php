@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меняем категорию</h3>
                </div>
                <div class="box-body">
                    {{Form::open(['route'=>['productcategories.update',$category->id], 'method'=>'put'])}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label>Меню</label>
                            {{Form::select('tags[]',
                            $tags,
                            $selectedTags,
                            ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите теги'])
                            }}
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
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                {{Form::close()}}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection