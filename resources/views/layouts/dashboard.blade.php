@if (Route::has('login'))
    <div class="top-right links">
        @auth
            @if(Auth::user()->isDisabled())
                <strong><a href="{{url('/')}}" style="color: #0b3e6f; text-decoration: none">Головна</a></strong>

            @elseif(Auth::user()->isUser())
                <strong><a href="{{url('/user/index')}}"
                           style="color: #0b3e6f; text-decoration: none">Кабінет</a></strong>
                <strong><a href="{{url('/user/poverka')}}"
                           style="color: #0b3e6f; text-decoration: none; cursor: pointer">Графіки повірки
                        <strong><a href="{{url('/')}}"
                                   style="color: #0b3e6f; text-decoration: none">Головна</a></strong>

                        @elseif(Auth::user()->isAdministrator())
                            <strong><a href="{{url('/admin/searches')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Пошук
                                    ЗВТ</a></strong>
                            <strong><a href="{{url('/admin/poverka')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Графіки повірки
                                    ЗВТ</a></strong>
                            <strong><a href="{{url('')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Витрати на
                                    метрологічні
                                    послуги</a></strong>
                            <strong><a href="{{url('/admin/panel')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Панель
                                    адміністратора</a></strong>
                            <strong><a href="{{url('/')}}"
                                       style="color: #0b3e6f; text-decoration: none">Головна</a></strong>

                        @elseif(Auth::user()->isModerator())
                            <strong><a href="{{url('/moderator/searches')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Пошук
                                    ЗВТ</a></strong>
                            <strong><a href="{{url('/moderator/poverka')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Графіки повірки
                                    ЗВТ</a></strong>
                            <strong><a href="{{url('')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Витрати на
                                    метрологічні
                                    послуги</a></strong>
                            <strong><a href="{{url('/moderator/index')}}"
                                       style="color: #0b3e6f; text-decoration: none; cursor: pointer">Панель
                                    адміністратора</a></strong>
                            <strong><a href="{{url('/')}}"
                                       style="color: #0b3e6f; text-decoration: none">Головна</a></strong>
                        @endif


                        <strong>
                            <a class="" href="{{route('logout')}}" style="color: #0b3e6f; text-decoration: none"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Вихiд</a>
                        </strong>

                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @else
                            <strong><a href="{{route('login')}}" style="color: #0b3e6f; text-decoration: none">Вхід</a></strong>

                            @if(Route::has('register'))
                                <strong><a href="{{route('register')}}"
                                           style="color: #0b3e6f; text-decoration: none">Реєстрація</a></strong>
            @endif
        @endauth
    </div>
@endif
