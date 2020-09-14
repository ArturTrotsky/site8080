@extends('layouts.layout')

@section('title', 'Умовне позначення ЗВТ')
@section('header', 'Редагування умовного позначення ЗВТ зареєстрованого у базі даних')

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
                        {{Form::open(['route'=>['types.update', $type->id], 'method'=>'put'])}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{TYPE}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="name"
                                               placeholder=""
                                               value="{{$type->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{NAME}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="naimen_id"
                                                type="text">
                                            <option selected="selected"
                                                    value="{{$type->naimen->id}}">{{$type->naimen->name}}</option>
                                            @foreach($naimens->sortBy('name') as $naimen)
                                                <option value="{{$naimen->id}}">{{$naimen->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="periodPpr">{{PERIODPPR}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="periodPpr"
                                               placeholder=""
                                               value="{{$type->periodPpr}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cenaKalibrovki">{{CENAKALIBROVKI}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="cenaKalibrovki"
                                               placeholder=""
                                               value="{{$type->cenaKalibrovki}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cenaPoverki">{{CENAPOVERKI}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="cenaPoverki"
                                               placeholder=""
                                               value="{{$type->cenaPoverki}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{KABINET}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="kabinet_id"
                                                type="text">
                                            <option selected="selected"
                                                    value="{{$type->kabinet->id}}">{{$type->kabinet->name}}</option>
                                            @foreach($kabinets->sortBy('name') as $kabinet)
                                                <option value="{{$kabinet->id}}">{{$kabinet->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{GROUP}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="group_id"
                                                type="text">
                                            <option selected="selected"
                                                    value="{{$type->group->id}}">{{$type->group->name}}</option>
                                            @foreach($groups->sortBy('name') as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="periodTo">{{PERIODTO}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="periodTo"
                                               placeholder=""
                                               value="{{$type->periodTo}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kodKalibrovki">{{KODKALIBROVKI}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="kodKalibrovki"
                                               placeholder=""
                                               value="{{$type->kodKalibrovki}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kodPoverki">{{KODPOVERKI}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="kodPoverki"
                                               placeholder=""
                                               value="{{$type->kodPoverki}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="periodVerification">{{PERIODVERIFICATION}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="periodVerification"
                                               placeholder=""
                                               value="{{$type->periodVerification}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-auto">
                                    <a href="{{route('types.index')}}" style="width:150px;"
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

@section('page-script')
    <script>
        $(function () {
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            })
        })
    </script>
@endsection
