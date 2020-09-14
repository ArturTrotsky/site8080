@extends('layouts.layout')

@section('title', 'Підрозділ')
@section('header', 'Додавання нового підрозділу у базу даних')

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
                        {{Form::open(['route' => 'podrazdelenies.store'])}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{NAME}}</label>
                                <input type="text"
                                       class="form-control"
                                       id="example"
                                       name="name"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="name_full">{{NAMEFULL}}</label>
                                <input type="text"
                                       class="form-control"
                                       id="example"
                                       name="name_full"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-auto">
                                    <a href="{{route('podrazdelenies.index')}}" style="width:150px;"
                                       class="btn btn-danger">Назад</a>
                                </div>
                                <div class="col-md-auto">
                                    <button type="submit" style="width:150px;" class="btn btn-primary">Зберегти</button>
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
