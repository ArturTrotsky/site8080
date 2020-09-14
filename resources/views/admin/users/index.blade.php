@extends('layouts.layout')

@section('title', 'Користувач')
@section('header', 'Перелік користувачів зареєстрованих у базі даних')

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
                                <a href="{{route('users.create')}}" class="btn btn-success">Додати</a>
                            </div>
                            <table id="table1" class="table table-hover table-sm table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ID}}</th>
                                    <th>Логін</th>
                                    <th>E-mail</th>
                                    <th>Права доступу</th>
                                    <th>{{PODRAZDELENIE}}</th>
                                    <th>{{KABINET}}</th>
                                    <th>{{DIYA}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->getRole()->name}}</td>
                                        <td>{{$user->getPodrazdeleniesNames()}}</td>
                                        <td>{{$user->getKabinetsNames()}}</td>
                                        {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
                                        <td>
                                            <a title="Редагувати"
                                               href="{{route('users.edit', $user->id)}}"
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
                            "targets": 6,
                            "width": "50px",
                        }],
                    "order": [[1, "asc"]]
                }
            );
        });
    </script>
@endsection
