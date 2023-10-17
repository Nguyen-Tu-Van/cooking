<div class="navbar navbar-expand-xl navbar-dark">
    <div class="navbar-brand">
        <a href="{{route('home')}}" class="d-inline-block">
            <img src="common/images/logo/englishplus.png" alt="">
        </a>
    </div>

    <div class="d-xl-none">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-demo-dark">
            <i class="icon-menu"></i>
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-demo-dark">
        <ul class="nav navbar-nav">
            <!-- <li class="nav-item">
                <a href="#home" class="navbar-nav-link active">
                    <i class="icon-home2 mr-2"></i>
                    Trang chủ
                </a>
            </li> -->
            <li class="nav-item">
                <a href="{{route('home')}}#course" class="navbar-nav-link">
                    <i class="icon-graduation mr-2"></i>
                    Đăng ký khóa học
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}#introduce" class="navbar-nav-link">
                    <i class="icon-magazine mr-2"></i>
                    Giới thiệu
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}#advise" class="navbar-nav-link">
                    <i class="icon-headset mr-2"></i>
                    Tư vấn
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}#feedback" class="navbar-nav-link">
                    <i class="icon-ticket mr-2"></i>
                    Phản hồi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}#blog" class="navbar-nav-link">
                    <i class="icon-book mr-2"></i>
                    Bài viết
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}#contact" class="navbar-nav-link">
                    <i class="icon-quill4 mr-2"></i>
                    Liên hệ
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-make-group mr-2"></i>
                    Menu with tabs
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#tab-dark-4" class="dropdown-item" data-toggle="tab"><i class="icon-train2"></i> Train tickets</a>
                    <a href="#tab-dark-5" class="dropdown-item" data-toggle="tab"><i class="icon-bus"></i> Bus tickets</a>
                    <a href="#tab-dark-6" class="dropdown-item" data-toggle="tab"><i class="icon-car"></i> Car rental</a>
                </div>
            </li> -->
        </ul>

        <ul class="navbar-nav ml-xl-auto">
            <li class="nav-item">
                <a href="{{route('login')}}" class="navbar-nav-link">
                    <i class="icon-user mr-2"></i>
                    Đăng nhập
                </a>
            </li>
            <!-- <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                    <span>Victoria</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item">
                        <i class="icon-comment-discussion"></i>
                        Messages
                        <span class="badge badge-primary badge-pill ml-auto">58</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li> -->
        </ul>
    </div>
</div>