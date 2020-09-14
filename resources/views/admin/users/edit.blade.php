@extends('layouts.layout')

@section('title', 'Користувач')
@section('header', 'Редагування інформації про користувача зареєстрованого у базі даних')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{Form::open(['route'=>['users.update', $user->id], 'method'=>'put'])}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Логін</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="name"
                                               placeholder=""
                                               value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="email"
                                               placeholder=""
                                               value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Права доступу</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="role_id"
                                                type="text">
                                            <option selected="selected"
                                                    value="{{$user->getRole()->id}}">{{$user->getRole()->name}}</option>
                                            @foreach($roles as $item)
                                                <option
                                                    value="{{$item->id}}">{{$item->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{PODRAZDELENIE}}</label>
                                        {{Form::select('podrazdelenie_id[]', // название переменной в Request
                                        $podrazdeleniesSource, // источник
                                        $user->podrazdelenies, // выбранные для фильтра подразделения
                                        [
                                            'class' => 'select2',
                                            'multiple' => 'multiple',
                                            'data-placeholder' => 'Виберіть підрозділи',
                                            'style' => 'width: 100%',
                                        ])
                                        }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{KABINET}}</label>
                                        {{Form::select('kabinet_id[]', // название переменной в Request
                                        $kabinetsSource, // источник
                                        $user->kabinets, // выбранные для фильтра кабинеты
                                        [
                                            'class' => 'select2',
                                            'multiple' => 'multiple',
                                            'data-placeholder' => 'Виберіть кабінети',
                                            'style' => 'width: 100%',
                                        ])
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="{{route('users.index')}}" style="width:150px;"
                                   class="btn btn-danger">Назад</a>
                            </div>
                            <div class="col-md-auto">
                                <button type="submit" style="width:150px;" class="btn btn-primary">Зберегти
                                </button>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

@section('page-script')
    <script>
        $(function () {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection
