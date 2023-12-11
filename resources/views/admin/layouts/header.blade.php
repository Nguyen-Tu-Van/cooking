<div class="navbar navbar-expand-lg navbar-dark navbar-static" style="background:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkglG5QhxuNO6FaaTV1xib09dDy4cUnaQ4CkyMIDqOA0ws2C9ajo51_ZrZgporZLcWJu0&usqp=CAU)">
    <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-transmission"></i>
        </button>
    </div>

    <div class="navbar-brand text-center text-lg-left p-1">
        <a href="index.html" class="d-inline-block">
            <img src="https://cdn.pixabay.com/photo/2022/08/02/04/46/icon-7359529_1280.png" class="d-none d-sm-block" alt="" style="width: 70px;height: 70px;">
        </a>
    </div>

    <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="badge badge-warning badge-pill ml-auto ml-lg-0">9 đơn chờ duyệt</span>
                </a>
            </li>
        </ul> 
    </div>

    <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
        <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
            <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
                <img src="{{Session::get('user')['avt']??'https://png.pngtree.com/png-clipart/20190921/original/pngtree-user-avatar-boy-png-image_4693645.jpg'}}" class="rounded-pill mr-lg-2" height="34" alt="">
                <span class="d-none d-lg-inline-block text-dark">{{Session::get('user')['email']}}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
            </div>
        </li>
    </ul>
</div>