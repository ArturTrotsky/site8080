@extends('layouts.layout')

@section('title', 'ЗВТ')
@section('header', 'Додавання нового ЗВТ у базу даних')

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
                        {{Form::open(['route' => 'sits.store'])}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{TYPE}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="type_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($types->sortBy('name') as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{PODRAZDELENIE}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="podrazdelenie_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($podrazdelenies->sortBy('name') as $podrazdelenie)
                                                <option value="{{$podrazdelenie->id}}">{{$podrazdelenie->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="diapazon">{{DIAPAZON}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="diapazon"
                                               placeholder="Введіть значення">
                                    </div>
                                    <div class="form-group">
                                        <label for="minShkaly">{{MINSHKALY}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="minShkaly"
                                               placeholder="Введіть значення">
                                    </div>
                                    <div class="form-group">
                                        <label>{{WORK}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="work_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($works->sortBy('name') as $work)
                                                <option value="{{$work->id}}">{{$work->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="periodMetrology">{{PERIODMETROLOGY}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="periodMetrology"
                                               placeholder="Введіть значення">
                                    </div>
                                    <div class="form-group">
                                        <label>{{LABORATORYMESTO}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="laboratoryMesto_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($laboratories->sortBy('name') as $laboratory)
                                                <option value="{{$laboratory->id}}">{{$laboratory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{STATUS}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="status_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($statuses->sortBy('name') as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number">{{NUMBER}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="number"
                                               placeholder="Введіть номер">
                                    </div>
                                    <div class="form-group">
                                        <label for="pohibka">{{POHIBKA}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="pohibka"
                                               placeholder="Введіть значення">
                                    </div>
                                    <div class="form-group">
                                        <label>{{EDIZM}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="edizm_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($edizms->sortBy('name') as $edizm)
                                                <option value="{{$edizm->id}}">{{$edizm->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="maxShkaly">{{MAXSHKALY}}</label>
                                        <input type="text"
                                               class="form-control"
                                               id="example"
                                               name="maxShkaly"
                                               placeholder="Введіть значення">
                                    </div>
                                    <div class="form-group">
                                        <label>{{LABORATORY}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="laboratory_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($laboratories->sortBy('name') as $laboratory)
                                                <option value="{{$laboratory->id}}">{{$laboratory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateLastWork">{{DATELASTWORK}}</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class=""></i>
                                            </div>
                                            <input type="text"
                                                   class="form-control pull-right"
                                                   id="dateLastWork"
                                                   name="dateLastWork"
                                                   value=""
                                                   placeholder="Введіть дату">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{LABORATORYOBLADNANNYA}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="laboratoryObladnannya_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($laboratories->sortBy('name') as $laboratory)
                                                <option value="{{$laboratory->id}}">{{$laboratory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{BRIGADE}}</label>
                                        <select class="form-control select2 select2-danger"
                                                data-dropdown-css-class="select2-danger"
                                                style="width: 100%;"
                                                name="brigade_id"
                                                type="text">
                                            <option value="" selected disabled>Будь ласка, виберіть</option>
                                            @foreach($brigades->sortBy('name') as $brigade)
                                                <option value="{{$brigade->id}}">{{$brigade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-auto">
                                    <a href="{{route('sits.index')}}" style="width:150px;"
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
            $('#dateLastWork').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            })
        })
    </script>
@endsection
