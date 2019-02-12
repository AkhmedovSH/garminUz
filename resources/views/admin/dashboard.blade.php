@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница админки Garmin.uz</h3>
            </div>
            <div class="box-body">
                Сайт создан для продажи продукции бренда GARMIN
            </div>
            {{Form::open(['route'=>['black_title'], 'method'=>'post','files'=>true])}}
            <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Рекламная надпись(черная) на всех страницах </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $black_title->title }}">
                        <button class="btn btn-warning pull-left">Изменить</button>
                    </div>
                </div>
            </div>
            </div>
            {{Form::close()}}

            {{Form::open(['route'=>['dollar'], 'method'=>'post','files'=>true])}}
            <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Курс Доллара </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="course" value="{{ $dollar->course }}">
                        <button class="btn btn-warning pull-left">Изменить</button>
                    </div>
                </div>
            </div>
            </div>
            {{Form::close()}}
        </div>


    </section>
    <!-- /.content -->
</div>
@endsection