<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="/assets/images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                    <p class="designation"> {{ Auth::user()->email }}</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">منوی اصلی</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title"> حساب کاربری </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">کاربران</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تنظیمات حساب</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="{{route('actions')}}">لیست رخداد و اقدام ها</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">پرس و جو</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">لیست تمام رخداد ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">لیست رخداد های اقدام نشده</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">جستوجو بر اساس تاریخ</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">

            <a class="nav-link" href="#">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <span class="menu-title">
                  <button class="btn-danger" type="submit">خروج</button>
                </span>
            </form>


        </li>


    </ul>
</nav>
