<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/" class="brand-link">
        <img src="/img/left_sidebar/user2-160x160.jpg" alt="User Image" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{Auth::user()->name}}</span>
    </a>

    <a href="/" class="brand-link">
        <img src="/img/left_sidebar/home.png" alt="Головна" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Головна</span>
    </a>

    @if(Auth::user()->isAdministrator() || Auth::user()->isModerator())
        <a href="/admin/searches" class="brand-link">
            <img src="/img/left_sidebar/search_1.png" alt="Пошук" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Пошук ЗВТ</span>
        </a>
    @endif

    @if(Auth::user()->isAdministrator())
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="true">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu"> <!--menu-open-->
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Редагування каталогу
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ol class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/sits" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ЗВТ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/naimens" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Назви</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/types" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Умовні позначення</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/laboratories" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Лабораторії</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/works" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Роботи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/podrazdelenies" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Підрозділи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/edizms" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Одиниці вимірювання</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/statuses" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Статуси</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/groups" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Групи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/kabinets" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Кабінети</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/brigades" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Бригади</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/users" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Користувачі</p>
                                </a>
                            </li>
                        </ol>
                    </li>
                </ul>
            </nav>
        </div>
    @endif

</aside>
