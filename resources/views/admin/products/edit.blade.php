@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['posts.update', $post->id],
            'files' => true,
            'method' => 'put'
        ])}}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заголовок</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <img src="{{$post->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id',
                             $categories,
                              $post->getCategoryID(),
                              ['class' => 'form-control select2'])}}
                        </div>
                        {{-- <div class="form-group">
                            <label>Теги</label>

                            {{Form::select('tags[]',
                            $tags,
                            $selectedTags,
                            ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите теги'])
                            }}
                        </div> --}}
        

                        <!-- checkbox -->
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание </label>
                            <textarea name="description" id="my-editor2" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст </label>
                            <textarea name="content" id="my-editor" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection