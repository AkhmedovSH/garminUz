@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route' => ['products.update', $product->id],
        'files' => true,
        'method' => 'put',
        'autocomplete' => 'off'
    ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Редактирование Продукта</h3>
            </div>
            @include('admin.errors')
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Заголовок</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ $product->title }}" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Нумерация товара</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="part_number" value="{{ $product->part_number }}" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Тип ремешка стиля итд</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="notice" value="{{ $product->notice }}" >
                    </div>

                    <div class="form-group">
                        <img src="{{$product->getImage()}}" class="img-responsive" width="200" style="margin: 0 auto;">
                        <label for="exampleInputFile">Лицевая картинка jpeg jpg png (300x300)</label>
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                    <div class="form-group">
                        @if(isset($slider_image))
                            @foreach ($slider_image as $image)
                            <img src="/uploads/products/{{ $image->image }}" class="img-responsive" width="15%" style="display:inline-flex">
                            @endforeach
                        @endif
                        <label for="exampleInputFile">Выбор нескольких картинок (зажимая Ctrl) (300x300)</label>
                        <input type="file" id="exampleInputFile" name="slider_image[]" multiple>
                    </div>
                    <div class="form-group">
                        <label>Какой категории относиться товар</label>
                        {{Form::select('categories[]',
                        $tags,
                        $selectedTags,
                        ['class' => 'form-control select2', 'multiple'=>'multiple', 'data-placeholder' =>'Выберите категории'])
                        }}
                    </div>
                        <div class="form-group">
                        <label>Фильтры для товара</label>
                        {{Form::select('filters[]',
                            $filters,
                            $selectedFilters,
                            ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите фильтры'])
                        }}
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Цена в сумах</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Скидка на товар в процентах %</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="sale" value="{{ $product->sale }}">
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Если товар не одиночный (выбрать категорию)</label>
                            {{Form::select('series_category_id',$productGroup,$product->series_category_id,['class' => 'form-control select', 'placeholder' => 'Выберите категории'])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название группы часов</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                placeholder="Как называеться линия товаров" name="series_title" value="{{ $product->series_title }}" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Размер часов(41,47,51) мм</label>
                                {{ Form::select('pa_case_size', ['42' => '42', '47' => '47', '51' => '51'],
                                $product->pa_case_size, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Если товар имеет отслеживание пульса</label>
                                {{ Form::select('pa_pulse_ox', ['1' => 'Да', '0' => 'Нет'],
                                $product->pa_pulse_ox, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Сапфирные часы</label>
                                {{ Form::select('pa_saphire', ['1' => 'Да', '0' => 'Нет'],
                                $product->pa_saphire, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Музыка в часах</label>
                                {{ Form::select('pa_music', ['1' => 'Да', '0' => 'Нет'],
                                $product->pa_music, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Карта в часах</label>
                                {{ Form::select('pa_maps', ['1' => 'Да', '0' => 'Нет'],
                                $product->pa_maps, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Размер часов(Маленький,Средний)</label>
                                {{ Form::select('pa_size', ['small' => 'Маленький', 'medium' => 'Средний',
                                'one_size_fits_most' => 'one_size_fits_most','small_medium' => 'Маленький\Средний',
                                'big'=>'Большой'],
                                $product->pa_size, ['class' => 'form-control select2','placeholder' => 'Выберите категории']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">App Store</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="app_store_url" value="{{ $product->app_store_url }}">
                                <label for="exampleInputEmail1">Google Play(Play Market)</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="google_play_url" value="{{ $product->google_play_url }}">
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {{ Form::checkbox('new', '1', $product->new) }}<label> Новый</label>
                                {{ Form::checkbox('featured', '1', $product->featured) }}<label> Избранный</label>
                                {{ Form::checkbox('main_page', '1', $product->main_page) }}<label> На Главной странице</label>
                                {{ Form::checkbox('in_stock', '1', $product->in_stock) }}<label> Имееться в наличии</label>
                                {{ Form::checkbox('status', '1', $product->status) }}<label> Не Скрывать продукт</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Описание 10-25 слов</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="{{ $product->description }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полное описание (overview)</label>
                        <textarea name="overview" id="my-editor" cols="30" rows="10" class="form-control">{{ $product->overview }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Спецификации товара</label>
                        <textarea name="specs" id="my-editor2" cols="30" rows="10" class="form-control">{{ $product->specs }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">В комплектации (In the box)</label>
                        <textarea name="in_the_box" id="my-editor3" cols="30" rows="10" class="form-control">{{ $product->in_the_box }}</textarea>
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
        {{Form::close()}}
    </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection