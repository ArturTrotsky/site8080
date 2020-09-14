@extends('layouts.layout')

@section('title', 'Умовне позначення ЗВТ')
@section('header', 'Перелік умовних позначень ЗВТ зареєстрованих у базі даних')

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
                                <a href="{{route('types.create')}}" class="btn btn-success">Додати</a>
                            </div>
                            <table id="table1" class="table table-hover table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ID}}</th>
                                    <th>{{NAME}}</th>
                                    <th>{{TYPE}}</th>
                                    <th>{{GROUP}}</th>
                                    <th>{{KABINET}}</th>
                                    <th>{{PERIODPPR}}</th>
                                    <th>{{PERIODTO}}</th>
                                    <th>{{PERIODVERIFICATION}}</th>
                                    <th>{{CENAKALIBROVKI}}</th>
                                    <th>{{KODKALIBROVKI}}</th>
                                    <th>{{CENAPOVERKI}}</th>
                                    <th>{{KODPOVERKI}}</th>
                                    <th>{{DIYA}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->naimen->name}}</td>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->group->name}}</td>
                                        <td>{{$type->kabinet->name}}</td>
                                        <td>{{$type->periodPpr}}</td>
                                        <td>{{$type->periodTo}}</td>
                                        <td>{{$type->periodVerification}}</td>
                                        <td>{{$type->cenaKalibrovki}}</td>
                                        <td>{{$type->kodKalibrovki}}</td>
                                        <td>{{$type->cenaPoverki}}</td>
                                        <td>{{$type->kodPoverki}}</td>
                                        {{Form::open(['route'=>['types.destroy', $type->id], 'method'=>'delete'])}}
                                        <td>
                                            <a title="Редагувати" href="{{route('types.edit', $type->id)}}"
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
                            "targets": [0],
                            "width": "50px"
                        },
                        {
                            "targets": [1],
                            "width": "200px"
                        },
                        {
                            "targets": [2],
                            "width": "150px"
                        },
                        {
                            "targets": [4, 8, 9, 10, 11],
                            "width": "120px"
                        },
                        {
                            "targets": [5, 6, 7],
                            "className": "text-center",
                            "width": "120px"
                        },
                        {
                            "targets": [3],
                            "className": "text-center",
                            "width": "50px"
                        },
                        {
                            "targets": [12],
                            "width": "50px"
                        },
                    ],
                    "order": [[2, "asc"]]
                }
            );
        });
    </script>
@endsection
