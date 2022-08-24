<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('adminHome')}}">
            <img src="{{($setting->logo) ?? asset('assets/uploads/empty.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>العناصر</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('adminHome')}}">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">الرئيسية</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('admins.index')}}">
                <i class="fe fe-users side-menu__icon"></i>
                <span class="side-menu__label">المشرفين</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('sliders.index')}}">
                <i class="fe fe-camera side-menu__icon"></i>
                <span class="side-menu__label">البانر المتحرك</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{route('areas.index')}}">
                <i class="icon-directions side-menu__icon"></i>
                <span class="side-menu__label">المدن والاحياء</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('projects.index')}}">
                <i class="fe fe-dollar-sign side-menu__icon"></i>
                <span class="side-menu__label"> المشاريع الاستثمارية</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('services.index')}}">
                <i class="fe fe-zap side-menu__icon"></i>
                <span class="side-menu__label"> المزايا والخدمات</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('blogs.index')}}">
                    <i class="fe fe-edit-3 side-menu__icon"></i>
                <span class="side-menu__label"> المقالات</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('categories.index')}}">
                <i class="fe fe-list side-menu__icon"></i>
                <span class="side-menu__label"> الاقسام الرئيسية</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('users.index')}}">
                <i class="fe fe-users side-menu__icon"></i>
                <span class="side-menu__label">المستخدمين</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item" href="{{route('companies.index')}}">
                <i class="ti-home side-menu__icon"></i>
                <span class="side-menu__label">المكاتب العقارية</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item" href="{{route('admin.logout')}}">
                <i class="icon icon-lock side-menu__icon"></i>
                <span class="side-menu__label">تسجيل الخروج</span>
            </a>
        </li>

    </ul>
</aside>
