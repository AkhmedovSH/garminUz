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
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                    @include('admin.errors')
                </div>
                <form action="{{route('roles.update', $role->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название изменить нельзя</label>
                                <input type="text" class="form-control" id="name" name="name" disabled value="{{$role->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="display_name" name="display_name" value="{{$role->display_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$role->description}}">
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group" v-model="PermissionsSelected">
                                <label>Возможности</label><br>
                                @foreach ($permissions as $permission)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name='permission[]' value="{{ $permission->id }}"
                                                          @foreach ($role->permissions as $role_permit)
                                                          @if ($role_permit->id == $permission->id)
                                                          checked
                                                        @endif
                                                        @endforeach
                                                >{{ $permission->name }}</label>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-success pull-right">Добавить</button>
                    </div>
                    <!-- /.box-footer-->
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection