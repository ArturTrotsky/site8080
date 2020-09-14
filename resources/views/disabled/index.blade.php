@extends('layouts.main')

@section('title', 'Заблоковано')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-red">{{ __('Повідомлення') }}</div>

                    <div class="card-body bg-silver">
                        <div class="form-group row">
                            <strong><b><h5>{{ Auth::user()->name }}!</h5></b>Ваш аккаунт заблокований.&nbsp;
                                Для надання прав доступу зверніться до
                                <a href="mailto:artur@trotsky@ukr.net">Artur Trotsky</a></strong>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
