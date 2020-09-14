@extends('layouts.layout')

@section('title', 'ЦСМ')
@section('header', 'Додавання нової метрологічної лабораторії у базу даних')

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
                        {{Form::open(['route'=>'laboratories.store'])}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
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
                                    <div class="form-group">
                                        <label for="address">{{ADRESS}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="address"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="dir_posada">{{DIRPOSADA}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="dir_posada"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dir_name">{{DIRNAME}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="dir_name"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="edrpou">{{EDRPOU}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="edrpou"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">{{TEL}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="tel"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="iban">{{IBAN}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="iban"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-auto">
                                    <a href="{{route('laboratories.index')}}" style="width:150px;"
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
