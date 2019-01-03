@extends('admin.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить пользователя
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['users.update', $user->id],
		'method'	=>	'put',
		'files'	=>	true
	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
              <label for="exampleInputFile">Аватар</label>
              <input type="file" name="avatar" id="exampleInputFile">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Право на проверку задач</label>
        @if ($user->lesson_checker == 0)
        Нет<input class="minimal"  checked="checked" name="lesson_checker" type="radio" value="0">
        Да<input class="minimal" name="lesson_checker" type="radio" value="1">
        @else
        Нет<input class="minimal" name="lesson_checker" type="radio" value="0">
        Да<input class="minimal" name="lesson_checker" checked="checked" type="radio" value="1">
        @endif
      </div>
        <div class="form-group">
          <label>Assign Role</label>
          <div class="row">
            @foreach ($roles as $role)
              <div class="col-lg-3">
                <div class="checkbox">
                  <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                    @foreach ($user->roles as $user_role)
                    @if ($user_role->id == $role->id)
                    checked
                    @endif
                    @endforeach> {{ $role->name }}</label>
                </div>
              </div>
            @endforeach
          </div>
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
      </div>
	{{Form::close()}}
    </section>
  </div>
@endsection