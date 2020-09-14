@extends('layouts.main')

@section('title', 'Панель адміністратора')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4" onclick="javascript:location.href='/admin/sits';" style="cursor:pointer">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>ЗВТ</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Sit::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/naimens';" style="cursor:pointer">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Назви</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Naimen::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/types';" style="cursor:pointer">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Умовні позначення</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Type::all()->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" onclick="javascript:location.href='/admin/laboratories';" style="cursor:pointer">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Лабораторії</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Laboratory::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/works';" style="cursor:pointer">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-wrench"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Роботи</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Work::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/podrazdelenies';" style="cursor:pointer">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Підрозділи</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Podrazdelenie::all()->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" onclick="javascript:location.href='/admin/edizms';" style="cursor:pointer">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Одиниці вимірювання</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Edizm::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/statuses';" style="cursor:pointer">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Статуси</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Status::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/groups';" style="cursor:pointer">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Групи</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Group::all()->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" onclick="javascript:location.href='/admin/kabinets';" style="cursor:pointer">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Кабінети</h5></b></span>
                        <span class="info-box-number">9{{\App\Models\Metrology\Kabinet::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/brigades';" style="cursor:pointer">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Бригади</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\Brigade::all()->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" onclick="javascript:location.href='/admin/users';" style="cursor:pointer">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b><h5>Користувачі</h5></b></span>
                        <span class="info-box-number">{{\App\Models\Metrology\User::all()->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
