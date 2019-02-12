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
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название товара: Instinct™" name="title" value="{{old('title')}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Нумерация товара</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Номер товара: 010-02064-02" name="part_number" value="{{old('part_number')}}" >
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
                        <input type="file" id="exampleInputFile" name="slider_image[]" multiple>
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
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Цена" name="price" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Скидка на товар в процентах %</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="скидка" name="sale" value="{{old('sale')}}">
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Если товар не одиночный (выбрать категорию)</label>
                            {{Form::select('series_category_id',$productGroup,null,['class' => 'form-control select', 'placeholder' => 'Выберите категории'])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название группы часов</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                placeholder="Как называеться линия товаров" name="series_title" value="{{old('series_title')}}" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Размер часов(41,47,51) мм</label>
                            {{ Form::select('pa_case_size', ['42' => '42', '47' => '47', '51' => '51'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Если товар имеет отслеживание пульса</label>
                            {{ Form::select('pa_pulse_ox', ['1' => 'Да', '0' => 'Нет'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Сапфирные часы</label>
                            {{ Form::select('pa_saphire', ['1' => 'Да', '0' => 'Нет'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Музыка в часах</label>
                            {{ Form::select('pa_music', ['1' => 'Да', '0' => 'Нет'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Карта в часах</label>
                            {{ Form::select('pa_maps', ['1' => 'Да', '0' => 'Нет'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Размер часов(Маленький,Средний)</label>
                            {{ Form::select('pa_size', ['small' => 'Маленький', 'medium' => 'Средний',
                             'one_size_fits_most' => 'one_size_fits_most','small_medium' => 'Маленький\Средний',
                             'large' => 'large'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Тип ремешка</label>
                            {{ Form::select('pa_band_type', ['leather' => 'leather', 'metal' => 'metal',
                             'silicone' => 'silicone','titanium' => 'titanium',
                             'suede' => 'suede'],
                            null, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">App Store</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ссылка на App Store" name="app_store_url" value="{{old('app_store_url')}}">
                            <label for="exampleInputEmail1">Google Play(Play Market)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ссылка на Google Play" name="google_play_url" value="{{old('google_play_url')}}">
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::checkbox('new', '1', null) }}<label> Новый</label>
                            {{ Form::checkbox('featured', '1', null) }}<label> Избранный</label>
                            {{ Form::checkbox('main_page', '1', null) }}<label> На Главной странице</label>
                            {{ Form::checkbox('in_stock', '1', true) }}<label> Имееться в наличии</label>
                            {{ Form::checkbox('status', '0', true) }}<label> Не Скрывать продукт</label>
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