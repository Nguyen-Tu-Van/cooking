<header class="header--style-1" style="background:url(https://haycafe.vn/wp-content/uploads/2022/05/Background-may-trang.webp)">

    <!--====== Nav 1 ======-->
    <nav class="primary-nav-wrapper">
        <div class="container">

            <!--====== Primary Nav ======-->
            <div class="primary-nav" >

                <!--====== Main Logo ======-->

                <a class="main-logo" href="index-2.html">

                    <img src="https://img.pikbest.com/png-images/travel-logo-for-business-company-vector-graphic-element_1522077.png!f305cw" width="100px" alt=""></a>
                <!--====== End - Main Logo ======-->


                <!--====== Search Form ======-->
                <form class="main-form" action="{{route('search')}}">

                    <label for="main-search"></label>

                    <input class="input-text input-text--border-radius input-text--style-2" type="text" id="main-search" name="keyword" placeholder="Search" value="{{$_GET['keyword']??''}}">

                    <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                </form>
                <!--====== End - Search Form ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation">

                    <button class="btn btn--icon toggle-button toggle-button--white far fa-user-circle" type="button"></button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                    </div>
                    @if(Session::get('user'))
                        <a href="{{route('profile')}}"><i class="fas fa-user"></i> {{Session::get('user')['email']}} </a>
                        <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    @else
                        <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        <a href="{{route('signup')}}"><i class="fas fa-shuttle-van"></i> Đăng kí</a>
                    @endif
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Primary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 1 ======-->


    <!--====== Nav 2 ======-->
    <nav class="secondary-nav-wrapper" id="sticky">
        <div class="container">

            <!--====== Secondary Nav ======-->
            <div class="secondary-nav" style="height: 60px;">

                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation1">


                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation2">

                    <button class="btn btn--icon toggle-button toggle-button--white fas fa-home" type="button"> Trang chủ</button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design2 ah-list--link-color-white">
                            <li>
                                <a href="{{route('house')}}"><i class="fas fa-home"></i> Trang chủ</a></li>
                            <li class="has-dropdown">
                            <li class="has-dropdown">
                                <a href="{{route('post')}}"><i class="fas fa-newspaper"></i> Bài đăng</a>

                                <!--====== Dropdown ======-->

                                <!--====== End - Dropdown ======-->
                            </li>
                            <li>
                                <a href="{{route('orderTour')}}"><i class="fas fa-compress"></i> Đặt tour</a>
                            </li>
                            <li>
                                <a href="{{route('myOrder')}}"><i class="fas fa-smile"></i> Tour của tôi</a>
                            </li>
                            <!--  <li>
                                <a href=""><i class="far fa-comments"></i> Liên hệ</a>
                            </li> -->
                            <li>
                                <a href="{{route('favorites')}}"><i class="fas fa-heart"></i> Tour yêu thích</a>
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation3">

                    <button class="btn btn--icon toggle-button toggle-button--white fas fa-cart-plus toggle-button-shop" type="button"> Đặt tour</button>

                    <!-- <span class="total-item-round">2</span> -->

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Secondary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 2 ======-->
</header>