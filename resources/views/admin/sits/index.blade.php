@extends('layouts.layout')

@section('title', 'Перелiк ЗВТ')
@section('header', 'Перелік екземплярів ЗВТ зареєстрованих у базі даних')

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
                        <div class="card-body">
                            <div class="form-group">
                                <a href="{{route('sits.create')}}" class="btn btn-success">Додати</a>
                            </div>
                            <table id="table1" class="table table-hover table-sm table-bordered">
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
                                        {{Form::open(['route'=>['sits.destroy', $sit->id], 'method'=>'delete'])}}
                                        <td>
                                            <a title="Редагувати" href="{{route('sits.edit', $sit->id)}}"
                                               class="fa fa-pen"></a>
                                            <a title="Показати PDF"
                                               href="{{action('Admin\SitsController@showPDF', $sit->id)}}"
                                               class="fa fa-lg fa-file-pdf"
                                               target="_blank"></a>
                                            <a title="Завантажити PDF"
                                               href="{{action('Admin\SitsController@downloadPDF', $sit->id)}}"
                                               class="fa fa-lg fa-download"
                                               target="_blank"></a>
                                            <button class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Ви впевнені?')"
                                                    type="submit"
                                                    class="delete">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                        {{Form::close()}}
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
                    {{$sits->links()}}
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
    <script>
        $(function () {
            $("#table1").DataTable(
                {
                    "dom": 't',
                    "pageLength": -1,
                    "scrollX": true,
                    'columnDefs': [
                        {
                            "targets": [0],
                            "width": "100px"
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
@endsection
