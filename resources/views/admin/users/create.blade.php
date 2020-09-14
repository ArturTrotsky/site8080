@extends('layouts.layout')

@section('title', 'Користувач')
@section('header', 'Додавання нового користувача у базу даних')

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
                        {{Form::open(['route' => 'users.store'])}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Логін</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="name"
                                               value="login{{$nextID}}"
                                               placeholder="login{{$nextID}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Пароль</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="password"
                                               value="12345678"
                                               placeholder="12345678">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="email"
                                               value="{{$nextID}}e@w.e"
                                               placeholder="{{$nextID}}e@e-e">
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
