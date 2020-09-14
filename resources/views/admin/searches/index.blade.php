@extends('layouts.layout')

@section('title', 'Пошук ЗВТ / Друк бирок')
@section('header', 'Пошук ЗВТ / Друк бирок')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-12">
                        <h1>Пошук ЗВТ у базі даних</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form action="/admin/searches" method="post">
                                            {{csrf_field()}}
                                            <div class="input-group">
                                                <input type="search"
                                                       name="search_number_full"
                                                       class="form-control"
                                                       placeholder="Введіть повний заводський номер ЗВТ"
                                                       value="{{$search_number_full}}">
                                                <span class="input-group-prepend">
                                                <button type="submit" value="search-full" name="button-name"
                                                        class="btn btn-primary">Пошук</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form action="/admin/searches" method="post">
                                            {{csrf_field()}}
                                            <div class="input-group">
                                                <input type="search"
                                                       name="search_number_part"
                                                       class="form-control"
                                                       placeholder="Введіть частину заводського номера ЗВТ (min 4 знаки)"
                                                       value="{{$search_number_part}}">
                                                <span class="input-group-prepend">
                                                <button type="submit" value="search-part" name="button-name"
                                                        class="btn btn-primary">Пошук</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="table1" height="150px" class="table table-hover table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>{{DIYA}}</th>
                                    <th>{{ID}}</th>
                                    <th>{{NAME}}</th>
                                    <th>{{TYPE}}</th>
                                    <th>{{NUMBER}}</th>
                                    <th>{{PODRAZDELENIE}}</th>
                                    <th>{{DIAPAZON}}</th>
                                    <th>{{POHIBKA}}</th>
                                    <th>{{MINSHKALY}}</th>
                                    <th>{{MAXSHKALY}}</th>
                                    <th>{{GROUP}}</th>
                                    <th>{{KABINET}}</th>
                                    <th>{{WORK}}</th>
                                    <th>{{PERIODMETROLOGY}}</th>
                                    <th>{{DATELASTWORK}}</th>
                                    <th>{{LABORATORY}}</th>
                                    <th>{{LABORATORYMESTO}}</th>
                                    <th>{{LABORATORYOBLADNANNYA}}</th>
                                    <th>{{BRIGADE}}</th>
                                    <th>{{PERIODPPR}}</th>
                                    <th>{{PERIODTO}}</th>
                                    <th>{{PERIODVERIFICATION}}</th>
                                    <th>{{CENAKALIBROVKI}}</th>
                                    <th>{{KODKALIBROVKI}}</th>
                                    <th>{{CENAPOVERKI}}</th>
                                    <th>{{KODPOVERKI}}</th>
                                    <th>{{STATUS}}</th>
                                    <th>{{DATEPLANWORK}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sits as $sit)
                                    <tr>
                                        <td>
                                            <div class="btn-group">
                                                {{Form::open(['route'=>['searches.destroy', $sit->id], 'method'=>'delete'])}}
                                                <button class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Ви впевнені?')"
                                                        type="submit"
                                                        class="delete">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <a title="Показати PDF"
                                                   href="{{action('Admin\SitsController@showPDF', $sit->id)}}"
                                                   class="fa fa-lg fa-file-pdf"
                                                   target="_blank">
                                                </a>
                                                <a title="Редагувати" href="{{route('searches.edit', $sit->id)}}"
                                                   class="fa fa-pen">
                                                </a>
                                                {{Form::close()}}
                                            </div>

                                            {{--Кнопка Бирка ЗВТ--}}
                                            <div class="btn-group">
                                                <button form="dateBirka"
                                                        title="Бирка ЗВТ"
                                                        class="btn btn-default btn-sm"
                                                        data-toggle="dropdown" border="none">
                                                    <img src="\img\buttons\birka.png" width="20">
                                                    @if($sit->dateBirka) {{$sit->dateBirka}}
                                                    @else відсутня
                                                    @endif
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu" style="width:250px;">
                                                    {{Form::open(['route'=>['birkas.update', $sit->id], 'method'=>'put'])}}
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control pull-right"
                                                               id="dateBirka{{$sit->id}}"
                                                               name="dateBirka"
                                                               value=""
                                                               placeholder="Зробити бирку ЗВТ">
                                                        <span class="input-group-prepend">
                                                        <button type="submit" value="date" name="button-name"
                                                                class="btn btn-primary">OK</button>
                                                        </span>
                                                    </div>
                                                    {{Form::close()}}
                                                </div>
                                            </div>
                                            {{--Кінець кнопка Бирка ЗВТ--}}

                                        </td>
                                        <td>{{$sit->id}}</td>
                                        <td>{{$sit->type->naimen->name}}</td>
                                        <td>{{$sit->type->name}}</td>
                                        <td>{{$sit->number}}</td>
                                        <td>{{$sit->podrazdelenie->name}}</td>
                                        <td>{{$sit->diapazon}} {{$sit->edizm->name}}</td>
                                        <td>{{$sit->pohibka}}</td>
                                        <td>{{$sit->minShkaly}}</td>
                                        <td>{{$sit->maxShkaly}}</td>
                                        <td>{{$sit->type->group->name}}</td>
                                        <td>{{$sit->type->kabinet->name}}</td>
                                        <td>{{$sit->work->name}}</td>
                                        <td>{{$sit->periodMetrology}}</td>
                                        <td>{{$sit->dateLastWork}}</td>
                                        <td>{{$sit->laboratory->name}}</td>
                                        <td>{{$sit->laboratoryMesto->name}}</td>
                                        <td>{{$sit->laboratoryObladnannya->name}}</td>
                                        <td>{{$sit->brigade->name}}</td>
                                        <td>{{$sit->type->periodPpr}}</td>
                                        <td>{{$sit->type->periodTo}}</td>
                                        <td>{{$sit->type->periodVerification}}</td>
                                        <td>{{$sit->type->cenaKalibrovki}}</td>
                                        <td>{{$sit->type->kodKalibrovki}}</td>
                                        <td>{{$sit->type->cenaPoverki}}</td>
                                        <td>{{$sit->type->kodPoverki}}</td>
                                        <td>{{$sit->status->name}}</td>
                                        <td>{{$sit->dateNextWork}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-12">
                        <h1>Друк ідентифікаторів статусу метрологічного контролю ЗВТ</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-auto">
                                    {{Form::open(['route'=>['birka.reset'], 'method'=>'post'])}}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button style="width:200px;" class="btn btn-danger">Очистити бирки</button>
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                                <div class="col-md-auto">
                                    {{Form::open(['route'=>['birka.showPDF'], 'method'=>'post'])}}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button style="width:200px;" class="btn btn-primary">Роздрукувати бирки
                                            </button>
                                        </div>
                                        <input type="hidden"
                                               class="form-control"
                                               id="example"
                                               name="sit_id"
                                               placeholder=""
                                               value="{{$birkaSitIDsJson}}">
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                            @if($birkaSits)
                                <table id="table2" class="table table-hover table-sm table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{DATEBIRKA}}</th>
                                        <th>{{DATEPROTOCOL}}</th>
                                        <th>{{PERIODMETROLOGY}}</th>
                                        <th>{{TYPE}}</th>
                                        <th>{{NUMBER}}</th>
                                        <th>{{PODRAZDELENIE}}</th>
                                        <th>{{WORK}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($birkaSits as $sit)
                                        <tr>
                                            <td>{{$sit->dateBirka}}
                                            </td>
                                            <td>
                                                @if($sit->getLastProtocol()) {{$sit->getLastProtocol()->date}}
                                                @else відсутній
                                                @endif
                                            </td>
                                            <td>{{$sit->periodMetrology}}</td>
                                            <td>{{$sit->type->name}}</td>
                                            <td>{{$sit->number}}</td>
                                            <td>{{$sit->podrazdelenie->name}}</td>
                                            <td>{{$sit->work->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('page-script')
    <script>
        JSON.parse('{{$arrIdJson}}', function (k, v) {
            $(function () {
                $('#dateBirka' + v).datepicker({
                    language: 'ua',
                    autoclose: true,
                    weekStart: 1,
                    todayBtn: "linked",
                    format: 'yyyy-mm-dd',
                });
            });
        });
    </script>
    <script>
        $(function () {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $(function () {
            $("#table1").DataTable(
                {
                    "pageLength": -1,
                    "aLengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
                    "scrollX": true,
                    "dom": 't',
                    'columnDefs': [
                        {
                            "targets": [0],
                            "width": "200px"
                        },
                        {
                            "targets": [1],
                            "width": "50px"
                        },
                        {
                            "targets": [2, 4],
                            "width": "200px"
                        },
                        {
                            "targets": [3, 5],
                            "width": "150px"
                        },
                        {
                            "targets": [6, 11, 12, 22, 23, 24, 25, 26],
                            "width": "120px"
                        },
                        {
                            "targets": [7, 8, 9, 13, 14, 18, 19, 20, 21],
                            "className": "text-center",
                            "width": "120px"
                        },
                        {
                            "targets": [10],
                            "className": "text-center",
                            "width": "50px"
                        },
                        {
                            "targets": [15, 16, 17],
                            "width": "300px"
                        },
                        {
                            "targets": [27],
                            "className": "text-center",
                            "width": "100px"
                        },
                    ],
                    "order": [[0, "desc"]]
                }
            );
        });
    </script>

    <script>
        $(function () {
            $("#table2").DataTable(
                {
                    "pageLength": -1,
                    "aLengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "All"]],
                    "scrollX": true,
                    "dom": 't',
                    'columnDefs': [
                        {
                            "targets": [0, 1, 2],
                            "className": "text-center",
                            "width": "120px"
                        },
                        {
                            "targets": [3],
                            "width": "220px"
                        },
                        {
                            "targets": [4],
                            "width": "270px"
                        },
                        {
                            "targets": [5],
                            "width": "270px"
                        },
                        {
                            "targets": [6],
                            "width": "150px"
                        },
                    ],
                    "order": [[0, "desc"]]
                }
            );
        });
    </script>
@endsection
