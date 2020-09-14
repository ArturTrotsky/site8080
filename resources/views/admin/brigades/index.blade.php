@extends('layouts.layout')

@section('title', 'Бригада')
@section('header', 'Перелік бригад зареєстрованих у базі даних')

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
                                <a href="{{route('brigades.create')}}" class="btn btn-success">Додати</a>
                            </div>
                            <table id="table1" class="table table-hover table-sm table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ID}}</th>
                                    <th>{{NAME}}</th>
                                    <th>{{DIYA}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brigades as $brigade)
                                    <tr>
                                        <td>{{$brigade->id}}</td>
                                        <td>{{$brigade->name}}</td>
                                        {{Form::open(['route'=>['brigades.destroy', $brigade->id], 'method'=>'delete'])}}
                                        <td>
                                            <a title="Редагувати" href="{{route('brigades.edit', $brigade->id)}}"
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
                    'columnDefs': [
                        {
                            "targets": 0,
                            "width": "50px"
                        },
                        {
                            "targets": 2,
                            "width": "50px",
                        }],
                    "order": [[1, "asc"]]
                }
            );
        });
    </script>
@endsection
