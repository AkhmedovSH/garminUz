@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route' =>'products.store',
        'files' => true,
        'autocomplete' => 'off'
    ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем Продукт</h3>
            </div>
            @include('admin.errors')
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Заголовок</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название товара" name="title" value="{{old('title')}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Нумерация товара</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Номер товара" name="part_number" value="{{old('part_number')}}" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Тип ремешка стиля итд</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Товар имеет" name="notice" value="{{old('notice')}}" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Лицевая картинка jpeg jpg png (300x300)</label>
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Выбор нескольких картинок (зажимая Ctrl) (300x300)</label>
                        <input type="file" id="exampleInputFile" name="images[]" multiple>
                    </div>
                    <div class="form-group">
                        <label>Какой категории относиться товар</label>
                        {{Form::select('categories[]',
                        $tags,
                        null,
                        ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите категории'])
                        }}
                    </div>
                        <div class="form-group">
                        <label>Фильтры для товара</label>
                        {{Form::select('filters[]',
                            $filters,
                            null,
                            ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите фильтры'])
                        }}
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Цена в долларах</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="price" value="{{old('price')}}">
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Если товар не одиночный (выбрать категорию)</label>
                            {{Form::select('case_size',$tags,null,['class' => 'form-control select2', 'placeholder' => 'Выберите категории'])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Размер часов(41,47,51) мм</label>
                            <select name="pa_case_size" class="form-control select2">
                                <option value="null">Выберите категории</option>
                                <option value="42">42</option>
                                <option value="47">47</option>
                                <option value="51">51</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Если товар имеет отслеживание пульса</label>
                            <select name="pa_pulse_ox" class="form-control select2">
                                <option value="null">Выберите категории</option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Сапфирные часы</label>
                            <select name="pa_pulse_ox" class="form-control select2">
                                <option value="null">Выберите категории</option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Музыка в часах</label>
                            <select name="pa_pulse_ox" class="form-control select2">
                                <option value="null">Выберите категории</option>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Размер часов(Маленький,Средний)</label>
                            <select name="pa_size" class="form-control select2">
                                <option value="null">Выберите категории</option>
                                <option value="large">Маленький</option>
                                <option value="small/medium">Средний</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание 10-25 слов</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="описание..." name="description" value="{{old('description')}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полное описание (overview)</label>
                        <textarea name="overview" id="my-editor" cols="30" rows="10" class="form-control">{{ old('overview') }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Спецификации товара</label>
                        <textarea name="specs" id="my-editor2" cols="30" rows="10" class="form-control">{{ old('specs') }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">В комплектации (In the box)</label>
                        <textarea name="in_the_box" id="my-editor3" cols="30" rows="10" class="form-control">{{ old('in_the_box') }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection