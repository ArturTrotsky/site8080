@extends('layouts.layout')

@section('title', 'Протокол')
@section('header', 'Редагування протоколу метрологічного контролю ЗВТ')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        <section class="content">

            {{Form::open(['route'=>['protocols.update', $protocol->id], 'method'=>'put'])}}

            <input type="hidden" name="sit_id" value="{{$protocol->sit->id}}">

            <div class="content">
                <div class="card card-default">
                    <div class="card-header" style="background: #51a7ff">
                        <h3 class="card-title"><b>Умови проведення</b></h3>
                    </div>
                    <div class="card-body" style="border: 2px solid #51a7ff">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="temperature">Температура довкілля, °С</label>
                                    <input type="text"
                                           class="form-control"
                                           id="example"
                                           name="temperature"
                                           value="{{$protocol->temperature}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="davlenie">Атмосферний тиск, кПа</label>
                                    <input type="text"
                                           class="form-control"
                                           id="example"
                                           name="davlenie"
                                           value="{{$protocol->davlenie}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valazhnost">Відносна вологість, %</label>
                                    <input type="text"
                                           class="form-control"
                                           id="example"
                                           name="valazhnost"
                                           value="{{$protocol->valazhnost}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header" style="background: #51a7ff">
                        <h3 class="card-title"><b>Об'єкт метрологічного контролю</b></h3>
                    </div>
                    <div class="card-body" style="border: 2px solid #51a7ff">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="naimen">{{NAME}}</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="naimen"
                                           value="{{$protocol->sit->type->naimen->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">{{TYPE}}</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="type"
                                           value="{{$protocol->sit->type->name}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="diapazon">{{DIAPAZON}}</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="diapazon"
                                           value="{{$protocol->sit->diapazon}} {{$protocol->sit->edizm->name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pohibka">{{POHIBKA}}</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="pohibka"
                                           value="{{$protocol->sit->pohibka}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number">{{NUMBER}}</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="number"
                                           value="{{$protocol->sit->number}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header" style="background: #51a7ff">
                        <h3 class="card-title"><b>Еталони вимірювання</b></h3>
                    </div>
                    <div class="card-body" style="border: 2px solid #51a7ff">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Еталон вимірювання</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="etalon1_id"
                                            type="text">
                                        <option selected="selected"
                                                value="">
                                        @isset($protocol->etalon1->id)
                                            <option selected="selected"
                                                    value="{{$protocol->etalon1->id}}">
                                                {{$protocol->etalon1->type->name}}
                                                , № {{$protocol->etalon1->number}}
                                                , {{$protocol->etalon1->diapazon}} {{$protocol->etalon1->edizm->name}}
                                                @endisset
                                            </option>
                                            @foreach($sits->sortBy('number') as $sitItem)
                                                <option
                                                    value="{{$sitItem->id}}">{{$sitItem->type->name}}
                                                    , № {{$sitItem->number}}
                                                    , {{$sitItem->diapazon}} {{$sitItem->edizm->name}}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Еталон вимірювання</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="etalon2_id"
                                            type="text">
                                        <option selected="selected"
                                                value="">
                                        @isset($protocol->etalon2->id)
                                            <option selected="selected"
                                                    value="{{$protocol->etalon2->id}}">
                                                {{$protocol->etalon2->type->name}}
                                                , № {{$protocol->etalon2->number}}
                                                , {{$protocol->etalon2->diapazon}} {{$protocol->etalon2->edizm->name}}
                                                @endisset
                                            </option>
                                            @foreach($sits->sortBy('number') as $sitItem)
                                                <option
                                                    value="{{$sitItem->id}}">{{$sitItem->type->name}}
                                                    , № {{$sitItem->number}}
                                                    , {{$sitItem->diapazon}} {{$sitItem->edizm->name}}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Еталон вимірювання</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="etalon3_id"
                                            type="text">
                                        <option selected="selected"
                                                value="">
                                        @isset($protocol->etalon3->id)
                                            <option selected="selected"
                                                    value="{{$protocol->etalon3->id}}">
                                                {{$protocol->etalon3->type->name}}
                                                , № {{$protocol->etalon3->number}}
                                                , {{$protocol->etalon3->diapazon}} {{$protocol->etalon3->edizm->name}}
                                                @endisset
                                            </option>
                                            @foreach($sits->sortBy('number') as $sitItem)
                                                <option
                                                    value="{{$sitItem->id}}">{{$sitItem->type->name}}
                                                    , № {{$sitItem->number}}
                                                    , {{$sitItem->diapazon}} {{$sitItem->edizm->name}}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header" style="background: #51a7ff">
                        <h3 class="card-title"><b>Результати метрологічного контролю</b></h3>
                    </div>
                    <div class="card-body" style="border: 2px solid #51a7ff">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Дата виконання робіт</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class=""></i>
                                        </div>
                                        <input type="text"
                                               class="form-control pull-right"
                                               id="date"
                                               name="date"
                                               value="{{$protocol->date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nextDate">Строк метрологічного контролю згідно графіка</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="nextDate"
                                           value="{{$protocol->grafik->datePlanWork}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Виконані роботи</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="work_id"
                                            type="text">
                                        <option selected="selected"
                                                value="{{$protocol->work_id}}">{{$protocol->work->name}}</option>
                                        @foreach($works as $work)
                                            <option value="{{$work->id}}">{{$work->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work">Вид метрологічного контролю згідно графіка</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="work"
                                           value="{{$protocol->grafik->work->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{LABORATORY}}</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="laboratory_id"
                                            type="text">
                                        <option selected="selected"
                                                value="{{$protocol->laboratory_id}}">{{$protocol->laboratory->name}}</option>
                                        @foreach($laboratories as $laboratory)
                                            <option value="{{$laboratory->id}}">{{$laboratory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="laboratory">{{LABORATORY}} згідно графіка</label>
                                    <input type="text"
                                           readonly
                                           class="form-control"
                                           id="example"
                                           name="laboratory"
                                           value="{{$protocol->grafik->laboratory->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Виконавець робіт</label>
                                    <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger"
                                            style="width: 100%;"
                                            name="user_id"
                                            type="text">
                                        <option selected="selected"
                                                value="{{$protocol->user_id}}">{{$protocol->user->name}}</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @for ($i = 1; $i <= 16; $i++)
                    <div class="card card-default">
                        <div class="card-header" style="background: #51a7ff">
                            <div class="card-tools">
                                <button id="kanal{{$i}}" type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <h3 class="card-title" style="color: black"><b>Канал {{$i}}</b></h3>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="border: 2px solid #51a7ff">
                            <div class="row">
                                <div class="col-md-4">
                                    @for ($y = 1; $y <= 6; $y++)
                                        <div class="form-group">
                                            @if($y == 1)
                                                <label for="valueEtalon">Значення еталону</label>
                                            @endif
                                            <input type="text"
                                                   class="form-control"
                                                   id="example"
                                                   name="valueEtalon{{$i}}{{$y}}"
                                                   value="{{$protocol->getValue("valueEtalon".$i.$y)}}">
                                        </div>
                                    @endfor
                                </div>
                                <div class="col-md-4">
                                    @for ($y = 1; $y <= 6; $y++)
                                        <div class="form-group">
                                            @if($y == 1)
                                                <label for="valueSitPryamoy">Результат на ЗВТ (прямий хід)</label>
                                            @endif
                                            <input type="text"
                                                   class="form-control"
                                                   id="example"
                                                   name="valueSitPryamoy{{$i}}{{$y}}"
                                                   value="{{$protocol->getValue("valueSitPryamoy".$i.$y)}}">
                                        </div>
                                    @endfor
                                </div>
                                <div class="col-md-4">
                                    @for ($y = 1; $y <= 6; $y++)
                                        <div class="form-group">
                                            @if($y == 1)
                                                <label for="valueSitObratniy">Результат на ЗВТ (зворотній хід)</label>
                                            @endif
                                            <input type="text"
                                                   class="form-control"
                                                   id="example"
                                                   name="valueSitObratniy{{$i}}{{$y}}"
                                                   value="{{$protocol->getValue("valueSitObratniy".$i.$y)}}">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-auto">
                        <button type="submit" style="width:150px;" class="btn btn-primary">Зберегти</button>
                    </div>
                </div>
            </div>
            {{Form::close()}}
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
            $('#date').datepicker({
                language: 'ua',
                autoclose: true,
                weekStart: 1,
                todayBtn: "linked",
                format: 'yyyy-mm-dd'
            })
        })
    </script>
    <script>
        $('#kanal2').CardWidget('toggle')
        $('#kanal3').CardWidget('toggle')
        $('#kanal4').CardWidget('toggle')
        $('#kanal5').CardWidget('toggle')
        $('#kanal6').CardWidget('toggle')
        $('#kanal7').CardWidget('toggle')
        $('#kanal8').CardWidget('toggle')
        $('#kanal9').CardWidget('toggle')
        $('#kanal10').CardWidget('toggle')
        $('#kanal11').CardWidget('toggle')
        $('#kanal12').CardWidget('toggle')
        $('#kanal13').CardWidget('toggle')
        $('#kanal14').CardWidget('toggle')
        $('#kanal15').CardWidget('toggle')
        $('#kanal16').CardWidget('toggle')
    </script>
@endsection
