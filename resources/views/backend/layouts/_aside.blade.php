<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a class="brand-link" href="{{route('admin.index')}}">
        <img src="/vendor/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/vendor/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.index')}}" class="d-block">{{Auth::user()->profile->surname}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon far fa fa-home"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Товары
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product_image.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Изображения товаров
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('brand.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Бренды
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('property.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-user"></i>
                        <p>
                            Свойства
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('callback.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-phone"></i>
                        <p>
                            Обратные звонки
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
