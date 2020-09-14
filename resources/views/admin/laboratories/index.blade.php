@extends('layouts.layout')

@section('title', 'ЦСМ')
@section('header', 'Перелік метрологічних лабораторій зареєстрованих у базі даних')

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
                                <a href="{{route('laboratories.create')}}" class="btn btn-success">Додати</a>
                            </div>
                            <table id="table1" class="table table-hover table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ID}}</th>
                                    <th>{{NAME}}</th>
                                    <th>{{NAMEFULL}}</th>
                                    <th>{{ADRESS}}</th>
                                    <th>{{DIRPOSADA}}</th>
                                    <th>{{DIRNAME}}</th>
                                    <th>{{EDRPOU}}</th>
                                    <th>{{TEL}}</th>
                                    <th>{{IBAN}}</th>
                                    <th>{{DIYA}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($laboratories as $laboratory)
                                    <tr>
                                        <td>{{$laboratory->id}}</td>
                                        <td>{{$laboratory->name}}</td>
                                        <td>{{$laboratory->name_full}}</td>
                                        <td>{{$laboratory->address}}</td>
                                        <td>{{$laboratory->dir_posada}}</td>
                                        <td>{{$laboratory->dir_name}}</td>
                                        <td>{{$laboratory->edrpou}}</td>
                                        <td>{{$laboratory->tel}}</td>
                                        <td>{{$laboratory->iban}}</td>
                                        {{Form::open(['route'=>['laboratories.destroy', $laboratory->id], 'method'=>'delete'])}}
                                        <td>
                                            <a title="Редагувати" href="{{route('laboratories.edit', $laboratory->id)}}"
                                               class="fa fa-pen"></a>
                                            <button class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Ви впевнені?')"
                                                    type="submit"
                                                    class="delete">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                        {{Form::close()}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('page-script')
    <script>
        $(function () {
            $("#table1").DataTable(
                {
                    "dom": 't',
                    "pageLength": -1,
                    "scrollX": true,
                    'columnDefs': [
                        {
                            "targets": [0, 9],
                            "width": "50px"
                        },
                        {
                            "targets": 1,
                            "width": "275px"
                        },
                        {
                            "targets": [2, 8],
                            "width": "400px"
                        },
                        {
                            "targets": 3,
                            "width": "300px"
                        },
                        {
                            "targets": [4, 7],
                            "width": "250px"
                        },
                        {
                            "targets": [5, 6],
                            "width": "170px"
                        }],
                    "order": [[1, "asc"]]
                }
            );
        });
    </script>
@endsection
