<ul class="sidebar-menu">
    <li class="header">МЕНЮ АДМИН ПАНЕЛИ</li>
    <li class="treeview">
        <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
        </a>
    </li>

        <li><a href="{{route('menucategories.index')}}"><i class="fa fa-list-ul"></i><span>Категории МЕНЮ</span></a></li>
        <li><a href="{{route('productcategories.index')}}"><i class="fa fa-list-ul"></i><span>Категории Фильтров</span></a></li>
        <li><a href="{{route('products.index')}}"><i class="fa fa-sticky-note-o"></i><span>Продукты</span></a></li>
        <li><a href="{{route('posts.index')}}"><i class="fa fa-sticky-note-o"></i><span>Посты</span></a></li>
        <li><a href="{{route('slider.index')}}"><i class="fa fa-sticky-note-o"></i><span>Слайдер</span></a></li>
        <li><a href="{{route('coupons.index')}}"><i class="fa fa-sticky-note-o"></i><span>Купоны</span></a></li>
        <li><a href="{{route('subscribers.index')}}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>

    
        <li><a ><i class="fa fa-users"></i> <span>Пользователи</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
            <ul class="treeview-menu">
                <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
                {{-- <li><a href="{{route('subscribers.index')}}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li> --}}
                <li><a href="{{route('permissions.index')}}"><i class="fa fa-user-plus"></i> <span>Доступ(ы)</span></a></li>
                <li><a href="{{route('roles.index')}}"><i class="fa fa-user-plus"></i> <span>Роли</span></a></li>
            </ul>
        </li>

</ul>